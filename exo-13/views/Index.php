<?php

namespace Jonathan\Views;

use Jonathan\Classes\Response;

class Index extends BaseView {

  public function render(Response $response) : string {
    $response->setParam('title', 'Accueil');
    return $response->getTwig()->render(
      'index.html',
      $response->getParams()
    );
  }

}