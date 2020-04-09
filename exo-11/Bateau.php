<?php

/**
 * Représente un bateau dans le système.
 */
class Bateau {

  // données provenant de la table bateau
  /**
   * @var integer $_id Identifiant unique du bateau
   */
  private $_id;

  /**
   * @var string $_nom_bateau Nom bu bateau
   */
  private $_nom_bateau;


  /**
   * @var string $_modele Modèle du bateau
   */
  private $_modele;

  /**
   * @var float $_taille Taille du bateau
   */
  private $_taille;

  /**
   * @var boolean $_voilier Vrai si le bateau est un voilier
   */
  private $_voilier;

  // données provenant de relations avec la table bateau

  /**
   * @var array $_proprietaires Liste des propriétaires du bateau
   */
  private $_proprietaires;

  /**
   * @var array $_entretiens Liste des entretiens effectués sur ce bateau
   */
  private $_entretiens;

  /**
   * @var array $_trajets Liste des trajets effectués par ce bateau
   */
  private $_trajets;

  /**
   * Crée une instance de la classe bateau et l'hydrate avec les valeurs provenant de la BDD.
   * 
   * @param array $values Tableau asociatif des valeurs associées au bateau.
   */
  public function __construct($values) {
    $this->set_id($values['id']);
    $this->set_nom_bateau($values['nom']);
    $this->set_modele($values['modele']);
    $this->set_taille($values['taille']);
    $this->set_voilier((boolean) $values['voilier']);
    $this->set_proprietaires($values['propietaires']);
    $this->set_entretiens($values['entretiens']);
    $this->set_trajets($values['trajets']);
  }


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
   * Get $_nom Nom bu bateau
   *
   * @return string
   */ 
  public function get_nom_bateau()
  {
    return $this->_nom_bateau;
  }

  /**
   * Set $_nom Nom bu bateau
   *
   * @param  string  $_nom  $_nom Nom bu bateau
   *
   * @return  self
   */ 
  public function set_nom_bateau(string $_nom_bateau)
  {
    $this->_nom_bateau = $_nom_bateau;

    return $this;
  }

  /**
   * Get $_modele Modèle du bateau
   *
   * @return  string
   */ 
  public function get_modele()
  {
    return $this->_modele;
  }

  /**
   * Set $_modele Modèle du bateau
   *
   * @param  string  $_modele  $_modele Modèle du bateau
   *
   * @return  self
   */ 
  public function set_modele(string $_modele)
  {
    $this->_modele = $_modele;

    return $this;
  }

  /**
   * Get $_taille Taille du bateau
   *
   * @return  float
   */ 
  public function get_taille()
  {
    return $this->_taille;
  }

  /**
   * Set $_taille Taille du bateau
   *
   * @param  float  $_taille  $_taille Taille du bateau
   *
   * @return  self
   */ 
  public function set_taille(float $_taille)
  {
    $this->_taille = $_taille;

    return $this;
  }

  /**
   * Get $_voilier Vrai si le bateau est un voilier
   *
   * @return  boolean
   */ 
  public function get_voilier()
  {
    return $this->_voilier;
  }

  /**
   * Set $_voilier Vrai si le bateau est un voilier
   *
   * @param  boolean  $_voilier  $_voilier Vrai si le bateau est un voilier
   *
   * @return  self
   */ 
  public function set_voilier(bool $_voilier)
  {
    $this->_voilier = $_voilier;

    return $this;
  }

  /**
   * Get $_proprietaires Liste des propriétaires du bateau
   *
   * @return  array
   */ 
  public function get_proprietaires()
  {
    return $this->_proprietaires;
  }

  /**
   * Set $_proprietaires Liste des propriétaires du bateau
   *
   * @param  array  $_proprietaires  $_proprietaires Liste des propriétaires du bateau
   *
   * @return  self
   */ 
  public function set_proprietaires(array $_proprietaires)
  {
    $this->_proprietaires = $_proprietaires;

    return $this;
  }

  /**
   * Get $_entretiens Liste des entretiens effectués sur ce bateau
   *
   * @return  array
   */ 
  public function get_entretiens()
  {
    return $this->_entretiens;
  }

  /**
   * Set $_entretiens Liste des entretiens effectués sur ce bateau
   *
   * @param  array  $_entretiens  $_entretiens Liste des entretiens effectués sur ce bateau
   *
   * @return  self
   */ 
  public function set_entretiens(array $_entretiens)
  {
    $this->_entretiens = $_entretiens;

    return $this;
  }

  /**
   * Get $_trajets Liste des trajets effectués par ce bateau
   *
   * @return  array
   */ 
  public function get_trajets()
  {
    return $this->_trajets;
  }

  /**
   * Set $_trajets Liste des trajets effectués par ce bateau
   *
   * @param  array  $_trajets  $_trajets Liste des trajets effectués par ce bateau
   *
   * @return  self
   */ 
  public function set_trajets(array $_trajets)
  {
    $this->_trajets = $_trajets;

    return $this;
  }
}