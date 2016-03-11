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

/*Table structure for table `accessories` */

DROP TABLE IF EXISTS `accessories`;

CREATE TABLE `accessories` (
  `aid` int(150) NOT NULL AUTO_INCREMENT,
  `aname` varchar(200) DEFAULT NULL,
  `aimgname` varchar(300) DEFAULT NULL,
  `aprice` int(150) DEFAULT NULL,
  `adiscription` text,
  `pid` int(150) DEFAULT NULL,
  PRIMARY KEY (`aid`),
  KEY `pid` (`pid`),
  CONSTRAINT `pid` FOREIGN KEY (`pid`) REFERENCES `productstore` (`pid`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

/*Data for the table `accessories` */

insert  into `accessories`(`aid`,`aname`,`aimgname`,`aprice`,`adiscription`,`pid`) values (35,'Bracelet','601341273-001.jpg',500,'Peach Color Bracelet',23),(36,'Earrings','18kRoseGoldChampagneDiamondPinkSapphireandPinkTourmalineEarrings.jpg',700,'Earrings',23);

/*Table structure for table `complexion` */

DROP TABLE IF EXISTS `complexion`;

CREATE TABLE `complexion` (
  `complexionid` int(12) NOT NULL AUTO_INCREMENT,
  `complexionname` varchar(150) DEFAULT NULL,
  `pid` int(12) DEFAULT NULL,
  PRIMARY KEY (`complexionid`),
  KEY `pid` (`pid`),
  CONSTRAINT `complexion_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `productstore` (`pid`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

/*Data for the table `complexion` */

insert  into `complexion`(`complexionid`,`complexionname`,`pid`) values (29,'Select',16),(30,'Fair',16),(31,'Wheatish',16),(32,'Dark',16),(33,'Fair',17),(35,'Fair',19),(36,'Wheatish',19),(43,'Fair',23);

/*Table structure for table `dheight` */

DROP TABLE IF EXISTS `dheight`;

CREATE TABLE `dheight` (
  `hid` int(12) NOT NULL AUTO_INCREMENT,
  `hname` varchar(150) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  PRIMARY KEY (`hid`),
  KEY `height_ibfk_1` (`pid`),
  CONSTRAINT `dheight_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `productstore` (`pid`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

/*Data for the table `dheight` */

insert  into `dheight`(`hid`,`hname`,`pid`) values (19,'5-6',16),(20,'4-5',17),(21,'5-6',17),(24,'5-6',19),(29,'5-6',23);

/*Table structure for table `dsize` */

DROP TABLE IF EXISTS `dsize`;

CREATE TABLE `dsize` (
  `sid` int(12) NOT NULL AUTO_INCREMENT,
  `sname` varchar(150) DEFAULT NULL,
  `pid` int(12) DEFAULT NULL,
  PRIMARY KEY (`sid`),
  KEY `size_ibfk_1` (`pid`),
  CONSTRAINT `dsize_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `productstore` (`pid`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

/*Data for the table `dsize` */

insert  into `dsize`(`sid`,`sname`,`pid`) values (20,'L',16),(21,'XL',16),(22,'XXL',16),(23,'L',17),(24,'XL',17),(27,'M',19),(33,'M',23);

/*Table structure for table `occassion` */

DROP TABLE IF EXISTS `occassion`;

CREATE TABLE `occassion` (
  `oid` int(11) NOT NULL AUTO_INCREMENT,
  `oname` varchar(100) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  PRIMARY KEY (`oid`),
  KEY `occassion_ibfk_1` (`pid`),
  CONSTRAINT `occassion_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `productstore` (`pid`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

/*Data for the table `occassion` */

insert  into `occassion`(`oid`,`oname`,`pid`) values (11,'Party',16),(12,'Party',17),(14,'Party',19),(20,'Festival',23),(21,'Wedding',23);

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
  `dnumber` int(12) DEFAULT NULL,
  `pdescription` text,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

/*Data for the table `productstore` */

insert  into `productstore`(`pid`,`pname`,`pimgname`,`pcolor`,`pprice`,`pcategory`,`pdesigner`,`dnumber`,`pdescription`) values (16,'White Dress','16=4.jpg','White',750,'Dress','Neeta Lulla',1212121,'Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo ms id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe.Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo ms id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe.Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo ms id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe.Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo ms id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe.'),(17,'Golden Party Dress','17=3.jpg','Black',1000,'Dress','Manish Malhotra',2147483647,'Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo ms id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnisNam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo ms id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe.Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo ms id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe. dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe.'),(19,'Party Dress','19=1=csd.jpg','Orange',450,'Dress','Neeta Lulla',2147483647,'Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo ms id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe.Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo ms id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe.Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo ms id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe.Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo ms id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe.Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo ms id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe.'),(23,'Peach color Partywear Saree','23=Triveni-Women-Partywear-Sari_ac57ebccd00fbf13ca1bb563fd78dd21_images.jpg','Pink',4500,'Saree','shaina nc',1230456789,'Magenta Chiffon Partywear SareeNam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo ms id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe.Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo ms id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe.Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo ms id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe.Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo ms id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe.');

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
