<?php

namespace Jonathan\Views;

class Index extends BaseView {

  public function render() : string {
    return $this->getTwig()->render('index.html', ['title' => 'index']);
  }

}