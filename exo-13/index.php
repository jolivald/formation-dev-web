<?php

use Dotenv\Dotenv;
use Jonathan\Classes\RedirectException;
use Jonathan\Classes\Request;
use Jonathan\Classes\Response;
//use Jonathan\Classes\App;
use Jonathan\Classes\Router;
//use Jonathan\Controllers\Login;

// utilise l'autoload fournit par composer
// la config est personnalisée dans composer.json
$loader = require __DIR__.'/vendor/autoload.php';

// charge les infos sensibles depuis le fichier .env
Dotenv::createImmutable(__DIR__)->load();

$request  = new Request($_GET['url']);
$response = new Response;
$router   = new Router;

$router->get('/login', 'Jonathan\\Controllers\\Login');
$router->post('/login', 'Jonathan\\Controllers\\Login');

try {
  $controller = $router->route($request);
}
catch (\Exception $exception){
  $request->setUrl('/login');
  $request->setMethod('GET');
  $controller = $router->route($request);
}

$view = $controller->dispatch($request, $response);

echo $view->render($response);
