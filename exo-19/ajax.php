<?php

if (empty($_REQUEST['email']) || empty($_REQUEST['keypass'])){
  exit(json_encode([ 'success' => false ]));
}

try {
  $db = new PDO('mysql:dbname=ajax_defi;host=127.0.0.1', 'shefla', '357_Pancho');
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
}
catch (\PDOException $e){
  exit('Erreur: '.$e->getMessage());
}

// inscription
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
  $req = $db->prepare('INSERT INTO user (id, email, keypass, created_at) VALUES (NULL, :email, :keypass, NOW())');
  // pas besoin d'utiliser htmlspecialchars, la requête préparée assainit les paramètres
  $done = $req->execute([
    'email'   => $_POST['email'],
    'keypass' => password_hash($_POST['keypass'], PASSWORD_DEFAULT)
  ]);
  echo json_encode([ 'success' => $done ]);
}
// connection
else {
  $req = $db->prepare('SELECT * FROM user WHERE email = :email');
  $req->execute([ 'email' => $_GET['email'] ]);
  $user = $req->fetch(PDO::FETCH_ASSOC);
  $done = password_verify($_GET['keypass'], $user['keypass']);
  if ($done){
    session_start([
      'cookie_lifetime'  => 0,
      'use_cookies'      => 'On',
      'use_only_cookies' => 'On',
      'use_strict_mode'  => 'On',
      'cookie_httponly'  => 'On',
      'cache_limiter'    => 'nocache'
    ]);
    $_SESSION['id']    = $user['id'];
    $_SESSION['email'] = $user['email'];
  }
  echo json_encode([ 'success' => $done ]);
}