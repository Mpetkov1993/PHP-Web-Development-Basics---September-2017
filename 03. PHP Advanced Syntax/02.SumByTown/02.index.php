<?php
include '02.index.html';
if (isset($_GET['send'])) {
    $text = $_GET['input'];
    $output = [];
    $text = str_replace(",","", $text);
    $text = explode(" ", $text);
    for ($i = 0; $i < count($text); $i+=2) {
        $city = $text[$i];
        $pop = $text[$i+1];
        if (!isset($output[$city])) {
            $output[$city] = $pop;
        }
        else {
            $output[$city] += $pop;
        }
    }
    echo "<pre>";
    print_r($output);
    echo "</pre>";
}