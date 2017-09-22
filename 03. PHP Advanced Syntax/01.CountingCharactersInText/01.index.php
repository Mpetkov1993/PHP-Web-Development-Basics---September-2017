<?php
include '01.index.html';
if (isset($_GET['send'])) {
    $text = $_GET['input'];
    $text = strtoupper($text);
    $chars = [];
    for ($i = 0; $i < strlen($text); $i++) {
        $char = $text[$i];
        if (isset($chars[$char])) {
            $chars[$char]++;
        }
        else {
            $chars[$char] = 1;
        }
    }
    echo "<pre>";
    print_r($chars);
    echo "</pre>";
}