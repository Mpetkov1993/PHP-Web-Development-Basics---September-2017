<?php
$people = [
    ['name'=> 'John'  , 'height'=> 1.65],
    ['name'=> 'Peter' , 'height'=> 1.85],
    ['name'=> 'Silvia', 'height'=> 1.69],
    ['name'=> 'Martin', 'height'=> 1.82]
];
$averageHeight = array_reduce($people, function ($carry, $item){
    $carry += $item['height'];
    return $carry;
})/count($people);
echo "Average height is ".$averageHeight." meters";
