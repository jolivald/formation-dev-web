-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Mar 14 Avril 2020 à 11:10
-- Version du serveur :  5.7.29-0ubuntu0.18.04.1
-- Version de PHP :  7.2.24-0ubuntu0.18.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `criminels`
--

-- --------------------------------------------------------

--
-- Structure de la table `acolytes`
--

CREATE TABLE `acolytes` (
  `recherches_id_r` int(11) NOT NULL,
  `recherches_id_r1` int(11) NOT NULL,
  `coopere` tinyint(1) NOT NULL,
  `created_at` date DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `agents`
--

CREATE TABLE `agents` (
  `id_agents` int(11) NOT NULL,
  `pseudo_a` varchar(255) NOT NULL,
  `mot_de_passe_a` varchar(255) NOT NULL,
  `niveau_accreditation_a` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `agents`
--

INSERT INTO `agents` (`id_agents`, `pseudo_a`, `mot_de_passe_a`, `niveau_accreditation_a`) VALUES
(1, 'A', '$2y$10$9PHjxFHeNHVu95D2EVYCpOtrmfXjWry16RResxHFbvBZKD6Nu8Wwa', 1),
(2, 'B', '$10$PgdSLsL.gzEgTVbL57YoauB.SxanwQAY4R40gz.KDL9elrSrE/Fmu', 2),
(3, 'C', '$2y$10$X7sGTNP7QxM5lh9z8v8HEujqcV9St9up59cYnGEspFvqk4xRp8ulu', 3);

-- --------------------------------------------------------

--
-- Structure de la table `condamnations`
--

CREATE TABLE `condamnations` (
  `id_c` int(11) NOT NULL,
  `libelle_affaire_c` varchar(45) NOT NULL,
  `date_c` date NOT NULL,
  `duree_c` int(11) NOT NULL,
  `date_liberation_c` date DEFAULT NULL,
  `created_at` date NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `updated_at` date NOT NULL,
  `updated_by` varchar(255) NOT NULL,
  `recherches_id_r` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `recherches`
--

CREATE TABLE `recherches` (
  `id_r` int(11) NOT NULL,
  `nom_r` varchar(255) NOT NULL,
  `prenom_r` varchar(255) NOT NULL DEFAULT '',
  `date_naissance_r` date NOT NULL,
  `signe_distinctif_r` varchar(255) NOT NULL,
  `profil_psy_r` longtext,
  `niveau_accreditation` int(11) NOT NULL,
  `nom_photo_r` varchar(255) NOT NULL,
  `informations_r` longtext,
  `derniere_adresse_r` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `updated_at` date NOT NULL,
  `updated_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `recherches`
--

INSERT INTO `recherches` (`id_r`, `nom_r`, `prenom_r`, `date_naissance_r`, `signe_distinctif_r`, `profil_psy_r`, `niveau_accreditation`, `nom_photo_r`, `informations_r`, `derniere_adresse_r`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'grueber', 'hans', '1971-03-12', 'tatouage de papillon sur la cuisse droite', 'schizophrénie. Sujet à des crises d\'angoisse qui le rendent particulièrement dangereux', 2, 'grueber.jpg', 'a développé un réseau de vente darmes en argentine', 'C1424AAH, Av. José María Moreno 739, Argentine', '2020-04-13', 'jim', '2020-04-13', 'jim'),
(2, 'capone', 'roberto', '1975-04-02', 'une balafre mal cicatrisée sous l\'oeil droit', 'dragueur invétéré. Il ne sait pas résister aux femmes', 2, 'capone.jpg', 'chef incontesté de la pègre sicilienne. Son clan est spécialisé dans le traffic d\'arme et de drogues', 'Piazza Cappuccini, 1, 90129 Palermo PA, Italie', '2020-04-13', 'jim', '2020-04-13', 'jim'),
(3, 'lupin', 'arsène', '1959-12-11', 'porte un haut de forme et un smocking', 'redoutablement malin', 3, 'arsene.jpg', 'Spécialiste du cambriolage de banques et de riches particuliers. Aucun coffre ne lui résiste', 'inconnue', '2020-04-13', 'jim', '2020-04-13', 'jim'),
(4, 'petrov', 'dimitri', '1981-07-02', 'un piercing sur la lèvre superieure', 'Froid, distant, asocial,dangereux', 3, 'petrov.jpg', 'trafic en tout genre et proxenetisme', 'Via Alessandro Manzoni, 20010 San Pietro Allolmo MI, Italie', '2020-04-13', 'jim', '2020-04-13', 'jim');

-- --------------------------------------------------------

--
-- Structure de la table `signalements`
--

CREATE TABLE `signalements` (
  `temoignages_id_temoignage` int(11) NOT NULL,
  `recherches_id_r` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `updated_at` date NOT NULL,
  `updated_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `temoignages`
--

CREATE TABLE `temoignages` (
  `id_temoignage` int(11) NOT NULL,
  `localisation_t` varchar(255) NOT NULL,
  `nature_t` longtext NOT NULL,
  `temoin_t` varchar(255) NOT NULL,
  `numero_tel_temoin_t` varchar(255) DEFAULT NULL,
  `adresse_temoin_t` varchar(255) DEFAULT NULL,
  `date_s` date NOT NULL,
  `created_at` date NOT NULL,
  `created_by` varchar(45) NOT NULL,
  `updated_at` date NOT NULL,
  `updated_by` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `acolytes`
--
ALTER TABLE `acolytes`
  ADD PRIMARY KEY (`recherches_id_r`,`recherches_id_r1`),
  ADD KEY `fk_recherches_has_recherches_recherches2_idx` (`recherches_id_r1`),
  ADD KEY `fk_recherches_has_recherches_recherches1_idx` (`recherches_id_r`);

--
-- Index pour la table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`id_agents`);

--
-- Index pour la table `condamnations`
--
ALTER TABLE `condamnations`
  ADD PRIMARY KEY (`id_c`,`recherches_id_r`),
  ADD KEY `fk_condamnations_recherches_idx` (`recherches_id_r`);

--
-- Index pour la table `recherches`
--
ALTER TABLE `recherches`
  ADD PRIMARY KEY (`id_r`);

--
-- Index pour la table `signalements`
--
ALTER TABLE `signalements`
  ADD PRIMARY KEY (`temoignages_id_temoignage`,`recherches_id_r`),
  ADD KEY `fk_temoignages_has_recherches_recherches1_idx` (`recherches_id_r`),
  ADD KEY `fk_temoignages_has_recherches_temoignages1_idx` (`temoignages_id_temoignage`);

--
-- Index pour la table `temoignages`
--
ALTER TABLE `temoignages`
  ADD PRIMARY KEY (`id_temoignage`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `agents`
--
ALTER TABLE `agents`
  MODIFY `id_agents` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `condamnations`
--
ALTER TABLE `condamnations`
  MODIFY `id_c` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `recherches`
--
ALTER TABLE `recherches`
  MODIFY `id_r` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `temoignages`
--
ALTER TABLE `temoignages`
  MODIFY `id_temoignage` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `acolytes`
--
ALTER TABLE `acolytes`
  ADD CONSTRAINT `fk_recherches_has_recherches_recherches1` FOREIGN KEY (`recherches_id_r`) REFERENCES `recherches` (`id_r`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_recherches_has_recherches_recherches2` FOREIGN KEY (`recherches_id_r1`) REFERENCES `recherches` (`id_r`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `condamnations`
--
ALTER TABLE `condamnations`
  ADD CONSTRAINT `fk_condamnations_recherches` FOREIGN KEY (`recherches_id_r`) REFERENCES `recherches` (`id_r`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `signalements`
--
ALTER TABLE `signalements`
  ADD CONSTRAINT `fk_temoignages_has_recherches_recherches1` FOREIGN KEY (`recherches_id_r`) REFERENCES `recherches` (`id_r`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_temoignages_has_recherches_temoignages1` FOREIGN KEY (`temoignages_id_temoignage`) REFERENCES `temoignages` (`id_temoignage`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
