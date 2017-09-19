<?php
if (isset($_GET['send'])) {
    $delimiter = $_GET['delimiter'];
    $names = explode($delimiter, $_GET['names']);
    $ages = explode($delimiter, $_GET['ages']);
    $result = [];
    for ($i = 0; $i < count($names); $i++) {
        $name = $names[$i];
        $age = $ages[$i];
        if ($age >= 18) {
            $result[$name] = $age;
        }
    }
}
include '09.html.php';