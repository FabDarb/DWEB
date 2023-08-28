<html>
<head>
    <title>Exemple1</title>
    <style>
        th, .oui{
            background-color: lightgray;
        }
        td, th{
            width: 250px;
            border:1px solid gray;
            text-align: center;
            padding-bottom: 2px;
            padding-top: 2px;
        }
        table{
            border-collapse: collapse;
        }

    </style>
</head>
<body>
<?php
echo "<table>";
echo "<tr>";
echo "<th>"."Clefs"."</th>";
echo "<th>"."Valeurs"."</th>";
echo "</tr>";
$test = 0;
$_POST['date_depart'] = date('Y-m-d', strtotime($_POST['date_depart']));
$_POST['date_arrivee'] = date('Y-m-d', strtotime($_POST['date_arrivee']));
foreach ($_POST as $key => $val){
    echo "<tr>";
    if($test == 0){
        echo "<td class='nn'>".$key."</td>";
        echo "<td class='nn'>".$val."</td>";
        $test = 1;
    }else{
        echo "<td class='oui'>".$key."</td>";
        echo "<td class='oui'>".$val."</td>";
        $test = 0;
    }
    echo "</tr>";
}

echo "</table>";
echo "<pre>";
print_r($_POST);
echo "</pre>";
?>
</body>
</html>