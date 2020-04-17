<?php

namespace Jonathan\Controllers;

use Jonathan\Classes\Request;
use Jonathan\Views\IView;

abstract class BaseController implements IController {

  public function __construct() {}

  public abstract function dispatch(Request $request) : Iview;

}