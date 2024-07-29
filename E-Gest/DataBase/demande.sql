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

-- Listage de la structure de table memoire. demande
CREATE TABLE IF NOT EXISTS `demande` (
  `idDemande` int NOT NULL AUTO_INCREMENT,
  `typeMaterielle` int NOT NULL DEFAULT '0',
  `quantite` int NOT NULL DEFAULT '0',
  `periode` int DEFAULT NULL,
  `messageDemande` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT '',
  `statutDemande` enum('en attente','accepter','refuser') NOT NULL,
  `dateAdd` datetime NOT NULL,
  `reponseDemande` varchar(255) DEFAULT NULL,
  `idSite` int NOT NULL,
  PRIMARY KEY (`idDemande`),
  KEY `typeMaterielle` (`typeMaterielle`),
  KEY `idSite` (`idSite`),
  CONSTRAINT `demande_ibfk_1` FOREIGN KEY (`typeMaterielle`) REFERENCES `categoriematerielle` (`idCategorie`),
  CONSTRAINT `demande_ibfk_2` FOREIGN KEY (`idSite`) REFERENCES `site` (`idSite`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;

-- Listage des données de la table memoire.demande : ~0 rows (environ)
INSERT INTO `demande` (`idDemande`, `typeMaterielle`, `quantite`, `periode`, `messageDemande`, `statutDemande`, `dateAdd`, `reponseDemande`, `idSite`) VALUES
	(7, 6, 5, NULL, NULL, 'accepter', '2024-06-11 12:57:35', NULL, 2);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
memoire