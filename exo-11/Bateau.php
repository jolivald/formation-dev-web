<?php

/**
 * Représente un bateau dans le système.
 */
class Bateau {

  private $id;
  private $nom;
  private $modele;
  private $taille;
  private $voilier;

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
}