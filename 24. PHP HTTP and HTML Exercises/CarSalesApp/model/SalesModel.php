<?php
class SalesModel extends Model{
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

	public function create($amount, $car_id, $customer_id)
	{
	    $this->setAmount($amount);
	    $this->setCarId($car_id);
	    $this->setCustomerId($customer_id);
        // Insert into sales
            $stmt = $this->db->prepare("
                INSERT INTO `cars`.`" . $this->table . "`
                  (`sale_date`,`amount`,`car_id`,`customer_id`)
                VALUES 
                   (NOW(), ?, ?, ?)");
            $stmt->bindParam(1, $this->amount);
            $stmt->bindParam(2, $this->car_id);
            $stmt->bindParam(3, $this->customer_id);
            $stmt->execute();
            $sale_id = $this->db->lastInsertId();
            return($sale_id);
	}
	
	public function readAll()
	{
        try {
            $stmt = $this->db->prepare("
              SELECT *         
                FROM `deals`");
            $stmt->execute();
            $all = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ($all);
        } catch(PDOException $e){
		    print "Error!: " . $e->getMessage() . "<br/>";
            include "view/error_page.php";
        }
	}
	
	public function readTotal()
	{
        $stmt = $this->db->prepare("
            SELECT SUM(`amount`) as `total_amount`
              FROM `cars`.`sales`");
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row['total_amount'])
			return $row['total_amount'];
		else
			return false;
	}

    public function edit($sale_id, $amount)
    {
        try {
            $stmt = $this->db->prepare("
              UPDATE `cars`.`sales` SET `sales`.`sale_date` = NOW(), `sales`.`amount` = ? WHERE `sales`.`sale_id` = ?");
            $stmt->execute(array($amount, $sale_id));
            return $this->readAll();
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            include "view/error_page.php";
        }
    }
}