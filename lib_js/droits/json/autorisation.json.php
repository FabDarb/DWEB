<?php
header('Content-Type:application/json');
session_start();
require ("./../../config/config.inc.php");
require_once(WAY . "/includes/autoload.inc.php");

$aut = new Autorisation();

if($aut->check_code($_POST['code_aut'])){
    $tab['reponse'] = false;
    $tab['message']['texte'] = "Cet Abréviation est déjà utilisé !";
    $tab['message']['type'] = "danger";
}else{
    $id = $aut->addA($_POST);
    $aut->set_id($id);
    $id = $aut->addU($_POST);
    $aut->set_id($id);
    if($aut->init()){
        $tab['reponse'] = true;
        $tab['message']['texte'] = "Fonction ajouter !";
        $tab['message']['type'] = "success";
    }
}

echo json_encode($tab);
?>