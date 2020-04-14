<?php

$title = 'Page un';
$style = 'style1.css';
ob_start();

?>

<div class="alert alert-danger" role="alert">
  <strong>Ca marche!</strong>
</div>

<?php

$content = ob_get_clean();
require 'template.php';

?>