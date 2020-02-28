<?php

require_once ('classes/Controller.php');
require_once ('model/Medico.php');

class MedicoController extends Controller {

    //Recebe o tipo de operação que a classe deve executar via GET
    public function operacao() {
        $tipo = isset($_GET['tipo']) ? $_GET['tipo'] : NULL;
        try {
            if ($tipo == NULL) {
                $this->listar();
            } elseif ($tipo == 'inserir') {
                $this->inserir();
            } elseif ($tipo == 'criar') {
                $this->criar();
            } elseif ($tipo == 'excluir') {
                $this->excluir();
            } elseif ($tipo == 'editar') {
                $this->editar();
            } elseif ($tipo == 'email') {
                $this->emailExiste();
            } elseif ($tipo == 'atualizar') {
                $this->atualizar();
            } else {
                $this->exibirErro("Pagina não encontrada! " . $tipo . ' não corresponde a nenhuma operação!');
            }
        } catch (Exception $e) {
            $this->exibirErro($e->getMessage());
        }
    }

    //Carrega a pagina de cadastro
    public function criar() {
        return $this->views(['cabecalho', 'cadastro', 'rodape']);
    }

    //Carrega a pagina com a lista de médicos
    public function listar() {
        $medicos = Medico::listar();
        return $this->views(['cabecalho', 'listagem', 'rodape'], ['medicos' => $medicos]);
    }

    //Recupera o médico de acordo com o id e carrega a tela de edição
    public function editar() {
        $id = (int) $this->request->id;
        if ($medico = Medico::recuperar($id)) {
            return $this->views(['cabecalho', 'edicao', 'rodape'], ['medico' => $medico]);
        }
        $this->exibirErro('Registro não encontrado!');
    }

    //Verifica a existencia do email no banco e retorna o resusltado em duas formas possiveis
    public function emailExiste($email = null) {
        $emailMedico = null;
        if ($email) {
            $emailMedico = $email;
        } else {
            $emailMedico = $this->request->email_txt;
        }
        if (Medico::recuperarPorEmail($emailMedico)) {
            if ($email) {
                return true;
            } else {
                echo json_encode(['result' => true]);
            }
        } else if ($email) {
            return false;
        } else {
            echo json_encode(['result' => false]);
        }
    }

    //Valida e armazena os dados recebidos no banco de dados
    public function inserir() {
        $validar = new Validator();
        $validar->isEmail($this->request->email_txt);
        $validar->maxMin($this->request->email_txt, 'Email', 112, 6);
        $validar->maxMin($this->request->nome_txt, 'Nome', 112, 6);
        $validar->maxMin($this->request->senha_txt, 'Senha', 112, 6);
        $validar->maxMin($this->request->endereco_consultorio_txt, 'Endereço do Consultório', 112, 6);

        if ($this->request->email_txt) {
            if ($this->emailExiste($this->request->email_txt)) {
                $validar->errors .= "Esse email ja se encontra cadastrado!";
            }
        }

        if ($validar->errors) {
            $this->exibirErro($validar->errors);
            return;
        }

        $medico = new Medico();
        $medico->setEmail($this->request->email_txt);
        $medico->setNome($this->request->nome_txt);
        $medico->setSenha(sha1($this->request->senha_txt));
        $medico->setEnderecoConsultorio($this->request->endereco_consultorio_txt);
        $medico->setDataCriacao((new \DateTime())->format('Y-m-d H:i:s'));
        if ($medico->criar()) {
            // return $this->listar();
            header("Location: index");
            die();
        }
        $this->exibirErro('Ocorreu algum erro ao inserir um novo registro!');
    }

    //Valida e atualiza os dados no banco de dados
    public function atualizar() {
        $validar = new Validator();
        $validar->maxMin($this->request->nome_txt, 'Nome', 112, 6);
        $validar->maxMin($this->request->endereco_consultorio_txt, 'Endereço do Consultório', 112, 6);
        if (trim($this->request->senha_txt)) {
            $validar->maxMin($this->request->senha_txt, 'Senha', 112, 6);
        }

        if ($validar->errors) {
            $this->exibirErro($validar->errors);
            return;
        }

        $medico = new Medico();
        $medico->setId((int) $this->request->id_txt);
        $medico->setNome($this->request->nome_txt);
        $medico->setEnderecoConsultorio($this->request->endereco_consultorio_txt);
        $medico->setDataAlteracao((new \DateTime())->format('Y-m-d H:i:s'));

        if (trim($this->request->senha_txt)) {
            $medico->setSenha(sha1($this->request->senha_txt));
        } else {
            $medico->setSenha(null);
        }

        if ($medico->atualizar()) {
            //return $this->listar();
            header("Location: index");
            die();
        }
        $this->exibirErro('Ocorreu algum erro ao atualizar o registro!');
    }

    //Exclui o medico de acordo com o id recebido
    public function excluir() {
        $id = (int) $this->request->id;
        if (Medico::destroy($id)) {
            // return $this->listar();
            header("Location: index");
            die();
        }
        $this->exibirErro('Ocorreu algum erro ao excluir o registro!');
    }

}
