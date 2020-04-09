<?php

/**
 * Représente les différentes ports
 */
class Port {

    /**
     * @var integer $_id_trajet Identifiant du trajet 
     */
    private $_id_trajet;

    /**
     * @var integer $_id_coordonees Identifiant d'une coordonnee
     */
    private $_id_coordonees;

    /**
     * @var string $_nom_port Nom de port 
     */
    private $_nom_port;

    private $_trajet;
    private $_coordonnees;


    //getter

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
     * Get $_id_coordonees Identifiant d'une coordonnee
     *
     * @return  integer
     */ 
    public function get_id_coordonees()
    {
        return $this->_id_coordonees;
    }

    /**
     * Get $_nom_port Nom de port
     *
     * @return  string
     */ 
    public function get_nom_port()
    {
        return $this->_nom_port;
    }


    /**
     * Get the value of _trajet
     */ 
    public function get_trajet()
    {
        return $this->_trajet;
    }

    /**
     * Get the value of _coordonnees
     */ 
    public function get_coordonnees()
    {
        return $this->_coordonnees;
    }


    //setter
    

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
     * Set $_id_coordonees Identifiant d'une coordonnee
     *
     * @param  integer  $_id_coordonees  $_id_coordonees Identifiant d'une coordonnee
     *
     * @return  self
     */ 
    public function set_id_coordonees($_id_coordonees)
    {
        $this->_id_coordonees = $_id_coordonees;

        return $this;
    }

    /**
     * Set $_nom_port Nom de port
     *
     * @param  string  $_nom_port  $_nom_port Nom de port
     *
     * @return  self
     */ 
    public function set_nom_port(string $_nom_port)
    {
        $this->_nom_port = $_nom_port;

        return $this;
    }

}