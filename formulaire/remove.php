<?php
session_start();
?>
<html>
<head>
    <title>Exemple1</title>
</head>
<body>
<?php

session_destroy();
print_r($_POST);
echo "</pre>";

require_once("../recap/exercice_1.inc.php");
?>
<a href="exercice_2.php">remove</a>
</body>
</html>