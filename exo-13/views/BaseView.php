<?php

namespace Jonathan\Views;

use \Twig\Loader\FilesystemLoader;
use \Twig\Environment;

abstract class BaseView implements IView {

  /**
   * @var Environment Twig template engine
   */
  protected $_twig;

  public function __construct() {
    $this->setTwig(new Environment(
      new FilesystemLoader(__DIR__.'/templates')
    ));
  }

  public abstract function render() : string;

  /**
   * Get twig template engine
   *
   * @return  Environment
   */ 
  protected function getTwig() {
    return $this->_twig;
  }

  /**
   * Set twig template engine
   *
   * @param  Environment  $twig  Twig template engine
   * @return  self
   */ 
  protected function setTwig(Environment $twig) {
    $this->_twig = $twig;
    return $this;
  }
}