SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `avis` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `lastname` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `avis` text NOT NULL,
  `status` varchar(55) NOT NULL,
  `note` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `horaires` (
  `id` int(11) NOT NULL,
  `jour` varchar(55) NOT NULL,
  `ouverture` time NOT NULL,
  `fermeture` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `messages` (
  `id` int(55) NOT NULL,
  `name` varchar(55) NOT NULL,
  `lastname` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `telephone` int(55) NOT NULL,
  `service` varchar(55) NOT NULL,
  `sujet` varchar(55) NOT NULL,
  `message` text NOT NULL,
  `registerDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `occasions` (
  `id` int(11) NOT NULL,
  `modele` varchar(55) NOT NULL,
  `annee` int(11) NOT NULL,
  `boite` varchar(55) NOT NULL,
  `description` text NOT NULL,
  `carburant` varchar(55) NOT NULL,
  `kilometre` int(11) NOT NULL,
  `prix` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `photos` (
  `id` int(11) NOT NULL,
  `name_photo` varchar(55) NOT NULL,
  `id_occasion` int(11) DEFAULT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `prestations` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(55) NOT NULL,
  `password` varchar(255) NOT NULL,
  `registerDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(55) NOT NULL,
  `lastname` varchar(55) NOT NULL,
  `role` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `user` (`id`, `email`, `password`, `registerDate`, `name`, `lastname`, `role`) VALUES
(22, 'administrateur@email.com', 'administrateurpassword', '2024-02-20 00:02:58', 'john', 'doe', 'admin'),
(23, 'user@gmail.com', '$2y$10$GhQ.dtOe4SYnEglIwWiJC.ZaF/K6fytumE/VPeDO2H2PjKpFl.qMu', '2024-02-20 00:26:33', 'user', 'user', 'employed');

