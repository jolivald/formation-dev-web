<?php

/**
 * Fais le lien entre un entretien et une catégorie
 */
class EntretienCategorie {

  /**
   * @var integer Identifiant de l'entretien associé
   */
  private $_entretien;

  /**
   * @var integer Identifiant de la catégorie associée
   */
  private $_categorie;

  /**
   * @var string $_derniere_validation Date de la dernière validation de cette catégorie d'entretien
   */
  private $_derniere_validation;


  /**
   * Get identifiant de l'entretien associé
   *
   * @return  integer
   */ 
  public function get_entretien()
  {
    return $this->_entretien;
  }

  /**
   * Set identifiant de l'entretien associé
   *
   * @param  integer  $_entretien  Identifiant de l'entretien associé
   *
   * @return  self
   */ 
  public function set_entretien($_entretien)
  {
    $this->_entretien = $_entretien;

    return $this;
  }

  /**
   * Get identifiant de la catégorie associée
   *
   * @return  integer
   */ 
  public function get_categorie()
  {
    return $this->_categorie;
  }

  /**
   * Set identifiant de la catégorie associée
   *
   * @param  integer  $_categorie  Identifiant de la catégorie associée
   *
   * @return  self
   */ 
  public function set_categorie($_categorie)
  {
    $this->_categorie = $_categorie;

    return $this;
  }

  /**
   * Get $_derniere_validation Date de la dernière validation de cette catégorie d'entretien
   *
   * @return  string
   */ 
  public function get_derniere_validation()
  {
    return $this->_derniere_validation;
  }

  /**
   * Set $_derniere_validation Date de la dernière validation de cette catégorie d'entretien
   *
   * @param  string  $_derniere_validation  $_derniere_validation Date de la dernière validation de cette catégorie d'entretien
   *
   * @return  self
   */ 
  public function set_derniere_validation(string $_derniere_validation)
  {
    $this->_derniere_validation = $_derniere_validation;

    return $this;
  }
}