<?php

namespace Jonathan\Views;

class Login extends BaseView {

  public function render() : string {
    return $this->getTwig()->render('login.html', ['title' => 'test']);
  }

}