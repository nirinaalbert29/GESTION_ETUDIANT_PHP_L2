-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 22 avr. 2022 à 15:25
-- Version du serveur :  10.4.19-MariaDB
-- Version de PHP : 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `g_etudiant_php`
--

-- --------------------------------------------------------

--
-- Structure de la table `anne_univ`
--

CREATE TABLE `anne_univ` (
  `id_anne` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `control`
--

CREATE TABLE `control` (
  `num_cont` int(10) NOT NULL,
  `num_etu` int(10) NOT NULL,
  `id_mat` varchar(10) NOT NULL,
  `date_cont` date NOT NULL,
  `note` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `control`
--

INSERT INTO `control` (`num_cont`, `num_etu`, `id_mat`, `date_cont`, `note`) VALUES
(1, 1, '0', '2022-04-22', 12),
(2, 2, 'si', '2022-04-19', 15),
(3, 2, 'math1', '2022-04-21', 14);

-- --------------------------------------------------------

--
-- Structure de la table `cycle`
--

CREATE TABLE `cycle` (
  `num_cycle` int(10) NOT NULL,
  `nom_cycle` varchar(30) NOT NULL,
  `dure` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `num_etu` int(11) NOT NULL,
  `nom_etu` varchar(30) NOT NULL,
  `prenom_etu` varchar(30) NOT NULL,
  `datenais_etu` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`num_etu`, `nom_etu`, `prenom_etu`, `datenais_etu`) VALUES
(1, 'alain carter', 'nirina albert jah', '2002-06-27'),
(2, 'tahirintsoa', 'nirina albert ', '2022-04-13'),
(4, 'andrianirina', 'patricia', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `inscrire`
--

CREATE TABLE `inscrire` (
  `num_etu` int(10) NOT NULL,
  `id_anne` int(11) NOT NULL,
  `id_niveau` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

CREATE TABLE `matiere` (
  `id_mat` varchar(10) NOT NULL,
  `nom_mat` varchar(20) NOT NULL,
  `coeff_mat` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `matiere`
--

INSERT INTO `matiere` (`id_mat`, `nom_mat`, `coeff_mat`) VALUES
('math1', 'analyse', 3),
('ro', 'proba', 4),
('si', 'Systeme information', 4);

-- --------------------------------------------------------

--
-- Structure de la table `mention`
--

CREATE TABLE `mention` (
  `code_mention` varchar(10) NOT NULL,
  `nom_mention` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `niveau`
--

CREATE TABLE `niveau` (
  `id_niv` varchar(15) NOT NULL,
  `nom_classe` varchar(15) NOT NULL,
  `num_cycle` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `posseder`
--

CREATE TABLE `posseder` (
  `num_cycle` int(10) NOT NULL,
  `code_mention` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `anne_univ`
--
ALTER TABLE `anne_univ`
  ADD PRIMARY KEY (`id_anne`);

--
-- Index pour la table `control`
--
ALTER TABLE `control`
  ADD PRIMARY KEY (`num_cont`),
  ADD KEY `num_etu` (`num_etu`);

--
-- Index pour la table `cycle`
--
ALTER TABLE `cycle`
  ADD PRIMARY KEY (`num_cycle`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`num_etu`);

--
-- Index pour la table `matiere`
--
ALTER TABLE `matiere`
  ADD PRIMARY KEY (`id_mat`);

--
-- Index pour la table `mention`
--
ALTER TABLE `mention`
  ADD PRIMARY KEY (`code_mention`);

--
-- Index pour la table `niveau`
--
ALTER TABLE `niveau`
  ADD PRIMARY KEY (`id_niv`),
  ADD KEY `num_cycle` (`num_cycle`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `control`
--
ALTER TABLE `control`
  MODIFY `num_cont` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `cycle`
--
ALTER TABLE `cycle`
  MODIFY `num_cycle` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `num_etu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `control`
--
ALTER TABLE `control`
  ADD CONSTRAINT `control_ibfk_1` FOREIGN KEY (`num_etu`) REFERENCES `etudiant` (`num_etu`);

--
-- Contraintes pour la table `niveau`
--
ALTER TABLE `niveau`
  ADD CONSTRAINT `niveau_ibfk_1` FOREIGN KEY (`num_cycle`) REFERENCES `cycle` (`num_cycle`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
