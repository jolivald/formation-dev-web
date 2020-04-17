<?php

namespace Jonathan\Views;

class Login implements IView {

  public function __construct() {}

  public function render() : string {
    return 'login view';
  }

}