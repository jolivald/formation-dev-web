<?php

namespace Jonathan\Controllers;

//use Doctrine\ORM\AbstractQuery;
use Carbon\Carbon;
use Jonathan\Classes\App;
use Jonathan\Classes\Request;
use Jonathan\Classes\Response;
use Jonathan\Models\Recherches;
use Jonathan\Views\IView;
use Jonathan\Views\Criminal as CriminalView;
use Jonathan\Views\Index as IndexView;
use Respect\Validation\Validator;

class Criminal implements IController {

  public function __construct() {}

  public function dispatch(Request $request, Response $response) : IView {
    switch ($request->getParam(0)){
      case 'create':
        return $this->dispatchCreate($request, $response);
      case 'read':
      default:
        return $this->dispatchRead($request, $response);
    }
  }

  protected function dispatchRead(Request $request, Response $response) : IView {
    $id = $request->getParam(1);
    if (!$id){
      $response->setParam('alert', [
        'type' => 'danger',
        'message' => 'L\'adresse demandée n\'existe pas.'
      ]);
      return new IndexView;
    }
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
    $view = new CriminalView;
    $view->setTemplate('criminal-read.html');
    return $view;
  }

  protected function dispatchCreate(Request $request, Response $response) : IView {
    return $request->getMethod() === 'POST'
      ? $this->dispatchCreatePOST($request, $response)
      : $this->dispatchCreateGET($request, $response);
  }

  protected function dispatchCreateGET(Request $request, Response $response) : IView {
    $view = new CriminalView;
    $view->setTemplate('criminal-create.html');
    return $view;
  }

  protected function dispatchCreatePOST(Request $request, Response $response) : IView {
    try {
      Validator
        ::key('last-name', Validator::alpha(' ', '-'))
        ->key('first-name', Validator::alpha(' ', '-'))
        ->key('birthday', Validator::date())
        ->key('distinctive-sign', Validator::stringType())
        ->key('psy-profile', Validator::stringType())
        ->key('accreditation', Validator::intVal()->between(1, 3))
        ->key('informations', Validator::stringType())
        ->key('last-address', Validator::stringType())
        ->check($_POST);
      Validator
        ::key('photo', Validator::key('tmp_name', Validator::image()))
        ->check($_FILES);
      $photoName = basename($_FILES['photo']['name']);
      $photoPath = realpath(__DIR__.'/../public/images/').'/'.$photoName;
      if (!move_uploaded_file($_FILES['photo']['tmp_name'], $photoPath)){
        throw new \Exception('Impossible de téléverser l\'image');
      }
    }
    catch (\Exception $exception){
      $response->setParam('values', $_POST);
      $response->setParam('alert', [
        'type' => 'danger',
        'message' => $exception->getMessage()
      ]);
      return $this->dispatchCreateGET($request, $response);
    }
    $manager = App::getEntityManager();
    $criminal = new Recherches;
    $criminal
      ->setNomR($_POST['last-name'])
      ->setPrenomR($_POST['first-name'])
      ->setDateNaissanceR(new \DateTime($_POST['birthday']))
      ->setSigneDistinctifR($_POST['distinctive-sign'])
      ->setProfilPsyR($_POST['psy-profile'])
      ->setNiveauAccreditation($_POST['accreditation'])
      ->setInformationsR($_POST['informations'])
      ->setDerniereAdresseR($_POST['last-address'])
      ->setNomPhotoR($photoName)
      ->setCreatedAt(new \DateTime('now'))
      ->setCreatedBy($response->getParam('username'))
      ->setUpdatedAt(new \DateTime('now'))
      ->setUpdatedBy($response->getParam('username'))
    ;
    $manager->persist($criminal);
    $manager->flush();
    $request->setParam(1, $criminal->getIdR());
    $response->setParam('alert', [
      'type' => 'success',
      'message' => 'La fiche a été enregistrée en base de données.'
    ]);
    return $this->dispatchRead($request, $response);
  }

}