<?php
include '07.index.html';
function limit ($area) {
    $area = strtolower($area);
    $limit = 0;
    switch ($area) {
        case "residental": $limit = 20; break;
        case "city": $limit = 50; break;
        case "interstate": $limit = 90; break;
        case "motorway": $limit = 130; break;
    }
    return $limit;
}
function overLimit ($speed, $limit) {
    $overLimit = $speed - $limit;
    $warning = "";
    if ($overLimit > 0 && $overLimit <= 20) {
        $warning = "Speeding";
    }
    else if ($overLimit > 20 && $overLimit <= 40) {
        $warning = "Excessive speeding";
    }
    else if ($overLimit > 40) {
        $warning = "Reckless driving";
    }
    return $warning;
}
if (isset($_GET['send'])) {
    $speed = intval($_GET['speed']);
    $area = $_GET['area'];
    $limit = limit($area);
    $warning = overLimit($speed, $limit);
    echo "<h1>"."$warning"."</h1>";
}