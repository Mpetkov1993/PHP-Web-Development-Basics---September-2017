<?php
$products = [];
$buy = false;
while (true) {
    $input = trim(fgets(STDIN));
    if ($input == "exam time") {
        break;
    }
    if ($input == "shopping time") {
        $buy = true;
        continue;
    }
    $input = explode(" ", $input);
    $product = $input[1];
    $quantity = $input[2];
    if (!$buy) {
        if (!isset($products[$product])) {
            $products[$product] = $quantity;
        }
        else {
            $products[$product] += $quantity;
        }
    }
    else {
        if (!isset($products[$product])) {
            echo $product." doesnt't exist"."\n";
        }
        elseif (isset($products[$product]) && $products[$product] == 0) {
            echo $product." out of stock"."\n";
        }
        else {
            if ($products[$product] < $quantity) {
                $products[$product] = 0;
            }
            else {
                $products[$product] -= $quantity;
            }
        }
    }
}
foreach ($products as $product => $quantity) {
    if ($quantity > 0) {
        echo $product." -> ".$quantity."\n";
    }
}