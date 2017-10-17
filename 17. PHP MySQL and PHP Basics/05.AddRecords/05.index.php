<?php
$db = new PDO('mysql:host=localhost;dbname=php-course','root');

$db_stm = $db->prepare('INSERT INTO `php-course`.`students` (
`first_name`, 
`last_name`, 
`student_number`,
`phone_number`) 
VALUES(
:first_name, 
:last_name, 
:student_number,
:phone_number)');

$db_stm->bindParam('first_name', $first_name);
$db_stm->bindParam('last_name', $last_name);
$db_stm->bindParam('student_number', $student_number);
$db_stm->bindParam('phone_number', $phone_number);

$n = intval(trim(fgets(STDIN)));
for ($i = 0; $i < $n; $i++) {
    $input = explode(' ', trim(fgets(STDIN)));
    $first_name = $input[0];
    $last_name = $input[1];
    $student_number = $input[2];
    $phone_number = '';
    if (count($input) > 3){
        $phone_number = $input[3];
    }
    $db_stm->execute();
}