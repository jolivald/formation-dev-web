<?php

namespace Jonathan\Controllers;

use Jonathan\Controllers\AbstractController;
//use Jonathan\Classes\Request;
use Jonathan\Views\IView;
use Jonathan\Views\Login as LoginView;

// class Login implements IController {
class Login extends AbstractController {


  public function dispatch() : Iview {
    return new LoginView();
  }

}