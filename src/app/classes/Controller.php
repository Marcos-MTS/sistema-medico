<?php

namespace App\classes;

class Controller {

    public $request;

    public function __construct() {
        $this->request = new Request();
    }

    public function views($views = null, $array = null) {
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
}
