<?php
include '05.index.html';
function dayOfWeek ($text) {
    $day = 0;
    $text = strtolower($text);
    switch ($text) {
        case "monday": $day = 1; break;
        case "tuesday": $day = 2; break;
        case "wednesday": $day = 3; break;
        case "thursday": $day = 4; break;
        case "friday": $day = 5; break;
        case "saturday": $day = 6; break;
        case "sunday": $day = 7; break;
        default: $day = "Enter valid day of week!"; break;
    }
    return $day;
}
if (isset($_GET['send'])) {
    $text = $_GET['input'];
    $day = dayOfWeek($text);
    echo "<h1>"."$day"."</h1>";
}