<?php
$ages = [];
$salaries = [];
$positions = [];
while (true) {
    $input = trim(fgets(STDIN));
    if ($input == 'filter base') {
        break;
    }
    $input = explode(" -> ", $input);
    $name = $input[0];
    $value = $input[1];
    if (!is_numeric($value)) {
        $positions[$name] = $value;
    }
    elseif (is_int($value)) {
        $ages[$name] = $value;
    }
    else {
        $salaries[$name] = round($value, 2);
    }
}
$command = trim(fgets(STDIN));
switch ($command) {
    case "Age": printBase($ages, $command); break;
    case "Salary": printBase($salaries, $command); break;
    case "Position": printBase($positions, $command); break;
}
function printBase ($arr, $command): void {
    foreach ($arr as $key => $value) {
        echo "Name: ".$key."\n";
        echo $command.": ".$value."\n";
        echo str_repeat("=", 20)."\n";
    }
}