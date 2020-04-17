<?php

namespace Jonathan\Controllers;

//use Jonathan\Controllers\AbstractController;
use Jonathan\Classes\Request;
use Jonathan\Views\IView;
use Jonathan\Views\Login as LoginView;

class Login implements IController {

  public function __construct(){}

  public function dispatch(Request $request) : Iview {
    return new LoginView();
  }

}