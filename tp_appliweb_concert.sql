-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 19 jan. 2022 à 13:24
-- Version du serveur :  10.3.32-MariaDB-0ubuntu0.20.04.1
-- Version de PHP : 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tp_appliweb_concert`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` int(10) UNSIGNED NOT NULL,
  `commande_id` int(10) UNSIGNED NOT NULL,
  `type_article_id` int(10) UNSIGNED NOT NULL,
  `quantite` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `commande_id`, `type_article_id`, `quantite`) VALUES
(1, 1, 4, 600),
(4, 4, 3, 149),
(5, 4, 2, 1),
(6, 4, 1, 2),
(7, 5, 3, 1),
(8, 6, 2, 7),
(9, 7, 1, 2),
(10, 7, 2, 3),
(11, 8, 2, 1),
(12, 8, 1, 3),
(13, 9, 3, 2),
(14, 10, 2, 3),
(15, 10, 2, 1),
(16, 11, 3, 1),
(17, 11, 2, 1),
(18, 11, 1, 1),
(601, 56, 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id` int(10) UNSIGNED NOT NULL,
  `contact_id` int(10) UNSIGNED NOT NULL,
  `statut_id` tinyint(3) UNSIGNED NOT NULL,
  `date_commande` datetime NOT NULL,
  `date_reglement` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id`, `contact_id`, `statut_id`, `date_commande`, `date_reglement`) VALUES
(1, 1, 1, '2021-01-05 10:00:00', '2021-01-05 10:05:00'),
(2, 2, 0, '2021-01-05 10:02:00', NULL),
(3, 3, 1, '2021-01-05 10:02:30', '2021-01-05 10:05:55'),
(4, 4, 1, '2021-01-05 10:03:15', '2021-01-05 10:06:20'),
(5, 5, 0, '2021-01-05 10:03:32', NULL),
(6, 6, 0, '2021-01-05 10:03:45', NULL),
(7, 7, 1, '2021-01-05 10:03:51', '2021-01-05 10:04:36'),
(8, 8, 0, '2021-01-05 10:04:11', NULL),
(9, 9, 0, '2021-01-05 10:04:03', NULL),
(10, 10, 1, '2021-01-05 10:04:20', '2021-01-05 10:10:54'),
(11, 11, 1, '2021-12-12 20:08:49', '2021-12-12 20:09:02'),
(13, 43, 0, '2022-01-05 10:42:05', NULL),
(14, 47, 0, '2022-01-05 10:50:41', NULL),
(15, 50, 0, '2022-01-05 10:53:50', NULL),
(17, 64, 0, '2022-01-18 16:55:56', NULL),
(18, 64, 0, '2022-01-18 16:55:56', NULL),
(19, 64, 1, '2022-01-18 16:55:56', NULL),
(20, 65, 0, '2022-01-18 16:58:45', NULL),
(21, 65, 0, '2022-01-18 16:58:45', NULL),
(22, 66, 0, '2022-01-18 16:59:10', NULL),
(23, 66, 0, '2022-01-18 16:59:10', NULL),
(24, 67, 0, '2022-01-18 17:01:50', NULL),
(25, 67, 0, '2022-01-18 17:01:50', NULL),
(26, 67, 1, '2022-01-18 17:01:50', '2022-01-18 17:01:50');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(10) UNSIGNED NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `prenom`, `nom`, `email`) VALUES
(1, 'Bruce', 'LeBateau', 'BruceLeBatelier@jourrapide.com'),
(2, 'Chantal', 'Roussel', 'ChantalRoussel@armyspy.com'),
(3, 'Zemmour', 'Audibert', 'SeymourAudibert@armyspy.com'),
(4, 'Melodie', 'Flamand', 'MelodieFlamand@dayrep.com'),
(5, 'Damiane', 'Lamothe', 'DamianeLamothe@armyspy.com'),
(6, 'Loring', 'Dupré', 'LoringDupere@dayrep.com'),
(7, 'Halette', 'Thibault', 'HaletteThibault@teleworm.us'),
(8, 'Fayette', 'Legueux', 'FayetteLagueux@jourrapide.com'),
(9, 'Kerman', 'Blanchard', 'KermanBlanchard@armyspy.com'),
(10, 'Bellamy', 'Coupart', 'BellamyCoupart@teleworm.us'),
(11, 'Test', 'Test', 'Test@esiee.fr'),
(16, 'fghfgh', 'ghf', 'fghghgf@fgh.com'),
(17, 'fzafs', 'dzadza', 'fdfd@fgf'),
(39, 'di wuong', 'lam', 'ui@ui.ui'),
(26, 'h', 'procu', 'prchg@gmail.com'),
(31, 'testa', 'test', 'moi@cmoi.fr'),
(48, 'di wuong', 'lam', 'ui@ui.ui'),
(47, 'testa', 'test', 'c@ffff'),
(21, 'di wuong', 'lam', 'oui@non.we'),
(32, 'nanwasse', 'silue', 'silueyacou294@gmail.xn--cm-jia'),
(38, 'di wuong', 'lam', 'ui@ui.ui'),
(41, 'Ui', 'Salut', 'cava@marche.fr'),
(42, 'aze', 'salut', 'aezzraz@lol.fr'),
(43, 'testa', 'test', 'moi@cmoi.fr'),
(44, 'nanwasse', 'silue', 'silueyacou294@gmail.xn--cm-jia'),
(45, 'aze', 'salut', 'aezzraz@lol.fr'),
(46, 'corentin', 'corentin', 'corentin@corentin'),
(49, 'di wuong', 'lam', 'ui@ui.ui'),
(50, 'testa', 'test', 'c@ffff'),
(55, 'yoooo', 'yoooo', 'yooo@yooo'),
(52, 'corentin', 'corentin', 'corentin@2'),
(53, 'order66', 'execute', 'sheev.sidious@sith.com'),
(54, 'di wuong', 'lam', 'ui@ui.ui'),
(56, 'zaeeaz', 'zea', 'azezae@lol.daz'),
(57, 'az', 'az', 'az@gmail.ocm'),
(58, 'test', 'test', 'test@gmail.com'),
(59, 'test', 'test', 'test@gmail.com'),
(60, 'test', 'test', 'test@gmail.com'),
(61, 'test', 'test', 'test@gmail.com'),
(62, 'test', 'test', 'test@gmail.com'),
(63, 'test', 'test', 'test@gmail.com'),
(64, 'test', 'test', 'test@gmail.com'),
(65, 'test', 'test', 'test@gmail.com'),
(66, 'test', 'test', 'test@gmail.com'),
(67, 'test', 'test', 'test@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `paiement`
--

CREATE TABLE `paiement` (
  `id` int(10) UNSIGNED NOT NULL,
  `commande` varchar(255) NOT NULL,
  `montant` int(10) UNSIGNED NOT NULL,
  `reponse` varchar(10) NOT NULL,
  `caddie` varchar(255) NOT NULL,
  `date_appel` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `paiement`
--

INSERT INTO `paiement` (`id`, `commande`, `montant`, `reponse`, `caddie`, `date_appel`) VALUES
(1, 'COM-00000011', 12000, '00', '11', '2021-12-12 20:09:02');

-- --------------------------------------------------------

--
-- Structure de la table `type_article`
--

CREATE TABLE `type_article` (
  `id` int(10) UNSIGNED NOT NULL,
  `label` varchar(255) NOT NULL,
  `prix` float NOT NULL,
  `quota` smallint(5) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `type_article`
--

INSERT INTO `type_article` (`id`, `label`, `prix`, `quota`) VALUES
(1, 'Plein tarif', 80, 500),
(2, 'Demi-tarif', 40, 500),
(3, 'Gratuit', 0, 500),
(4, 'Test quota', 30, 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `commande_id` (`commande_id`),
  ADD KEY `article_id` (`type_article_id`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contact_id` (`contact_id`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `paiement`
--
ALTER TABLE `paiement`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `type_article`
--
ALTER TABLE `type_article`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=602;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT pour la table `paiement`
--
ALTER TABLE `paiement`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `type_article`
--
ALTER TABLE `type_article`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
