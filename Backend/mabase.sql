-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 05 juin 2023 à 10:27
-- Version du serveur : 10.4.20-MariaDB
-- Version de PHP : 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bf_arabe`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `login` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`login`, `pass`) VALUES
('admin', 'pwdadmin');

-- --------------------------------------------------------

--
-- Structure de la table `cycle`
--

CREATE TABLE `cycle` (
  `id` int(20) NOT NULL,
 
  `theme` varchar(150) CHARACTER SET utf8 NOT NULL,
  `date_deb` date NOT NULL,
  `date_fin` date NOT NULL,
  `form` varchar(100) CHARACTER SET utf8 NOT NULL,
  
  `num_salle` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `cycle`
--

INSERT INTO `cycle` (`id`, `theme`, `date_deb`, `date_fin`, `form`, `num_salle`) 
VALUES (13, 'datascience', '2002-03-15', '2023-03-16', 'Arij', 7);


-- --------------------------------------------------------

--
-- Structure de la table `formateur`
--

CREATE TABLE `formatteur` (
  `id` int(10) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `nom_prenom` varchar(100) CHARACTER SET utf8 NOT NULL,
  `specialite` varchar(150) CHARACTER SET utf8 NOT NULL
 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `formateur`
--

INSERT INTO `formatteur` (`id`, `nom_prenom`, `specialite` ) VALUES
(4, 'Saadaoui', 'datascience');

-- --------------------------------------------------------

--
-- Structure de la table `participant`
--

CREATE TABLE `participant` (
  `id` int(10) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `nom_prenom` varchar(100) CHARACTER SET utf8 NOT NULL,
  /*`entreprise` varchar(100) CHARACTER SET utf8 NOT NULL,
  `tel_fix` int(10) NOT NULL,
  `fax` int(10) NOT NULL,
  `tel_port` int(10) NOT NULL,
  */
  `mail` varchar(100) CHARACTER SET utf8 NOT NULL,
  `theme_part` varchar(150) CHARACTER SET utf8 NOT NULL,
  `num_salle` int(5) NOT NULL,
  `date_debut` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1256 COLLATE=cp1256_bin;

--
-- Déchargement des données de la table `participant`
--

/*INSERT INTO `participant` (`id`,`pass`, `nom_prenom`, `entreprise`, `tel_fix`, `fax`, `tel_port`, `mail`, `theme_part`, `num_salle`, `date_debut`) VALUES
(68, 'mypass','محمد بن صالح', ' شركة الكهرباء و الغاز', 71456456, 71654654, 99456123, 'msalah@gmail.com', 'رشاد', 7, '2023-03-14'),
(69, 'منال البجاوي', ' رئاسة الحكومة', 99562365, 71546585, 71452589, 'hhh@gmail.com', 'رشاد', 1, '2023-04-17');
*/
INSERT INTO `participant` (`id`,`pass`, `nom_prenom`,  `mail`, `theme_part`, `num_salle`, `date_debut`) VALUES
(68, 'mypass','محمد بن صالح',  7, '2023-03-14')
INSERT INTO `participant` (`pass`, `nom_prenom`,  `mail`, `theme_part`, `num_salle`, `date_debut`) VALUES
('mypwd','Arij','saadaarij2002@gmail.com','datascience',7,'15-03-2002')

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cycle`
--
ALTER TABLE `cycle`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `formateur`
--
ALTER TABLE `formatteur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `participant`
--
ALTER TABLE `participant`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cycle`
--
ALTER TABLE `cycle`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `formateur`
--
ALTER TABLE `formatteur`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `participant`
--
ALTER TABLE `participant`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
