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
</head>
<body>
  <table>
    <tr>
      <th colspan="2">
        <?= $vehicle1->getEngineState()
          ? 'Engine started well'
          : 'Engine did not start well'
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
  </table>
</body>
</html>