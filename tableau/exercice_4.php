<html>
<head>
    <title>Exemple1</title>
    <style>

    </style>
</head>
<body>
<?php
echo "<table>";
$sem = array('Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche');
$date = "31.10.2018";
$jours = strtotime($date);
$jour = date('N', $jours);
$lundi2 = strtotime($date.'-'.($jour-1).'days');
$lundi = date('j.m.Y', $lundi2);
$nb = 0;
for($i=0;$i<=6;$i++){
    echo "<tr>";
    $test = strtotime($lundi.'+'.$i.'days');
    $laDate = date('d.m.Y', $test);
    for($j=1;$j<=2;$j++){
        if($j == 1){
            echo "<td>".$sem[$i]."</td>";
        }else{
            echo "<td>"." : ".$laDate."</td>";
        }
    }

    echo "<tr>";
}
echo "</table>";
?>
</body>
</html>