<?php
include '06.index.html';
function inOrOut ($x, $y, $z) {
    $pos = "Outside";
    $inX = $x >= 10 && $x <= 50;
    $inY = $y >= 20 && $y <= 80;
    $inZ = $z >= 15 && $z <= 50;
    if ($inX && $inY && $inZ) {
        $pos = "Inside";
    }
    return $pos;
}
if (isset($_GET['send'])) {
    $text = $_GET['input'];
    $text = str_replace(",", "", $text);
    $text = explode(" ", $text);
    for ($i = 0; $i < count($text); $i +=3) {
        $x = $text[$i];
        $y = $text[$i+1];
        $z = $text[$i+2];
        $pos = inOrOut($x, $y, $z);
        echo "<h1>" . "$pos" . "</h1>";
    }
}