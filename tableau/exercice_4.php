<html>
<head>
    <title>Exemple1</title>
    <style>

    </style>
</head>
<body>
<?php
$sem = array('Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche');
$date = "31.10.2018";
$jours = strtotime($date);
$jour = date('N', $jours);
$lundi2 = strtotime($date.'-'.($jour-1).'days');
$lundi = date('j.m.Y', $lundi2);
for($i=0;$i<=6;$i++){
    $test = strtotime($lundi.'+'.$i.'days');
    $laDate = date('j m Y', $test);
    echo $laDate;
    echo "<br>";
}
echo $sem[$jour-1];
?>
</body>
</html>