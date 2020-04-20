<?php

namespace Jonathan\Views;

use Jonathan\Classes\Response;

class Login implements IView {

  public function __construct() {}

  public function render(Response $response) : string {
    $response->setParam('title', 'Connexion');
    return $response->getTwig()->render(
      'login.html',
      $response->getParams()
    );
  }

}