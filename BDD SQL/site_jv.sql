-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 23 juil. 2023 à 14:17
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `site_jv`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

DROP TABLE IF EXISTS `administrateur`;
CREATE TABLE IF NOT EXISTS `administrateur` (
  `id_administrateur` int NOT NULL AUTO_INCREMENT,
  `email_administrateur` varchar(50) NOT NULL,
  `pass_administrateur` varchar(250) NOT NULL,
  `pseudo_administrateur` varchar(50) NOT NULL,
  `image_administrateur` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_administrateur`),
  UNIQUE KEY `email_administrateur` (`email_administrateur`),
  UNIQUE KEY `email_administrateur_2` (`email_administrateur`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`id_administrateur`, `email_administrateur`, `pass_administrateur`, `pseudo_administrateur`, `image_administrateur`) VALUES
(3, 'admin@example.com', '$2y$10$7Tjmy716Y22zLDWi68qGyuon7nOYtqTg79YM/K9t/HfidzylZmakS', 'ROBERT', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `id_joueur` int NOT NULL,
  `id_jeu` int NOT NULL,
  `date_commentaire` datetime NOT NULL,
  `notation_commentaire` int NOT NULL,
  `contenu_commentaire` text NOT NULL,
  PRIMARY KEY (`id_joueur`,`id_jeu`),
  KEY `id_jeu` (`id_jeu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `developpeur`
--

DROP TABLE IF EXISTS `developpeur`;
CREATE TABLE IF NOT EXISTS `developpeur` (
  `id_developpeur` int NOT NULL AUTO_INCREMENT,
  `nom_developpeur` varchar(100) NOT NULL,
  PRIMARY KEY (`id_developpeur`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `developpeur`
--

INSERT INTO `developpeur` (`id_developpeur`, `nom_developpeur`) VALUES
(1, 'Quatz'),
(2, 'Gabtype'),
(3, 'Kaymbo'),
(4, 'Oodoo'),
(5, 'Skyvu'),
(6, 'Rhynyx'),
(7, 'Mydo'),
(8, 'Zoomdog'),
(9, 'Bubblebox'),
(10, 'Flashpoint'),
(11, 'Cogilith'),
(12, 'Realcube'),
(13, 'Kwilith'),
(14, 'Brightbean'),
(15, 'Rhynyx'),
(16, 'Jetpulse'),
(17, 'Meevee'),
(18, 'Zoonder'),
(19, 'Blognation'),
(20, 'Gabtune');

-- --------------------------------------------------------

--
-- Structure de la table `editeur`
--

DROP TABLE IF EXISTS `editeur`;
CREATE TABLE IF NOT EXISTS `editeur` (
  `id_editeur` int NOT NULL AUTO_INCREMENT,
  `nom_editeur` varchar(100) NOT NULL,
  PRIMARY KEY (`id_editeur`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `editeur`
--

INSERT INTO `editeur` (`id_editeur`, `nom_editeur`) VALUES
(1, 'Bartell, Hane and Veum'),
(2, 'Swift, Hermann and Bashirian'),
(3, 'Conn Inc'),
(4, 'Huel Inc'),
(5, 'Crooks-Wyman'),
(6, 'Williamson-Bergstrom'),
(7, 'Baumbach-Welch'),
(8, 'VonRueden Group'),
(9, 'Hintz LLC'),
(10, 'Hane Inc'),
(11, 'Anderson and Sons'),
(12, 'Cassin, Bruen and Lang'),
(13, 'Jacobs, Haag and Kertzmann'),
(14, 'Greenholt, Bednar and Langosh'),
(15, 'Metz Inc'),
(16, 'Rohan-Kulas'),
(17, 'DuBuque, Maggio and Batz'),
(18, 'O\'Connell, Hackett and Mann'),
(19, 'Ward, Wisoky and Reynolds'),
(20, 'Weissnat, Kunde and Lueilwitz');

-- --------------------------------------------------------

--
-- Structure de la table `jeu`
--

DROP TABLE IF EXISTS `jeu`;
CREATE TABLE IF NOT EXISTS `jeu` (
  `id_jeu` int NOT NULL AUTO_INCREMENT,
  `nom_jeu` varchar(100) NOT NULL,
  `image_jeu` varchar(255) DEFAULT NULL,
  `date_jeu` date DEFAULT NULL,
  `sypnosis_jeu` text,
  `id_editeur` int NOT NULL,
  `id_developpeur` int NOT NULL,
  PRIMARY KEY (`id_jeu`),
  KEY `id_editeur` (`id_editeur`),
  KEY `id_developpeur` (`id_developpeur`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `jeu`
--

INSERT INTO `jeu` (`id_jeu`, `nom_jeu`, `image_jeu`, `date_jeu`, `sypnosis_jeu`, `id_editeur`, `id_developpeur`) VALUES
(1, 'NOM JEU', NULL, '2002-11-22', 'DESCRIPTION', 3, 3),
(2, 'Alphazap', 'http://dummyimage.com/131x100.png/dddddd/000000', '2000-05-31', 'Integer tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat.\r\n\r\nPraesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.', 14, 7),
(3, 'Otcom', 'http://dummyimage.com/146x100.png/ff4444/ffffff', '2009-05-19', 'Integer tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat.\r\n\r\nPraesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.', 17, 14),
(4, 'Home Ing', 'http://dummyimage.com/144x100.png/dddddd/000000', '2010-11-09', 'Fusce consequat. Nulla nisl. Nunc nisl.', 13, 18),
(5, 'Zamit', 'http://dummyimage.com/224x100.png/ff4444/ffffff', '2006-05-05', 'Maecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui.\r\n\r\nMaecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam. Suspendisse potenti.\r\n\r\nNullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris.', 8, 2),
(6, 'Overhold', 'http://dummyimage.com/152x100.png/dddddd/000000', '2010-12-17', 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus vestibulum sagittis sapien. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', 15, 17),
(7, 'Sub-Ex', 'http://dummyimage.com/189x100.png/dddddd/000000', '2013-06-03', 'Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus.', 17, 13),
(8, 'Kanlam', 'http://dummyimage.com/107x100.png/ff4444/ffffff', '2007-03-04', 'Sed sagittis. Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci. Nullam molestie nibh in lectus.', 9, 15),
(9, 'Trippledex', 'http://dummyimage.com/123x100.png/5fa2dd/ffffff', '1994-09-18', 'Mauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero.\r\n\r\nNullam sit amet turpis elementum ligula vehicula consequat. Morbi a ipsum. Integer a nibh.\r\n\r\nIn quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet.', 18, 13),
(10, 'Latlux', 'http://dummyimage.com/142x100.png/5fa2dd/ffffff', '2005-06-04', 'Sed sagittis. Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci. Nullam molestie nibh in lectus.\r\n\r\nPellentesque at nulla. Suspendisse potenti. Cras in purus eu magna vulputate luctus.\r\n\r\nCum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus vestibulum sagittis sapien. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', 18, 4),
(11, 'Voyatouch', 'http://dummyimage.com/187x100.png/5fa2dd/ffffff', '2017-02-17', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin risus. Praesent lectus.', 19, 17),
(12, 'Matsoft', 'http://dummyimage.com/128x100.png/dddddd/000000', '2018-08-01', 'Proin interdum mauris non ligula pellentesque ultrices. Phasellus id sapien in sapien iaculis congue. Vivamus metus arcu, adipiscing molestie, hendrerit at, vulputate vitae, nisl.\r\n\r\nAenean lectus. Pellentesque eget nunc. Donec quis orci eget orci vehicula condimentum.\r\n\r\nCurabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est.', 19, 20),
(13, 'Cardify', 'http://dummyimage.com/126x100.png/dddddd/000000', '2009-10-14', 'Praesent id massa id nisl venenatis lacinia. Aenean sit amet justo. Morbi ut odio.', 13, 15),
(14, 'Tampflex', 'http://dummyimage.com/119x100.png/cc0000/ffffff', '2014-04-27', 'Praesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.\r\n\r\nMorbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem.\r\n\r\nFusce consequat. Nulla nisl. Nunc nisl.', 2, 9),
(15, 'Matsoft', 'http://dummyimage.com/139x100.png/ff4444/ffffff', '2002-07-31', 'Maecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem. Quisque ut erat.\r\n\r\nCurabitur gravida nisi at nibh. In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem.', 5, 3),
(16, 'Bytecard', 'http://dummyimage.com/113x100.png/dddddd/000000', '1997-04-16', 'In sagittis dui vel nisl. Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus.', 9, 16),
(17, 'Tin', 'http://dummyimage.com/122x100.png/cc0000/ffffff', '1995-04-27', 'Phasellus in felis. Donec semper sapien a libero. Nam dui.\r\n\r\nProin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis. Ut at dolor quis odio consequat varius.\r\n\r\nInteger ac leo. Pellentesque ultrices mattis odio. Donec vitae nisi.', 5, 19),
(18, 'Andalax', 'http://dummyimage.com/238x100.png/cc0000/ffffff', '2006-02-04', 'Cras non velit nec nisi vulputate nonummy. Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque.', 12, 7),
(19, 'Overhold', 'http://dummyimage.com/201x100.png/ff4444/ffffff', '1997-06-08', 'Morbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem.', 14, 1),
(20, 'Tresom', 'http://dummyimage.com/160x100.png/dddddd/000000', '2008-07-26', 'Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit.\r\n\r\nDonec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi. Integer ac neque.', 17, 17),
(21, 'Treeflex', 'http://dummyimage.com/148x100.png/cc0000/ffffff', '2011-12-13', 'Maecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem. Quisque ut erat.\r\n\r\nCurabitur gravida nisi at nibh. In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem.\r\n\r\nInteger tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat.', 9, 16),
(22, 'Gembucket', 'http://dummyimage.com/148x100.png/dddddd/000000', '2013-08-19', 'Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est.\r\n\r\nPhasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum.\r\n\r\nProin eu mi. Nulla ac enim. In tempor, turpis nec euismod scelerisque, quam turpis adipiscing lorem, vitae mattis nibh ligula nec sem.', 11, 10),
(23, 'Duobam', 'http://dummyimage.com/138x100.png/dddddd/000000', '2004-12-13', 'In sagittis dui vel nisl. Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus.\r\n\r\nSuspendisse potenti. In eleifend quam a odio. In hac habitasse platea dictumst.', 1, 15),
(24, 'Trippledex', 'http://dummyimage.com/131x100.png/5fa2dd/ffffff', '1992-05-03', 'In hac habitasse platea dictumst. Etiam faucibus cursus urna. Ut tellus.\r\n\r\nNulla ut erat id mauris vulputate elementum. Nullam varius. Nulla facilisi.\r\n\r\nCras non velit nec nisi vulputate nonummy. Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque.', 17, 3),
(25, 'Tampflex', 'http://dummyimage.com/183x100.png/ff4444/ffffff', '1997-10-09', 'Aenean lectus. Pellentesque eget nunc. Donec quis orci eget orci vehicula condimentum.\r\n\r\nCurabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est.', 4, 16),
(26, 'Zontrax', 'http://dummyimage.com/206x100.png/ff4444/ffffff', '1991-07-17', 'Vestibulum quam sapien, varius ut, blandit non, interdum in, ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis faucibus accumsan odio. Curabitur convallis.\r\n\r\nDuis consequat dui nec nisi volutpat eleifend. Donec ut dolor. Morbi vel lectus in quam fringilla rhoncus.', 4, 15),
(27, 'Job', 'http://dummyimage.com/117x100.png/dddddd/000000', '2021-02-22', 'In quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet.\r\n\r\nMaecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui.', 4, 11),
(28, 'Trippledex', 'http://dummyimage.com/246x100.png/ff4444/ffffff', '2005-11-06', 'Nullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris.\r\n\r\nMorbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis.\r\n\r\nFusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem.', 8, 10),
(29, 'Temp', 'http://dummyimage.com/156x100.png/dddddd/000000', '2007-04-26', 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus vestibulum sagittis sapien. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.\r\n\r\nEtiam vel augue. Vestibulum rutrum rutrum neque. Aenean auctor gravida sem.\r\n\r\nPraesent id massa id nisl venenatis lacinia. Aenean sit amet justo. Morbi ut odio.', 3, 3),
(30, 'Cardify', 'http://dummyimage.com/155x100.png/ff4444/ffffff', '2007-05-17', 'Integer ac leo. Pellentesque ultrices mattis odio. Donec vitae nisi.\r\n\r\nNam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus.', 10, 11),
(31, 'Tampflex', 'http://dummyimage.com/233x100.png/5fa2dd/ffffff', '2020-12-11', 'Praesent id massa id nisl venenatis lacinia. Aenean sit amet justo. Morbi ut odio.', 10, 10),
(32, 'Tin', 'http://dummyimage.com/217x100.png/dddddd/000000', '2000-07-21', 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus vestibulum sagittis sapien. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.\r\n\r\nEtiam vel augue. Vestibulum rutrum rutrum neque. Aenean auctor gravida sem.', 13, 7),
(33, 'Quo Lux', 'http://dummyimage.com/129x100.png/5fa2dd/ffffff', '1992-05-11', 'Aliquam quis turpis eget elit sodales scelerisque. Mauris sit amet eros. Suspendisse accumsan tortor quis turpis.', 2, 3),
(34, 'Ronstring', 'http://dummyimage.com/147x100.png/cc0000/ffffff', '1990-03-12', 'Sed sagittis. Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci. Nullam molestie nibh in lectus.\r\n\r\nPellentesque at nulla. Suspendisse potenti. Cras in purus eu magna vulputate luctus.', 6, 1),
(35, 'Vagram', 'http://dummyimage.com/111x100.png/ff4444/ffffff', '2005-10-16', 'Praesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.\r\n\r\nMorbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem.', 17, 12),
(36, 'Alpha', 'http://dummyimage.com/217x100.png/cc0000/ffffff', '1997-01-31', 'Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit.\r\n\r\nDonec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi. Integer ac neque.', 7, 6),
(37, 'Job', 'http://dummyimage.com/214x100.png/ff4444/ffffff', '2007-11-25', 'Fusce consequat. Nulla nisl. Nunc nisl.\r\n\r\nDuis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa. Donec dapibus. Duis at velit eu est congue elementum.', 19, 17),
(38, 'Mat Lam Tam', 'http://dummyimage.com/117x100.png/dddddd/000000', '1997-07-17', 'Morbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem.\r\n\r\nFusce consequat. Nulla nisl. Nunc nisl.\r\n\r\nDuis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa. Donec dapibus. Duis at velit eu est congue elementum.', 1, 13),
(39, 'Lotstring', 'http://dummyimage.com/214x100.png/5fa2dd/ffffff', '2014-08-17', 'Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus.\r\n\r\nIn sagittis dui vel nisl. Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus.', 19, 13),
(40, 'Flowdesk', 'http://dummyimage.com/177x100.png/cc0000/ffffff', '2007-02-10', 'Proin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis. Ut at dolor quis odio consequat varius.', 20, 6),
(41, 'Temp', 'http://dummyimage.com/225x100.png/dddddd/000000', '1996-11-23', 'Maecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui.\r\n\r\nMaecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam. Suspendisse potenti.\r\n\r\nNullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris.', 14, 6),
(42, 'Quo Lux', 'http://dummyimage.com/195x100.png/ff4444/ffffff', '2007-10-02', 'Praesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.', 5, 15),
(43, 'Duobam', 'http://dummyimage.com/250x100.png/dddddd/000000', '2008-02-18', 'In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo.', 8, 6),
(44, 'Prodder', 'http://dummyimage.com/122x100.png/5fa2dd/ffffff', '2015-03-31', 'In quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet.\r\n\r\nMaecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui.', 4, 11),
(45, 'Pannier', 'http://dummyimage.com/175x100.png/ff4444/ffffff', '2003-12-14', 'Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus.', 15, 11),
(46, 'Tampflex', 'http://dummyimage.com/136x100.png/5fa2dd/ffffff', '1996-06-04', 'Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam. Suspendisse potenti.', 16, 17),
(47, 'Sonsing', 'http://dummyimage.com/149x100.png/dddddd/000000', '2009-07-07', 'In hac habitasse platea dictumst. Etiam faucibus cursus urna. Ut tellus.', 7, 2),
(48, 'Veribet', 'http://dummyimage.com/193x100.png/dddddd/000000', '1990-03-31', 'Etiam vel augue. Vestibulum rutrum rutrum neque. Aenean auctor gravida sem.\r\n\r\nPraesent id massa id nisl venenatis lacinia. Aenean sit amet justo. Morbi ut odio.\r\n\r\nCras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', 3, 12),
(49, 'Voltsillam', 'http://dummyimage.com/242x100.png/dddddd/000000', '2011-01-10', 'Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit.', 18, 4),
(50, 'Otcom', 'http://dummyimage.com/178x100.png/cc0000/ffffff', '1996-05-02', 'Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit.\r\n\r\nDonec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi. Integer ac neque.\r\n\r\nDuis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus.', 1, 14),
(51, 'Transcof', 'http://dummyimage.com/243x100.png/dddddd/000000', '2010-05-14', 'Vestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue. Aliquam erat volutpat.\r\n\r\nIn congue. Etiam justo. Etiam pretium iaculis justo.', 13, 18),
(52, 'Tresom', 'http://dummyimage.com/131x100.png/5fa2dd/ffffff', '1999-05-13', 'Etiam vel augue. Vestibulum rutrum rutrum neque. Aenean auctor gravida sem.\r\n\r\nPraesent id massa id nisl venenatis lacinia. Aenean sit amet justo. Morbi ut odio.\r\n\r\nCras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', 2, 14),
(53, 'Flexidy', 'http://dummyimage.com/123x100.png/dddddd/000000', '1999-04-13', 'In sagittis dui vel nisl. Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus.\r\n\r\nSuspendisse potenti. In eleifend quam a odio. In hac habitasse platea dictumst.', 15, 17),
(54, 'Vagram', 'http://dummyimage.com/138x100.png/cc0000/ffffff', '2003-10-26', 'Aenean fermentum. Donec ut mauris eget massa tempor convallis. Nulla neque libero, convallis eget, eleifend luctus, ultricies eu, nibh.', 14, 7),
(55, 'Kanlam', 'http://dummyimage.com/168x100.png/5fa2dd/ffffff', '2006-02-04', 'Praesent id massa id nisl venenatis lacinia. Aenean sit amet justo. Morbi ut odio.', 18, 13),
(56, 'Flexidy', 'http://dummyimage.com/245x100.png/5fa2dd/ffffff', '2023-01-10', 'In hac habitasse platea dictumst. Etiam faucibus cursus urna. Ut tellus.', 14, 4),
(57, 'Aerified', 'http://dummyimage.com/211x100.png/cc0000/ffffff', '2001-10-16', 'In quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet.', 8, 4),
(58, 'Tempsoft', 'http://dummyimage.com/213x100.png/5fa2dd/ffffff', '1991-07-17', 'In hac habitasse platea dictumst. Etiam faucibus cursus urna. Ut tellus.', 8, 16),
(59, 'Konklab', 'http://dummyimage.com/142x100.png/5fa2dd/ffffff', '2015-10-29', 'Vestibulum quam sapien, varius ut, blandit non, interdum in, ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis faucibus accumsan odio. Curabitur convallis.\r\n\r\nDuis consequat dui nec nisi volutpat eleifend. Donec ut dolor. Morbi vel lectus in quam fringilla rhoncus.\r\n\r\nMauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero.', 8, 11),
(60, 'Greenlam', 'http://dummyimage.com/121x100.png/cc0000/ffffff', '2013-12-01', 'Integer tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat.\r\n\r\nPraesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.\r\n\r\nMorbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem.', 9, 15),
(61, 'Trippledex', 'http://dummyimage.com/104x100.png/cc0000/ffffff', '1998-10-06', 'Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est.\r\n\r\nPhasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum.', 6, 13),
(62, 'Y-find', 'http://dummyimage.com/198x100.png/ff4444/ffffff', '2015-08-25', 'Integer ac leo. Pellentesque ultrices mattis odio. Donec vitae nisi.\r\n\r\nNam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus.', 19, 16),
(63, 'Veribet', 'http://dummyimage.com/127x100.png/ff4444/ffffff', '1993-11-30', 'Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit.', 19, 20),
(64, 'Konklux', 'http://dummyimage.com/155x100.png/ff4444/ffffff', '2023-01-12', 'Phasellus in felis. Donec semper sapien a libero. Nam dui.\r\n\r\nProin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis. Ut at dolor quis odio consequat varius.', 10, 19),
(65, 'Kanlam', 'http://dummyimage.com/120x100.png/dddddd/000000', '2001-11-30', 'Morbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis.\r\n\r\nFusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem.', 4, 11),
(66, 'Lotlux', 'http://dummyimage.com/157x100.png/dddddd/000000', '2000-10-20', 'Proin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis. Ut at dolor quis odio consequat varius.', 18, 2),
(67, 'Hatity', 'http://dummyimage.com/153x100.png/5fa2dd/ffffff', '2017-09-06', 'Curabitur gravida nisi at nibh. In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem.\r\n\r\nInteger tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat.', 10, 6),
(68, 'Stronghold', 'http://dummyimage.com/141x100.png/5fa2dd/ffffff', '2001-05-12', 'Nullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris.\r\n\r\nMorbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis.', 12, 20),
(69, 'Transcof', 'http://dummyimage.com/110x100.png/dddddd/000000', '2002-02-03', 'Sed sagittis. Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci. Nullam molestie nibh in lectus.\r\n\r\nPellentesque at nulla. Suspendisse potenti. Cras in purus eu magna vulputate luctus.', 17, 3),
(70, 'Fintone', 'http://dummyimage.com/218x100.png/ff4444/ffffff', '2000-01-06', 'Integer ac leo. Pellentesque ultrices mattis odio. Donec vitae nisi.\r\n\r\nNam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus.', 15, 4),
(71, 'Treeflex', 'http://dummyimage.com/169x100.png/5fa2dd/ffffff', '1999-10-18', 'Proin interdum mauris non ligula pellentesque ultrices. Phasellus id sapien in sapien iaculis congue. Vivamus metus arcu, adipiscing molestie, hendrerit at, vulputate vitae, nisl.\r\n\r\nAenean lectus. Pellentesque eget nunc. Donec quis orci eget orci vehicula condimentum.\r\n\r\nCurabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est.', 16, 3),
(72, 'Sonsing', 'http://dummyimage.com/112x100.png/cc0000/ffffff', '2014-12-17', 'Nullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris.', 20, 12),
(73, 'Tin', 'http://dummyimage.com/177x100.png/dddddd/000000', '1995-01-17', 'Vestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue. Aliquam erat volutpat.\r\n\r\nIn congue. Etiam justo. Etiam pretium iaculis justo.\r\n\r\nIn hac habitasse platea dictumst. Etiam faucibus cursus urna. Ut tellus.', 18, 3),
(74, 'Bytecard', 'http://dummyimage.com/157x100.png/ff4444/ffffff', '2012-05-19', 'Sed sagittis. Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci. Nullam molestie nibh in lectus.', 14, 4),
(75, 'Rank', 'http://dummyimage.com/215x100.png/cc0000/ffffff', '1990-06-09', 'Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam. Suspendisse potenti.\r\n\r\nNullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris.\r\n\r\nMorbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis.', 8, 5),
(76, 'Pannier', 'http://dummyimage.com/113x100.png/5fa2dd/ffffff', '2009-06-14', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin risus. Praesent lectus.\r\n\r\nVestibulum quam sapien, varius ut, blandit non, interdum in, ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis faucibus accumsan odio. Curabitur convallis.\r\n\r\nDuis consequat dui nec nisi volutpat eleifend. Donec ut dolor. Morbi vel lectus in quam fringilla rhoncus.', 17, 12),
(77, 'Fintone', 'http://dummyimage.com/166x100.png/ff4444/ffffff', '2016-05-13', 'In sagittis dui vel nisl. Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus.\r\n\r\nSuspendisse potenti. In eleifend quam a odio. In hac habitasse platea dictumst.', 5, 13),
(78, 'Asoka', 'http://dummyimage.com/199x100.png/dddddd/000000', '2005-08-15', 'Quisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus.', 10, 2),
(79, 'Duobam', 'http://dummyimage.com/172x100.png/cc0000/ffffff', '2004-11-01', 'Aliquam quis turpis eget elit sodales scelerisque. Mauris sit amet eros. Suspendisse accumsan tortor quis turpis.\r\n\r\nSed ante. Vivamus tortor. Duis mattis egestas metus.', 4, 6),
(80, 'Keylex', 'http://dummyimage.com/208x100.png/cc0000/ffffff', '1999-08-19', 'Aenean fermentum. Donec ut mauris eget massa tempor convallis. Nulla neque libero, convallis eget, eleifend luctus, ultricies eu, nibh.', 6, 14),
(81, 'Cardguard', 'http://dummyimage.com/233x100.png/5fa2dd/ffffff', '2001-12-09', 'Praesent id massa id nisl venenatis lacinia. Aenean sit amet justo. Morbi ut odio.\r\n\r\nCras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', 7, 3),
(82, 'Greenlam', 'http://dummyimage.com/158x100.png/dddddd/000000', '1998-11-26', 'Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est.', 20, 20),
(83, 'Overhold', 'http://dummyimage.com/164x100.png/ff4444/ffffff', '2020-09-18', 'Nulla ut erat id mauris vulputate elementum. Nullam varius. Nulla facilisi.\r\n\r\nCras non velit nec nisi vulputate nonummy. Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque.\r\n\r\nQuisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus.', 17, 9),
(84, 'Bigtax', 'http://dummyimage.com/113x100.png/dddddd/000000', '1999-05-02', 'Integer ac leo. Pellentesque ultrices mattis odio. Donec vitae nisi.', 19, 12),
(85, 'Alpha', 'http://dummyimage.com/148x100.png/5fa2dd/ffffff', '1990-06-30', 'Cras non velit nec nisi vulputate nonummy. Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque.\r\n\r\nQuisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus.\r\n\r\nPhasellus in felis. Donec semper sapien a libero. Nam dui.', 14, 14),
(86, 'Gembucket', 'http://dummyimage.com/100x100.png/cc0000/ffffff', '2018-12-22', 'Nullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris.\r\n\r\nMorbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis.', 16, 6),
(87, 'Sonsing', 'http://dummyimage.com/120x100.png/dddddd/000000', '1992-09-19', 'Morbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem.\r\n\r\nFusce consequat. Nulla nisl. Nunc nisl.', 15, 18),
(88, 'Y-find', 'http://dummyimage.com/179x100.png/dddddd/000000', '2002-06-04', 'In sagittis dui vel nisl. Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus.', 4, 16),
(89, 'Voltsillam', 'http://dummyimage.com/187x100.png/cc0000/ffffff', '1994-08-14', 'Nulla ut erat id mauris vulputate elementum. Nullam varius. Nulla facilisi.', 8, 11),
(90, 'Y-find', 'http://dummyimage.com/163x100.png/ff4444/ffffff', '2004-05-28', 'Fusce consequat. Nulla nisl. Nunc nisl.\r\n\r\nDuis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa. Donec dapibus. Duis at velit eu est congue elementum.', 9, 9),
(91, 'Otcom', 'http://dummyimage.com/108x100.png/dddddd/000000', '1999-11-03', 'Mauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero.\r\n\r\nNullam sit amet turpis elementum ligula vehicula consequat. Morbi a ipsum. Integer a nibh.', 11, 9),
(92, 'Ventosanzap', 'http://dummyimage.com/183x100.png/dddddd/000000', '2018-06-20', 'Nullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris.\r\n\r\nMorbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis.', 10, 15),
(93, 'Bitchip', 'http://dummyimage.com/160x100.png/5fa2dd/ffffff', '1999-04-19', 'Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi. Integer ac neque.', 8, 11),
(94, 'Holdlamis', 'http://dummyimage.com/181x100.png/cc0000/ffffff', '2000-12-04', 'Nulla ut erat id mauris vulputate elementum. Nullam varius. Nulla facilisi.', 1, 1),
(95, 'Stringtough', 'http://dummyimage.com/171x100.png/dddddd/000000', '1995-09-08', 'Aenean lectus. Pellentesque eget nunc. Donec quis orci eget orci vehicula condimentum.', 10, 8),
(96, 'Ronstring', 'http://dummyimage.com/242x100.png/dddddd/000000', '2003-11-14', 'Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit.\r\n\r\nDonec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi. Integer ac neque.\r\n\r\nDuis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus.', 5, 18),
(97, 'Domainer', 'http://dummyimage.com/105x100.png/dddddd/000000', '2007-03-01', 'Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', 9, 9),
(98, 'Konklux', 'http://dummyimage.com/243x100.png/5fa2dd/ffffff', '1997-03-19', 'Maecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui.', 11, 17),
(99, 'Cardify', 'http://dummyimage.com/237x100.png/dddddd/000000', '2005-09-06', 'Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus.', 11, 6),
(100, 'Cookley', 'http://dummyimage.com/244x100.png/5fa2dd/ffffff', '1992-07-13', 'Sed sagittis. Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci. Nullam molestie nibh in lectus.\r\n\r\nPellentesque at nulla. Suspendisse potenti. Cras in purus eu magna vulputate luctus.', 19, 12);

-- --------------------------------------------------------

--
-- Structure de la table `joueur`
--

DROP TABLE IF EXISTS `joueur`;
CREATE TABLE IF NOT EXISTS `joueur` (
  `id_joueur` int NOT NULL AUTO_INCREMENT,
  `email_joueur` varchar(50) NOT NULL,
  `pass_joueur` varchar(250) NOT NULL,
  `pseudo_joueur` varchar(50) NOT NULL,
  `image_joueur` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_joueur`),
  UNIQUE KEY `email_joueur` (`email_joueur`),
  UNIQUE KEY `email_joueur_2` (`email_joueur`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `plateforme`
--

DROP TABLE IF EXISTS `plateforme`;
CREATE TABLE IF NOT EXISTS `plateforme` (
  `id_plateforme` int NOT NULL AUTO_INCREMENT,
  `nom_plateforme` varchar(50) NOT NULL,
  PRIMARY KEY (`id_plateforme`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `plateforme`
--

INSERT INTO `plateforme` (`id_plateforme`, `nom_plateforme`) VALUES
(1, 'PC'),
(2, 'XBOX'),
(3, 'Playstation'),
(4, 'Nintendo'),
(5, 'Android'),
(6, 'IOS');

-- --------------------------------------------------------

--
-- Structure de la table `support`
--

DROP TABLE IF EXISTS `support`;
CREATE TABLE IF NOT EXISTS `support` (
  `id_jeu` int NOT NULL,
  `id_plateforme` int NOT NULL,
  PRIMARY KEY (`id_jeu`,`id_plateforme`),
  KEY `id_plateforme` (`id_plateforme`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `support`
--

INSERT INTO `support` (`id_jeu`, `id_plateforme`) VALUES
(8, 1),
(36, 1),
(57, 1),
(70, 1),
(73, 1),
(92, 1),
(94, 1),
(96, 1),
(100, 1),
(10, 2),
(31, 2),
(33, 2),
(35, 2),
(43, 2),
(57, 2),
(61, 2),
(73, 2),
(80, 2),
(30, 3),
(44, 3),
(48, 3),
(49, 3),
(77, 3),
(84, 3),
(87, 3),
(95, 3),
(97, 3),
(7, 4),
(16, 4),
(34, 4),
(36, 4),
(41, 4),
(53, 4),
(65, 4),
(76, 4),
(79, 4),
(93, 4),
(22, 5),
(33, 5),
(36, 5),
(50, 5),
(56, 5),
(65, 5),
(66, 5),
(72, 5),
(77, 5),
(99, 5),
(42, 6),
(48, 6),
(77, 6),
(83, 6),
(87, 6),
(88, 6),
(89, 6),
(92, 6);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`id_joueur`) REFERENCES `joueur` (`id_joueur`),
  ADD CONSTRAINT `commentaire_ibfk_2` FOREIGN KEY (`id_jeu`) REFERENCES `jeu` (`id_jeu`);

--
-- Contraintes pour la table `jeu`
--
ALTER TABLE `jeu`
  ADD CONSTRAINT `jeu_ibfk_1` FOREIGN KEY (`id_editeur`) REFERENCES `editeur` (`id_editeur`),
  ADD CONSTRAINT `jeu_ibfk_2` FOREIGN KEY (`id_developpeur`) REFERENCES `developpeur` (`id_developpeur`);

--
-- Contraintes pour la table `support`
--
ALTER TABLE `support`
  ADD CONSTRAINT `support_ibfk_1` FOREIGN KEY (`id_jeu`) REFERENCES `jeu` (`id_jeu`),
  ADD CONSTRAINT `support_ibfk_2` FOREIGN KEY (`id_plateforme`) REFERENCES `plateforme` (`id_plateforme`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
