<?php
$names = [];
while (true) {
    $input = trim(fgets(STDIN));
    if ($input == "Over") {
        break;
    }
    $input = array_map('trim', explode(":", $input));
    $name = ord($input[1]) >= 48 && ord($input[1]) <= 57 ? $input[0] : $input[1];
    $number = ord($input[1]) >= 48 && ord($input[1]) <= 57 ? $input[1] : $input[0];
    $names[$name] = $number;
}
ksort($names);
foreach ($names as $name => $number) {
    echo $name." -> ".$number."\n";
}