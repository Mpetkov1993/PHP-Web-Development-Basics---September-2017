<?php
$db = new PDO('mysql:host=localhost;dbname=php-course','root');

$id = trim(fgets(STDIN));

$db_stm = $db->prepare("DELETE FROM `php-course`.`students` WHERE `student_id` = :id");

$db_stm->bindParam('id', $id);

$db_stm->execute();