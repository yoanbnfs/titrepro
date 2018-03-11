-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Dim 11 Mars 2018 à 23:01
-- Version du serveur :  5.7.21-0ubuntu0.17.10.1
-- Version de PHP :  7.1.11-0ubuntu0.17.10.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projetpro`
--

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `birthdate` date NOT NULL,
  `mail` varchar(40) NOT NULL,
  `password` varchar(70) NOT NULL,
  `confirmation_token` varchar(70) DEFAULT NULL,
  `confirmed_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `lastname`, `firstname`, `birthdate`, `mail`, `password`, `confirmation_token`, `confirmed_at`) VALUES
(17, 'BONNEFIS', 'Yoan', '1991-11-12', 'yoan.bonnefis@gmail.com', '$2y$10$oTvU/lfXGp4JkcJk/N8QxO2RHJ1Xqs55Z6CJEkGpzEpZKYqvH5n4i', '$2y$10$xvLUHby3hGmzdUlvxj0WgOpffVhCAtmbf4Ub2zSyjr7VOEVo5gGM6', '2018-03-02 13:58:24'),
(18, 'dzdz', 'cfefee', '2018-03-15', 'zazaz@dzd.fr', '$2y$10$7.1FMxSqJqql3r8gCu6zTOwBFCX56uJq3phMyugyVlvJCmet3DKSK', '$2y$10$ea7gc5ICDS7wbpRr3LNz7eX3bVy3fDkJAyVHpkCm.cOXwwWObDjcy', NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
