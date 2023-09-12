<?php
session_start();
?>

<html>
<head>
    <title>Exemple1</title>
    <style>
        body{
            cursor: url("../recap/Balle_Turbo_32x32.png"), auto;
        }
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
$tabavant = array();
include_once("avion.inc.php");
$vol = 'aller';
if($_SESSION != null){$vol = 'retour';}
$mtn = date('j.m.Y');
$dem = strtotime($mtn.'+ 1 days');
$demain = date('j.m.Y', $dem);
define('GENEV', 'Genève GVA');
$gen = explode(' ', GENEV)[1];
$g = explode(' ', GENEV)[0];
$ouEstGen = array_search("Genève GVA\r\n", $list);
$categories = array('cat_1' => 1, 'cat_2' => 0, 'cat_3' => 0);
if($_SESSION != null){
    foreach ($_SESSION['vols'] as $test)
    $categories = array('cat_1' => $test['adultes'], 'cat_2' => $test['enfants'], 'cat_3' => $test['bebes']);
}
echo "<div class='start'>";
    echo "<img src=\"./image/logo-swiss-2x.png\">";
    echo "<h1>"."Réservez votre vol ".$vol."</h1>";
echo "</div>";


echo "<div class='d'>";
echo "<table>";
    echo "<form action='result.php' method='post'>";
echo "<tr>";

    echo "<td>"."<p>De</p>"."</td>";

echo "<td>";
        echo "<select name='depart' >";
            foreach ($avion as $key => $lePetiteAvion){
                if($_SESSION == null && $key == "GVA\r\n"){
                    echo "<option value=".$key." selected >".$lePetiteAvion."</option>";
                }else{
                    if($_SESSION != null && $_SESSION['vols'][0]['destination']."\r\n" == $key){
                        echo "<option value=".$_SESSION['vols'][0]['destination']." selected >".$avion[$_SESSION['vols'][0]['destination']."\r\n"]."</option>";
                    }
                    else{
                        echo "<option value=".$key.">".$lePetiteAvion."</option>";
                    }

                }
                # de quentin pozner
            }
        echo "</select>";
echo "</td>";

echo "<td>"."<p>À</p>"."</td>";

echo "<td>";
echo "<select name='destination'>";
    foreach ($avion as $key => $lePetiteAvion){
        if($_SESSION != null && $_SESSION['vols'][0]['depart']."\r\n" == $key){
            echo "<option value=".$_SESSION['vols'][0]['depart']." selected >".$avion[$_SESSION['vols'][0]['depart']."\r\n"]."</option>";
        }
        else{
            echo "<option value=".$key.">".$lePetiteAvion."</option>";
        }

    }
echo "</select>";
echo "</td>";

echo "</tr>";

echo "<tr>";
    echo "<td>"."<p>Date</p>"."</td>";
    echo "<td>"."<input type='date' name='date'>"."</td>";

echo "</tr>";
echo "</table>";
echo "<br>";
echo "<table class='test'>";

echo "<tr>";
echo "<td>"."<p>Adultes</p>"."</td>";
echo "<td>"."<input type='number' name='adultes' value=$categories[cat_1] min='1' max='4'>"."</td>";
echo "</tr>";

echo "<tr>";
echo "<td>"."<p>Enfants</p>"."</td>";
echo "<td>"."<input type='number' name='enfants' value=$categories[cat_2] min='0' max='4'>"."</td>";
echo "</tr>";

echo "<tr>";
echo "<td>"."<p>Bébés</p>"."</td>";
echo "<td>"."<input type='number' name='bebes' value=$categories[cat_3] min='0' max='4'>"."</td>";
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