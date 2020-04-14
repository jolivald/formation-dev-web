<?php

$title = 'Exercice 14 avril 2020';
ob_start();

?>

<div class="btn-group" role="group" aria-label="Basic example">
  <a href="page1.php" class="btn btn-primary">Page un</a>
  <a href="page2.php" class="btn btn-primary">Page deux</a>
</div>

<?php

$content = ob_get_clean();
require 'template.php';

?>