<?php
function pythagorasTheorem ($x1, $y1, $x2, $y2): void {
    $dist = sqrt(pow($x2 - $x1, 2) + pow($y2 - $y1, 2));
    if ($dist == intval($dist)) {
        echo "{".$x1.", ".$y1."} to {".$x2.", ".$y2."} is valid"."\n";
    }
    else {
        echo "{".$x1.", ".$y1."} to {".$x2.", ".$y2."} is invalid"."\n";
    }
}
$input = explode(", ", trim(fgets(STDIN)));
$x1 = $input[0];
$x2 = $input[2];
$y1 = $input[1];
$y2 = $input[3];
pythagorasTheorem($x1, $y1, 0, 0);
pythagorasTheorem($x2, $y2, 0, 0);
pythagorasTheorem($x1, $y1, $x2, $y2);