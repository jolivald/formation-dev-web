<?php

// Charge l'autoloader fourni par composer
require __DIR__.'/vendor/autoload.php';

// Charge la configuration de la BDD depuis le fichier .env
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

try {
  // Connexion à la base de données
  $db = new PDO(
    'mysql:dbname='.$_ENV['DB_NAME'].';host=127.0.0.1',
    $_ENV['DB_USER'],
    $_ENV['DB_PASS']
  );

  // Récupére la première entrée de la table dans un tableau associatif
  $query  = $db->query('SELECT * FROM '.$_ENV['DB_TABLE'].' LIMIT 1 ');
  $result = $query->fetch(PDO::FETCH_ASSOC);
}
catch (Exception $e){
  exit('Impossible de se connecter à la base de données.');
}

// Importe la classe Vehicle.
require 'Vehicle.php';

// Instancie la classe Vehicle en passant le résultat de la requête BDD
$vehicle1 = new Vehicle($result);

// Essaye de démarrer le moteur.
$vehicle1->engine_start();

// Fais klaxonner le véhicule avec deux méthodes différentes.
Vehicle::toHonk();
$vehicle1::toHonk();

// Affichage du tableau de bord.
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vehicle</title>
  <style type="text/css">

body {
  font-family: monospace;
  width: 350px;
  margin: 5em auto;
}
table {
  width: 100%;
  padding: 2em;
  background: #000;
  color: #CCC;
  border-radius: 1em;
}
.success {
  color: #0F0;
}
.failure {
  color: #F00;
}

  </style>
</head>
<body>
  <table>
    <tr>
      <th colspan="2">
        <?= $vehicle1->getEngineState()
          ? '<span class="success">Engine started well</span>'
          : '<span class="failure">Engine did not start well</span>'
        ?>
      </th>
    </tr>
    <tr>
      <td>Fuel level:</td>
      <td><?= $vehicle1->getFuelLevel(); ?>%</td>
    </tr>
    <tr>
      <td>Wheel condition:</td>
      <td><?= $vehicle1->getWheelCondition() ? 'good' : 'bad' ?></td>
    </tr>
    <tr>
      <td>Engine power:</td>
      <td><?= $vehicle1->getEnginePower() ?>cv</td>
    </tr>
  </table>
</body>
</html>