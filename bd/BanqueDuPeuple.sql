-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 27 Juin 2019 à 17:34
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `finance_gl`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cni` varchar(30) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(40) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `tel` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cni` (`cni`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`id`, `cni`, `nom`, `prenom`, `adresse`, `tel`) VALUES
(1, 'cni_cni', 'VICH', 'Tito', 'Medina', '774988948');

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

CREATE TABLE IF NOT EXISTS `compte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero` varchar(25) NOT NULL,
  `dateCreation` varchar(10) NOT NULL,
  `solde` int(11) NOT NULL DEFAULT '0',
  `idClient` int(11) NOT NULL,
  `idGestCompte` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `numero` (`numero`),
  KEY `idClient` (`idClient`),
  KEY `idGestCompte` (`idGestCompte`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Contenu de la table `compte`
--

INSERT INTO `compte` (`id`, `numero`, `dateCreation`, `solde`, `idClient`, `idGestCompte`) VALUES
(1, 'FSN_27062019_C1', '27-06-2019', 5000, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `operation`
--

CREATE TABLE IF NOT EXISTS `operation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero` varchar(20) NOT NULL,
  `dateOperation` varchar(10) NOT NULL,
  `montant` int(11) NOT NULL,
  `idCompte` int(11) NOT NULL,
  `idTypeOpe` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `numero` (`numero`),
  KEY `idCompte` (`idCompte`),
  KEY `idTypeOpe` (`idTypeOpe`),
  KEY `idUser` (`idUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `operation`
--

INSERT INTO `operation` (`id`, `numero`, `dateOperation`, `montant`, `idCompte`, `idTypeOpe`, `idUser`) VALUES
(1, 'FSN_27062019_OP1', '27-06-2019', 5000, 1, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `typeoperation`
--

CREATE TABLE IF NOT EXISTS `typeoperation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nom` (`nom`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `typeoperation`
--

INSERT INTO `typeoperation` (`id`, `nom`) VALUES
(1, 'depot'),
(2, 'retrait');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `profil` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `login`, `password`, `profil`) VALUES
(1, 'VICH', 'Tito', 'vich', 'passer2019', 'admin'),
(2, 'Bachir', 'bcr', 'bcr', 'passer', 'caissier');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `compte`
--
ALTER TABLE `compte`
  ADD CONSTRAINT `compte_ibfk_1` FOREIGN KEY (`idClient`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `compte_ibfk_2` FOREIGN KEY (`idGestCompte`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `operation`
--
ALTER TABLE `operation`
  ADD CONSTRAINT `operation_ibfk_4` FOREIGN KEY (`idTypeOpe`) REFERENCES `typeoperation` (`id`),
  ADD CONSTRAINT `operation_ibfk_1` FOREIGN KEY (`idCompte`) REFERENCES `compte` (`id`),
  ADD CONSTRAINT `operation_ibfk_3` FOREIGN KEY (`idUser`) REFERENCES `utilisateur` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
