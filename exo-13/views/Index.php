<?php

namespace Jonathan\Views;

use Jonathan\Classes\Response;

class Index implements IView {

  public function __construct() {}

  public function render(Response $response) : string {
    $response->setParam('title', 'Accueil');
    return $response->getTwig()->render(
      'index.html',
      $response->getParams()
    );
  }

}