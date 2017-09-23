<?php
$input = fgets(STDIN);
$input = trim($input);
$arr = [];
for ($i = 0; $i <strlen($input); $i++) {
    $char = $input[$i];
    if (!isset($arr[$char])) {
        $arr[$char]=1;
    }
    else {
        $arr[$char]++;
    }
}
print_r($arr);