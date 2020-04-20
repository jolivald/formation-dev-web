<?php

namespace Jonathan\Controllers;

use Jonathan\Classes\Request;
use Jonathan\Classes\Response;
use Jonathan\Views\IView;

interface IController {

  public function __construct();

  public function dispatch(Request $request, Response $response) : Iview;

}