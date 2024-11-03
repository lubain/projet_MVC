-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 31 oct. 2024 à 03:50
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `social_media`
--

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `profile_photo` varchar(255) DEFAULT 'user-default.png',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `email`, `password`, `adress`, `profile_photo`) VALUES
(1, 'lubain', 'fadhel', 'fadhelubain@gmail.com', '$2y$10$9p/EjJ0PZxHQ2C9uwdeU2OJVLhKFfsCiAiNxIoGkCtN4S2DDLV0Uy', 'VT4-AZR', 'local/profile_11730298116.PNG'),
(2, 'nasaina', 'lova', 'lova@gmail.com', '$2y$10$lSb2uPjnDU8w.D2sMkCKHOxaCxPOfkHkisaRO1vqNil98yF32qDtu', 'antananarivo', 'user-default.png'),
(11, 'fedro', 'Hubert', 'hubs@gmail.com', '$2y$10$NN0rD5lgKsuI6yQG6DSJ6..9t/3dLZvhMjNoratHC0Fie7WEdttOO', 'antananarivo', 'user-default.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
