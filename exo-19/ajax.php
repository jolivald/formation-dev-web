<?php

// arrête le traitement si on ne reçoit pas les paramètres email et keypass
if (empty($_REQUEST['email']) || empty($_REQUEST['keypass'])){
  exit(json_encode([ 'success' => false ]));
}

// ouvre une connection à la base de données
try {
  $db = new PDO('mysql:dbname=ajax_defi;host=127.0.0.1', 'shefla', '357_Pancho');
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
}
catch (\PDOException $e){
  exit('Erreur: '.$e->getMessage());
}

// http POST => inscription
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
  // le but est de créer un nouvel utilisateur
  $req = $db->prepare('INSERT INTO user (id, email, keypass, created_at) VALUES (NULL, :email, :keypass, NOW())');
  // pas besoin d'utiliser htmlspecialchars, la requête préparée assainit les paramètres
  $done = $req->execute([
    'email'   => $_POST['email'],
    'keypass' => password_hash($_POST['keypass'], PASSWORD_DEFAULT)
  ]);
  // la réponse renvoyée en JSON dépend du résultat de l'insertion SQL
  echo json_encode([ 'success' => $done ]);
}
// http GET => connection
else {
  // récupère l'utilisateur enregistré avec cette adresse email
  $req = $db->prepare('SELECT * FROM user WHERE email = :email');
  $req->execute([ 'email' => $_GET['email'] ]);
  $user = $req->fetch(PDO::FETCH_ASSOC);
  // si il n'y a pas d'utilisateur on arrête le traitement
  if (!$user){ exit(json_encode([ 'success' => false ])); }
  // sinon on continue et vérifie si les mots de passe correspondent
  $done = password_verify($_GET['keypass'], $user['keypass']);
  if ($done){
    // si le mot de passe est validé on ouvre une session
    session_start([
      'cookie_lifetime'  => 0,
      'use_cookies'      => 'On',
      'use_only_cookies' => 'On',
      'use_strict_mode'  => 'On',
      'cookie_httponly'  => 'On',
      'cache_limiter'    => 'nocache'
    ]);
    // stocke les valeurs de l'utilisateur dans la session
    $_SESSION['id']    = $user['id'];
    $_SESSION['email'] = $user['email'];
  }
  // la réponse renvoyé en JSON dépend de la vérification du mot de passe
  echo json_encode([ 'success' => $done ]);
}