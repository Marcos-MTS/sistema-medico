<?php

require_once ('Conexao.php');

class Medico {

    private $id;
    private $email;
    private $nome;
    private $senha;
    private $endereco_consultorio;
    private $data_criacao;
    private $data_alteracao;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function getEnderecoConsultorio() {
        return $this->endereco_consultorio;
    }

    public function setEnderecoConsultorio($endereco_consultorio) {
        $this->endereco_consultorio = $endereco_consultorio;
    }

    public function getDataCriacao() {
        return $this->data_criacao;
    }

    public function setDataCriacao($data_criacao) {
        $this->data_criacao = $data_criacao;
    }

    public function getDataAlteracao() {
        return $this->data_alteracao;
    }

    public function setDataAlteracao($data_alteracao) {
        $this->data_alteracao = $data_alteracao;
    }

    public function criar() {
        $sql = "INSERT INTO medico (email, nome, senha, endereco_consultorio, data_criacao) VALUES (?,?,?,?,?)";
        $conexao = Conexao::getInstance();
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(1, $this->email);
        $stmt->bindValue(2, $this->nome);
        $stmt->bindValue(3, $this->senha);
        $stmt->bindValue(4, $this->endereco_consultorio);
        $stmt->bindValue(5, $this->data_criacao);
        return $stmt->execute();
    }

    public function atualizar() {
        //pega a senha antiga
        $senha = $this->recuperar($this->id)->getSenha();

        //verifica se existe uma nova senha
        if (trim($this->senha)) {
            $senha = $this->senha;
        }

        $sql = "UPDATE medico SET nome = ?, senha = ?, endereco_consultorio = ?, data_alteracao = ? WHERE id = ?";
        $conexao = Conexao::getInstance();
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(1, $this->nome);
        $stmt->bindValue(2, $senha);
        $stmt->bindValue(3, $this->endereco_consultorio);
        $stmt->bindValue(4, $this->data_alteracao);
        $stmt->bindValue(5, $this->id);
        return $stmt->execute();
    }

    public static function listar() {
        $conexao = Conexao::getInstance();
        $stmt = $conexao->prepare("SELECT * FROM medico ORDER BY id DESC;");
        $result = array();
        if ($stmt->execute()) {
            while ($rs = $stmt->fetchObject(Medico::class)) {
                $result[] = $rs;
            }
        }
        if (count($result) > 0) {
            return $result;
        }
        return false;
    }

    public static function recuperar($id = null) {
        $conexao = Conexao::getInstance();
        $stmt = $conexao->prepare("SELECT * FROM medico WHERE id='{$id}';");
        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                $resultado = $stmt->fetchObject(Medico::class);
                if ($resultado) {
                    return $resultado;
                }
            }
        }
        return false;
    }

    public static function recuperarPorEmail($email = null) {
        $conexao = Conexao::getInstance();
        $stmt = $conexao->prepare("SELECT * FROM medico WHERE email='{$email}';");
        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                return true;
            }
        }
        return false;
    }

    public static function destroy($id = null) {
        $conexao = Conexao::getInstance();
        return $conexao->exec("DELETE FROM medico WHERE id='{$id}';");
    }

}
