<?php

// charge la classe User qui implémente le CRUD
require_once('../User.php');

// variables utilisées pour afficher une réponse à la requête
$alert   = '';
$message = '';

try {

  // récupère les paramètres passés en POST
  $pseudo       = $_POST['pseudo'];
  $mot_de_passe = $_POST['mot_de_passe'];
  $description  = $_POST['description'];

  // validation des paramètres
  if (!isset($pseudo) || strlen($pseudo) < 4){
    throw new Exception('Le pseudonyme doit contenir au moins quatre caractères.');
  }
  if (!isset($mot_de_passe) || strlen($mot_de_passe) < 4){
    throw new Exception('Le mot de passe doit contenir au moins quatre caractères.');
  }
  if (!isset($description) || empty($description)){
    throw new Exception('Le champs description est obligatoire.');
  }

  // crée une instance de la classe User
  $user = new User();

  // vérifie si un utilisateur est déjà enregistré avec ce pseudo
  if ($user->exists($_POST['pseudo'])){
    throw new Exception('Un utilisateur est déjà enregistré avec ce pseudonyme.');
  }

  // ajoute l'utilisateur à la BDD
  $user->create($pseudo, $mot_de_passe, $description);

  // mets à jour le message pour afficher la confirmation
  $alert   = 'success';
  $message = 'Utilisateur <strong>'.htmlspecialchars($pseudo).'</strong> enregistré avec succès.';
  
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