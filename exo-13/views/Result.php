<?php

namespace Jonathan\Views;

use Jonathan\Classes\Response;

class Result implements IView {

  public function __construct() {}

  public function render(Response $response) : string {
    $response->setParam('title', 'Résultats');
    return $response->getTwig()->render(
      'result.html',
      $response->getParams()
    );
  }

}