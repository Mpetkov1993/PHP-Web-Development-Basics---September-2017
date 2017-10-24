<?php
class Carshop {
    private $db = false;
    public function __construct($db) {
        $this->db = $db;
    }
    public function main() {
        do {
            $input_str = trim(fgets(STDIN));
            if ($input_str == 'Sales') {
                echo $this->getSales();
                break;
            }
            $input_arr = explode(",", $input_str);
            if (count($input_arr) == 6) {
                $car = [
                    'make' => $input_arr[0],
                    'model' => $input_arr[1],
                    'year' => $input_arr[2],
                ];
                $person = [
                    'name' => $input_arr[3],
                    'family' => $input_arr[4]
                ];
                $amount = [
                    'amount' => $input_arr[5]
                ];
                $sale_id = $this->setSale($car, $person, $amount);
                echo $sale_id ? $this->getSale($sale_id) : "Invalid input";
            }
        }
        while($input_str != "Bye");
    }
    protected function getSale($sale_id) {
        $stmt = $this->db->prepare("
        SELECT (`sale_date`) FROM `cars`.`sales`
        WHERE `sale_id` = $sale_id");
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            return "New sale entered ".$row['sale_date'].PHP_EOL;
        }
    }
    protected function setSale($car, $person, $amount) {
        try {
            // Insert into car
            $this->db->beginTransaction();
            $stmt = $this->db->prepare("
            INSERT INTO `cars`.`used_cars`
            (`car_make`, `car_model`, `car_year`)
            VALUES
            (?, ?, ?)");
            $stmt->bindParam(1, $car['make']);
            $stmt->bindParam(2, $car['model']);
            $stmt->bindParam(3, $car['year']);
            $stmt->execute();
            $car_id = $this->db->lastInsertId();
            // Insert into customers
            $stmt = $this->db->prepare("
            INSERT INTO `cars`.`customers`
            (`first_name`, `last_name`)
            VALUES
            (?, ?)");
            $stmt->bindParam(1, $person['name']);
            $stmt->bindParam(2, $person['family']);
            $stmt->execute();
            $customer_id = $this->db->lastInsertId();
            // Insert into sales
            $stmt = $this->db->prepare("
            INSERT INTO `cars`.`sales`
            (car_id, customer_id, amount)
            VALUES
            (?, ?, ?)");
            $stmt->bindParam(1, $car_id);
            $stmt->bindParam(2, $customer_id);
            $stmt->bindParam(3, $amount['amount']);
            $stmt->execute();
            $sale_id = $this->db->lastInsertId();
            $this->db->commit();
        } catch (PDOException $e) {
            $this->db->rollBack();
            print "Error!: " . $e->getMessage() . "<br/>";
        }
        return $sale_id;
    }
}