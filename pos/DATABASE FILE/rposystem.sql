-- MySQL dump 10.13  Distrib 8.0.33, for Win64 (x86_64)
--
-- Host: localhost    Database: rposystem
-- ------------------------------------------------------
-- Server version	8.0.33

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `day_summery_method`
--

DROP TABLE IF EXISTS `day_summery_method`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `day_summery_method` (
  `id` int NOT NULL AUTO_INCREMENT,
  `card` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `cash` varchar(45) NOT NULL,
  `order_code` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `order_status`
--

DROP TABLE IF EXISTS `order_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_status` (
  `id` int NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `payment_method`
--

DROP TABLE IF EXISTS `payment_method`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payment_method` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `rpos_admin`
--

DROP TABLE IF EXISTS `rpos_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rpos_admin` (
  `admin_id` varchar(200) NOT NULL,
  `admin_name` varchar(200) NOT NULL,
  `admin_email` varchar(200) NOT NULL,
  `admin_password` varchar(200) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `rpos_bill`
--

DROP TABLE IF EXISTS `rpos_bill`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rpos_bill` (
  `id` int NOT NULL,
  `bill_logo` varchar(100) NOT NULL,
  `bill_title` varchar(100) NOT NULL,
  `bill_address` text NOT NULL,
  `bill_mobile` varchar(45) NOT NULL,
  `discount` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `service_charge` varchar(45) NOT NULL,
  `bill_footer` varchar(45) NOT NULL,
  `rpos_status_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_rpos_bill_rpos_status1_idx` (`rpos_status_id`),
  CONSTRAINT `fk_rpos_bill_rpos_status1` FOREIGN KEY (`rpos_status_id`) REFERENCES `rpos_status` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `rpos_catergory`
--

DROP TABLE IF EXISTS `rpos_catergory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rpos_catergory` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `rpos_day`
--

DROP TABLE IF EXISTS `rpos_day`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rpos_day` (
  `day_id` int NOT NULL AUTO_INCREMENT,
  `start_amount` double NOT NULL,
  `datetime` datetime DEFAULT NULL,
  PRIMARY KEY (`day_id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `rpos_dining`
--

DROP TABLE IF EXISTS `rpos_dining`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rpos_dining` (
  `dining_code` int NOT NULL,
  `order_code` int NOT NULL,
  `rpos_status_id` int NOT NULL,
  `rpos_table_table_id` int NOT NULL,
  PRIMARY KEY (`dining_code`),
  KEY `fk_rpos_dining_rpos_status1_idx` (`rpos_status_id`),
  KEY `fk_rpos_dining_rpos_table1_idx` (`rpos_table_table_id`),
  CONSTRAINT `fk_rpos_dining_rpos_status1` FOREIGN KEY (`rpos_status_id`) REFERENCES `rpos_status` (`id`),
  CONSTRAINT `fk_rpos_dining_rpos_table1` FOREIGN KEY (`rpos_table_table_id`) REFERENCES `rpos_table` (`table_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `rpos_orders`
--

DROP TABLE IF EXISTS `rpos_orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rpos_orders` (
  `order_id` varchar(200) NOT NULL,
  `prod_id` varchar(200) NOT NULL,
  `prod_price` double NOT NULL DEFAULT '0',
  `prod_qty` int NOT NULL,
  `order_code` varchar(200) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `order_status` int NOT NULL,
  `created_time` time DEFAULT NULL,
  PRIMARY KEY (`order_id`,`order_status`),
  KEY `ProductOrder` (`prod_id`),
  KEY `fk_rpos_orders_order_status1_idx` (`order_status`),
  CONSTRAINT `fk_rpos_orders_order_status1` FOREIGN KEY (`order_status`) REFERENCES `order_status` (`id`),
  CONSTRAINT `ProductOrder` FOREIGN KEY (`prod_id`) REFERENCES `rpos_products` (`prod_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `rpos_pass_resets`
--

DROP TABLE IF EXISTS `rpos_pass_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rpos_pass_resets` (
  `reset_id` int NOT NULL AUTO_INCREMENT,
  `reset_code` varchar(200) NOT NULL,
  `reset_token` varchar(200) NOT NULL,
  `reset_email` varchar(200) NOT NULL,
  `reset_status` varchar(200) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`reset_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `rpos_payments`
--

DROP TABLE IF EXISTS `rpos_payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rpos_payments` (
  `pay_id` varchar(200) NOT NULL,
  `pay_code` varchar(200) NOT NULL,
  `order_code` varchar(200) NOT NULL,
  `pay_amt` double NOT NULL DEFAULT '0',
  `created_at` date NOT NULL,
  `payment_method_id` int NOT NULL,
  `created_time` time DEFAULT NULL,
  PRIMARY KEY (`pay_id`),
  KEY `order` (`order_code`),
  KEY `fk_rpos_payments_payment_method1_idx` (`payment_method_id`),
  CONSTRAINT `fk_rpos_payments_payment_method1` FOREIGN KEY (`payment_method_id`) REFERENCES `payment_method` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `rpos_payments_has_rpos_shift`
--

DROP TABLE IF EXISTS `rpos_payments_has_rpos_shift`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rpos_payments_has_rpos_shift` (
  `rpos_payments_pay_id` varchar(200) NOT NULL,
  `rpos_shift_shift_id` int NOT NULL,
  PRIMARY KEY (`rpos_payments_pay_id`,`rpos_shift_shift_id`),
  KEY `fk_rpos_payments_has_rpos_shift_rpos_shift1_idx` (`rpos_shift_shift_id`),
  KEY `fk_rpos_payments_has_rpos_shift_rpos_payments1_idx` (`rpos_payments_pay_id`),
  CONSTRAINT `fk_rpos_payments_has_rpos_shift_rpos_payments1` FOREIGN KEY (`rpos_payments_pay_id`) REFERENCES `rpos_payments` (`pay_id`),
  CONSTRAINT `fk_rpos_payments_has_rpos_shift_rpos_shift1` FOREIGN KEY (`rpos_shift_shift_id`) REFERENCES `rpos_shift` (`shift_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `rpos_products`
--

DROP TABLE IF EXISTS `rpos_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rpos_products` (
  `prod_id` varchar(200) NOT NULL,
  `prod_code` varchar(200) NOT NULL,
  `prod_name` varchar(200) NOT NULL,
  `prod_img` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `prod_desc` longtext NOT NULL,
  `prod_price` double NOT NULL DEFAULT '0',
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `rpos_catergory_id` int DEFAULT NULL,
  PRIMARY KEY (`prod_id`),
  KEY `fk_rpos_products_rpos_catergory1_idx` (`rpos_catergory_id`),
  CONSTRAINT `fk_rpos_products_rpos_catergory1` FOREIGN KEY (`rpos_catergory_id`) REFERENCES `rpos_catergory` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `rpos_shift`
--

DROP TABLE IF EXISTS `rpos_shift`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rpos_shift` (
  `shift_id` int NOT NULL AUTO_INCREMENT,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `rpos_staff_staff_id` int NOT NULL,
  `rpos_status_id` int NOT NULL,
  PRIMARY KEY (`shift_id`),
  KEY `fk_rpos_shift_rpos_staff1_idx` (`rpos_staff_staff_id`),
  KEY `fk_rpos_shift_rpos_status1_idx` (`rpos_status_id`),
  CONSTRAINT `fk_rpos_shift_rpos_staff1` FOREIGN KEY (`rpos_staff_staff_id`) REFERENCES `rpos_staff` (`staff_id`),
  CONSTRAINT `fk_rpos_shift_rpos_status1` FOREIGN KEY (`rpos_status_id`) REFERENCES `rpos_status` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=159 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `rpos_staff`
--

DROP TABLE IF EXISTS `rpos_staff`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rpos_staff` (
  `staff_id` int NOT NULL AUTO_INCREMENT,
  `staff_name` varchar(200) NOT NULL,
  `staff_number` varchar(200) NOT NULL,
  `staff_email` varchar(200) NOT NULL,
  `staff_password` varchar(200) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`staff_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `rpos_status`
--

DROP TABLE IF EXISTS `rpos_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rpos_status` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `rpos_table`
--

DROP TABLE IF EXISTS `rpos_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rpos_table` (
  `table_id` int NOT NULL,
  `table_name` varchar(45) NOT NULL,
  PRIMARY KEY (`table_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-01-06 20:53:23
