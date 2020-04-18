<?php

namespace Jonathan\Controllers;

use Jonathan\Classes\Request;
use Jonathan\Classes\Response;
use Jonathan\Controllers\IController;
use Jonathan\Views\IView;
use Jonathan\Views\Login as LoginView;

class Logout implements IController {

  public function __construct() {}

  public function dispatch(Request $request, Response $response) : IView {
    unset($_SESSION['logged']);
    unset($_SESSION['username']);
    unset($_SESSION['accreditation']);
    $response->setParam('logged', false);
    $response->setParam('username', '');
    $response->setParam('accreditation', '');
    return new LoginView;
  }

}