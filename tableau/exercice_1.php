<html>
<head>
    <title>Exemple1</title>
</head>
<body>
<?php
    $auj = date('w');
    //$auj = 5;
    $sem = array('Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi');
    echo "Nous sommes ".$sem[$auj];
?>
</body>
</html>