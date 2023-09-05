<?php
    $list = file("liste.txt");
    $avion = array();
foreach ($list as $key => $item) {
    $i = explode(' ', $item);
    $j = end($i);
    $final = "";
    for ($e = 0; $e < count($i) - 1; $e++) {
        $final = $final . " " . $i[$e];
    }
    $avion[$j] = $final;
}

?>