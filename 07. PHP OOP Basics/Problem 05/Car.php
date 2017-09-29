<?php
class Car
{
    private $brand;
    private $model;
    private $modelInfo;
    private $year;
    public function __construct($brand, $model, $modelInfo, $year)
    {
        $this->brand = $brand;
        $this->model = $model;
        $this->modelInfo = $modelInfo;
        $this->setYear($year);
    }
    public function getBrand()
    {
        return $this->brand;
    }
    public function getModel()
    {
        return $this->model;
    }
    private function setYear($year)
    {
        if (strlen($year) == 4 && is_numeric($year)) {
            $this->year = $year;
        }
    }
    public function getYear()
    {
        return $this->year;
    }

    public function __toString()
    {
        return $this->brand.' '.$this->model.' '.$this->modelInfo->getEngine().' '.$this->modelInfo->getSeatNumber().' '.$this->modelInfo->getPower().' '.$this->year;
    }

}