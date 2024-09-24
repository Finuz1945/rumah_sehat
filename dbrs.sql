-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: dbrs
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `lab`
--

DROP TABLE IF EXISTS `lab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lab` (
  `id_lab` int(5) NOT NULL AUTO_INCREMENT,
  `pilih_dokterlab` varchar(40) NOT NULL,
  `pilih_tanggallab` date NOT NULL,
  `pilih_jamlab` varchar(15) NOT NULL,
  `janji_lab` varchar(25) NOT NULL,
  `id` varchar(20) NOT NULL,
  PRIMARY KEY (`id_lab`,`id`),
  KEY `id` (`id`),
  KEY `id_2` (`id`),
  CONSTRAINT `lab_ibfk_1` FOREIGN KEY (`id`) REFERENCES `pengguna` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lab`
--

LOCK TABLES `lab` WRITE;
/*!40000 ALTER TABLE `lab` DISABLE KEYS */;
INSERT INTO `lab` VALUES (1,'dr. Achmad Riza, Sp.Hem.','2023-06-13','07.00 - 08.00','Test Darah','002'),(2,'dr. Luthfi Shafwan, Sp.M.','2023-07-14','16.00 - 15.00','Test Mata','002'),(3,'dr. Yasmin Adila, Sp.OG','2023-07-01','16.00 - 15.00','USG','002');
/*!40000 ALTER TABLE `lab` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `obat`
--

DROP TABLE IF EXISTS `obat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `obat` (
  `id_obat` varchar(10) NOT NULL,
  `nama_obat` varchar(30) NOT NULL,
  `fungsi` varchar(20) NOT NULL,
  `batas` varchar(20) NOT NULL,
  `ket` varchar(40) NOT NULL,
  `foto` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_obat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `obat`
--

LOCK TABLES `obat` WRITE;
/*!40000 ALTER TABLE `obat` DISABLE KEYS */;
INSERT INTO `obat` VALUES ('BX002','Bodrex','Obat Migrain','Dewasa','3 kali sehari sebelum makan!','BX002.jpeg'),('HR003','Herocyn','Obat Gatal','Dewasa / Anak - anak','Tiap Gatal!','HR003.jpeg'),('IB003','Ibuprofen','Obat Demam','Dewasa / Anak - anak','3 kali sehari sesudah makan!','IB003.jpeg'),('IN0005','Inhaler','Obat Pernapasan','Dewasa','Setiap asma kambuh!','IN0005.jpeg'),('OB003','Komik OBH','Obat Batuk','Dewasa','3 kali sehari sesudah makan!','OB003.jpeg'),('PE001','Panadol Extra','Obat Pusing','Dewasa','2 kali sehari sesudah makan!','PE001.jpg'),('SA005','Sangobion','Obat Tambah Darah','Dewasa','2 kali sesudah makan!','SA005.jpeg'),('TA004','Tolak Angin','Obat Masuk Angin','Dewasa / Anak - anak','2 kali sehari sesudah makan!','TA004.jpeg');
/*!40000 ALTER TABLE `obat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pengguna`
--

DROP TABLE IF EXISTS `pengguna`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pengguna` (
  `id` varchar(20) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `password` varchar(10) NOT NULL,
  `goldar` varchar(10) NOT NULL,
  `tempat` varchar(15) NOT NULL,
  `tanggal` date NOT NULL,
  `kelamin` enum('L','P') NOT NULL,
  `alamat` varchar(15) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'dokter',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pengguna`
--

LOCK TABLES `pengguna` WRITE;
/*!40000 ALTER TABLE `pengguna` DISABLE KEYS */;
INSERT INTO `pengguna` VALUES ('001','Firdaus Nuzula Nur Rosyid','Finuz','O','Jakarta','2000-09-15','L','Cipinang','dokter'),('002','Hendriyansyah','hendri','AB','Bekasi','2000-03-07','L','Bogor','pasien'),('003','Hegi Giona','hegi','Tidak tahu','Bogor','2008-01-25','L','Cilandak','pasien');
/*!40000 ALTER TABLE `pengguna` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rs`
--

DROP TABLE IF EXISTS `rs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rs` (
  `id_rs` int(20) NOT NULL AUTO_INCREMENT,
  `pilih_dokter` varchar(40) NOT NULL,
  `pilih_tanggal` date NOT NULL,
  `pilih_jam` varchar(15) NOT NULL,
  `janji_rs` varchar(25) NOT NULL,
  `id` varchar(20) NOT NULL,
  PRIMARY KEY (`id_rs`,`id`),
  KEY `id` (`id`),
  CONSTRAINT `rs_ibfk_1` FOREIGN KEY (`id`) REFERENCES `pengguna` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rs`
--

LOCK TABLES `rs` WRITE;
/*!40000 ALTER TABLE `rs` DISABLE KEYS */;
INSERT INTO `rs` VALUES (6,'dr. Firdaus Nuzula','2023-07-08','14.00 - 15.00','Umum','002'),(9,'Siti Washilah, S.Tr.Keb.','2023-06-30','12.00 - 13.00','Persalinan','002'),(10,'dr. Firdaus Nuzula','2023-07-08','19.00 - 20.00','Umum','002');
/*!40000 ALTER TABLE `rs` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-06-29 21:23:54
