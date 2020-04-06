<?php

// Importe la classe Vehicle.
require 'Vehicle.php';

// Instancie la classe Vehicle
$vehicle1 = new Vehicle();

// Essaye de démarrer le moteur.
$vehicle1->engine_start();

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