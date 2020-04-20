<?php

namespace Jonathan\Controllers;

//use Doctrine\ORM\AbstractQuery;
use Carbon\Carbon;
use Jonathan\Classes\App;
use Jonathan\Classes\Request;
use Jonathan\Classes\Response;
use Jonathan\Views\IView;
use Jonathan\Views\Criminal as CriminalView;

class Criminal implements IController {

  public function __construct() {}

  public function dispatch(Request $request, Response $response) : IView {
    switch ($request->getParam(0)){
      case 'read':
        return $this->dispatchRead($request, $response);
    }
  }

  protected function dispatchRead(Request $request, Response $response) : IView {
    $criminal = App::getEntityManager()
      ->createQueryBuilder()
      ->select('r')
      ->from('Jonathan\\Models\\Recherches', 'r')
      ->where('r.idR = :id')
      ->setMaxResults(1)
      ->setParameter('id', $request->getParam(1))
      ->getQuery()
      ->getSingleResult();
    /*$acolytes = $criminal->getRecherchesIdR1()->map(function($acolyte) {
      echo '<pre>'.print_r($acolyte, true).'</pre>';
      return $acolyte;
    });*/
    /*$temoingnages = $criminal->getTemoignagesIdTemoignage()->map(function($temoignage) {
      echo '<pre>'.print_r($temoignage, true).'</pre>';
      return $temoignage;
    });*/
    $response->setParam('criminal', [
      'nomR' => $criminal->getNomR(),
      'prenomR' => $criminal->getPrenomR(),
      'dateNaissanceR' => App::formatDate($criminal->getDateNaissanceR()),
      'signeDistinctifR' => $criminal->getSigneDistinctifR(),
      'profilPsyR' => $criminal->getProfilPsyR(),
      'niveauAccreditation' => $criminal->getNiveauAccreditation(),
      'nomPhotoR' => $criminal->getNomPhotoR(),
      'informationsR' => $criminal->getInformationsR(),
      'derniereAdresseR' => $criminal->getDerniereAdresseR(),
      'createdAt' => App::formatDate($criminal->getCreatedAt()),
      'createdBy' => $criminal->getCreatedBy(),
      'updatedAt' => App::formatDate($criminal->getUpdatedAt()),
      'updatedBy' => $criminal->getUpdatedBy()
    ]);
    return new CriminalView;
  }

}