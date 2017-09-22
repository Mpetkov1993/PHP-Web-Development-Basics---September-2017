<?php
include '04.index.html';
function isPalindrome ($text) {
    $bool = "false";
    if ($text === strrev($text)) {
        $bool = "true";
    }
    return $bool;
}
if (isset($_GET['send'])) {
    $text = $_GET['input'];
    $bool = isPalindrome($text);
    echo "<h1>"."$bool"."</h1>";
}