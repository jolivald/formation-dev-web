<?php

/**
 * Représente un bateau dans le système.
 */
class Bateau {

  // données provenant de la table bateau
  private $id;
  private $nom;
  private $modele;
  private $taille;
  private $voilier;
  private $created_by;
  private $updated_by;
  private $created_date;
  private $updated_date;

  // données provenant de relations avec la table bateau
  private $proprietaires;
  private $entretiens;
  private $trajets;

  /**
   * Crée une instance de la classe bateau et l'hydrate avec les valeurs provenant de la BDD.
   * 
   * @param array $values Tableau asociatif des valeurs associées à un bateau.
   */
  public function __construct($values) {
    $this->setId($values['id']);
    $this->setNom($values['nom']);
    $this->setModele($values['modele']);
    $this->setTaille($values['taille']);
    $this->setVoilier((boolean) $values['voilier']);
    $this->setCreated_by($values['created_by']);
    $this->setUpdated_by($values['updated_by']);
    $this->setCreated_date($values['created_date']);
    $this->setUpdated_date($values['updated_date']);
    $this->setProprietaires($values['propietaires']);
    $this->setEntretiens($values['entretiens']);
    $this->setTrajets($values['trajets']);
  }


  /**
   * Get the value of id
   */ 
  public function getId() {
    return $this->id;
  }

  /**
   * Set the value of id
   *
   * @return self
   */ 
  public function setId($id) {
    $this->id = $id;
    return $this;
  }

  /**
   * Get the value of nom
   */ 
  public function getNom() {
    return $this->nom;
  }

  /**
   * Set the value of nom
   *
   * @return self
   */ 
  public function setNom($nom) {
    $this->nom = $nom;
    return $this;
  }

  /**
   * Get the value of modele
   */ 
  public function getModele() {
    return $this->modele;
  }

  /**
   * Set the value of modele
   *
   * @return self
   */ 
  public function setModele($modele) {
    $this->modele = $modele;
    return $this;
  }

  /**
   * Get the value of taille
   */ 
  public function getTaille() {
    return $this->taille;
  }

  /**
   * Set the value of taille
   *
   * @return self
   */ 
  public function setTaille($taille) {
    $this->taille = $taille;
    return $this;
  }

  /**
   * Get the value of voilier
   */ 
  public function getVoilier() {
    return $this->voilier;
  }

  /**
   * Set the value of voilier
   *
   * @return self
   */ 
  public function setVoilier($voilier) {
    $this->voilier = $voilier;
    return $this;
  }
  
  /**
   * Get the value of created_by
   */ 
  public function getCreated_by() {
    return $this->created_by;
  }

  /**
   * Set the value of created_by
   *
   * @return self
   */ 
  public function setCreated_by($created_by) {
    $this->created_by = $created_by;
    return $this;
  }

  /**
   * Get the value of updated_by
   */ 
  public function getUpdated_by() {
    return $this->updated_by;
  }

  /**
   * Set the value of updated_by
   *
   * @return self
   */ 
  public function setUpdated_by($updated_by) {
    $this->updated_by = $updated_by;
    return $this;
  }

  /**
   * Get the value of created_date
   */ 
  public function getCreated_date() {
    return $this->created_date;
  }

  /**
   * Set the value of created_date
   *
   * @return self
   */ 
  public function setCreated_date($created_date) {
    $this->created_date = $created_date;
    return $this;
  }

  /**
   * Get the value of updated_date
   */ 
  public function getUpdated_date() {
    return $this->updated_date;
  }

  /**
   * Set the value of updated_date
   *
   * @return self
   */ 
  public function setUpdated_date($updated_date) {
    $this->updated_date = $updated_date;
    return $this;
  }

  /**
   * Get the value of proprietaires
   */ 
  public function getProprietaires() {
    return $this->proprietaires;
  }

  /**
   * Set the value of proprietaires
   *
   * @return self
   */ 
  public function setProprietaires($proprietaires) {
    $this->proprietaires = $proprietaires;
    return $this;
  }
  /**
   * Get the value of entretiens
   */ 
  public function getEntretiens() {
    return $this->entretiens;
  }

  /**
   * Set the value of entretiens
   *
   * @retur  self
   */ 
  public function setEntretiens($entretiens) {
    $this->entretiens = $entretiens;
    return $this;
  }

  /**
   * Get the value of trajets
   */ 
  public function getTrajets() {
    return $this->trajets;
  }

  /**
   * Set the value of trajets
   *
   * @return self
   */ 
  public function setTrajets($trajets) {
    $this->trajets = $trajets;
    return $this;
  }

}