<?php

namespace App\model;

include 'config-banco-dados.php';

class Conexao {

    private static $conexao;

    private function __construct() {
        
    }

    public static function getInstance() {
        try {
            if (is_null(self::$conexao)) {
                self::$conexao = new \PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
                self::$conexao->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                self::$conexao->exec('set names utf8');
            }
            return self::$conexao;
        } catch (Exception $e) {
            die("Ocorreu o seguinte erro: " . $e->getMessage());
        }
    }

}

?>