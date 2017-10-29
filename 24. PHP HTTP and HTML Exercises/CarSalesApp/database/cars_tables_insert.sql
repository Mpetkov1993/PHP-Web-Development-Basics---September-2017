-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.26-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping data for table cars.cars: ~6 rows (approximately)
/*!40000 ALTER TABLE `cars` DISABLE KEYS */;
INSERT INTO `used_cars` (`car_id`, `car_make`, `car_model`, `car_year`) VALUES
	(1, 'Audi', 'A4', ' 2004'),
	(6, 'Ford', 'Cortina', ' 2010'),
	(7, 'BMW', '116', ' 2012'),
	(8, 'Ford', 'c-max', ' 2006');
/*!40000 ALTER TABLE `cars` ENABLE KEYS */;

-- Dumping data for table cars.customers: ~5 rows (approximately)
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` (`customer_id`, `first_name`, `last_name`) VALUES
	(1, ' Ilia', ' Petrov'),
	(3, ' Stoyan', ' Zahariev'),
	(4, ' Iliana', ' Petrova'),
	(5, ' Stoyan', ' Lazarov');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;

-- Dumping data for table cars.sales: ~4 rows (approximately)
/*!40000 ALTER TABLE `sales` DISABLE KEYS */;
INSERT INTO `sales` (`sale_id`, `car_id`, `customer_id`, `sale_date`, `amount`) VALUES
	(1, 1, 1, '2017-10-24 19:39:38', 3800),
	(2, 6, 3, '2017-10-24 19:48:31', 10000),
	(3, 7, 4, '2017-10-24 20:14:21', 23000),
	(4, 8, 5, '2017-10-24 20:16:44', 7600);
/*!40000 ALTER TABLE `sales` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
