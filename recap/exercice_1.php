<html>
<head>
    <title>Bulletin</title>
    <style>
        h2{
            margin-left: -50px;
        }
        td{
            width:600px;
            padding-left: 150px;
            font-weight: bold;
        }
        .nnpadding{
            padding-left: 20px;
        }
        .moy{
            padding-left: 100px;
        }
        .trmoy td{
            padding-top: 20px;
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
            echo "<td>".$key."  ".$laNote['desc']."</td>";
            if($laNote['note'] >= 4){
                echo "<td style='color: yellowgreen' class='nnpadding'>".number_format($laNote['note'], 1)."</td>";
            }else{
                echo "<td style='color: red' class='nnpadding'>".number_format($laNote['note'], 1)."</td>";
            }

        echo "</tr>";
    }
}

function testcolor($note, $nb){
    if($nb == 1){
        if($note >= 4){
            echo "<td style='color: yellowgreen' class='nnpadding'>".number_format($note, 1)."</td>";
        }else{
            echo "<td style='color: red' class='nnpadding'>".number_format($note, 1)."</td>";
        }
    }elseif($nb == 0){
        if($note >= 4){
            echo "<td style='color: yellowgreen' class='moy'>".number_format($note, 1)."</td>";
        }else{
            echo "<td style='color: red' class='moy'>".number_format($note, 1)."</td>";
        }
    }else{
        if($note >= 4){
            echo "<td style='color: yellowgreen'><h2>".number_format($note, 1)."</h2></td>";
        }else{
            echo "<td style='color: red'><h2>".number_format($note, 1)."</h2></td>";
        }
    }
}
//note TPI
$TPI = 0;

$comp_info = array();
$CIE = array();
$module = file('tout_les_modules.txt');

$ok = 0;
foreach($module as $unit){
    $u = explode('  ', $unit);
    if($u[0] == "TPI") {
        $TPI = $u[1];
        break;
    }
    if("CIE\r\n" == end($u )|| $ok == 1){
        if($ok == 0){
            $ok = 1;
        }
        else {
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
<h1>Bulletin ICH</h1>
<table>
    <tr>
        <td><h2>Modules de compétences en informatique</h2></td>
    </tr>

    <?php dessinTab($comp_info); ?>

    <tr>
        <td><h2>Cours Interentreprises</h2></td>
    </tr>

    <?php dessinTab($CIE); ?>

    <tr>
        <td><h2>Compétences en informatique</h2></td>
    </tr>

    <tr>
        <td>Modules de compétences en informatique</td>
        <?php testcolor($moyenne_comp_info, 1); ?>
    </tr>

    <tr>
        <td>Cours Interentreprises</td>
        <?php testcolor($moyenne_cie, 1); ?>
    </tr>

    <tr class="trmoy">
        <td>Moyenne</td>
        <?php testcolor($moyenne, 0); ?>
    </tr>

    <tr>
        <td><h2>TPI</h2></td>
    </tr>

    <tr>
        <td>Moyenne</td>
        <?php testcolor($TPI, 0); ?>
    </tr>

    <tr class="trmoy">
        <td><h2>Note globale</h2></td>
        <?php testcolor($globalNote, 3); ?>
    </tr>
</table>
</body>
</html>