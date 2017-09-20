<?php
$input = trim(fgets(STDIN));
$arr = explode(" ", trim(fgets(STDIN)));
$char = $arr[0];
$count = $arr[1];
$word = [$char => 0];
$place = 0;
for ($i = 0; $i <strlen($input); $i++) {
    if ($input[$i] == $char) {
        $word[$char]++;
    }
    if ($word[$char] == $count) {
        $place = $i;
        break;
    }
}
if ($word[$char] == $count) {
    echo $place;
}
else {
    echo "Find the letter yourself!";
}