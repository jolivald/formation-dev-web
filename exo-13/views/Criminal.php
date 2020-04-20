<?php

namespace Jonathan\Views;

use Jonathan\Classes\Response;

class Criminal implements IView {

  /**
   * @var string $_template Path to template file
   */
  protected $_template;

  public function __construct() {}

  public function render(Response $response) : string {
    $response->setParam('title', 'Fiche criminel');
    return $response->getTwig()->render(
      $this->getTemplate(),
      $response->getParams()
    );
  }

  /**
   * Get $_template Path to template file
   *
   * @return string
   */ 
  public function getTemplate() {
    return $this->_template;
  }

  /**
   * Set $_template Path to template file
   *
   * @param string $_template  $_template Path to template file
   * @return self
   */ 
  public function setTemplate(string $_template) {
    $this->_template = $_template;
    return $this;
  }

}