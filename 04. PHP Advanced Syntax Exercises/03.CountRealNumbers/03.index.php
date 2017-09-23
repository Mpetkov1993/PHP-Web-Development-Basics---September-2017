<?php
$input = trim(fgets(STDIN));
$input = explode(" ", $input);
$output = [];
for ($i = 0; $i < count($input); $i++) {
    $num = $input[$i];
    if (!isset($output[$num])) {
        $output[$num] = 1;
    }
    else {
        $output[$num]++;
    }
}
ksort($output);
foreach ($output as $num => $count) {
    echo "$num"." -> "."$count"." times"."\n";
}