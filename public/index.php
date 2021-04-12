<?php


// abrindo a sessao

use core\classes\Database;

session_start();

// carregando o config
require_once('../config.php');

// carregando todas as classes do projeto
require_once('../vendor/autoload.php');

$bd = new Database();
$clientes = $bd->select("SELECT * FROM clientes");
echo '<pre>';
 print_r($clientes);
echo '</pre>';
