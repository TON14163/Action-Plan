<?php
    ob_start();
?>
<h1>home</h1>
<?php 
    $content = ob_get_clean();
    require_once __DIR__ . '/layouts/Main.php';
?>
