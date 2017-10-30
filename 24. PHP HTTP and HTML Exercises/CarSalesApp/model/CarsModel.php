<?php

class CarsModel extends Model
{
    private $make;
    private $model;
    private $year;

    public function __construct($db)
    {
        parent::__construct($db);
        $this->table = "used_cars";
    }

    public function create($make, $model, $year)
    {
        $this->setMake($make);
        $this->setModel($model);
        $this->setYear($year);
        $stmt = $this->db->prepare("
              INSERT INTO cars.`" . $this->table . "` 
              (car_make, car_model, car_year) 
              VALUES (?, ?, ?)");
        $stmt->execute(array($this->make, $this->model, $this->year));
        $car_id = $this->db->lastInsertId();
        return $car_id;
    }

    private function setMake($make)
    {
        $this->make = $make;
    }

    private function setModel($model)
    {
        $this->model = $model;
    }

    // Insert into used_cars

    private function setYear($year)
    {
        $this->year = $year;
    }

    public function edit($car_id, $car_make, $car_model, $car_year)
    {
        $stmt = $this->db->prepare("
              UPDATE cars.used_cars 
              SET car_make = ?, car_model = ?, car_year = ? 
              WHERE car_id = ?");
        $stmt->execute(array($car_make, $car_model, $car_year, $car_id));
    }

    public function readAll()
    {
        $stmt = $this->db->prepare("
              SELECT * FROM cars.`" . $this->table . "`");
        $stmt->execute();
        $all = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return ($all);
    }

    public function searchOwner($brand)
    {
        $stmt = $this->db->prepare("
              SELECT CA.car_make, CA.car_model, CA.car_year, CA.car_id, CU.first_name, CU.last_name, CU.customer_id 
              FROM cars.used_cars AS CA, cars.sales AS SA, cars.customers AS CU
              WHERE CA.car_make = ? AND (CA.car_id = SA.car_id AND SA.customer_id = CU.customer_id)");
        $stmt->execute(array($brand));
        $all = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return ($all);
    }
}