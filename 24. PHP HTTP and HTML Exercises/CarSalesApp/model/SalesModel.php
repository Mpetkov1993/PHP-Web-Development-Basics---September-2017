<?php

class SalesModel extends Model
{
    private $amount;
    private $car_id;
    private $customer_id;

    public function __construct($db)
    {
        parent::__construct($db);
        $this->table = "sales";
    }

    private function setAmount($amount)
    {
        $this->amount = $amount;
    }

    private function setCarId($car_id)
    {
        $this->car_id = $car_id;
    }

    private function setCustomerId($customer_id)
    {
        $this->customer_id = $customer_id;
    }

    // Insert into sales
    public function create($amount, $car_id, $customer_id)
    {
        $this->setAmount($amount);
        $this->setCarId($car_id);
        $this->setCustomerId($customer_id);
        $stmt = $this->db->prepare("INSERT INTO `cars`.`" . $this->table . "`
        (`sale_date`,`amount`,`car_id`,`customer_id`) VALUES (NOW(), ?, ?, ?)");
        $stmt->execute(array($this->amount, $this->car_id, $this->customer_id));
        $sale_id = $this->db->lastInsertId();
        return ($sale_id);
    }

    public function readAll()
    {
        $stmt = $this->db->prepare("SELECT * FROM `deals`");
        $stmt->execute();
        $all = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return ($all);
    }

    public function readTotal()
    {
        $stmt = $this->db->prepare("
              SELECT SUM(amount) AS total_amount
              FROM cars.`" . $this->table . "`");
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row['total_amount']) {
            return $row['total_amount'];
        } else {
            return false;
        }
    }

    public function edit($sale_id, $amount)
    {
        $stmt = $this->db->prepare("
              UPDATE `cars`.`sales` SET `sales`.`sale_date` = NOW(), `sales`.`amount` = ? WHERE `sales`.`sale_id` = ?");
        $stmt->execute(array($amount, $sale_id));
    }
}