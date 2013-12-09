

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de donnees: `M5F`
--
CREATE DATABASE IF NOT EXISTS `M5F` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `M5F`;

-- --------------------------------------------------------

--
-- Structure de la table `M5F_categorie`
--

CREATE TABLE IF NOT EXISTS `M5F_categorie` (
  `idCat` int(11) NOT NULL AUTO_INCREMENT,
  `nomCat` varchar(120) NOT NULL,
  PRIMARY KEY (`idCat`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;


-- --------------------------------------------------------

--
-- Structure de la table `M5F_document`
--

CREATE TABLE IF NOT EXISTS `M5F_document` (
  `idDoc` int(11) NOT NULL AUTO_INCREMENT,
  `intituleDoc` varchar(60) NOT NULL,
  `date` date NOT NULL,
  `description` text NOT NULL,
  `validee` tinyint(1) NOT NULL,
  `exemple` text NOT NULL,
  `idSousCat` int(11) NOT NULL,
  PRIMARY KEY (`idDoc`),
  KEY `FK_M5F_document_idSousCat` (`idSousCat`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;



-- --------------------------------------------------------

--
-- Structure de la table `M5F_message`
--

CREATE TABLE IF NOT EXISTS `M5F_message` (
  `idMessage` int(11) NOT NULL AUTO_INCREMENT,
  `intitule` varchar(120) NOT NULL,
  `contenu` varchar(120) NOT NULL,
  `date` varchar(120) NOT NULL,
  `etat` varchar(120) NOT NULL,
  `commentaires` varchar(120) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idSousCat` int(11) NOT NULL,
  PRIMARY KEY (`idCat`),
   KEY `FK_M5F_message_idSousCat` (`idSousCat`),
    KEY `FK_M5F_message_idUser` (`idUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;


-- --------------------------------------------------------

--
-- Structure de la table `M5F_contact`
--

CREATE TABLE IF NOT EXISTS `M5F_contact` (
  `idFormContact` int(11) NOT NULL AUTO_INCREMENT,
  `objet` varchar(120) NOT NULL,
  `contenu` varchar(120) NOT NULL,
  `date` varchar(120) NOT NULL,
  `idUser` int(11) NOT NULL,
  PRIMARY KEY (`idFormContact`),
    KEY `FK_M5F_message_idUser` (`idUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;


-- --------------------------------------------------------
--
-- Structure de la table `M5F_tmp`
--

CREATE TABLE IF NOT EXISTS `M5F_tmp` (
  `idTmp` int(11) NOT NULL AUTO_INCREMENT,
  `intituleTmp` varchar(100) NOT NULL,
  `descriptionTmp` varchar(300) NOT NULL,
  `dateTmp` date NOT NULL,
  `descriptionTmp` text NOT NULL,
  `valideeTmp` tinyint(1) NOT NULL,
  `exempleTmp` varchar(300) NOT NULL,
  `idSousCat` int(20) NOT NULL,
  PRIMARY KEY (`id_doc_tmp`),
  KEY `FK_M5F_tmp_idSousCat` (`idSousCat`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;


-- --------------------------------------------------------

--
-- Structure de la table `M5F_sous_categorie`
--

CREATE TABLE IF NOT EXISTS `M5F_sous_categorie` (
  `idSousCat` int(11) NOT NULL AUTO_INCREMENT,
  `nomSousCat` varchar(60) NOT NULL,
  `idCat` int(11) NOT NULL,
  PRIMARY KEY (`idSousCat`),
  KEY `FK_M5F_sous_categorie_idCat` (`idCat`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;


-- --------------------------------------------------------

--
-- Structure de la table `M5F_user`
--

CREATE TABLE IF NOT EXISTS `M5F_user` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(20) NOT NULL,
  `mdp` varchar(20) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `fonction` varchar(40) NOT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;



--
-- Contraintes pour les tables exportées
--


--
-- Contraintes pour la table `M5F_message`
--
ALTER TABLE `M5F_message`
  ADD CONSTRAINT `FK_M5F_message_idUser` FOREIGN KEY (`idUser`) REFERENCES `M5F_user` (`idUser`);
ALTER TABLE `M5F_message`
  ADD CONSTRAINT `FK_M5F_message_idSousCat` FOREIGN KEY (`idSousCat`) REFERENCES `M5F_sous_categorie` (`idSousCat`);
--
-- Contraintes pour la table `M5F_document`
--
ALTER TABLE `M5F_document`
  ADD CONSTRAINT `FK_M5F_document_idSousCat` FOREIGN KEY (`idSousCat`) REFERENCES `M5F_sous_categorie` (`idSousCat`);

  --
-- Contraintes pour la table `M5F_contact`
--
ALTER TABLE `M5F_contact`
  ADD CONSTRAINT `FK_M5F_contact_idUser` FOREIGN KEY (`idUser`) REFERENCES `M5F_user` (`idUser`);

--
-- Contraintes pour la table `M5F_tmp`
--
ALTER TABLE `M5F_tmp`
  ADD CONSTRAINT `FK_M5F_tmp_idSousCat` FOREIGN KEY (`idSousCat`) REFERENCES `M5F_sous_categorie` (`idSousCat`);

--
-- Contraintes pour la table `M5F_sous_categorie`
--
ALTER TABLE `M5F_sous_categorie`
  ADD CONSTRAINT `FK_M5F_sous_categorie_idCat` FOREIGN KEY (`idCat`) REFERENCES `M5F_categorie` (`idCat`);


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
