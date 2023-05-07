-- MySQL dump 10.13  Distrib 5.7.39, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: tp2_toko
-- ------------------------------------------------------
-- Server version	5.7.39

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
-- Table structure for table `Barang`
--

DROP TABLE IF EXISTS `Barang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Barang` (
  `idBarang` int(11) NOT NULL AUTO_INCREMENT,
  `namaBarang` varchar(50) DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `satuan` varchar(5) DEFAULT NULL,
  `idPengguna` int(11) DEFAULT NULL,
  PRIMARY KEY (`idBarang`),
  KEY `idPengguna` (`idPengguna`),
  CONSTRAINT `Barang_ibfk_1` FOREIGN KEY (`idPengguna`) REFERENCES `Pengguna` (`idPengguna`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Barang`
--

LOCK TABLES `Barang` WRITE;
/*!40000 ALTER TABLE `Barang` DISABLE KEYS */;
INSERT INTO `Barang` VALUES (11,'Beras','Beras IR 64','Kg',167),(12,'Gula','Gula Pasir','Kg',167),(13,'Minyak','Minyak Goreng','L',167),(14,'Telur','Telur Ayam Kampung','Butir',167),(15,'Susu','Susu Ultra','Ml',167),(16,'Sabun Mandi','Sabun Mandi Cair','L',289),(17,'Shampoo','Shampoo Anti Ketombe','Ml',289),(18,'Pembersih Lantai','Pembersih Lantai Cair','L',289),(19,'Sikat Gigi','Sikat Gigi','Buah',289),(20,'Pasta Gigi','Pasta Gigi','Ml',289);
/*!40000 ALTER TABLE `Barang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `HakAkses`
--

DROP TABLE IF EXISTS `HakAkses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `HakAkses` (
  `idAkses` int(11) NOT NULL AUTO_INCREMENT,
  `namaAkses` varchar(50) DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idAkses`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `HakAkses`
--

LOCK TABLES `HakAkses` WRITE;
/*!40000 ALTER TABLE `HakAkses` DISABLE KEYS */;
INSERT INTO `HakAkses` VALUES (1,'Admin','Hak akses administrator'),(2,'Kasir','Hak akses kasir untuk akses penjualan'),(3,'Stokist','Hak akses untuk akses barang dan pembelian'),(4,'User','Hak akses untuk melihat barang');
/*!40000 ALTER TABLE `HakAkses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Pembelian`
--

DROP TABLE IF EXISTS `Pembelian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Pembelian` (
  `idPembelian` int(11) NOT NULL AUTO_INCREMENT,
  `jumlahPembelian` int(2) DEFAULT NULL,
  `hargaBeli` int(11) DEFAULT NULL,
  `idPengguna` int(11) DEFAULT NULL,
  `idBarang` int(11) DEFAULT NULL,
  PRIMARY KEY (`idPembelian`),
  KEY `idPengguna` (`idPengguna`),
  CONSTRAINT `Pembelian_ibfk_1` FOREIGN KEY (`idPengguna`) REFERENCES `Pengguna` (`idPengguna`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Pembelian`
--

LOCK TABLES `Pembelian` WRITE;
/*!40000 ALTER TABLE `Pembelian` DISABLE KEYS */;
INSERT INTO `Pembelian` VALUES (1,2,10000,167,12);
/*!40000 ALTER TABLE `Pembelian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Pengguna`
--

DROP TABLE IF EXISTS `Pengguna`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Pengguna` (
  `idPengguna` int(11) NOT NULL AUTO_INCREMENT,
  `namaPengguna` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `namaDepan` varchar(20) DEFAULT NULL,
  `namaBelakang` varchar(20) DEFAULT NULL,
  `noHp` varchar(13) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `idAkses` int(11) DEFAULT NULL,
  PRIMARY KEY (`idPengguna`),
  KEY `idAkses` (`idAkses`),
  CONSTRAINT `Pengguna_ibfk_1` FOREIGN KEY (`idAkses`) REFERENCES `HakAkses` (`idAkses`)
) ENGINE=InnoDB AUTO_INCREMENT=990 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Pengguna`
--

LOCK TABLES `Pengguna` WRITE;
/*!40000 ALTER TABLE `Pengguna` DISABLE KEYS */;
INSERT INTO `Pengguna` VALUES (167,'Joko','Joko123','Joko','Sutrisno','08187653222','Jl. Raya no 9',1),(289,'Putri','Putri123','Putri','Salis','08976543212','Jl. Raya no 10',2),(342,'Mulyadi','Mulyadi123','Mulyadi','Bino','08976545632','Jl. Raya no 11',3),(486,'Sugeng','Sugeng123','Sugeng','Dalu','08976578909','Jl. Manggarai 1',4),(512,'Nilaa','Nila123','Nila','Pani','09876578909','Jl. Araya 09',1),(643,'Nurgi','Nurgi123','Nurgi','Buni','0876546676','Jl. Sugeng 10',2),(702,'Melisa','Melisa123','Melisa','Putri','08976567865','Jl. Manggarai',3),(842,'Nino','Nino123','Nino','Coser','08765478728','Jl. Coser',4),(989,'Mulyono','Mulyono123','Mulyono','Adi','08976547837','Jl. Copet',1);
/*!40000 ALTER TABLE `Pengguna` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Penjualan`
--

DROP TABLE IF EXISTS `Penjualan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Penjualan` (
  `idPenjualan` int(11) NOT NULL AUTO_INCREMENT,
  `jumlahPenjualan` int(11) DEFAULT NULL,
  `hargaJual` int(11) DEFAULT NULL,
  `idPengguna` int(11) DEFAULT NULL,
  `idBarang` int(11) DEFAULT NULL,
  PRIMARY KEY (`idPenjualan`),
  KEY `idBarang` (`idBarang`),
  CONSTRAINT `Penjualan_ibfk_1` FOREIGN KEY (`idBarang`) REFERENCES `Barang` (`idBarang`),
  CONSTRAINT `Penjualan_ibfk_2` FOREIGN KEY (`idBarang`) REFERENCES `Barang` (`idBarang`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Penjualan`
--

LOCK TABLES `Penjualan` WRITE;
/*!40000 ALTER TABLE `Penjualan` DISABLE KEYS */;
INSERT INTO `Penjualan` VALUES (1,2,20000,167,11);
/*!40000 ALTER TABLE `Penjualan` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-05-07 16:42:51
