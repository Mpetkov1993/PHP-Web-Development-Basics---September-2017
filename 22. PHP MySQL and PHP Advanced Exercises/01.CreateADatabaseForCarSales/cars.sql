-- Dumping database structure for cars
CREATE DATABASE IF NOT EXISTS `cars` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `cars`;
-- Dumping structure for table cars.customers
CREATE TABLE IF NOT EXISTS `customers` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
-- Data exporting was unselected.
-- Dumping structure for table cars.sales
CREATE TABLE IF NOT EXISTS `sales` (
  `sale_id` int(11) NOT NULL AUTO_INCREMENT,
  `car_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `sale_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `amount` varchar(50) NOT NULL,
  PRIMARY KEY (`sale_id`),
  KEY `FK_sales_used_cars` (`car_id`),
  KEY `FK_sales_customers` (`customer_id`),
  CONSTRAINT `FK_sales_customers` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`),
  CONSTRAINT `FK_sales_used_cars` FOREIGN KEY (`car_id`) REFERENCES `used_cars` (`car_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
-- Data exporting was unselected.
-- Dumping structure for table cars.used_cars
CREATE TABLE IF NOT EXISTS `used_cars` (
  `car_id` int(11) NOT NULL AUTO_INCREMENT,
  `car_make` varchar(50) NOT NULL,
  `car_model` varchar(50) NOT NULL,
  `car_year` smallint(6) NOT NULL,
  PRIMARY KEY (`car_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;