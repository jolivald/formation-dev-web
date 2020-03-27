<?php

// charge la config de la BDD
require_once('config.php');

/**
 * Regroupe les fonctions CRUD de la table user.
 */
class User
{

  /**
   * Ouvre la connection à la base de données.
   * 
   * @throws Exception En cas d'erreur de connection.
   */
  public function __construct(){
    try {
      $this->db = new PDO(
        'mysql:dbname='.DB_NAME.';host=127.0.0.1',
        DB_USER,
        DB_PASS
      );
    }
    catch (PDOException $e){
      throw new Exception('Impossible de se connecter à la base de données.');
    }
  }

  /**
   * Ferme la connection à la base de données.
   */
  public function __destruct() {
    $this->db = null;
  }

  /**
   * Vérifie si un utilisateur est enregistré en base de données.
   * 
   * @param string $pseudo Pseudonyme de l'utilisateur.
   * @return boolean Vrai si le pseudonyme est enregistré en BDD.
   * @throws Exception En cas d'erreur de lecture.
   */
  public function exists($pseudo){
    $query = $this->db->prepare(
      'SELECT COUNT(pseudo) as count FROM '.DB_TABLE.' WHERE pseudo=?'
    );
    $done = $query->execute([$pseudo]);
    if (!$done) throw new Exception('Erreur à la lecture de la table des utilisateurs.');
    $result = $query->fetch(PDO::FETCH_ASSOC);
    return $result['count'] > 0;
  }

  /**
   * Ajoute un utilisateur à la base de données.
   * 
   * @param string $pseudo Pseudonyme de l'utilisateur.
   * @param string $mot_de_passe Mot de passe de l'utilisateur.
   * @param string $description Description de l'utilisateur.
   * @throws Exception En cas d'erreur d'écriture.
   */
  public function create($pseudo, $mot_de_passe, $description){
    $query = $this->db->prepare(
      'INSERT INTO '.DB_TABLE.' (`pseudo`, `mot_de_passe`, `description`) VALUES (?, ?, ?)'
    );
    $done = $query->execute([$pseudo, $mot_de_passe, $description]);
    if (!$done) throw new Exception('Erreur à l\'écriture dans la table des utilisateurs.');
  }

  /**
   * Lit un utilisateur enregistré en base de données.
   * 
   * @param string $pseudo Pseudonyme de l'utilisateur.
   * @throws Exception En cas d'erreur de lecture.
   */
  public function read($pseudo){
    $query = $this->db->prepare(
      'SELECT pseudo, description FROM '.DB_TABLE.' WHERE pseudo=?'
    );
    $done = $query->execute([$pseudo]);
    if (!$done) throw new Exception('Erreur à la lecture de la table des utilisateurs.');
    $result = $query->fetch(PDO::FETCH_NUM);
    if (!$result) throw new Exception('L`utilisateur <strong>'.htmlspecialchars($pseudo).'</strong> n\'existe pas.');
    return $result;
  }
}

?>