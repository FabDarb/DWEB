<html>
<head>
    <title>Exemple1</title>
</head>
<body>
<?php
$tab = array();
for($i=1;$i<=12;$i++){
    $tab[$i] = 7*$i;
}
echo "<pre>";
print_r($tab);
echo "</pre>";
?>
</body>
</html>