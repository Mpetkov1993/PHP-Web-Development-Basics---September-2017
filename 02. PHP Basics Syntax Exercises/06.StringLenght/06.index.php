<?php
$input = trim(fgets(STDIN));
if (strlen($input) <= 20) {
    $diff = 20 - strlen($input);
    $endOfWord = str_repeat("*", $diff);
    echo "$input"."$endOfWord";
}
else {
    echo "Enter valid input!";
}