<?php

// charge la classe User qui implémente le CRUD
require_once('../User.php');

// variables utilisées pour afficher une réponse à la requête
$alert   = '';
$message = '';

try {

  // récupère le pseudonyme passé en POST
  $pseudo = $_POST['pseudo'];

  // validation du pseudonyme
  if (!isset($pseudo) || strlen($pseudo) < 4){
    throw new Exception('Le pseudonyme doit contenir au moins quatre caractères.');
  }

  // crée une instance de la classe User
  $user = new User();

  // interroge la BDD au sujet de ce pseudonyme
  [$pseudo, $description] = $user->read($pseudo);

  // mets à jour le message pour afficher les infos utilisateur
  $alert   = 'success';
  $message = <<<HTM
<dl>
  <dt>Pseudo</dt>
  <dd>$pseudo</dd>
  <dt>Description</dt>
  <dd>$description</dd>
</dl>
HTM;

}
catch (Exception $e){
  // en cas d'erreur on réécrit les variables d'affichage
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
    <!-- affiche les infos utilisateur ou le message d'erreur -->
    <?php
      echo $alert === 'success'
        ? $message
        : sprintf('<p class="alert %s">%s</p>', $alert, $message);
    ?>
  </main>

</body>
</html>