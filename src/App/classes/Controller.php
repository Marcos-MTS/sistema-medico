<?php

namespace App\classes;

class Controller {

    public $request;

    public function __construct() {
        $this->request = new Request();
    }

    public function view($view_arquivo, $array = null) {
        if (!is_null($array)) {
            foreach ($array as $var => $value) {
                ${$var} = $value;
            }
        }
        ob_start();
        include dirname(__DIR__) . '\view\\' . $view_arquivo . '.php';
        // include "..\view\{$view_arquivo}.php";
        ob_flush();
    }
    

}

?>