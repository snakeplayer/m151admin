-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 14 Octobre 2015 à 12:57
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `m151admin`
--

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `dateNaissance` date NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `pseudo` varchar(30) NOT NULL,
  `pwd` varchar(100) NOT NULL,
  PRIMARY KEY (`idUser`),
  UNIQUE KEY `email` (`email`,`pseudo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`idUser`, `nom`, `prenom`, `dateNaissance`, `description`, `email`, `pseudo`, `pwd`) VALUES
(16, 'Chauche', 'Benoite', '2015-09-08', 'descripitoiom', 'chauche.benoit@gmail.com', 'pseudo', 'motdepasse'),
(17, 'Swagg', 'asdasd', '2015-09-01', 'asdsad', 'benoit.chch@eduge.ch', 'sadsadsadsa', 'asdadsadsa'),
(18, 'gfhgf', 'gfhgf', '2015-09-07', 'fghgf', 'fghgf@fdsgd.cg', 'dsfdsd', '0e2ec11cdf82fa49b5c35dfd9d6a654923ee36db');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
