<?php
$room = [
    'kitchen'      => ['width'=> 3,'length'=>2, 'height' => 2.4],
    'living_room' => ['width'=> 6,'length'=>4, 'height' => 2.4],
    'bedroom'     => ['width'=> 5,'length'=>3, 'height' => 2.2],
];
$output = array_map(function ($currentRoom){
    return $currentRoom['width']*$currentRoom['length']*$currentRoom['height'];
}, $room);
print_r($output);