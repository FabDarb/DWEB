<?php
//pour désactiver erreur php sql
define("DISPLAY_ERROR", 1);

//type erreur afficher
error_reporting(E_ALL);
ini_set('display_errors', DISPLAY_ERROR);

//chemin d'accès
//echo getcwd();
define("WAY","C:\wamp64\www\ICT_133_fad\DWEB\lib_js");
define("URL","http://localhost/ICT_133_fad/DWEB/lib_js");

//base de donnée
//host
define("BASE_NAME","dweb");
//nom de la base
define("SQL_HOST","localhost");
//user de la base
define("SQL_USER","root");
//mot de passe
define("SQL_PASSWORD",null);
?>

