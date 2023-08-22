<html>
<head>
    <title>Exemple1</title>
    <style>
        td, table, th {
            border: 1px solid black;

        }
        td, th{
            text-align: center;
            width: 30px;
        }
        th{
            background-color: lightgray;
        }
    </style>
</head>
<body>
<?php
echo "\n"."<table>";
for($i=1;$i<=12;$i++){
    echo "\n\t"."<tr>";

    for($j=0;$j<=12;$j++){
        if($i == 1) {
            if($j == 0){
                echo "\n\t\t"."<th>"." "."</th>";
            }else{
                echo "\n\t\t"."<th>"."$j"."</th>";
            }
        }else{
            if($j == 0){
                echo "\n\t\t"."<th>"."$i"."</th>";
            }
            else{
                echo "\n\t\t"."<td>".($j*$i)."</td>";
            }
        }

    }
    echo "\n\t"."</tr>";
}
echo "\n"."</table>";
?>
</body>
</html>