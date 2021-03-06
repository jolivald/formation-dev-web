<?php

namespace Jonathan\Classes;

use \Twig\Loader\FilesystemLoader;
use \Twig\Environment;
use \Twig\TwigFilter;
use Jonathan\Views\IView;

class Response {

  /**
   * @var array $_params Response parameters passed to template engine
   */
  protected $_params;

  /**
   * @var Environment Twig template engine
   */
  protected $_twig;

  /**
   * Create a new instance of Response
   */
  public function __construct() {
    $this->_params = [];
    $this->setTwig(new Environment(
      new FilesystemLoader(__DIR__.'/../views/templates')
    ));
    $this->getTwig()->addFilter(
      new TwigFilter('url', 'Jonathan\Classes\App::prependBaseUrl')
    );
  }

  /**
   * Get $_params Response parameters passed to template engine
   *
   * @return  array
   */ 
  public function getParams() : array {
    return $this->_params;
  }

  /**
   * Set $_params Response parameters passed to template engine
   *
   * @param  array  $_params  $_params Response parameters passed to template engine
   * @return  self
   */ 
  public function setParams(array $params) : self {
    $this->_params = array_merge($this->_params, $params);
    return $this;
  }

  /**
   * Get a specific parameter value
   * 
   * @param string $key Key of the parameter
   * @return string|null Parameter value or null if not found
   */
  public function getParam(string $key) {
    return array_key_exists($key, $this->_params)
      ? $this->_params[$key]
      : null;
  }

  /**
   * Set a specific parameter value
   * 
   * @param string $key Key of the parameter
   * @param mixed $value Value of the parameter
   * @return  self
   */ 
  public function setParam(string $key, $value) : self {
    $this->_params[$key] = $value;
    return $this;
  }


  /**
   * Get twig template engine
   *
   * @return  Environment
   */ 
  public function getTwig() {
    return $this->_twig;
  }

  /**
   * Set twig template engine
   *
   * @param  Environment  $_twig  Twig template engine
   * @return  self
   */ 
  public function setTwig(Environment $twig) {
    $this->_twig = $twig;
    return $this;
  }

}
