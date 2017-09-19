<?php
function operation ($operation, $fNum, $sNum) {
    $result = 0;
    switch ($operation) {
        case "sum": $result = $fNum+$sNum; break;
        case "subtract": $result = $fNum-$sNum; break;
    }
    return $result;
}
if (isset($_GET['send'])) {
    $operation = $_GET['operation'];
    $firstNum = $_GET['fNum'];
    $secondNum = $_GET['sNum'];
    $result = operation($operation, $firstNum, $secondNum);
}
include '07.html.php';