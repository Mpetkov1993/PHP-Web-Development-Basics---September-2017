DELETE FROM `php-course`.`students` 
WHERE  `student_id`=1;

DELETE FROM `php-course`.`students` 
WHERE  `home_address` IS NULL;

TRUNCATE TABLE `php-course`.`students`