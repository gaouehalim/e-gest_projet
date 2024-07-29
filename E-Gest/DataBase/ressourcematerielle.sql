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

-- Listage de la structure de table memoire. ressourcematerielle
CREATE TABLE IF NOT EXISTS `ressourcematerielle` (
  `idMaterielle` int NOT NULL AUTO_INCREMENT,
  `codeMaterielle` varchar(15) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `nomMaterielle` varchar(50) DEFAULT NULL,
  `typeMaterielle` int NOT NULL,
  `descriptionMaterielle` varchar(255) NOT NULL,
  `etatMaterielle` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT '',
  `statutMaterielle` enum('disponible','indisponible') NOT NULL,
  `dateAdd` datetime NOT NULL,
  PRIMARY KEY (`idMaterielle`),
  KEY `typeMaterielle` (`typeMaterielle`),
  CONSTRAINT `ressourcematerielle_ibfk_1` FOREIGN KEY (`typeMaterielle`) REFERENCES `categoriematerielle` (`idCategorie`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb3;

-- Listage des données de la table memoire.ressourcematerielle : ~4 rows (environ)
INSERT INTO `ressourcematerielle` (`idMaterielle`, `codeMaterielle`, `nomMaterielle`, `typeMaterielle`, `descriptionMaterielle`, `etatMaterielle`, `statutMaterielle`, `dateAdd`) VALUES
	(6, 'CLI0006HECM', 'Clim de mur', 2, 'Clim de murClim de murClim de murClim de mur', 'vielle', 'indisponible', '2024-05-07 17:23:16'),
	(12, 'PRO00012HECM', 'projecteur', 4, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime natus asperiores ipsa quas repellendus, praesentium omnis, veniam porro consequatur officiis ipsam delectus facere quaerat alias quos vero molestiae eveniet dolor?', 'bonne', 'indisponible', '2024-05-08 17:39:02'),
	(13, 'IMP00013HECM', '', 6, '', 'nouveau', 'indisponible', '2024-05-26 14:21:49'),
	(14, 'ORD00014HECM', '', 2, '', 'vielle', 'disponible', '2024-05-26 14:23:34'),
	(15, 'ORD00015HECM', '', 2, '', 'nouveau', 'disponible', '2024-05-26 14:25:43');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
