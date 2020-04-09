<?php

// je représente la classe
class Proprietaire

{

// je représente les attributs
private $_id;
private $_nom_proprietaire;
private $_bateaux;



public function get_id()
{
    return $this->_id;
}

public function set_id($_id)
{
    $this->_id = $_id;
    return $this;
}

public function get_nom_proprietaire()
{
    return $this->_nom_proprietaire;
}

public function set_nom_proprietaire(string $_nom_proprietaire)
{
    $this->_nom_proprietaire = $_nom_proprietaire;
    return $this;
}

/**
 * Get the value of bateaux
 */ 
public function get_bateaux()
{
return $this->_bateaux;
}

/**
 * Set the value of bateaux
 *
 * @return  self
 */ 

public function set_bateaux($_bateaux)
{
$this->_bateaux = $_bateaux;

return $this;
}
}

















