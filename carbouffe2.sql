-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Sam 18 Novembre 2017 à 12:53
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `carbouffe2`
--
CREATE DATABASE IF NOT EXISTS `carbouffe2` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `carbouffe2`;

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `n_admin` int(11) NOT NULL AUTO_INCREMENT,
  `nom_admin` varchar(50) NOT NULL,
  `prenom_admin` varchar(50) NOT NULL,
  `login_admin` varchar(50) NOT NULL,
  `mdp_admin` text NOT NULL,
  PRIMARY KEY (`n_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`n_admin`, `nom_admin`, `prenom_admin`, `login_admin`, `mdp_admin`) VALUES
(1, 'bob', 'bob', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `n_cat` int(5) NOT NULL AUTO_INCREMENT,
  `nom_cat` varchar(25) DEFAULT NULL,
  `descrip_cat` text,
  `photo_cat` text,
  PRIMARY KEY (`n_cat`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`n_cat`, `nom_cat`, `descrip_cat`, `photo_cat`) VALUES
(1, 'boissons', 'Boissons alcool et sans alcool', 'boissons.jpg'),
(2, 'fruits', 'Fruits et légumes frais de saison              ', 'fruits.jpg'),
(3, 'informatiques', 'Composant et périphériques PC', 'informatiques.jpg'),
(4, 'surgeles', 'Différents produits salés ou sucrés', 'surgeles.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `n_client` int(5) NOT NULL AUTO_INCREMENT,
  `nom_client` varchar(25) DEFAULT NULL,
  `prenom_client` varchar(25) DEFAULT NULL,
  `adr_client` varchar(50) DEFAULT NULL,
  `cp_client` varchar(5) DEFAULT NULL,
  `tel_client` varchar(10) DEFAULT NULL,
  `login_client` varchar(25) DEFAULT NULL,
  `mdp_client` text,
  PRIMARY KEY (`n_client`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Contenu de la table `clients`
--

INSERT INTO `clients` (`n_client`, `nom_client`, `prenom_client`, `adr_client`, `cp_client`, `tel_client`, `login_client`, `mdp_client`) VALUES
(5, 'romain', 'romain', 'chemin sud', '97400', '999', 'romain', 'b8aabb4b95c817d9df69b6be95b2b94d6b1efe17'),
(6, NULL, NULL, NULL, NULL, NULL, 't', '8efd86fb78a56a5145ed7739dcb00c78581c5375');

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

DROP TABLE IF EXISTS `commandes`;
CREATE TABLE IF NOT EXISTS `commandes` (
  `n_commande` int(5) NOT NULL AUTO_INCREMENT,
  `montant_commande` decimal(15,2) DEFAULT NULL,
  `date_commande` datetime DEFAULT NULL,
  `panier_commande` int(1) NOT NULL,
  `n_client` int(5) DEFAULT NULL,
  PRIMARY KEY (`n_commande`),
  KEY `FK_commandes_n_client` (`n_client`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=55 ;

-- --------------------------------------------------------

--
-- Structure de la table `composer`
--

DROP TABLE IF EXISTS `composer`;
CREATE TABLE IF NOT EXISTS `composer` (
  `qte_prod` int(5) DEFAULT NULL,
  `n_commande` int(5) NOT NULL,
  `n_prod` int(5) NOT NULL,
  PRIMARY KEY (`n_commande`,`n_prod`),
  KEY `FK_composer_n_prod` (`n_prod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `n_prod` int(5) NOT NULL AUTO_INCREMENT,
  `nom_prod` varchar(25) DEFAULT NULL,
  `prix_prod` decimal(15,2) DEFAULT NULL,
  `descrip_prod` text,
  `photo_prod` text,
  `id_sous_cat` int(5) DEFAULT NULL,
  PRIMARY KEY (`n_prod`),
  KEY `FK_produits_id_sous_cat` (`id_sous_cat`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Contenu de la table `produits`
--

INSERT INTO `produits` (`n_prod`, `nom_prod`, `prix_prod`, `descrip_prod`, `photo_prod`, `id_sous_cat`) VALUES
(1, 'Coca cola', '2.00', 'Boisson gazeuse sucrée (soda) de type cola fabriquée par Coca-Cola Company.', 'coca.png', 2),
(2, 'Eau', '1.00', 'Eau plate de la société du groupe suisse Nestlé', 'eau.png', 2),
(3, 'Lipton', '1.50', 'Thé glacé saveur abricot', 'lipton.png', 2),
(5, 'Orangina', '0.50', 'Boisson carbonatée (gazeuse) non alcoolisée faite à partir d''oranges et de citrons', 'orangina.png', 2),
(6, 'Avocat', '4.00', 'Fruit d’un arbre originaire d’Amérique centrale et du Sud, l’avocat est prisé pour sa chair tendre comme du beurre.', 'avocat.png', 3),
(7, 'Laitue', '1.00', 'La laitue est une plante de la famille des herbacées.', 'laitue.png', 4),
(8, 'Litchi', '2.00', 'Le letchi est un fruit originaire de Chine. Il s’agit d’une petite sphère rouge à maturité. Seule sa chair de couleur blanche est comestible', 'litchi.png', 3),
(9, 'Mangue', '1.00', 'La mangue est le fruit du manguier, grand arbre tropical de la famille des Anacardiaceae, originaire des forêts d''Inde, du Pakistan et de la Birmanie où il pousse encore à l''état sauvage.', 'mangue.png', 3),
(10, 'Orange', '2.00', 'L’orange est un agrume, fruit des orangers, des arbres de différentes espèces de la famille des Rutacées ou d''hybrides de ceux-ci.', 'orange.png', 3),
(11, 'Poivron', '3.00', 'Le poivron est un groupe de cultivars de l''espèce Capsicum annuum', 'poivron.png', 4),
(18, 'Clavier Elite K-9', '20.00', 'Avec un design ultra-gaming et une excellente ergonomie, le clavier de jeu Spirit of Gamer Elite-K9 est l''outil idéal pour vos occupations gaming ou numériques. Doté de 105 touches et 6 touches multimédia, ce clavier vous offre un excellent confort de jeu ainsi qu''un style unique rétro-éclairé pour un prix très abordable. ', 'clavier.png', 6),
(19, 'Ecran', '200.00', 'L’écran Dell 20 | E2016 de 19,5 pouces est doté de fonctionnalités essentielles, d’un format d’image de 16:10, d’un affichage ultralarge et a été soumis à des tests de fiabilité rigoureux.', 'ecran.png', 6),
(20, 'HDMI', '5.00', 'Les câbles HDMI 1.4 ont été étudiés pour répondre à la nouvelle norme du consortium HDMI. Ils autorisent le transport de signaux dit « ultra haute définition » jusqu''en 2160p (4k) et disposent d''un canal Ethernet permettant de faire accéder au réseau un téléviseur connecté en HDMI 1.4.', 'hdmi.png', 6),
(21, 'Imprimante', '50.00', 'Donnez vie à vos meilleurs souvenirs comme à vos plus belles réalisations photographiques grâce à cette imprimante moderne, performante et connectée. Elle intègre six réservoirs d''encre individuels dont une encre grise pour des tirages couleur ou noir et blanc exceptionnels.', 'imprimante.png', 6),
(22, 'Processeur Intel', '2000.00', 'Les Core i9 d''Intel incarnent les processeurs très haut de gamme d''Intel.', 'processeur.png', 5),
(23, 'Processeur AMD', '200.00', 'L''AMD Ryzen 5 1600 Wraith Spire Edition (3.2 GHz) est le nouveau processeur grand public d''AMD : 6 coeurs et 12 threads, fréquence jusqu''à 3.6 GHz, 16 Mo de cache L3 et seulement 65W de TDP ! Il est accompagné de son système de refroidissement ultra-efficace et silencieux AMD Wraith Spire.', 'processeur2.png', 5),
(24, 'Souris', '50.00', 'Légère et ergonomique, la Logitech G403 Prodigy Wired Gaming Mouse offre une expérience de jeu exceptionnelle. Jusqu''à 8 fois plus rapide qu''une souris standard, elle vous garantit une répercussion quasi instantanée des déplacements et des clics.', 'souris.png', 6),
(25, 'SSD Samsung', '250.00', 'Le disque Samsung SSD 850 PRO 512 Go révolutionne le monde du stockage. Basé sur une nouvelle technologie exclusive Samsung 3D Vertical NAND (V-NAND) , ce SSD nouvelle génération garantit hautes vitesses, grande fiabilité et performances constantes à long terme.', 'ssd.png', 5),
(27, 'Tour Gamer', '60.00', 'Spacieux et design, cette tour moyenne est idéal pour assembler un PC Gamer performant et bien refroidi. De nombreux ventilateurs, une circulation du flux d''air optimisée et des filtres à poussière permettent au système de fonctionner efficacement et sans surchauffe.', 'tour2.png', 5),
(28, 'Clé USB', '20.00', 'Plus vite vous pouvez transférer du contenu, plus vous pouvez commencer à vous amuser, ou travailler, rapidement. La clé USB SanDisk Ultra 3.0 de 32 Go offre des vitesses de lecture ultra-élevées allant jusqu''à 100 Mo/s.', 'usb.png', 6),
(32, 'Chocolat', '2.00', '2 Moelleux au chocolat caramel beurre salé', 'chocolat.png', 8),
(33, 'Crêpe', '3.00', '20 crêpes jambon emmental', 'crepe.png', 7),
(34, 'Mini-donut', '4.00', '12 mini-donuts aux sucre', 'donuts.png', 8),
(35, 'Glace', '2.00', 'Glace caramel beurre salé', 'glace.png', 8),
(36, 'Mars', '5.00', 'Mars au caramel beurre salé', 'mars.png', 8),
(37, 'Carotte', '2.00', 'La carotte est caractérisée par sa haute teneur en provitamine A ou carotène, c''est ce qui lui donne sa couleur. Le carotène a de nombreuses propriétés, notamment, il intervient dans le bon état des muqueuses, de la peau et de la vision crépusculaire.', 'carotte.png', 4),
(38, 'Radis', '6.00', 'Le radis compte parmi les premiers légumes cultivés par l’homme. Faible en calories, le radis est un des légumes les plus riches en vitamines.', 'radis.png', 4),
(39, 'Heineken', '2.00', 'La Heineken est une bière blonde de type Pale lager à 5 %. La première Heineken a été brassée en 1873. ', 'heineken.png', 1),
(40, 'Radler', '3.00', 'C''est une boisson alcoolisée jusqu''a 1%. Mélange entre un jus de citron et la bière dodo, elle est très appréciée des Réunionnais', 'radler.png', 1),
(41, 'Vin', '7.00', 'Vin Mascaron, de Bordeaux', 'vin.png', 1),
(42, 'Rhum Charette', '12.00', 'Le rhum blanc traditionnel charette est de loin le rhum le plus célèbre de la Réunion. Mélangé à des épices et à des fruits de saison, il est indissociable de la culture du rhum arrangé, mais aussi des recettes flambées et des pâtisserie d''antan.', 'rhum.png', 1),
(43, 'Cordon-Bleu', '1.00', 'Le cordon-bleu est un plat préparé avec une escalope roulée autour de jambon et de fromage, puis panée. On retrouve une origine du cordon-bleu en Suisse en tant qu''escalope viennoise farcie au fromage dans un livre de cuisine de 1949.', 'cordon-bleu.png', 7),
(44, 'Petit-four', '3.00', 'Mélange de petit four fines herbes, saumon, pizza royale, mousse de crevettes, tarte flambée, ...', 'petit-four.png', 7),
(45, 'Tartelettes', '5.00', 'Tartelettes apéritive constituées de pizza fromage, mousse de saumon et fines herbes', 'tartelettes.png', 7);

-- --------------------------------------------------------

--
-- Structure de la table `sous_categories`
--

DROP TABLE IF EXISTS `sous_categories`;
CREATE TABLE IF NOT EXISTS `sous_categories` (
  `id_sous_cat` int(5) NOT NULL AUTO_INCREMENT,
  `nom_sous_cat` varchar(25) DEFAULT NULL,
  `n_cat` int(5) DEFAULT NULL,
  PRIMARY KEY (`id_sous_cat`),
  KEY `FK_sous_categories_n_cat` (`n_cat`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `sous_categories`
--

INSERT INTO `sous_categories` (`id_sous_cat`, `nom_sous_cat`, `n_cat`) VALUES
(1, 'Alcool', 1),
(2, 'Sans-Alcool', 1),
(3, 'Fruits', 2),
(4, 'Légumes', 2),
(5, 'PC', 3),
(6, 'Périphériques', 3),
(7, 'Salés', 4),
(8, 'Sucrés', 4);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `FK_commandes_n_client` FOREIGN KEY (`n_client`) REFERENCES `clients` (`n_client`);

--
-- Contraintes pour la table `composer`
--
ALTER TABLE `composer`
  ADD CONSTRAINT `FK_composer_n_commande` FOREIGN KEY (`n_commande`) REFERENCES `commandes` (`n_commande`),
  ADD CONSTRAINT `FK_composer_n_prod` FOREIGN KEY (`n_prod`) REFERENCES `produits` (`n_prod`);

--
-- Contraintes pour la table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `FK_produits_id_sous_cat` FOREIGN KEY (`id_sous_cat`) REFERENCES `sous_categories` (`id_sous_cat`);

--
-- Contraintes pour la table `sous_categories`
--
ALTER TABLE `sous_categories`
  ADD CONSTRAINT `FK_sous_categories_n_cat` FOREIGN KEY (`n_cat`) REFERENCES `categories` (`n_cat`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
