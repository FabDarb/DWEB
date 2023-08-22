<html>
<head>
    <title>Exemple1</title>
    <style>
        th{
            text-align: center;
            color: black;
        }
    </style>
</head>
<body>
<?php
$donne = array('Clef' => 'Valeur', 'nom' => 'Darbellay', 'prenom' => 'Fabien', 'adresse' => 'Haut du Village 20', 'npa' => '2536', 'ville' => 'Plagne', 'email' => 'Fabien.Darbellay@ceff.ch');
echo "\n"."<h2>"."Exercice boucle FOREACH"."</h2>";
echo "\n"."<table>";
echo "\n\t"."<tbody>";
Foreach($donne as $key => $val){
    echo "\n\t\t"."<tr>";
    if($key  == 'Clef'){
        echo "\n\t\t\t"."<th>"."$key"."</th>";
        echo "\n\t\t\t"."<th>"."$val"."</th>";
    }else{
        echo "\n\t\t\t"."<td>"."$key"."</td>";
        echo "\n\t\t\t"."<td>"."$val"."</td>";
    }
    echo "\n\t\t"."</tr>";
}
echo "\n\t"."</tbody>";
echo "\n"."</table>"."\n";
?>
</body>
</html>