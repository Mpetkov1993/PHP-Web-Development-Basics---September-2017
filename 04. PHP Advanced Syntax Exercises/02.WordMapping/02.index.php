<?php
if (isset($_GET['send'])) {
    $input = $_GET['input'];
    $input = strtolower($input);
    $input = explode(" ", $input);
    $output = [];
    for ($i = 0; $i <count($input); $i++) {
        $word = preg_replace('/[^a-z]/', "", $input[$i]);
        if (!isset($output[$word])) {
            $output[$word] = 1;
        }
        else {
            $output[$word]++;
        }
    }
}
include '02.html.php';