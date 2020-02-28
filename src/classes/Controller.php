<?php

require_once ('Request.php');
require_once ('Validator.php');

class Controller {

    public $request;

    //instacia a classe Request
    public function __construct() {
        $this->request = new Request();
    }

    //responsavel pelo carregamento de view
    protected function views($views = null, $array = null) {
        if (!is_null($array)) {
            foreach ($array as $var => $value) {
                ${$var} = $value;
            }
        }

        ob_start();

        if (is_array($views)) {
            foreach ($views as $view) {
                include dirname(__DIR__) . '\view\\' . $view . '.php';
            }
        } else {
            include dirname(__DIR__) . '\view\\' . $views . '.php';
        }
        // include "..\view\{$view_arquivo}.php";
        ob_flush();
    }

    //Carrega a pagina com a mensagem de erros
    protected function exibirErro($errosMsg) {
        return $this->views(['cabecalho', 'erros', 'rodape'], ['erros' => $errosMsg]);
    }

}
