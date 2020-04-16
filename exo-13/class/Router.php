<?php

namespace Jonathan\Classes;

use Jonathan\Classes\Request;
use Jonathan\Controllers\IController;
//use Jonathan\Views\IView;

class Router {
  
  /**
   * @var Request $_request Request instance
   */
  protected $_request;

  /**
   * @var array $_routes Registered routes
   */
  private $_routes = [
    'GET' => [],
    'POST' => []
  ];

  /**
   * Create a new router instance
   * 
   * @param Request $request Request instance
   */
  public function __construct($request) {
    // $this->_url = trim($url, '/');
    $this->_request = $request;
  }

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
    if (!is_subclass_of($controller, 'Icontroller')){
      throw new \Exception('Controller must implement IController interface');
    }
    $this->_routes['POST'][$path] = $controller;
  }

  /**
   * Match a route path against request URL
   * 
   * @param string $path Route path
   * @return array|boolean Route captures if match, false otherwise
   */
  protected function _match($path) {
    $capture = preg_replace('#:([\w]+)#', '([^/]+)', trim($path, '/'));
    $open = '#^';
    $close = '$#i';
    $regexp = $open.$capture.$close;
    if (!preg_match($regexp, $this->_request->getUrl(), $matches)){
      return false;
    }
    array_shift($matches);
    return $matches;
  }

  /**
   * Find controller matching request and return an instance of it
   * 
   * @return IController Controller matching URL
   * @throws Exception If no route matches
   */
  public function route() : IController {
    $method = $this->_request->getMethod();
    if (!isset($this->_routes[$method])){
      throw new \Exception('Bad request');
    }
    echo '<pre>'.print_r($this->_routes, true).'</pre>';
    foreach ($this->_routes[$method] as $path => $controller){
      $matches = $this->_match($path);
      if ($matches){
        $this->_request->setParams($matches);
        return new $controller($this->_request);
      }
    }
    throw new \Exception('No route matches');
  }

}