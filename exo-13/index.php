<?php

use Dotenv\Dotenv;
use Jonathan\Classes\App;

// utilise l'autoload fournit par composer
// la config est personnalisée dans composer.json
$loader = require __DIR__.'/vendor/autoload.php';

// charge les infos sensibles depuis le fichier .env
Dotenv::createImmutable(__DIR__)->load();


$em = App::getEntityManager();

$criminel = $em->getRepository('Jonathan\\Models\\Recherches')->findOneBy(array('idR' => 1));



var_dump($criminel);