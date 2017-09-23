<?php
function average ($input) {
    $sum = 0;
    for ($i = 0; $i < strlen($input); $i++) {
        $sum += $input[$i];
    }
    return $sum / strlen($input);
}
$input = trim(fgets(STDIN));
while (true) {
    $average = average($input);
    if ($average >= 5) {
        echo $input;
        break;
    }
    else {
        $input.=9;
    }
}