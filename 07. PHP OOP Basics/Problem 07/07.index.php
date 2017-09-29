<?php
$myObj = new stdClass();
$myObj->fName = 'Pesho';
$myObj->lName = 'Peshov';
$myObj->nName = 'Peshoto';
$myObj->age = '21';
$myObj->town = 'Pernik';
$myObj->car = 'Golf';
$myObj->dog = 'Pepo';
$myObj->cat = 'Pipo';
$myObj->wife = 'Penka';
$myObj->child = 'Peshko';
foreach ($myObj as $key => $value) {
    echo $key.' -> '.$value.PHP_EOL;
}