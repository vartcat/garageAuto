CREATE DATABASE IF NOT EXISTS `production_garage_automobile`;
USE `production_garage_automobile`;

CREATE TABLE `avis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(55) NOT NULL,
  `lastname` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `avis` text NOT NULL,
  `status` varchar(55) NOT NULL,
  `note` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `horaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jour` varchar(55) NOT NULL,
  `ouverture` time NOT NULL,
  `fermeture` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `messages` (
  `id` int(55) NOT NULL AUTO_INCREMENT,
  `name` varchar(55) NOT NULL,
  `lastname` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `telephone` int(55) NOT NULL,
  `service` varchar(55) NOT NULL,
  `sujet` varchar(55) DEFAULT NULL,
  `message` text NOT NULL,
  `registerDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `occasions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `modele` varchar(55) NOT NULL,
  `annee` int(11) NOT NULL,
  `boite` varchar(55) NOT NULL,
  `description` text NOT NULL,
  `carburant` varchar(55) NOT NULL,
  `kilometre` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_photo` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `id_occasion` int(11) DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_occasion` (`id_occasion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `prestations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(55) NOT NULL,
  `password` varchar(255) NOT NULL,
  `registerDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(55) NOT NULL,
  `lastname` varchar(55) NOT NULL,
  `role` varchar(55) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `user` (`email`, `password`, `name`, `lastname`, `role`) VALUES
('rootadmin@mail.com', '$2y$10$UW3vmh83j/wWqVO6JnQ1Te0Ry2onIyfLvIumCzjDM5ZqZYIhs0cSq', 'John', 'Doe', 'admin'),
('rootemployed@mail.com', '$2y$10$UW3vmh83j/wWqVO6JnQ1Te0Ry2onIyfLvIumCzjDM5ZqZYIhs0cSq', 'Camille', 'Honnete', 'employed');
