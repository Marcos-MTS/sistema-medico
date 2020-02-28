<?php

class Request
{
    protected $request;
 
    //atribui a variavel de requisição a classe
    public function __construct()
    {
        $this->request = $_REQUEST;
    }
 
    //verifica a existencia e retorna os dados rebebidos pela variavel
    public function __get($nome)
    {
        if (isset($this->request[$nome])) {
            return $this->request[$nome];
        }
        return false;
    }
}