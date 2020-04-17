<?php

use Dotenv\Dotenv;
use Jonathan\Classes\Request;
//use Jonathan\Classes\App;
use Jonathan\Classes\Router;
//use Jonathan\Controllers\Login;

// utilise l'autoload fournit par composer
// la config est personnalisée dans composer.json
$loader = require __DIR__.'/vendor/autoload.php';

// charge les infos sensibles depuis le fichier .env
Dotenv::createImmutable(__DIR__)->load();

$request = new Request($_GET['url']);

$router = new Router;

$router->get('/login', 'Jonathan\\Controllers\\Login');
$router->post('/login', 'Jonathan\\Controllers\\Login');

try {
  $controller = $router->route($request);
}
catch (\Exception $e){
  $request->setUrl('/login');
  $request->setMethod('GET');
  $controller = $router->route($request);
}

$view = $controller->dispatch($request);

echo '<p>session: '.isset($_SESSION['logged']).'</p>';

echo $view->render();
