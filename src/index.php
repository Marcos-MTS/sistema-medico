<?php

/*
 * É recomendado que todo o carregamente seja feito apartir desse arquivo.
 */

// Config
require 'config.php';
require 'vendor/autoload.php';

$controller = new App\controller\Medico();
$controller->operacao();

