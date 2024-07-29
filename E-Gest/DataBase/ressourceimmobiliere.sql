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

-- Listage de la structure de table memoire. ressourceimmobiliere
CREATE TABLE IF NOT EXISTS `ressourceimmobiliere` (
  `idLocal` int NOT NULL AUTO_INCREMENT,
  `codeLocal` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `nomLocal` varchar(255) DEFAULT NULL,
  `typeLocal` varchar(50) NOT NULL DEFAULT '',
  `capaciteLocal` int NOT NULL,
  `etatLocal` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT '',
  `reservable` enum('non','oui') NOT NULL,
  `description` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `statutLocal` enum('disponible','indisponible') NOT NULL,
  `tarifLocal` int DEFAULT NULL,
  `dateAdd` datetime NOT NULL,
  `idSite` int NOT NULL,
  PRIMARY KEY (`idLocal`),
  KEY `idSite` (`idSite`),
  CONSTRAINT `ressourceimmobiliere_ibfk_1` FOREIGN KEY (`idSite`) REFERENCES `site` (`idSite`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

-- Listage des données de la table memoire.ressourceimmobiliere : ~3 rows (environ)
INSERT INTO `ressourceimmobiliere` (`idLocal`, `codeLocal`, `nomLocal`, `typeLocal`, `capaciteLocal`, `etatLocal`, `reservable`, `description`, `statutLocal`, `tarifLocal`, `dateAdd`, `idSite`) VALUES
	(1, 'SAL0001HECM PARAKOU', '', 'SALLE DE JEUX', 100, 'moyen', 'non', NULL, 'disponible', NULL, '2024-05-10 16:43:11', 2),
	(2, 'SAL0002HECM PARAKOU', 'TERRAIN DE BASKET', 'TERRAIN DE JEUX', 100, 'moyen', 'oui', '', 'disponible', 1500, '2024-05-10 16:46:46', 2),
	(5, 'SAL0005HECM PARAKOU', 'Salle ICDL', 'SALLE INFORMATIQUE ', 50, 'bon', 'oui', '', 'disponible', 1000, '2024-06-08 16:52:12', 2);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
