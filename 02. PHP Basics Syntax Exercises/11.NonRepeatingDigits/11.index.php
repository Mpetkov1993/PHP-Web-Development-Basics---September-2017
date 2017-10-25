<?php
$n = trim(fgets(STDIN));
$uniqueNums = [];
for ($number = 100; $number <= $n; $number++) {
    if (unique($number)) {
        array_push($uniqueNums, $number);
    }
}
echo !sizeof($uniqueNums) == 0 ? implode(', ', $uniqueNums) : 'No';
function unique (string $num) {
    $currentNum = [];
    for ($i = 0; $i < strlen($num); $i++) {
        $testNum = $num[$i];
        if (in_array($testNum, $currentNum)) {
            return false;
        }
        array_push($currentNum, $testNum);
    }
    return true;
}