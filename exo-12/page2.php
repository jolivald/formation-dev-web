<?php

$title = 'Page deux';
$style = 'style2.css';
ob_start();

?>

<div class="alert alert-primary" role="alert">
  <strong>Ca marche!</strong>
</div>

<?php

$content = ob_get_clean();
require 'template.php';

?>