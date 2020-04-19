<?php

namespace Jonathan\Controllers;

use Jonathan\Classes\App;
use Jonathan\Classes\Request;
use Jonathan\Classes\Response;
use Jonathan\Views\IView;
use Jonathan\Views\Index as IndexView;
use Jonathan\Views\Result as ResultView;

class Search implements IController {

  public function __construct() {}

  public function dispatch(Request $request, Response $response) : IView {
    $firstName = $_POST['first-name'];
    $lastName  = $_POST['last-name'];
    $manager = App::getEntityManager();
    if (empty($firstName)){
      if (empty($lastName)){
        $response->setParam('alert', [
          'type' => 'danger',
          'message' => 'Précisez un terme à rechercher.'
        ]);
        return new IndexView;
      } else {
        $query = $manager->createQueryBuilder()
          ->select('r.idR, r.nomR, r.prenomR')
          ->from('Jonathan\\Models\\Recherches', 'r')
          ->where('r.nomR LIKE :lastName')
          ->setParameter('lastName', '%'.$lastName.'%')
          ->getQuery();
      }
    } else {
      if (empty($lastName)){
        $query = $manager->createQueryBuilder()
          ->select('r.idR, r.nomR, r.prenomR')
          ->from('Jonathan\\Models\\Recherches', 'r')
          ->where('r.prenomR LIKE :firstName')
          ->setParameter('firstName', '%'.$firstName.'%')
          ->getQuery();
      } else {
        $query = $manager->createQueryBuilder()
          ->select('r.idR, r.nomR, r.prenomR')
          ->from('Jonathan\\Models\\Recherches', 'r')
          ->where('r.prenomR LIKE :firstName AND r.nomR LIKE :lastName')
          ->setParameter('firstName', '%'.$firstName.'%')
          ->setParameter('lastName', '%'.$lastName.'%')
          ->getQuery();
      }
    }
    $criminals = $query->getResult();
    if (count($criminals) == 0){
      $response->setParam('alert', [
        'type' => 'info',
        'message' => 'Aucun criminel ne correspond à votre recherche'
      ]);
    }
    /** @TODO filter criminals by accrediation */
    $response->setParam('results', $criminals);
    return new ResultView;
  }

}