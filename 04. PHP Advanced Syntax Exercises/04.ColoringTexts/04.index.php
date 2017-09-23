<?php
function colored ($character) {
    $value = ord($character);
    $text = "<span style='color: blue'>".$character."</span>";
    if ($value % 2 === 0) {
        $text = "<span style='color: red'>".$character."</span>";
    }
    return $text;
}
if (isset($_GET['send'])) {
    $input = $_GET['input'];
    $input = str_replace(" ", "", $input);
    $output = "";
    for ($i = 0; $i < strlen($input); $i++) {
        $output .= colored($input[$i])." ";
    }
    trim($output);
}
include '04.html.php';