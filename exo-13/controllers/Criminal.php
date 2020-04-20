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
      case 'create':
        return $this->dispatchCreate($request, $response);
      case 'read':
        return $this->dispatchRead($request, $response);
      case 'update':
        return $this->dispatchUpdate($request, $response);
    }
  }

  protected function dispatchRead(Request $request, Response $response) : IView {
    $id = $request->getParam(1);
    $criminal = App::getEntityManager()
      ->createQueryBuilder()
      ->select('r')
      ->from('Jonathan\\Models\\Recherches', 'r')
      ->where('r.idR = :id')
      ->setMaxResults(1)
      ->setParameter('id', $id)
      ->getQuery()
      ->getSingleResult();
    $convictions = App::getEntityManager()
      ->createQueryBuilder()
      ->select('c')
      ->from('Jonathan\\Models\\Condamnations', 'c')
      ->where('c.idC = :id')
      ->setParameter('id', $id)
      ->getQuery()
      ->getResult();
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
      'updatedBy' => $criminal->getUpdatedBy(),
      'acolytes' => $criminal->getRecherchesIdR1()
        ->map(function($acolyte) {
          return [
            'idR' => $acolyte->getIdR(),
            'nomR' => $acolyte->getNomR(),
            'prenomR' => $acolyte->getPrenomR()
          ];
        }),
      'testimonials' => $criminal->getTemoignagesIdTemoignage()
        ->map(function($testimony) {
          return [
            'idTemoignage' => $testimony->getIdTemoignage(),
            'temoinT' => $testimony->getTemoinT(),
            'dateS' => App::formatDate($testimony->getDateS())
          ];
        }),
      'convictions' => array_map(function($conviction) {
        return [
          'idC' => $conviction->getIdC(),
          'libelleAffaireC' => $conviction->getLibelleAffaireC(),
          'dateC' => App::formatDate($conviction->getDateC())
        ];
      }, $convictions)
    ]);
    return new CriminalView;
  }

  protected function dispatchCreate(Request $request, Response $response) : IView {
    return new CriminalView;
  }

  protected function dispatchUpdate(Request $request, Response $response) : IView {
    return new CriminalView;
  }

}