<?php
$firstNum = trim(fgets(STDIN));
$secondNum = trim(fgets(STDIN));
$thirdNum = trim(fgets(STDIN));
$maxNum = $firstNum;
if ($secondNum > $maxNum) {
    $maxNum = $secondNum;
}
if ($thirdNum > $maxNum) {
    $maxNum = $thirdNum;
}
echo "Max: $maxNum";
