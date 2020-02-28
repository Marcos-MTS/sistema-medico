<?php

/*
 * É recomendado que todo o carregamente seja feito apartir desse arquivo.
 */

// Config
require_once 'config.php';
require_once ('controller/MedicoController.php');

$controller = new MedicoController();
$controller->operacao();

