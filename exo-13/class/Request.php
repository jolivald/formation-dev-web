<?php

namespace Jonathan\Classes;

class Request {

  /**
   * @var string $_url Requested URL
   */
  protected $_url;

  /**
   * @var string $_method Request method
   */
  protected $_method;

  /**
   * @var array $params Request URL parameters
   */
  protected $_params;

  /**
   * Create a new Request instance
   * 
   * @param string $url Requested URL
   */
  public function __construct(string $url) {
    $this->setUrl($url);
    $this->setMethod($_SERVER['REQUEST_METHOD']);
    session_start([
      'cookie_lifetime' => 0,
      'use_cookies' => 'On',
      'use_only_cookies' => 'On',
      'use_strict_mode' => 'On',
      'cookie_httponly' => 'On',
      'cache_limiter' => 'nocache'
    ]);
  }

  /**
   * Get $_url Requested URL
   *
   * @return  string
   */ 
  public function getUrl() : string {
    return $this->_url;
  }

  /**
   * Set $_url Requested URL
   *
   * @param  string  $_url  $_url Requested URL
   *
   * @return  self
   */ 
  public function setUrl(string $url) : self {
    $this->_url = $url;
    return $this;
  }

  /**
   * Get $_method Request method
   *
   * @return  string
   */ 
  public function getMethod() : string {
    return $this->_method;
  }

  /**
   * Set $_method Request method
   *
   * @param  string  $_method  $_method Request method
   *
   * @return  self
   */ 
  public function setMethod(string $method) : self {
    $this->_method = strtoupper($method);
    return $this;
  }

  /**
   * Get $params Request URL parameters
   *
   * @return  array
   */ 
  public function getParams() : array {
    return $this->_params;
  }

  /**
   * Set $params Request URL parameters
   *
   * @param  array  $_params  $params Request URL parameters
   *
   * @return  self
   */ 
  public function setParams(array $params) : self {
    $this->_params = $params;
    return $this;
  }

  /**
   * Get a request URL parameter by its index
   * 
   * @param int $index Parameter index
   * @return string|null URL parameter value or null if not found
   */
  public function getParam(int $index) {
    return array_key_exists($index, $this->_params)
      ? $this->_params[$index]
      : null;
  }

  /**
   * Set a request URL parameter by its index
   * 
   * @param int $index Parameter index
   * @param mixed $value Parameter value
   * @return string|null URL parameter value or null if not found
   */
  public function setParam(int $index, $value) {
    $this->_params[$index] = $value;
    return $this;
  }

  /**
   * Get a request session value by its key
   * 
   * @param string $key Session key
   * @return mixed|null Session value or null if not found
   */
  public function getSession($key) {
    return array_key_exists($key, $_SESSION)
      ? $_SESSION[$key]
      : null;
  }
}
