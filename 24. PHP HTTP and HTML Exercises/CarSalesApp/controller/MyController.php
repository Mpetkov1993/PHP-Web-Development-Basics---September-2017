<?php
class MyController extends Controller
{
    public function main()
    {
        include "view/header.php";
        $brand = $this->getBrands();
        include "view/main.php";
        switch($this->input){
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
        $s = new SalesModel($this->db);
        $sales = $s->readAll();
        $sales_total = $s->readTotal();
        include "view/read_sales.php";
    }

    private function addSale()
    {
        if (isset($_GET['submit']) and (empty($_GET['car_make']) or empty($_GET['car_model']) or empty($_GET['car_year']) or empty($_GET['first_name']) or empty($_GET['last_name']) or empty($_GET['amount']))) {
            return $this->error();
        }
        elseif (isset($_GET['car_make']) and isset($_GET['car_model']) and isset($_GET['car_year']) and isset($_GET['first_name']) and isset($_GET['last_name']) and isset($_GET['amount'])){
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
            return $this->viewSales();
        }
        include "view/add_sale.php";
    }

    private function editSale()
    {
        if (isset($_GET['sale_id']) and isset($_GET['amount'])){
            $sale_id = $_GET['sale_id'];
            $amount = $_GET['amount'];
            $sale = new SalesModel($this->db);
            $sale->edit($sale_id, $amount);
            return $this->viewSales();
        }
        include "view/edit_sale.php";
    }

    private function viewCustomers()
    {
        $customersModel = new CustomersModel($this->db);
        $customers = $customersModel->readAll();
        include "view/read_customers.php";
    }

    private function editCustomer()
    {
        if (isset($_GET['customer_id']) and isset($_GET['first_name']) and isset($_GET['last_name'])){
            $customer_id = $_GET['customer_id'];
            $first_name = $_GET['first_name'];
            $last_name = $_GET['last_name'];
            $customer = new CustomersModel($this->db);
            $customer->edit($customer_id, $first_name, $last_name);
            return $this->viewCustomers();
        }
        include "view/edit_customer.php";
    }

    private function viewCars()
    {
        $carsModel = new CarsModel($this->db);
        $cars = $carsModel->readAll();
        include "view/read_cars.php";
    }

    private function editCar()
    {
        if (isset($_GET['car_id']) and isset($_GET['car_make']) and isset($_GET['car_model']) and isset($_GET['car_year'])){
            $car_id = $_GET['car_id'];
            $car_make = $_GET['car_make'];
            $car_model = $_GET['car_model'];
            $car_year = $_GET['car_year'];
            $car = new CarsModel($this->db);
            $car->edit($car_id, $car_make, $car_model, $car_year);
            return $this->viewCars();
        }
        include "view/edit_car.php";
    }

    private function searchCarOwner()
    {
        $ownersList = new CarsModel($this->db);
        $owners = $ownersList->searchOwner($_GET['brand']);
        include "view/owner_by_make.php";
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
            include "view/error_page.php";
        }
    }

    private function error()
    {
        include "view/error_page.php";
    }
}