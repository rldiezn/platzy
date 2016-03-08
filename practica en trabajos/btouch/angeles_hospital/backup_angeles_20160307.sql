/*
SQLyog Professional v12.08 (64 bit)
MySQL - 10.1.9-MariaDB : Database - angeles
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`angeles` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `angeles`;

/*Table structure for table `cathospital` */

DROP TABLE IF EXISTS `cathospital`;

CREATE TABLE `cathospital` (
  `idcatHospital` int(11) NOT NULL AUTO_INCREMENT,
  `catHospitalName` varchar(100) NOT NULL,
  `idcatStatus` int(11) NOT NULL,
  PRIMARY KEY (`idcatHospital`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `cathospital` */

insert  into `cathospital`(`idcatHospital`,`catHospitalName`,`idcatStatus`) values (1,'HOSPITAL ANGELES PEDREGAL',1),(2,'HOSPITAL ANGELES MOCEL',1),(3,'HOSPITAL ANGELES ACOXPA',1),(4,'HOSPITAL ANGELES ROMA',1);

/*Table structure for table `catlenguages` */

DROP TABLE IF EXISTS `catlenguages`;

CREATE TABLE `catlenguages` (
  `idcatLenguages` int(11) NOT NULL AUTO_INCREMENT,
  `catLenguages` varchar(45) NOT NULL,
  PRIMARY KEY (`idcatLenguages`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `catlenguages` */

insert  into `catlenguages`(`idcatLenguages`,`catLenguages`) values (1,'ESPAÑOL'),(2,'INGLES'),(3,'RUSO'),(4,'MANDARIN'),(5,'ALEMAN');

/*Table structure for table `catstatus` */

DROP TABLE IF EXISTS `catstatus`;

CREATE TABLE `catstatus` (
  `idcatStatus` int(11) NOT NULL AUTO_INCREMENT,
  `catStatus` varchar(45) NOT NULL,
  PRIMARY KEY (`idcatStatus`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `catstatus` */

insert  into `catstatus`(`idcatStatus`,`catStatus`) values (1,'ACTIVO'),(2,'BAJA'),(3,'ACTUAL'),(4,'ELIMINADO');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `migrations` */

/*Table structure for table `tblcourses` */

DROP TABLE IF EXISTS `tblcourses`;

CREATE TABLE `tblcourses` (
  `idtblCourses` int(11) NOT NULL AUTO_INCREMENT,
  `tblCoursesName` varchar(45) NOT NULL,
  `idtblDr` int(11) NOT NULL,
  `idtblExperience` int(11) DEFAULT NULL,
  `tblCoursesDateCourse` date NOT NULL,
  PRIMARY KEY (`idtblCourses`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblcourses` */

/*Table structure for table `tbldoctor` */

DROP TABLE IF EXISTS `tbldoctor`;

CREATE TABLE `tbldoctor` (
  `idtblDr` int(11) NOT NULL AUTO_INCREMENT,
  `tblDoctorName` varchar(100) NOT NULL,
  PRIMARY KEY (`idtblDr`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8;

/*Data for the table `tbldoctor` */

insert  into `tbldoctor`(`idtblDr`,`tblDoctorName`) values (1,'SAMUEL'),(2,'OMAR'),(3,'RICARDO'),(4,'AARON'),(90,'Ricardo el Doctor');

/*Table structure for table `tbleducation` */

DROP TABLE IF EXISTS `tbleducation`;

CREATE TABLE `tbleducation` (
  `idtblEducation` int(11) NOT NULL AUTO_INCREMENT,
  `idtblDr` int(11) NOT NULL,
  `tblEducationSchool` varchar(100) DEFAULT NULL,
  `tblEducationStartDate` date DEFAULT NULL,
  `tblEducationEndDate` date DEFAULT NULL,
  `tblEducationDegree` varchar(45) DEFAULT NULL,
  `tblEducationFieldOfStudy` varchar(100) DEFAULT NULL,
  `tblEducationGrade` varchar(45) DEFAULT NULL,
  `tblEducationDescription` varchar(2000) DEFAULT NULL,
  `tblEducationCurrent` char(1) DEFAULT NULL,
  PRIMARY KEY (`idtblEducation`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

/*Data for the table `tbleducation` */

insert  into `tbleducation`(`idtblEducation`,`idtblDr`,`tblEducationSchool`,`tblEducationStartDate`,`tblEducationEndDate`,`tblEducationDegree`,`tblEducationFieldOfStudy`,`tblEducationGrade`,`tblEducationDescription`,`tblEducationCurrent`) values (1,1,'ANAHUAC','1999-08-02','1900-00-00','UNIVERSIDAD','MEDICINA GENERAL','6 SEMESTRE',' ','S'),(2,1,'ANAHUAC','1996-08-02','1999-05-01','PREPARATORIA','','',' ','N'),(10,90,'Carrera','2016-03-19','2016-03-12','UNIVERSIDAD','Carrera 1','1','CarreraCarreraCarreraCarreraCarreraCarreraCarreraCarreraCarreraCarreraCarreraCarreraCarreraCarreraCarreraCarreraCarreraCarreraCarreraCarreraCarreraCarreraCarreraCarreraCarreraCarreraCarreraCarreraCarreraCarreraCarreraCarreraCarreraCarreraCarreraCarreraCarreraCarreraCarreraCarreraCarreraCarreraCarreraCarreraCarrera','1');

/*Table structure for table `tblexperience` */

DROP TABLE IF EXISTS `tblexperience`;

CREATE TABLE `tblexperience` (
  `idtblExperience` int(11) NOT NULL AUTO_INCREMENT,
  `idtblDr` int(11) NOT NULL,
  `tblExperienceCompany` varchar(100) DEFAULT NULL,
  `tblExperienceJobTitle` varchar(100) DEFAULT NULL,
  `tblExperienceStartDate` date DEFAULT NULL,
  `tblExperienceEndDate` date DEFAULT NULL,
  `tblExperienceDescriptionJob` varchar(2000) DEFAULT NULL,
  `tblExperienceLocationJob` varchar(45) DEFAULT NULL,
  `idcatStatus` int(11) DEFAULT NULL,
  `tblExperienceCurrent` char(1) DEFAULT NULL,
  PRIMARY KEY (`idtblExperience`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

/*Data for the table `tblexperience` */

insert  into `tblexperience`(`idtblExperience`,`idtblDr`,`tblExperienceCompany`,`tblExperienceJobTitle`,`tblExperienceStartDate`,`tblExperienceEndDate`,`tblExperienceDescriptionJob`,`tblExperienceLocationJob`,`idcatStatus`,`tblExperienceCurrent`) values (1,1,'HOSPITAL DE HOUSTON','COORDINADOR DE AREA NEUROLOGICA','2014-03-01','1900-01-01','Lorem ipsum dolor adipiscing amet dolor consequat Adipiscing a commodo ante nunc accumsan et interdum mi ante adipiscing. A nunc lobortis non nisl amet vis sed volutpat aclacus nascetur ac non. Lorem curae et ante amet sapien sed tempus adipiscing id accumsan.','HOUSTON, TEXAS',1,'S'),(2,1,'HOSPITAL DE MEXICO','JEFE DE CONSULTORIOS','2010-03-01','2014-02-12','Lorem ipsum dolor adipiscing amet dolor consequat Adipiscing a commodo ante nunc accumsan et interdum mi ante adipiscing. A nunc lobortis non nisl amet vis sed volutpat aclacus nascetur ac non. Lorem curae et ante amet sapien sed tempus adipiscing id accumsan.','HOUSTON, TEXAS',1,'S'),(26,90,'Cargo 2','Cargo 2','2016-03-03','2016-03-19','Cargo 2Cargo 2Cargo 2Cargo 2Cargo 2Cargo 2Cargo 2Cargo 2Cargo 2Cargo 2Cargo 2Cargo 2Cargo 2Cargo 2Cargo 2Cargo 2Cargo 2Cargo 2Cargo 2Cargo 2Cargo 2Cargo 2Cargo 2Cargo 2Cargo 2Cargo 2Cargo 2Cargo 2Cargo 2Cargo 2Cargo 2Cargo 2Cargo 2','HOUSTON, TEXAS',1,'1'),(27,90,'Cargo 1','Cargo 1','2016-03-01','2016-03-17','CargoCargoCargoCargoCargoCargoCargoCargoCargoCargoCargoCargoCargoCargoCargoCargoCargoCargoCargoCargoCargoCargoCargoCargoCargoCargoCargoCargoCargoCargoCargoCargoCargoCargoCargo','HOUSTON, TEXAS',1,'0');

/*Table structure for table `tbllenguages` */

DROP TABLE IF EXISTS `tbllenguages`;

CREATE TABLE `tbllenguages` (
  `idtblLenguages` int(11) NOT NULL AUTO_INCREMENT,
  `idtblDr` int(11) NOT NULL,
  `idcatLenguage` int(11) NOT NULL,
  PRIMARY KEY (`idtblLenguages`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `tbllenguages` */

insert  into `tbllenguages`(`idtblLenguages`,`idtblDr`,`idcatLenguage`) values (1,1,3),(2,1,1),(3,3,3),(4,3,5),(5,2,1),(6,2,2);

/*Table structure for table `tbllindrhospital` */

DROP TABLE IF EXISTS `tbllindrhospital`;

CREATE TABLE `tbllindrhospital` (
  `idtblLinDrHospital` int(11) NOT NULL AUTO_INCREMENT,
  `idtblLinkedInDr` int(11) NOT NULL,
  `idcatHospital` int(11) NOT NULL,
  PRIMARY KEY (`idtblLinDrHospital`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `tbllindrhospital` */

insert  into `tbllindrhospital`(`idtblLinDrHospital`,`idtblLinkedInDr`,`idcatHospital`) values (1,1,2),(2,2,1),(3,3,1);

/*Table structure for table `tbllinkedindr` */

DROP TABLE IF EXISTS `tbllinkedindr`;

CREATE TABLE `tbllinkedindr` (
  `idtblLinkedInDr` int(11) NOT NULL AUTO_INCREMENT,
  `idtblDr` int(11) NOT NULL,
  `tblLinkedInDrProfHead` varchar(50) NOT NULL,
  `tblLinkedInDrCountry` varchar(20) NOT NULL,
  `idcatHospital` int(11) NOT NULL,
  `tblLinkedInDrSummary` varchar(2000) DEFAULT NULL,
  `tblLinkedInDrImg` text,
  `tblLinkedInDrCV` text,
  PRIMARY KEY (`idtblLinkedInDr`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;

/*Data for the table `tbllinkedindr` */

insert  into `tbllinkedindr`(`idtblLinkedInDr`,`idtblDr`,`tblLinkedInDrProfHead`,`tblLinkedInDrCountry`,`idcatHospital`,`tblLinkedInDrSummary`,`tblLinkedInDrImg`,`tblLinkedInDrCV`) values (1,1,'PRESIDENTE DEL CONSEJO MEDICO DE CIRUJANOS','MEXICO',1,'Lorem ipsum dolor adipiscing amet dolor consequat Adipiscing a commodo ante nunc accumsan et interdum mi ante adipiscing. A nunc lobortis non nisl amet vis sed volutpat aclacus nascetur ac non. Lorem curae et ante amet sapien sed tempus adipiscing id accumsan.',' ',NULL),(2,2,'COORDINADOR DEL AREA DE EMERGENCIAS','MEXICO',1,'Lorem ipsum dolor adipiscing amet dolor consequat Adipiscing a commodo ante nunc accumsan et interdum mi ante adipiscing. A nunc lobortis non nisl amet vis sed volutpat aclacus nascetur ac non. Lorem curae et ante amet sapien sed tempus adipiscing id accumsan.',' ',NULL),(3,3,'DIRECTOR GENERAL DE HOSPITALES INFANTILES','MEXICO',1,'Lorem ipsum dolor adipiscing amet dolor consequat Adipiscing a commodo ante nunc accumsan et interdum mi ante adipiscing. A nunc lobortis non nisl amet vis sed volutpat aclacus nascetur ac non. Lorem curae et ante amet sapien sed tempus adipiscing id accumsan.',' ',NULL),(53,90,'Cirugano','MEXICO',1,'Soy el mejor por que si! Soy el mejor por que si! Soy el mejor por que si! Soy el mejor por que si! Soy el mejor por que si! Soy el mejor por que si! Soy el mejor por que si! Soy el mejor por que si! Soy el mejor por que si! Soy el mejor por que si! Soy el mejor por que si! Soy el mejor por que si! Soy el mejor por que si! Soy el mejor por que si! Soy el mejor por que si! Soy el mejor por que si! Soy el mejor por que si! Soy el mejor por que si! Soy el mejor por que si! Soy el mejor por que si! ','20160307073207.png','20160307073207.pdf');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
