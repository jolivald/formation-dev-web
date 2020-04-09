<?php

/**
 * Représente les différentes coordonnées
 */
class Coordonnees {
    /**
     * @var integer $_id Identifiant des différentes coordonnées
     */
    private $_id;

    /**
     * @var integer $_id_trajet Identifiant du trajet 
     */
    private $_id_trajet;

    /**
     * @var float $_latitude Représente la latitude d'une coordonnée
     */
    private $_latitude;

    /**
     * @var float $_longitude Représente la longitude d'une coordonnée
     */
    private $_longitude;

    /**
     * @param datetime|string $_temps Représente le moment de passage à la coordonnée donné 
     */
    private $_temps;

    private $_trajet;
    private $_port;


//getter

    /**
     * Get $_id Identifiant des différentes coordonnées
     *
     * @return  integer
     */ 
    public function get_id()
    {
        return $this->_id;
    }

    

    /**
     * Get $_id_trajet Identifiant du trajet
     *
     * @return  integer
     */ 
    public function get_id_trajet()
    {
        return $this->_id_trajet;
    }

    

    /**
     * Get $_latitude Représente la latitude d'une coordonnée
     *
     * @return  float
     */ 
    public function get_latitude()
    {
        return $this->_latitude;
    }

    

    /**
     * Get $_longitude Représente la longitude d'une coordonnée
     *
     * @return  float
     */ 
    public function get_longitude()
    {
        return $this->_longitude;
    }

    

    /**
     * Get the value of _temps
     */ 
    public function get_temps()
    {
        return $this->_temps;
    }

    /**
     * Get the value of _trajet
     */ 
    public function get_trajet()
    {
        return $this->_trajet;
    }

    /**
     * Get the value of _port
     */ 
    public function get_port()
    {
        return $this->_port;
    }



    //setter
    
    /**
     * Set $_id Identifiant des différentes coordonnées
     *
     * @param  integer  $_id  $_id Identifiant des différentes coordonnées
     *
     * @return  self
     */ 
    public function set_id($_id)
    {
        $this->_id = $_id;

        return $this;
    }

    /**
     * Set $_id_trajet Identifiant du trajet
     *
     * @param  integer  $_id_trajet  $_id_trajet Identifiant du trajet
     *
     * @return  self
     */ 
    public function set_id_trajet($_id_trajet)
    {
        $this->_id_trajet = $_id_trajet;

        return $this;
    }
    

    /**
     * Set $_latitude Représente la latitude d'une coordonnée
     *
     * @param  float  $_latitude  $_latitude Représente la latitude d'une coordonnée
     *
     * @return  self
     */ 
    public function set_latitude(float $_latitude)
    {
        $this->_latitude = $_latitude;

        return $this;
    }

    /**
     * Set $_longitude Représente la longitude d'une coordonnée
     *
     * @param  float  $_longitude  $_longitude Représente la longitude d'une coordonnée
     *
     * @return  self
     */ 
    public function set_longitude(float $_longitude)
    {
        $this->_longitude = $_longitude;

        return $this;
    }

    /**
     * Set the value of _temps
     *
     * @return  self
     */ 
    public function set_temps($_temps)
    {
        $this->_temps = $_temps;

        return $this;
    }

}