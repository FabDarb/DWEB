<html>
<head>
    <title>Exemple1</title>
    <style>

    </style>
</head>
<body>
<?php
$tab = array();
for($i=1;$i<=12;$i++){
    $tab[$i] = 7*$i;
}
echo "<h2>"."Livret de 7"."</h2>";
echo "<br>";
for($i=1;$i<=12;$i++){
echo "$i * 7 = $tab[$i]";
echo "<br>";
}
?>
</body>
</html>