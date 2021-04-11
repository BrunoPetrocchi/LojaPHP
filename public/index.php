<?php


use core\classes\Database;
use core\classes\Functions;


// abrindo a sessao
session_start();

// carregando o config
require_once('../config.php');

// carregando todas as classes do projeto
require_once('../vendor/autoload.php');

$a = new Database();
$b = new Functions();

$b->teste();

echo ' - ok';


