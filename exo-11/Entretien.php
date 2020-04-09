<?php

class Entretien {

  /**
   * @var integer $_id Identifiant unique de cet entretien
   */
  private $_id;

  /**
   * @var integer $_bateau Identifiant unique du bateau associé
   */
  private $_bateau;

  /**
   * @var array $_categories Liste des catégories associées à cet entretien
   */
  private $_categories;


  /**
   * Get $_id Identifiant unique de cet entretien
   *
   * @return  integer
   */ 
  public function get_id()
  {
    return $this->_id;
  }

  /**
   * Set $_id Identifiant unique de cet entretien
   *
   * @param  integer  $_id  $_id Identifiant unique de cet entretien
   *
   * @return  self
   */ 
  public function set_id($_id)
  {
    $this->_id = $_id;

    return $this;
  }

  /**
   * Get $_bateau Identifiant unique du bateau associé
   *
   * @return  integer
   */ 
  public function get_bateau()
  {
    return $this->_bateau;
  }

  /**
   * Set $_bateau Identifiant unique du bateau associé
   *
   * @param  integer  $_bateau  $_bateau Identifiant unique du bateau associé
   *
   * @return  self
   */ 
  public function set_bateau($_bateau)
  {
    $this->_bateau = $_bateau;

    return $this;
  }

  /**
   * Get $_categories Liste des catégories associées à cet entretien
   *
   * @return  array
   */ 
  public function get_categories()
  {
    return $this->_categories;
  }

  /**
   * Set $_categories Liste des catégories associées à cet entretien
   *
   * @param  array  $_categories  $_categories Liste des catégories associées à cet entretien
   *
   * @return  self
   */ 
  public function set_categories(array $_categories)
  {
    $this->_categories = $_categories;

    return $this;
  }
}