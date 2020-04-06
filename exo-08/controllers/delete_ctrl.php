<?php

// charge la classe User qui implémente le CRUD
require_once('../User.php');

// variables utilisées pour afficher une réponse à la requête
$alert   = '';
$message = '';

try {

  // récupère les paramètres passés en POST
  $pseudo       = $_POST['pseudo'];

  // validation des paramètres
  if (!isset($pseudo) || strlen($pseudo) < 4){
    throw new Exception('Le pseudonyme doit contenir au moins quatre caractères.');
  }

  // crée une instance de la classe User
  $user = new User();

  // vérifie que ce pseudo est bien enregistré en BDD
  if (!$user->exists($pseudo)){
    throw new Exception('L\'utilisateur <strong>'.htmlspecialchars($pseudo).'</strong> n\'existe pas.');
  }

  // supprimme l'utilisateur à la BDD
  $user->delete($pseudo);

  // mets à jour le message pour afficher la confirmation
  $alert   = 'success';
  $message = 'Utilisateur <strong>'.htmlspecialchars($pseudo).'</strong> supprimmé avec succès.';
  
}
catch (Exception $e){
  // mets à jour le message pour afficher l'erreur
  $alert   = 'error';
  $message = $e->getMessage();
}

// normalement on se sert d'un système de template pour réutiliser les vues
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
    <!-- affiche le message de confirmation ou d'erreur -->
    <?php echo sprintf('<p class="alert %s">%s</p>', $alert, $message); ?>
  </main>

</body>
</html>