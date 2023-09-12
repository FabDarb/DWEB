<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Test végétarien</title>
</head>
<body>
<h2>Testez votre capacité à devenir végétarien</h2>
<?php
require_once("includes/data.inc.php");

// avant les questions
if($_POST == null && $_SESSION == null) {
    echo "<form action=\"index.php\" method=\"post\">";
        echo "Prénom <input type=\"text\" name=\"prenom\"></br>";
    echo    "<input type=\"submit\" name=\"démarrer\" value=\"Débuter le test\">";
    echo "</form>";
    // le début pour les questions
}else{
    $result = null;
    if($_SESSION == null){
        $_SESSION['vegi']['reponses']['A'] = 0;
        $_SESSION['vegi']['reponses']['B'] = 0;
        $_SESSION['vegi']['reponses']['C'] = 0;
        $_SESSION['vegi']['prenom'] = $_POST['prenom'];
        $_SESSION['vegi']['num_question'] = 0;
    }
    if(key_exists('envoie', $_POST)){
        $_SESSION['vegi']['reponses'][$_POST['reponse']] += 1;
        $_SESSION['vegi']['num_question'] += 1;
    }
    $numQ = $_SESSION['vegi']['num_question'];
    if($numQ == 9){
        echo "<h3>Résultat du test</h3></br>";
        $ancienNb = 0;
        $ancienKey = null;
        foreach ($_SESSION['vegi']['reponses'] as $key => $nombre){
            if($nombre > $ancienNb){$ancienNb = $nombre; $ancienKey = $key;}
        }
        echo "Vous avez obtenu un maximum de ".$ancienKey;

        echo "<h2>".$tab['resultat'][$ancienKey]['titre']."</h2>";
        echo $tab['resultat'][$ancienKey]['details'];
        echo "<br>";
        session_destroy();
    }else{
        echo "<h3>Question " .($_SESSION['vegi']['num_question'] + 1)."</h3>";

        echo $tab['question'][$numQ]['texte'];
        echo "<form action='index.php' method='post'>";
        echo "<input type='radio' name='reponse' value='B'>".$tab['question'][$numQ]['rep_1']."<br>";
        echo "<input type='radio' name='reponse' value='C'>".$tab['question'][$numQ]['rep_2']."<br>";
        echo "<input type='radio' name='reponse' value='A'>".$tab['question'][$numQ]['rep_3']."<br>";
        echo "<input type='submit' name='envoie' value='question suivante'>";
        echo "</form>";
    }
}

echo "<pre>";
echo print_r($_SESSION);
echo "</pre>";
?>
<!--<a href="destroy.php">remove</a> -->
</body>
</html>