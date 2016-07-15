/*
SQLyog Professional v12.08 (64 bit)
MySQL - 10.1.9-MariaDB : Database - kunde
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`kunde` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci */;

USE `kunde`;

/*Table structure for table `catcantidadempleados` */

DROP TABLE IF EXISTS `catcantidadempleados`;

CREATE TABLE `catcantidadempleados` (
  `idcatcantidadempleados` int(11) NOT NULL AUTO_INCREMENT,
  `catcantidadempleados` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idcatcantidadempleados`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `catcantidadempleados` */

insert  into `catcantidadempleados`(`idcatcantidadempleados`,`catcantidadempleados`) values (1,'1 empleado'),(2,'2 a 9 empleados'),(3,'10 a 19 empleados'),(4,'20 a 49 empleados'),(5,'50 a 99 empleados'),(6,'100 a 199 empleados'),(7,'De 200 a 349 empleados'),(8,'De 350 a 999 empleados'),(9,'De 1000 a 2999 empleados'),(10,'Más de 3000 empleados');

/*Table structure for table `catpais` */

DROP TABLE IF EXISTS `catpais`;

CREATE TABLE `catpais` (
  `idcatpais` int(11) NOT NULL AUTO_INCREMENT,
  `pais` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idcatpais`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `catpais` */

insert  into `catpais`(`idcatpais`,`pais`) values (1,'México'),(2,'Venezuela');

/*Table structure for table `tblcliente` */

DROP TABLE IF EXISTS `tblcliente`;

CREATE TABLE `tblcliente` (
  `idtblcliente` int(11) NOT NULL AUTO_INCREMENT,
  `idusers` int(11) NOT NULL,
  `idcatcantidadempleados` int(11) DEFAULT NULL,
  `idcatpais` int(11) DEFAULT NULL,
  `dominio` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombrecliente` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`idtblcliente`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `tblcliente` */

insert  into `tblcliente`(`idtblcliente`,`idusers`,`idcatcantidadempleados`,`idcatpais`,`dominio`,`nombrecliente`) values (4,153,2,2,'testempire.com','Test Empire'),(5,154,2,2,'testempire.com.mx','Test Empire'),(7,156,2,1,'','Test Empire'),(8,157,2,1,'','Parkour');

/*Table structure for table `tblclienteusers` */

DROP TABLE IF EXISTS `tblclienteusers`;

CREATE TABLE `tblclienteusers` (
  `idtblclienteusers` int(11) NOT NULL AUTO_INCREMENT,
  `idtblcliente` int(11) DEFAULT NULL,
  `idusers` int(11) DEFAULT NULL,
  PRIMARY KEY (`idtblclienteusers`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `tblclienteusers` */

/*Table structure for table `tblcourses` */

DROP TABLE IF EXISTS `tblcourses`;

CREATE TABLE `tblcourses` (
  `idtblcourses` int(11) NOT NULL AUTO_INCREMENT,
  `tblcoursesname` varchar(255) DEFAULT NULL,
  `tblcoursesinstitution` varchar(255) DEFAULT NULL,
  `idtblusers` int(11) NOT NULL,
  `idtblexperience` varchar(200) DEFAULT 'PERSONAL',
  `tblcoursesdateinit` date NOT NULL,
  `tblcoursesdateend` date DEFAULT NULL,
  `tblcoursesdescription` text,
  `tblcoursescurrent` varchar(1) DEFAULT NULL,
  `idcatstatus` int(11) DEFAULT '5',
  PRIMARY KEY (`idtblcourses`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblcourses` */

insert  into `tblcourses`(`idtblcourses`,`tblcoursesname`,`tblcoursesinstitution`,`idtblusers`,`idtblexperience`,`tblcoursesdateinit`,`tblcoursesdateend`,`tblcoursesdescription`,`tblcoursescurrent`,`idcatstatus`) values (1,'Heavy','heavy rock',37,'PERSONAL','2016-01-06','2016-03-06','heavy rockheavy rockheavy rockheavy rockheavy rockheavy rockheavy rock',NULL,5);

/*Table structure for table `tbleducation` */

DROP TABLE IF EXISTS `tbleducation`;

CREATE TABLE `tbleducation` (
  `idtbleducation` int(11) NOT NULL AUTO_INCREMENT,
  `idtblusers` int(11) NOT NULL,
  `tbleducationschool` varchar(100) DEFAULT NULL,
  `tbleducationstartdate` date DEFAULT NULL,
  `tbleducationenddate` date DEFAULT NULL,
  `tbleducationdegree` varchar(45) DEFAULT NULL,
  `tbleducationfieldofstudy` varchar(100) DEFAULT NULL,
  `tbleducationgrade` varchar(45) DEFAULT NULL,
  `tbleducationdescription` varchar(2000) DEFAULT NULL,
  `tbleducationcurrent` char(1) DEFAULT NULL,
  `idcatstatus` int(11) DEFAULT '5',
  PRIMARY KEY (`idtbleducation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbleducation` */

insert  into `tbleducation`(`idtbleducation`,`idtblusers`,`tbleducationschool`,`tbleducationstartdate`,`tbleducationenddate`,`tbleducationdegree`,`tbleducationfieldofstudy`,`tbleducationgrade`,`tbleducationdescription`,`tbleducationcurrent`,`idcatstatus`) values (1,37,'Estudio ','2010-05-14','2014-07-11','Gradudado','test','5','una carrera mas','0',5);

/*Table structure for table `tblexperience` */

DROP TABLE IF EXISTS `tblexperience`;

CREATE TABLE `tblexperience` (
  `idtblexperience` int(11) NOT NULL AUTO_INCREMENT,
  `idtblusers` int(11) NOT NULL,
  `tblexperiencecompany` varchar(255) DEFAULT NULL,
  `tblexperiencejobtitle` varchar(255) DEFAULT NULL,
  `tblexperiencestartdate` date DEFAULT NULL,
  `tblexperienceenddate` date DEFAULT NULL,
  `tblexperiencedescriptionjob` varchar(2000) DEFAULT NULL,
  `tblexperiencelocationjob` varchar(255) DEFAULT NULL,
  `idcatstatus` int(11) DEFAULT NULL,
  `tblexperiencecurrent` char(1) DEFAULT NULL,
  PRIMARY KEY (`idtblexperience`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblexperience` */

insert  into `tblexperience`(`idtblexperience`,`idtblusers`,`tblexperiencecompany`,`tblexperiencejobtitle`,`tblexperiencestartdate`,`tblexperienceenddate`,`tblexperiencedescriptionjob`,`tblexperiencelocationjob`,`idcatstatus`,`tblexperiencecurrent`) values (1,37,'Tes1','Sennior develoment','2016-05-11','2016-05-21','Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Proin pharetra facilisis massa at ullamcorper. Maecenas pellentesque enim quis lacinia interdum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sagittis iaculis nisi, vitae aliquam mi tempor vel. Fusce vitae dictum mi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla facilisi. Sed iaculis iaculis mi condimentum laoreet. Maecenas suscipit iaculis mauris vitae fringilla.','s',5,'1'),(2,37,'Tes2','Programador','2016-03-15','2016-05-01','Hola mundo',NULL,5,NULL),(3,37,'Test 3 ','Técnico','2015-10-05','2016-02-11','Chao mundo',NULL,5,NULL);

/*Table structure for table `tblsocialin` */

DROP TABLE IF EXISTS `tblsocialin`;

CREATE TABLE `tblsocialin` (
  `idtblsocialin` int(11) NOT NULL AUTO_INCREMENT,
  `idtblusers` int(11) NOT NULL,
  `tblsocialinprofhead` varchar(255) NOT NULL,
  `tblsocialinaddress` varchar(2000) DEFAULT NULL,
  `tblsocialincountry` varchar(20) NOT NULL,
  `tblsocialinsummary` varchar(2000) DEFAULT NULL,
  `tblsocialinimgprofile` text,
  `idcatstatus` int(11) DEFAULT '5',
  PRIMARY KEY (`idtblsocialin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `tblsocialin` */

insert  into `tblsocialin`(`idtblsocialin`,`idtblusers`,`tblsocialinprofhead`,`tblsocialinaddress`,`tblsocialincountry`,`tblsocialinsummary`,`tblsocialinimgprofile`,`idcatstatus`) values (1,37,'Programador senio','Coyoacán ','México','Vestibulum gravida eros ipsum, sed interdum sapien aliquet at. Suspendisse fringilla varius ante, vitae congue est luctus vel. Interdum et malesuada fames ac ante ipsum primis in faucibus. Maecenas velit felis, varius sed mauris vel, eleifend pellentesque velit. Cras eleifend eros quis urna bibendum, non placerat nulla vestibulum. Fusce lacinia ultricies pellentesque. Donec sit amet pretium arcu. Vestibulum at eros elementum, iaculis nisi vitae, molestie odio.',NULL,5);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `paterno` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `materno` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `puesto` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `img_profile` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `perfil_confirmado` int(2) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=158 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`paterno`,`materno`,`email`,`password`,`role`,`remember_token`,`puesto`,`created_at`,`updated_at`,`img_profile`,`perfil_confirmado`) values (1,'Omar Paredes',NULL,NULL,'omar.paredes@placeyourfinger.com.mx','$2y$10$BxzsvJJQ.tCGFR917IjO4.IoSH7EE2usyvKdW8PKWL1azMErM.oVu','usuario','hl11ltiTKBq0y7DSbr7qeO7640ounVmYyZA91K4WeUsDrpBRflS5J3SnVnUZ','Senior Development','2016-03-22 16:13:59','2016-05-09 23:28:21',NULL,0),(2,'SAMUEL',NULL,NULL,'samuel@gmail.com','$2y$10$TegrwA8uLwiNB5YymrleHO9HbT0/elde7H9fww6ZeBAlmWvzRmLM6','admin','eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjIsImlzcyI6Imh0dHA6XC9cLzUyLjM0LjUxLjUyXC9hcGlcL2F1dGh',NULL,'2016-03-22 17:43:29','2016-03-22 17:43:29',NULL,0),(3,'VICTOR OCTAVIO',NULL,NULL,'dr_valdes_gastro@yahoo.com','$2y$10$BxzsvJJQ.tCGFR917IjO4.IoSH7EE2usyvKdW8PKWL1azMErM.oVu','admin','0GsfputnSj21ZKpYH6Azh4gsdjsCtyQlItFQ9uexTqxGvuhVbDOOorz4j42r',NULL,NULL,'2016-05-09 23:05:19',NULL,0),(4,'ELSA PATRICIA',NULL,NULL,'awebersanchez@gmail.com','$2y$10$BxzsvJJQ.tCGFR917IjO4.IoSH7EE2usyvKdW8PKWL1azMErM.oVu','admin','eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjQsImlzcyI6Imh0dHA6XC9cLzUyLjM0LjUxLjUyXC9hcGlcL2F1dGh',NULL,NULL,'2016-05-06 11:58:09',NULL,0),(5,'MARIBEL',NULL,NULL,'ap-sainos@yahoo.com.mx','$2y$10$BxzsvJJQ.tCGFR917IjO4.IoSH7EE2usyvKdW8PKWL1azMErM.oVu','admin','eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjUsImlzcyI6Imh0dHA6XC9cLzUyLjM0LjUxLjUyXC9hcGlcL2F1dGh',NULL,NULL,'2016-05-05 23:06:13',NULL,0),(6,'MIGUEL ANGEL',NULL,NULL,'carlosgbustillos@prodigy.net.mx','$2y$10$BxzsvJJQ.tCGFR917IjO4.IoSH7EE2usyvKdW8PKWL1azMErM.oVu','admin','raFoXF0xISZgo4JH2IT8fEHbAEZi9rIJ3eC8DFcpaaHpjkF1829tYvhMxmHc',NULL,NULL,'2016-05-05 22:46:30',NULL,0),(7,'OMAR PAREDES OMARE',NULL,NULL,'om@o.com','$2y$10$CSP/2Sa4HWtb0HP06Kj98OsGVOK02epUnjzC3fb7r6bgmBA3YnVdS','admin','eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjcsImlzcyI6Imh0dHA6XC9cLzUyLjM0LjUxLjUyXC9hcGlcL2F1dGh',NULL,NULL,NULL,NULL,0),(8,'OMAR PAREDES OMARE',NULL,NULL,'om@om.com','$2y$10$2LxSNMzj7cdQjhKdFz8gxemN8RI.IpzQFEGINRACJnNZPc3V.8L0C','usuario','eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjgsImlzcyI6Imh0dHA6XC9cLzUyLjM0LjUxLjUyXC9hcGlcL2F1dGh',NULL,NULL,NULL,NULL,0),(9,'OMAR',NULL,NULL,'oma@om.com','123456','usuario',NULL,NULL,NULL,NULL,NULL,0),(10,'OMAR',NULL,NULL,'oma@oma.com','123456','usuario',NULL,NULL,NULL,NULL,NULL,0),(11,'pedregal',NULL,NULL,'1oma@oma.com','123456','usuario',NULL,NULL,NULL,NULL,NULL,0),(12,'OMAR',NULL,NULL,'oamre.paredes@gmail.com','123456','usuario',NULL,NULL,NULL,NULL,NULL,0),(13,'OMAR',NULL,NULL,'oasdmk@gmail.com','$2y$10$HhAAOl5BGJt8ya.7UdnKLOP1ni764aPm2xLJX5iTeNAoXUq6w70Da','usuario',NULL,NULL,NULL,NULL,NULL,0),(15,'OMAR',NULL,NULL,'oasdm@gmail.com','$2y$10$BdGI13bpyvF01wngmOOlzOoKAwlgRPjaVpiLUVd65vEFHUjDI3Igq','usuario',NULL,NULL,NULL,NULL,NULL,0),(16,'OMAR',NULL,NULL,'oasd@gmail.com','$2y$10$oIxuQf8Se4YXdp6g3yTkq.ns2.mISXTkDrU/jgdWHDVGMvBXd2VzK','usuario','eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjE2LCJpc3MiOiJodHRwOlwvXC81Mi4zNC41MS41MlwvYXBpXC9hdXR',NULL,NULL,NULL,NULL,0),(17,'OMAR PAREDES SANCHEZ',NULL,NULL,'omare@omare.com.mx','$2y$10$mW6HsUCJ0i1LErOXLYM9Pe/Wj6ddd8Ju8cixI2.TnBEmUxdQpMLMi','usuario',NULL,NULL,NULL,NULL,NULL,0),(18,'OMAR',NULL,NULL,'omare.com@gmail.com','$2y$10$tWsfPWQlB2.rO89P9p1jvumLlUl7cUfSwmVbrZ33YlCzieqYogwau','usuario',NULL,NULL,NULL,NULL,NULL,0),(20,'OMAR PAREDES SANCHEZ',NULL,NULL,'admin@omare.com.mx','$2y$10$PxA/gd8IidpIrU3OfXx9tOH27JlrL5DyVn1aSoc.kAXFSKS6juwp6','usuario','eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjIwLCJpc3MiOiJodHRwOlwvXC81Mi4zNC41MS41MlwvYXBpXC9hdXR',NULL,NULL,NULL,NULL,0),(21,'OMARE',NULL,NULL,'contacto@omare.com.mx','$2y$10$yU0tjLXKYWrJTXvHHsbMw.88eiLEShMlT21jQEwXO27W2oyr24hwO','usuario','eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjIxLCJpc3MiOiJodHRwOlwvXC81Mi4zNC41MS41MlwvYXBpXC9hdXR',NULL,NULL,NULL,NULL,0),(22,'RICARDO MARES GAYTAN',NULL,NULL,'ricardo.mares@sociallabs.mx','123456','usuario',NULL,NULL,NULL,NULL,NULL,0),(23,'OMAR',NULL,NULL,'omar.paredes@omare.com.mx','$2y$10$ydVE4Hsu1/roPnHUGa0h0OUSra9PGNj628meRwZDjPTluqTuAQ9li','usuario','eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjIzLCJpc3MiOiJodHRwOlwvXC81Mi4zNC41MS41MlwvYXBpXC9hdXR',NULL,NULL,NULL,NULL,0),(24,'Eloisa',NULL,NULL,'eloisa@angeles.net','$2y$10$jdyNFeA74tfFHx01NZIBqOlXu/5wEfYCUIaOhxHqA6xlibzi2rO66','admin','eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjI0LCJpc3MiOiJodHRwOlwvXC81Mi4zNC41MS41MlwvYXBpXC9hdXR',NULL,NULL,'2016-05-05 13:31:04',NULL,0),(25,'Adriana',NULL,NULL,'Adriana@angeles.net','$2y$10$HmC2/Efby1eLpUKp3jlLG.gf8BPFUC671bdHFZFa4BfMJk/unv8s6','admin',NULL,NULL,NULL,NULL,NULL,0),(26,'Foze',NULL,NULL,'abbudfcirugiafacial@yahho.com.mx','$2y$10$BxzsvJJQ.tCGFR917IjO4.IoSH7EE2usyvKdW8PKWL1azMErM.oVu','admin','XHAfKtrKNbqwL8o9JvqhYA0rfYZU3VjalUnY2kJvXySJtE5XfANregX5BaCs',NULL,NULL,'2016-05-06 11:57:43',NULL,0),(27,'Adolfo',NULL,NULL,'adolfo@angeles.net','$2y$10$GW78lBJ0oiv1MNxpF7u.vu6pmhASQron/yz6cbFNnxeW35H0DL0Eu','admin',NULL,NULL,NULL,NULL,NULL,0),(28,'Judith',NULL,NULL,'judith@angeles.net','$2y$10$NNh1kGgH39tKmRziAshSNeSVXOjg8mSGS2yiXXIaSM4.LkUZUDzY.','admin',NULL,NULL,NULL,NULL,NULL,0),(29,'OMAR',NULL,NULL,'omare.paredes@omare.com.mx','$2y$10$Cc3MxnpoyGd6ApZ5igLBxOIuxRiqULY6T5kjbI3RRkKwSPEGnvLvW','usuario','eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjI5LCJpc3MiOiJodHRwOlwvXC81Mi4zNC41MS41MlwvYXBpXC9hdXR',NULL,NULL,NULL,NULL,0),(30,'OMARE',NULL,NULL,'omare.paredes@omare.com','$2y$10$6Q4U/xoXro7VIViYH5gUT.dyjWx7Y/dJF8m0EY64Hkm2Ubb73/c3y','usuario','eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjMwLCJpc3MiOiJodHRwOlwvXC81Mi4zNC41MS41MlwvYXBpXC9hdXR',NULL,NULL,NULL,NULL,0),(31,'SUPERMAN',NULL,NULL,'superman@salonjusticia.com','$2y$10$fcZVSuLycA9u4poYvM.yQ.1B2ArmZlLek0I5A5mmfvvtjrPoLCKk6','usuario','eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjMxLCJpc3MiOiJodHRwOlwvXC81Mi4zNC41MS41MlwvYXBpXC9hdXR',NULL,NULL,NULL,NULL,0),(32,'OMAR',NULL,NULL,'omare.paredes@gmail.com','$2y$10$ekpbWQbL/ASm97cN5LC0RO2IzAGbeq9vQ234.TrRYP4HJgcmw./Cy','usuario',NULL,NULL,NULL,NULL,NULL,0),(35,'Aaron',NULL,NULL,'aaron.cortes@gmail.com','$2y$10$hKE0RZPYM74YP3EjbuTtY.SQ4Gmcg/9ONxsQ3Cm59Zy81zqVjzFSa','usuario','eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjM1LCJpc3MiOiJodHRwOlwvXC81Mi4zNC41MS41MlwvYXBpXC9hdXR',NULL,'2016-04-05 18:02:38','2016-05-06 11:56:44',NULL,0),(36,'Sarai Cortes',NULL,NULL,'sarai.cortes@gmail.com.mx','$2y$10$Hoa0iSdv/VEeQ7T.HwLdGO1nCrSGFi5fITI4s2CdjyR1iMtFMnTfC','usuario','O5EQ3FhbGSpdVOs8bIoWomCWm1vO41Kcl7FFcwIZuhj4dJYaPyT28Z9dOGol',NULL,'2016-04-06 09:39:23','2016-04-06 09:42:39',NULL,0),(37,'Ricardo','Diez','Noria','rldiezn@gmail.com','$2y$10$TUw9GmPcVQWWZBZJvHLWQ.JodDJfDChxR8dS5HLOZJKir4xAfCKDO','usuario','bve0bylvWhx54cWwVrwpQdh3QpKN3I6rfC1SCnyOBin5ROVvvbGeOgNdvuw2','Senior Development','2016-04-11 19:57:48','2016-06-29 23:55:58','/img/user5-128x128.jpg',1),(45,'ERIKA VIRGINIA',NULL,NULL,'samueljustiniano42@yahoo.com.mx','$2y$10$BxzsvJJQ.tCGFR917IjO4.IoSH7EE2usyvKdW8PKWL1azMErM.oVu','admin','Lu14QRy4Vg3PGVjhUjMWAGMGv1VNrApLf9y3y7MlVRUFNlCYRtIiaqLwzF1M',NULL,NULL,'2016-05-05 23:34:57',NULL,0),(46,'ANA TERESA',NULL,NULL,'vpella@epilepsia.com.mx','$2y$10$BxzsvJJQ.tCGFR917IjO4.IoSH7EE2usyvKdW8PKWL1azMErM.oVu','admin','eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjQ2LCJpc3MiOiJodHRwOlwvXC81Mi4zNC41MS41MlwvYXBpXC9hdXR',NULL,NULL,'2016-05-05 23:43:10',NULL,0),(56,'JOSE SALVADOR',NULL,NULL,'jorgemojo@gmail.com','$2y$10$BxzsvJJQ.tCGFR917IjO4.IoSH7EE2usyvKdW8PKWL1azMErM.oVu','admin','G8VZXwoW870e3AwKXfGQMq768aDsMsaUMjgqXt8fEx9rDEVE0hYLJrjTES09',NULL,NULL,'2016-05-06 12:00:08',NULL,0),(128,'ANSELMO LUCIANO',NULL,NULL,'avillalobosaguayo@yahoo.com.mx','$2y$10$BxzsvJJQ.tCGFR917IjO4.IoSH7EE2usyvKdW8PKWL1azMErM.oVu','admin','SMEqmhw3idbEzca0JvnZROlXqvZujhP5739STFcUU7nLHhN2oF1cZG5IuLxN',NULL,NULL,'2016-05-05 23:41:21',NULL,0),(139,'PANFILO FERNANDO',NULL,NULL,'adurazov77@hotmail.com','$2y$10$BxzsvJJQ.tCGFR917IjO4.IoSH7EE2usyvKdW8PKWL1azMErM.oVu','admin','eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEzOSwiaXNzIjoiaHR0cDpcL1wvNTIuMzQuNTEuNTJcL2FwaVwvYXV',NULL,NULL,'2016-05-05 20:36:37',NULL,0),(140,'OMAR',NULL,NULL,'omarparedes@omare.com.mx','$2y$10$lOPeD8fJY7HcoL1qq7pG2ORlIeJWhZvbK8Qkp.YSg.tCqVuphyX1e','usuario','eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjE0MCwiaXNzIjoiaHR0cDpcL1wvNTIuMzQuNTEuNTJcL2FwaVwvYXV',NULL,'2016-05-05 13:29:40','2016-05-05 13:32:26',NULL,0),(141,'Samuel Hernan',NULL,NULL,'mail@mail.com','$2y$10$4zBoVMIx19taiVDaHYR6WO06fgY0t0NlGAJp0.sS/wyf5W6xMNuYC','usuario','v2c536540X6VvIkyYmJalOjXpWndiE1bu97JbRdtm1tkOMZPj4WlGoaRt196',NULL,'2016-05-05 13:31:41','2016-05-05 21:53:39',NULL,0),(142,'Jose',NULL,NULL,'jose.vicente@sociallabs.mx','$2y$10$TU8LA6jVBu89XGWcnB74keaGhZSiwDsPX6w8pcVoU1ZbRCK/Bg1Ia','usuario','ao9kPAAX9SGBdMEY8AtswaSDUd22ZY1QPfOqrMhDezrRn7kkPAv1qLtlRQVg',NULL,'2016-05-05 13:41:03','2016-05-05 17:14:03',NULL,0),(143,'Paciente',NULL,NULL,'paciente@btouch.com','$2y$10$hpVSXY4dfI/kWg/puupYoODg7QXRyn98Y3dC.4Z.EV9/ryrWbqC6i','usuario','S4bzIAJC2nbCHfXiQnM1rh5mHCoYXYXL9F8nynSGjgSaEDQkHzLtjYJ9uIuV',NULL,'2016-05-05 19:01:06','2016-05-05 19:42:22',NULL,0),(144,'Fueguito',NULL,NULL,'fueguito@fueguito.com','$2y$10$HTbdPKDaTPLYhF.6q4A4e.u0nxhGJ7VIsD9f7.kVGIU/pXH1BJSSO','usuario','aGpiCxA3ggzFkVl9eogTCsCzGwUg7QBdgbc1ajPCJOfJKPHLlgSTbk48OKl2',NULL,'2016-05-09 23:08:24','2016-05-09 23:11:51',NULL,0),(145,'Hola Mundo Rodriguez',NULL,NULL,'hola.mundo@rodrigues.com','$2y$10$mLNBT220xTyf3nafhMrUOOECq2hzL0VQzf1LPkFuGbNQkb86lyMYm','usuario','SCFpy1mpcphOV1B0TMjxxG7FwdkoBKPIAr67AAESCzOWaMnf8L8GznNbffq3','','2016-05-09 23:39:26','2016-05-09 23:39:43',NULL,0),(146,'Puesto Test',NULL,NULL,'puesto@hotmail.com','$2y$10$1S0YT6RlGkmS858mD8ldj.SAFe83np7rTdZAPgRzCZqvSEBpyuup6','usuario','iCQ3qb4BtPDI8AUQoVHqTvKpE49MXxnbSzEBwU6CJrRQBNYVBhuC1U3kMId6',NULL,'2016-05-10 14:57:32','2016-05-10 14:59:48',NULL,0),(147,'Itachi',NULL,NULL,'itachi@akatsuki.com','$2y$10$fgnKpm9YH8OhFeHC74JI1.io8O630ZJQV64tVLpG5mrVyR7LLSORG','usuario','lQycH5tXspYaMiI5SSxJLbkaqWxHdeds2CVImRckylBX9F8lEDeFedhgpUib','Uchija','2016-05-10 15:06:40','2016-05-10 15:12:53',NULL,0),(148,'Omar Paredes',NULL,NULL,'omar@omar.com','$2y$10$ESmfn10ixDQjHJ6OzcFhte9fzmi9oTqADiyoEFfD1Cy9FLpY0Eyi6','usuario','xOfNqwlnK4z3b1qCRtn8VnIlCK5po6F4cL56Ei0qk18KO87D9O35IQ1cyugA','Senior Programer','2016-06-13 17:04:47','2016-06-13 18:30:06',NULL,0),(149,'Ricardo Luis',NULL,NULL,'rldiezn@empire.com','$2y$10$.SeRCWtdtIjnlhJePocece2layCIGlNreuL/WTXaJUwmJZx.HCdia','paciente',NULL,'Jefe','2016-06-15 01:09:29','2016-06-15 01:09:29',NULL,0),(153,'Itachi','Uchija','Akatsuki','itachi@testempire.com','$2y$10$Pyn7uYWTqwvUAa7sYQ1fk.dd5.0V3.0OjAO6DncCsz8HmEDIgr7qG','paciente','NsvYlpr7vk246NAP3LRfhBdAHAEPVvfdc2cIxAPEhcXSOOq3wnKxUgWOKZHj','Senior Programer','2016-06-15 20:28:17','2016-06-15 20:35:31',NULL,0),(154,'Itachi','Uchija','','foze@testempire.com.mx','$2y$10$sIs7.IgoTVTRlWxv/zu49eZKPAErfVETrDZ6uUBN8LQi14.sTKK6i','paciente',NULL,'un Puesto Test','2016-06-16 22:25:24','2016-06-16 22:25:24',NULL,0),(156,'Itachi','Uchija','Noria','itachi.test@akatsuki.com','$2y$10$iqZUvCDZcC9EnszrBizBr.PW9g3XBjPoayuvsdpGluqjEi1OOVVbe','admin','0WFTgudlg2jtD7PdiZd0U3j2kxJ2JAnxfm8xiaQQsvLMXv9KMlR5l3YkU5Ow','Itachi','2016-06-22 16:49:38','2016-06-22 16:51:03',NULL,0),(157,'Carlos ','Peraza','Puertas','karl.fow@fow.com','$2y$10$GpOkQdfVMxY9.QcItEghNe3a3wuCchOs.bGhEiXnaIBuNhsgUOy3O','admin','cOCkvNcB706l4ePoAy442mXVfbYoaikT8uxdvVTEqgEwznAWb1QiME37J4At','COO','2016-06-22 18:43:58','2016-06-22 19:12:29',NULL,0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
