<?php
include 'Car.php';
include 'Model.php';
// InputExample
// BMW E46 3.0 4 231 2004
for ($i = 0; $i < 4; $i++) {
    $car = explode(" ", trim(fgets(STDIN)));
    $brand = $car[0];
    $model = $car[1];
    $engine = $car[2];
    $seats = $car[3];
    $power = $car[4];
    $year = $car[5];
    $cars[] = new Car($brand, $model, new Model($engine, $seats, $power), $year);
}
asort($cars);
foreach ($cars as $car){
    echo $car.PHP_EOL;
}