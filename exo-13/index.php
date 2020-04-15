<?php

use Dotenv\Dotenv;
use Jonathan\Classes\App;

// utilise l'autoload fournit par composer
// notre namespace est enregistré dans composer.json
$loader = require __DIR__.'/vendor/autoload.php';

// charge les infos sensibles depuis le fichier .env
Dotenv::createImmutable(__DIR__)->load();


$em = App::getEntityManager();

//var_dump($em);