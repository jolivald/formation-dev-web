<?php

use Dotenv\Dotenv;
use Jonathan\Classes\App;
use Jonathan\Controllers\Login;

// utilise l'autoload fournit par composer
// la config est personnalisée dans composer.json
$loader = require __DIR__.'/vendor/autoload.php';

// charge les infos sensibles depuis le fichier .env
Dotenv::createImmutable(__DIR__)->load();

// démarre une session "sécurisée"
session_start([
  'cookie_lifetime' => 0,
  'use_cookies' => 'On',
  'use_only_cookies' => 'On',
  'use_strict_mode' => 'On',
  'cookie_httponly' => 'On',
  'cache_limiter' => 'nocache'
]);

// si l'utilisateur n'est pas connecté
if (!isset($_SESSION['logged'])){
  $login = new Login();
  $view = $login->getView();
  echo $view->render();
}
// $em = App::getEntityManager();
// $criminel = $em->getRepository('Jonathan\\Models\\Recherches')->findOneBy(array('idR' => 1));
// var_dump($criminel);