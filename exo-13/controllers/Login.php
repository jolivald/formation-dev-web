<?php

namespace Jonathan\Controllers;

use Jonathan\Classes\Request;
use Jonathan\Views\IView;
use Jonathan\Views\Login as LoginView;

class Login extends BaseController {

  public function __construct(){}

  public function dispatch(Request $request) : Iview {
    return new LoginView();
  }

}