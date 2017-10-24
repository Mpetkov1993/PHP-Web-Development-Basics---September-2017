<?php
include "../db_config.php";
include "Carshop.php";
$shop = new Carshop($db);
$shop->main();