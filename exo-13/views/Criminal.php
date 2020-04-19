<?php

namespace Jonathan\Views;

use Jonathan\Classes\Response;

class Criminal implements IView {

  public function __construct() {}

  public function render(Response $response) : string {
    $response->setParam('title', 'Fiche criminel');
    return $response->getTwig()->render(
      'criminal-read.html',
      $response->getParams()
    );
  }

}