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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

/*Data for the table `complexion` */

insert  into `complexion`(`complexionid`,`complexionname`,`pid`) values (1,'Fair',18),(2,'Dark',18),(12,'Fair',18),(17,'Select',27),(18,'Fair',27),(19,'Wheatish',27),(20,'Dark',27),(21,'Fair',28),(22,'Dark',28),(23,'Fair',29),(24,'Wheatish',29),(25,'Dark',29);

/*Table structure for table `dheight` */

DROP TABLE IF EXISTS `dheight`;

CREATE TABLE `dheight` (
  `hid` int(12) NOT NULL AUTO_INCREMENT,
  `hname` varchar(150) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  PRIMARY KEY (`hid`),
  KEY `height_ibfk_1` (`pid`),
  CONSTRAINT `dheight_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `productstore` (`pid`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `dheight` */

insert  into `dheight`(`hid`,`hname`,`pid`) values (1,'2-4',27),(2,'4-5',27),(3,'5-6',27),(4,'4-5',28),(5,'5-6',28),(6,'2-4',29),(7,'4-5',29);

/*Table structure for table `dsize` */

DROP TABLE IF EXISTS `dsize`;

CREATE TABLE `dsize` (
  `sid` int(12) NOT NULL AUTO_INCREMENT,
  `sname` varchar(150) DEFAULT NULL,
  `pid` int(12) DEFAULT NULL,
  PRIMARY KEY (`sid`),
  KEY `size_ibfk_1` (`pid`),
  CONSTRAINT `dsize_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `productstore` (`pid`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `dsize` */

insert  into `dsize`(`sid`,`sname`,`pid`) values (1,'S',27),(2,'M',27),(3,'S',28),(4,'M',28),(5,'L',28),(6,'XL',28),(7,'XXL',28),(8,'S',29),(9,'M',29),(10,'L',29),(11,'XL',29),(12,'XXL',29);

/*Table structure for table `occasion` */

DROP TABLE IF EXISTS `occasion`;

CREATE TABLE `occasion` (
  `oid` int(12) NOT NULL AUTO_INCREMENT,
  `oname` varchar(150) DEFAULT NULL,
  `pid` int(12) DEFAULT NULL,
  PRIMARY KEY (`oid`),
  KEY `occasion_ibfk_2` (`pid`),
  CONSTRAINT `occasion_ibfk_2` FOREIGN KEY (`pid`) REFERENCES `productstore` (`pid`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `occasion` */

insert  into `occasion`(`oid`,`oname`,`pid`) values (7,'Festival',27),(8,'Wedding',27),(9,'Party',28),(10,'Casual',28),(11,'Formal',29);

/*Table structure for table `productstore` */

DROP TABLE IF EXISTS `productstore`;

CREATE TABLE `productstore` (
  `pid` int(150) NOT NULL AUTO_INCREMENT,
  `pname` varchar(150) DEFAULT NULL,
  `pimgname` varchar(256) DEFAULT NULL,
  `pcolor` varchar(50) DEFAULT NULL,
  `pprice` int(150) DEFAULT NULL,
  `regid` int(12) DEFAULT NULL,
  `pcategory` varchar(150) DEFAULT NULL,
  `pdesigner` varchar(150) DEFAULT NULL,
  `pdescription` text,
  PRIMARY KEY (`pid`),
  KEY `regid` (`regid`),
  CONSTRAINT `productstore_ibfk_1` FOREIGN KEY (`regid`) REFERENCES `registerusers` (`regid`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

/*Data for the table `productstore` */

insert  into `productstore`(`pid`,`pname`,`pimgname`,`pcolor`,`pprice`,`regid`,`pcategory`,`pdesigner`,`pdescription`) values (3,'khkjh','Chrysanthemum.jpg','Blue',500,1,'Saree','khkjh','hghg'),(4,'khkjhfdsfds','Chrysanthemum.jpg','Blue',500,1,'Saree','khkjhfdsfds','hghg'),(5,'khkjhfdsfdssd','Chrysanthemum.jpg','Blue',500,1,'Saree','khkjhfdsfdssd','hghg'),(6,'khkjhfdsfdssdgg','Chrysanthemum.jpg','Blue',500,1,'Saree','khkjhfdsfdssdgg','hghg'),(7,'sd','Chrysanthemum.jpg','Blue',500,1,'Saree','sd','hghg'),(8,'sdsd','Chrysanthemum.jpg','Blue',500,1,'Saree','sdsd','hghg'),(10,'sdsdhgh','Chrysanthemum.jpg','Blue',500,1,'Saree','sdsdhgh','hghg'),(11,'sdsdhgh','Chrysanthemum.jpg','Blue',500,1,'Saree','sdsdhgh','hghg'),(13,'lkjk','Koala.jpg','Black',1000,1,'Tops','lkjk','jkjk'),(14,'lkjk','Koala.jpg','Black',1000,1,'Tops','lkjk','jkjk'),(15,'lkjk','Koala.jpg','Black',1000,1,'Tops','lkjk','jkjk'),(16,'lkjk','Koala.jpg','Black',1000,1,'Tops','lkjk','jkjk'),(17,'lkjk','Koala.jpg','Black',1000,1,'Tops','lkjk','jkjk'),(18,'lkjk','Koala.jpg','Black',1000,1,'Tops','lkjk','jkjk'),(23,'siya','Penguins.jpg','-1',500,1,'Ghagra','siya','jhjkhkj'),(24,'siya','Penguins.jpg','-1',500,1,'Ghagra','siya','jhjkhkj'),(25,'siya','Penguins.jpg','-1',500,1,'Ghagra','siya','jhjkhkj'),(27,'siya','Penguins.jpg','-1',500,1,'Ghagra','siya','jhjkhkj'),(28,'Kiran','Penguins.jpg','Yellow',500,1,'Tops','Kiran','jksdk'),(29,'abc','20131103_113924.jpg','Red',1500,1,'Kurtis','abc','abc');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `registerusers` */

insert  into `registerusers`(`regid`,`reg_name`,`reg_mob`,`reg_address`,`reg_email`,`rusername`,`rpassword`) values (1,'admin','9845632158','sdkl','aaa@gmail.com','admin','admin'),(2,'aaa','9996785678','kjhjk','aaaa@gmail.com','aaaa@gmail.com','6ab141936cd2c30868213a5a99f25711');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
