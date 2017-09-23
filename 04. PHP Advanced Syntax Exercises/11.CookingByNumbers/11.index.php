<?php
function cook ($command, $num) {
    switch ($command) {
        case "chop": $num /= 2; break;
        case "dice": $num = sqrt($num); break;
        case "spice": $num += 1; break;
        case "bake": $num *= 3; break;
        case "fillet": $num -= $num * 0.20; break;
    }
    return $num;
}
$number = intval(trim(fgets(STDIN)));
$commands = explode(", ", trim(fgets(STDIN)));
for ($i = 0; $i < count($commands); $i++) {
    $number = cook($commands[$i], $number);
    echo $number."\n";
}