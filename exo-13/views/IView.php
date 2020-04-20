<?php

namespace Jonathan\Views;

use Jonathan\Classes\Response;

interface IView {

  public function __construct();
  
  public function render(Response $response) : string;

}