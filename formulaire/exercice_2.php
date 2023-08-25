<html>
<head>
    <title>Exemple1</title>
    <style>
        img{
            width: 20%;
        }
        .start{
            width: auto;
            text-align: center;
        }
        h1{
            margin-left: -10%;
            margin-top: 30px;
        }
        .d{
            margin-left: 34%;

        }
        select, input{
            height: 30px;
        }
        p{
            font-size: 20px;
            font-weight: bold;
        }
        .test input{
            width:70px;
        }
        .test td{
            width: 75px;
        }
        .nn{
            height: 15px;
        }
        .i{
            margin-left: 200px;
        }
    </style>
</head>
<body>
<?php
define('GENEV', 'Genève GVA');
$gen = explode(' ', GENEV)[1];
$mtn = date('j.m.Y');
$dem = strtotime($mtn.'+ 1 days');
$demain = date('j.m.Y', $dem);
$list = file('liste.txt'); # de reto
echo "<div class='start'>";
    echo "<img src=\"./image/logo-swiss-2x.png\">";
    echo "<h1>"."Réservez votre vol"."</h1>";
echo "</div>";


echo "<div class='d'>";
echo "<table>";
    echo "<form action='result.php' method='post'>";
echo "<tr>";

    echo "<td>"."<p>De</p>"."</td>";

echo "<td>";
        echo "<select name='depart' >";
            echo "<option value=".$gen.">".GENEV."</option>";
            foreach ($list as $key => $item){
                echo "<option value=".$item.">".$item."</option>";
                # de quentin pozner
            }
        echo "</select>";
echo "</td>";

echo "<td>"."<p>À</p>"."</td>";

echo "<td>";
echo "<select name='destination' >";
foreach ($list as $key => $item){
    echo "<option value=".$item.">".$item."</option>";
}
echo "</select>";
echo "</td>";

echo "</tr>";

echo "<tr>";
    echo "<td>"."<p>Vol Aller</p>"."</td>";

    echo "<td>"."<input type='text' name='date_depart' value=$mtn>"."</td>";

    echo "<td>"."<p>Vol Retour</p>"."</td>";

    echo "<td>"."<input type='text' name='date_arrivee' value=$demain>"."</td>";
echo "</tr>";
echo "</table>";
echo "<br>";
echo "<table class='test'>";

echo "<tr>";
echo "<td>"."<p>Adultes</p>"."</td>";
echo "<td>"."<input type='number' name='cat_1' value='1' min='1' max='4'>"."</td>";
echo "</tr>";

echo "<tr>";
echo "<td>"."<p>Enfants</p>"."</td>";
echo "<td>"."<input type='number' name='cat_2' min='0' max='4'>"."</td>";
echo "</tr>";

echo "<tr>";
echo "<td>"."<p>Bébés</p>"."</td>";
echo "<td>"."<input type='number' name='cat_3' min='0' max='4'>"."</td>";
echo "</tr>";

echo "</table>";
echo "<br>";

echo "<input class='nn' type='checkbox' name='reserver_siege' value='1'>"." Réserver votre siège ?"."<br>";

echo "<br>";

echo "<input type='submit' name='rechercher' value='Rechercher votre Vol' class='i'>";

    echo "</form>";

echo "</div>";

?>
</body>
</html>