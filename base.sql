-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mar. 04 juin 2024 à 12:32
-- Version du serveur : 10.11.7-MariaDB-2ubuntu2
-- Version de PHP : 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projetweb`
--

-- --------------------------------------------------------

--
-- Structure de la table `Exercice`
--

CREATE TABLE `Exercice` (
  `ExerciceID` int(11) NOT NULL,
  `NomExercice` text NOT NULL,
  `DescriptionExercice` text DEFAULT NULL,
  `MuscleID` int(11) NOT NULL,
  `ProgrammeID` int(11) NOT NULL,
  `Charge` int(11) DEFAULT NULL,
  `Repetitions` int(11) DEFAULT NULL,
  `Series` int(11) DEFAULT NULL,
  `MachineID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Machine`
--

CREATE TABLE `Machine` (
  `MachineID` int(11) NOT NULL,
  `NomMachine` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Muscle`
--

CREATE TABLE `Muscle` (
  `MuscleID` int(11) NOT NULL,
  `NomMuscle` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Muscle`
--

INSERT INTO `Muscle` (`MuscleID`, `NomMuscle`) VALUES
(1, 'Grand Dorsal'),
(2, 'Epaules'),
(3, 'Trapezes'),
(4, 'Biceps'),
(5, 'Triceps'),
(6, 'Lombers'),
(7, 'Abdominaux'),
(8, 'Pectoraux'),
(9, 'Ischio-Jambiers'),
(10, 'Cuisse'),
(11, 'Adducteurs'),
(12, 'Abducteurs'),
(13, 'Mollets'),
(14, 'Hanche'),
(15, 'Fessier');

-- --------------------------------------------------------

--
-- Structure de la table `Programme`
--

CREATE TABLE `Programme` (
  `ProgrammeID` int(11) NOT NULL,
  `NomProgramme` text NOT NULL,
  `DescriptionProgramme` text NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `User`
--

CREATE TABLE `User` (
  `UserID` int(11) NOT NULL,
  `pseudo` text NOT NULL,
  `mdp` text NOT NULL,
  `blacklist` int(11) NOT NULL,
  `admin` int(11) NOT NULL,
  `connecte` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Exercice`
--
ALTER TABLE `Exercice`
  ADD PRIMARY KEY (`ExerciceID`),
  ADD KEY `MuscleID` (`MuscleID`),
  ADD KEY `ProgrammeID` (`ProgrammeID`),
  ADD KEY `MachineID` (`MachineID`);

--
-- Index pour la table `Machine`
--
ALTER TABLE `Machine`
  ADD PRIMARY KEY (`MachineID`);

--
-- Index pour la table `Muscle`
--
ALTER TABLE `Muscle`
  ADD PRIMARY KEY (`MuscleID`);

--
-- Index pour la table `Programme`
--
ALTER TABLE `Programme`
  ADD PRIMARY KEY (`ProgrammeID`),
  ADD KEY `UserID` (`UserID`);

--
-- Index pour la table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Exercice`
--
ALTER TABLE `Exercice`
  MODIFY `ExerciceID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Machine`
--
ALTER TABLE `Machine`
  MODIFY `MachineID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Muscle`
--
ALTER TABLE `Muscle`
  MODIFY `MuscleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `Programme`
--
ALTER TABLE `Programme`
  MODIFY `ProgrammeID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `User`
--
ALTER TABLE `User`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Exercice`
--
ALTER TABLE `Exercice`
  ADD CONSTRAINT `Exercice_ibfk_1` FOREIGN KEY (`MuscleID`) REFERENCES `Muscle` (`MuscleID`),
  ADD CONSTRAINT `Exercice_ibfk_2` FOREIGN KEY (`ProgrammeID`) REFERENCES `Programme` (`ProgrammeID`),
  ADD CONSTRAINT `Exercice_ibfk_3` FOREIGN KEY (`MachineID`) REFERENCES `Machine` (`MachineID`);

--
-- Contraintes pour la table `Programme`
--
ALTER TABLE `Programme`
  ADD CONSTRAINT `Programme_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `User` (`UserID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
