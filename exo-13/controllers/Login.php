<?php

namespace Jonathan\Controllers;

use Jonathan\Views\IView;
use Jonathan\Views\Login as LoginView;

class Login implements IController {

  public function getView() : Iview {
    return new LoginView();
  }

}