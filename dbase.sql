-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 20 déc. 2023 à 11:31
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
-- Base de données : `ticket`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id comment` int(11) NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `mescription` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id comment`, `ticket_id`, `mescription`) VALUES
(4, 11, 'p^,^p'),
(5, 11, 'opnjponop'),
(6, 11, 'fghjklm'),
(7, 12, 'khawla'),
(8, 11, 'khawla'),
(9, 12, 'safaa'),
(10, 16, 'ffff'),
(11, 11, 'jlihimzfz'),
(12, 11, 'imad'),
(13, 11, 'imad'),
(14, 11, 'jblbvl'),
(15, 11, ' ljbm'),
(16, 11, 'nbpb'),
(17, 11, 'ggggg'),
(18, 11, 'kpoml;p'),
(19, 11, 'fnhfn'),
(20, 11, 'fnhfn'),
(21, 11, 'fnhfn'),
(22, 11, 'fnhfn'),
(23, 11, 'fnhfn'),
(24, 11, 'nmnm'),
(25, 11, 't'),
(26, 11, 'g');

-- --------------------------------------------------------

--
-- Structure de la table `developpeur`
--

CREATE TABLE `developpeur` (
  `id` int(11) NOT NULL,
  `First_name` varchar(255) NOT NULL,
  `Last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `Date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `developpeur`
--

INSERT INTO `developpeur` (`id`, `First_name`, `Last_name`, `email`, `password`, `Date`) VALUES
(1, 'Khawla', 'Kharbouchi', 'khawlakha@gmail.com', 'khawla12', '2023-12-17 02:02:22'),
(3, 'salma', 'salma', 'salma@gmail.com', 'salma12', '2023-12-17 02:02:22'),
(5, 'fatima', 'zahra', 'fatimaz@gmail.com', 'fatimaz1', '2023-12-17 02:02:22'),
(7, 'amina ', 'amina', 'amina@gmailcom', 'amina', '2023-12-17 02:02:22'),
(8, 'ilyas', 'chaoui', 'ilyas@gmail.com', 'chaoui', '2023-12-17 02:02:22'),
(11, 'mohamed', 'med', 'med@gmail.com', 'med', '2023-12-17 02:02:22'),
(15, 'ayoub', 'kharbouchi', 'ayoub@gmail.com', 'ayoub', '2023-12-17 02:05:06'),
(16, 'samia', 'samia', 'samia@gmail.com', 'samia', '2023-12-18 00:03:01'),
(17, 'yassine', 'yas', 'yassine@gmail.com', 'yas12', '2023-12-19 20:29:00');

-- --------------------------------------------------------

--
-- Structure de la table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `probleme` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `developpeur` varchar(255) NOT NULL,
  `priorite` int(11) NOT NULL,
  `Date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tickets`
--

INSERT INTO `tickets` (`id`, `titre`, `probleme`, `status`, `description`, `developpeur`, `priorite`, `Date`) VALUES
(11, 'zertyuio', 'Front-end', 'to do', 'sdfghjklmcvbn,rtyui', 'ayoub kharbouchi', 111, '2023-12-18 15:01:37'),
(12, 'cvbn', 'Front-end', 'in progress', 'dinxokojrifc kleufjc,', 'amina  amina', 55, '2023-12-18 16:08:25'),
(13, 'zertyuio', 'Front-end', 'in progress', 'zertyuiopsdfghjklm', 'Khawla Kharbouchi, salma salma, fatima zahra', 10, '2023-12-18 18:24:20'),
(14, 'ticket', 'Back-end', 'to do', 'qsdfghjklazertyuiowxcvbn,', 'fatima zahra', 13, '2023-12-19 00:59:08'),
(15, 'baz', 'Back-end', 'to do', 'foobar', 'salma salma, amina  amina', 34, '2023-12-19 09:20:30'),
(16, 'ana', 'Back-end', 'Done', 'ana m3atla', 'ilyas chaoui, mohamed med', 23, '2023-12-19 12:03:05');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id comment`);

--
-- Index pour la table `developpeur`
--
ALTER TABLE `developpeur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `developpeur`
--
ALTER TABLE `developpeur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
