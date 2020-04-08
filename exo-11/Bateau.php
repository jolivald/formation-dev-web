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

  public function __construct() {
    
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