<?php
$people = [
    [ 'name' => 'John'  , 'weight' => 69, 'height'  => 1.69 ],
    [ 'name' => 'Peter' , 'weight' => 85, 'height'  => 1.68 ],
    [ 'name' => 'Ivan'  , 'weight' => 75, 'height'  => 1.72 ],
    [ 'name' => 'Mitko', 'weight' => 95, 'height'  => 1.70 ]
];
$bmi = function ($person){
    return ($person['weight'] / pow($person['height'], 2));
};
$output = array_map($bmi, $people);
$bmiCalcAvg = array_reduce($output, function ($carry, $item){
   $carry += $item;
   return $carry;
});
$bmiAvg = $bmiCalcAvg / count($output);
print_r($bmiAvg);