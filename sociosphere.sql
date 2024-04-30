-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : Dim 07 mai 2023 à 21:45
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sociosphere`
--

-- --------------------------------------------------------

--
-- Structure de la table `gestion_abo`
--

DROP TABLE IF EXISTS `gestion_abo`;
CREATE TABLE IF NOT EXISTS `gestion_abo` (
  `abonnes` varchar(100) NOT NULL,
  `abonnements` varchar(100) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `gestion_abo`
--

INSERT INTO `gestion_abo` (`abonnes`, `abonnements`, `id`) VALUES
('julie', 'majda', 10),
('azerty', 'EMA', 4),
('majda', 'Amenah', 9),
('julie', 'Amenah', 11),
('Amenah', 'julie', 12),
('Amenah', 'majda', 13),
('dragon', 'julie', 14);

-- --------------------------------------------------------

--
-- Structure de la table `mdpo`
--

DROP TABLE IF EXISTS `mdpo`;
CREATE TABLE IF NOT EXISTS `mdpo` (
  `pseudo` varchar(100) NOT NULL,
  `question` text NOT NULL,
  `reponse` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `mdpo`
--

INSERT INTO `mdpo` (`pseudo`, `question`, `reponse`) VALUES
('EMA', ' Quelle est votre couleur favorite ? ', 'ROUGE'),
('EMA', ' Quelle est votre couleur favorite ? ', 'ROUGE'),
('EMA', ' Quelle est votre couleur favorite ? ', 'ROUGE'),
('EMA', ' Quelle est votre couleur favorite ? ', 'ROUGE'),
('GG', 'null', 'null'),
('EMA', ' Quelle est votre couleur favorite ? ', 'ROUGE'),
('test', '', ''),
('EMA', ' Quelle est votre couleur favorite ? ', 'ROUGE'),
('EMA', ' Quelle est votre couleur favorite ? ', 'ROUGE'),
('EMA', ' Quelle est votre couleur favorite ? ', 'ROUGE'),
('EMA', ' Quelle est votre couleur favorite ? ', 'ROUGE'),
('EMA', ' Quelle est votre couleur favorite ? ', 'ROUGE'),
('EMA', ' Quelle est votre couleur favorite ? ', 'ROUGE'),
('dragon', ' Quelle est votre couleur favorite ? ', 'noir'),
('TEST', '', ''),
('EMA', ' Quelle est votre couleur favorite ? ', 'ROUGE'),
('majda', 'null', 'null'),
('julie', ' Quelle est votre couleur favorite ? ', 'bleu'),
('Amenah', ' Quelle est votre couleur favorite ? ', 'bleu'),
('dragon', ' Quelle est votre couleur favorite ? ', 'noir');

-- --------------------------------------------------------

--
-- Structure de la table `publications`
--

DROP TABLE IF EXISTS `publications`;
CREATE TABLE IF NOT EXISTS `publications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(100) NOT NULL,
  `chemin` varchar(100) NOT NULL,
  `extension` text NOT NULL,
  `titre` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `publications`
--

INSERT INTO `publications` (`id`, `pseudo`, `chemin`, `extension`, `titre`) VALUES
(6, 'amenah', 'image/profil/dunk.jpg', 'jpg', 'slam'),
(7, 'amenah', 'image/profil/fleur.jpg', 'jpg', 'fleur'),
(10, 'EMA', 'image/coding.png', 'png', 'code'),
(27, 'EMA', 'image/monnt.jpg', 'jpg', 'monnt'),
(23, 'EMA', 'image/AAAAAAAAAAAAAAA.png', 'png', 'AAAAAAAAAAAAAAA'),
(24, 'EMA', 'image/nnnnnnnnnnnnnnn.png', 'png', 'nnnnnnnnnnnnnnn'),
(33, 'majda', '../image/diaporama_claude_monet_giverny_6.jpg', 'jpg', 'claude'),
(32, 'majda', 'image/DALL&middot;E 2022-11-11 19.52.30 - claude monnet.png', 'png', 'Monnet'),
(34, 'julie', '../image/Screenshot_20220830_220512_com.twitter.android.jpg', 'jpg', 'VAGUE'),
(35, 'julie', '../image/Screenshot_20220924_121622_com.twitter.android.jpg', 'jpg', 'art'),
(36, 'dragon', '../image/195830.jpg', 'jpg', 'dragon'),
(37, 'dragon', '../image/DALL&middot;E 2022-11-11 20.27.01 - complete.png', 'png', 'VAGUE');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `pseudo` varchar(100) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `PDP` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `mdp` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `admin`, `pseudo`, `mail`, `PDP`, `date`, `mdp`) VALUES
(7, 0, 'majda', 'Majda@gmail.com', 'image/La-Jeune-Fille-a-la-perle-Johannes-Vermeer-865x1024.jpg', '2002-02-02', '$2y$10$QS0lirhWF5sRzarUGTXPuuqQVlD9cE6PdrTkLnkYpFoIEXHbonVbq'),
(6, 1, 'Amenah', 'amenah@gmail.com', 'null', '2003-04-08', '$2y$10$EKHUf7/vNppv1qhe0tXXheuD42p.HYmx1tJ7JYwhye9cJAB6BeqQu'),
(4, 0, 'EMA', 'ema@gg.fr', 'image/195830.jpg', '2003-05-05', '$2y$10$6evIE5SWAoRPvTh46WoY6Ol9tyC8tL4mBTuJRmflysdg..24V9D0C'),
(8, 0, 'julie', 'julie@gmail.com', 'null', '2003-03-03', '$2y$10$aPELP7udx.8ZiVyZB9EBYO.sWlm3lMhdNtf2/Xp81EzZRcpHJHHOK'),
(9, 0, 'dragon', 'dragon@gg.fr', 'null', '2001-02-02', '$2y$10$0VC26O7rGFwykTl2OQSKO.Zi5uUrN2IciZigBVOq1XSnl5I/0tGKm');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
