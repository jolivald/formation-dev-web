<?php

namespace Jonathan\Controllers;

use Jonathan\Views\IView;

interface IController {

  public function getView() : IView;

}