CREATE DATABASE IF NOT EXISTS `php-course`;
USE `php-course`;

CREATE TABLE IF NOT EXISTS `students` (
	`student_id` INT NOT NULL AUTO_INCREMENT,
	`first_name` VARCHAR(50) NOT NULL,
	`last_name` VARCHAR(50) NOT NULL,
	`student_number` VARCHAR(50) NOT NULL,
	`phone_number` VARCHAR(50) NULL,
	`home_address` VARCHAR(50) NULL,
	`date_of_record` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
	`date_of_change` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	`active_student` ENUM('Y','N') NULL DEFAULT 'Y',
	`motivation_letter` VARCHAR(255) NULL,
	`notes` VARCHAR(255) NULL,
	PRIMARY KEY (`student_id`),
	UNIQUE INDEX `student_number` (`student_number`)
	)
COLLATE='utf8_unicode_ci'
ENGINE=InnoDB;