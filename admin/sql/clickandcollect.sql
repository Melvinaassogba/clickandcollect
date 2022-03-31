-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 02 juin 2021 à 18:27
-- Version du serveur :  5.7.21
-- Version de PHP :  7.0.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `clickandcollect`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(42) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `etablissement`
--

DROP TABLE IF EXISTS `etablissement`;
CREATE TABLE IF NOT EXISTS `etablissement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(42) DEFAULT NULL,
  `photo` varchar(42) DEFAULT NULL,
  `adresse` varchar(42) DEFAULT NULL,
  `numero` varchar(20) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `description` text,
  `proprietaire` varchar(42) DEFAULT NULL,
  `id_cat` int(11) DEFAULT NULL,
  `commentaire` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_cat` (`id_cat`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id_produit` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(42) DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_produit`),
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `nom` varchar(42) NOT NULL,
  `prenom` varchar(42) NOT NULL,
  `login` varchar(42) NOT NULL,
  `mdp` varchar(42) NOT NULL,
  `id_acces` int(11) NOT NULL,
  PRIMARY KEY (`login`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`nom`, `prenom`, `login`, `mdp`, `id_acces`) VALUES
('Jean', 'Luc', 'jeanluc@gmail.com', 'adminsimple', 2),
('Ange', 'Florian', 'angeflo@gmail.com', 'marchand', 3),
('AMAN', 'Edoukou', 'amanedoukou@gmail.com', 'marchand', 3),
('', '', '', 'adminsimple', 2),
('PONT', 'Bastien', 'admin@gmail.com', 'admin', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
