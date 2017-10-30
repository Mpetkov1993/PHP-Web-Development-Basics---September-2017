<?php

class MyController extends Controller
{
    public function main()
    {
        include "view/header.php";
        $brand = $this->getBrands();
        include "view/main.php";
        switch ($this->input) {
            case 'cars':
                $this->viewCars();
                break;
            case 'customers':
                $this->viewCustomers();
                break;
            case 'sales':
                $this->viewSales();
                break;
            case 'add':
                $this->addSale();
                break;
            case 'owner':
                $this->searchCarOwner();
                break;
            case 'edit_car':
                $this->editCar();
                break;
            case 'edit_customer':
                $this->editCustomer();
                break;
            case 'edit_sale':
                $this->editSale();
            default:
                break;
        }
        include "view/footer.php";
    }

    private function viewSales()
    {
        try {
            $s = new SalesModel($this->db);
            $sales = $s->readAll();
            $sales_total = $s->readTotal();
            include "view/read_sales.php";
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            return $this->error();
        }
    }

    private function addSale()
    {
        if (isset($_GET['submit']) and (empty($_GET['car_make']) or empty($_GET['car_model']) or empty($_GET['car_year']) or empty($_GET['first_name']) or empty($_GET['last_name']) or empty($_GET['amount']))) {
            return $this->error();
        } elseif (isset($_GET['car_make']) and isset($_GET['car_model']) and isset($_GET['car_year']) and isset($_GET['first_name']) and isset($_GET['last_name']) and isset($_GET['amount'])) {
            try {
                $this->db->beginTransaction();
                $car_make = $_GET['car_make'];
                $car_model = $_GET['car_model'];
                $car_year = $_GET['car_year'];
                $car = new CarsModel($this->db);
                $car_id = $car->create($car_make, $car_model, $car_year);
                $first_name = $_GET['first_name'];
                $last_name = $_GET['last_name'];
                $customer = new CustomersModel($this->db);
                $customer_id = $customer->create($first_name, $last_name);
                $amount = $_GET['amount'];
                $sale = new SalesModel($this->db);
                $sale_id = $sale->create($amount, $car_id, $customer_id);
                $this->db->commit();
                return $this->viewSales();
            } catch (PDOException $e) {
                $this->db->rollBack();
                print "Error!: " . $e->getMessage() . "<br/>";
                return $this->error();
            }
        }
        include "view/add_sale.php";
    }

    private function editSale()
    {
        if (isset($_GET['submit']) and (empty($_GET['sale_id']) or empty($_GET['amount']))) {
            return $this->error();
        } elseif (isset($_GET['sale_id']) and isset($_GET['amount'])) {
            try {
                $this->db->beginTransaction();
                $sale_id = $_GET['sale_id'];
                $amount = $_GET['amount'];
                $sale = new SalesModel($this->db);
                $sale->edit($sale_id, $amount);
                $this->db->commit();
                return $this->viewSales();
            } catch (PDOException $e) {
                $this->db->rollBack();
                print "Error!: " . $e->getMessage() . "<br/>";
                return $this->error();
            }
        }
        include "view/edit_sale.php";
    }

    private function viewCustomers()
    {
        try {
            $customersModel = new CustomersModel($this->db);
            $customers = $customersModel->readAll();
            include "view/read_customers.php";
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            return $this->error();
        }
    }

    private function editCustomer()
    {
        if (isset($_GET['submit']) and (empty($_GET['customer_id']) or empty($_GET['first_name']) or empty($_GET['last_name']))) {
            return $this->error();
        } elseif (isset($_GET['customer_id']) and isset($_GET['first_name']) and isset($_GET['last_name'])) {
            try {
                $this->db->beginTransaction();
                $customer_id = $_GET['customer_id'];
                $first_name = $_GET['first_name'];
                $last_name = $_GET['last_name'];
                $customer = new CustomersModel($this->db);
                $customer->edit($customer_id, $first_name, $last_name);
                $this->db->commit();
                return $this->viewCustomers();
            } catch (PDOException $e) {
                $this->db->rollBack();
                print "Error!: " . $e->getMessage() . "<br/>";
                return $this->error();
            }
        }
        include "view/edit_customer.php";
    }

    private function viewCars()
    {
        try {
            $carsModel = new CarsModel($this->db);
            $cars = $carsModel->readAll();
            include "view/read_cars.php";
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            return $this->error();
        }
    }

    private function editCar()
    {
        if (isset($_GET['submit']) and (empty($_GET['car_id']) or empty($_GET['car_make']) or empty($_GET['car_model']) or empty($_GET['car_year']))) {
            return $this->error();
        }
        if (isset($_GET['car_id']) and isset($_GET['car_make']) and isset($_GET['car_model']) and isset($_GET['car_year'])) {
            try {
                $this->db->beginTransaction();
                $car_id = $_GET['car_id'];
                $car_make = $_GET['car_make'];
                $car_model = $_GET['car_model'];
                $car_year = $_GET['car_year'];
                $car = new CarsModel($this->db);
                $car->edit($car_id, $car_make, $car_model, $car_year);
                $this->db->commit();
                return $this->viewCars();
            } catch (PDOException $e) {
                $this->db->rollBack();
                print "Error!: " . $e->getMessage() . "<br/>";
                return $this->error();
            }
        }
        include "view/edit_car.php";
    }

    private function searchCarOwner()
    {
        try {
            $ownersList = new CarsModel($this->db);
            $owners = $ownersList->searchOwner($_GET['brand']);
            include "view/owner_by_make.php";
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            return $this->error();
        }
    }

    public function getBrands()
    {
        try {
            $stmt = $this->db->prepare("
              SELECT DISTINCT `used_cars`.`car_make`
              FROM `cars`.`used_cars`");
            $stmt->execute();
            $all = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ($all);
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            return $this->error();
        }
    }

    private function error()
    {
        include "view/error_page.php";
    }
}
