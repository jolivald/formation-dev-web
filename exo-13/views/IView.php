<?php

namespace Jonathan\Views;

interface IView {

  public function __construct();
  
  public function render() : string;

}