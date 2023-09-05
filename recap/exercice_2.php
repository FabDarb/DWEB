<!
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="test.css">
    <title>oui</title>
    <style>
        body{
            cursor: url("Balle_Turbo_32x32.png"), auto;
            opacity: 5;

        }

    </style>
</head>
<body>
<h1>bulletin</h1>
<?php

$dateOrder = array();
function calcul($tab){
    $j = 0;
    foreach ($tab as $modules){
        $j += $modules['note'];
    }
    return $j;
}

function calculNul($tab){
    $nb = 0;
    foreach ($tab as $modules){
        if($modules['note'] != null){
            $nb++;
        }
    }
    if($nb == 0){$nb++;}
    return $nb;
}

function colors($nb){
    $color = 'green';
    if($nb < 4){
        $color = 'red';
    }
    return "style='color: $color'";
}

function orderDate($tab){
    $tabFin = array();
    foreach ($tab as $domaine){
        foreach ($domaine['modules'] as $key => $module){
            $dateTraiter = strtotime($module['date']);
            foreach ($tabFin as $key => $date){
                if($date < $dateTraiter){
                    $dateAvant = $date;
                    $tabFin[$key + 1] = $dateAvant;
                    $tabFin[$key] = $dateTraiter;
                }
            }
        }
    }
    return $tabFin;
}


include("./notes.inc.php");



$nbNote = 0;

/*echo "<pre>";

print_r($tab_notes);



foreach ($tab_notes AS $domaine){
    echo $domaine['desc']."</br>";

    print_r($domaine['modules']);
}

echo "</pre>";*/




echo "<table border='2px'>";
foreach ($tab_notes as $nomdomaine => $domaine){
    if(!is_array($tab_notes[$nomdomaine])){continue;}
    $domaine['moy'] = calcul($domaine['modules']);
    $nbNote = calculNul($domaine['modules']);
    $tab_notes[$nomdomaine]['moy'] = $domaine['moy'] / $nbNote;
    echo "<tr>";
    echo "<th colspan='3'>".$domaine['desc']."</th>";
    echo "<td ".colors($tab_notes[$nomdomaine]['moy']).">".$tab_notes[$nomdomaine]['moy']."</td>";
    echo "</tr>";
    //$dateOrder = orderDate($tab_notes);
    foreach ($domaine['modules'] as $key => $module){
        echo "<tr>";
            echo "<td>".$key."</td>";
        foreach ($module as $danslemodule){
            echo "<td>".$danslemodule."</td>";
        }
            /*echo "<td>".$module['desc']."</td>";
            echo "<td>".$module['date']."</td>";
            echo "<td>".$module['note']."</td>";*/
            $domaine['moy'] += $module['note'];
        echo "</tr>";
    }

}
$tab_notes['Moyenne'] = 0;
echo "</table>";

echo "<table border='2px'>";

foreach ($tab_notes as $nomdomaine => $domaine){
    if(!is_array($tab_notes[$nomdomaine])){continue;}
    echo "<tr>";
    echo "<td>".$domaine['desc']."</td>";
    echo "<td ".colors($domaine['moy']).">".$domaine['moy']."</td>";
    echo "<td>".$domaine['pond'].'%'."</td>";
    if($domaine['moy'] == 0){$tab_notes[$nomdomaine]['pond'] = 0;}
    echo "</tr>";
    $tab_notes['Moyenne'] += $domaine['moy'] * $domaine['pond'];
}
$multi = 0;
foreach ($tab_notes as $nomdomaine => $domaine){
    if(!is_array($tab_notes[$nomdomaine])){continue;}
    $multi += $domaine['pond'];

}
if($multi == 0){$multi++;}
$tab_notes['Moyenne'] = round($tab_notes['Moyenne'] / $multi, 1);
echo "<tr>";
echo "<td>Moyenne</td>";
echo "<td colspan='2' ".colors($tab_notes['Moyenne']).">".$tab_notes['Moyenne']."</td>";
echo "</tr>";
echo "</table>";

echo "<table border='2px'>";
$nbMoy = 0;
$reussi = 'réussi';
foreach ($tab_notes as $key => $domaine){
    if($key == 'globalNote'){continue;}
    if(!is_array($tab_notes[$key])){
        echo "<tr>";
            echo "<td>".$key."</td>";
            echo "<td ".colors($domaine).">".$domaine."</td>";
            if($domaine < 4){
                $reussi = 'échec';
            }
            $tab_notes['globalNote'] += $domaine;
            $nbMoy++;
        echo "</tr>";
    }

}
if($nbMoy == 0){$nbMoy++;}
$tab_notes['globalNote'] = round($tab_notes['globalNote'] / $nbMoy, 1);
echo "<tr>";
echo "<td>Note Global</td>";
echo "<td  ".colors($tab_notes['globalNote']).">".$tab_notes['globalNote']."</td>";
echo "</tr>";
echo "<tr>";
echo "<td>état du CFC</td>";
echo "<td>".$reussi."</td>";
echo "</tr>";
echo "</table>";
?>
</body>
</html>