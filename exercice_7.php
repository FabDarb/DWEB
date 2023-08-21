<html>
<head>
    <title>Exemple1</title>
</head>
<body>
<?php
echo "<table>";
for($i=1;$i<=12;$i++){
    echo "<tr>";

    for($j=0;$j<=12;$j++){
        if($j == 0) {
            echo "<th>"." "."</th>";
        }else{
            echo "<th>".$j."</th>";
        }

    }
    echo "</tr>";
}
echo "</table>";
?>
</body>
</html>