<?php

session_start([
  'cookie_lifetime'  => 0,
  'use_cookies'      => 'On',
  'use_only_cookies' => 'On',
  'use_strict_mode'  => 'On',
  'cookie_httponly'  => 'On',
  'cache_limiter'    => 'nocache'
]);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AJAX redirect</title>
  <style>
body {
  margin: 2em 10%;
}
hr {
  border: none;
  border-bottom: 1px solid gray;
}
  </style>
</head>
<body>
  <h1>AJAX redirect</h1>

  <hr/>

  <p>
    L'adresse email: <strong><?= htmlspecialchars($_SESSION['email']) ?></strong> 
    est associée avec l'identifiant: <strong><?= $_SESSION['id'] ?></strong>
  </p>
  <p><a href="index.php">Retour au formulaire</a></p>
</body>
</html>
