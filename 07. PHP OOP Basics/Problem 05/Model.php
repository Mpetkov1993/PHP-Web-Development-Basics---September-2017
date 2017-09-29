<?php
class Model {
    private $engine;
    private $seatNumber;
    private $power;
    public function __construct($engine, $seatNumber, $power) {
        $this->engine = $engine;
        $this->seatNumber = $seatNumber;
        $this->power = $power;
    }
    public function getEngine() {
        return $this->engine;
    }
    public function getSeatNumber() {
        return $this->seatNumber;
    }
    public function getPower() {
        return $this->power;
    }
}