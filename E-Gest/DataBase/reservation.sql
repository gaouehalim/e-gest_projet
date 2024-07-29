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

-- Listage de la structure de table memoire. reservation
CREATE TABLE IF NOT EXISTS `reservation` (
  `idReservation` int NOT NULL AUTO_INCREMENT,
  `dateStart` datetime NOT NULL,
  `dateEnd` datetime NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `statutReservation` enum('en attente','refuser','en attente de validation','en cours','terminé') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `paiementReservation` int DEFAULT NULL,
  `daterev` datetime NOT NULL,
  `idLocal` int NOT NULL,
  `idUtilisateur` int NOT NULL,
  PRIMARY KEY (`idReservation`),
  KEY `idLocal` (`idLocal`,`idUtilisateur`),
  KEY `idUtilisateur` (`idUtilisateur`),
  CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`),
  CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`idLocal`) REFERENCES `ressourceimmobiliere` (`idLocal`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;

-- Listage des données de la table memoire.reservation : ~0 rows (environ)
INSERT INTO `reservation` (`idReservation`, `dateStart`, `dateEnd`, `message`, `statutReservation`, `paiementReservation`, `daterev`, `idLocal`, `idUtilisateur`) VALUES
	(10, '2024-06-11 13:00:00', '2024-06-11 14:00:00', 'Pour un tournois inter école de basket ', 'en attente de validation', 1500, '2024-06-11 12:55:38', 2, 9);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
