<?php

namespace Jonathan\Controllers;

use Jonathan\Classes\App;
use Jonathan\Classes\RedirectException;
use Jonathan\Classes\Request;
use Jonathan\Classes\Response;
use Jonathan\Views\IView;
use Jonathan\Views\Index as IndexView;
use Jonathan\Views\Login as LoginView;

class Login extends BaseController {

  public function dispatch(Request $request, Response $response) : Iview {
    return $request->getMethod() === 'POST'
      ? $this->dispatchPOST($request, $response)
      : $this->dispatchGET($request, $response);
  }

  protected function dispatchPOST(Request $request, Response $response) : Iview {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $agent    = App::getEntityManager()
      ->getRepository('Jonathan\\Models\\Agents')
      ->findOneBy([ 'pseudoA' => $username ]);
    if ($agent && password_verify($password, $agent->getMotDePasseA())) {
      $_SESSION['logged'] = true;
      $_SESSION['username'] = $username;
      $_SESSION['accreditation'] = $agent->getNiveauAccreditationA();
      return new IndexView;
    }
    return $this->dispatchGET($request);
  }

  protected function dispatchGET(Request $request) : Iview {
    return new LoginView();
  }

}