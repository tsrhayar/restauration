-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 24 nov. 2020 à 12:29
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `restauration`
--

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id`, `name`, `phone`, `email`) VALUES
(1, 'taha', 666666666, 'saada, Safi'),
(2, 'taha', 666666666, 'saada, Safi'),
(3, 'hamza', 677889966, 'Bouab, safi'),
(4, 'khalid', 666666644, 'Azib Darii, safi'),
(5, 'ahmed', 611554433, 'Kawki, Safi');

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `lunch_name` varchar(255) NOT NULL,
  `lunch_price` int(11) NOT NULL DEFAULT 20
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `menu`
--

INSERT INTO `menu` (`id`, `lunch_name`, `lunch_price`) VALUES
(1, 'plat 1', 20),
(2, 'plat 2', 20),
(3, 'plat 3', 20),
(4, 'plat 4', 20),
(5, 'plat 5', 20),
(6, 'plat 6', 20),
(7, 'plat 7', 20),
(8, 'plat 8', 20),
(9, 'plat 9', 20),
(10, 'plat 10', 20);

-- --------------------------------------------------------

--
-- Structure de la table `this_day`
--

CREATE TABLE `this_day` (
  `id` int(11) NOT NULL,
  `this_day` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `this_day`
--

INSERT INTO `this_day` (`id`, `this_day`) VALUES
(1, '2020-11-24');

-- --------------------------------------------------------

--
-- Structure de la table `this_day_number`
--

CREATE TABLE `this_day_number` (
  `id` int(11) NOT NULL,
  `this_day_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `this_day_number`
--

INSERT INTO `this_day_number` (`id`, `this_day_number`) VALUES
(1, 9);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
