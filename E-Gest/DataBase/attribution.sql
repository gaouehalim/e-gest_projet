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

-- Listage de la structure de table memoire. attribution
CREATE TABLE IF NOT EXISTS `attribution` (
  `idAttribution` int NOT NULL AUTO_INCREMENT,
  `dateEnd` date DEFAULT NULL,
  `statutAttribution` enum('en cours','terminer') NOT NULL,
  `idMaterielle` int NOT NULL,
  `idSite` int NOT NULL,
  PRIMARY KEY (`idAttribution`),
  KEY `idMaterielle` (`idMaterielle`),
  KEY `idSite` (`idSite`),
  CONSTRAINT `attribution_ibfk_2` FOREIGN KEY (`idMaterielle`) REFERENCES `ressourcematerielle` (`idMaterielle`),
  CONSTRAINT `attribution_ibfk_3` FOREIGN KEY (`idSite`) REFERENCES `site` (`idSite`),
  CONSTRAINT `attribution_ibfk_4` FOREIGN KEY (`idSite`) REFERENCES `site` (`idSite`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

-- Listage des données de la table memoire.attribution : ~3 rows (environ)
INSERT INTO `attribution` (`idAttribution`, `dateEnd`, `statutAttribution`, `idMaterielle`, `idSite`) VALUES
	(1, '2024-09-03', 'en cours', 12, 2),
	(2, NULL, 'en cours', 6, 2),
	(3, NULL, 'en cours', 13, 1);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
