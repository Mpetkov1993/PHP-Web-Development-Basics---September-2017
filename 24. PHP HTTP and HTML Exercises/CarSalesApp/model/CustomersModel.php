<?php

class CustomersModel extends Model
{
    private $name;
    private $family;

    public function __construct($db)
    {
        parent::__construct($db);
        $this->table = "customers";
    }

    private function setName($name)
    {
        $this->name = $name;
    }

    private function setFamily($family)
    {
        $this->family = $family;
    }

    // Insert into customers
    public function create($first_name, $last_name)
    {
        $this->setName($first_name);
        $this->setFamily($last_name);
        $stmt = $this->db->prepare("
              INSERT INTO `cars`.`" . $this->table . "` 
              (`first_name`, `last_name`) 
              VALUES (?, ?)");
        $stmt->execute(array($this->name, $this->family));
        $customer_id = $this->db->lastInsertId();
        return ($customer_id);
    }

    public function edit($customer_id, $first_name, $last_name)
    {
        $stmt = $this->db->prepare("
              UPDATE cars.customers 
              SET first_name = ?, last_name = ? 
              WHERE customer_id = ?");
        $stmt->execute(array($first_name, $last_name, $customer_id));
    }

    public function readAll()
    {
        $stmt = $this->db->prepare("
              SELECT * FROM cars.`" . $this->table . "`");
        $stmt->execute();
        $all = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return ($all);
    }
}