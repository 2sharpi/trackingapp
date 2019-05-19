-- MySQL dump 10.13  Distrib 5.7.26, for Linux (x86_64)
--
-- Host: localhost    Database: trackingapp
-- ------------------------------------------------------
-- Server version	5.7.26-0ubuntu0.18.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `AppLog`
--

DROP TABLE IF EXISTS `AppLog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `AppLog` (
  `idAppLog` int(11) NOT NULL AUTO_INCREMENT,
  `Date` varchar(45) NOT NULL,
  `Code` int(11) NOT NULL,
  `Description` mediumtext NOT NULL,
  PRIMARY KEY (`idAppLog`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `AppLog`
--

LOCK TABLES `AppLog` WRITE;
/*!40000 ALTER TABLE `AppLog` DISABLE KEYS */;
/*!40000 ALTER TABLE `AppLog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Log`
--

DROP TABLE IF EXISTS `Log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Log` (
  `idLog` int(11) NOT NULL AUTO_INCREMENT,
  `Date` tinytext,
  `Description` mediumtext,
  `Tracking_idTracking` int(11) NOT NULL,
  `isHidden` tinyint(1) DEFAULT '0',
  `notes` longtext,
  `isFailure` tinyint(1) DEFAULT '0',
  `hierarchy` int(11) NOT NULL,
  `address` tinytext,
  `realDescription` varchar(45) NOT NULL,
  `businessCode` tinytext,
  `country` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idLog`,`Tracking_idTracking`),
  KEY `fk_Log_Tracking_idx` (`Tracking_idTracking`),
  CONSTRAINT `fk_Log_Tracking` FOREIGN KEY (`Tracking_idTracking`) REFERENCES `Tracking` (`idTracking`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4701 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Log`
--

LOCK TABLES `Log` WRITE;
/*!40000 ALTER TABLE `Log` DISABLE KEYS */;
INSERT INTO `Log` VALUES (4608,'2019-05-15T10:33:00','Delivered',113,0,NULL,0,4,'Bedford MK42, GB','Odbiór własny','200602','PL'),(4609,'2019-05-09T18:28:35','Parcel could not be delivered, recipient absent',113,0,NULL,0,4,'London test street 00-00 UK 	,','Przesyłka niedoręczona - odbiorca nieobecny','500442',''),(4610,'2019-05-09T12:27:08','Parcel could not be delivered, recipient absent',113,0,NULL,0,4,'London test street 00-00 UK 	,','Przesyłka niedoręczona - odbiorca nieobecny','500442',''),(4611,'2019-05-08T11:46:44','Parcel could not be delivered, recipient absent',113,0,NULL,0,4,'London test street 00-00 UK 	,','Przesyłka niedoręczona - odbiorca nieobecny','500419',''),(4612,'2019-05-05T19:32:00.382','The parcel is in transit on its way to its final destination',113,0,NULL,0,3,'FDS Hub, Hinckley, GB','Przekazano za granicę','230405','PL'),(4613,'2019-05-04T13:33:18','Arrived FDS Parcel Centre, In Transit',113,0,NULL,0,2,'FDS, GB','Przyjęcie przesyłki w oddziale DPD ','330135','PL'),(4614,'2019-05-04T08:51:52.053','Collected from Sender',113,0,NULL,0,1,'Bedford MK42, GB','Zarejestrowano dane przesyłki, przesyłka jesz','030103',''),(4615,'2019-02-25T11:19:00','Delivered',114,0,NULL,0,5,'London test street 00-00 UK,','Przesyłka doręczona ','501300',''),(4616,'2019-02-21T02:47:29.923','The parcel is in transit on its way to its final destination',114,0,NULL,0,3,'FDS Hub, Hinckley, GB','Przekazano za granicę','230405','PL'),(4617,'2019-02-20T22:23:11.305','Arrived FDS Parcel Centre, In Transit',114,0,NULL,0,2,'FDS, GB','Przyjęcie przesyłki w oddziale DPD ','330137','PL'),(4618,'2019-02-20T15:08:57.007','Collected from Sender',114,0,NULL,0,1,'Bedford MK42, GB','Zarejestrowano dane przesyłki, przesyłka jesz','030103',''),(4619,'2019-03-01T10:27:53','Delivered',115,0,NULL,0,5,'London test street 00-00 UK,','Przesyłka doręczona ','501300',''),(4620,'2019-02-26T22:58:58.23','The parcel is in transit on its way to its final destination',115,0,NULL,0,3,'FDS Hub, Hinckley, GB','Przekazano za granicę','230405','PL'),(4621,'2019-02-26T14:57:08','Arrived FDS Parcel Centre, In Transit',115,0,NULL,0,2,'FDS, GB','Przyjęcie przesyłki w oddziale DPD ','330135','PL'),(4622,'2019-02-26T08:33:22.673','Collected from Sender',115,0,NULL,0,1,'Bedford MK42, GB','Zarejestrowano dane przesyłki, przesyłka jesz','030103',''),(4623,'2019-04-04T16:13:59','Delivered',116,0,NULL,0,5,'London test street 00-00 UK,','Przesyłka doręczona ','501300',''),(4624,'2019-04-01T22:43:23.194','The parcel is in transit on its way to its final destination',116,0,NULL,0,3,'FDS Hub, Hinckley, GB','Przekazano za granicę','230405','PL'),(4625,'2019-04-01T15:19:39','Arrived FDS Parcel Centre, In Transit',116,0,NULL,0,2,'FDS, GB','Przyjęcie przesyłki w oddziale DPD ','330135','PL'),(4626,'2019-04-01T09:31:08.853','Collected from Sender',116,0,NULL,0,1,'Bedford MK42, GB','Zarejestrowano dane przesyłki, przesyłka jesz','030103',''),(4627,'2019-04-04T17:11:51','Delivered',117,0,NULL,0,5,'London test street 00-00 UK,','Przesyłka doręczona ','501300',''),(4628,'2019-04-02T06:28:06.314','The parcel is in transit on its way to its final destination',117,0,NULL,0,3,'FDS Hub, Hinckley, GB','Przekazano za granicę','230405','PL'),(4629,'2019-04-01T17:41:03','Arrived FDS Parcel Centre, In Transit',117,0,NULL,0,2,'FDS, GB','Przyjęcie przesyłki w oddziale DPD ','330135','PL'),(4630,'2019-04-01T14:57:44.396','Collected from Sender',117,0,NULL,0,1,'Bedford MK42, GB','Zarejestrowano dane przesyłki, przesyłka jesz','030103',''),(4631,'2019-04-10T13:57:23','Delivered',118,0,NULL,0,5,'London test street 00-00 UK,','Przesyłka doręczona ','501300',''),(4632,'2019-04-06T03:13:03.965','The parcel is in transit on its way to its final destination',118,0,NULL,0,3,'FDS Hub, Hinckley, GB','Przekazano za granicę','230405','PL'),(4633,'2019-04-05T16:25:40','Arrived FDS Parcel Centre, In Transit',118,0,NULL,0,2,'FDS, GB','Przyjęcie przesyłki w oddziale DPD ','330135','PL'),(4634,'2019-04-05T15:01:01.153','Collected from Sender',118,0,NULL,0,1,'Bedford MK42, GB','Zarejestrowano dane przesyłki, przesyłka jesz','030103',''),(4635,'2019-04-17T14:48:29','Delivered',119,0,NULL,0,5,'London test street 00-00 UK,','Przesyłka doręczona ','501300',''),(4636,'2019-04-12T20:59:35.486','The parcel is in transit on its way to its final destination',119,0,NULL,0,3,'FDS Hub, Hinckley, GB','Przekazano za granicę','230405','PL'),(4637,'2019-04-12T14:41:19','Arrived FDS Parcel Centre, In Transit',119,0,NULL,0,2,'FDS, GB','Przyjęcie przesyłki w oddziale DPD ','330135','PL'),(4638,'2019-04-12T10:41:25.369','Collected from Sender',119,0,NULL,0,1,'Bedford MK42, GB','Zarejestrowano dane przesyłki, przesyłka jesz','030103',''),(4639,'2019-05-10T10:39:08','Delivered',120,0,NULL,0,5,'London test street 00-00 UK,','Przesyłka doręczona ','501300',''),(4640,'2019-05-03T00:47:15.208','The parcel is in transit on its way to its final destination',120,0,NULL,0,3,'FDS Hub, Hinckley, GB','Przekazano za granicę','230405','PL'),(4641,'2019-05-02T14:27:23','Arrived FDS Parcel Centre, In Transit',120,0,NULL,0,2,'FDS, GB','Przyjęcie przesyłki w oddziale DPD ','330135','PL'),(4642,'2019-05-02T11:36:25.816','Collected from Sender',120,0,NULL,0,1,'Bedford MK42, GB','Zarejestrowano dane przesyłki, przesyłka jesz','030103',''),(4643,'2019-05-07T15:30:42','Delivered',121,0,NULL,0,5,'London test street 00-00 UK,','Przesyłka doręczona ','501300',''),(4644,'2019-05-07T15:30:00','Parcel could not be delivered, recipient absent',121,0,NULL,0,4,'London test street 00-00 UK,','Przesyłka niedoręczona - odbiorca nieobecny','500419',''),(4645,'2019-05-02T20:05:52.105','The parcel is in transit on its way to its final destination',121,0,NULL,0,3,'FDS Hub, Hinckley, GB','Przekazano za granicę','230405','PL'),(4646,'2019-05-02T14:28:05','Arrived FDS Parcel Centre, In Transit',121,0,NULL,0,2,'FDS, GB','Przyjęcie przesyłki w oddziale DPD ','330135','PL'),(4647,'2019-05-02T11:36:25.826','Collected from Sender',121,0,NULL,0,1,'Bedford MK42, GB','Zarejestrowano dane przesyłki, przesyłka jesz','030103',''),(4648,'2019-04-26T11:42:45','Delivered',122,0,NULL,0,5,'London test street 00-00 UK,','Przesyłka doręczona ','501300',''),(4649,'2019-04-17T22:12:13.505','The parcel is in transit on its way to its final destination',122,0,NULL,0,3,'FDS Hub, Hinckley, GB','Przekazano za granicę','230405','PL'),(4650,'2019-04-17T15:25:01','Arrived FDS Parcel Centre, In Transit',122,0,NULL,0,2,'FDS, GB','Przyjęcie przesyłki w oddziale DPD ','330135','PL'),(4651,'2019-04-17T09:32:51.656','Collected from Sender',122,0,NULL,0,1,'Bedford MK42, GB','Zarejestrowano dane przesyłki, przesyłka jesz','030103',''),(4652,'2019-04-26T12:09:59','Delivered',123,0,NULL,0,5,'London test street 00-00 UK,','Przesyłka doręczona ','501300',''),(4653,'2019-04-18T20:08:36.002','The parcel is in transit on its way to its final destination',123,0,NULL,0,3,'FDS Hub, Hinckley, GB','Przekazano za granicę','230405','PL'),(4654,'2019-04-18T14:46:39','Arrived FDS Parcel Centre, In Transit',123,0,NULL,0,2,'FDS, GB','Przyjęcie przesyłki w oddziale DPD ','330135','PL'),(4655,'2019-04-17T09:32:51.644','Collected from Sender',123,0,NULL,0,1,'Bedford MK42, GB','Zarejestrowano dane przesyłki, przesyłka jesz','030103',''),(4656,'2019-04-26T09:33:50','Delivered',124,0,NULL,0,5,'London test street 00-00 UK,','Przesyłka doręczona ','501300',''),(4657,'2019-04-25T04:10:32.603','The parcel is in transit on its way to its final destination',124,0,NULL,0,3,'FDS Hub, Hinckley, GB','Przekazano za granicę','230405','PL'),(4658,'2019-04-24T15:25:42','Arrived FDS Parcel Centre, In Transit',124,0,NULL,0,2,'FDS, GB','Przyjęcie przesyłki w oddziale DPD ','330135','PL'),(4659,'2019-04-23T11:44:05.415','Collected from Sender',124,0,NULL,0,1,'Bedford MK42, GB','Zarejestrowano dane przesyłki, przesyłka jesz','030103',''),(4660,'2019-05-10T01:47:08.505','The parcel is in transit on its way to its final destination',125,0,NULL,0,3,'FDS Hub, Hinckley, GB','Przekazano za granicę','230405','PL'),(4661,'2019-05-09T14:50:04','Arrived FDS Parcel Centre, In Transit',125,0,NULL,0,2,'FDS, GB','Przyjęcie przesyłki w oddziale DPD ','330135','PL'),(4662,'2019-05-09T08:37:28.135','Collected from Sender',125,0,NULL,0,1,'Bedford MK42, GB','Zarejestrowano dane przesyłki, przesyłka jesz','030103',''),(4663,'2019-05-16T12:58:11','Delivered',126,0,NULL,0,5,'London test street 00-00 UK,','Przesyłka doręczona ','501300',''),(4664,'2019-05-13T22:46:39.005','The parcel is in transit on its way to its final destination',126,0,NULL,0,3,'FDS Hub, Hinckley, GB','Przekazano za granicę','230405','PL'),(4665,'2019-05-13T15:17:43','Arrived FDS Parcel Centre, In Transit',126,0,NULL,0,2,'FDS, GB','Przyjęcie przesyłki w oddziale DPD ','330135','PL'),(4666,'2019-05-12T23:24:33.902','Collected from Sender',126,0,NULL,0,1,'Bedford MK42, GB','Zarejestrowano dane przesyłki, przesyłka jesz','030103',''),(4667,'2019-05-17T10:58:23','Delivered',127,0,NULL,0,5,'London test street 00-00 UK,','Przesyłka doręczona ','501300',''),(4668,'2019-05-15T03:08:11.04','The parcel is in transit on its way to its final destination',127,0,NULL,0,3,'FDS Hub, Hinckley, GB','Przekazano za granicę','230405','PL'),(4669,'2019-05-14T15:15:17','Arrived FDS Parcel Centre, In Transit',127,0,NULL,0,2,'FDS, GB','Przyjęcie przesyłki w oddziale DPD ','330135','PL'),(4670,'2019-05-12T23:24:33.717','Collected from Sender',127,0,NULL,0,1,'Bedford MK42, GB','Zarejestrowano dane przesyłki, przesyłka jesz','030103',''),(4671,'2019-05-15T02:00:59.329','The parcel is in transit on its way to its final destination',128,0,NULL,0,3,'FDS Hub, Hinckley, GB','Przekazano za granicę','230405','PL'),(4672,'2019-05-14T15:16:09','Arrived FDS Parcel Centre, In Transit',128,0,NULL,0,2,'FDS, GB','Przyjęcie przesyłki w oddziale DPD ','330135','PL'),(4673,'2019-05-12T23:24:33.709','Collected from Sender',128,0,NULL,0,1,'Bedford MK42, GB','Zarejestrowano dane przesyłki, przesyłka jesz','030103',''),(4674,'2019-05-16T16:57:22','Delivered',129,0,NULL,0,5,'London test street 00-00 UK,','Przesyłka doręczona ','501300',''),(4675,'2019-05-13T22:46:19.905','The parcel is in transit on its way to its final destination',129,0,NULL,0,3,'FDS Hub, Hinckley, GB','Przekazano za granicę','230405','PL'),(4676,'2019-05-13T15:17:45','Arrived FDS Parcel Centre, In Transit',129,0,NULL,0,2,'FDS, GB','Przyjęcie przesyłki w oddziale DPD ','330135','PL'),(4677,'2019-05-12T23:24:33.894','Collected from Sender',129,0,NULL,0,1,'Bedford MK42, GB','Zarejestrowano dane przesyłki, przesyłka jesz','030103',''),(4678,'2019-05-15T01:54:13.429','The parcel is in transit on its way to its final destination',130,0,NULL,0,3,'FDS Hub, Hinckley, GB','Przekazano za granicę','230405','PL'),(4679,'2019-05-14T15:17:56','Arrived FDS Parcel Centre, In Transit',130,0,NULL,0,2,'FDS, GB','Przyjęcie przesyłki w oddziale DPD ','330135','PL'),(4680,'2019-05-12T23:24:33.691','Collected from Sender',130,0,NULL,0,1,'Bedford MK42, GB','Zarejestrowano dane przesyłki, przesyłka jesz','030103',''),(4681,'2019-05-16T11:31:21','Delivered',131,0,NULL,0,5,'London test street 00-00 UK,','Przesyłka doręczona ','501300',''),(4682,'2019-05-14T06:42:59.755','The parcel is in transit on its way to its final destination',131,0,NULL,0,3,'FDS Hub, Hinckley, GB','Przekazano za granicę','230405','PL'),(4683,'2019-05-13T18:35:37','Arrived FDS Parcel Centre, In Transit',131,0,NULL,0,2,'FDS, GB','Przyjęcie przesyłki w oddziale DPD ','330135','PL'),(4684,'2019-05-13T14:48:57.827','Collected from Sender',131,0,NULL,0,1,'Bedford MK42, GB','Zarejestrowano dane przesyłki, przesyłka jesz','030103',''),(4685,'2019-05-15T20:02:56.324','The parcel is in transit on its way to its final destination',132,0,NULL,0,3,'FDS Hub, Hinckley, GB','Przekazano za granicę','230405','PL'),(4686,'2019-05-15T14:55:48','Arrived FDS Parcel Centre, In Transit',132,0,NULL,0,2,'FDS, GB','Przyjęcie przesyłki w oddziale DPD ','330135','PL'),(4687,'2019-05-14T13:02:37.616','Collected from Sender',132,0,NULL,0,1,'Bedford MK42, GB','Zarejestrowano dane przesyłki, przesyłka jesz','030103',''),(4688,'2019-05-16T23:03:33.348','The parcel is in transit on its way to its final destination',133,0,NULL,0,3,'FDS Hub, Hinckley, GB','Przekazano za granicę','230405','PL'),(4689,'2019-05-16T14:56:53','Arrived FDS Parcel Centre, In Transit',133,0,NULL,0,2,'FDS, GB','Przyjęcie przesyłki w oddziale DPD ','330135','PL'),(4690,'2019-05-16T00:01:07.107','Collected from Sender',133,0,NULL,0,1,'Bedford MK42, GB','Zarejestrowano dane przesyłki, przesyłka jesz','030103',''),(4691,'2019-05-17T14:56:35','Arrived FDS Parcel Centre, In Transit',134,0,NULL,0,2,'FDS, GB','Przyjęcie przesyłki w oddziale DPD ','330135','PL'),(4692,'2019-05-16T00:01:07.098','Collected from Sender',134,0,NULL,0,1,'Bedford MK42, GB','Zarejestrowano dane przesyłki, przesyłka jesz','030103',''),(4693,'2019-05-16T21:07:11.613','The parcel is in transit on its way to its final destination',135,0,NULL,0,3,'FDS Hub, Hinckley, GB','Przekazano za granicę','230405','PL'),(4694,'2019-05-16T14:56:26','Arrived FDS Parcel Centre, In Transit',135,0,NULL,0,2,'FDS, GB','Przyjęcie przesyłki w oddziale DPD ','330135','PL'),(4695,'2019-05-16T13:12:51.738','Collected from Sender',135,0,NULL,0,1,'Bedford MK42, GB','Zarejestrowano dane przesyłki, przesyłka jesz','030103',''),(4696,'2019-05-16T21:03:44.213','The parcel is in transit on its way to its final destination',136,0,NULL,0,3,'FDS Hub, Hinckley, GB','Przekazano za granicę','230405','PL'),(4697,'2019-05-16T14:56:33','Arrived FDS Parcel Centre, In Transit',136,0,NULL,0,2,'FDS, GB','Przyjęcie przesyłki w oddziale DPD ','330135','PL'),(4698,'2019-05-16T13:12:51.727','Collected from Sender',136,0,NULL,0,1,'Bedford MK42, GB','Zarejestrowano dane przesyłki, przesyłka jesz','030103',''),(4699,'2019-05-17T10:41:37.952','Collected from Sender',137,0,NULL,0,1,'Bedford MK42, GB','Zarejestrowano dane przesyłki, przesyłka jesz','030103',''),(4700,'2019-05-17T10:41:37.913','Collected from Sender',138,0,NULL,0,1,'Bedford MK42, GB','Zarejestrowano dane przesyłki, przesyłka jesz','030103','');
/*!40000 ALTER TABLE `Log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Tracking`
--

DROP TABLE IF EXISTS `Tracking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Tracking` (
  `idTracking` int(11) NOT NULL AUTO_INCREMENT,
  `realTracking` varchar(45) NOT NULL,
  `generatedTracking` varchar(45) NOT NULL,
  `address` tinytext NOT NULL,
  `overallStatus` tinytext,
  `parcelInfo` mediumtext,
  `isParcelInfoHidden` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`idTracking`),
  UNIQUE KEY `realTracking_UNIQUE` (`realTracking`),
  UNIQUE KEY `generatedTracking_UNIQUE` (`generatedTracking`)
) ENGINE=InnoDB AUTO_INCREMENT=139 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Tracking`
--

LOCK TABLES `Tracking` WRITE;
/*!40000 ALTER TABLE `Tracking` DISABLE KEYS */;
INSERT INTO `Tracking` VALUES (113,'13439300069038','83096000393431','London test street 00-00 UK 	','Parcel handed to FDS',NULL,0),(114,'13439300057433','33475000393431','London test street 00-00 UK','Parcel handed to FDS',NULL,0),(115,'13439300058098','89085000393431','London test street 00-00 UK','Parcel handed to FDS',NULL,0),(116,'13439300063643','34636000393431','London test street 00-00 UK','Parcel handed to FDS',NULL,0),(117,'13439300063847','74836000393431','London test street 00-00 UK','Parcel handed to FDS',NULL,0),(118,'13439300064619','91646000393431','London test street 00-00 UK','Parcel handed to FDS',NULL,0),(119,'13439300065796','69756000393431','London test street 00-00 UK','Parcel handed to FDS',NULL,0),(120,'13439300068801','10886000393431','London test street 00-00 UK','Parcel handed to FDS',NULL,0),(121,'13439300068806','60886000393431','London test street 00-00 UK','Parcel handed to FDS',NULL,0),(122,'13439300066688','88666000393431','London test street 00-00 UK','Parcel handed to FDS',NULL,0),(123,'13439300066687','78666000393431','London test street 00-00 UK','Parcel handed to FDS',NULL,0),(124,'13439300067364','46376000393431','London test street 00-00 UK','Parcel handed to FDS',NULL,0),(125,'13439300069907','70996000393431','London test street 00-00 UK','Parcel handed to FDS',NULL,0),(126,'13439300070324','42307000393431','London test street 00-00 UK','Parcel handed to FDS',NULL,0),(127,'13439300070306','60307000393431','London test street 00-00 UK','Parcel handed to FDS',NULL,0),(128,'13439300070305','50307000393431','London test street 00-00 UK','Parcel handed to FDS',NULL,0),(129,'13439300070323','32307000393431','London test street 00-00 UK','Parcel handed to FDS',NULL,0),(130,'13439300070303','30307000393431','London test street 00-00 UK','Parcel handed to FDS',NULL,0),(131,'13439300070646','64607000393431','London test street 00-00 UK','Parcel handed to FDS',NULL,0),(132,'13439300070911','11907000393431','London test street 00-00 UK','Parcel handed to FDS',NULL,0),(133,'13439300071302','20317000393431','London test street 00-00 UK','Parcel handed to FDS',NULL,0),(134,'13439300071301','10317000393431','London test street 00-00 UK','Parcel handed to FDS',NULL,0),(135,'13439300071439','93417000393431','London test street 00-00 UK','Parcel handed to FDS',NULL,0),(136,'13439300071438','83417000393431','London test street 00-00 UK','Parcel handed to FDS',NULL,0),(137,'13439300071569','96517000393431','London test street 00-00 UK','Parcel handed to FDS',NULL,0),(138,'13439300071567','76517000393431','London test street 00-00 UK','Parcel handed to FDS',NULL,0);
/*!40000 ALTER TABLE `Tracking` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `User`
--

DROP TABLE IF EXISTS `User`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `User` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `username` tinytext,
  `password` tinytext,
  `lastFailedLogin` date DEFAULT NULL,
  `lastLoginDate` date DEFAULT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `User`
--

LOCK TABLES `User` WRITE;
/*!40000 ALTER TABLE `User` DISABLE KEYS */;
INSERT INTO `User` VALUES (1,'admin','$2y$10$3Cdsxgj0is9X0OsLBBY30uOHzmDGueVBboaOAIm8UnOm9IWlykg26',NULL,NULL);
/*!40000 ALTER TABLE `User` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-05-18 21:29:14
