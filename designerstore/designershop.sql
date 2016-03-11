/*
SQLyog Community v9.63 
MySQL - 5.5.27 : Database - designershop
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`designershop` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `designershop`;

/*Table structure for table `productstore` */

DROP TABLE IF EXISTS `productstore`;

CREATE TABLE `productstore` (
  `pid` int(150) NOT NULL AUTO_INCREMENT,
  `pname` varchar(150) DEFAULT NULL,
  `pimgname` varchar(256) DEFAULT NULL,
  `psize` varchar(50) DEFAULT NULL,
  `pcolor` varchar(50) DEFAULT NULL,
  `pcomplexion` varchar(100) DEFAULT NULL,
  `pheight` varchar(50) DEFAULT NULL,
  `pweight` varchar(50) DEFAULT NULL,
  `pprice` int(150) DEFAULT NULL,
  `regid` int(12) DEFAULT NULL,
  `pcategory` varchar(150) DEFAULT NULL,
  `is_approved` int(1) DEFAULT NULL,
  PRIMARY KEY (`pid`),
  KEY `regid` (`regid`),
  CONSTRAINT `productstore_ibfk_1` FOREIGN KEY (`regid`) REFERENCES `registerusers` (`regid`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `productstore` */

/*Table structure for table `registerusers` */

DROP TABLE IF EXISTS `registerusers`;

CREATE TABLE `registerusers` (
  `regid` int(12) NOT NULL AUTO_INCREMENT,
  `reg_name` varchar(150) DEFAULT NULL,
  `reg_mob` varchar(12) DEFAULT NULL,
  `reg_address` varchar(150) DEFAULT NULL,
  `reg_email` varchar(100) DEFAULT NULL,
  `rusername` varchar(150) DEFAULT NULL,
  `rpassword` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`regid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `registerusers` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
