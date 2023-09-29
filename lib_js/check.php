<pre>
<?php
session_start();
require("./config/config.inc.php");
require(WAY . "/includes/autoload.inc.php");

$per = new Personne();
echo $per;

echo $per->check_login("rasmus.lerdorf@php.net","Mot_de_passe");

print_r($_SESSION);
if($per->check_connect()){
    echo 'log';
}else{
    echo 'pas log';
}
?>
    <a href="./controle_login.php">Logué</a>
</pre>
