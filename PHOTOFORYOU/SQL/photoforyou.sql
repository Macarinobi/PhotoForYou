-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 22 mai 2023 à 20:17
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `photoforyou`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `motdepasse` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `pseudo`, `email`, `motdepasse`) VALUES
(0, 'Macarina', 'macarina@admin.com', 'photoforyou&#8354');

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prix` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `image`, `nom`, `prix`, `description`) VALUES
(1, 'https://www.google.com/imgres?imgurl=https%3A%2F%2Fwww.monogramparis.com%2F282704-large_default%2Falma-cuir-vernis-rouge-louis-vuitton.jpg&tbnid=4BK5Mu50uqEM9M&vet=12ahUKEwjdw-PZ4-f-AhWCrEwKHfMSA48QMygBegUIARD8Ag..i&imgrefurl=https%3A%2F%2Fwww.monogramparis.com%2Ffr%2Fsacs-louis-vuitton%2F58356-alma-cuir-vernis-rouge-louis-vuitton.html&docid=0MOUtEFtIzMnKM&w=800&h=800&q=sac%20louis%20vuitton&hl=fr&ved=2ahUKEwjdw-PZ4-f-AhWCrEwKHfMSA48QMygBegUIARD8Ag', 'sac luis vuitton rouge', 200, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi est quibusdam amet, mollitia distinctio illo officiis quisquam, doloribus expedita maiores, eius laboriosam alias reiciendis deleniti suscipit sed nisi sint repudiandae?'),
(2, 'https://www.google.com/url?sa=i&url=https%3A%2F%2Ffr.louisvuitton.com%2Ffra-fr%2Fproduits%2Fsac-petit-palais-bicolor-monogram-empreinte-leather-nvprod3100083v%2FM58914&psig=AOvVaw0ZjQXVHot1sXPrHpEwd3rB&ust=1683705704042000&source=images&cd=vfe&ved=0CAwQjRxqFwoTCKi_uNbi5_4CFQAAAAAdAAAAABAG', 'Bébé dragon', 390, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi est quibusdam amet, mollitia distinctio illo officiis quisquam,doloribus expedita maiores, eius laboriosam alias reiciendis deleniti suscipit sed nisi sint repudiandae?');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
