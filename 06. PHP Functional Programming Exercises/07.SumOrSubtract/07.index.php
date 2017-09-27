<?php
$input = [
['sum', 12, 13],
['subtract', 3, 3],
['sum', 1, 2],
['sum', 12, 156],
['subtract', 5, 6],
['subtract', 1, 2]
];
$sumOperation = function ($a, $b){
    return $a + $b;
};
$subtractOperation = function ($a, $b){
    return $a - $b;
};
$calculate = function (&$calculate, $input, $i = 0, $output = []) use ($sumOperation, $subtractOperation){
    if ($i < count($input)){
        $operation = $input[$i][0];
        $a = $input[$i][1];
        $b = $input[$i][2];
        if ($a < 0 or $a > 100 or $b < 0 or $b > 100){
            $output[] = 'error';
        }
        elseif ($operation == 'sum'){
            $output[] = $sumOperation($a, $b);
        }
        elseif ($operation == 'subtract'){
            $output[] = $subtractOperation($a, $b);
        }
        return $calculate($calculate, $input, $i + 1, $output);
    }
    else {
        return $output;
    }
};
$output = $calculate($calculate, $input);
print_r($output);