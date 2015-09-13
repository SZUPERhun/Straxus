-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 13, 2015 at 05:36 AM
-- Server version: 5.5.44-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `straxus`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `credentials_expired` tinyint(1) NOT NULL,
  `credentials_expire_at` datetime DEFAULT NULL,
  `loginattempts` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D64992FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_8D93D649A0D96FBF` (`email_canonical`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `locked`, `expired`, `expires_at`, `confirmation_token`, `password_requested_at`, `roles`, `credentials_expired`, `credentials_expire_at`, `loginattempts`) VALUES
(1, 'Admin', 'admin', 'admin@straxus.com', 'admin@straxus.com', 1, 'lheompqgudcwck4ccwogo0k08oo4c0k', 'vpVjKZpHgNNBlEJWLWZZLC7HE+1Ycn0r3JbllMLrw0uSvQPqUESXuMWFWLiv4OOnXfR5lJvAFHrkGiocU6IVbA==', '2015-09-13 05:27:26', 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:10:"ROLE_ADMIN";}', 0, NULL, 0),
(2, 'User', 'user', 'user@straxus.com', 'user@straxus.com', 1, 'gajv5bs4heokkk8g4scs84o04s444k4', 'R7GFnDZzUS5QBnaPslmDvbQVTOY535BId6WROc8RlvUoGycqlTw615RLC/Ab7t5vF4s3kSPmtpkLNzvZ40Kgpg==', '2015-09-13 05:28:05', 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:10:"ROLE_LUSER";}', 0, NULL, 0),
(3, 'Editor', 'editor', 'editor@straxus.com', 'editor@straxus.com', 1, 'epl1r34tsbccckswwcskgoggkc84oc0', 'ZxU7R2fahH2NQNyJ8lrD0iDbCvI4ascJCHnd+t8DiYWYyci66Dv3ZjSxHGJJGPM/V5Jmml1MV9VF4/4DGUAHDQ==', '2015-09-12 01:37:53', 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:11:"ROLE_EDITOR";}', 0, NULL, 0),
(4, 'SuperUser', 'superuser', 'superuser@straxus.com', 'superuser@straxus.com', 1, 'exfk1nudtxs8ck48ocgk0skcckc4kwo', '7wP0wfqv58JmJqdmsPZJsmRVXcrDt/4S3/ZH+Hv5/kczwzDUx1qjw38lOyggSQM/OJaSQO8Ejb/EIO2wYnCXXQ==', '2015-09-12 21:32:06', 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:15:"ROLE_SUPER_USER";}', 0, NULL, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
