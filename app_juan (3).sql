-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-11-2019 a las 21:18:46
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `app_juan`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auditoria`
--

CREATE TABLE `auditoria` (
  `id_auditoria` bigint(20) NOT NULL,
  `tabla` varchar(40) CHARACTER SET latin1 NOT NULL,
  `cod_reg` int(11) NOT NULL,
  `status` int(1) DEFAULT 1,
  `fec_status` date DEFAULT NULL,
  `usr_regins` int(11) NOT NULL,
  `fec_regins` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usr_regmod` int(11) DEFAULT NULL,
  `fec_regmod` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `auditoria`
--

INSERT INTO `auditoria` (`id_auditoria`, `tabla`, `cod_reg`, `status`, `fec_status`, `usr_regins`, `fec_regins`, `usr_regmod`, `fec_regmod`) VALUES
(1, 'users', 49, 1, NULL, 1, '2019-10-03 22:06:09', NULL, NULL),
(2, 'users', 50, 1, NULL, 1, '2019-10-03 22:07:14', NULL, NULL),
(3, 'modulos', 4, 1, NULL, 1, '2019-10-04 15:55:44', NULL, NULL),
(4, 'modulos', 5, 1, NULL, 1, '2019-10-04 16:02:21', NULL, NULL),
(5, 'modulos', 6, 1, NULL, 1, '2019-10-04 16:02:25', NULL, NULL),
(6, 'modulos', 7, 1, NULL, 1, '2019-10-04 16:02:42', NULL, NULL),
(7, 'modulos', 8, 1, NULL, 1, '2019-10-04 16:02:47', NULL, NULL),
(8, 'modulos', 9, 1, NULL, 1, '2019-10-04 16:09:53', NULL, NULL),
(9, 'modulos', 10, 1, NULL, 1, '2019-10-04 16:10:04', NULL, NULL),
(10, 'modulos', 11, 1, NULL, 1, '2019-10-04 16:13:37', NULL, NULL),
(11, 'modulos', 12, 1, NULL, 1, '2019-10-04 16:17:16', NULL, NULL),
(12, 'modulos', 13, 1, NULL, 1, '2019-10-04 16:17:37', NULL, NULL),
(13, 'modulos', 14, 1, NULL, 1, '2019-10-04 16:19:31', NULL, NULL),
(14, 'modulos', 15, 1, NULL, 1, '2019-10-04 16:19:39', NULL, NULL),
(15, 'modulos', 16, 1, NULL, 1, '2019-10-04 16:20:07', NULL, NULL),
(16, 'modulos', 17, 1, NULL, 1, '2019-10-04 16:20:14', NULL, NULL),
(17, 'modulos', 18, 1, NULL, 1, '2019-10-04 16:38:34', NULL, NULL),
(18, 'modulos', 19, 1, NULL, 1, '2019-10-04 16:38:42', NULL, NULL),
(19, 'modulos', 20, 1, NULL, 1, '2019-10-04 20:44:53', NULL, NULL),
(20, 'modulos', 21, 1, NULL, 1, '2019-10-04 20:45:15', NULL, NULL),
(21, 'modulos', 22, 1, NULL, 1, '2019-10-04 20:45:53', NULL, NULL),
(22, 'modulos', 23, 1, NULL, 1, '2019-10-04 20:46:05', NULL, NULL),
(23, 'modulos', 24, 1, NULL, 1, '2019-10-04 20:46:30', NULL, NULL),
(24, 'modulos', 25, 1, NULL, 1, '2019-10-04 20:46:45', NULL, NULL),
(25, 'modulos', 26, 1, NULL, 1, '2019-10-04 20:46:49', NULL, NULL),
(26, 'modulos', 27, 1, NULL, 1, '2019-10-04 20:46:59', NULL, NULL),
(27, 'modulos', 28, 1, NULL, 1, '2019-10-04 20:48:08', NULL, NULL),
(28, 'modulos', 29, 1, NULL, 1, '2019-10-04 20:48:47', NULL, NULL),
(29, 'modulos', 30, 1, NULL, 1, '2019-10-04 20:58:12', NULL, NULL),
(30, 'modulos', 33, 1, NULL, 1, '2019-10-04 21:03:09', NULL, NULL),
(31, 'modulos', 34, 1, NULL, 1, '2019-10-04 21:03:12', NULL, NULL),
(32, 'modulos', 35, 1, NULL, 1, '2019-10-04 21:03:25', NULL, NULL),
(33, 'modulos', 36, 1, NULL, 1, '2019-10-04 21:03:30', NULL, NULL),
(34, 'modulos', 37, 1, NULL, 1, '2019-10-04 21:03:39', NULL, NULL),
(35, 'modulos', 38, 1, NULL, 1, '2019-10-04 21:03:49', NULL, NULL),
(36, 'modulos', 39, 1, NULL, 1, '2019-10-04 21:22:58', NULL, NULL),
(37, 'modulos', 40, 1, NULL, 1, '2019-10-04 21:31:48', NULL, NULL),
(38, 'funciones', 3, 1, NULL, 1, '2019-10-05 14:59:20', NULL, NULL),
(39, 'funciones', 4, 1, NULL, 1, '2019-10-05 14:59:43', NULL, NULL),
(40, 'funciones', 5, 1, NULL, 1, '2019-10-05 15:01:11', NULL, NULL),
(41, 'funciones', 6, 1, NULL, 1, '2019-10-05 15:14:49', NULL, NULL),
(42, 'modulos', 41, 1, NULL, 1, '2019-10-23 15:40:26', NULL, NULL),
(43, 'funciones', 7, 1, NULL, 1, '2019-10-24 16:13:38', NULL, NULL),
(44, 'funciones', 8, 1, NULL, 1, '2019-10-07 14:53:57', NULL, NULL),
(45, 'funciones', 9, 1, NULL, 1, '2019-10-07 14:54:21', NULL, NULL),
(46, 'funciones', 10, 1, NULL, 1, '2019-10-07 14:54:42', NULL, NULL),
(47, 'modulos', 42, 1, NULL, 1, '2019-10-23 15:40:31', NULL, NULL),
(48, 'funciones', 12, 0, NULL, 1, '2019-10-24 16:14:56', NULL, '2019-10-24'),
(49, 'roles', 6, 1, NULL, 1, '2019-10-26 13:20:00', NULL, NULL),
(50, 'funciones', 13, 0, NULL, 1, '2019-10-24 16:14:53', NULL, '2019-10-24'),
(51, 'funciones', 14, 0, NULL, 1, '2019-10-24 16:14:50', NULL, '2019-10-24'),
(52, 'funciones', 15, 1, NULL, 1, '2019-10-07 21:42:06', NULL, NULL),
(53, 'funciones', 16, 1, NULL, 1, '2019-10-07 21:42:23', NULL, NULL),
(54, 'funciones', 17, 0, NULL, 1, '2019-10-24 16:13:22', NULL, '2019-10-24'),
(55, 'users', 51, 1, NULL, 1, '2019-10-21 13:59:13', NULL, NULL),
(56, 'users', 52, 1, NULL, 1, '2019-10-21 13:59:30', NULL, NULL),
(57, 'users', 53, 1, NULL, 1, '2019-10-21 15:42:44', NULL, NULL),
(58, 'users', 54, 0, NULL, 1, '2019-10-22 20:28:24', 1, '2019-10-22'),
(59, 'users', 55, 0, NULL, 1, '2019-10-22 20:25:28', 1, '2019-10-22'),
(60, 'roles', 8, 0, NULL, 1, '2019-10-26 13:20:34', NULL, '2019-10-26'),
(61, 'users', 56, 0, NULL, 1, '2019-10-22 20:27:27', 1, '2019-10-22'),
(62, 'users', 57, 0, NULL, 1, '2019-10-22 20:25:24', 1, '2019-10-22'),
(63, 'users', 58, 0, NULL, 1, '2019-10-22 20:25:16', 1, '2019-10-22'),
(64, 'users', 59, 0, NULL, 1, '2019-10-22 20:28:26', 1, '2019-10-22'),
(65, 'users', 60, 1, NULL, 1, '2019-10-22 20:36:15', NULL, NULL),
(66, 'roles', 9, 0, NULL, 60, '2019-11-10 20:03:16', NULL, '2019-11-10'),
(67, 'users', 61, 1, NULL, 60, '2019-10-22 20:37:44', NULL, NULL),
(68, 'modulos', 43, 0, NULL, 60, '2019-10-23 15:40:35', NULL, '2019-10-23'),
(69, 'modulos', 44, 0, NULL, 60, '2019-10-23 15:41:44', NULL, '2019-10-23'),
(70, 'funciones', 18, 0, NULL, 60, '2019-10-24 16:15:19', NULL, '2019-10-24'),
(71, 'roles', 12, 0, NULL, 60, '2019-10-26 13:22:38', NULL, '2019-10-26'),
(72, 'roles', 13, 0, NULL, 60, '2019-10-26 13:22:35', NULL, '2019-10-26'),
(73, 'roles', 14, 0, NULL, 60, '2019-10-26 13:22:34', NULL, '2019-10-26'),
(74, 'modulos', 45, 1, NULL, 60, '2019-10-26 13:24:53', NULL, NULL),
(75, 'funciones', 19, 0, NULL, 60, '2019-11-10 20:02:46', NULL, '2019-11-10'),
(76, 'modulos', 46, 0, NULL, 60, '2019-10-26 13:31:21', NULL, '2019-10-26'),
(77, 'clientes', 12, 1, NULL, 60, '2019-10-26 15:19:44', NULL, NULL),
(78, 'clientes', 13, 1, NULL, 60, '2019-10-26 15:20:04', NULL, NULL),
(79, 'clientes', 14, 0, NULL, 60, '2019-10-28 17:00:52', 60, '2019-10-28'),
(80, 'clientes', 15, 0, NULL, 60, '2019-10-28 17:00:51', 60, '2019-10-28'),
(81, 'clientes', 28, 0, NULL, 60, '2019-10-28 17:00:49', 60, '2019-10-28'),
(82, 'clientes', 29, 0, NULL, 60, '2019-10-28 17:00:47', 60, '2019-10-28'),
(83, 'funciones', 20, 0, NULL, 60, '2019-11-10 20:02:43', NULL, '2019-11-10'),
(84, 'citys', 3, 1, NULL, 60, '2019-10-28 22:27:50', 60, '2019-10-28'),
(85, 'citys', 4, 0, NULL, 60, '2019-10-29 20:56:59', 60, '2019-10-29'),
(86, 'citys', 5, 1, NULL, 60, '2019-10-28 20:55:01', NULL, NULL),
(87, 'citys', 6, 0, NULL, 60, '2019-10-28 20:55:14', 60, '2019-10-28'),
(88, 'citys', 7, 0, NULL, 60, '2019-10-28 20:55:11', 60, '2019-10-28'),
(89, 'funciones', 21, 0, NULL, 60, '2019-11-10 20:02:40', NULL, '2019-11-10'),
(90, 'citys', 8, 0, NULL, 60, '2019-10-28 21:36:08', 60, '2019-10-28'),
(91, 'clinic', 1, 0, NULL, 60, '2019-10-28 22:26:13', 60, '2019-10-28'),
(92, 'clinic', 2, 0, NULL, 60, '2019-10-28 22:26:11', 60, '2019-10-28'),
(93, 'citys', 9, 0, NULL, 60, '2019-10-28 21:41:49', 60, '2019-10-28'),
(94, 'citys', 10, 0, NULL, 60, '2019-10-28 21:42:35', 60, '2019-10-28'),
(95, 'citys', 11, 0, NULL, 60, '2019-10-28 21:42:33', 60, '2019-10-28'),
(96, 'clinic', 3, 0, NULL, 60, '2019-10-28 22:26:10', 60, '2019-10-28'),
(97, 'clinic', 4, 0, NULL, 60, '2019-10-28 22:26:08', 60, '2019-10-28'),
(98, 'clinic', 5, 1, NULL, 60, '2019-10-28 22:26:35', NULL, NULL),
(99, 'clinic', 6, 1, NULL, 60, '2019-10-28 22:28:26', NULL, NULL),
(100, 'clientes', 30, 1, NULL, 60, '2019-10-29 21:17:32', NULL, NULL),
(101, 'clientes', 31, 1, NULL, 60, '2019-10-29 21:28:14', NULL, NULL),
(102, 'clientes', 32, 1, NULL, 60, '2019-10-29 21:28:57', NULL, NULL),
(103, 'clientes', 33, 1, NULL, 60, '2019-10-29 21:29:20', NULL, NULL),
(104, 'clientes', 34, 1, NULL, 60, '2019-10-29 22:40:27', NULL, NULL),
(105, 'clientes', 35, 1, NULL, 60, '2019-10-29 22:21:32', NULL, NULL),
(106, 'clientes', 36, 0, NULL, 60, '2019-10-30 15:27:23', 60, '2019-10-30'),
(107, 'modulos', 47, 0, NULL, 60, '2019-11-10 20:01:39', NULL, '2019-11-10'),
(108, 'funciones', 22, 0, NULL, 60, '2019-11-10 20:02:37', NULL, '2019-11-10'),
(109, 'clinic', 7, 1, NULL, 60, '2019-10-30 16:22:16', NULL, NULL),
(110, 'users', 62, 1, NULL, 60, '2019-10-30 16:32:13', NULL, NULL),
(111, 'funciones', 23, 0, NULL, 60, '2019-11-10 20:02:33', NULL, '2019-11-10'),
(112, 'citys', 1, 1, NULL, 60, '2019-10-30 17:33:18', NULL, NULL),
(113, 'lines_business', 2, 1, NULL, 60, '2019-10-30 20:25:20', NULL, NULL),
(114, 'lines_business', 3, 1, NULL, 60, '2019-10-30 20:25:16', NULL, NULL),
(115, 'lines_business', 4, 0, NULL, 60, '2019-10-30 20:25:47', 60, '2019-10-30'),
(116, 'lines_business', 5, 0, NULL, 60, '2019-10-30 20:25:45', 60, '2019-10-30'),
(117, 'clientes', 37, 1, NULL, 60, '2019-10-30 20:34:14', NULL, NULL),
(118, 'clientes', 38, 1, NULL, 60, '2019-10-30 20:35:45', NULL, NULL),
(119, 'clientes', 39, 1, NULL, 60, '2019-10-30 20:44:56', NULL, NULL),
(120, 'clientes', 40, 1, NULL, 60, '2019-10-30 20:49:07', NULL, NULL),
(121, 'clientes', 41, 1, NULL, 60, '2019-10-30 20:50:32', NULL, NULL),
(122, 'clientes', 42, 1, NULL, 60, '2019-10-30 20:51:23', NULL, NULL),
(123, 'clientes', 43, 1, NULL, 60, '2019-10-30 20:52:29', NULL, NULL),
(124, 'clientes', 44, 1, NULL, 60, '2019-10-30 20:53:26', NULL, NULL),
(125, 'users', 63, 1, NULL, 60, '2019-10-30 21:02:19', NULL, NULL),
(126, 'users', 64, 1, NULL, 60, '2019-10-30 21:02:29', NULL, NULL),
(127, 'users', 65, 1, NULL, 60, '2019-10-30 21:02:45', NULL, NULL),
(128, 'clientes', 45, 1, NULL, 65, '2019-10-30 21:03:57', NULL, NULL),
(129, 'clientes', 46, 1, NULL, 65, '2019-10-31 20:59:41', NULL, NULL),
(130, 'clientes', 47, 1, NULL, 65, '2019-10-31 21:00:14', NULL, NULL),
(131, 'funciones', 24, 0, NULL, 60, '2019-11-10 20:02:28', NULL, '2019-11-10'),
(132, 'queries', 1, 0, NULL, 60, '2019-11-02 16:00:03', 60, '2019-11-02'),
(133, 'queries', 2, 0, NULL, 60, '2019-11-08 20:04:23', 60, '2019-11-08'),
(134, 'queries', 3, 1, NULL, 60, '2019-11-02 16:00:00', NULL, NULL),
(135, 'queries', 4, 1, NULL, 60, '2019-11-02 16:00:33', NULL, NULL),
(136, 'queries', 5, 1, NULL, 60, '2019-11-02 16:20:16', NULL, NULL),
(137, 'funciones', 25, 1, NULL, 60, '2019-11-10 20:07:24', NULL, NULL),
(138, 'category', 2, 1, NULL, 60, '2019-11-10 20:31:02', NULL, NULL),
(139, 'category', 3, 1, NULL, 60, '2019-11-10 20:41:42', NULL, NULL),
(140, 'category', 4, 1, NULL, 60, '2019-11-10 20:41:55', NULL, NULL),
(141, 'category', 5, 1, NULL, 60, '2019-11-10 20:42:09', NULL, NULL),
(142, 'category', 6, 1, NULL, 60, '2019-11-10 20:47:10', NULL, NULL),
(143, 'category', 7, 1, NULL, 60, '2019-11-10 20:47:14', NULL, NULL),
(144, 'category', 8, 0, NULL, 60, '2019-11-10 20:47:25', 60, '2019-11-10'),
(145, 'category', 9, 0, NULL, 60, '2019-11-10 20:47:45', 60, '2019-11-10'),
(146, 'funciones', 26, 1, NULL, 60, '2019-11-10 20:52:49', NULL, NULL),
(147, 'benefits', 1, 1, NULL, 60, '2019-11-10 23:14:44', NULL, NULL),
(148, 'benefits', 2, 1, NULL, 60, '2019-11-10 23:15:47', NULL, NULL),
(149, 'benefits', 3, 1, NULL, 60, '2019-11-10 23:19:01', NULL, NULL),
(150, 'benefits', 4, 0, NULL, 60, '2019-11-10 23:19:15', 60, '2019-11-10'),
(151, 'funciones', 27, 1, NULL, 60, '2019-11-11 00:04:27', NULL, NULL),
(152, 'customer_support', 1, 1, NULL, 60, '2019-11-11 00:49:19', NULL, NULL),
(153, 'customer_support', 2, 1, NULL, 60, '2019-11-11 00:51:18', NULL, NULL),
(154, 'customer_support', 3, 1, NULL, 60, '2019-11-11 00:57:45', NULL, NULL),
(155, 'customer_support', 4, 1, NULL, 60, '2019-11-11 04:57:43', NULL, NULL),
(156, 'customer_support', 5, 0, NULL, 60, '2019-11-11 00:58:01', 60, '2019-11-11'),
(157, 'funciones', 28, 1, NULL, 60, '2019-11-11 04:58:58', NULL, NULL),
(158, 'way_to_pay', 1, 1, NULL, 60, '2019-11-11 05:29:13', NULL, NULL),
(159, 'way_to_pay', 2, 1, NULL, 60, '2019-11-11 05:32:18', NULL, NULL),
(160, 'way_to_pay', 3, 1, NULL, 60, '2019-11-11 05:32:37', NULL, NULL),
(161, 'way_to_pay', 4, 1, NULL, 60, '2019-11-11 05:35:33', NULL, NULL),
(162, 'way_to_pay', 5, 1, NULL, 60, '2019-11-11 05:35:37', NULL, NULL),
(163, 'way_to_pay', 6, 0, NULL, 60, '2019-11-11 05:35:49', 60, '2019-11-11'),
(164, 'funciones', 29, 1, NULL, 60, '2019-11-11 05:37:20', NULL, NULL),
(165, 'countries', 1, 1, NULL, 60, '2019-11-11 05:53:47', NULL, NULL),
(166, 'countries', 2, 1, NULL, 60, '2019-11-11 05:53:54', NULL, NULL),
(167, 'countries', 3, 1, NULL, 60, '2019-11-11 05:54:00', NULL, NULL),
(168, 'countries', 4, 1, NULL, 60, '2019-11-11 05:54:05', NULL, NULL),
(169, 'countries', 5, 1, NULL, 60, '2019-11-11 05:54:10', NULL, NULL),
(170, 'countries', 6, 0, NULL, 60, '2019-11-11 05:57:11', 60, '2019-11-11'),
(171, 'countries', 7, 0, NULL, 60, '2019-11-11 05:57:05', 60, '2019-11-11'),
(172, 'funciones', 30, 1, NULL, 60, '2019-11-11 07:37:02', NULL, NULL),
(173, 'hosting', 2, 1, NULL, 60, '2019-11-11 21:45:30', NULL, NULL),
(174, 'hosting', 3, 1, NULL, 60, '2019-11-11 21:59:58', NULL, NULL),
(175, 'hosting', 4, 1, NULL, 60, '2019-11-12 00:57:54', NULL, NULL),
(176, 'hosting', 5, 1, NULL, 60, '2019-11-12 00:59:29', NULL, NULL),
(177, 'hosting', 6, 1, NULL, 60, '2019-11-12 01:05:40', NULL, NULL),
(178, 'hosting', 7, 1, NULL, 60, '2019-11-12 14:48:20', NULL, NULL),
(179, 'hosting', 8, 1, NULL, 60, '2019-11-12 20:10:37', NULL, NULL),
(180, 'hosting', 9, 1, NULL, 60, '2019-11-12 21:09:54', NULL, NULL),
(181, 'hosting', 10, 1, NULL, 60, '2019-11-12 21:11:38', NULL, NULL),
(182, 'hosting', 11, 1, NULL, 60, '2019-11-12 22:23:30', NULL, NULL),
(183, 'countries', 8, 0, NULL, 60, '2019-11-13 21:03:35', 60, '2019-11-13'),
(184, 'hosting', 12, 1, NULL, 60, '2019-11-14 21:38:07', NULL, NULL),
(185, 'hosting', 13, 1, NULL, 60, '2019-11-14 21:39:42', NULL, NULL),
(186, 'hosting', 14, 0, NULL, 60, '2019-11-14 22:08:25', 60, '2019-11-14'),
(187, 'hosting', 15, 1, NULL, 60, '2019-11-14 21:43:16', NULL, NULL),
(188, 'hosting', 16, 1, NULL, 60, '2019-11-14 21:44:47', NULL, NULL),
(189, 'hosting', 17, 0, NULL, 60, '2019-11-14 22:08:22', 60, '2019-11-14'),
(190, 'hosting', 18, 1, NULL, 60, '2019-11-15 19:29:24', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_users`
--

CREATE TABLE `auth_users` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `token` varchar(500) NOT NULL,
  `date_auth` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `auth_users`
--

INSERT INTO `auth_users` (`id`, `id_user`, `token`, `date_auth`) VALUES
(104, 60, '8de9c7243a9dc87ee5e806a7a90f898d0da36dcabbe0d25e707c84393252555725dac8843e34e51d41b0e1162ab2f31f9b40cbee9e2d59c3d059e1f16af59a5b', '2019-11-14 19:39:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `benefits`
--

CREATE TABLE `benefits` (
  `id_benefits` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `benefits`
--

INSERT INTO `benefits` (`id_benefits`, `nombre`) VALUES
(1, 'Garantia de Devolucion'),
(2, 'Dominio Gratis'),
(3, 'SSL Incluido'),
(4, 'Ut consequatur Natu3523523');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `benefits_hosting`
--

CREATE TABLE `benefits_hosting` (
  `id_benefits_hosting` int(11) NOT NULL,
  `id_benefits` int(11) NOT NULL,
  `id_hosting` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `benefits_hosting`
--

INSERT INTO `benefits_hosting` (`id_benefits_hosting`, `id_benefits`, `id_hosting`) VALUES
(6, 3, 4),
(7, 2, 4),
(8, 1, 5),
(50, 2, 6),
(60, 2, 9),
(61, 2, 8),
(62, 1, 8),
(63, 2, 7),
(65, 2, 12),
(66, 1, 13),
(67, 2, 14),
(68, 1, 14),
(69, 2, 15),
(70, 1, 16),
(103, 2, 17),
(104, 1, 17),
(117, 1, 11),
(118, 3, 10),
(119, 2, 10),
(120, 3, 3),
(121, 2, 18),
(122, 1, 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`id_category`, `nombre`) VALUES
(2, 'Hosting Web'),
(3, 'Hosting Economico'),
(4, 'Hosting Compartido'),
(5, 'Hosting WordPress'),
(6, 'Hosting VPS'),
(7, 'Servidores Dedicados'),
(8, 'Voluptas aut et nece'),
(9, 'Dolor itaque dolores');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `countries`
--

CREATE TABLE `countries` (
  `id_countries` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `countries`
--

INSERT INTO `countries` (`id_countries`, `nombre`) VALUES
(1, 'Argentina'),
(2, 'Venezuela'),
(3, 'Colombia'),
(4, 'Peru'),
(5, 'Chile'),
(6, 'Quis anim odio et an'),
(7, 'Quo quia veniam dol'),
(8, 'Quae qui aute iusto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customer_support`
--

CREATE TABLE `customer_support` (
  `id_customer_support` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `customer_support`
--

INSERT INTO `customer_support` (`id_customer_support`, `nombre`) VALUES
(1, 'Disponible en Español'),
(2, 'Soporte 24/7'),
(3, 'Chat Online'),
(4, 'Telefono'),
(5, 'Ea quia rerum sint u');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customer_support_hosting`
--

CREATE TABLE `customer_support_hosting` (
  `id_custumer_support_hosting` int(11) NOT NULL,
  `id_customer_support` int(11) NOT NULL,
  `id_hosting` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `customer_support_hosting`
--

INSERT INTO `customer_support_hosting` (`id_custumer_support_hosting`, `id_customer_support`, `id_hosting`) VALUES
(8, 3, 4),
(9, 2, 4),
(10, 1, 4),
(11, 3, 5),
(66, 3, 6),
(78, 3, 9),
(79, 4, 8),
(80, 1, 8),
(81, 2, 7),
(82, 1, 7),
(85, 3, 12),
(86, 2, 12),
(87, 2, 13),
(88, 1, 13),
(89, 3, 14),
(90, 1, 14),
(91, 3, 15),
(92, 3, 16),
(93, 2, 16),
(126, 2, 17),
(127, 1, 17),
(149, 3, 11),
(150, 2, 11),
(151, 4, 10),
(152, 3, 10),
(153, 2, 10),
(154, 4, 3),
(155, 3, 3),
(156, 1, 3),
(157, 3, 18),
(158, 2, 18),
(159, 1, 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_personales`
--

CREATE TABLE `datos_personales` (
  `id_datos_personales` int(20) NOT NULL,
  `id_usuario` int(20) DEFAULT NULL,
  `nombres` varchar(200) NOT NULL,
  `apellido_p` varchar(200) NOT NULL,
  `apellido_m` varchar(200) NOT NULL,
  `n_cedula` varchar(200) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `telefono` varchar(200) NOT NULL,
  `direccion` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `datos_personales`
--

INSERT INTO `datos_personales` (`id_datos_personales`, `id_usuario`, `nombres`, `apellido_p`, `apellido_m`, `n_cedula`, `fecha_nacimiento`, `telefono`, `direccion`) VALUES
(19, 57, 'Javer', 'Laborum Tempor id q', 'ttttttttttttt', '241421421414', '1989-08-22', '41242144', 'hhhhhhhhhhhhhhh'),
(22, 60, 'Carlos', 'Cardenas', 'Albarran', '23559081', '1994-03-03', '3152077862', 'calle 47A, #6AB-30, Bosque Verde');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funciones`
--

CREATE TABLE `funciones` (
  `id_funciones` int(11) NOT NULL,
  `id_modulo` int(11) DEFAULT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `posicion` int(2) NOT NULL,
  `route` varchar(100) NOT NULL,
  `visibilidad` int(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `funciones`
--

INSERT INTO `funciones` (`id_funciones`, `id_modulo`, `nombre`, `descripcion`, `posicion`, `route`, `visibilidad`) VALUES
(7, 41, 'Usuarios', 'Usuariosssss', 1, 'users', 1),
(8, 41, 'Modulos', 'Modulos', 2, 'modules', 1),
(9, 41, 'Funciones', 'Gestion de Vistas', 3, 'funciones', 1),
(10, 41, 'Roles', 'Roles', 5, 'rol', 1),
(12, 42, 'Deleniti nulla magna', 'Qui nobis ipsum har', 12, 'Voluptatem reprehen', 1),
(13, 42, 'Nisi dolor optio de', 'Aute eveniet quas s', 10, 'Proident ipsa qui', 1),
(14, 42, 'bbbbbbbbbb', 'bbbbbbbbbbbbb', 9, 'bbbbbbbbbbb', 1),
(17, 42, 'ttttttttttttt', 'Sint nisi sit temp', 11, 'Et vero suscipit Nam', 1),
(18, 41, 'Provident ut ut ips', 'Eaque et id odit qui', 4, 'Odio dolorem lorem d', 1),
(19, 45, 'Pacientes', 'Registro de pacientes y Clientes', 2, 'clients', 1),
(20, 42, 'Ciudades', 'Ciudades', 7, 'citys', 1),
(21, 42, 'Clinicas', 'Gestion de Clinicas', 6, 'clinics', 1),
(22, 47, 'Revisión', 'Gestion de las citas de Revision del paciente', 2, 'revision-appointment', 1),
(23, 42, 'Lineas de Negocio', 'Lineas de Negocio', 8, 'business-lines', 1),
(24, 47, 'Consultas', 'Consulta Inicial', 1, 'queries', 1),
(25, 42, 'Categorias', 'Cartegorias', 1, 'category', 1),
(26, 42, 'Beneficios', 'Gestion de Beneficios', 2, 'benefits', 1),
(27, 42, 'Atencion al Cliente', 'Gestion Atencion al Cliente', 3, 'customer-support', 1),
(28, 42, 'Formas de Pago', 'Gestion de Formas de Pago', 4, 'way-to-pay', 1),
(29, 42, 'Paises', 'Gestion de Paises', 5, 'countries', 1),
(30, 45, 'Hosting', 'Gestion de Hosting', 1, 'hosting', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hosting`
--

CREATE TABLE `hosting` (
  `id_hosting` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `precio` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `category` int(11) NOT NULL,
  `country` int(11) NOT NULL,
  `logo` varchar(300) DEFAULT NULL,
  `garantia` int(1) NOT NULL,
  `ssl_free` int(1) NOT NULL,
  `domain` int(1) NOT NULL,
  `support_spanish` int(1) NOT NULL,
  `url` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `hosting`
--

INSERT INTO `hosting` (`id_hosting`, `name`, `precio`, `description`, `category`, `country`, `logo`, `garantia`, `ssl_free`, `domain`, `support_spanish`, `url`) VALUES
(3, 'Siteground', '1000', 'Certificados SSL Let’s Encrypt gratis\r\n Migración de sitio web gratuita\r\n Instalador de WordPress y Joomla\r\n Cuentas de correo y bases de datos ilimitadas\r\n Backups diarios automáticos gratis', 6, 4, 'logo-siteground-blanco.png', 1, 1, 1, 1, 'http://127.0.0.1:8000/compare'),
(6, 'Hostinger', '244', 'Hosting web barato con PHP, MySQL y FTP\r\n Dominios gratis y SSL incluidos\r\n Sencillo creador de sitios web\r\n Instalador automático de aplicaciones\r\n Copias de seguridad semanales o diarias', 5, 2, 'logo-hostinger-blanco.png', 1, 1, 1, 1, ''),
(7, 'GoDaddy', '214214', 'Compra con 1 clic de recursos adicionales (CPU, RAM, I/O, etc.)\r\n Protección contra DDoS y monitoreo de seguridad 24/7\r\n Instalación con 1 clic de más de 125 aplicaciones gratis\r\n 1 GB de almacenamiento en base de datos (MySQL Linux)', 2, 3, 'logo-godaddy-blanco.png', 1, 1, 1, 1, ''),
(8, 'Hostgator', '5000', 'Creador de Sitios Web Gratis\r\n Cuentas de Correo Ilimitadas\r\n Instalador automático de aplicaciones\r\n Bases de datos MySQL ilimitadas con acceso phpMyAdmin\r\n 4,500 plantillas de sitios web', 7, 4, 'logo-hostgator-blanco.png', 1, 1, 1, 1, ''),
(9, 'BlueHost', '12424', 'Bases de datos MySQL ilimitadas\r\n Cuentas de correo electrónico POP3 ilimitadas con SMTP\r\n Instalador de aplicaciones gratuito (WordPress, Joomla, Drupal, etc)', 4, 4, 'logo-bluehost-blanco.png', 1, 1, 1, 1, ''),
(10, 'Neolo', '21424', 'Constructor de sitios con WordPress\r\n +200 aplicaciones instalables con 1 clic desde el panel de control\r\n Alta en buscadores gratis (Google, Yahoo! y Bing)\r\n Ilimitadas bases de datos MySQL y cuentas de correo electrónico\r\n Certificado SSL gratuito con cuenta de Cloudflare', 3, 3, 'logo-neolo-blanco.png', 1, 1, 1, 1, 'http://127.0.0.1:8000/compare'),
(11, 'Barbara Torres', 'Nisi nostrum rerum a', 'Necessitatibus sed v', 4, 1, '9db0b515-3a0e-4a59-bec7-256fe604bcef.jpg', 0, 1, 0, 1, 'http://127.0.0.1:8000/compare'),
(14, 'Kiayada Conner', 'Maxime cum est minim', 'Obcaecati odit dolor', 7, 1, 'default (1).png', 1, 1, 1, 1, ''),
(17, 'Alyssa Evans', 'Impedit qui digniss', 'Sunt voluptas cum ip', 5, 2, 'default (1).png', 0, 0, 1, 1, ''),
(18, 'Jemima Ford', 'Explicabo Et adipis', 'Ut aliqua Exercitat', 6, 2, 'mediana2.jpg', 0, 1, 0, 0, 'https://www.comparahosting.com/hosting/wordpress/');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos`
--

CREATE TABLE `modulos` (
  `id_modulo` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `icon` varchar(200) NOT NULL,
  `posicion` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `modulos`
--

INSERT INTO `modulos` (`id_modulo`, `nombre`, `descripcion`, `icon`, `posicion`) VALUES
(41, 'Perfiles', 'Admistracion de Usuarios, Roles y Modulos', 'fas fa-users', 3),
(42, 'Configuracion', 'Configuraciones', 'fas fa-cog', 5),
(43, 'Quos velit consequat', 'Doloremque quis cupi', '', 6),
(44, 'Fugit molestiae con', 'Nostrud ut ipsa ill', '', 7),
(45, 'Catálogos', 'Catálogos', 'fas fa-book', 1),
(46, 'Sit repudiandae dol', 'Nulla libero tempora', 'Non voluptatibus vit', 3),
(47, 'Citas', 'Gestion de Citas', 'fas fa-calendar-alt', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `nombre_rol` varchar(50) NOT NULL,
  `descripcion_rol` varchar(200) DEFAULT NULL,
  `editable_rol` int(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `nombre_rol`, `descripcion_rol`, `editable_rol`) VALUES
(6, 'Administrador', 'Control total', 1),
(7, 'Esse a ea tempore', 'Voluptatem consequat', 1),
(8, 'aaaaaaaaaaa', 'bbbbbbbbbbbbbb', 1),
(9, 'Asesor', 'Algunas Funciones', 1),
(10, 'Non dolor modi dolor', 'Nesciunt debitis ei', 1),
(11, 'Asperiores saepe qua', 'Consequuntur irure i', 1),
(12, 'Excepteur iure ad cu', 'Minima temporibus si', 1),
(13, 'Amet sed iure repre', 'Adipisci explicabo', 1),
(14, 'Nulla beatae rerum o', 'Minim rem voluptatem', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol_operaciones`
--

CREATE TABLE `rol_operaciones` (
  `id_rol_operaciones` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `id_funciones` int(11) NOT NULL,
  `admin_rol_operaciones` int(1) DEFAULT 0,
  `registrar` int(11) NOT NULL DEFAULT 1,
  `general` int(11) NOT NULL DEFAULT 1,
  `detallada` int(1) NOT NULL DEFAULT 1,
  `actualizar` int(11) NOT NULL DEFAULT 1,
  `eliminar` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rol_operaciones`
--

INSERT INTO `rol_operaciones` (`id_rol_operaciones`, `id_rol`, `id_funciones`, `admin_rol_operaciones`, `registrar`, `general`, `detallada`, `actualizar`, `eliminar`) VALUES
(30, 8, 12, 0, 1, 1, 1, 1, 1),
(31, 8, 7, 0, 1, 1, 1, 1, 1),
(32, 8, 9, 0, 1, 1, 1, 1, 1),
(33, 14, 10, 0, 1, 1, 1, 1, 1),
(34, 13, 8, 0, 1, 1, 1, 1, 1),
(105, 9, 22, 0, 1, 1, 1, 1, 1),
(106, 9, 19, 0, 1, 1, 1, 1, 1),
(107, 9, 20, 0, 1, 1, 1, 1, 1),
(108, 9, 24, 0, 1, 1, 1, 1, 1),
(148, 6, 29, 0, 1, 1, 1, 1, 1),
(149, 6, 27, 0, 1, 1, 1, 1, 1),
(150, 6, 25, 0, 1, 1, 1, 1, 1),
(151, 6, 26, 0, 1, 1, 1, 1, 1),
(152, 6, 28, 0, 1, 1, 1, 1, 1),
(153, 6, 7, 0, 1, 1, 1, 1, 1),
(154, 6, 8, 0, 1, 1, 1, 1, 1),
(155, 6, 9, 0, 1, 1, 1, 1, 1),
(156, 6, 10, 0, 1, 1, 1, 1, 1),
(157, 6, 30, 0, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_profile` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_rol` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `img_profile`, `remember_token`, `id_rol`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'cardenascarlos18@gmail.com24214214', NULL, '5b6fcaaa765cf72aec7e2f73d565af67', '', NULL, 6, NULL, NULL),
(54, NULL, 'nihubu@mailinator.com', NULL, 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'QUIROFANO.jpg', NULL, 8, '2019-10-21 20:45:04', '2019-10-21 22:48:33'),
(55, NULL, 'hibu@mailinator.com', NULL, 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'default (1).png', NULL, 6, '2019-10-21 20:56:10', '2019-10-21 20:56:10'),
(56, NULL, 'fapuhocyxo@mailinator.net', NULL, 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'TRATAMIENTOS-DE-PIEL.jpg', NULL, 6, '2019-10-21 21:24:03', '2019-10-22 02:25:30'),
(57, NULL, 'hhhhhhhhhhh@hhhhhhhhh.com', NULL, 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'default (1).png', NULL, 6, '2019-10-21 21:41:47', '2019-10-21 22:49:23'),
(58, NULL, 'vvvvvvvvvvvvvi@mailinator.com1313', NULL, 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'PROCEDIMIENTOS-MENORES.jpg', NULL, 8, '2019-10-22 01:43:37', '2019-10-22 02:25:21'),
(59, NULL, 'zebojy@mailinator.com', NULL, 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'mediana2.jpg', NULL, 8, '2019-10-23 01:27:23', '2019-10-23 01:27:23'),
(60, NULL, 'cardenascarlos18@gmail.com', NULL, '5b6fcaaa765cf72aec7e2f73d565af67', 'TRATAMIENTOS-DE-PIEL.jpg', NULL, 6, '2019-10-23 01:31:51', '2019-10-31 02:01:32'),
(61, NULL, 'lylisizok@mailinator.net', NULL, '202cb962ac59075b964b07152d234b70', 'grande2.jpg', NULL, 9, '2019-10-23 01:37:44', '2019-10-23 01:41:01'),
(62, NULL, 'kiluso@mailinator.net', NULL, 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'default (1).png', NULL, 9, '2019-10-30 21:32:13', '2019-10-30 21:32:13'),
(63, NULL, 'xiroguva@mailinator.com', NULL, 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'default (1).png', NULL, 9, '2019-10-31 02:02:19', '2019-10-31 02:02:50'),
(64, NULL, 'sebemycuh@mailinator.net', NULL, 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'default (1).png', NULL, 9, '2019-10-31 02:02:29', '2019-10-31 02:02:29'),
(65, NULL, 'muvic@mailinator.com', NULL, '202cb962ac59075b964b07152d234b70', 'default (1).png', NULL, 9, '2019-10-31 02:02:45', '2019-10-31 02:02:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `way_to_pay`
--

CREATE TABLE `way_to_pay` (
  `id_way_to_pay` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `way_to_pay`
--

INSERT INTO `way_to_pay` (`id_way_to_pay`, `nombre`) VALUES
(1, 'PayPal'),
(2, 'MasterdCard'),
(3, 'American Express'),
(4, 'Visa'),
(5, 'Discover'),
(6, 'Et officia aliquip i');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `way_to_pay_hosting`
--

CREATE TABLE `way_to_pay_hosting` (
  `id_way_to_pay_hosting` int(11) NOT NULL,
  `id_way_to_pay` int(11) NOT NULL,
  `id_hosting` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `way_to_pay_hosting`
--

INSERT INTO `way_to_pay_hosting` (`id_way_to_pay_hosting`, `id_way_to_pay`, `id_hosting`) VALUES
(9, 5, 4),
(10, 4, 4),
(11, 3, 4),
(12, 2, 4),
(13, 4, 5),
(14, 3, 5),
(15, 1, 5),
(111, 4, 6),
(112, 2, 6),
(126, 2, 9),
(127, 1, 8),
(128, 3, 7),
(130, 2, 12),
(131, 3, 13),
(132, 2, 13),
(133, 3, 14),
(134, 2, 14),
(135, 4, 15),
(136, 2, 15),
(137, 1, 15),
(138, 4, 16),
(139, 3, 16),
(140, 2, 16),
(141, 1, 16),
(158, 1, 17),
(174, 3, 11),
(175, 5, 10),
(176, 5, 3),
(177, 4, 3),
(178, 3, 3),
(179, 2, 3),
(180, 1, 3),
(181, 4, 18),
(182, 3, 18),
(183, 1, 18);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `auditoria`
--
ALTER TABLE `auditoria`
  ADD PRIMARY KEY (`id_auditoria`),
  ADD UNIQUE KEY `id_auditoria` (`id_auditoria`),
  ADD KEY `fk_usr_regins` (`usr_regins`),
  ADD KEY `fk_usr_regmod` (`usr_regmod`),
  ADD KEY `usr_regins` (`usr_regins`);

--
-- Indices de la tabla `auth_users`
--
ALTER TABLE `auth_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_user_id_user_idx` (`id_user`);

--
-- Indices de la tabla `benefits`
--
ALTER TABLE `benefits`
  ADD PRIMARY KEY (`id_benefits`);

--
-- Indices de la tabla `benefits_hosting`
--
ALTER TABLE `benefits_hosting`
  ADD PRIMARY KEY (`id_benefits_hosting`),
  ADD KEY `id_hosting_benefits_hosting_idx` (`id_hosting`),
  ADD KEY `id_benefits_benefits_hosting_idx` (`id_benefits`);

--
-- Indices de la tabla `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indices de la tabla `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id_countries`);

--
-- Indices de la tabla `customer_support`
--
ALTER TABLE `customer_support`
  ADD PRIMARY KEY (`id_customer_support`);

--
-- Indices de la tabla `customer_support_hosting`
--
ALTER TABLE `customer_support_hosting`
  ADD PRIMARY KEY (`id_custumer_support_hosting`),
  ADD KEY `id_hosting_customer_support_hosting_idx` (`id_hosting`),
  ADD KEY `id_customer_support_customer_support_idx` (`id_customer_support`);

--
-- Indices de la tabla `datos_personales`
--
ALTER TABLE `datos_personales`
  ADD PRIMARY KEY (`id_datos_personales`),
  ADD KEY `datos_personales_id_usuario_idx` (`id_usuario`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `funciones`
--
ALTER TABLE `funciones`
  ADD PRIMARY KEY (`id_funciones`),
  ADD UNIQUE KEY `id_lista_vista` (`id_funciones`),
  ADD UNIQUE KEY `nombre_lista_vista` (`nombre`),
  ADD KEY `Vistas_Modulo` (`id_modulo`);

--
-- Indices de la tabla `hosting`
--
ALTER TABLE `hosting`
  ADD PRIMARY KEY (`id_hosting`),
  ADD KEY `id_category_hosting_idx` (`category`),
  ADD KEY `id_country_hosting_idx` (`country`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `modulos`
--
ALTER TABLE `modulos`
  ADD PRIMARY KEY (`id_modulo`),
  ADD UNIQUE KEY `id_modulo_vista` (`id_modulo`),
  ADD UNIQUE KEY `nombre_modulo_vista` (`nombre`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`),
  ADD UNIQUE KEY `id_rol` (`id_rol`);

--
-- Indices de la tabla `rol_operaciones`
--
ALTER TABLE `rol_operaciones`
  ADD PRIMARY KEY (`id_rol_operaciones`),
  ADD UNIQUE KEY `id_rol_operaciones` (`id_rol_operaciones`),
  ADD KEY `Rol_Vista` (`id_rol`),
  ADD KEY `Vista_Rol` (`id_funciones`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `id` (`id`),
  ADD KEY `id_rol` (`id_rol`);

--
-- Indices de la tabla `way_to_pay`
--
ALTER TABLE `way_to_pay`
  ADD PRIMARY KEY (`id_way_to_pay`);

--
-- Indices de la tabla `way_to_pay_hosting`
--
ALTER TABLE `way_to_pay_hosting`
  ADD PRIMARY KEY (`id_way_to_pay_hosting`),
  ADD KEY `id_hosting_way_to_pay_hosting` (`id_hosting`),
  ADD KEY `id_way_to_pay_hosting_idx` (`id_way_to_pay`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `auditoria`
--
ALTER TABLE `auditoria`
  MODIFY `id_auditoria` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

--
-- AUTO_INCREMENT de la tabla `auth_users`
--
ALTER TABLE `auth_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT de la tabla `benefits`
--
ALTER TABLE `benefits`
  MODIFY `id_benefits` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `benefits_hosting`
--
ALTER TABLE `benefits_hosting`
  MODIFY `id_benefits_hosting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT de la tabla `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `countries`
--
ALTER TABLE `countries`
  MODIFY `id_countries` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `customer_support`
--
ALTER TABLE `customer_support`
  MODIFY `id_customer_support` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `customer_support_hosting`
--
ALTER TABLE `customer_support_hosting`
  MODIFY `id_custumer_support_hosting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT de la tabla `datos_personales`
--
ALTER TABLE `datos_personales`
  MODIFY `id_datos_personales` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `funciones`
--
ALTER TABLE `funciones`
  MODIFY `id_funciones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `hosting`
--
ALTER TABLE `hosting`
  MODIFY `id_hosting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `modulos`
--
ALTER TABLE `modulos`
  MODIFY `id_modulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `rol_operaciones`
--
ALTER TABLE `rol_operaciones`
  MODIFY `id_rol_operaciones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT de la tabla `way_to_pay`
--
ALTER TABLE `way_to_pay`
  MODIFY `id_way_to_pay` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `way_to_pay_hosting`
--
ALTER TABLE `way_to_pay_hosting`
  MODIFY `id_way_to_pay_hosting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `auditoria`
--
ALTER TABLE `auditoria`
  ADD CONSTRAINT `fk_auditoria_user_regins` FOREIGN KEY (`usr_regins`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `datos_personales`
--
ALTER TABLE `datos_personales`
  ADD CONSTRAINT `fk_id_usuario_datos_personales` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `funciones`
--
ALTER TABLE `funciones`
  ADD CONSTRAINT `Vistas_Modulo` FOREIGN KEY (`id_modulo`) REFERENCES `modulos` (`id_modulo`);

--
-- Filtros para la tabla `hosting`
--
ALTER TABLE `hosting`
  ADD CONSTRAINT `fk_id_category_hosting` FOREIGN KEY (`category`) REFERENCES `category` (`id_category`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_country` FOREIGN KEY (`country`) REFERENCES `countries` (`id_countries`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `rol_operaciones`
--
ALTER TABLE `rol_operaciones`
  ADD CONSTRAINT `Rol_Vista` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`) ON DELETE CASCADE,
  ADD CONSTRAINT `Vista_Rol` FOREIGN KEY (`id_funciones`) REFERENCES `funciones` (`id_funciones`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_id_rol` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
