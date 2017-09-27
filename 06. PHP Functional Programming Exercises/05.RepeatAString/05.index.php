<?php
$input = 'Hello, there! ';
$n = 3;
$repeatString = function (&$repeatString, $input, $i = 0, $output = "") use ($n) {
    if ($i < $n){
        $output.=$input;
        return $repeatString($repeatString, $input, $i + 1, $output);
    }
    else{
        return $output;
    }
};
$output = $repeatString($repeatString, $input);
echo $output;