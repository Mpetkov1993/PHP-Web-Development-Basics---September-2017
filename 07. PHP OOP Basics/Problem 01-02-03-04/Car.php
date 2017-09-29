<?php
class Car {
    public $brand;
    public $model;
    public $year;
    public function __construct($brand, $model, $year) {
        $this->brand = $brand;
        $this->model = $model;
        $this->setYear($year);
    }
    public function getBrand() {
        return $this->brand;
    }
    public function getModel() {
        return $this->model;
    }
    public function setYear($year) {
        if (strlen($year) == 4 && is_numeric($year)) {
            $this->year = $year;
        }
    }
    public function getYear() {
        return $this->year;
    }
}