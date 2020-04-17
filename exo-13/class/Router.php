<?php

namespace Jonathan\Classes;

use Jonathan\Classes\Request;
use Jonathan\Controllers\IController;
//use Jonathan\Views\IView;

class Router {

  /**
   * @var array $_routes Registered routes
   */
  private $_routes = [
    'GET' => [],
    'POST' => []
  ];

  /**
   * Register a HTTP GET route
   * 
   * @param string $path Route path
   * @param string $controller Controller class name
   * @throws Exception If controller does not implement IController interface
   */
  public function get(string $path, string $controller){
    if (!is_subclass_of($controller, 'Jonathan\\Controllers\\IController')){
      throw new \Exception('Controller must implement IController interface');
    }
    $this->_routes['GET'][$path] = $controller;
  }

  /**
   * Register a HTTP POST route
   * 
   * @param string $path Route path
   * @param string $controller Controller class name
   * @throws Exception If controller does not implement IController interface
   */
  public function post($path, string $controller){
    if (!is_subclass_of($controller, 'Jonathan\\Controllers\\Icontroller')){
      throw new \Exception('Controller must implement IController interface');
    }
    $this->_routes['POST'][$path] = $controller;
  }

  /**
   * Find controller matching request and return an instance of it
   * 
   * @return IController Controller matching URL
   * @throws Exception If no route matches
   */
  public function route(Request $request) : IController {
    $url = $request->getUrl();
    $method = $request->getMethod();
    if (!isset($this->_routes[$method])){
      throw new \Exception('Bad request');
    }
    foreach ($this->_routes[$method] as $path => $controller){
      $matches = $this->_match($url, $path);
      if (is_array($matches)){
        $request->setParams($matches);
        return new $controller;
      }
    }
    throw new \Exception('No route matches');
  }

  /**
   * Match a route path against request URL
   * 
   * @param string $url Requested URL
   * @param string $path Route path
   * @return array|boolean Route captures if match, false otherwise
   */
  protected function _match($url, $path) {
    $url = trim($url, '/');
    $capture = preg_replace('#:([\w]+)#', '([^/]+)', trim($path, '/'));
    $open = '#^';
    $close = '$#i';
    $regexp = $open.$capture.$close;
    if (!preg_match($regexp, $url, $matches)){
      return false;
    }
    array_shift($matches);
    return $matches;
  }

}