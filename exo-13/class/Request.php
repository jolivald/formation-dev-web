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
   * @return string URL parameter value
   */
  public function getParam(int $index) : string {
    return $this->_params[$index];
  }

}
