-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 28-Dez-2017 às 16:47
-- Versão do servidor: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES latin1 */;

--
-- Database: `apcerta`
--
CREATE DATABASE IF NOT EXISTS `apcerta` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `apcerta`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `apostas`
--

DROP TABLE IF EXISTS `apostas`;
CREATE TABLE IF NOT EXISTS `apostas` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `usuarioId` int(11) NOT NULL,
  `jogoId` int(11) NOT NULL,
  `numero_concurso` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `acertos` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogos`
--

DROP TABLE IF EXISTS `jogos`;
CREATE TABLE IF NOT EXISTS `jogos` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `megasenas`
--

DROP TABLE IF EXISTS `megasenas`;
CREATE TABLE IF NOT EXISTS `megasenas` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `numeroConcurso` int(11) NOT NULL,
  `resultado` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `megasenas`
--

INSERT INTO `megasenas` (`id`, `numeroConcurso`, `resultado`, `created_at`, `updated_at`) VALUES
(1, 1999, '15-37-38-42-49-50', '2017-12-27 02:00:00', '2017-12-27 02:00:00'),
(2, 1998, '08-21-24-25-52-57', NULL, NULL),
(3, 1997, '01-07-14-31-35-46', NULL, NULL),
(4, 1890, '05-11-22-24-51-53', '2017-12-28 14:00:30', '2017-12-28 14:00:30'),
(5, 1775, '02-18-31-42-51-56', '2017-12-28 14:27:57', '2017-12-28 14:27:57');

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(11, '2014_10_12_000000_create_users_table', 1),
(12, '2014_10_12_100000_create_password_resets_table', 1),
(13, '2016_11_26_194341_create_apostas_table', 1),
(14, '2016_11_26_214222_create_jogos_table', 1),
(15, '2016_12_22_183123_create_megasenas_table', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `privilegio` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'comum',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `privilegio`) VALUES
(1, 'Alex Benincasa', 'alexbenincasa@ymail.com', '$2y$10$ksnpjuKpEgM.wBCB9xTXTupfMChKOlo2opxmlYbj4sh.C9cI5nvGC', NULL, '2017-12-27 21:04:45', '2017-12-27 21:04:45', 'administrador'),
(2, 'Rian Chamarelli', 'rianchamarelli@gmail.com', '$2y$10$ncqxBik0GRPmSUo/H5bYHOgZyWq/kr9sCBVflG4NeKz7d3HYN13p2', NULL, '2017-12-28 14:15:40', '2017-12-28 14:15:40', 'administrador'),
(3, 'Ze madeira', 'aldorodriguesfolha@gmail.com', '$2y$10$fG6/bkoIzt5JrSdoWjqyEOuOCSi7zbcI93aJWq2AXEIv2RHCftMYu', NULL, '2017-12-28 15:22:13', '2017-12-28 15:22:13', 'administrador'),
(4, 'Marlon Diaz', 'marlondiasdasilva13@gmail.com', '$2y$10$.L.YcQpb4rSMJBAM8DhcZuzSUISWP8Zhb.LledUabTjl3AM8RQH6S', 'cDiZtuU6qFPfjflmWFt5srIJJRwyMJXpyVpcVn6lrd9KuB5DKOqoNbSOtV3g', '2017-12-28 16:29:12', '2017-12-28 16:30:56', 'comum');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
