-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 14 mai 2024 à 08:55
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sae203`
--

-- --------------------------------------------------------

--
-- Structure de la table `concours`
--

CREATE TABLE `concours` (
  `id_concours` int(11) NOT NULL,
  `titre_concours` varchar(128) NOT NULL,
  `theme_concours` varchar(128) NOT NULL,
  `desc_concours` tinytext NOT NULL,
  `dateDebut_concours` datetime NOT NULL,
  `dateFin_concours` datetime NOT NULL,
  `utilisateur_concours` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `concours`
--

INSERT INTO `concours` (`id_concours`, `titre_concours`, `theme_concours`, `desc_concours`, `dateDebut_concours`, `dateFin_concours`, `utilisateur_concours`) VALUES
(1, 'Test', 'Paysage', 'oui non', '2024-05-13 12:35:00', '2024-05-25 09:38:00', 'simon');

-- --------------------------------------------------------

--
-- Structure de la table `photo`
--

CREATE TABLE `photo` (
  `id_photo` int(11) NOT NULL,
  `auteur_photo` varchar(128) NOT NULL,
  `description_photo` tinytext NOT NULL,
  `chemin_photo` varchar(128) NOT NULL,
  `date_photo` datetime NOT NULL,
  `titre_photo` varchar(128) NOT NULL,
  `concours_photo` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `photo`
--

INSERT INTO `photo` (`id_photo`, `auteur_photo`, `description_photo`, `chemin_photo`, `date_photo`, `titre_photo`, `concours_photo`) VALUES
(2, 'aline', 'Beautiful', 'public/media/images/aline_nature.jpg', '2023-05-23 09:26:07', 'nature', '1'),
(3, 'aline', 'Superbe', 'public/media/images/aline_fantasy.jpg', '2023-05-23 09:27:01', 'fantasy', '1'),
(4, 'aline', 'Chouette!', 'public/media/images/aline_chouette.jpg', '2023-05-23 09:28:37', 'chouette', '1'),
(5, 'jean', 'Que de fleurs', 'public/media/images/jean_fleurs.jpg', '2023-05-27 15:51:33', 'fleurs', '1'),
(6, 'jacques', 'Une route', 'public/media/images/jacques_route.jpg', '2023-05-27 19:34:59', 'route', '1'),
(7, 'jean', 'Photo de Man Ray', 'public/media/images/jean_Larmes.jpg', '2023-05-27 21:07:19', 'Larmes', '1'),
(15, 'p', 'pomme sur fond noir', 'public/media/images/p_pomme.jpg', '2024-03-23 19:51:17', 'pomme', '1'),
(18, 'simon', 'coucher de soleil', 'public/media/images/simon_Lac.jpg', '2024-05-13 09:36:44', 'Lac', '1');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `pseudo_utilisateur` varchar(128) NOT NULL,
  `mail_utilisateur` varchar(128) NOT NULL,
  `mdp_utilisateur` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`pseudo_utilisateur`, `mail_utilisateur`, `mdp_utilisateur`) VALUES
('aline', 'al@gmail.com', 't'),
('aline2', 'a@a', 'a'),
('jacques', 'j@j.com', 't'),
('jean', 'jean@gmail.com', 't'),
('michel', 'michemiche@jackie', '123'),
('p', 'p@p', 'p'),
('r', 'j@j', 'a'),
('simon', 's@s', '123'),
('x', 'x@x', 'a');

-- --------------------------------------------------------

--
-- Structure de la table `vote`
--

CREATE TABLE `vote` (
  `photo_vote` int(11) NOT NULL,
  `utilisateur_vote` varchar(128) NOT NULL,
  `valeur_vote` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `vote`
--

INSERT INTO `vote` (`photo_vote`, `utilisateur_vote`, `valeur_vote`) VALUES
(2, 'simon', 2),
(6, 'simon', 4),
(7, 'simon', 4),
(15, 'simon', 3);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `concours`
--
ALTER TABLE `concours`
  ADD PRIMARY KEY (`id_concours`),
  ADD KEY `utilisateur` (`utilisateur_concours`);

--
-- Index pour la table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`id_photo`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`pseudo_utilisateur`,`mail_utilisateur`);

--
-- Index pour la table `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`photo_vote`,`utilisateur_vote`),
  ADD KEY `photo` (`photo_vote`),
  ADD KEY `utilisateur` (`utilisateur_vote`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `concours`
--
ALTER TABLE `concours`
  MODIFY `id_concours` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `photo`
--
ALTER TABLE `photo`
  MODIFY `id_photo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
