<?php

namespace Jonathan\Controllers;

use Jonathan\Classes\App;
//use Jonathan\Classes\RedirectException;
use Jonathan\Classes\Request;
use Jonathan\Classes\Response;
use Jonathan\Views\IView;
use Jonathan\Views\Index as IndexView;
use Jonathan\Views\Login as LoginView;

class Login implements IController {

  public function __construct() {}

  public function dispatch(Request $request, Response $response) : Iview {
    $response->setParam('foo', 'bar');
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
      $accreditation = $agent->getNiveauAccreditationA();
      $_SESSION['logged'] = true;
      $_SESSION['username'] = $username;
      $_SESSION['accreditation'] = $accreditation;
      $response->setParam('logged', true);
      $response->setParam('username', $username);
      $response->setParam('accreditation', $accreditation);
      return new IndexView;
    }
    $response->setParam('alert', [
      'type' => 'danger',
      'message' => 'La connexion a échouée.'
    ]);
    return $this->dispatchGET($request, $response);
  }

  protected function dispatchGET(Request $request, Response $response) : Iview {
    return App::isAgentAuthentified()
      ? new IndexView
      : new LoginView;
  }

}