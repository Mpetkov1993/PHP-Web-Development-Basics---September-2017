<?php
include '03.index.html';
if (isset($_GET['send'])) {
    $text = $_GET['input'];
    $output = [];
    $text = str_replace(",","", $text);
    $text = explode(" ", $text);
    for ($i = 0; $i < count($text); $i++) {
        $element = $text[$i];
        if (!isset($output[$element])) {
            $output[$element] = 1;
        }
        else {
            $output[$element]++;
        }
    }
    $out = [];
    foreach ($output as $key => $value) {
        if ($value === 1) {
            $out[$key] = $value;
        }
    }
    echo "<pre>";
    print_r($out);
    echo "</pre>";
}