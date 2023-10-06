<?php
header('Content-Type:application/json');
session_start();
require("./../../config/config.inc.php");
require_once(WAY . "/includes/autoload.inc.php");

$fnc = new Fonction();

if($fnc->check_abr($_POST['abr_fnc'])){
    $tab['reponse'] = false;
    $tab['message']['texte'] = "Cet Abréviation est déjà utilisé !";
    $tab['message']['type'] = "danger";
}else{
    $id = $fnc->add($_POST);
    $fnc->set_id($id);
    if($fnc->init()){
        $tab['reponse'] = true;
        $tab['message']['texte'] = "Fonction ajouter !";
        $tab['message']['type'] = "success";
    }
}

echo json_encode($tab);
?>