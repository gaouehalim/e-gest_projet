-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.0.30 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Listage de la structure de table memoire. site
CREATE TABLE IF NOT EXISTS `site` (
  `idSite` int NOT NULL AUTO_INCREMENT,
  `nomSite` varchar(30) NOT NULL,
  `contactSite` varchar(30) NOT NULL,
  `emailSite` varchar(30) NOT NULL,
  `adresseSite` varchar(100) NOT NULL,
  `cover` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `dateCreat` date DEFAULT NULL,
  `idUtilisateur` int DEFAULT NULL,
  PRIMARY KEY (`idSite`) USING BTREE,
  KEY `idUtilisateur` (`idUtilisateur`),
  CONSTRAINT `site_ibfk_1` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

-- Listage des données de la table memoire.site : ~2 rows (environ)
INSERT INTO `site` (`idSite`, `nomSite`, `contactSite`, `emailSite`, `adresseSite`, `cover`, `dateCreat`, `idUtilisateur`) VALUES
	(1, 'HECM NATITINGOU ', ' 63 63 05 36', 'Hecmnatitingou@gmail.com', 'HECM Natitingou officiel, Natitinqou', '../PPsite/HECM NATITINGOU natitingou.jpg', '2024-05-08', 7),
	(2, 'HECM PARAKOU', '99999999', 'parakou@gmail.com', 'Wansirou , derrière le Lycée ', '../PPsite/HECM PARAKOUHECM PARAKOUhecmpk.jpg', '2024-05-08', 6),
	(3, 'HECM KANDI', '67 15 34 34', 'hecmkandi@gmail.com', 'Kandi, Alibori, BENIN', '../PPsite/HECM KANDIkandi.jpg', '2024-06-09', 12);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
