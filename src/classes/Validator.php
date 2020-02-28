<?php

class Validator {

    public $errors = null;

    // Verifica se possui o tamanho minimo e maximo 
    public function maxMin($string, $campo, $max, $min) {
        if (strlen($string) > $max) {
            $this->errors .= 'O campo ' . $campo . ' deve conter no máximo ' . $max . ' caracteres! </br></br>';
        }
        if (strlen($string) < $min) {
            $this->errors .= 'O campo ' . $campo . ' deve conter no minimo ' . $min . ' caracteres! </br></br>';
        }
    }

    //Verifica se é um email válido
    public function isEmail($string) {
        if (!filter_var($string, FILTER_VALIDATE_EMAIL)) {
            $this->errors .= 'Email Inválido! </br></br>';
        }
    }

}
