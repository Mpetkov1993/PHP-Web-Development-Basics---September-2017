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
        if (isset($_POST['submit']) and (empty($_POST['car_make']) or empty($_POST['car_model']) or empty($_POST['car_year']) or empty($_POST['first_name']) or empty($_POST['last_name']) or empty($_POST['amount']))) {
            return $this->error();
        } elseif (isset($_POST['car_make']) and isset($_POST['car_model']) and isset($_POST['car_year']) and isset($_POST['first_name']) and isset($_POST['last_name']) and isset($_POST['amount'])) {
            try {
                $this->db->beginTransaction();
                $car_make = $_POST['car_make'];
                $car_model = $_POST['car_model'];
                $car_year = $_POST['car_year'];
                $car = new CarsModel($this->db);
                $car_id = $car->create($car_make, $car_model, $car_year);
                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $customer = new CustomersModel($this->db);
                $customer_id = $customer->create($first_name, $last_name);
                $amount = $_POST['amount'];
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
        if (isset($_POST['submit']) and (empty($_POST['sale_id']) or empty($_POST['amount']))) {
            return $this->error();
        } elseif (isset($_POST['sale_id']) and isset($_POST['amount'])) {
            try {
                $this->db->beginTransaction();
                $sale_id = $_POST['sale_id'];
                $amount = $_POST['amount'];
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
        if (isset($_POST['submit']) and (empty($_POST['customer_id']) or empty($_POST['first_name']) or empty($_POST['last_name']))) {
            return $this->error();
        } elseif (isset($_POST['customer_id']) and isset($_POST['first_name']) and isset($_POST['last_name'])) {
            try {
                $this->db->beginTransaction();
                $customer_id = $_POST['customer_id'];
                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
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
        if (isset($_POST['submit']) and (empty($_POST['car_id']) or empty($_POST['car_make']) or empty($_POST['car_model']) or empty($_POST['car_year']))) {
            return $this->error();
        }
        if (isset($_POST['car_id']) and isset($_POST['car_make']) and isset($_POST['car_model']) and isset($_POST['car_year'])) {
            try {
                $this->db->beginTransaction();
                $car_id = $_POST['car_id'];
                $car_make = $_POST['car_make'];
                $car_model = $_POST['car_model'];
                $car_year = $_POST['car_year'];
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
            $owners = $ownersList->searchOwner($_POST['brand']);
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
