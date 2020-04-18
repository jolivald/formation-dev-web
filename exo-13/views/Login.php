<?php

namespace Jonathan\Views;

use Jonathan\Classes\Response;

class Login extends BaseView {

  public function render(Response $response) : string {
    $response->setParam('title', 'Connexion');
    return $response->getTwig()->render(
      'login.html',
      $response->getParams()
    );
  }

}