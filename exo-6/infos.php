<?php

$email = htmlspecialchars($_POST['email']);
$name  = htmlspecialchars($_POST['first-name']);
$sex   = htmlspecialchars($_POST['sex']);
$clan  = htmlspecialchars($_POST['clan']);
$msg   = htmlspecialchars($_POST['msg']);
$cgu   = htmlspecialchars($_POST['cgu']);

?>

<pre>
  <?php print_r($_POST); ?>
</pre>
