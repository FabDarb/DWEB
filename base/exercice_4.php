<html>
<head>
    <title>Exemple4</title>
</head>
<body>
<?php
$rayon = 4;
define('PI', M_PI);
echo "diamètre = ".($rayon*2);
echo "\n"."<br>"."\n";
echo "circonférence = ".round((2*$rayon*PI), 2);
echo "\n"."<br>"."\n";
echo "surface = ".round((PI*pow($rayon,2)), 2)."\n";
?>
</body>
</html>