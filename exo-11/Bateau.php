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
   * @var string $_nom Nom bu bateau
   */
  private $_nom;


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
    $this->set_nom($values['nom']);
    $this->set_modele($values['modele']);
    $this->set_taille($values['taille']);
    $this->set_voilier((boolean) $values['voilier']);
    $this->set_proprietaires($values['propietaires']);
    $this->set_entretiens($values['entretiens']);
    $this->set_trajets($values['trajets']);
  }

  /**
   * Get the value of _id
   */ 
  public function get_id()
  {
    return $this->_id;
  }

  /**
   * Set the value of _id
   *
   * @return  self
   */ 
  public function set_id($_id)
  {
    $this->_id = $_id;

    return $this;
  }

  /**
   * Get the value of _nom
   */ 
  public function get_nom()
  {
    return $this->_nom;
  }

  /**
   * Set the value of _nom
   *
   * @return  self
   */ 
  public function set_nom($_nom)
  {
    $this->_nom = $_nom;

    return $this;
  }

  /**
   * Get the value of _modele
   */ 
  public function get_modele()
  {
    return $this->_modele;
  }

  /**
   * Set the value of _modele
   *
   * @return  self
   */ 
  public function set_modele($_modele)
  {
    $this->_modele = $_modele;

    return $this;
  }

  /**
   * Get the value of _taille
   */ 
  public function get_taille()
  {
    return $this->_taille;
  }

  /**
   * Set the value of _taille
   *
   * @return  self
   */ 
  public function set_taille($_taille)
  {
    $this->_taille = $_taille;

    return $this;
  }

  /**
   * Get the value of _voilier
   */ 
  public function get_voilier()
  {
    return $this->_voilier;
  }

  /**
   * Set the value of _voilier
   *
   * @return  self
   */ 
  public function set_voilier($_voilier)
  {
    $this->_voilier = $_voilier;

    return $this;
  }

  /**
   * Get the value of _proprietaires
   */ 
  public function get_proprietaires()
  {
    return $this->_proprietaires;
  }

  /**
   * Set the value of _proprietaires
   *
   * @return  self
   */ 
  public function set_proprietaires($_proprietaires)
  {
    $this->_proprietaires = $_proprietaires;

    return $this;
  }

  /**
   * Get the value of _entretiens
   */ 
  public function get_entretiens()
  {
    return $this->_entretiens;
  }

  /**
   * Set the value of _entretiens
   *
   * @return  self
   */ 
  public function set_entretiens($_entretiens)
  {
    $this->_entretiens = $_entretiens;

    return $this;
  }

  /**
   * Get the value of _trajets
   */ 
  public function get_trajets()
  {
    return $this->_trajets;
  }

  /**
   * Set the value of _trajets
   *
   * @return  self
   */ 
  public function set_trajets($_trajets)
  {
    $this->_trajets = $_trajets;

    return $this;
  }
}