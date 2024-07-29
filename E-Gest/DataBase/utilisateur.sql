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

-- Listage de la structure de table memoire. utilisateur
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `idUtilisateur` int NOT NULL AUTO_INCREMENT,
  `nomUtilisateur` varchar(30) NOT NULL,
  `prenomUtilisateur` varchar(100) NOT NULL,
  `contactUtilisateur` text,
  `emailUtilisateur` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('client','cm','gs','admin') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `photoUtilisateur` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `dateAdd` datetime NOT NULL,
  PRIMARY KEY (`idUtilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3;

-- Listage des données de la table memoire.utilisateur : ~8 rows (environ)
INSERT INTO `utilisateur` (`idUtilisateur`, `nomUtilisateur`, `prenomUtilisateur`, `contactUtilisateur`, `emailUtilisateur`, `password`, `role`, `photoUtilisateur`, `dateAdd`) VALUES
	(1, 'GAOUE SEIDOU', 'Halimou', '56929063', 'ruccibilljr@gmail.com', '$2y$10$uGJimR9Cy9OVupKjbZr/vOvQMwUq.xuK5vkLSz4YEUQsCWn7SrzH6', 'cm', '../PPuser/1_IMG-20230319-WA0037.jpg', '2024-05-05 10:29:49'),
	(3, 'GAOUE ', 'Halim', '56929063', 'ruccibilljr@gmail.com', '$2y$10$9yuG.tqpv/v0SBdpBVU2TOsJAGVImqebUQ2iVNrjItLgyOF04HyUu', 'client', '../PPuser/3_IMG_8048.jpeg', '2024-05-05 10:43:06'),
	(4, 'TAMOU', 'Pascal', '98049044', 'zimepascalt@gmail.com', '$2y$10$2zh0aZKbweCWfF42/SXML.tAD.NKaKhDz97/HhwmCCdlnL53dLzlq', 'cm', '../PPuser/4_IMG_20230207_084222_964.jpg', '2024-05-08 10:22:10'),
	(5, 'nossa', 'jean', '65660477', 'nossankolbajean@gmail.com', '$2y$10$J5THy0JapZ5Y9PM961HTLejITEP/mln.7X6qoH70CMj0N//l4GI/S', 'client', NULL, '2024-05-08 17:36:22'),
	(6, 'KOTO', 'Soulé', '96634774', 'soule@gmail.com', '$2y$10$F89hsojFQd/eO7HZAlJNmetIuO0dxpqWRa77kIj4LK4.EY/R7fuVm', 'gs', '../PPuser/6_CE0B302F-EE35-49CC-882A-441ECB82DF8B(1).JPEG', '2024-05-09 10:35:10'),
	(7, 'GAOUE ', 'Orou Boro Ryad', '96528336', 'ryad@gmail.com', '$2y$10$r75N1tOrvO8vQLbZP0.nJ.BcKnwrbD6Dl2UMcYqDoEjEU2WzsQ3kW', 'gs', NULL, '2024-05-09 15:32:05'),
	(9, 'MARE', 'Anifath', '96634774', 'ani@gmail.com', '$2y$10$7k4d7aPoQU.8I9.jlxPGEubOz0IIpqyM/kqU2oxjqWvpofyzfTfxG', 'client', 'PPuser/9_Capture d\'écran 2024-03-09 214540.png', '2024-05-21 12:48:21'),
	(11, 'BIO KININ', 'Chérifath', '67808720', 'cherifath@gmail.com', '$2y$10$P08vIetqYuthZKW7th./NOOJ2Mr/runKetopgWG0mx79mx0BR7YwK', 'admin', '../PPuser/11_hecm.png', '2024-06-11 07:13:03'),
	(12, 'OUAGOU', 'Bénoit', '+229 91 24 19 19', 'ben@gmail.com', '$2y$10$4QgZyTb4aFuxMx4jQy7PS.qZfR5dqUhajaCURmJCXHXVa.EGtA4g6', 'gs', NULL, '2024-06-11 07:22:10');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
