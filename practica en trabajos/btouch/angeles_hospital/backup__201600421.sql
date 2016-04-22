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

/*Table structure for table `catestructura` */

DROP TABLE IF EXISTS `catestructura`;

CREATE TABLE `catestructura` (
  `idcatestructura` int(11) NOT NULL AUTO_INCREMENT,
  `catestructura` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idcatestructura`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `catestructura` */

insert  into `catestructura`(`idcatestructura`,`catestructura`) values (1,'Unidad de Servicio'),(2,'Unidad de Médica'),(3,'Unidad de Tratamiento'),(4,'Unidad de Quirofano');

/*Table structure for table `cathospital` */

DROP TABLE IF EXISTS `cathospital`;

CREATE TABLE `cathospital` (
  `idcatHospital` int(11) NOT NULL,
  `catHospitalName` varchar(100) NOT NULL,
  `catHospitalAddress` text CHARACTER SET utf8 COLLATE utf8_spanish_ci,
  `catHospitalDescription` text CHARACTER SET utf8 COLLATE utf8_spanish_ci,
  `catHospitalProfileImg` varchar(100) NOT NULL,
  `catHospitalBannerImg` varchar(30) DEFAULT NULL,
  `catHospitalLatitude` varchar(15) NOT NULL,
  `catHospitalLongitude` varchar(15) NOT NULL,
  `idcatStatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `cathospital` */

insert  into `cathospital`(`idcatHospital`,`catHospitalName`,`catHospitalAddress`,`catHospitalDescription`,`catHospitalProfileImg`,`catHospitalBannerImg`,`catHospitalLatitude`,`catHospitalLongitude`,`idcatStatus`) values (1,'HOSPITAL ANGELES ACOXPA','Calz Acoxpa No.430, Tlalpan, Ex-Hacienda Coapa, 14300 Ciudad de México, D.F.','Hospital Angeles Acoxpa\r\nEmpresa 100% mexicana integrada al esfuerzo Nacional para el desarrollo, participa en sectores que son pilares del país, como Salud, Turismo, Finanzas y Comunicación, generando valor económico e innumerables fuentes de trabajo. ','HospitalAngelesAcoxpa.jpg','HospitalAngelesAcoxpa.jpg','19.299572','-99.135445',1),(2,'HOSPITAL ANGELES CLINICA LONDRES','Durango 50, Cuauhtémoc, Roma Nte., 06700 Ciudad de México, D.F., México','Hospital Angeles Londres\r\nEmpresa 100% mexicana integrada al esfuerzo Nacional para el desarrollo, participa en sectores que son pilares del país, como Salud, Turismo, Finanzas y Comunicación, generando valor económico e innumerables fuentes de trabajo. ','HOSPITALANGELESCLINICALONDRES.jpg','HA.Clinica-Londres-5-1.jpg','19.417121','-99.145816',1),(3,'HOSPITAL ANGELES LINDAVISTA','Calle Río Bamba 639, Gustavo A. Madero, Magdalena de las Salinas, 07760 Ciudad de México, D.F., México','Hospital Angeles Lindavista\r\nEmpresa 100% mexicana integrada al esfuerzo Nacional para el desarrollo, participa en sectores que son pilares del país, como Salud, Turismo, Finanzas y Comunicación, generando valor económico e innumerables fuentes de trabajo. ','HOSPITALANGELESLINDAVISTA.jpg','hospital-angea.png','19.486863','-99.129385',1),(4,'HOSPITAL ANGELES LOMAS','Av. Vialidad de la Barranca S/N, Valle de las Palmas, Hacienda de las Palmas, 52763 Huixquilucan de Degollado, MEX','Hospital Angeles Lomas\r\nEmpresa 100% mexicana integrada al esfuerzo Nacional para el desarrollo, participa en sectores que son pilares del país, como Salud, Turismo, Finanzas y Comunicación, generando valor económico e innumerables fuentes de trabajo. ','HOSPITALANGELESLOMAS.jpg','13257266.jpg','19.3945806','-99.2838655',1),(5,'HOSPITAL ANGELES METROPOLITANO','Tlacotalpan, 59, Delegación Cuauhtémoc, Colonia Roma, Roma Sur, 06760 Ciudad de Mexico, D.F','Hospital Angeles Metropolitano\r\nEmpresa 100% mexicana integrada al esfuerzo Nacional para el desarrollo, participa en sectores que son pilares del país, como Salud, Turismo, Finanzas y Comunicación, generando valor económico e innumerables fuentes de trabajo. ','HOSPITALANGELESMETROPOLITANO.jpg','angeles.jpg','19.4068232','-99.1690439',1),(6,'HOSPITAL ANGELES MEXICO','Calle Agrarismo No. 208, Miguel Hidalgo, Escandón I Secc, 11800 Ciudad de México, D.F., México','Hospital Angeles México\r\nEmpresa 100% mexicana integrada al esfuerzo Nacional para el desarrollo, participa en sectores que son pilares del país, como Salud, Turismo, Finanzas y Comunicación, generando valor económico e innumerables fuentes de trabajo. ','HOSPITALANGELESMEXICO.jpg','32060069.jpg','19.4000867','-99.1747588',1),(7,'HOSPITAL ANGELES MOCEL','Gelati 29, Miguel Hidalgo, San Miguel Chapultepec I Secc, 11850 Ciudad de México, D.F.','Hospital Angeles Mocel\r\nEmpresa 100% mexicana integrada al esfuerzo Nacional para el desarrollo, participa en sectores que son pilares del país, como Salud, Turismo, Finanzas y Comunicación, generando valor económico e innumerables fuentes de trabajo. ','HOSPITALANGELESMOCEL.jpg','mocel-010lobby.jpg','19.4104871','-99.1871398',1),(8,'HOSPITAL ANGELES PEDREGAL','Camino a Sta. Teresa 1055, Magdalena Contreras, Héroes de Padierna, 10700 Ciudad de Mexico, D.F.','Hospital Angeles Pedregal\r\nEmpresa 100% mexicana integrada al esfuerzo Nacional para el desarrollo, participa en sectores que son pilares del país, como Salud, Turismo, Finanzas y Comunicación, generando valor económico e innumerables fuentes de trabajo. ','HOSPITALANGELESPEDREGAL.jpg','large_IMG_4595.jpg','19.3115028','-99.2229581',1),(9,'HOSPITAL ANGELES ROMA','Calle Querétaro #58, Cuauhtémoc, Roma Nte., 06700 Ciudad de México, D.F.','Hospital Angeles Roma\r\nEmpresa 100% mexicana integrada al esfuerzo Nacional para el desarrollo, participa en sectores que son pilares del país, como Salud, Turismo, Finanzas y Comunicación, generando valor económico e innumerables fuentes de trabajo. ','HOSPITALANGELESROMA.jpg','maxresdefault.jpg','19.4151742',',-99.1595524',1),(10,'HOSPITAL ANGELES SANTA MONICA','Temístocles 210, Polanco, 11560 Ciudad de México, D.F.','Hospital Angeles Santa Monica\r\nEmpresa 100% mexicana integrada al esfuerzo Nacional para el desarrollo, participa en sectores que son pilares del país, como Salud, Turismo, Finanzas y Comunicación, generando valor económico e innumerables fuentes de trabajo. ','HOSPITALANGELESSANTAMONICA.jpg','SUITEg.jpg','19.434074','-99.191732',1);

/*Table structure for table `catlenguages` */

DROP TABLE IF EXISTS `catlenguages`;

CREATE TABLE `catlenguages` (
  `idcatLenguages` int(11) NOT NULL AUTO_INCREMENT,
  `catLenguages` varchar(45) NOT NULL,
  PRIMARY KEY (`idcatLenguages`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `catlenguages` */

/*Table structure for table `catservicios` */

DROP TABLE IF EXISTS `catservicios`;

CREATE TABLE `catservicios` (
  `idcatservicio` int(11) NOT NULL AUTO_INCREMENT,
  `catservicioname` varchar(100) DEFAULT NULL,
  `catserviciodescription` text,
  `catservicioimage` varchar(100) DEFAULT NULL,
  `catservicioimagebanner` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idcatservicio`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

/*Data for the table `catservicios` */

insert  into `catservicios`(`idcatservicio`,`catservicioname`,`catserviciodescription`,`catservicioimage`,`catservicioimagebanner`) values (1,'PDTCOSTE U.de T.Centro de Osteoartritis','En el Centro de Osteoartritis del Hospital Angeles recibirá atención multidisciplinaria de manera integral por parte de médicos ortopedistas, internistas y/o reumatólogos, nutriólogos y terapistas físicos.','osteartritisperfil.png','osteor.jpg'),(2,'PDMAQANE U.M.Anestesiología Quirófano',' ','anestesiaquiroperfil.png','pruebaanestesia.jpg'),(3,'PDMAQANG U.M.Angio y Cirugía Vascular','Dedicada al estudio, prevención, diagnóstico clínico e instrumental y tratamiento de la patología vascular. Los objetivos y campo de acción propios abarcan las enfermedades orgánicas y/o funcionales del sistema arterial, venoso (Flebología) y linfático (Linfología). Son únicamente excluidas de sus competencias el corazón y arterias intracraneales','angiovascularperfil.png','angiovascular.jpg'),(4,'PDMAQCAR U.M.Cirugía Cardiovascular','Especialidad médica de clase quirúrgica que, mediante el uso de la mano y el instrumento, en el hospital ángeles pretendemos resolver aquellas patologías cardíacas que no son tratables con fármacos ni con intervenciones menores como el cateterismo.','cardiovasperfil.png','cardiovascular.jpg'),(5,'PDMAQCOL U.M.Cirugía Coloproctología','La coloproctología es la especialidad de la medicina derivada de la cirugía general que brinda diagnóstico y tratamiento quirúrgico y no quirúrgico de las enfermedades del colon, recto y ano. En hospital ángeles contamos con médicos expertos que resolverán estas enfermedades.','Cirugiacoloproperfil.png','colo.jpg'),(6,'PDMAQDER U.M.Cirugía Dermatologíca','La Cirugía Dermatológica es un área de la Dermatología que resuelve con diversas técnicas quirúrgicas diferentes enfermedades de la piel, siendo el principal tratamiento de los tumores cutáneos. Nuestra equipo de expertos aplica las técnicas quirúrgicas más avanzadas para resolver los tumores de manera eficaz.','CirugiaDermaperfil.png','dermatologica.jpg'),(7,'PDMAQGAS U.M.Gastrocirugía','Es el área de la Gastroenterología que se encarga de la evaluación, diagnostico, planeación y practica del Procedimiento Quirúrgico (Cirugía) que de solución a las Enfermedades del Aparato Digestivo.','gastrocirperfil.png','gastrocir.jpg'),(8,'PDMAQGEN U.M.Cirugía General',' ','generalsurg.png','cirugiiageneral copy.jpg'),(9,'PDMAQGIN U.M.Cirugía Ginecobstetricia','Es el nacimiento de un feto mayor de 22 semanas por medio de una incisiónen la pared abdominal. ','cirugiaginecosperfil.png','gineco.jpg'),(10,'PDMAQMAX U.M.Cirugía Maxilofacial','Cirugía y tratamientos relacionados de un gran espectro de enfermedades, heridas y aspectos estéticos de la boca, dientes, cara, cabeza y cuello. Disciplina muy completa ,que exige expertos como los que encontrarás en el hospital ángeles para su trato.','maxilofacialperfil.png','gastrocir.jpg'),(11,'PDMAQNEF U.M.Cirugía Nefrológica','Puede ser definida como la especialidad clínica que se ocupa del estudio de la anatomía, fisiología, patología, promoción de salud, prevención, clínica, terapéutica y rehabilitación de las enfermedades del aparato urinario en su totalidad, incluyendo las vías urinarias que repercuten sobre el parénquima renal.','CirugiaNefroperfil.png','nefrologica.jpg'),(12,'PDMAQNER U.M.Cirugía Neurológica','La cirugía neurológica abarca el tratamiento quirúrgico, no quirúrgico y estereotáctico de pacientes adultos y pediátricos con determinadas enfermedades del sistema nervioso, tanto del cerebro como de las meninges, la base del cráneo, y de sus vasos sanguíneos, incluyendo el tratamiento quirúrgico y endovascular de procesos patológicos de los vasos intra- y extracraneales que irrigan al cerebro y a la médula espinal; lesiones de la glándula pituitaria; ciertas lesiones de la médula espinal, de las meninges, y de la columna vertebral, incluyendo los que pueden requerir el tratamiento mediante fusión, instrumentación, o técnicas endovasculares; y desórdenes de los nervios craneales y espinales todo a lo largo de su distribución.','CirugiaNeuroperfil.png','neurolo.jpg'),(13,'PDMAQOFT U.M.Cirugía Oftalmológica','La cirugía ocular, o cirugía oftalmológica, es la especialidad quirúrgica relacionada con el ojo. La cirugía del ojo se realiza, generalmente, bajo anestesia local, que paraliza el ojo. Un espéculo adaptado al ojo se introduce para liberar espacio alrededor de los párpados. La cirugía con láser cada vez se desarrolla más. La cirugía ocular permite corregir la pérdida de la agudeza visual debida a cataratas, glaucoma, opacidad de la córnea o desprendimiento de la retina.','Cirugiaoftalperfil.png','oftalmologica.jpg'),(14,'PDMAQONC U.M.Cirugía Oncológica','La Cirugía Oncológica es una sub-especialidad de la Cirugía General, la cual se encarga del diagnóstico de las enfermedades neoplásicas, del tratamiento generalmente quirúrgico aunado al tratamiento adyuvante como Quimioterapia y Radioterapia, asi como el seguimiento de los pacientes posterior al tratamiento.','Cirugiaoncoloperfil.png','oncologica.jpg'),(15,'PDMAQORT U.M.Cirugía Orto y Trauma','La Traumatología es la rama de la medicina que se dedica al estudio de las lesiones del aparato locomotor. La especialidad es quirúrgica, y los médicos que la practican se llaman traumatólogos o cirujanos traumatólogos, su ámbito se extiende más allá del campo de las lesiones traumáticas; abarca el estudio de las enfermedades congénitas o adquiridas que afectan al aparato locomotor, especialmente de aquellas que precisan tratamiento con cirugía, prótesis u órtesis.','ortoytraumaperfil.png','otrotrauma.jpg'),(16,'PDMAQOTO U.M.Cirugía Otorrinolaringo','Procedimientos para la mejora de enfermedades del oído, las vías aéreo-respiratorias superiores y parte de las inferiores, incluyendo nariz, senos paranasales, faringe y laringe.','otorrinoperfil.png','otorrino.jpg'),(17,'PDMAQPLA U.M.Cirugía Plastica y Recons','Especialidad quirúrgica que se ocupa de las alteraciones de la envoltura corporal, con afectación de la forma y de la función o del concepto individual de la propia imagen corporal, debido a una alteración manifiesta, y tiene como objetivo la reparación de estas afectaciones con el restablecimiento de la forma y de la función, siguiendo criterios de proporcionalidad y parámetros estéticos.','cirugiaplaperfil.png','plasticas.jpg'),(18,'PDMAQTOR U.M.Cirugía de Torax','Especialidad médica dedicada al estudio y tratamiento quirúrgico de las enfermedades que afectan al tórax.','cirugiatoraxperfil.png','torax.jpg'),(19,'PDMAQURO U.M.Cirugía Urológica','En el hospital ángeles la cirugía urológica tiene como ámbito anatómico de actuación el riñón y sus estructuras adyacentes, las vías urinarias y el aparato genital masculino, atendiendo las disfunciones de los siguientes órganos y estructuras: glándula suprarrenal, riñón (aspectos morfológicos y alteraciones obstructivas), retroperitoneo y región lumbar, uréter, vejiga, próstata, vía seminal, uretra, estructuras del suelo pelviano, pene, escroto, testículo y epidídimo.','urologyperfil.png','urologica.jpg');

/*Table structure for table `catstatus` */

DROP TABLE IF EXISTS `catstatus`;

CREATE TABLE `catstatus` (
  `idcatStatus` int(11) NOT NULL AUTO_INCREMENT,
  `catStatus` varchar(45) NOT NULL,
  PRIMARY KEY (`idcatStatus`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `catstatus` */

/*Table structure for table `catunidadservicio` */

DROP TABLE IF EXISTS `catunidadservicio`;

CREATE TABLE `catunidadservicio` (
  `idcatunidadservicio` int(11) NOT NULL AUTO_INCREMENT,
  `catunidadservicio` varchar(100) DEFAULT NULL,
  `catunidadpedregal` varchar(45) DEFAULT NULL,
  `catunidadlomas` varchar(45) NOT NULL,
  `catunidadacoxpa` varchar(45) NOT NULL,
  `catunidadlondres` varchar(45) NOT NULL,
  `caunidad` varchar(45) NOT NULL,
  PRIMARY KEY (`idcatunidadservicio`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `catunidadservicio` */

insert  into `catunidadservicio`(`idcatunidadservicio`,`catunidadservicio`,`catunidadpedregal`,`catunidadlomas`,`catunidadacoxpa`,`catunidadlondres`,`caunidad`) values (1,'U.S.Centros','PDSCENTR','','','',''),(2,'U.S.Cirugía','PDSCIRUG','LMSCIRUG','ACSCIRUG','CLSCIRUG',''),(3,'U.S.Clínicas','PDSCLINI','LMSCLINI','ACSCLINI','CLSCLINI',''),(4,'U.S.Hospitalización','PDSHOSPI','LMSHOSPI','ACSHOSPI','CLSHOSPI',''),(5,'U.S.Institutos','PDSINSTI','LMSINSTI','ACSINSTI','CLSINSTI',''),(6,'U.S.Servicios Clínicos','PDSSERVI','LMSSERVI','ACSSERVI','CLSSERVI',''),(7,'U.S.Urgencias','PDSURGEN','LMSURGEN','ACSURGEN','CLSURGEN',''),(8,'U.S Neurorehabitlitación','','LMSNEURO','','','');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `migrations` */

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `tblcitas` */

DROP TABLE IF EXISTS `tblcitas`;

CREATE TABLE `tblcitas` (
  `idtblcitas` int(11) NOT NULL AUTO_INCREMENT,
  `idtblDr` int(11) DEFAULT NULL,
  `idtblpaciente` int(11) DEFAULT NULL,
  `fecha_reserva` date DEFAULT NULL,
  `hora_reserva` time DEFAULT NULL,
  `hora_fin` time DEFAULT NULL,
  `padecimiento` text CHARACTER SET utf8,
  `idcatStatus` int(11) DEFAULT NULL,
  PRIMARY KEY (`idtblcitas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `tblcitas` */

/*Table structure for table `tblcitassap` */

DROP TABLE IF EXISTS `tblcitassap`;

CREATE TABLE `tblcitassap` (
  `idtblcitasSAP` int(11) NOT NULL AUTO_INCREMENT,
  `idtblcita` int(11) DEFAULT NULL,
  `I_NOMBRE_PAC` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `I_APEPAT_PAC` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `I_FECHA_RSVA` date DEFAULT NULL,
  `I_HORA_RSVA` time DEFAULT NULL,
  `I_HORAFIN` time DEFAULT NULL,
  `I_RUT_SOL` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `I_MEDICO` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `I_RUT_PAC` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `U_SANITARIO` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `I_COD_ORIGEN` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `I_UTRATAMIENTO` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `I_UMEDICA` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `I_ESPECIALIDAD` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `I_CS` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `TIPO` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Sera tipo UPD cuando se edite la cita y tipo DEL cuando se cancele',
  `NUM_CONFIRM` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`idtblcitasSAP`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `tblcitassap` */

/*Table structure for table `tblcontactopaciente` */

DROP TABLE IF EXISTS `tblcontactopaciente`;

CREATE TABLE `tblcontactopaciente` (
  `idtblcontacto` int(11) NOT NULL AUTO_INCREMENT,
  `idtblpaciente` int(11) NOT NULL,
  `tblpacienteaddress` text,
  `tblpacientefiscal` text,
  `tbltelefonocel` varchar(20) DEFAULT NULL,
  `tbltelefonootro` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idtblcontacto`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

/*Data for the table `tblcontactopaciente` */

insert  into `tblcontactopaciente`(`idtblcontacto`,`idtblpaciente`,`tblpacienteaddress`,`tblpacientefiscal`,`tbltelefonocel`,`tbltelefonootro`) values (1,1,'Montes de Oca C24 302, Unidad Militar....','ñaskdhasñdlkjasdlaskjdñlaskdjasñlkd','5570709249','5570709249'),(2,3,NULL,NULL,NULL,NULL),(3,4,NULL,NULL,NULL,NULL),(4,6,NULL,NULL,NULL,NULL),(5,7,NULL,NULL,NULL,NULL),(6,8,NULL,NULL,NULL,NULL),(7,9,NULL,NULL,NULL,NULL),(8,10,NULL,NULL,NULL,NULL),(9,11,'Dirección de prueba','Dirección de prueba','5570709249','58711938'),(10,12,NULL,NULL,NULL,NULL),(11,13,NULL,NULL,NULL,NULL),(12,14,NULL,NULL,NULL,NULL),(13,15,NULL,NULL,NULL,NULL),(14,16,NULL,NULL,NULL,NULL),(15,17,NULL,NULL,NULL,NULL),(16,16,NULL,NULL,NULL,NULL),(17,17,NULL,NULL,NULL,NULL),(18,18,'Papusholandia','','5567878450',''),(19,19,'andes 146 4ta lomas verdes','av primero mayo col san andres atoto','55567878450',''),(20,20,NULL,NULL,NULL,NULL);

/*Table structure for table `tblcourses` */

DROP TABLE IF EXISTS `tblcourses`;

CREATE TABLE `tblcourses` (
  `idtblCourses` int(11) NOT NULL AUTO_INCREMENT,
  `tblCoursesName` varchar(45) NOT NULL,
  `tblCoursesInstitution` varchar(45) DEFAULT NULL,
  `idtblDr` int(11) NOT NULL,
  `idtblExperience` varchar(200) DEFAULT 'PERSONAL',
  `tblCoursesDateInit` date NOT NULL,
  `tblCoursesDateEnd` date DEFAULT NULL,
  `tblCoursesDescription` varchar(100) DEFAULT NULL,
  `tblCoursesCurrent` varchar(1) DEFAULT NULL,
  `idcatstatus` int(11) DEFAULT '5',
  PRIMARY KEY (`idtblCourses`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `tblcourses` */

insert  into `tblcourses`(`idtblCourses`,`tblCoursesName`,`tblCoursesInstitution`,`idtblDr`,`idtblExperience`,`tblCoursesDateInit`,`tblCoursesDateEnd`,`tblCoursesDescription`,`tblCoursesCurrent`,`idcatstatus`) values (1,'asasasas','Certificaciones Padilla',4,'ANGELES PEDREGAL','2014-08-15','2014-10-15','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet pellentesque orci. Etiam ','N',5),(2,'asasas','asassa',4,'asasaas','1970-01-15','1970-01-15','asasasasasasasasa,asasasasasas.asasasasas','N',5);

/*Table structure for table `tbldoctor` */

DROP TABLE IF EXISTS `tbldoctor`;

CREATE TABLE `tbldoctor` (
  `idtblDr` int(11) NOT NULL AUTO_INCREMENT,
  `tblDoctorName` varchar(100) NOT NULL,
  `idtblcatstatus` int(11) DEFAULT '5',
  PRIMARY KEY (`idtblDr`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8;

/*Data for the table `tbldoctor` */

insert  into `tbldoctor`(`idtblDr`,`tblDoctorName`,`idtblcatstatus`) values (1,'SAMUEL',NULL),(2,'OMAR',NULL),(3,'RICARDO',NULL),(4,'AARON',NULL),(94,'Ricardo Diez!',NULL),(96,'Ricardo Diez test 22222',NULL),(97,'Jose Medico',NULL),(98,'Ricardo Diez',NULL),(99,'',NULL);

/*Table structure for table `tbldr` */

DROP TABLE IF EXISTS `tbldr`;

CREATE TABLE `tbldr` (
  `idtblDr` int(11) NOT NULL AUTO_INCREMENT,
  `idtbluser` int(11) DEFAULT NULL,
  `tblnoSAP` bigint(15) NOT NULL,
  `tblDoctorName` varchar(100) NOT NULL,
  `tblDoctorPaterno` varchar(100) DEFAULT NULL,
  `tblDoctorPoblacion` varchar(100) DEFAULT NULL,
  `tblDoctorDireccion` text NOT NULL,
  `tblDoctoremail` varchar(100) DEFAULT NULL,
  `tblDoctorTelefono` bigint(15) DEFAULT NULL,
  `idcatstatus` int(11) DEFAULT '5',
  `idcathospital` int(11) DEFAULT NULL,
  `tblDoctorMaterno` varchar(100) DEFAULT NULL,
  `tblDoctorCedula` int(11) DEFAULT NULL,
  PRIMARY KEY (`idtblDr`),
  UNIQUE KEY `tblnoSAP` (`tblnoSAP`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8;

/*Data for the table `tbldr` */

insert  into `tbldr`(`idtblDr`,`idtbluser`,`tblnoSAP`,`tblDoctorName`,`tblDoctorPaterno`,`tblDoctorPoblacion`,`tblDoctorDireccion`,`tblDoctoremail`,`tblDoctorTelefono`,`idcatstatus`,`idcathospital`,`tblDoctorMaterno`,`tblDoctorCedula`) values (1,2,0,'SAMUEL','CORTES','AGUILAR','','samuel@gmail.com',123456789,5,8,'Garcia',NULL),(2,24,1000000006,'MARIA ELOISA','ABARCA MATUS','HEROES DE PADIERNA','CAMINO A SANTA TERESA 1055','eloisa@angeles.net',0,0,2,'RODRIGUEZ',NULL),(3,25,1000000007,'ADRIANA CAROLINA','ABARCA VILLEGAS','HEROES DE PADIERNA','CAMINO A SANTA TERESA 1055','Adriana@angeles.net',0,0,3,'LOPEZ',NULL),(4,26,1000000010,'FOZE','LOMAS','HEROES DE PADIERNA','CAMINO A SANTA TERESA 1055','foze@angeles.net',0,0,4,'NORIA',NULL),(5,27,1000000013,'MIGUEL ADOLFO','ABDO TORO','HEROES DE PADIERNA','CAMINO A SANTA TERESA 1055','adolfo@angeles.net',0,0,NULL,'SOLAR',NULL),(6,28,1000000014,'JUDITH','ABLANEDO AGUIRRE','HEROES DE PADIERNA','CAMINO A SANTA TERESA 1055','judith@angeles.net',0,0,NULL,'AGUILAR',NULL),(7,0,1000000019,'CARLOS MANUEL','ABOITIZ RIVERA','HEROES DE PADIERNA','CAMINO A SANTA TERESA 1055','0',0,0,NULL,'DIAZ',NULL),(8,0,1000000027,'ANA TERESA','ABREU Y ABREU','HEROES DE PADIERNA','CAMINO A SANTA TERESA 1055','0',0,0,NULL,'LLANAS',NULL),(9,0,1000000029,'GABRIEL','ABUD GONZALEZ','HEROES DE PADIERNA','CAMINO A SANTA TERESA 1055','0',0,0,NULL,'ROJAS',NULL),(10,0,1000000035,'JOSE SALVADOR','ABURTO MORALES','HEROES DE PADIERNA','CAMINO A SANTA TERESA 1055','0',0,0,NULL,'SUAREZ',NULL),(11,0,1000000036,'YOLANDA','ABURTO MURRIETA','HEROES DE PADIERNA','CAMINO A SANTA TERESA 1055','0',0,0,NULL,'ALVARES',NULL),(90,1,10,'PEDREGAL','.','','','',0,5,NULL,'LOPEZ',999);

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
  `idcatstatus` int(11) DEFAULT '5',
  PRIMARY KEY (`idtblEducation`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

/*Data for the table `tbleducation` */

insert  into `tbleducation`(`idtblEducation`,`idtblDr`,`tblEducationSchool`,`tblEducationStartDate`,`tblEducationEndDate`,`tblEducationDegree`,`tblEducationFieldOfStudy`,`tblEducationGrade`,`tblEducationDescription`,`tblEducationCurrent`,`idcatstatus`) values (1,1,'ANAHUAC','1999-08-02','1900-00-00','UNIVERSIDAD','MEDICINA GENERAL','6 SEMESTRE','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet pellentesque orci. Etiam quis congue velit. Nam eget massa id turpis congue varius. Aliquam at quam a elit gravida iaculis sed eget dui. Quisque nec consequat tortor. Aliquam porta non nunc sit amet dapibus. In sagittis molestie mi, ac rutrum arcu sodales vel. Nunc tempus mi ut egestas condimentum. Aenean consectetur tincidunt leo. Pellentesque finibus rutrum est. Suspendisse potenti. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel velit velit. Praesent sodales lacinia mi non vulputate. Etiam ut interdum turpis. Curabitur aliquet lobortis ipsum vitae efficitur. Cras in cursus nisi, vel scelerisque lacus. Nunc sit amet rutrum tellus. Nulla blandit risus vitae velit aliquam imperdiet. Ut gravida ultrices quam a eleifend. Nullam tincidunt ex a magna egestas, vitae blandit justo commodo. Sed facilisis ex ac quam elementum porttitor. Phasellus id lorem et nibh mattis porttitor. Morbi rhoncus orci ac libero mattis interdum.','S',NULL),(2,1,'ANAHUAC','1996-08-02','1999-05-01','PREPARATORIA','','','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet pellentesque orci. Etiam quis congue velit. Nam eget massa id turpis congue varius. Aliquam at quam a elit gravida iaculis sed eget dui. Quisque nec consequat tortor. Aliquam porta non nunc sit amet dapibus. In sagittis molestie mi, ac rutrum arcu sodales vel. Nunc tempus mi ut egestas condimentum. Aenean consectetur tincidunt leo. Pellentesque finibus rutrum est. Suspendisse potenti. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel velit velit. Praesent sodales lacinia mi non vulputate. Etiam ut interdum turpis. Curabitur aliquet lobortis ipsum vitae efficitur. Cras in cursus nisi, vel scelerisque lacus. Nunc sit amet rutrum tellus. Nulla blandit risus vitae velit aliquam imperdiet. Ut gravida ultrices quam a eleifend. Nullam tincidunt ex a magna egestas, vitae blandit justo commodo. Sed facilisis ex ac quam elementum porttitor. Phasellus id lorem et nibh mattis porttitor. Morbi rhoncus orci ac libero mattis interdum.','N',NULL),(11,2,'Universidad central de Venezuela','2016-03-02','2016-03-18','UNIVERSIDAD','Medicina','1','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet pellentesque orci. Etiam quis congue velit. Nam eget massa id turpis congue varius. Aliquam at quam a elit gravida iaculis sed eget dui. Quisque nec consequat tortor. Aliquam porta non nunc sit amet dapibus. In sagittis molestie mi, ac rutrum arcu sodales vel. Nunc tempus mi ut egestas condimentum. Aenean consectetur tincidunt leo. Pellentesque finibus rutrum est. Suspendisse potenti. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel velit velit. Praesent sodales lacinia mi non vulputate. Etiam ut interdum turpis. Curabitur aliquet lobortis ipsum vitae efficitur. Cras in cursus nisi, vel scelerisque lacus. Nunc sit amet rutrum tellus. Nulla blandit risus vitae velit aliquam imperdiet. Ut gravida ultrices quam a eleifend. Nullam tincidunt ex a magna egestas, vitae blandit justo commodo. Sed facilisis ex ac quam elementum porttitor. Phasellus id lorem et nibh mattis porttitor. Morbi rhoncus orci ac libero mattis interdum.','0',NULL),(12,5,'Universidad central de Venezuela','2016-03-02','2016-03-18','UNIVERSIDAD','Medicina','1','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet pellentesque orci. Etiam quis congue velit. Nam eget massa id turpis congue varius. Aliquam at quam a elit gravida iaculis sed eget dui. Quisque nec consequat tortor. Aliquam porta non nunc sit amet dapibus. In sagittis molestie mi, ac rutrum arcu sodales vel. Nunc tempus mi ut egestas condimentum. Aenean consectetur tincidunt leo. Pellentesque finibus rutrum est. Suspendisse potenti. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel velit velit. Praesent sodales lacinia mi non vulputate. Etiam ut interdum turpis. Curabitur aliquet lobortis ipsum vitae efficitur. Cras in cursus nisi, vel scelerisque lacus. Nunc sit amet rutrum tellus. Nulla blandit risus vitae velit aliquam imperdiet. Ut gravida ultrices quam a eleifend. Nullam tincidunt ex a magna egestas, vitae blandit justo commodo. Sed facilisis ex ac quam elementum porttitor. Phasellus id lorem et nibh mattis porttitor. Morbi rhoncus orci ac libero mattis interdum.','0',NULL),(13,6,'Universidad central de Venezuela','2016-03-02','2016-03-18','UNIVERSIDAD','Medicina','1','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet pellentesque orci. Etiam quis congue velit. Nam eget massa id turpis congue varius. Aliquam at quam a elit gravida iaculis sed eget dui. Quisque nec consequat tortor. Aliquam porta non nunc sit amet dapibus. In sagittis molestie mi, ac rutrum arcu sodales vel. Nunc tempus mi ut egestas condimentum. Aenean consectetur tincidunt leo. Pellentesque finibus rutrum est. Suspendisse potenti. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel velit velit. Praesent sodales lacinia mi non vulputate. Etiam ut interdum turpis. Curabitur aliquet lobortis ipsum vitae efficitur. Cras in cursus nisi, vel scelerisque lacus. Nunc sit amet rutrum tellus. Nulla blandit risus vitae velit aliquam imperdiet. Ut gravida ultrices quam a eleifend. Nullam tincidunt ex a magna egestas, vitae blandit justo commodo. Sed facilisis ex ac quam elementum porttitor. Phasellus id lorem et nibh mattis porttitor. Morbi rhoncus orci ac libero mattis interdum.','0',NULL),(14,90,'Carrera','2015-09-03','2016-03-25','UNIVERSIDAD','Carrera','1','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet pellentesque orci. Etiam quis congue velit. Nam eget massa id turpis congue varius. Aliquam at quam a elit gravida iaculis sed eget dui. Quisque nec consequat tortor. Aliquam porta non nunc sit amet dapibus. In sagittis molestie mi, ac rutrum arcu sodales vel. Nunc tempus mi ut egestas condimentum. Aenean consectetur tincidunt leo. Pellentesque finibus rutrum est. Suspendisse potenti. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel velit velit. Praesent sodales lacinia mi non vulputate. Etiam ut interdum turpis. Curabitur aliquet lobortis ipsum vitae efficitur. Cras in cursus nisi, vel scelerisque lacus. Nunc sit amet rutrum tellus. Nulla blandit risus vitae velit aliquam imperdiet. Ut gravida ultrices quam a eleifend. Nullam tincidunt ex a magna egestas, vitae blandit justo commodo. Sed facilisis ex ac quam elementum porttitor. Phasellus id lorem et nibh mattis porttitor. Morbi rhoncus orci ac libero mattis interdum.','0',NULL),(15,11,'Universidad Carrera Médico','2016-03-16','2016-03-31','UNIVERSIDAD','Carrera Médico','1','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet pellentesque orci. Etiam quis congue velit. Nam eget massa id turpis congue varius. Aliquam at quam a elit gravida iaculis sed eget dui. Quisque nec consequat tortor. Aliquam porta non nunc sit amet dapibus. In sagittis molestie mi, ac rutrum arcu sodales vel. Nunc tempus mi ut egestas condimentum. Aenean consectetur tincidunt leo. Pellentesque finibus rutrum est. Suspendisse potenti. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel velit velit. Praesent sodales lacinia mi non vulputate. Etiam ut interdum turpis. Curabitur aliquet lobortis ipsum vitae efficitur. Cras in cursus nisi, vel scelerisque lacus. Nunc sit amet rutrum tellus. Nulla blandit risus vitae velit aliquam imperdiet. Ut gravida ultrices quam a eleifend. Nullam tincidunt ex a magna egestas, vitae blandit justo commodo. Sed facilisis ex ac quam elementum porttitor. Phasellus id lorem et nibh mattis porttitor. Morbi rhoncus orci ac libero mattis interdum.','1',NULL),(16,10,'Cargo 1 Cargo 1 Cargo 1 Cargo 1 Cargo 1 Cargo 1 ','2016-03-05','2016-03-16','UNIVERSIDAD','Medicina','1','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet pellentesque orci. Etiam quis congue velit. Nam eget massa id turpis congue varius. Aliquam at quam a elit gravida iaculis sed eget dui. Quisque nec consequat tortor. Aliquam porta non nunc sit amet dapibus. In sagittis molestie mi, ac rutrum arcu sodales vel. Nunc tempus mi ut egestas condimentum. Aenean consectetur tincidunt leo. Pellentesque finibus rutrum est. Suspendisse potenti. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel velit velit. Praesent sodales lacinia mi non vulputate. Etiam ut interdum turpis. Curabitur aliquet lobortis ipsum vitae efficitur. Cras in cursus nisi, vel scelerisque lacus. Nunc sit amet rutrum tellus. Nulla blandit risus vitae velit aliquam imperdiet. Ut gravida ultrices quam a eleifend. Nullam tincidunt ex a magna egestas, vitae blandit justo commodo. Sed facilisis ex ac quam elementum porttitor. Phasellus id lorem et nibh mattis porttitor. Morbi rhoncus orci ac libero mattis interdum.','1',NULL),(17,2,'Konoha','0000-00-00','0000-00-00','UNIVERSIDAD','Ninja prodigio','1','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet pellentesque orci. Etiam quis congue velit. Nam eget massa id turpis congue varius. Aliquam at quam a elit gravida iaculis sed eget dui. Quisque nec consequat tortor. Aliquam porta non nunc sit amet dapibus. In sagittis molestie mi, ac rutrum arcu sodales vel. Nunc tempus mi ut egestas condimentum. Aenean consectetur tincidunt leo. Pellentesque finibus rutrum est. Suspendisse potenti. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel velit velit. Praesent sodales lacinia mi non vulputate. Etiam ut interdum turpis. Curabitur aliquet lobortis ipsum vitae efficitur. Cras in cursus nisi, vel scelerisque lacus. Nunc sit amet rutrum tellus. Nulla blandit risus vitae velit aliquam imperdiet. Ut gravida ultrices quam a eleifend. Nullam tincidunt ex a magna egestas, vitae blandit justo commodo. Sed facilisis ex ac quam elementum porttitor. Phasellus id lorem et nibh mattis porttitor. Morbi rhoncus orci ac libero mattis interdum.','0',5),(18,102,'sadsadsadsdsadadssadasdsdsa','0000-00-00','0000-00-00','UNIVERSIDAD','adasdsadsadsaadadsadsadsad','1','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet pellentesque orci. Etiam quis congue velit. Nam eget massa id turpis congue varius. Aliquam at quam a elit gravida iaculis sed eget dui. Quisque nec consequat tortor. Aliquam porta non nunc sit amet dapibus. In sagittis molestie mi, ac rutrum arcu sodales vel. Nunc tempus mi ut egestas condimentum. Aenean consectetur tincidunt leo. Pellentesque finibus rutrum est. Suspendisse potenti. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel velit velit. Praesent sodales lacinia mi non vulputate. Etiam ut interdum turpis. Curabitur aliquet lobortis ipsum vitae efficitur. Cras in cursus nisi, vel scelerisque lacus. Nunc sit amet rutrum tellus. Nulla blandit risus vitae velit aliquam imperdiet. Ut gravida ultrices quam a eleifend. Nullam tincidunt ex a magna egestas, vitae blandit justo commodo. Sed facilisis ex ac quam elementum porttitor. Phasellus id lorem et nibh mattis porttitor. Morbi rhoncus orci ac libero mattis interdum.','0',5),(19,3,'Konoha','0000-00-00','0000-00-00','UNIVERSIDAD','Carrera','1','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet pellentesque orci. Etiam quis congue velit. Nam eget massa id turpis congue varius. Aliquam at quam a elit gravida iaculis sed eget dui. Quisque nec consequat tortor. Aliquam porta non nunc sit amet dapibus. In sagittis molestie mi, ac rutrum arcu sodales vel. Nunc tempus mi ut egestas condimentum. Aenean consectetur tincidunt leo. Pellentesque finibus rutrum est. Suspendisse potenti. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel velit velit. Praesent sodales lacinia mi non vulputate. Etiam ut interdum turpis. Curabitur aliquet lobortis ipsum vitae efficitur. Cras in cursus nisi, vel scelerisque lacus. Nunc sit amet rutrum tellus. Nulla blandit risus vitae velit aliquam imperdiet. Ut gravida ultrices quam a eleifend. Nullam tincidunt ex a magna egestas, vitae blandit justo commodo. Sed facilisis ex ac quam elementum porttitor. Phasellus id lorem et nibh mattis porttitor. Morbi rhoncus orci ac libero mattis interdum.','0',5),(20,5,'España metal music, México!','2000-04-15','2002-03-15','','LA carrera del Metal!!!! dos!!!','','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet pellentesque orci. Etiam quis congue velit. Nam eget massa id turpis congue varius. Aliquam at quam a elit gravida iaculis sed eget dui. Quisque nec consequat tortor. Aliquam porta non nunc sit amet dapibus. In sagittis molestie mi, ac rutrum arcu sodales vel. Nunc tempus mi ut egestas condimentum. Aenean consectetur tincidunt leo. Pellentesque finibus rutrum est. Suspendisse potenti. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel velit velit. Praesent sodales lacinia mi non vulputate. Etiam ut interdum turpis. Curabitur aliquet lobortis ipsum vitae efficitur. Cras in cursus nisi, vel scelerisque lacus. Nunc sit amet rutrum tellus. Nulla blandit risus vitae velit aliquam imperdiet. Ut gravida ultrices quam a eleifend. Nullam tincidunt ex a magna egestas, vitae blandit justo commodo. Sed facilisis ex ac quam elementum porttitor. Phasellus id lorem et nibh mattis porttitor. Morbi rhoncus orci ac libero mattis interdum.','N',4),(33,9,'IPN','2000-01-01','2005-01-01','UNIVERSIDAD','MEDICO GENERAL','','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet pellentesque orci. Etiam quis congue velit. Nam eget massa id turpis congue varius. Aliquam at quam a elit gravida iaculis sed eget dui. Quisque nec consequat tortor. Aliquam porta non nunc sit amet dapibus. In sagittis molestie mi, ac rutrum arcu sodales vel. Nunc tempus mi ut egestas condimentum. Aenean consectetur tincidunt leo. Pellentesque finibus rutrum est. Suspendisse potenti. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel velit velit. Praesent sodales lacinia mi non vulputate. Etiam ut interdum turpis. Curabitur aliquet lobortis ipsum vitae efficitur. Cras in cursus nisi, vel scelerisque lacus. Nunc sit amet rutrum tellus. Nulla blandit risus vitae velit aliquam imperdiet. Ut gravida ultrices quam a eleifend. Nullam tincidunt ex a magna egestas, vitae blandit justo commodo. Sed facilisis ex ac quam elementum porttitor. Phasellus id lorem et nibh mattis porttitor. Morbi rhoncus orci ac libero mattis interdum.','N',5),(34,1,'IPN','2000-01-15','2005-01-15','UNIVERSIDAD','MEDICO GENERAL','','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet pellentesque orci. Etiam quis congue velit. Nam eget massa id turpis congue varius. Aliquam at quam a elit gravida iaculis sed eget dui. Quisque nec consequat tortor. Aliquam porta non nunc sit amet dapibus. In sagittis molestie mi, ac rutrum arcu sodales vel. Nunc tempus mi ut egestas condimentum. Aenean consectetur tincidunt leo. Pellentesque finibus rutrum est. Suspendisse potenti. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel velit velit. Praesent sodales lacinia mi non vulputate. Etiam ut interdum turpis. Curabitur aliquet lobortis ipsum vitae efficitur. Cras in cursus nisi, vel scelerisque lacus. Nunc sit amet rutrum tellus. Nulla blandit risus vitae velit aliquam imperdiet. Ut gravida ultrices quam a eleifend. Nullam tincidunt ex a magna egestas, vitae blandit justo commodo. Sed facilisis ex ac quam elementum porttitor. Phasellus id lorem et nibh mattis porttitor. Morbi rhoncus orci ac libero mattis interdum.','N',4),(35,7,'IPN','2000-01-01','2005-01-01','UNIVERSIDAD','MEDICO GENERAL','2','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet pellentesque orci. Etiam quis congue velit. Nam eget massa id turpis congue varius. Aliquam at quam a elit gravida iaculis sed eget dui. Quisque nec consequat tortor. Aliquam porta non nunc sit amet dapibus. In sagittis molestie mi, ac rutrum arcu sodales vel. Nunc tempus mi ut egestas condimentum. Aenean consectetur tincidunt leo. Pellentesque finibus rutrum est. Suspendisse potenti. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel velit velit. Praesent sodales lacinia mi non vulputate. Etiam ut interdum turpis. Curabitur aliquet lobortis ipsum vitae efficitur. Cras in cursus nisi, vel scelerisque lacus. Nunc sit amet rutrum tellus. Nulla blandit risus vitae velit aliquam imperdiet. Ut gravida ultrices quam a eleifend. Nullam tincidunt ex a magna egestas, vitae blandit justo commodo. Sed facilisis ex ac quam elementum porttitor. Phasellus id lorem et nibh mattis porttitor. Morbi rhoncus orci ac libero mattis interdum.','N',5),(36,10,'España metal music, México!','2011-03-15','2012-03-15','','España metal music, México! - VENEZUELA','','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet pellentesque orci. Etiam quis congue velit. Nam eget massa id turpis congue varius. Aliquam at quam a elit gravida iaculis sed eget dui. Quisque nec consequat tortor. Aliquam porta non nunc sit amet dapibus. In sagittis molestie mi, ac rutrum arcu sodales vel. Nunc tempus mi ut egestas condimentum. Aenean consectetur tincidunt leo. Pellentesque finibus rutrum est. Suspendisse potenti. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel velit velit. Praesent sodales lacinia mi non vulputate. Etiam ut interdum turpis. Curabitur aliquet lobortis ipsum vitae efficitur. Cras in cursus nisi, vel scelerisque lacus. Nunc sit amet rutrum tellus. Nulla blandit risus vitae velit aliquam imperdiet. Ut gravida ultrices quam a eleifend. Nullam tincidunt ex a magna egestas, vitae blandit justo commodo. Sed facilisis ex ac quam elementum porttitor. Phasellus id lorem et nibh mattis porttitor. Morbi rhoncus orci ac libero mattis interdum.','N',5),(37,8,'Test de Fuego ','2006-03-15','2016-03-15','','Test de Fuego ','','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet pellentesque orci. Etiam quis congue velit. Nam eget massa id turpis congue varius. Aliquam at quam a elit gravida iaculis sed eget dui. Quisque nec consequat tortor. Aliquam porta non nunc sit amet dapibus. In sagittis molestie mi, ac rutrum arcu sodales vel. Nunc tempus mi ut egestas condimentum. Aenean consectetur tincidunt leo. Pellentesque finibus rutrum est. Suspendisse potenti. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel velit velit. Praesent sodales lacinia mi non vulputate. Etiam ut interdum turpis. Curabitur aliquet lobortis ipsum vitae efficitur. Cras in cursus nisi, vel scelerisque lacus. Nunc sit amet rutrum tellus. Nulla blandit risus vitae velit aliquam imperdiet. Ut gravida ultrices quam a eleifend. Nullam tincidunt ex a magna egestas, vitae blandit justo commodo. Sed facilisis ex ac quam elementum porttitor. Phasellus id lorem et nibh mattis porttitor. Morbi rhoncus orci ac libero mattis interdum.','N',4),(38,4,'UNAM','1993-02-15','1970-01-15','','Cardiología','','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet pellentesque orci. Etiam quis congue velit. Nam eget massa id turpis congue varius. Aliquam at quam a elit gravida iaculis sed eget dui. Quisque nec consequat tortor. Aliquam porta non nunc sit amet dapibus. In sagittis molestie mi, ac rutrum arcu sodales vel. Nunc tempus mi ut egestas condimentum. Aenean consectetur tincidunt leo. Pellentesque finibus rutrum est. Suspendisse potenti. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel velit velit. Praesent sodales lacinia mi non vulputate. Etiam ut interdum turpis. Curabitur aliquet lobortis ipsum vitae efficitur. Cras in cursus nisi, vel scelerisque lacus. Nunc sit amet rutrum tellus. Nulla blandit risus vitae velit aliquam imperdiet. Ut gravida ultrices quam a eleifend. Nullam tincidunt ex a magna egestas, vitae blandit justo commodo. Sed facilisis ex ac quam elementum porttitor. Phasellus id lorem et nibh mattis porttitor. Morbi rhoncus orci ac libero mattis interdum.','N',5),(39,4,'ASsASasASasÑ','2016-04-15','2016-04-15','','AssASasÑ','','SasaSasASAsASasASasASasÑ','N',4),(40,4,'ñlsakjdsañldjsdsadñlk','2000-04-15','2016-04-15','','lksjdñlasjdadljsdñlsakjsañdkl','','adsadsadsadasdasdasdasd asdasdasdasdasdasdasdasdasdsadasdasd sadasdsadsad','N',4),(41,4,'asasa','2016-04-15','2016-04-15','','saasasas','','aasasasasasasas','N',5),(42,4,'c','1970-01-15','1970-01-15','','sdsds ','','asa','N',4);

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
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=utf8;

/*Data for the table `tblexperience` */

insert  into `tblexperience`(`idtblExperience`,`idtblDr`,`tblExperienceCompany`,`tblExperienceJobTitle`,`tblExperienceStartDate`,`tblExperienceEndDate`,`tblExperienceDescriptionJob`,`tblExperienceLocationJob`,`idcatStatus`,`tblExperienceCurrent`) values (1,1,'HOSPITAL DE HOUSTON','COORDINADOR DE AREA NEUROLOGICA','2014-03-01','1900-01-01','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet pellentesque orci. Etiam quis congue velit. Nam eget massa id turpis congue varius. Aliquam at quam a elit gravida iaculis sed eget dui. Quisque nec consequat tortor. Aliquam porta non nunc sit amet dapibus. In sagittis molestie mi, ac rutrum arcu sodales vel. Nunc tempus mi ut egestas condimentum. Aenean consectetur tincidunt leo. Pellentesque finibus rutrum est. Suspendisse potenti. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel velit velit. Praesent sodales lacinia mi non vulputate. Etiam ut interdum turpis. Curabitur aliquet lobortis ipsum vitae efficitur. Cras in cursus nisi, vel scelerisque lacus. Nunc sit amet rutrum tellus. Nulla blandit risus vitae velit aliquam imperdiet. Ut gravida ultrices quam a eleifend. Nullam tincidunt ex a magna egestas, vitae blandit justo commodo. Sed facilisis ex ac quam elementum porttitor. Phasellus id lorem et nibh mattis porttitor. Morbi rhoncus orci ac libero mattis interdum.','HOUSTON, TEXAS',1,'S'),(2,1,'HOSPITAL DE MEXICO','JEFE DE CONSULTORIOS','2010-03-01','2014-02-12','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet pellentesque orci. Etiam quis congue velit. Nam eget massa id turpis congue varius. Aliquam at quam a elit gravida iaculis sed eget dui. Quisque nec consequat tortor. Aliquam porta non nunc sit amet dapibus. In sagittis molestie mi, ac rutrum arcu sodales vel. Nunc tempus mi ut egestas condimentum. Aenean consectetur tincidunt leo. Pellentesque finibus rutrum est. Suspendisse potenti. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel velit velit. Praesent sodales lacinia mi non vulputate. Etiam ut interdum turpis. Curabitur aliquet lobortis ipsum vitae efficitur. Cras in cursus nisi, vel scelerisque lacus. Nunc sit amet rutrum tellus. Nulla blandit risus vitae velit aliquam imperdiet. Ut gravida ultrices quam a eleifend. Nullam tincidunt ex a magna egestas, vitae blandit justo commodo. Sed facilisis ex ac quam elementum porttitor. Phasellus id lorem et nibh mattis porttitor. Morbi rhoncus orci ac libero mattis interdum.','HOUSTON, TEXAS',1,'S'),(34,2,'Cargo 2','Cargo 2','2016-03-26','2016-03-31','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet pellentesque orci. Etiam quis congue velit. Nam eget massa id turpis congue varius. Aliquam at quam a elit gravida iaculis sed eget dui. Quisque nec consequat tortor. Aliquam porta non nunc sit amet dapibus. In sagittis molestie mi, ac rutrum arcu sodales vel. Nunc tempus mi ut egestas condimentum. Aenean consectetur tincidunt leo. Pellentesque finibus rutrum est. Suspendisse potenti. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel velit velit. Praesent sodales lacinia mi non vulputate. Etiam ut interdum turpis. Curabitur aliquet lobortis ipsum vitae efficitur. Cras in cursus nisi, vel scelerisque lacus. Nunc sit amet rutrum tellus. Nulla blandit risus vitae velit aliquam imperdiet. Ut gravida ultrices quam a eleifend. Nullam tincidunt ex a magna egestas, vitae blandit justo commodo. Sed facilisis ex ac quam elementum porttitor. Phasellus id lorem et nibh mattis porttitor. Morbi rhoncus orci ac libero mattis interdum.','HOUSTON, TEXAS',1,'1'),(35,3,'Cargo 1','Cargo 1','2016-03-01','2016-03-09','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet pellentesque orci. Etiam quis congue velit. Nam eget massa id turpis congue varius. Aliquam at quam a elit gravida iaculis sed eget dui. Quisque nec consequat tortor. Aliquam porta non nunc sit amet dapibus. In sagittis molestie mi, ac rutrum arcu sodales vel. Nunc tempus mi ut egestas condimentum. Aenean consectetur tincidunt leo. Pellentesque finibus rutrum est. Suspendisse potenti. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel velit velit. Praesent sodales lacinia mi non vulputate. Etiam ut interdum turpis. Curabitur aliquet lobortis ipsum vitae efficitur. Cras in cursus nisi, vel scelerisque lacus. Nunc sit amet rutrum tellus. Nulla blandit risus vitae velit aliquam imperdiet. Ut gravida ultrices quam a eleifend. Nullam tincidunt ex a magna egestas, vitae blandit justo commodo. Sed facilisis ex ac quam elementum porttitor. Phasellus id lorem et nibh mattis porttitor. Morbi rhoncus orci ac libero mattis interdum.','HOUSTON, TEXAS',1,'0'),(40,4,'Angeles Mocel','Presidente de Consejo','2012-03-15','2015-10-15','DSJDDSLJDSL','',4,'N'),(41,4,'Cirujano 1 ','Cirujano 1 ','2015-05-15','2016-04-15','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet pellentesque orci. Etiam quis congue velit. Nam eget massa id turpis congue varius. Aliquam at quam a elit gravida iaculis sed eget dui. Quisque nec consequat tortor. Aliquam porta non nunc sit amet dapibus. In sagittis molestie mi, ac rutrum arcu sodales vel. Nunc tempus mi ut egestas condimentum. Aenean consectetur tincidunt leo. Pellentesque finibus rutrum est. Suspendisse potenti. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel velit velit. Praesent sodales lacinia mi non vulputate. Etiam ut interdum turpis. Curabitur aliquet lobortis ipsum vitae efficitur. Cras in cursus nisi, vel scelerisque lacus. Nunc sit amet rutrum tellus. Nulla blandit risus vitae velit aliquam imperdiet. Ut gravida ultrices quam a eleifend. Nullam tincidunt ex a magna egestas, vitae blandit justo commodo. Sed facilisis ex ac quam elementum porttitor. Phasellus id lorem et nibh mattis porttitor. Morbi rhoncus orci ac libero mattis interdum.','',5,'S'),(54,4,'Btouch','Senior Development Engineer','2016-04-15','2016-03-15','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet pellentesque orci. Etiam quis congue velit. Nam eget massa id turpis congue varius. Aliquam at quam a elit gravida iaculis sed eget dui. Quisque nec consequat tortor. Aliquam porta non nunc sit amet dapibus. In sagittis molestie mi, ac rutrum arcu sodales vel. Nunc tempus mi ut egestas condimentum. Aenean consectetur tincidunt leo. Pellentesque finibus rutrum est. Suspendisse potenti. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel velit velit. Praesent sodales lacinia mi non vulputate. Etiam ut interdum turpis. Curabitur aliquet lobortis ipsum vitae efficitur. Cras in cursus nisi, vel scelerisque lacus. Nunc sit amet rutrum tellus. Nulla blandit risus vitae velit aliquam imperdiet. Ut gravida ultrices quam a eleifend. Nullam tincidunt ex a magna egestas, vitae blandit justo commodo. Sed facilisis ex ac quam elementum porttitor. Phasellus id lorem et nibh mattis porttitor. Morbi rhoncus orci ac libero mattis interdum.','',5,'N'),(55,7,'Desconosido','Ninja Exiliado (Akatsuki)','0000-00-00','0000-00-00','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet pellentesque orci. Etiam quis congue velit. Nam eget massa id turpis congue varius. Aliquam at quam a elit gravida iaculis sed eget dui. Quisque nec consequat tortor. Aliquam porta non nunc sit amet dapibus. In sagittis molestie mi, ac rutrum arcu sodales vel. Nunc tempus mi ut egestas condimentum. Aenean consectetur tincidunt leo. Pellentesque finibus rutrum est. Suspendisse potenti. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel velit velit. Praesent sodales lacinia mi non vulputate. Etiam ut interdum turpis. Curabitur aliquet lobortis ipsum vitae efficitur. Cras in cursus nisi, vel scelerisque lacus. Nunc sit amet rutrum tellus. Nulla blandit risus vitae velit aliquam imperdiet. Ut gravida ultrices quam a eleifend. Nullam tincidunt ex a magna egestas, vitae blandit justo commodo. Sed facilisis ex ac quam elementum porttitor. Phasellus id lorem et nibh mattis porttitor. Morbi rhoncus orci ac libero mattis interdum.','HOUSTON, TEXAS',1,'1'),(56,1,'LA hoja','Ambu','0000-00-00','0000-00-00','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet pellentesque orci. Etiam quis congue velit. Nam eget massa id turpis congue varius. Aliquam at quam a elit gravida iaculis sed eget dui. Quisque nec consequat tortor. Aliquam porta non nunc sit amet dapibus. In sagittis molestie mi, ac rutrum arcu sodales vel. Nunc tempus mi ut egestas condimentum. Aenean consectetur tincidunt leo. Pellentesque finibus rutrum est. Suspendisse potenti. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel velit velit. Praesent sodales lacinia mi non vulputate. Etiam ut interdum turpis. Curabitur aliquet lobortis ipsum vitae efficitur. Cras in cursus nisi, vel scelerisque lacus. Nunc sit amet rutrum tellus. Nulla blandit risus vitae velit aliquam imperdiet. Ut gravida ultrices quam a eleifend. Nullam tincidunt ex a magna egestas, vitae blandit justo commodo. Sed facilisis ex ac quam elementum porttitor. Phasellus id lorem et nibh mattis porttitor. Morbi rhoncus orci ac libero mattis interdum.','HOUSTON, TEXAS',1,'0'),(57,1,'LA hoja','Ninja Beginner','0000-00-00','0000-00-00','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet pellentesque orci. Etiam quis congue velit. Nam eget massa id turpis congue varius. Aliquam at quam a elit gravida iaculis sed eget dui. Quisque nec consequat tortor. Aliquam porta non nunc sit amet dapibus. In sagittis molestie mi, ac rutrum arcu sodales vel. Nunc tempus mi ut egestas condimentum. Aenean consectetur tincidunt leo. Pellentesque finibus rutrum est. Suspendisse potenti. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel velit velit. Praesent sodales lacinia mi non vulputate. Etiam ut interdum turpis. Curabitur aliquet lobortis ipsum vitae efficitur. Cras in cursus nisi, vel scelerisque lacus. Nunc sit amet rutrum tellus. Nulla blandit risus vitae velit aliquam imperdiet. Ut gravida ultrices quam a eleifend. Nullam tincidunt ex a magna egestas, vitae blandit justo commodo. Sed facilisis ex ac quam elementum porttitor. Phasellus id lorem et nibh mattis porttitor. Morbi rhoncus orci ac libero mattis interdum.','HOUSTON, TEXAS',1,'0'),(58,3,'HOSPITAL ABC','ENFERMERO','2000-10-15','2003-01-15','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet pellentesque orci. Etiam quis congue velit. Nam eget massa id turpis congue varius. Aliquam at quam a elit gravida iaculis sed eget dui. Quisque nec consequat tortor. Aliquam porta non nunc sit amet dapibus. In sagittis molestie mi, ac rutrum arcu sodales vel. Nunc tempus mi ut egestas condimentum. Aenean consectetur tincidunt leo. Pellentesque finibus rutrum est. Suspendisse potenti. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel velit velit. Praesent sodales lacinia mi non vulputate. Etiam ut interdum turpis. Curabitur aliquet lobortis ipsum vitae efficitur. Cras in cursus nisi, vel scelerisque lacus. Nunc sit amet rutrum tellus. Nulla blandit risus vitae velit aliquam imperdiet. Ut gravida ultrices quam a eleifend. Nullam tincidunt ex a magna egestas, vitae blandit justo commodo. Sed facilisis ex ac quam elementum porttitor. Phasellus id lorem et nibh mattis porttitor. Morbi rhoncus orci ac libero mattis interdum.','HOUSTON, TEXAS',1,'N'),(59,2,'dsadsasadasdsadsad','sdasdasdsadas','0000-00-00','0000-00-00','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet pellentesque orci. Etiam quis congue velit. Nam eget massa id turpis congue varius. Aliquam at quam a elit gravida iaculis sed eget dui. Quisque nec consequat tortor. Aliquam porta non nunc sit amet dapibus. In sagittis molestie mi, ac rutrum arcu sodales vel. Nunc tempus mi ut egestas condimentum. Aenean consectetur tincidunt leo. Pellentesque finibus rutrum est. Suspendisse potenti. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel velit velit. Praesent sodales lacinia mi non vulputate. Etiam ut interdum turpis. Curabitur aliquet lobortis ipsum vitae efficitur. Cras in cursus nisi, vel scelerisque lacus. Nunc sit amet rutrum tellus. Nulla blandit risus vitae velit aliquam imperdiet. Ut gravida ultrices quam a eleifend. Nullam tincidunt ex a magna egestas, vitae blandit justo commodo. Sed facilisis ex ac quam elementum porttitor. Phasellus id lorem et nibh mattis porttitor. Morbi rhoncus orci ac libero mattis interdum.','HOUSTON, TEXAS',1,'0'),(60,3,'Ninja','Ninja','2012-03-01','2016-03-01','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet pellentesque orci. Etiam quis congue velit. Nam eget massa id turpis congue varius. Aliquam at quam a elit gravida iaculis sed eget dui. Quisque nec consequat tortor. Aliquam porta non nunc sit amet dapibus. In sagittis molestie mi, ac rutrum arcu sodales vel. Nunc tempus mi ut egestas condimentum. Aenean consectetur tincidunt leo. Pellentesque finibus rutrum est. Suspendisse potenti. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel velit velit. Praesent sodales lacinia mi non vulputate. Etiam ut interdum turpis. Curabitur aliquet lobortis ipsum vitae efficitur. Cras in cursus nisi, vel scelerisque lacus. Nunc sit amet rutrum tellus. Nulla blandit risus vitae velit aliquam imperdiet. Ut gravida ultrices quam a eleifend. Nullam tincidunt ex a magna egestas, vitae blandit justo commodo. Sed facilisis ex ac quam elementum porttitor. Phasellus id lorem et nibh mattis porttitor. Morbi rhoncus orci ac libero mattis interdum.','HOUSTON, TEXAS',1,'1'),(61,9,'España','Gira españa!3','2008-03-01','2008-03-01','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet pellentesque orci. Etiam quis congue velit. Nam eget massa id turpis congue varius. Aliquam at quam a elit gravida iaculis sed eget dui. Quisque nec consequat tortor. Aliquam porta non nunc sit amet dapibus. In sagittis molestie mi, ac rutrum arcu sodales vel. Nunc tempus mi ut egestas condimentum. Aenean consectetur tincidunt leo. Pellentesque finibus rutrum est. Suspendisse potenti. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel velit velit. Praesent sodales lacinia mi non vulputate. Etiam ut interdum turpis. Curabitur aliquet lobortis ipsum vitae efficitur. Cras in cursus nisi, vel scelerisque lacus. Nunc sit amet rutrum tellus. Nulla blandit risus vitae velit aliquam imperdiet. Ut gravida ultrices quam a eleifend. Nullam tincidunt ex a magna egestas, vitae blandit justo commodo. Sed facilisis ex ac quam elementum porttitor. Phasellus id lorem et nibh mattis porttitor. Morbi rhoncus orci ac libero mattis interdum.','HOUSTON, TEXAS',4,'N'),(62,8,'Concierto México','Concierto México','1970-01-15','1970-01-15','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet pellentesque orci. Etiam quis congue velit. Nam eget massa id turpis congue varius. Aliquam at quam a elit gravida iaculis sed eget dui. Quisque nec consequat tortor. Aliquam porta non nunc sit amet dapibus. In sagittis molestie mi, ac rutrum arcu sodales vel. Nunc tempus mi ut egestas condimentum. Aenean consectetur tincidunt leo. Pellentesque finibus rutrum est. Suspendisse potenti. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel velit velit. Praesent sodales lacinia mi non vulputate. Etiam ut interdum turpis. Curabitur aliquet lobortis ipsum vitae efficitur. Cras in cursus nisi, vel scelerisque lacus. Nunc sit amet rutrum tellus. Nulla blandit risus vitae velit aliquam imperdiet. Ut gravida ultrices quam a eleifend. Nullam tincidunt ex a magna egestas, vitae blandit justo commodo. Sed facilisis ex ac quam elementum porttitor. Phasellus id lorem et nibh mattis porttitor. Morbi rhoncus orci ac libero mattis interdum.','Concierto México',4,'N'),(63,9,'Caracas','Concierto Venezuela','2010-05-15','2010-05-15','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet pellentesque orci. Etiam quis congue velit. Nam eget massa id turpis congue varius. Aliquam at quam a elit gravida iaculis sed eget dui. Quisque nec consequat tortor. Aliquam porta non nunc sit amet dapibus. In sagittis molestie mi, ac rutrum arcu sodales vel. Nunc tempus mi ut egestas condimentum. Aenean consectetur tincidunt leo. Pellentesque finibus rutrum est. Suspendisse potenti. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel velit velit. Praesent sodales lacinia mi non vulputate. Etiam ut interdum turpis. Curabitur aliquet lobortis ipsum vitae efficitur. Cras in cursus nisi, vel scelerisque lacus. Nunc sit amet rutrum tellus. Nulla blandit risus vitae velit aliquam imperdiet. Ut gravida ultrices quam a eleifend. Nullam tincidunt ex a magna egestas, vitae blandit justo commodo. Sed facilisis ex ac quam elementum porttitor. Phasellus id lorem et nibh mattis porttitor. Morbi rhoncus orci ac libero mattis interdum.','',5,'N'),(68,9,'Todo el país212121212','Todo el país ','2016-03-15','2016-03-15','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet pellentesque orci. Etiam quis congue velit. Nam eget massa id turpis congue varius. Aliquam at quam a elit gravida iaculis sed eget dui. Quisque nec consequat tortor. Aliquam porta non nunc sit amet dapibus. In sagittis molestie mi, ac rutrum arcu sodales vel. Nunc tempus mi ut egestas condimentum. Aenean consectetur tincidunt leo. Pellentesque finibus rutrum est. Suspendisse potenti. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel velit velit. Praesent sodales lacinia mi non vulputate. Etiam ut interdum turpis. Curabitur aliquet lobortis ipsum vitae efficitur. Cras in cursus nisi, vel scelerisque lacus. Nunc sit amet rutrum tellus. Nulla blandit risus vitae velit aliquam imperdiet. Ut gravida ultrices quam a eleifend. Nullam tincidunt ex a magna egestas, vitae blandit justo commodo. Sed facilisis ex ac quam elementum porttitor. Phasellus id lorem et nibh mattis porttitor. Morbi rhoncus orci ac libero mattis interdum.','',5,'N'),(69,10,'Todo el país','Concierto en España','2012-07-01','2016-03-01','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet pellentesque orci. Etiam quis congue velit. Nam eget massa id turpis congue varius. Aliquam at quam a elit gravida iaculis sed eget dui. Quisque nec consequat tortor. Aliquam porta non nunc sit amet dapibus. In sagittis molestie mi, ac rutrum arcu sodales vel. Nunc tempus mi ut egestas condimentum. Aenean consectetur tincidunt leo. Pellentesque finibus rutrum est. Suspendisse potenti. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel velit velit. Praesent sodales lacinia mi non vulputate. Etiam ut interdum turpis. Curabitur aliquet lobortis ipsum vitae efficitur. Cras in cursus nisi, vel scelerisque lacus. Nunc sit amet rutrum tellus. Nulla blandit risus vitae velit aliquam imperdiet. Ut gravida ultrices quam a eleifend. Nullam tincidunt ex a magna egestas, vitae blandit justo commodo. Sed facilisis ex ac quam elementum porttitor. Phasellus id lorem et nibh mattis porttitor. Morbi rhoncus orci ac libero mattis interdum.','HOUSTON, TEXAS',4,'N'),(70,11,'Todo el país','Concierto en España','2012-07-01','2016-03-01','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet pellentesque orci. Etiam quis congue velit. Nam eget massa id turpis congue varius. Aliquam at quam a elit gravida iaculis sed eget dui. Quisque nec consequat tortor. Aliquam porta non nunc sit amet dapibus. In sagittis molestie mi, ac rutrum arcu sodales vel. Nunc tempus mi ut egestas condimentum. Aenean consectetur tincidunt leo. Pellentesque finibus rutrum est. Suspendisse potenti. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel velit velit. Praesent sodales lacinia mi non vulputate. Etiam ut interdum turpis. Curabitur aliquet lobortis ipsum vitae efficitur. Cras in cursus nisi, vel scelerisque lacus. Nunc sit amet rutrum tellus. Nulla blandit risus vitae velit aliquam imperdiet. Ut gravida ultrices quam a eleifend. Nullam tincidunt ex a magna egestas, vitae blandit justo commodo. Sed facilisis ex ac quam elementum porttitor. Phasellus id lorem et nibh mattis porttitor. Morbi rhoncus orci ac libero mattis interdum.','HOUSTON, TEXAS',4,'N'),(71,90,'Concierto México','Concierto México','2012-03-01','2013-10-01','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet pellentesque orci. Etiam quis congue velit. Nam eget massa id turpis congue varius. Aliquam at quam a elit gravida iaculis sed eget dui. Quisque nec consequat tortor. Aliquam porta non nunc sit amet dapibus. In sagittis molestie mi, ac rutrum arcu sodales vel. Nunc tempus mi ut egestas condimentum. Aenean consectetur tincidunt leo. Pellentesque finibus rutrum est. Suspendisse potenti. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel velit velit. Praesent sodales lacinia mi non vulputate. Etiam ut interdum turpis. Curabitur aliquet lobortis ipsum vitae efficitur. Cras in cursus nisi, vel scelerisque lacus. Nunc sit amet rutrum tellus. Nulla blandit risus vitae velit aliquam imperdiet. Ut gravida ultrices quam a eleifend. Nullam tincidunt ex a magna egestas, vitae blandit justo commodo. Sed facilisis ex ac quam elementum porttitor. Phasellus id lorem et nibh mattis porttitor. Morbi rhoncus orci ac libero mattis interdum.','HOUSTON, TEXAS',4,'N'),(72,9,'Concierto Venezuela','Concierto Venezuela','2000-01-01','2001-03-01','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet pellentesque orci. Etiam quis congue velit. Nam eget massa id turpis congue varius. Aliquam at quam a elit gravida iaculis sed eget dui. Quisque nec consequat tortor. Aliquam porta non nunc sit amet dapibus. In sagittis molestie mi, ac rutrum arcu sodales vel. Nunc tempus mi ut egestas condimentum. Aenean consectetur tincidunt leo. Pellentesque finibus rutrum est. Suspendisse potenti. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel velit velit. Praesent sodales lacinia mi non vulputate. Etiam ut interdum turpis. Curabitur aliquet lobortis ipsum vitae efficitur. Cras in cursus nisi, vel scelerisque lacus. Nunc sit amet rutrum tellus. Nulla blandit risus vitae velit aliquam imperdiet. Ut gravida ultrices quam a eleifend. Nullam tincidunt ex a magna egestas, vitae blandit justo commodo. Sed facilisis ex ac quam elementum porttitor. Phasellus id lorem et nibh mattis porttitor. Morbi rhoncus orci ac libero mattis interdum.','HOUSTON, TEXAS',4,'N'),(75,4,'Lejos','Hola Mundo !','2016-04-15','2016-03-15','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet pellentesque orci. Etiam quis congue velit. Nam eget massa id turpis congue varius. Aliquam at quam a elit gravida iaculis sed eget dui. Quisque nec consequat tortor. Aliquam porta non nunc sit amet dapibus. In sagittis molestie mi, ac rutrum arcu sodales vel. Nunc tempus mi ut egestas condimentum. Aenean consectetur tincidunt leo. Pellentesque finibus rutrum est. Suspendisse potenti. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel velit velit. Praesent sodales lacinia mi non vulputate. Etiam ut interdum turpis. Curabitur aliquet lobortis ipsum vitae efficitur. Cras in cursus nisi, vel scelerisque lacus. Nunc sit amet rutrum tellus. Nulla blandit risus vitae velit aliquam imperdiet. Ut gravida ultrices quam a eleifend. Nullam tincidunt ex a magna egestas, vitae blandit justo commodo. Sed facilisis ex ac quam elementum porttitor. Phasellus id lorem et nibh mattis porttitor. Morbi rhoncus orci ac libero mattis interdum.','',4,'S'),(76,4,'Angeles Pedregal','Doctor General','2013-02-15','1970-01-15','Estaba a cargo de todo el departamento de dermatología. Supervisando que los doctores fuesen los mejores en el sector','',5,'S'),(77,4,'Hospital Español','Dermatología','2007-12-15','2010-09-15','Esta es de hospital español',NULL,4,'N'),(78,4,'Hospital Español','Dermatología','2010-04-15','2013-12-15','Hola hola',NULL,4,'N'),(79,90,'Hola!','Hola!','2016-04-15','2016-04-15','asasasaasasa','',5,'N'),(80,4,'adasdasdasdsadas','sasasdasdsadsa','2016-04-15','2016-04-15','','',4,'N'),(81,4,'dasdasdasdas','adasdasdsadas','2016-04-15','2016-04-15','dasdasdasd','',5,'N'),(82,4,'','@','1970-01-15','1970-01-15','','',4,'N'),(83,4,'','@','1970-01-15','1970-01-15','','',4,'N'),(84,4,'','','1970-01-15','1970-01-15','saasasasas, @','',4,'N'),(85,4,'','O_O','1970-01-15','1970-01-15','asasasaa@@@@','',4,'N'),(86,4,'s','asassa','1970-01-15','1970-01-15',',','',4,'N');

/*Table structure for table `tblhorariosdoctor` */

DROP TABLE IF EXISTS `tblhorariosdoctor`;

CREATE TABLE `tblhorariosdoctor` (
  `idtblHorario` int(11) NOT NULL AUTO_INCREMENT,
  `idtblDr` int(11) DEFAULT NULL,
  `tblHorarioInicio` varchar(5) DEFAULT NULL,
  `tblHorarioFin` varchar(5) DEFAULT NULL,
  `tblIntermedioInicio` varchar(5) NOT NULL,
  `tblIntermedioFin` varchar(5) NOT NULL,
  `tblDuracionConsulta` varchar(3) DEFAULT NULL,
  `tblHorarioDia` int(1) DEFAULT NULL,
  PRIMARY KEY (`idtblHorario`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;

/*Data for the table `tblhorariosdoctor` */

insert  into `tblhorariosdoctor`(`idtblHorario`,`idtblDr`,`tblHorarioInicio`,`tblHorarioFin`,`tblIntermedioInicio`,`tblIntermedioFin`,`tblDuracionConsulta`,`tblHorarioDia`) values (1,1,'9','17','13','14','30',1),(2,1,'8','17','12','14','30',2),(3,1,'9','16','13','14','30',3),(4,1,'10','16','13','14','30',4),(5,1,'8','14','','','30',5),(6,2,'9','17','13','14','30',1),(7,2,'8','17','12','14','30',2),(8,2,'9','16','13','14','30',3),(9,2,'10','16','13','14','30',4),(10,2,'8','14','','','30',5),(11,3,'9','17','13','14','30',1),(12,3,'8','17','12','14','30',2),(13,3,'9','16','13','14','30',3),(14,3,'10','16','13','14','30',4),(15,3,'8','14','','','30',5),(16,4,'9','17','13','14','30',1),(17,4,'8','17','12','14','30',2),(18,4,'9','16','13','14','30',3),(19,4,'10','16','13','14','30',4),(20,4,'8','14','','','30',5),(21,5,'9','17','13','14','30',1),(22,5,'8','17','12','14','30',2),(23,5,'9','16','13','14','30',3),(24,5,'10','16','13','14','30',4),(25,5,'8','14','','','30',5),(26,6,'9','17','13','14','30',1),(27,6,'8','17','12','14','30',2),(28,6,'9','16','13','14','30',3),(29,6,'10','16','13','14','30',4),(30,6,'8','14','','','30',5),(31,7,'9','17','13','14','30',1),(32,7,'8','17','12','14','30',2),(33,7,'9','16','13','14','30',3),(34,7,'10','16','13','14','30',4),(35,7,'8','14','','','30',5),(36,8,'9','17','13','14','30',1),(37,8,'8','17','12','14','30',2),(38,8,'9','16','13','14','30',3),(39,8,'10','16','13','14','30',4),(40,8,'8','14','','','30',5),(41,9,'9','17','13','14','30',1),(42,9,'8','17','12','14','30',2),(43,9,'9','16','13','14','30',3),(44,9,'10','16','13','14','30',4),(45,9,'8','14','','','30',5),(46,10,'9','17','13','14','30',1),(47,10,'8','17','12','14','30',2),(48,10,'9','16','13','14','30',3),(49,10,'10','16','13','14','30',4),(50,10,'8','14','','','30',5),(51,11,'9','17','13','14','30',1),(52,11,'8','17','12','14','30',2),(53,11,'9','16','13','14','30',3),(54,11,'10','16','13','14','30',4),(55,11,'8','14','','','30',5);

/*Table structure for table `tblhospitalesservicios` */

DROP TABLE IF EXISTS `tblhospitalesservicios`;

CREATE TABLE `tblhospitalesservicios` (
  `idtblhospitalesservicios` int(11) NOT NULL AUTO_INCREMENT,
  `idcathospital` int(11) NOT NULL,
  `idcatservicio` int(11) NOT NULL,
  `idcatestructura` int(11) NOT NULL,
  `idcatunidadservicio` int(11) NOT NULL,
  PRIMARY KEY (`idtblhospitalesservicios`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8;

/*Data for the table `tblhospitalesservicios` */

insert  into `tblhospitalesservicios`(`idtblhospitalesservicios`,`idcathospital`,`idcatservicio`,`idcatestructura`,`idcatunidadservicio`) values (1,8,1,1,1),(2,8,2,2,2),(3,8,3,2,2),(4,8,4,2,2),(5,8,5,2,2),(6,8,6,2,2),(7,8,7,2,2),(8,8,8,2,2),(9,8,9,2,2),(10,8,10,2,2),(11,8,11,2,2),(12,8,12,2,2),(13,8,13,2,2),(14,8,14,2,2),(15,8,15,2,2),(16,8,16,2,2),(17,8,17,2,2),(18,8,18,2,2),(19,8,19,2,2),(20,4,2,2,2),(21,4,3,2,2),(22,4,4,2,2),(23,4,5,2,2),(24,4,6,2,2),(25,4,7,2,2),(26,4,8,2,2),(27,4,9,2,2),(28,4,10,2,2),(29,4,11,2,2),(30,4,12,2,2),(31,4,13,2,2),(32,4,14,2,2),(33,4,15,2,2),(34,4,16,2,2),(35,4,17,2,2),(36,4,18,2,2),(37,4,19,2,2),(38,1,2,2,2),(39,1,3,2,2),(40,1,4,2,2),(41,1,5,2,2),(42,1,6,2,2),(43,1,7,2,2),(44,1,8,2,2),(45,1,9,2,2),(46,1,10,2,2),(47,1,11,2,2),(48,1,12,2,2),(49,1,13,2,2),(50,1,14,2,2),(51,1,15,2,2),(52,1,16,2,2),(53,1,17,2,2),(54,1,18,2,2),(55,1,19,2,2),(56,2,2,2,2),(57,2,3,2,2),(58,2,4,2,2),(59,2,5,2,2),(60,2,6,2,2),(61,2,7,2,2),(62,2,8,2,2),(63,2,9,2,2),(64,2,10,2,2),(65,2,11,2,2),(66,2,12,2,2),(67,2,13,2,2),(68,2,14,2,2),(69,2,15,2,2),(70,2,16,2,2),(71,2,17,2,2),(72,2,18,2,2),(73,2,19,2,2);

/*Table structure for table `tbllenguages` */

DROP TABLE IF EXISTS `tbllenguages`;

CREATE TABLE `tbllenguages` (
  `idtblLenguages` int(11) NOT NULL AUTO_INCREMENT,
  `idtblDr` int(11) NOT NULL,
  `idcatLenguage` int(11) NOT NULL,
  PRIMARY KEY (`idtblLenguages`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbllenguages` */

/*Table structure for table `tbllindrhospital` */

DROP TABLE IF EXISTS `tbllindrhospital`;

CREATE TABLE `tbllindrhospital` (
  `idtblLinDrHospital` int(11) NOT NULL AUTO_INCREMENT,
  `idtblLinkedInDr` int(11) NOT NULL,
  `idcatHospital` int(11) NOT NULL,
  PRIMARY KEY (`idtblLinDrHospital`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbllindrhospital` */

/*Table structure for table `tbllinkedindr` */

DROP TABLE IF EXISTS `tbllinkedindr`;

CREATE TABLE `tbllinkedindr` (
  `idtblLinkedInDr` int(11) NOT NULL AUTO_INCREMENT,
  `idtblDr` int(11) NOT NULL,
  `tblLinkedInDrProfHead` varchar(50) NOT NULL,
  `tblLinkedInDrAddress` varchar(2000) DEFAULT NULL,
  `tblLinkedInDrCountry` varchar(20) NOT NULL,
  `idcatHospital` int(11) NOT NULL,
  `tblLinkedInDrSummary` varchar(2000) DEFAULT NULL,
  `tblLinkedInDrImg` text,
  `tblLinkedInDrCV` text,
  `tblLinkedInDrBannerImg` text,
  `idcatstatus` int(11) DEFAULT '5',
  PRIMARY KEY (`idtblLinkedInDr`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

/*Data for the table `tbllinkedindr` */

insert  into `tbllinkedindr`(`idtblLinkedInDr`,`idtblDr`,`tblLinkedInDrProfHead`,`tblLinkedInDrAddress`,`tblLinkedInDrCountry`,`idcatHospital`,`tblLinkedInDrSummary`,`tblLinkedInDrImg`,`tblLinkedInDrCV`,`tblLinkedInDrBannerImg`,`idcatstatus`) values (1,1,'CARDIOLOGO','TLANEPANTLA , ESTADO DE MEXICO','México',1,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet pellentesque orci. Etiam quis congue velit. Nam eget massa id turpis congue varius. Aliquam at quam a elit gravida iaculis sed eget dui. Quisque nec consequat tortor. Aliquam porta non nunc sit amet dapibus. In sagittis molestie mi, ac rutrum arcu sodales vel. Nunc tempus mi ut egestas condimentum. Aenean consectetur tincidunt leo. Pellentesque finibus rutrum est. Suspendisse potenti. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel velit velit. Praesent sodales lacinia mi non vulputate. Etiam ut interdum turpis. Curabitur aliquet lobortis ipsum vitae efficitur. Cras in cursus nisi, vel scelerisque lacus. Nunc sit amet rutrum tellus. Nulla blandit risus vitae velit aliquam imperdiet. Ut gravida ultrices quam a eleifend. Nullam tincidunt ex a magna egestas, vitae blandit justo commodo. Sed facilisis ex ac quam elementum porttitor. Phasellus id lorem et nibh mattis porttitor. Morbi rhoncus orci ac libero mattis interdum.','20160329125219.jpg',NULL,NULL,5),(2,2,'GINECOLOGO','COYOACAN, CDMX','México',2,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet pellentesque orci. Etiam quis congue velit. Nam eget massa id turpis congue varius. Aliquam at quam a elit gravida iaculis sed eget dui. Quisque nec consequat tortor. Aliquam porta non nunc sit amet dapibus. In sagittis molestie mi, ac rutrum arcu sodales vel. Nunc tempus mi ut egestas condimentum. Aenean consectetur tincidunt leo. Pellentesque finibus rutrum est. Suspendisse potenti. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel velit velit. Praesent sodales lacinia mi non vulputate. Etiam ut interdum turpis. Curabitur aliquet lobortis ipsum vitae efficitur. Cras in cursus nisi, vel scelerisque lacus. Nunc sit amet rutrum tellus. Nulla blandit risus vitae velit aliquam imperdiet. Ut gravida ultrices quam a eleifend. Nullam tincidunt ex a magna egestas, vitae blandit justo commodo. Sed facilisis ex ac quam elementum porttitor. Phasellus id lorem et nibh mattis porttitor. Morbi rhoncus orci ac libero mattis interdum.','20160329034405.jpg',NULL,NULL,5),(3,3,'PEDIATRA','MONTERREY, MEXICO','MÉXICO',3,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet pellentesque orci. Etiam quis congue velit. Nam eget massa id turpis congue varius. Aliquam at quam a elit gravida iaculis sed eget dui. Quisque nec consequat tortor. Aliquam porta non nunc sit amet dapibus. In sagittis molestie mi, ac rutrum arcu sodales vel. Nunc tempus mi ut egestas condimentum. Aenean consectetur tincidunt leo. Pellentesque finibus rutrum est. Suspendisse potenti. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel velit velit. Praesent sodales lacinia mi non vulputate. Etiam ut interdum turpis. Curabitur aliquet lobortis ipsum vitae efficitur. Cras in cursus nisi, vel scelerisque lacus. Nunc sit amet rutrum tellus. Nulla blandit risus vitae velit aliquam imperdiet. Ut gravida ultrices quam a eleifend. Nullam tincidunt ex a magna egestas, vitae blandit justo commodo. Sed facilisis ex ac quam elementum porttitor. Phasellus id lorem et nibh mattis porttitor. Morbi rhoncus orci ac libero mattis interdum.',NULL,NULL,NULL,5),(4,4,'Dermatología','Angeles Pedregal','Mexico',4,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet pellentesque orci. Etiam quis congue velit. Nam eget massa id turpis congue varius. Aliquam at quam a elit gravida iaculis sed eget dui. Quisque nec consequat tortor. Aliquam porta non nunc sit amet dapibus. In sagittis molestie mi, ac rutrum arcu sodales vel. Nunc tempus mi ut egestas condimentum. Aenean consectetur tincidunt leo. Pellentesque finibus rutrum est. Suspendisse potenti. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel velit velit. Praesent sodales lacinia mi non vulputate. Etiam ut interdum turpis. Curabitur aliquet lobortis ipsum vitae efficitur. Cras in cursus nisi, vel scelerisque lacus. Nunc sit amet rutrum tellus. Nulla blandit risus vitae velit aliquam imperdiet. Ut gravida ultrices quam a eleifend. Nullam tincidunt ex a magna egestas, vitae blandit justo commodo. Sed facilisis ex ac quam elementum porttitor. Phasellus id lorem et nibh mattis porttitor. Morbi rhoncus orci ac libero mattis interdum.','160418084815_croppedImage.png','20160418083133.pdf','20160418082920.png',5),(5,5,'TRAUMATOLOGO','COYOACAN, CDMX','MÉXICO',5,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet pellentesque orci. Etiam quis congue velit. Nam eget massa id turpis congue varius. Aliquam at quam a elit gravida iaculis sed eget dui. Quisque nec consequat tortor. Aliquam porta non nunc sit amet dapibus. In sagittis molestie mi, ac rutrum arcu sodales vel. Nunc tempus mi ut egestas condimentum. Aenean consectetur tincidunt leo. Pellentesque finibus rutrum est. Suspendisse potenti. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel velit velit. Praesent sodales lacinia mi non vulputate. Etiam ut interdum turpis. Curabitur aliquet lobortis ipsum vitae efficitur. Cras in cursus nisi, vel scelerisque lacus. Nunc sit amet rutrum tellus. Nulla blandit risus vitae velit aliquam imperdiet. Ut gravida ultrices quam a eleifend. Nullam tincidunt ex a magna egestas, vitae blandit justo commodo. Sed facilisis ex ac quam elementum porttitor. Phasellus id lorem et nibh mattis porttitor. Morbi rhoncus orci ac libero mattis interdum.',NULL,NULL,NULL,5),(6,6,'DERMATOLOGO','MONTERREY, MEXICO','MÉXICO',6,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet pellentesque orci. Etiam quis congue velit. Nam eget massa id turpis congue varius. Aliquam at quam a elit gravida iaculis sed eget dui. Quisque nec consequat tortor. Aliquam porta non nunc sit amet dapibus. In sagittis molestie mi, ac rutrum arcu sodales vel. Nunc tempus mi ut egestas condimentum. Aenean consectetur tincidunt leo. Pellentesque finibus rutrum est. Suspendisse potenti. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel velit velit. Praesent sodales lacinia mi non vulputate. Etiam ut interdum turpis. Curabitur aliquet lobortis ipsum vitae efficitur. Cras in cursus nisi, vel scelerisque lacus. Nunc sit amet rutrum tellus. Nulla blandit risus vitae velit aliquam imperdiet. Ut gravida ultrices quam a eleifend. Nullam tincidunt ex a magna egestas, vitae blandit justo commodo. Sed facilisis ex ac quam elementum porttitor. Phasellus id lorem et nibh mattis porttitor. Morbi rhoncus orci ac libero mattis interdum.',NULL,NULL,NULL,5),(7,7,'CARDIOLOGO','NAUCALPAM , ESTADO DE MEXICO','MÉXICO',7,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet pellentesque orci. Etiam quis congue velit. Nam eget massa id turpis congue varius. Aliquam at quam a elit gravida iaculis sed eget dui. Quisque nec consequat tortor. Aliquam porta non nunc sit amet dapibus. In sagittis molestie mi, ac rutrum arcu sodales vel. Nunc tempus mi ut egestas condimentum. Aenean consectetur tincidunt leo. Pellentesque finibus rutrum est. Suspendisse potenti. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel velit velit. Praesent sodales lacinia mi non vulputate. Etiam ut interdum turpis. Curabitur aliquet lobortis ipsum vitae efficitur. Cras in cursus nisi, vel scelerisque lacus. Nunc sit amet rutrum tellus. Nulla blandit risus vitae velit aliquam imperdiet. Ut gravida ultrices quam a eleifend. Nullam tincidunt ex a magna egestas, vitae blandit justo commodo. Sed facilisis ex ac quam elementum porttitor. Phasellus id lorem et nibh mattis porttitor. Morbi rhoncus orci ac libero mattis interdum.',NULL,NULL,NULL,5),(8,8,'ORTODONCISTA','COYOACAN, CDMX','MÉXICO',8,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet pellentesque orci. Etiam quis congue velit. Nam eget massa id turpis congue varius. Aliquam at quam a elit gravida iaculis sed eget dui. Quisque nec consequat tortor. Aliquam porta non nunc sit amet dapibus. In sagittis molestie mi, ac rutrum arcu sodales vel. Nunc tempus mi ut egestas condimentum. Aenean consectetur tincidunt leo. Pellentesque finibus rutrum est. Suspendisse potenti. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel velit velit. Praesent sodales lacinia mi non vulputate. Etiam ut interdum turpis. Curabitur aliquet lobortis ipsum vitae efficitur. Cras in cursus nisi, vel scelerisque lacus. Nunc sit amet rutrum tellus. Nulla blandit risus vitae velit aliquam imperdiet. Ut gravida ultrices quam a eleifend. Nullam tincidunt ex a magna egestas, vitae blandit justo commodo. Sed facilisis ex ac quam elementum porttitor. Phasellus id lorem et nibh mattis porttitor. Morbi rhoncus orci ac libero mattis interdum.',NULL,NULL,NULL,5),(9,9,'PSICOLOGO','MONTERREY, MEXICO','MÉXICO',9,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet pellentesque orci. Etiam quis congue velit. Nam eget massa id turpis congue varius. Aliquam at quam a elit gravida iaculis sed eget dui. Quisque nec consequat tortor. Aliquam porta non nunc sit amet dapibus. In sagittis molestie mi, ac rutrum arcu sodales vel. Nunc tempus mi ut egestas condimentum. Aenean consectetur tincidunt leo. Pellentesque finibus rutrum est. Suspendisse potenti. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel velit velit. Praesent sodales lacinia mi non vulputate. Etiam ut interdum turpis. Curabitur aliquet lobortis ipsum vitae efficitur. Cras in cursus nisi, vel scelerisque lacus. Nunc sit amet rutrum tellus. Nulla blandit risus vitae velit aliquam imperdiet. Ut gravida ultrices quam a eleifend. Nullam tincidunt ex a magna egestas, vitae blandit justo commodo. Sed facilisis ex ac quam elementum porttitor. Phasellus id lorem et nibh mattis porttitor. Morbi rhoncus orci ac libero mattis interdum.',NULL,NULL,NULL,5),(10,10,'CIRUGANO','NAUCALPAM , ESTADO DE MEXICO','MÉXICO',10,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet pellentesque orci. Etiam quis congue velit. Nam eget massa id turpis congue varius. Aliquam at quam a elit gravida iaculis sed eget dui. Quisque nec consequat tortor. Aliquam porta non nunc sit amet dapibus. In sagittis molestie mi, ac rutrum arcu sodales vel. Nunc tempus mi ut egestas condimentum. Aenean consectetur tincidunt leo. Pellentesque finibus rutrum est. Suspendisse potenti. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel velit velit. Praesent sodales lacinia mi non vulputate. Etiam ut interdum turpis. Curabitur aliquet lobortis ipsum vitae efficitur. Cras in cursus nisi, vel scelerisque lacus. Nunc sit amet rutrum tellus. Nulla blandit risus vitae velit aliquam imperdiet. Ut gravida ultrices quam a eleifend. Nullam tincidunt ex a magna egestas, vitae blandit justo commodo. Sed facilisis ex ac quam elementum porttitor. Phasellus id lorem et nibh mattis porttitor. Morbi rhoncus orci ac libero mattis interdum.',NULL,NULL,NULL,5),(11,11,'ENFERMERO','COYOACAN, CDMX','MÉXICO',1,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet pellentesque orci. Etiam quis congue velit. Nam eget massa id turpis congue varius. Aliquam at quam a elit gravida iaculis sed eget dui. Quisque nec consequat tortor. Aliquam porta non nunc sit amet dapibus. In sagittis molestie mi, ac rutrum arcu sodales vel. Nunc tempus mi ut egestas condimentum. Aenean consectetur tincidunt leo. Pellentesque finibus rutrum est. Suspendisse potenti. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel velit velit. Praesent sodales lacinia mi non vulputate. Etiam ut interdum turpis. Curabitur aliquet lobortis ipsum vitae efficitur. Cras in cursus nisi, vel scelerisque lacus. Nunc sit amet rutrum tellus. Nulla blandit risus vitae velit aliquam imperdiet. Ut gravida ultrices quam a eleifend. Nullam tincidunt ex a magna egestas, vitae blandit justo commodo. Sed facilisis ex ac quam elementum porttitor. Phasellus id lorem et nibh mattis porttitor. Morbi rhoncus orci ac libero mattis interdum.',NULL,NULL,NULL,5),(12,90,'PASANTE','MONTERREY, MEXICO','',0,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet pellentesque orci. Etiam quis congue velit. Nam eget massa id turpis congue varius. Aliquam at quam a elit gravida iaculis sed eget dui. Quisque nec consequat tortor. Aliquam porta non nunc sit amet dapibus. In sagittis molestie mi, ac rutrum arcu sodales vel. Nunc tempus mi ut egestas condimentum. Aenean consectetur tincidunt leo. Pellentesque finibus rutrum est. Suspendisse potenti. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vel velit velit. Praesent sodales lacinia mi non vulputate. Etiam ut interdum turpis. Curabitur aliquet lobortis ipsum vitae efficitur. Cras in cursus nisi, vel scelerisque lacus. Nunc sit amet rutrum tellus. Nulla blandit risus vitae velit aliquam imperdiet. Ut gravida ultrices quam a eleifend. Nullam tincidunt ex a magna egestas, vitae blandit justo commodo. Sed facilisis ex ac quam elementum porttitor. Phasellus id lorem et nibh mattis porttitor. Morbi rhoncus orci ac libero mattis interdum.zxzxzzxzx','20160407095845.png','20160407100013.pdf','20160407095901.jpg',0);

/*Table structure for table `tblreagenda` */

DROP TABLE IF EXISTS `tblreagenda`;

CREATE TABLE `tblreagenda` (
  `idtblreagenda` int(11) NOT NULL AUTO_INCREMENT,
  `idtblcitas` int(11) DEFAULT NULL,
  `fecha_reserva` date DEFAULT NULL,
  `hora_reserva` time DEFAULT NULL,
  `hora_fin` time DEFAULT NULL,
  `motivo` text COLLATE utf8_spanish_ci,
  PRIMARY KEY (`idtblreagenda`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `tblreagenda` */

/*Table structure for table `tblrecordatorio` */

DROP TABLE IF EXISTS `tblrecordatorio`;

CREATE TABLE `tblrecordatorio` (
  `idtblrecordatorio` int(11) NOT NULL AUTO_INCREMENT,
  `recordatorio` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `valor` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Valor en minutos',
  PRIMARY KEY (`idtblrecordatorio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `tblrecordatorio` */

/*Table structure for table `tblrecordatoriocitas` */

DROP TABLE IF EXISTS `tblrecordatoriocitas`;

CREATE TABLE `tblrecordatoriocitas` (
  `idtblrecordatoriocitas` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `idtblcitas` int(11) DEFAULT NULL,
  `idtblrecordatorio` int(11) DEFAULT NULL,
  PRIMARY KEY (`idtblrecordatoriocitas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `tblrecordatoriocitas` */

/*Table structure for table `tblsintomas` */

DROP TABLE IF EXISTS `tblsintomas`;

CREATE TABLE `tblsintomas` (
  `idtblsintomas` int(11) NOT NULL AUTO_INCREMENT,
  `tblsintomasname` text NOT NULL,
  `tblsintomaslugar` text NOT NULL,
  `tblsintomasnamelugarfind` text,
  PRIMARY KEY (`idtblsintomas`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `tblsintomas` */

insert  into `tblsintomas`(`idtblsintomas`,`tblsintomasname`,`tblsintomaslugar`,`tblsintomasnamelugarfind`) values (1,'dolor','cabeza','dolor cabeza'),(2,'me duele la','cabeza','me duele la cabeza'),(3,'dolor de','cabeza','dolor de cabeza'),(4,'sensasion de','taquicardias','sensacion de taquicardias'),(5,'dolor de','pecho','dolor de pecho'),(6,'dolor de','corazon','dolor de corazon');

/*Table structure for table `tblsintomasdr` */

DROP TABLE IF EXISTS `tblsintomasdr`;

CREATE TABLE `tblsintomasdr` (
  `idtblsintomasDr` int(11) NOT NULL AUTO_INCREMENT,
  `idtblsintomas` int(11) DEFAULT NULL,
  `idtblDr` int(11) DEFAULT NULL,
  PRIMARY KEY (`idtblsintomasDr`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `tblsintomasdr` */

insert  into `tblsintomasdr`(`idtblsintomasDr`,`idtblsintomas`,`idtblDr`) values (1,1,1),(2,2,1),(3,3,1),(4,4,10),(5,5,10),(6,6,10);

/*Table structure for table `tblsintomasservicios` */

DROP TABLE IF EXISTS `tblsintomasservicios`;

CREATE TABLE `tblsintomasservicios` (
  `idtblsintomasServicios` int(11) NOT NULL AUTO_INCREMENT,
  `idtblsintomas` int(11) DEFAULT NULL,
  `idcatservicio` int(11) DEFAULT NULL,
  PRIMARY KEY (`idtblsintomasServicios`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `tblsintomasservicios` */

insert  into `tblsintomasservicios`(`idtblsintomasServicios`,`idtblsintomas`,`idcatservicio`) values (1,1,12),(2,2,12),(3,3,12),(4,4,4),(5,5,4),(6,6,4);

/*Table structure for table `tbltransaccion` */

DROP TABLE IF EXISTS `tbltransaccion`;

CREATE TABLE `tbltransaccion` (
  `idtbltransaccion` int(11) NOT NULL AUTO_INCREMENT,
  `monto` decimal(10,0) DEFAULT NULL,
  `catstatus` int(11) DEFAULT NULL,
  `numtransaccion` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`idtbltransaccion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `tbltransaccion` */

/*Table structure for table `tbltransaccioncitas` */

DROP TABLE IF EXISTS `tbltransaccioncitas`;

CREATE TABLE `tbltransaccioncitas` (
  `idtbltransaccioncitas` int(11) NOT NULL AUTO_INCREMENT,
  `idtbltransaccion` int(11) DEFAULT NULL,
  `idcitas` int(11) DEFAULT NULL,
  PRIMARY KEY (`idtbltransaccioncitas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `tbltransaccioncitas` */

/*Table structure for table `tlbpaciente` */

DROP TABLE IF EXISTS `tlbpaciente`;

CREATE TABLE `tlbpaciente` (
  `idtblpaciente` int(11) NOT NULL AUTO_INCREMENT,
  `idtblusers` int(11) DEFAULT NULL,
  `tblpacientename` varchar(100) NOT NULL,
  `tblpacientepaterno` varchar(100) DEFAULT NULL,
  `tblpacientematerno` varchar(100) DEFAULT NULL,
  `tblpacienteemail` varchar(100) DEFAULT NULL,
  `tblpacienterfc` varchar(13) DEFAULT NULL,
  `idcatstatus` int(11) DEFAULT NULL,
  `tblpacientefechanacimiento` date DEFAULT NULL,
  `tblpacienteimgprofile` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idtblpaciente`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

/*Data for the table `tlbpaciente` */

insert  into `tlbpaciente`(`idtblpaciente`,`idtblusers`,`tblpacientename`,`tblpacientepaterno`,`tblpacientematerno`,`tblpacienteemail`,`tblpacienterfc`,`idcatstatus`,`tblpacientefechanacimiento`,`tblpacienteimgprofile`) values (1,1,'OMAR','PAREDES','SANCHEZ','omar.paredes@placeyourfinger.com.mx','PASO890612373',5,NULL,'20160329015900.png'),(3,7,'OMAR PAREDES OMARE',NULL,NULL,'om@o.com',NULL,NULL,NULL,NULL),(4,8,'OMAR PAREDES OMARE',NULL,NULL,'om@om.com',NULL,NULL,NULL,NULL),(5,11,'OMAR','','','1oma@oma.com',NULL,NULL,NULL,NULL),(6,12,'OMAR','','','oamre.paredes@gmail.com',NULL,NULL,NULL,NULL),(7,16,'OMAR','PAREDES','SANCHEZ','oasd@gmail.com','PASO890612370',5,NULL,NULL),(8,17,'OMAR PAREDES SANCHEZ',NULL,NULL,'omare@omare.com.mx','PASO890612370',NULL,NULL,NULL),(9,18,'OMAR',NULL,NULL,'omare.com@gmail.com',NULL,NULL,NULL,NULL),(10,20,'OMAR PAREDES SANCHEZ',NULL,NULL,'admin@omare.com.mx','PASO890612370',NULL,NULL,NULL),(11,21,'OMAR','PAREDES','SANCHEZ','contacto@omare.com.mx','PASO890612370',NULL,NULL,'20160407183348.jpg'),(12,22,'RICARDO MARES GAYTAN','','','ricardo.mares@sociallabs.mx',NULL,NULL,NULL,NULL),(13,23,'OMAR','PAREDES','SANCHEZ','omar.paredes@omare.com.mx','PASO890612370',NULL,NULL,NULL),(14,29,'OMAR','PAREDES','SANCHEZ','omare.paredes@omare.com.mx','PASO890612370',NULL,NULL,NULL),(15,30,'OMARE','PAREDES','SANCHEZ','omare.paredes@omare.com','PASO890612370',5,NULL,NULL),(16,31,'SUPERMAN','CAPA','ROJA','superman@salonjusticia.com','SCRU740705IU4',5,NULL,NULL),(17,32,'OMAR','PAREDES','SANCHEZ','omare.paredes@gmail.com','PASO890612370',NULL,NULL,NULL),(18,35,'AARON','CORTES','PAPUSH','aaron.cortes@gmail.com','JHSDJDJAS',NULL,NULL,'20160407031442.png'),(19,36,'SARAI ','CORTES','PAPUSH','sarai.cortes@gmail.com.mx','COAS040708IU5',NULL,NULL,'20160406074117.jpg'),(20,37,'RICARDO','DIEZ','NORIA','rldiezn@gmail.com','132456',NULL,NULL,'160419064615_croppedImage.png');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`password`,`role`,`remember_token`,`created_at`,`updated_at`) values (1,'pedregal','omar@omar.com','$2y$10$vc9/BwJlwto8jiI197jJ/.t8g/Kq2bsyGNpfn5mtkSdeDIjLB.YPG','paciente','ByfvrDw7xcbLbtuJLw8eUG0DMkzU6xiXktrX1yBXWHTnP0OSelzViWhQnKDA','2016-03-22 22:13:59','2016-04-11 17:03:54'),(2,'SAMUEL','samuel@gmail.com','$2y$10$TegrwA8uLwiNB5YymrleHO9HbT0/elde7H9fww6ZeBAlmWvzRmLM6','doctor','eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjIsImlzcyI6Imh0dHA6XC9cLzUyLjM0LjUxLjUyXC9hcGlcL2F1dGh','2016-03-22 23:43:29','2016-03-22 23:43:29'),(3,'OMARE PAREDES SANCHEZ','omare@gmail.com','123456','paciente',NULL,NULL,NULL),(4,'OMARE PAREDES SANCHEZ','omar@gmail.com','123456','paciente',NULL,NULL,NULL),(5,'OMARE PAREDES SANCHEZ','omar.paredes@gmail.com','123456','paciente',NULL,NULL,NULL),(6,'OMAR PAREDES OMARE','o@o.com','$2y$10$ORiBUxZ/aiTJi3zwYir8cONhGtmP3MJqjoK/4x9jkI1iq8Gw7PN9K',NULL,NULL,NULL,NULL),(7,'OMAR PAREDES OMARE','om@o.com','$2y$10$CSP/2Sa4HWtb0HP06Kj98OsGVOK02epUnjzC3fb7r6bgmBA3YnVdS',NULL,'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjcsImlzcyI6Imh0dHA6XC9cLzUyLjM0LjUxLjUyXC9hcGlcL2F1dGh',NULL,NULL),(8,'OMAR PAREDES OMARE','om@om.com','$2y$10$2LxSNMzj7cdQjhKdFz8gxemN8RI.IpzQFEGINRACJnNZPc3V.8L0C','paciente','eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjgsImlzcyI6Imh0dHA6XC9cLzUyLjM0LjUxLjUyXC9hcGlcL2F1dGh',NULL,NULL),(9,'OMAR','oma@om.com','123456','paciente',NULL,NULL,NULL),(10,'OMAR','oma@oma.com','123456','paciente',NULL,NULL,NULL),(11,'pedregal','1oma@oma.com','123456','paciente',NULL,NULL,NULL),(12,'OMAR','oamre.paredes@gmail.com','123456','paciente',NULL,NULL,NULL),(13,'OMAR','oasdmk@gmail.com','$2y$10$HhAAOl5BGJt8ya.7UdnKLOP1ni764aPm2xLJX5iTeNAoXUq6w70Da','paciente',NULL,NULL,NULL),(15,'OMAR','oasdm@gmail.com','$2y$10$BdGI13bpyvF01wngmOOlzOoKAwlgRPjaVpiLUVd65vEFHUjDI3Igq','paciente',NULL,NULL,NULL),(16,'OMAR','oasd@gmail.com','$2y$10$oIxuQf8Se4YXdp6g3yTkq.ns2.mISXTkDrU/jgdWHDVGMvBXd2VzK','paciente','eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjE2LCJpc3MiOiJodHRwOlwvXC81Mi4zNC41MS41MlwvYXBpXC9hdXR',NULL,NULL),(17,'OMAR PAREDES SANCHEZ','omare@omare.com.mx','$2y$10$mW6HsUCJ0i1LErOXLYM9Pe/Wj6ddd8Ju8cixI2.TnBEmUxdQpMLMi','paciente',NULL,NULL,NULL),(18,'OMAR','omare.com@gmail.com','$2y$10$tWsfPWQlB2.rO89P9p1jvumLlUl7cUfSwmVbrZ33YlCzieqYogwau','paciente',NULL,NULL,NULL),(20,'OMAR PAREDES SANCHEZ','admin@omare.com.mx','$2y$10$PxA/gd8IidpIrU3OfXx9tOH27JlrL5DyVn1aSoc.kAXFSKS6juwp6','paciente','eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjIwLCJpc3MiOiJodHRwOlwvXC81Mi4zNC41MS41MlwvYXBpXC9hdXR',NULL,NULL),(21,'OMARE','contacto@omare.com.mx','$2y$10$yU0tjLXKYWrJTXvHHsbMw.88eiLEShMlT21jQEwXO27W2oyr24hwO','paciente','eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjIxLCJpc3MiOiJodHRwOlwvXC81Mi4zNC41MS41MlwvYXBpXC9hdXR',NULL,NULL),(22,'RICARDO MARES GAYTAN','ricardo.mares@sociallabs.mx','123456','paciente',NULL,NULL,NULL),(23,'OMAR','omar.paredes@omare.com.mx','$2y$10$ydVE4Hsu1/roPnHUGa0h0OUSra9PGNj628meRwZDjPTluqTuAQ9li','paciente','eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjIzLCJpc3MiOiJodHRwOlwvXC81Mi4zNC41MS41MlwvYXBpXC9hdXR',NULL,NULL),(24,'Eloisa','eloisa@angeles.net','$2y$10$jdyNFeA74tfFHx01NZIBqOlXu/5wEfYCUIaOhxHqA6xlibzi2rO66','doctor','eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjI0LCJpc3MiOiJodHRwOlwvXC81Mi4zNC41MS41MlwvYXBpXC9hdXR',NULL,NULL),(25,'Adriana','Adriana@angeles.net','$2y$10$HmC2/Efby1eLpUKp3jlLG.gf8BPFUC671bdHFZFa4BfMJk/unv8s6','doctor',NULL,NULL,NULL),(26,'Foze','foze@angeles.net','$2y$10$BxzsvJJQ.tCGFR917IjO4.IoSH7EE2usyvKdW8PKWL1azMErM.oVu','doctor','n4vXfgXsVXNYh28D7cjofXokeeNIo30f0VX1gM8Kdlu4EhLIifG8V6cIYAb3',NULL,'2016-04-22 01:15:56'),(27,'Adolfo','adolfo@angeles.net','$2y$10$GW78lBJ0oiv1MNxpF7u.vu6pmhASQron/yz6cbFNnxeW35H0DL0Eu','doctor',NULL,NULL,NULL),(28,'Judith','judith@angeles.net','$2y$10$NNh1kGgH39tKmRziAshSNeSVXOjg8mSGS2yiXXIaSM4.LkUZUDzY.','doctor',NULL,NULL,NULL),(29,'OMAR','omare.paredes@omare.com.mx','$2y$10$Cc3MxnpoyGd6ApZ5igLBxOIuxRiqULY6T5kjbI3RRkKwSPEGnvLvW','paciente','eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjI5LCJpc3MiOiJodHRwOlwvXC81Mi4zNC41MS41MlwvYXBpXC9hdXR',NULL,NULL),(30,'OMARE','omare.paredes@omare.com','$2y$10$6Q4U/xoXro7VIViYH5gUT.dyjWx7Y/dJF8m0EY64Hkm2Ubb73/c3y','paciente','eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjMwLCJpc3MiOiJodHRwOlwvXC81Mi4zNC41MS41MlwvYXBpXC9hdXR',NULL,NULL),(31,'SUPERMAN','superman@salonjusticia.com','$2y$10$fcZVSuLycA9u4poYvM.yQ.1B2ArmZlLek0I5A5mmfvvtjrPoLCKk6','paciente','eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjMxLCJpc3MiOiJodHRwOlwvXC81Mi4zNC41MS41MlwvYXBpXC9hdXR',NULL,NULL),(32,'OMAR','omare.paredes@gmail.com','$2y$10$ekpbWQbL/ASm97cN5LC0RO2IzAGbeq9vQ234.TrRYP4HJgcmw./Cy','paciente',NULL,NULL,NULL),(35,'Aaron','aaron.cortes@gmail.com','$2y$10$hKE0RZPYM74YP3EjbuTtY.SQ4Gmcg/9ONxsQ3Cm59Zy81zqVjzFSa','paciente','zo1YwzMNH9e0cnRi5wYZGoq89F6mTkABkJ2D55cAd70GD5BWi6UerNdTDKZg','2016-04-05 23:02:38','2016-04-06 22:15:06'),(36,'Sarai Cortes','sarai.cortes@gmail.com.mx','$2y$10$Hoa0iSdv/VEeQ7T.HwLdGO1nCrSGFi5fITI4s2CdjyR1iMtFMnTfC','paciente','O5EQ3FhbGSpdVOs8bIoWomCWm1vO41Kcl7FFcwIZuhj4dJYaPyT28Z9dOGol','2016-04-06 14:39:23','2016-04-06 14:42:39'),(37,'Ricardo','rldiezn@gmail.com','$2y$10$TUw9GmPcVQWWZBZJvHLWQ.JodDJfDChxR8dS5HLOZJKir4xAfCKDO','paciente','YJHutRuqe46WOLTrYRv0F3yIUFTqgqWL6GpXnuPW4PJF0o2BxFEmXTTubjKl','2016-04-12 00:57:48','2016-04-21 22:40:55');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
