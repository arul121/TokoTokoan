-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.3.15-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for inventory
CREATE DATABASE IF NOT EXISTS `inventory` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `inventory`;

-- Dumping structure for table inventory.barang
CREATE TABLE IF NOT EXISTS `barang` (
  `Id_Barang` int(20) NOT NULL,
  `Jumlah` int(20) DEFAULT NULL,
  `Nama` varchar(50) DEFAULT NULL,
  `Jenis` varchar(50) DEFAULT NULL,
  `Tanggal` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Id_Barang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table inventory.cabang
CREATE TABLE IF NOT EXISTS `cabang` (
  `Id_Cabang` int(11) NOT NULL,
  `Lokasi` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id_Cabang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table inventory.user
CREATE TABLE IF NOT EXISTS `user` (
  `Id_User` int(11) NOT NULL,
  `Password` varchar(50) NOT NULL DEFAULT '',
  `Nama_User` varchar(50) NOT NULL DEFAULT '',
  `Id_Cabang` int(11) NOT NULL DEFAULT 0,
  `level` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`Id_User`),
  KEY `FK_user_cabang` (`Id_Cabang`),
  CONSTRAINT `FK_user_cabang` FOREIGN KEY (`Id_Cabang`) REFERENCES `cabang` (`Id_Cabang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
