<html>
<head>
    <title>Bulletin</title>
    <style>
        td{
            font-weight: bold;
        }
        h2{
            margin-left:100px;
        }
        table{
            margin-left: 170px;
        }
        td{
            width: 550px;
        }
        .moy1Dif td{
            width: 320px;
            height: 50px;
        }
        .viser{
            text-align: right;
        }
        .moy2Dif td{
            width: 320px;
        }
        div{
            display: flex;
            height: 50px;
        }
        .noteFinal{
            margin-left: 570px;
        }
    </style>
</head>
<body>
<?php
//là j'ai créé une fonction pour m'éviter d'écrire plusieur fois le calcule pour arondir 5.25 à 5.5 par example
function arondir($arg_1){
    // là je prends le premier chiffre de la valeur arg_1 (ex. 4.5 = 4 ) et intval j'ai trouvé sur internet
    $sous = intval($arg_1);
    $arg_1-=$sous;
    // la une serie de if pour savoir et faire tout dépend la valeur reçu dans arg_1
    if($arg_1 >= 0.250 && $arg_1 <= 0.5){
        $dif = 0.5 - $arg_1;
        $arg_1 = $arg_1 + $dif;
        $arg_1 = $sous + $arg_1;
    }elseif($arg_1 >= 0.750){
        $arg_1 = $sous + 1;
    }elseif ($arg_1 > 0.5){
        $arg_1 = $sous + 0.5;
    }else{
        $arg_1 = $sous;
    }
    // retour de la valeur arrondi
    return $arg_1;
}

// fonction pour dessiner le tableau pour les notes
function dessinTab($tab){
    foreach ($tab as $key => $laNote){
        echo "<tr>";
            echo "<td>".$key."</td>";
            if($laNote >= 4){
                echo "<td style='color: yellowgreen'>".number_format($laNote, 1)."</td>";
            }else{
                echo "<td style='color: red'>".number_format($laNote, 1)."</td>";
            }

        echo "</tr>";
    }
}
//note TPI
$TPI = 5.2;

$comp_info = array();
$CIE = array();
$module = file('tout_les_modules.txt');

$ok = 0;
foreach($module as $unit){
    $u = explode('  ', $unit);
    if("CIE\r\n" == end($u )|| $ok == 1){
        if($ok == 0){
            $ok = 1;
        }
        else{
            $CIE[$u[0]]['desc'] = $u[1];
            $CIE[$u[0]]['note'] = floatval($u[2]);
        }
    }else{
        $comp_info[$u[0]]['desc'] = $u[1];
        $comp_info[$u[0]]['note'] = floatval($u[2]);
    }
}

// 2 variables pour les moyennes CIEs et notes infos
$moyenne_comp_info = 0;
$moyenne_cie = 0;

// 2 foreach pour addititonner les notes et après les divisers par le nombre de note total
foreach ($comp_info as $note){
    $moyenne_comp_info += $note['note'];
}
$moyenne_comp_info /= count($comp_info);

foreach ($CIE as $note){
    $moyenne_cie += $note['note'];
}
$moyenne_cie /= count($CIE);

//utilisation fonction pour arrondir
$moyenne_comp_info = arondir($moyenne_comp_info);
$moyenne_cie = arondir($moyenne_cie);

// la moyenne arondi à la première décimal le calcule c'est 4 X la moyenne info + 1 X moyenne CIE et tout ça diviser par 5
$moyenne = round(((4*$moyenne_comp_info)+$moyenne_cie)/5, 1);

// et la note globale
$globalNote = round(($TPI + $moyenne) / 2, 1);
?>
<!-- tout le html de la page avec le les variables php et la fonction d'avant et j'ai aussi mis des number format pour mettre des .0
  la fonction dessinTab permets de charger un tableau avec les tabs associatif qu'on a fait avant-->
<h1>Bulletin ICH</h1>
<h2>Modules de compétences en informatique</h2>

<table>
<?php dessinTab($comp_info); ?>
</table>

<h2>Cours Interentreprises</h2>

<table>
<?php dessinTab($CIE); ?>
</table>

<h2>Compétences en informatique</h2>

<table>
    <tr>
        <td>Modules de compétences en informatique</td>
        <td><?php echo number_format($moyenne_comp_info, 1) ?></td>
    </tr>
    <tr>
        <td>Cours Interentreprises</td>
        <td><?php echo number_format($moyenne_cie, 1) ?></td>
    </tr>
</table>
<table>
    <tr class="moy1Dif">
        <td>Moyenne</td>
        <td class="viser"><?php echo number_format($moyenne, 1) ?></td>
    </tr>

</table>

<h2>TPI</h2>

<table>
    <tr class="moy2Dif">
        <td>Moyenne</td>
        <td class="viser"><?php echo number_format($TPI, 1) ?></td>
    </tr>
</table>

<div>
    <h2>Note globale</h2>
    <h2 class="noteFinal"><?php echo number_format($globalNote, 1) ?></h2>
</div>
</body>
</html>