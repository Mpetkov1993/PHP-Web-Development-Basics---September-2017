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

    public function create($first_name, $last_name)
    {
        $this->setName($first_name);
        $this->setFamily($last_name);
        // Insert into customers
            $stmt = $this->db->prepare("
              INSERT INTO `cars`.`" . $this->table . "`
                (`first_name`, `last_name`)
              VALUES
                (?, ?)");
            $stmt->bindParam(1, $this->name);
            $stmt->bindParam(2, $this->family);
            $stmt->execute();
            $customer_id = $this->db->lastInsertId();
            return ($customer_id);
    }

    public function edit($customer_id, $first_name, $last_name)
    {
        try {
            $stmt = $this->db->prepare("
              UPDATE `cars`.`customers` SET `customers`.`first_name` = ?, `customers`.`last_name` = ? WHERE `customers`.`customer_id` = ?");
            $stmt->execute(array($first_name, $last_name, $customer_id));
            return $this->readAll();
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            include "view/error_page.php";
        }
    }

    public function readAll()
    {
        try {
            $stmt = $this->db->prepare("
              SELECT * FROM `cars`.$this->table");
            $stmt->execute();
            $all = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ($all);
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            include "view/error_page.php";
        }
    }
}