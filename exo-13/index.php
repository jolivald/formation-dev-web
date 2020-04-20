<?php

use Dotenv\Dotenv;
use Jonathan\Classes\App;
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

$router   = new Router;
$request  = new Request($_GET['url']);
$response = new Response;

if (App::isAgentAuthentified()){
  $response->setParam('logged', true);
  $response->setParam('username', $_SESSION['username']);
  $response->setParam('accreditation', $_SESSION['accreditation']);
}

//$router->get('/', 'Jonathan\\Controllers\\Index');
$router->get('/login', 'Jonathan\\Controllers\\Login');
$router->get('/logout', 'Jonathan\\Controllers\\Logout');
$router->get('/criminal/:action', 'Jonathan\\Controllers\\Criminal');
$router->get('/criminal/:action/:id', 'Jonathan\\Controllers\\Criminal');

$router->post('/login', 'Jonathan\\Controllers\\Login');
$router->post('/search', 'Jonathan\\Controllers\\Search');
$router->post('/criminal/:action', 'Jonathan\\Controllers\\Criminal');
$router->post('/criminal/:action/:id', 'Jonathan\\Controllers\\Criminal');

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
