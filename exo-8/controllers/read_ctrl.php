<?php

// charge la config de la BDD
require_once('../config.php');

// utilise une fonction pour pouvoir stopper immédiatement en cas d'erreur
function read($pseudo) {

  // mini validation du paramètre
  if (empty($pseudo))  return ['error', 'Le pseudo est requis.'];

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

  // prepare la requête de selection SQL
  $query = $db->prepare(
    'SELECT `pseudo`, `description` FROM `user` WHERE pseudo=? LIMIT 1'
  );

  // exécute la requête avec les paramètres
  $done = $query->execute([ $pseudo ]);
  if (!$done) return ['error', 'Erreur à la lecture de l\'utilisateur.'];

  // récupère le premier utilisateur dans le résultat
  $user = $query->fetch(PDO::FETCH_ASSOC);
  if (!$user) return ['error', 'L\'utilisateur "<strong>'.htmlspecialchars($pseudo).'</strong> n\'existe pas.'];

  // message de confirmation
  return ['success', $user];

}

[$type, $message] = read($_POST['pseudo']);

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
    <?php if ($type === 'success'): ?>
      <dl>
        <dt>Pseudo</dt>
        <dd><?= htmlspecialchars($message['pseudo']) ?></dd>
        <dt>Description</dt>
        <dd><?= htmlspecialchars($message['description']) ?></dd>
      </dl>
    <?php else: ?>
      <p class="alert <?= $type ?>">
        <?= $message ?>
      </p>
    <?php endif; ?>
  </main>

</body>
</html>