<?php
$fNum = intval(fgets(STDIN));
$sNum = intval(fgets(STDIN));
$startNum = $fNum;
$endNum = $sNum;
if ($sNum < $startNum) {
    $startNum = $sNum;
    $endNum = $fNum;
}
for ($i = $startNum; $i <= $endNum; $i++) {
    echo $i."\n";
}