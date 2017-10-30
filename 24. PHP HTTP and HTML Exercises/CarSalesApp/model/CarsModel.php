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

    private function setMake($make)
    {
        $this->make = $make;
    }

    private function setModel($model)
    {
        $this->model = $model;
    }

    private function setYear($year)
    {
        $this->year = $year;
    }
	
	public function create($make, $model, $year){
	    $this->setMake($make);
	    $this->setModel($model);
	    $this->setYear($year);
		try {
            // Insert into car
            $stmt = $this->db->prepare("
              INSERT INTO `cars`.`" . $this->table . "`
                (`car_make`, `car_model`, `car_year`)
              VALUES
                (?, ?, ?)");
            $stmt->bindParam(1, $this->make);
            $stmt->bindParam(2, $this->model);
            $stmt->bindParam(3, $this->year);
            $stmt->execute();
            $car_id = $this->db->lastInsertId();
			return $car_id;
		 } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            include "view/error_page.php";
        }
        return false;
	}

	public function edit($car_id, $car_make, $car_model, $car_year)
    {
        try {
            $stmt = $this->db->prepare("
              UPDATE `cars`.`used_cars` SET `used_cars`.`car_make` = ?, `used_cars`.`car_model` = ?, `used_cars`.`car_year` = ? WHERE `used_cars`.`car_id` = ?");
            $stmt->execute(array($car_make, $car_model, $car_year, $car_id));
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

    public function searchOwner($brand)
    {
        try {
            $stmt = $this->db->prepare("
              SELECT `used_cars`.`car_make`, `used_cars`.`car_model`, `used_cars`.`car_year`, `used_cars`.`car_id`, `customers`.`first_name`, `customers`.`last_name`, `customers`.`customer_id` FROM `cars`.`used_cars`, `cars`.`sales`, `cars`.`customers`
              WHERE `cars`.`used_cars`.`car_make` = ?
              AND (`cars`.`used_cars`.`car_id` = `cars`.`sales`.car_id
              AND `cars`.`sales`.`customer_id` = `cars`.`customers`.`customer_id`)");
            $stmt->execute(array($brand));
            $all = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ($all);
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            include "view/error_page.php";
        }
    }

}