<?php
$input = ['Hello ', 'there. ',
    'This is just another long string ',
    'that would pass the check. ', 'But ',
    'this ', 'will ','not ', 'pass it.'];
$above = 20;
$output = array_reduce($input, function ($carry, $item) use ($above){
    if (strlen($item) > $above){
        $carry .= $item;
    }
    return $carry;
});
print_r($output);