<?php
//inclusion de la classe

function chargerClasse($classe) {
    require WAY . '/class/' . $classe . '.class.php';
}

//enregistre chargerClasse en autoload
spl_autoload_register('chargerClasse');