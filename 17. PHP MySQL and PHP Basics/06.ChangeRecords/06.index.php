<?php
$db = new PDO('mysql:host=localhost;dbname=php-course','root');

$input = explode(' ', trim(fgets(STDIN)));
$id = $input[0];
$param_name = $input[1];
$param_value = $input[2];

$db_stm = $db->prepare("UPDATE `php-course`.`students` 
SET {$param_name} = :param_value
WHERE student_id = :id");

$db_stm->bindParam('param_value', $param_value);
$db_stm->bindParam('id', $id);

$db_stm->execute();