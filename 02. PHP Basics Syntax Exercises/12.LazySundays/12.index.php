<?php
$month = date('m');
$year = date('Y');
$days = date('t');
for ($day = 1; $day < $days; $day++) {
    $date = date($day.'-'.$month.'-'.$year);
    if (date('w', strtotime($date)) == 0) {
        echo date('jS F, Y', strtotime($date)).PHP_EOL;
    }
}