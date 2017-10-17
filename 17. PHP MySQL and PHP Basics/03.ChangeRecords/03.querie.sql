UPDATE `php-course`.`students` SET `phone_number`='0888202020' 
WHERE  `student_id`=2;

UPDATE `php-course`.`students` SET `home_address`='Pernik' 
WHERE  `phone_number` IS NULL
LIMIt 1;

UPDATE `php-course`.`students` SET `home_address`='Dupnica' 
WHERE  `phone_number` IS NULL AND `home_address` IS NULL
LIMIt 1;