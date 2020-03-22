<?php

// config de l'environnement
define('DB_USER',  'changez moi');
define('DB_PASS',  'changez moi');
define('DB_NAME',  'test');
define('DB_TABLE', 'user');

// accepte uniquement la méthode POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') exit('nope');

// récupère les paramètres
$lastName  = $_POST['last-name'];
$firstName = $_POST['first-name'];
$password  = $_POST['password'];

// mini validation des paramètres
if (empty($lastName))  exit('Le nom est requis.');
if (empty($firstName)) exit('Le prénom est requis.');
if (empty($password))  exit('Le mot de passe est requis.');

// ouvre la connection BDD
try {
  $db = new PDO(
    'mysql:dbname='.DB_NAME.';host=127.0.0.1',
    DB_USER,
    DB_PASS
  );
}
catch (PDOException $e) {
  exit('Impossible de se connecter à la base de données.');
}

// prepare la requête d'insertion SQL
$query = $db->prepare(
  'INSERT INTO '.DB_TABLE.' (lastName, firstName, password) VALUES (?, ?, ?)'
);

// execute la requête avec les paramètres
$done = $query->execute([
  $lastName,
  $firstName,
  password_hash($password, PASSWORD_DEFAULT)
]);

// message de confirmation
echo ($done
  ? 'Utilisateur inscrit avec succès.'
  : 'Erreur à l\'inscription de l\'utilisateur.'
);

?>