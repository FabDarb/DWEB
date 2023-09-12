<?php
session_start();
?>
<html>
<head>
    <title>Exemple1</title>
    <style>
        th, .oui{
            background-color: lightgray;
        }
        td, th{
            width: 250px;
            border:1px solid gray;
            text-align: center;
            padding-bottom: 2px;
            padding-top: 2px;
        }
        table{
            border-collapse: collapse;
        }

    </style>
</head>
<body>
<?php
require_once ("avion.inc.php");
$quelvol = 'Réserver un vol retour';
$_SESSION['vols'][] = $_POST;
$nb = 1;
echo "<h1>Informations concernant votre vol au départ de ".$avion[$_POST['depart']."\r\n"]." et à destination de ".$avion[$_POST['destination']."\r\n"]." :</h1>";
foreach ($_SESSION['vols'] as $infos){
    echo "Départ : ".$avion[$infos['depart']."\r\n"]."(".$infos['depart'].")"."</br>";
    echo "Arrivée : ".$avion[$infos['destination']."\r\n"]."(".$infos['destination'].")"."</br>";
    echo "Date de départ : ".$infos['date']."</br>";
    foreach ($infos as $info){
        $nb = intval($infos['adultes']) + intval($infos['enfants']) + intval($infos['bebes']);
    }
    echo "Passagers : ".$nb." (".intval($infos['adultes'])." adultes, ".intval($infos['enfants'])." enfants, ".intval($infos['bebes'])." bébés"."</br>";
}
echo "<pre>";
print_r($_SESSION);
echo "</pre>";



if(count($_SESSION['vols']) >= 2){
    $quelvol = 'Autre voyage';
    session_destroy();
}
echo "<a href='exercice_2.php'>$quelvol</a>";
require_once("../recap/exercice_1.inc.php");
?>

</body>
</html>