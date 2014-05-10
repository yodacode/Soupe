-- phpMyAdmin SQL Dump
-- version 4.1.13
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Sam 10 Mai 2014 à 12:20
-- Version du serveur :  5.6.17
-- Version de PHP :  5.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `places`
--

-- --------------------------------------------------------

--
-- Structure de la table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `code` varchar(2) NOT NULL,
  `continent` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `country`
--

INSERT INTO `country` (`id`, `name`, `code`, `continent`) VALUES
(3, 'France', 'FR', 'Europe'),
(4, 'Espagne', 'ES', 'Europe'),
(6, 'Italie', 'IT', 'Europe');

-- --------------------------------------------------------

--
-- Structure de la table `place`
--

CREATE TABLE IF NOT EXISTS `place` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `description` varchar(500) NOT NULL,
  `latitude` float DEFAULT NULL,
  `longitude` float DEFAULT NULL,
  `town_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `city_id` (`town_id`),
  KEY `town_id` (`town_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

--
-- Contenu de la table `place`
--

INSERT INTO `place` (`id`, `name`, `address`, `description`, `latitude`, `longitude`, `town_id`) VALUES
(2, 'Trocadero ', 'Place du Trocadero et du 11 Novembre, Paris, France', 'Un endroit ou il y a beaucoup de touristes', 48.8629, 2.28641, 2),
(3, 'Tour de Pise', 'Tour de Pise, Piazza del Duomo, Pise, Italie', 'Une tour chelou qui est toute tordu', 43.723, 10.3966, 9),
(34, 'La Rambla', 'La Rambla, Barcelona, Spain', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo', 41.3803, 2.17416, 7),
(35, 'Checa', 'Chueca, Madrid, Spain', 'incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,', 40.4229, -3.69761, 4),
(36, 'Musee du Prado', 'Musee du Prado, Paseo del Prado, Madrid, Spain', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod', 40.4229, -3.69761, 4),
(37, 'The Eiffel Tower', 'The Eiffel Tower, Avenue Anatole France, Paris, France', ' sit amet, consectetur adipisicing elit, sed do eiusmod sit amet, consectetur adipisicing elit, sed do eiusmod', 40.4229, -3.69761, 2),
(38, 'Le Colisee', 'Le Colise, Piazza del Colosseo, Rome, Italy', ' sit amet, consectetur adipisicing elit, sed do eiusmod sit amet, consectetur adipisicing elit, sed do eiusmod', 40.4229, -3.69761, 8),
(39, 'Le Louvre', 'Louvre Museum, Paris, France', ' sit amet, consectetur adipisicing elit, sed do eiusmod sit amet, consectetur adipisicing elit, sed do eiusmod', 48.8606, 2.33764, 2);

-- --------------------------------------------------------

--
-- Structure de la table `town`
--

CREATE TABLE IF NOT EXISTS `town` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `population` int(11) DEFAULT NULL,
  `country_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `country_id` (`country_id`),
  KEY `country_id_2` (`country_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `town`
--

INSERT INTO `town` (`id`, `name`, `population`, `country_id`) VALUES
(1, 'Marseille', 100000, 3),
(2, 'Paris', 4500000, 3),
(4, 'Madrid', 70000, 4),
(7, 'Barcelone', 560000, 4),
(8, 'Rome', 450000, 6),
(9, 'Pise', 123000, 6);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `place`
--
ALTER TABLE `place`
  ADD CONSTRAINT `place_ibfk_1` FOREIGN KEY (`town_id`) REFERENCES `town` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Contraintes pour la table `town`
--
ALTER TABLE `town`
  ADD CONSTRAINT `town_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
