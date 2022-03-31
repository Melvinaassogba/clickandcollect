-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 04 juin 2021 à 23:22
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `clickandcollect`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `nom` varchar(42) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`) VALUES
(1, 'restauration'),
(2, 'patisserie'),
(3, 'librairie'),
(4, 'boulangerie'),
(5, 'jeux et jouets'),
(6, 'Scolaire'),
(7, 'Producteurs Locaux');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id_comments` int(11) NOT NULL,
  `id_eta` int(11) DEFAULT NULL,
  `texte` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`id_comments`, `id_eta`, `texte`) VALUES
(4, 7, 'Service super'),
(8, 5, 'azerty'),
(6, 6, 'Hello');

-- --------------------------------------------------------

--
-- Structure de la table `etablissement`
--

CREATE TABLE `etablissement` (
  `id_eta` int(11) NOT NULL,
  `nom_eta` varchar(42) DEFAULT NULL,
  `photo` varchar(42) DEFAULT NULL,
  `adresse` varchar(42) DEFAULT NULL,
  `numero` varchar(20) DEFAULT NULL,
  `email` varchar(42) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `login` varchar(42) DEFAULT NULL,
  `id_cat` int(11) DEFAULT NULL,
  `lien` varchar(300) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `etablissement`
--

INSERT INTO `etablissement` (`id_eta`, `nom_eta`, `photo`, `adresse`, `numero`, `email`, `description`, `login`, `id_cat`, `lien`) VALUES
(7, 'La maison de zazou', 'admin/img/zazou.jpg', '12 rue de bertrand ', '0299634399', 'gestion@lamaisondezazou.com', 'Magasin de jouets, jeux, puériculture et librairie jeunesse - Rennes - La Maison de Zazou Dans un univers ludique et coloré, venez découvrir la boutique située au cœur du centre historique de Rennes. Vous y trouverez des jouets, doudous, des jeux de société, des loisirs créatifs, des milliers de livres, de la déco de chambre et de la puériculture. Dans un cadre enchanteur, l\'équipe de La Maison de Zazou vous propose de nombreuses marques telles que Djeco, Moulin roty, Vilac, Bugaboo, Babyzen, Cybex, Lilliputiens, Janod, Love Maé, Auzou, Petit Jour, Hape, Méri Méri, Bakker made with love, Lassig, Haba, Smart games, Babylonia, Micro, la case de cousin Paul... Ouverte du lundi au samedi, toute l\'année. La Maison de Zazou est LA boutique préférée des petits et des grands!\r\n\r\n', 'bam@ci.com', 5, 'https://www.google.com/maps?daddr=12+rue+de+bertrand+Acc%C3%A8s+bus+et+m%C3%A9tro+Saint-Anne+Rennes'),
(4, 'Savonnerie des Coquelicots', 'admin/img/savonnerie.jpg', '8 rue Robert chevrier - 35000 Rennes', '06.31.52.49.52', 'contact@savonneriedescoquelicots.com', 'Savonnerie artisanale ouverte en novembre 2020, je fabrique dans mon laboratoire cosmétique de Rennes des savons saponifiés à froid. Mes produits sont tous issus de l’agriculture biologique.Sans colorants chimiques ni parfums de synthèse, ils sont adaptés à tous types de peaux. Les savons solides sont la parfaite alternative au gel douche et permettent de nettoyer et d\'hydrater votre peau sans l\'agresser. Un produit local zéro déchet et économique !', 'lucas@gmail.com', 7, 'https://www.google.com/maps?daddr=8+rue+Robert+chevrier+Rennes'),
(5, 'L\'ATELIER BOULANGER', 'admin/img/atelboul.jpg', '248 rue de Nantes - 35000 Rennes', '0223440841', 'atelierboulanger@orange.fr', 'Véritable image de l’artisanat français, l’atelier boulanger propose à la vente toutes sortes de pains, sandwichs, boissons, pâtisseries. Un savoir-faire unique en Ille-et-Vilaine qui nous a notamment valu la quatrième place pour le meilleur croissant d’Ille-et-Vilaine et une participation à la meilleure boulangerie de France. Nous avons fait le choix de n’utiliser que des matières premières de haute qualité avec une certification bio pour notre gamme de pains. Nous avons également intégré la démarche Agri éthique pour garantir de meilleurs revenus aux agriculteurs et locaux ainsi que préserver l’environnement et le bien-être animal. Retrouvez toute l’équipe de l’Atelier boulanger du lundi au vendredi de 6h30 à 19h30 et le samedi de 7h30 à 19h30, 248 rue de Nantes 35136 Saint-Jacques-de-la-Lande 02 23 44 08 14.', 'bam@ci.com', 4, 'https://www.google.com/maps?daddr=248++rue+de+Nantes+Rennes'),
(6, 'HISTOIRES DE MOTS', 'admin/img/hismot.jpg', '6 rue saint thomas - 35000 Rennes', '02.23.36.04.93', 'bouquinerie.histoiresdemots@gmail.com', 'Bouquinerie ou librairie d\'occasion où vous attendent plus de 5 000 références. N\'hésitez pas à franchir le seuil pour chercher, trouver votre compagnon idéal de lecture.', 'lucas@gmail.com', 3, 'https://www.google.com/maps?daddr=6+rue+saint+thomas+Rennes'),
(8, 'CREPERIE DU PONT-LEVIS', 'admin/img/pont.jpg', '6 rue des Portes Mordelaises ', '0290016837', 'creperiedupontlevis@gmail.com', NULL, 'lucas@gmail.com', 1, 'https://www.google.com/maps?daddr=6+rue+des+Portes+Mordelaises+Rennes'),
(9, 'LIBRAIRIE-EDITION CRITIC', 'admin/img/critic.jpg', '19 RUE HOCHE - 35000 Rennes', '0223202498', 'critic@gmail.com', '20 ans d\'expérience en librairie spécialisée à Rennes (BD, manga, comics, littératures de l\'imaginaire, polars, bd et littérature jeunesse.\r\n\r\n', 'bam@ci.com', 3, 'https://www.google.com/maps?daddr=19+RUE+HOCHE+Rennes');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id_produit` int(11) NOT NULL,
  `nom` varchar(42) DEFAULT NULL,
  `id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id_produit`, `nom`, `id`) VALUES
(3, 'Banane', 1);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `nom` varchar(42) NOT NULL,
  `prenom` varchar(42) NOT NULL,
  `login` varchar(42) NOT NULL,
  `mdp` varchar(42) NOT NULL,
  `id_acces` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`nom`, `prenom`, `login`, `mdp`, `id_acces`) VALUES
('jean', 'luc', 'jeanluc@gmail.com', 'adminsimple', 2),
('Bamba', 'Ismaêl ', 'bam@ci.com', 'marchand', 3),
('Alexandre', 'Lucas', 'lucas@gmail.com', 'marchand', 3),
('PONT', 'Bastien', 'admin@gmail.com', 'admin', 1),
('Brou', 'alice', 'alice@nan.com', 'adminsimple', 2),
('Dao', 'Jean', 'jean@nan.ci', 'marchand', 3);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id_comments`),
  ADD KEY `id` (`id_eta`);

--
-- Index pour la table `etablissement`
--
ALTER TABLE `etablissement`
  ADD PRIMARY KEY (`id_eta`),
  ADD KEY `id_cat` (`id_cat`),
  ADD KEY `login` (`login`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id_produit`),
  ADD KEY `id` (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`login`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id_comments` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `etablissement`
--
ALTER TABLE `etablissement`
  MODIFY `id_eta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id_produit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
