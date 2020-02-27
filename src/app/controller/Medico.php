<?php

namespace App\controller;

class Medico extends \App\classes\Controller {

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
            } elseif ($tipo == 'atualizar') {
                $this->atualizar();
            } else {
                $this->exibirErro("Pagina não encontrada!", $tipo . ' não corresponde a nenhuma operação!');
            }
        } catch (Exception $e) {
            $this->exibirErro("Application error", $e->getMessage());
        }
    }

    public function criar() {
        return $this->views(['Cabecalho', 'Cadastro', 'Rodape']);
    }

    public function listar() {
        $medicos = \App\model\Medico::listar();
        return $this->views(['Cabecalho', 'Listagem', 'Rodape'], ['medicos' => $medicos]);
    }

    public function editar() {
        $id = (int) $this->request->id;
        if ($medico = \App\model\Medico::recuperar($id)) {
            return $this->views(['Cabecalho', 'Edicao', 'Rodape'], ['medico' => $medico]);
        } else {
            $this->exibirErro('Erro', 'Registro não encontrado!');
        }
    }

    public function inserir() {

        $validar = new \App\classes\Validator();
        $validar->isEmail($this->request->email_txt);
        $validar->maxMin($this->request->email_txt, 'Email', 112, 6);
        $validar->maxMin($this->request->nome_txt, 'Nome', 112, 6);
        $validar->maxMin($this->request->senha_txt, 'Senha', 112, 6);
        $validar->maxMin($this->request->endereco_consultorio_txt, 'Endereço do Consultório', 112, 6);

        if ($validar->errors) {
            echo $validar->errors;
            return;
        }

        $medico = new \App\model\Medico();
        $medico->setEmail($this->request->email_txt);
        $medico->setNome($this->request->nome_txt);
        $medico->setSenha(sha1($this->request->senha_txt));
        $medico->setEnderecoConsultorio($this->request->endereco_consultorio_txt);
        $medico->setDataCriacao((new \DateTime())->format('Y-m-d H:i:s'));
        if ($medico->criar()) {
            echo 'Criado';
        }
    }

    public function atualizar() {

        $validar = new \App\classes\Validator();
        $validar->maxMin($this->request->nome_txt, 'Nome', 112, 6);
        $validar->maxMin($this->request->endereco_consultorio_txt, 'Endereço do Consultório', 112, 6);
        if (trim($this->request->senha_txt)) {
            $validar->maxMin($this->request->senha_txt, 'Senha', 112, 6);
        }

        if ($validar->errors) {
            echo $validar->errors;
            return;
        }

        $medico = new \App\model\Medico();
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
            return $this->listar();
        }
    }

    public function excluir() {
        $id = (int) $this->request->id;
        if (\App\model\Medico::destroy($id)) {
            return $this->listar();
        } else {
            echo 'Erro';
        }
    }

    public function exibirErro($titulo, $mensagem) {
        // return $this->view('Cadastro');
    }

}
