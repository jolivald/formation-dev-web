<?php

/**
 * Représente une catégorie d'entretien d'un bateau
 */
class Categorie {

  /**
   * @var integer $_id Identifiant unique du bateau
   */
  private $_id;

  /**
   * @var string $_nom Nom du bateau
   */
  private $_nom;

  /**
   * @var array Liste des entretiens où a eu lieu cette catégorie
   */
  private $_entretiens;

  
  /**
   * Get $_id Identifiant unique du bateau
   *
   * @return  integer
   */ 
  public function get_id()
  {
    return $this->_id;
  }

  /**
   * Set $_id Identifiant unique du bateau
   *
   * @param  integer  $_id  $_id Identifiant unique du bateau
   *
   * @return  self
   */ 
  public function set_id($_id)
  {
    $this->_id = $_id;

    return $this;
  }

  /**
   * Get $_nom Nom du bateau
   *
   * @return  string
   */ 
  public function get_nom()
  {
    return $this->_nom;
  }

  /**
   * Set $_nom Nom du bateau
   *
   * @param  string  $_nom  $_nom Nom du bateau
   *
   * @return  self
   */ 
  public function set_nom(string $_nom)
  {
    $this->_nom = $_nom;

    return $this;
  }

  /**
   * Get liste des entretiens où a eu lieu cette catégorie
   *
   * @return  array
   */ 
  public function get_entretiens()
  {
    return $this->_entretiens;
  }

  /**
   * Set liste des entretiens où a eu lieu cette catégorie
   *
   * @param  array  $_entretiens  Liste des entretiens où a eu lieu cette catégorie
   *
   * @return  self
   */ 
  public function set_entretiens(array $_entretiens)
  {
    $this->_entretiens = $_entretiens;

    return $this;
  }
}