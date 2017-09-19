<?php
$maxNum = PHP_INT_MIN;
while (true) {
    $input = trim(fgets(STDIN));
    if (empty($input)) {
        break;
    }
    if (intval($input) > $maxNum) {
        $maxNum = intval($input);
    }
}
echo $maxNum;