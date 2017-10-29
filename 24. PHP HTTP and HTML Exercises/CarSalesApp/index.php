<?php
// Load DB
include "db_config.php";

// Load core classes
include "core/Model.php";
include "core/Controller.php";

// Load model classes - they extend Model.php
include "model/CarsModel.php";
include "model/SalesModel.php";
include "model/CustomersModel.php";

// Load Controller class - it extends Controller.php
include "controller/MyController.php";
$main = new MyController($db);
$main->main();