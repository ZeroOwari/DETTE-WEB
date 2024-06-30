-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 03 mai 2024 à 21:04
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
-- Base de données : `rattrapage_web`
--

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

CREATE TABLE `genre` (
  `ID_GENRE` int(11) NOT NULL,
  `NOM_GENRE` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `genre`
--

INSERT INTO `genre` (`ID_GENRE`, `NOM_GENRE`) VALUES
(1, ' Nouvelle'),
(2, 'Science-fiction'),
(3, 'Fiction contemporaine'),
(4, 'Littérature classique'),
(5, 'Fantasy'),
(6, 'Policier'),
(7, 'Thriller'),
(8, 'Romance'),
(9, 'Horreur'),
(10, 'Historique'),
(11, 'Biographie'),
(12, 'Autobiographie'),
(13, 'Non-fiction'),
(14, ' Jeunesse'),
(15, 'Poésie'),
(16, 'Théâtre'),
(17, 'Essai'),
(18, 'Guide pratique'),
(19, 'Bande dessinée'),
(20, 'Manga'),
(26, 'Littérature classique'),
(27, 'Littérature classique');

-- --------------------------------------------------------

--
-- Structure de la table `genre_like`
--

CREATE TABLE `genre_like` (
  `ID_USER` int(11) NOT NULL,
  `ID_GENRE` int(11) NOT NULL,
  `COMPTEUR` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `genre_like`
--

INSERT INTO `genre_like` (`ID_USER`, `ID_GENRE`, `COMPTEUR`) VALUES
(6, 4, 1),
(6, 20, 1),
(7, 3, 1),
(10, 4, 1),
(10, 6, 1),
(10, 17, 1),
(11, 4, 1),
(11, 7, 1),
(11, 19, 1),
(12, 4, 1),
(12, 9, 1),
(12, 10, 1);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `ID_USER` int(11) NOT NULL,
  `PRENOM` varchar(50) DEFAULT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `PASSWORD` varchar(319) DEFAULT NULL,
  `NOM` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`ID_USER`, `PRENOM`, `EMAIL`, `PASSWORD`, `NOM`) VALUES
(6, 'doe', 'john.doe@viacesi.fr', '$2y$10$wN3OcAeGSAe.nfhbO7ZEBOCKv8X6wHT87GwAUiKFcrvqIs56367CS', 'john'),
(7, 'doe', 'john.doe@viacesi.fra', '$2y$10$jQ5j34zryRFpOwrx/2uQUO.yuTnwczXBTUMKGMeJ5krJ4DYBaN5/K', 'john'),
(10, 'maxime', 'aa@viacesi.fr', '$2y$10$M77GHet4cWD0dI.VGXwR3uPfLHxKicZWbgBiCqysoBGHsWJrn82Sa', 'BOULMEa'),
(11, 'fabg', 'fab0277@outlook.fraaaa', '$2y$10$rAV7tvS0dMGCnfuA6zDddeO9mYY39jSuyRqBZ8a4sRuD68nwIj97q', 'fabg'),
(12, 'marchal', 'marchal.pedra@gmail.com', '$2y$10$aXfsNIjWb/.i/WAQnu3BXuV/xlQA/k2ZcLHb29IYvwc0jfVB3hwNm', 'pedro');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`ID_GENRE`);

--
-- Index pour la table `genre_like`
--
ALTER TABLE `genre_like`
  ADD PRIMARY KEY (`ID_USER`,`ID_GENRE`),
  ADD KEY `ID_GENRE` (`ID_GENRE`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`ID_USER`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `genre`
--
ALTER TABLE `genre`
  MODIFY `ID_GENRE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `ID_USER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `genre_like`
--
ALTER TABLE `genre_like`
  ADD CONSTRAINT `genre_like_ibfk_1` FOREIGN KEY (`ID_USER`) REFERENCES `utilisateur` (`ID_USER`),
  ADD CONSTRAINT `genre_like_ibfk_2` FOREIGN KEY (`ID_GENRE`) REFERENCES `genre` (`ID_GENRE`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
