<?php
$people = [
    [ 'name' => 'John'  , 'weight' => 69, 'height'  => 1.69 ],
    [ 'name' => 'Peter' , 'weight' => 85, 'height'  => 1.68 ],
    [ 'name' => 'Ivan'  , 'weight' => 75, 'height'  => 1.72 ],
    [ 'name' => 'Mitko', 'weight' => 95, 'height'  => 1.70 ]
];
$bmiFilterValue = 29;
$bmiCount = 0;
$bmi = function ($person){
    return ($person['weight'] / pow($person['height'], 2));
};
$output = array_map($bmi, $people);
$bmiCalcAvg = array_reduce($output, function ($carry, $item) use ($bmiFilterValue, &$bmiCount){
    if ($item > $bmiFilterValue) {
        $carry += $item;
        $bmiCount++;
    }
    return $carry;
});
$bmiAvg = $bmiCalcAvg / $bmiCount;
print_r($bmiAvg);