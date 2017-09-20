<?php
$input = explode(" ", trim(fgets(STDIN)));
$start = 0;
$bestStart = 0;
$end = 0;
$bestEnd = 0;
$count = 0;
$bestCount = 0;
for ($i = 1; $i < count($input); $i++) {
    $num = $input[$i];
    $prevNum = $input[($i-1)];
    if ($num == $prevNum+1) {
        $count++;
        $end = $i;
    }
    else {
        $start = $i;
        $count = 0;
    }
    if ($count > $bestCount) {
        $bestCount = $count;
        $bestStart = $end - $bestCount;
        $bestEnd = $bestStart + $bestCount;
    }
}
for ($i = $bestStart; $i <= $bestEnd; $i++) {
    echo $input[$i]." ";
}