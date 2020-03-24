<?php

// charge la config de la BDD
require_once('../config.php');

// utilise une fonction pour pouvoir stopper immédiatement en cas d'erreur
function create($pseudo, $mot_de_passe, $description) {

  // mini validation des paramètres
  if (empty($pseudo))       return ['error', 'Le pseudo est requis.'];
  if (empty($mot_de_passe)) return ['error', 'Le mot de passe et requis.'];
  if (empty($description))  return ['error', 'La description est requise.'];

  // ouvre la connection BDD
  try {
    $db = new PDO(
      'mysql:dbname='.DB_NAME.';host=127.0.0.1',
      DB_USER,
      DB_PASS
    );
  }
  catch (PDOException $e) {
    return ['error', 'Impossible de se connecter à la base de données.'];
  }

  // prepare la requête d'insertion SQL
  $query = $db->prepare(
    'INSERT INTO '.DB_TABLE.' (pseudo, mot_de_passe, description) VALUES (?, ?, ?)'
  );

  // exécute la requête avec les paramètres
  // (normalement le mot de passe devrait être haché avant insertion)
  // (le champs description est stocké tel quel et devra être sécurisé à l'affichage)
  $done = $query->execute([
    $pseudo,
    $mot_de_passe, // TODO password_hash ???
    $description
  ]);

  // message de confirmation
  return $done
    ? ['success', 'Utilisateur "<strong>'.htmlspecialchars($pseudo).'</strong>" enregistré avec succès.']
    : ['error',   'Erreur à l\'inscription d l\'utilisateur.'];
};

// appelle notre fonction en passant les paramètres POST
[$type, $message] = create(
  $_POST['pseudo'],
  $_POST['mot_de_passe'],
  $_POST['description']
);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Le CRUD PHP</title>
  <link rel="stylesheet" href="../style.css">
</head>
<body>

  <header>
    <h1>Mon CRUD</h1>
    <nav>
      <a href="../views/create.html">create</a>
      <a href="../views/read.html">read</a>
      <a href="../views/update.html">update</a>
      <a href="../views/delete.html">delete</a>
    </nav>
  </header>

  <main>
    <p class="alert <?= $type ?>">
      <?= $message ?>
    </p>
  </main>

</body>
</html>