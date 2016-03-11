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

/*Table structure for table `complexion` */

DROP TABLE IF EXISTS `complexion`;

CREATE TABLE `complexion` (
  `complexionid` int(12) NOT NULL AUTO_INCREMENT,
  `complexionname` varchar(150) DEFAULT NULL,
  `pid` int(12) DEFAULT NULL,
  PRIMARY KEY (`complexionid`),
  KEY `pid` (`pid`),
  CONSTRAINT `complexion_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `productstore` (`pid`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `complexion` */

insert  into `complexion`(`complexionid`,`complexionname`,`pid`) values (1,'Select',6),(2,'Fair',6),(3,'Wheatish',6),(4,'Dark',6),(5,'Fair',7),(6,'Wheatish',7),(7,'Select',8),(8,'Fair',8),(9,'Wheatish',8),(10,'Dark',8),(11,'Fair',9),(12,'Wheatish',9);

/*Table structure for table `dheight` */

DROP TABLE IF EXISTS `dheight`;

CREATE TABLE `dheight` (
  `hid` int(12) NOT NULL AUTO_INCREMENT,
  `hname` varchar(150) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  PRIMARY KEY (`hid`),
  KEY `height_ibfk_1` (`pid`),
  CONSTRAINT `dheight_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `productstore` (`pid`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `dheight` */

insert  into `dheight`(`hid`,`hname`,`pid`) values (1,'4-5',6),(2,'5-6',6),(3,'4-5',7),(4,'5-6',7),(5,'4-5',8),(6,'5-6',8),(7,'4-5',9),(8,'5-6',9);

/*Table structure for table `dsize` */

DROP TABLE IF EXISTS `dsize`;

CREATE TABLE `dsize` (
  `sid` int(12) NOT NULL AUTO_INCREMENT,
  `sname` varchar(150) DEFAULT NULL,
  `pid` int(12) DEFAULT NULL,
  PRIMARY KEY (`sid`),
  KEY `size_ibfk_1` (`pid`),
  CONSTRAINT `dsize_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `productstore` (`pid`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `dsize` */

insert  into `dsize`(`sid`,`sname`,`pid`) values (1,'L',6),(2,'XL',6),(3,'M',7),(4,'L',7),(5,'M',8),(6,'XL',8),(7,'L',9),(8,'XL',9);

/*Table structure for table `occasion` */

DROP TABLE IF EXISTS `occasion`;

CREATE TABLE `occasion` (
  `oid` int(12) NOT NULL AUTO_INCREMENT,
  `oname` varchar(150) DEFAULT NULL,
  `pid` int(12) DEFAULT NULL,
  PRIMARY KEY (`oid`),
  KEY `occasion_ibfk_2` (`pid`),
  CONSTRAINT `occasion_ibfk_2` FOREIGN KEY (`pid`) REFERENCES `productstore` (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `occasion` */

/*Table structure for table `occassion` */

DROP TABLE IF EXISTS `occassion`;

CREATE TABLE `occassion` (
  `oid` int(11) NOT NULL AUTO_INCREMENT,
  `oname` varchar(100) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  PRIMARY KEY (`oid`),
  KEY `occassion_ibfk_1` (`pid`),
  CONSTRAINT `occassion_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `productstore` (`pid`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `occassion` */

insert  into `occassion`(`oid`,`oname`,`pid`) values (1,'Party',6),(2,'Party',7),(3,'Casual',8),(4,'Casual',9);

/*Table structure for table `productstore` */

DROP TABLE IF EXISTS `productstore`;

CREATE TABLE `productstore` (
  `pid` int(150) NOT NULL AUTO_INCREMENT,
  `pname` varchar(150) DEFAULT NULL,
  `pimgname` varchar(256) DEFAULT NULL,
  `pcolor` varchar(50) DEFAULT NULL,
  `pprice` int(150) DEFAULT NULL,
  `pcategory` varchar(150) DEFAULT NULL,
  `pdesigner` varchar(150) DEFAULT NULL,
  `pdescription` text,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `productstore` */

insert  into `productstore`(`pid`,`pname`,`pimgname`,`pcolor`,`pprice`,`pcategory`,`pdesigner`,`pdescription`) values (6,'Neeta Lulla','6=2=4.jpg','White',5000,'Dress','Neeta Lulla','White Party Wear'),(7,'Manish Manhotra','7=3=3.jpg','Black',10000,'Dress','Manish Manhotra','Party Wear by Manish Manhotra'),(8,'Neeta Lulla','8=1=csd.jpg','Orange',500,'Tops','Neeta Lulla','Casual Wear'),(9,'Manish Manhotra','9=5=f.jpg','White',750,'Kurtis','Manish Manhotra','Casual Wear ');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `registerusers` */

insert  into `registerusers`(`regid`,`reg_name`,`reg_mob`,`reg_address`,`reg_email`,`rusername`,`rpassword`) values (1,'admin','9845632158','sdkl','aaa@gmail.com','admin','admin'),(2,'aaa','9996785678','kjhjk','aaaa@gmail.com','aaaa@gmail.com','6ab141936cd2c30868213a5a99f25711'),(3,'aa','9765432456','sdfsdf','aa@gmail.com','aa@gmail.com','03962e1b02bbe26c76dd5385aa081643');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
