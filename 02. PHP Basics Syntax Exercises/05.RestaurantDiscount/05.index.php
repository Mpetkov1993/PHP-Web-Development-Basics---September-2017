<?php
function getHallandPrice ($groupSize, $halls) {
    $hallAndPrice = [];
    $smallHall = $groupSize >= 0 && $groupSize <= 50;
    $terrace = $groupSize > 50 && $groupSize <= 100;
    $greatHall = $groupSize > 100 && $groupSize <= 120;
    switch ($groupSize) {
        case $smallHall: $hallAndPrice = [$halls[0], 2500]; break;
        case $terrace: $hallAndPrice = [$halls[1], 5000]; break;
        case $greatHall: $hallAndPrice = [$halls[2], 7500]; break;
    }
    return $hallAndPrice;
}
function pricePerPerson ($package, $price, $groupSize) {
    $totalPrice = $price;
    $discount = 0;
    switch ($package) {
        case "Normal": $totalPrice+=500; $discount = 0.05; break;
        case "Gold": $totalPrice+=750; $discount = 0.10; break;
        case "Platinum": $totalPrice+=1000; $discount = 0.15; break;
    }
    $total = ($totalPrice - ($totalPrice*$discount))/$groupSize;
    return $total;
}
$groupSize = trim(fgets(STDIN));
$package = trim(fgets(STDIN));
$halls = ['Small Hall', 'Terrace', 'Great Hall'];
if ($groupSize > 120) {
    echo "We do not have an appropriate hall.";
}
else {
    $hall = getHallandPrice($groupSize, $halls)[0];
    $price = getHallandPrice($groupSize, $halls)[1];
    $total = round(pricePerPerson($package, $price, $groupSize), 2);
    echo "We can offer you the ".$hall."\n";
    echo "The price per person is ".$total."$"."\n";
}
