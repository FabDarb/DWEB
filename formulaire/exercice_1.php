<html>
<head>
    <title>Exemple1</title>
</head>
<body>
<?php
    $chois = array('Insuffisant', 'Suffisant', 'Bien', 'Très bien');
    echo "<form action=\"result.php\" method=\"post\">";
    echo "<input type=\"text\" name=\"Nom Utilisateur\"><br>";
    echo "<input type=\"email\" name=\"e-mail\"><br>";
    echo "<select name=\"note\">";
        echo "<option value=\"1\">$chois[0]</option>";
        echo "<option value=\"2\">$chois[1]</option>";
        echo "<option value=\"3\">$chois[2]</option>";
        echo "<option value=\"4\">$chois[3]</option>";
    echo "</select><br>";
    echo "<label for=\"piece\">une petite pièce</label><br>";
    echo "<textarea name=\"Message\" id=\"piece\"></textarea><br>";
    echo "<input type=\"radio\" name=\"Genre\" value=\"H\">Homme<br>";
    echo "<input type=\"radio\" name=\"Genre\" value=\"F\">Femme<br>";
    echo "Inscription à newsletter : <input type=\"checkbox\" name=\"Inscription\" value=\"1\"><br>";
    echo "<input type=\"submit\" name=\"send\" value=\"envoyer\">";
echo "</form>";
?>
</body>
</html>