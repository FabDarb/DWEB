<html>
<head>
    <title>Exemple1</title>
</head>
<body>
<?php
$sec = date('s');
if(($sec%2) == 0){
    echo $sec." est paire"."\n";
}else{
    echo $sec." est impaire"."\n";
}
?>
</body>
</html>