<?php

/**
 * Classe eprésentant l'état d'un véhicule
 */
class Vehicle {

  /**
   * @var boolean $wheel_condition Etat des pneus.
   */
  private $wheel_condition;

  /**
   * @var int $fuel_level Niveau de carburant.
   */
  private $fuel_level;

  /**
   * @var boolean $engine_state Etat de démarrage du moteur.
   */
  private $engine_state;

  /**
   * Initialise une instance de la clase Vehicle.
   */
  public function __construct() {
    $this->wheel_condition = TRUE;
    $this->fuel_level = 100;
    $this->engine_state= FALSE;
  }

  /**
   * Essaye de démarrer le véhicule, il y a 80% de chances pour que le véhicule démarre.
   * 
   * @return boolean Vrai si le moteur a démarré.
   */
  public function engine_start() {
    $random = mt_rand(0, 100);
    $this->engine_state = $random < 80;
    return $this->engine_state;
  }

  /**
   * Accesseur de l'attribut wheel_condition.
   * 
   * @return boolean Etat des pneus.
   */
  public function getWheelCondition(){
    return $this->wheel_condition;
  }

  /**
   * Accesseur de l'attribut fuel_level.
   * 
   * @return int Niveau de carburant.
   */
  public function getFuelLevel(){
    return $this->fuel_level;
  }

  /**
   * Accesseur de l'attribut engine_state.
   * 
   * @return boolean Etat de démarrage du moteur.
   */
  public function getEngineState(){
    return $this->engine_state;
  }

}