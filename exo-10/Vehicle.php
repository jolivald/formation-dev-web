<?php

/**
 * Classe eprésentant l'état d'un véhicule
 */
class Vehicle {

  /**
   * @var string $honk Son de klaxon du véhicule.
   */
  private static $honk = 'Tuuut Tuut';

  /**
   * @var int LOW_ENGINE_POWER Puissance de moteur basse.
   */
  private const LOW_ENGINE_POWER = 90;

  /**
   * @var int MID_ENGINE_POWER Puissance de moteur modérée.
   */
  private const MID_ENGINE_POWER = 110;

  /**
   * @var int HIGH_ENGINE_POWER Puissance de moteur élevée.
   */
  private const HIGH_ENGINE_POWER = 130;

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
   * @var int $engine_power Puissance du moteur.
   */
  private $engine_power;

  /**
   * Renvoie le son de klaxon du véhicule.
   * 
   * @return string Son de klaxon du véhicule.
   */  
  public static function toHonk() {
    return self::$honk;
  }

  /**
   * Initialise une instance de la classe Vehicle.
   */
  public function __construct() {
    $this->wheel_condition = TRUE;
    $this->fuel_level = 100;
    $this->engine_state = FALSE;
    $this->engine_power = self::LOW_ENGINE_POWER;
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
  public function getWheelCondition() {
    return $this->wheel_condition;
  }

  /**
   * Accesseur de l'attribut fuel_level.
   * 
   * @return int Niveau de carburant.
   */
  public function getFuelLevel() {
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

  /**
   * Accesseur de l'attribut engine_power.
   * 
   * @return int Puissance du moteur.
   */
  public function getEnginePower() {
    return $this->engine_power;
  }

}