<?php
include 'Car.php';
for ($i = 0; $i < 4; $i++) {
    $car = explode(" ", trim(fgets(STDIN)));
    $brand = $car[0];
    $model = $car[1];
    $year = $car[2];
    $cars[] = new Car($brand, $model, $year);
}
asort($cars);
foreach ($cars as $car) {
    echo $car->getBrand().", ".$car->getModel().", ".$car->getYear()."\n";//
}