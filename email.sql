-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Sam 02 Février 2013 à 08:05
-- Version du serveur: 5.1.57
-- Version de PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `email`
--

-- --------------------------------------------------------

--
-- Structure de la table `emails`
--

CREATE TABLE IF NOT EXISTS `emails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `add_from` varchar(128) DEFAULT NULL,
  `subject` varchar(128) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `website` varchar(128) DEFAULT NULL,
  `facebook` varchar(128) DEFAULT NULL,
  `survey` varchar(128) DEFAULT NULL,
  `contact_info` varchar(255) DEFAULT NULL,
  `logo` longblob,
  `background` longblob,
  `header` longblob,
  `footer` longblob,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `emails`
--


-- --------------------------------------------------------

--
-- Structure de la table `jarvis_users`
--

CREATE TABLE IF NOT EXISTS `jarvis_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_address` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `password` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`,`email_address`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Contenu de la table `jarvis_users`
--

INSERT INTO `jarvis_users` (`id`, `username`, `first_name`, `last_name`, `email_address`, `address`, `password`) VALUES
(1, 'quoccuong88', 'Quoc-Cuong', 'Do', 'quoccuong88@gmail.com', '116 rue Tronchet\r\n69000 Lyon\r\nFrance', '457f3bfc835cd41042e484f93aaceb4b69131f24'),
(3, 'usertest2', 'usertest2', 'usertest2', 'usertest2@gmail.com', 'usertest2', 'ac3ffc49de7643609e8b4b7fbddb04cc85830b54'),
(4, 'usertest3', 'usertest3', 'usertest3', 'usertest3@gmail.com', 'usertest3', '60bedaf39dec7930972d94f19d33101da15de59a'),
(5, 'usertest4', 'usertest4', 'usertest4', 'usertest4@gmail.com', 'usertest4', '90322a40dc3e2a20b94bf842f4ec6f1c9c6aee38');

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `questions`
--

INSERT INTO `questions` (`id`, `name`, `content`) VALUES
(4, 'question 4', 'what is your name ?'),
(6, 'question 1', 'How are you?');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_address` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `password` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`,`email_address`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `first_name`, `last_name`, `email_address`, `address`, `password`) VALUES
(1, 'quoccuong88', 'Quoc-Cuong', 'Do', 'quoccuong88@gmail.com', '116 rue Tronchet\r\n69000 Lyon\r\nFrance', '457f3bfc835cd41042e484f93aaceb4b69131f24'),
(3, 'usertest2', 'usertest2', 'usertest2', 'usertest2@gmail.com', 'usertest2', 'ac3ffc49de7643609e8b4b7fbddb04cc85830b54'),
(4, 'usertest3', 'usertest3', 'usertest3', 'usertest3@gmail.com', 'usertest3', '60bedaf39dec7930972d94f19d33101da15de59a'),
(5, 'usertest4', 'usertest4', 'usertest4', 'usertest4@gmail.com', 'usertest4', '90322a40dc3e2a20b94bf842f4ec6f1c9c6aee38');
