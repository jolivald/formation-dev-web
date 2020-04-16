<?php

namespace Jonathan\Controllers;

use Jonathan\Classes\Request;
use Jonathan\Controllers\IController;
use Jonathan\Views\IView;

abstract class AbstractController implements IController {
  
  /**
   * @var Request $_request Request instance
   */
  private $_request;

  public function __construct(Request $request){
    $this->setRequest($request);
  }

  public abstract function dispatch() : IView;

  /**
   * Get $_request Request instance
   *
   * @return  Request
   */ 
  protected function getRequest() : Request {
    return $this->_request;
  }


  /**
   * Set $_request Request instance
   *
   * @param  Request  $_request  $_request Request instance
   *
   * @return  self
   */ 
  protected function setRequest(Request $request) : self {
    $this->_request = $request;
    return $this;
  }

}