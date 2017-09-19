<?php
$input = trim(fgets(STDIN));
$output = [];
for ($i = 0; $i < strlen($input); $i++) {
    $letter = $input[$i];
    if (!isset($output[$letter])) {
        $output[$letter] = 1;
    }
    else {
        $output[$letter]++;
    }
}
arsort($output);
print_r($output);