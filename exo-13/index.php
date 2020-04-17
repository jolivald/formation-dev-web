<?php

use Dotenv\Dotenv;
use Jonathan\Classes\Request;
//use Jonathan\Classes\App;
use Jonathan\Classes\Router;
use Jonathan\Controllers\Login;

// utilise l'autoload fournit par composer
// la config est personnalisée dans composer.json
$loader = require __DIR__.'/vendor/autoload.php';

// charge les infos sensibles depuis le fichier .env
Dotenv::createImmutable(__DIR__)->load();

$request = new Request($_GET['url']);

$router = new Router;

$router->get('/', 'Jonathan\\Controllers\\Login');
$router->get('/test/:id', 'Jonathan\\Controllers\\Login');
$router->get('/login', 'Jonathan\\Controllers\\Login');

try {
  if ($request->getSession('logged') !== true){
    throw new \Exception('Must login first');
  }
  $controller = $router->route($request);
}
catch (\Exception $e){
  $request->setUrl('/login');
  $request->setMethod('GET');
  $controller = $router->route($request);
}

$view = $controller->dispatch($request);

echo $view->render();
