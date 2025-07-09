-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 08-07-2025 a las 17:00:55
-- Versión del servidor: 10.6.22-MariaDB-cll-lve-log
-- Versión de PHP: 8.3.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mecani21_mecanica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autos`
--

USE mecani21_mecanica;

CREATE TABLE `autos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `year` varchar(255) DEFAULT NULL,
  `plate` varchar(255) DEFAULT NULL,
  `serie` varchar(100) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `status` enum('Activo','Eliminado') NOT NULL DEFAULT 'Activo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `autos`
--

INSERT INTO `autos` (`id`, `brand`, `model`, `year`, `plate`, `serie`, `client_id`, `comments`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Nissan', 'Versa', '2016', 'YYD-905-E', NULL, 1, NULL, 'Activo', '2025-03-01 03:44:01', '2025-03-01 03:44:01'),
(2, 'Mitsubishi', 'L200', '2013', 'YS-6460-C', NULL, 3, NULL, 'Activo', '2025-03-01 03:57:30', '2025-03-01 03:57:30'),
(3, 'Ford', 'Ranger', '2017', 'YS-6231-D', '8AFWR5AA3H6000287', 3, NULL, 'Activo', '2025-03-01 03:58:55', '2025-03-01 03:58:55'),
(4, 'Chevrolet', 'Beat', '2020', 'YZJ-137-E', 'MA6CB5CD5LT009105', 4, NULL, 'Activo', '2025-03-01 04:04:27', '2025-03-01 04:04:27'),
(5, 'Toyota', 'Camry', '2007', 'ZBE-290-E', '4T1BE46K97U620497', 5, NULL, 'Activo', '2025-03-01 04:08:43', '2025-03-01 04:08:43'),
(6, 'Mercedes Benz', 'GLK 280', '2009', NULL, 'WDCGG81D99F273937', 6, 'Camioneta color Negra', 'Activo', '2025-03-01 04:28:09', '2025-03-01 04:28:09'),
(7, 'Mercedes Benz', 'GLK 300', '2014', NULL, 'WDCGG9AB2EG310691', 6, 'Camioneta color Blanca', 'Activo', '2025-03-01 04:30:12', '2025-03-01 04:30:12'),
(8, 'Mazda', 'CX-7', '2012', NULL, NULL, 7, NULL, 'Activo', '2025-03-01 04:36:37', '2025-03-01 04:36:37'),
(9, 'Mercedes Benz', 'C 180', '2015', NULL, NULL, 8, NULL, 'Activo', '2025-03-01 04:44:09', '2025-03-01 04:44:09'),
(10, 'Lincoln', 'MKC', '2017', NULL, NULL, 8, NULL, 'Activo', '2025-03-01 04:46:37', '2025-03-01 04:46:37'),
(11, 'Suzuki', 'Swift', '2023', NULL, NULL, 2, 'Chaquetin Suzuki blanco', 'Activo', '2025-03-01 04:53:41', '2025-03-01 04:53:41'),
(12, 'Ford', 'Ranger', '2008', NULL, '8AFDT50D886173565', 9, NULL, 'Activo', '2025-03-03 16:32:49', '2025-03-03 16:32:49'),
(13, 'Mercedes Benz', 'CLA 250', '2017', NULL, 'WDDSJ4EB2HN413842', 10, NULL, 'Activo', '2025-03-03 16:50:34', '2025-03-03 16:50:34'),
(14, 'BMW', '320i', '2016', NULL, 'WBA8A1100GK666484', 11, NULL, 'Activo', '2025-03-04 22:53:17', '2025-03-04 22:53:17'),
(15, 'Honda', 'CR-V', '2021', NULL, '1HGRW1898ML901525', 10, NULL, 'Activo', '2025-03-05 20:45:34', '2025-03-05 20:45:34'),
(16, 'Chevrolet', 'Spark', '2016', NULL, NULL, 13, NULL, 'Activo', '2025-03-08 01:55:22', '2025-03-08 01:55:22'),
(17, 'Seat', 'Toledo', '2018', NULL, 'VSSAE4NH1J1503414', 14, NULL, 'Activo', '2025-03-10 20:33:21', '2025-03-10 20:33:21'),
(18, 'Honda', 'Fit', '2016', NULL, '3HGGK5752GM004731', 15, NULL, 'Activo', '2025-03-12 16:24:19', '2025-03-12 16:24:19'),
(21, 'Nissan', 'March', '2018', NULL, '3N1CK3CD8JL274884', 16, NULL, 'Activo', '2025-03-14 16:57:30', '2025-03-14 16:57:30'),
(22, 'Suzuki', 'Swift', '2013', NULL, 'JS2ZC82S5D6108649', 2, 'Chaquetin Suzuki verde', 'Activo', '2025-03-15 18:41:27', '2025-03-15 18:41:27'),
(23, 'Nissan', 'NP 300', '2009', NULL, '3N6DD25T39K059227', 17, NULL, 'Activo', '2025-03-18 17:16:25', '2025-03-18 17:16:25'),
(24, 'Mercedes Benz', 'GLK 280', '2019', NULL, 'WDC0G4KB9KF463072', 18, NULL, 'Activo', '2025-03-22 00:15:44', '2025-03-22 00:15:44'),
(25, 'Audi', 'A4', '2001', NULL, 'WAUAC28D91A099652', 12, NULL, 'Activo', '2025-03-22 00:39:13', '2025-03-22 00:39:13'),
(26, 'Chevrolet', 'Aveo', '2017', NULL, '3G1TA5AF2HL131707', 19, NULL, 'Activo', '2025-03-25 18:30:04', '2025-03-25 18:30:04'),
(27, 'Mercedes Benz', 'C 230 KOMPRESSOR', '2000', NULL, NULL, 20, NULL, 'Activo', '2025-04-01 04:32:51', '2025-04-01 04:32:51'),
(28, 'Mercedes Benz', 'C 200', '2012', NULL, 'WDDGF4JB1CA589729', 4, NULL, 'Activo', '2025-04-01 15:18:12', '2025-04-01 15:18:12'),
(29, 'BMW', 'Mini Cooper S', '2018', NULL, 'WMWXM7100J2G85553', 21, NULL, 'Activo', '2025-04-22 00:29:04', '2025-04-22 00:29:04'),
(30, 'BMW', 'Mini Cooper', '2015', NULL, 'WMWXM5100F3A13336', 22, NULL, 'Activo', '2025-04-22 00:38:21', '2025-04-22 00:38:21'),
(31, 'Mercedes Benz', 'C 180', '2013', NULL, 'WDDGF3BB0DF951952', 23, NULL, 'Activo', '2025-04-22 00:47:03', '2025-04-22 00:47:03'),
(32, 'Audi', 'A6', '2000', NULL, 'WAUEH54B5YN079507', 24, NULL, 'Activo', '2025-04-22 00:53:13', '2025-04-22 00:53:13'),
(33, 'BMW', '420i', '2018', NULL, 'WBA4D3107HG767897', 25, NULL, 'Activo', '2025-04-25 03:23:43', '2025-04-25 03:23:43'),
(34, 'Kia', 'Sorento', '2019', NULL, '5XYPG4A32KG573103', 26, NULL, 'Activo', '2025-04-25 03:36:04', '2025-04-25 03:36:04'),
(35, 'Mazda', 'Mazda 3', '2014', NULL, 'JM1BM1W39E1132728', 25, 'Motor 2.5L', 'Activo', '2025-04-25 15:55:33', '2025-04-25 15:55:33'),
(36, 'BMW', 'X3', '2013', NULL, 'WBAWX9106D0C74513', 27, NULL, 'Activo', '2025-04-28 23:57:40', '2025-04-28 23:57:40'),
(37, 'Chevrolet', 'Chevy', '2004', NULL, '3G1SF61X04S150400', 28, NULL, 'Activo', '2025-05-08 19:12:11', '2025-05-08 19:12:11'),
(38, 'Nissan', 'NP 300', '2014', NULL, NULL, 29, NULL, 'Activo', '2025-05-13 18:56:58', '2025-05-13 18:56:58'),
(39, 'GMC', 'Acadia', '2017', NULL, '1GKKNKLAXHZ296215', 30, NULL, 'Activo', '2025-05-13 22:15:40', '2025-05-13 22:15:40'),
(40, 'Toyota', 'Avanza', '2009', NULL, 'MHFMC13F59K004727', 31, NULL, 'Activo', '2025-05-17 00:16:20', '2025-05-17 00:16:20'),
(41, 'Ford', 'Fiesta Ikon', '2012', NULL, 'MAJFP1HD3CC108804', 2, NULL, 'Activo', '2025-05-19 18:08:44', '2025-05-19 18:08:44'),
(42, 'Mercedes Benz', 'C 280', '1995', NULL, 'WDB2020285F194493', 32, NULL, 'Activo', '2025-05-19 18:44:31', '2025-05-19 18:44:31'),
(43, 'Ford', 'EcoSport', '2015', NULL, 'MAJUP3SF0FC138523', 33, NULL, 'Activo', '2025-05-19 18:59:29', '2025-05-19 18:59:29'),
(44, 'Nissan', 'NP 300', '2018', NULL, NULL, 29, NULL, 'Activo', '2025-05-29 19:37:26', '2025-05-29 19:37:26'),
(45, 'Toyota', 'Sienna', '2022', NULL, '5TDGRKEC3NS107082', 34, NULL, 'Activo', '2025-06-05 00:34:08', '2025-06-05 00:34:08'),
(46, 'Seat', 'Ibiza', '2013', NULL, 'VSSMK46J1DR057827', 35, NULL, 'Activo', '2025-06-05 23:34:05', '2025-06-05 23:34:05'),
(47, 'Dodge', 'Grand Caravan', '2019', NULL, '2C4RDGBGXKR538731', 36, NULL, 'Activo', '2025-06-10 23:40:33', '2025-06-10 23:40:33'),
(48, 'XXXX', 'XXXX', 'XXXX', NULL, 'XXXXXXXXXXXXXXX', 37, NULL, 'Activo', '2025-06-10 23:44:08', '2025-06-10 23:44:08'),
(49, 'Jeep', 'Compass', '2014', NULL, '1C4AJCAB2ED629570', 38, NULL, 'Activo', '2025-06-16 19:36:04', '2025-06-16 19:36:04'),
(50, 'Mitsubishi', 'L200', '2022', NULL, 'MMBMLV5G6NH054899', 3, NULL, 'Activo', '2025-06-16 22:27:39', '2025-06-16 22:27:39'),
(51, 'Audi', 'Q7', '2011', NULL, 'WAUAGD4LXBD002701', 26, NULL, 'Activo', '2025-06-25 17:15:10', '2025-06-25 17:15:10'),
(52, 'Chevrolet', 'Traverse', '2010', NULL, '1GNLVFED5AJ205569', 39, NULL, 'Activo', '2025-07-04 00:23:11', '2025-07-04 00:23:11'),
(53, 'Nissan', 'NP 300', '2008', NULL, '3N6DD14S68K018317', 29, 'Camioneta Roja', 'Activo', '2025-07-04 23:21:39', '2025-07-04 23:21:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand` varchar(255) NOT NULL,
  `premium` tinyint(1) NOT NULL,
  `icon` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `brands`
--

INSERT INTO `brands` (`id`, `brand`, `premium`, `icon`) VALUES
(1, 'Nissan', 0, NULL),
(2, 'Mitsubishi', 0, NULL),
(3, 'Ford', 0, NULL),
(4, 'Chevrolet', 0, NULL),
(5, 'Toyota', 0, NULL),
(6, 'Mercedes Benz', 1, NULL),
(7, 'Mazda', 0, NULL),
(8, 'Lincoln', 1, NULL),
(9, 'Suzuki', 0, NULL),
(10, 'BMW', 1, NULL),
(11, 'Honda', 0, NULL),
(12, 'Seat', 1, NULL),
(13, 'Audi', 1, NULL),
(14, 'Kia', 0, NULL),
(15, 'GMC', 0, NULL),
(16, 'Dodge', 0, NULL),
(17, 'XXXX', 0, NULL),
(18, 'Jeep', 0, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calendar`
--

CREATE TABLE `calendar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `client_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `notified` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `calendar`
--

INSERT INTO `calendar` (`id`, `event`, `description`, `client_id`, `car_id`, `date`, `status`, `notified`, `created_at`, `updated_at`) VALUES
(1, 'Mantenimiento programado', 'Mantenimiento: Suzuki Swift', 2, 11, '2025-08-28', 'Pendiente', 1, '2025-04-01 16:00:04', '2025-04-01 16:00:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `postcode` varchar(255) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `rfc` varchar(255) DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `status` enum('Activo','Eliminado') NOT NULL DEFAULT 'Activo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `clients`
--

INSERT INTO `clients` (`id`, `name`, `email`, `phone`, `postcode`, `street`, `address`, `city`, `state`, `rfc`, `comments`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Sandra Elena Rosado Rodriguez', 'levicorazon7@gmail.com', '9993623334', '97143', 'C- 33 #336 x 20 y 22', 'Polígono 108', 'Mérida', 'Yucatán', NULL, NULL, 'Activo', '2025-03-01 03:36:25', '2025-03-01 03:36:25'),
(2, 'Uriel Antonio Ruiz Yupit', 'antonio_012994@hotmail.com', '9991408358', '97302', NULL, 'Las Américas', 'Mérida', 'Yucatán', NULL, NULL, 'Activo', '2025-03-01 03:50:19', '2025-03-01 03:50:19'),
(3, 'Jovani Arodi', NULL, '9995887787', '97290', 'C- 179a #731 x 98 y 100', 'San Antonio Xluch II', 'Mérida', 'Yucatán', NULL, NULL, 'Activo', '2025-03-01 03:52:55', '2025-03-01 03:52:55'),
(4, 'Jose Eduardo Blanco Encalada', 'lalola838@gmail.com', '9992029833', '97390', 'C- 31k #674e x 36c y 36a', 'Acim I', 'Umán', 'Yucatán', NULL, NULL, 'Activo', '2025-03-01 04:02:22', '2025-03-01 04:02:22'),
(5, 'Roberto Leal', NULL, '9991513495', '97000', NULL, 'Mérida Centro', 'Mérida', 'Yucatán', NULL, NULL, 'Activo', '2025-03-01 04:05:27', '2025-03-01 04:05:27'),
(6, 'Gerardo Abraham Pujula Tiburcio', 'gerardopujula@yahoo.com.mx', '9993388788', '97130', 'C- 23 #306 x 32 y 34', 'Montecarlo', 'Mérida', 'Yucatán', NULL, NULL, 'Activo', '2025-03-01 04:23:54', '2025-03-01 04:23:54'),
(7, 'Carlos Chan', NULL, '9993661948', NULL, NULL, '- Selecciona una colonia -', NULL, NULL, NULL, NULL, 'Activo', '2025-03-01 04:34:03', '2025-03-01 04:34:03'),
(8, 'Armando López', NULL, '9991464650', '97113', 'C-12b #318a x 17 y 19', 'Montebello', 'Mérida', 'Yucatán', NULL, NULL, 'Activo', '2025-03-01 04:43:13', '2025-03-01 04:43:13'),
(9, 'Cesar Edgardo Aguilar Mex', NULL, '9995075694', '97370', 'C- 25 #580 x 32 y 34', 'San Pedro Noh Pat', 'Kanasín', 'Yucatán', NULL, NULL, 'Activo', '2025-03-03 16:32:23', '2025-03-03 16:32:23'),
(10, 'Omar Baeza', NULL, '9995689951', '97246', 'C- 33 #517 x 36 y 38', 'Juan Pablo II', 'Mérida', 'Yucatán', NULL, NULL, 'Activo', '2025-03-03 16:48:15', '2025-03-03 16:48:15'),
(11, 'Roger Alonso', NULL, '9811712253', NULL, NULL, '- Selecciona una colonia -', NULL, NULL, NULL, NULL, 'Activo', '2025-03-04 22:52:08', '2025-03-04 22:52:08'),
(12, 'Francisco Javier Rubio Magaña', NULL, '9994484463', '97306', 'C- 142a #734 x 135 y 137', 'Los Héroes', 'Mérida', 'Yucatán', NULL, NULL, 'Activo', '2025-03-08 01:41:13', '2025-03-08 01:41:13'),
(13, 'Carlos Chablé Contreras', NULL, '9991070877', NULL, NULL, '- Selecciona una colonia -', NULL, NULL, NULL, NULL, 'Activo', '2025-03-08 01:52:54', '2025-03-08 01:52:54'),
(14, 'Luis Renan Domínguez Rosado', NULL, '9993266914', '97306', 'C- 115 #640 x 144 y 146', 'Los Héroes', 'Mérida', 'Yucatán', NULL, NULL, 'Activo', '2025-03-10 20:32:24', '2025-03-10 20:32:24'),
(15, 'Alexis Gimenez Mata', NULL, '5531485350', NULL, NULL, '- Selecciona una colonia -', NULL, NULL, NULL, NULL, 'Activo', '2025-03-12 16:23:15', '2025-03-12 16:23:15'),
(16, 'Ismael Giovanhy López Bates', NULL, '9992676962', '97306', 'C- 142a #742 x 135 y 137', 'Los Héroes', 'Mérida', 'Yucatán', NULL, NULL, 'Activo', '2025-03-14 16:55:53', '2025-03-14 16:55:53'),
(17, 'José Ricardo Tzuc García', NULL, '9991727898', '97173', 'C- 19 #271 x 16 y 18', 'San Jose Vergel', 'Mérida', 'Yucatán', NULL, NULL, 'Activo', '2025-03-18 17:10:49', '2025-03-18 17:10:49'),
(18, 'Emanuel Perez', NULL, '9999587241', NULL, NULL, '- Selecciona una colonia -', NULL, NULL, NULL, NULL, 'Activo', '2025-03-22 00:14:09', '2025-03-22 00:14:09'),
(19, 'Gustavo Barrero', NULL, '9992748354', NULL, NULL, '- Selecciona una colonia -', 'Mérida', 'Yucatán', NULL, NULL, 'Activo', '2025-03-25 18:28:55', '2025-03-25 18:28:55'),
(20, 'Daniel Pech', NULL, '9994240486', NULL, NULL, '- Selecciona una colonia -', NULL, NULL, NULL, NULL, 'Activo', '2025-04-01 04:30:38', '2025-04-01 04:30:38'),
(21, 'Matias Fuentes', NULL, '5648265852', NULL, NULL, '- Selecciona una colonia -', NULL, NULL, NULL, NULL, 'Activo', '2025-04-22 00:24:50', '2025-04-22 00:24:50'),
(22, 'Denis Lugo', NULL, '9992927013', '97219', 'C- 25 a #295 x 21 diag. y 28', 'Jardines de Pensiones', 'Mérida', 'Yucatán', NULL, NULL, 'Activo', '2025-04-22 00:34:16', '2025-04-22 00:34:16'),
(23, 'Maru Reyes', NULL, '9991844984', '97230', 'C- 59d #557c x 112 y 114', 'Armando Avila Gurrutia', 'Mérida', 'Yucatán', NULL, NULL, 'Activo', '2025-04-22 00:45:20', '2025-04-22 00:45:20'),
(24, 'Victor Villaca', NULL, '9993048326', NULL, NULL, '- Selecciona una colonia -', NULL, NULL, NULL, NULL, 'Activo', '2025-04-22 00:51:32', '2025-04-22 00:51:32'),
(25, 'Miguel Carrillo', NULL, '9994458517', NULL, NULL, '- Selecciona una colonia -', NULL, NULL, NULL, NULL, 'Activo', '2025-04-25 03:22:09', '2025-04-25 03:22:09'),
(26, 'Danilu Berzunza Novelo', NULL, '9991117605', NULL, NULL, '- Selecciona una colonia -', NULL, NULL, NULL, NULL, 'Activo', '2025-04-25 03:31:21', '2025-04-25 03:31:21'),
(27, 'Sergio Falcón', NULL, '9991732931', NULL, NULL, '- Selecciona una colonia -', NULL, NULL, NULL, NULL, 'Activo', '2025-04-28 23:53:59', '2025-04-28 23:53:59'),
(28, 'Karina Briceño', NULL, '9992967992', '97198', 'C- 42a #559a X 61 privada', 'Reparto Granjas', 'Mérida', 'Yucatán', NULL, NULL, 'Activo', '2025-05-08 19:10:45', '2025-05-08 19:10:45'),
(29, 'Negocios y Ensambles', NULL, '9992194074', NULL, NULL, '- Selecciona una colonia -', NULL, NULL, NULL, NULL, 'Activo', '2025-05-13 18:56:35', '2025-05-13 18:56:35'),
(30, 'Joel Estrada González', NULL, '6141611212', '97302', 'Privada Atull int. 7 Temozón Nte.', 'Temozón Norte', 'Mérida', 'Yucatán', NULL, NULL, 'Activo', '2025-05-13 22:13:26', '2025-05-13 22:13:26'),
(31, 'Miguel Arcangel Chable Cocom', NULL, '9971347916', '97864', 'C-37 x 26 y 28', 'Santiago', 'Ticul', 'Yucatán', NULL, NULL, 'Activo', '2025-05-17 00:14:53', '2025-05-17 00:14:53'),
(32, 'Juan Carlos Ortiz', NULL, '9999694101', NULL, NULL, '- Selecciona una colonia -', NULL, NULL, NULL, NULL, 'Activo', '2025-05-19 18:33:28', '2025-05-19 18:33:28'),
(33, 'Miguel Palma', NULL, '9992704636', NULL, NULL, '- Selecciona una colonia -', NULL, NULL, NULL, NULL, 'Activo', '2025-05-19 18:58:19', '2025-05-19 18:58:19'),
(34, 'Román Soberanis', NULL, '9993675229', '97143', NULL, 'Polígono 108', 'Mérida', 'Yucatán', NULL, NULL, 'Activo', '2025-06-05 00:32:24', '2025-06-05 00:32:24'),
(35, 'Roxana', NULL, '9992518640', NULL, NULL, '- Selecciona una colonia -', NULL, NULL, NULL, NULL, 'Activo', '2025-06-05 23:32:14', '2025-06-05 23:32:14'),
(36, 'Fernando Guzmán Rodríguez', NULL, '5535403695', NULL, NULL, '- Selecciona una colonia -', NULL, NULL, NULL, NULL, 'Activo', '2025-06-10 23:39:42', '2025-06-10 23:39:42'),
(37, 'Público En General', 'XXXXXXXXXXXXXXXXXXXXX', '0000000000', 'XXXXX', 'XXXXXXXXXXXXXXXXXX', NULL, 'XXXXX', 'XXXX', 'XXXXXXX', NULL, 'Activo', '2025-06-10 23:42:02', '2025-06-10 23:42:02'),
(38, 'Jafet Carbajal Achach', NULL, '9997813663', '97115', 'C- 42 #281 X 31 y 33', 'Sodzil Norte', 'Mérida', 'Yucatán', NULL, NULL, 'Activo', '2025-06-16 19:33:44', '2025-06-16 19:33:44'),
(39, 'Alfredo Jiménez', NULL, '9992458744', NULL, NULL, '- Selecciona una colonia -', NULL, NULL, NULL, NULL, 'Activo', '2025-07-01 18:53:30', '2025-07-01 18:53:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `salary` double NOT NULL,
  `extra` double DEFAULT NULL,
  `periodicity` varchar(255) NOT NULL,
  `depto` varchar(255) DEFAULT NULL,
  `rfc` varchar(255) DEFAULT NULL,
  `curp` varchar(255) DEFAULT NULL,
  `nss` varchar(255) DEFAULT NULL,
  `status` enum('Activo','Inactivo') NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `employees`
--

INSERT INTO `employees` (`id`, `user_id`, `salary`, `extra`, `periodicity`, `depto`, `rfc`, `curp`, `nss`, `status`, `start_date`, `end_date`, `comments`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 0, '', 'Admin', 'TUCM851227ES3', NULL, NULL, 'Activo', '2023-02-27', NULL, NULL, NULL, NULL),
(2, 2, 0, NULL, 'Sin definir', 'Gerencia', NULL, NULL, NULL, 'Activo', '2023-02-27', NULL, NULL, '2025-02-27 20:35:13', '2025-02-27 20:35:13'),
(3, 3, 3000, NULL, 'Semanal', 'Mecanica', NULL, NULL, NULL, 'Activo', '2024-01-22', NULL, 'Mecanico', '2024-01-22 20:35:59', '2025-02-27 20:35:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `amount` int(11) NOT NULL DEFAULT 1,
  `price` double NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pagado',
  `expense_date` date DEFAULT NULL,
  `responsible` int(11) NOT NULL,
  `attach` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `expenses`
--

INSERT INTO `expenses` (`id`, `name`, `description`, `amount`, `price`, `status`, `expense_date`, `responsible`, `attach`, `created_at`, `updated_at`) VALUES
(7, 'Lavado de carro', 'Lavado y aspirado Mercedes Benz CLA 250', 1, 200, 'Pagado', '2025-03-04', 4, '', '2025-03-05 02:07:12', '2025-03-05 02:07:12'),
(10, 'Soldadura', '1 kg soldadura', 1, 75, 'Pagado', '2025-03-04', 4, '1741390222.jpg', '2025-03-05 02:08:14', '2025-03-05 02:08:14'),
(14, 'Lavado de carro', 'Lavado de Honda CR-V\r\nLavado de BMW 320i', 1, 400, 'Pagado', '2025-03-15', 4, '', '2025-03-15 12:16:52', '2025-03-15 12:16:52'),
(15, 'Luz', 'Pago de luz', 1, 605, 'Pagado', '2025-03-15', 4, '1742603760.jpg', '2025-03-15 12:18:36', '2025-03-15 12:18:36'),
(17, 'Honda CR-V', 'Ligas para intercooler\r\nTornillos para intercooler', 1, 297, 'Pagado', '2025-03-15', 4, '', '2025-03-15 12:22:20', '2025-03-15 12:22:20'),
(19, 'Herramienta', 'Pata de cabra', 1, 153, 'Pagado', '2025-03-18', 4, '1742603644.jpg', '2025-03-19 01:29:21', '2025-03-19 01:29:21'),
(20, 'Soga', '5 metros de soga', 1, 40, 'Pagado', '2025-03-20', 4, '', '2025-03-20 17:22:19', '2025-03-20 17:22:19'),
(21, 'Internet', 'Pago de Internet', 1, 250, 'Pagado', '2025-03-21', 4, '1742589825.jpg', '2025-03-21 20:43:45', '2025-03-21 20:43:45'),
(22, 'Lavado de carro', 'Lavado y aspirado Mercedes Benz GLC 300', 1, 200, 'Pagado', '2025-03-21', 4, '', '2025-03-22 00:31:10', '2025-03-22 00:31:10'),
(24, 'Tornillos', 'Dos bolsas de tornillos para láminas', 1, 109, 'Pagado', '2025-03-24', 4, '1742851385.jpg', '2025-03-24 21:23:05', '2025-03-24 21:23:05'),
(25, 'Láminas', 'Compra de láminas más $300 de envío', 1, 3312, 'Pagado', '2025-03-24', 4, '1742851529.jpg', '2025-03-24 21:25:29', '2025-03-24 21:25:29'),
(26, 'Tornillos', 'Compra de dos focos para área de taller', 1, 507, 'Pagado', '2025-03-24', 4, '1742851681.jpg', '2025-03-24 21:28:01', '2025-03-24 21:28:01'),
(27, 'Licencia de uso de suelo', 'Pago de licencia de uso de suelo, ayuntamiento kanasin', 1, 23985, 'Pagado', '2025-03-24', 4, '1742863599.jpg', '2025-03-25 00:46:39', '2025-03-25 00:46:39'),
(29, 'Garantía', 'Seat Toledo, cubre polvo lado rueda', 1, 160, 'Pagado', '2025-04-21', 4, '', '2025-04-21 23:59:01', '2025-04-21 23:59:01'),
(30, 'Pozo', 'Pozo para agua', 1, 4000, 'Pagado', '2025-04-21', 4, '', '2025-04-21 23:59:49', '2025-04-21 23:59:49'),
(31, 'Tuberias para pozo', 'Codos, coples, pegamento para pozo', 1, 198, 'Pagado', '2025-04-21', 4, '', '2025-04-22 00:40:22', '2025-04-22 00:40:22'),
(32, 'Internet', 'Pago de internet', 1, 250, 'Pagado', '2025-04-22', 4, '', '2025-04-22 17:38:23', '2025-04-22 17:38:23'),
(33, 'Cintillas', 'Cintillas', 1, 70, 'Pagado', '2025-04-24', 4, '', '2025-04-25 03:21:31', '2025-04-25 03:21:31'),
(34, 'Productos area taller', 'Gas butano, tornillos, abrazaderas', 1, 73, 'Pagado', '2025-04-25', 4, '', '2025-04-25 15:54:12', '2025-04-25 15:54:12'),
(35, 'Productos de limpieza', 'Fab, cloro y fabuloso', 1, 120, 'Pagado', '2025-04-30', 4, '', '2025-04-30 22:41:12', '2025-04-30 22:41:12'),
(36, 'Dominio de página', 'Pago de dominio para la página de internet', 1, 485, 'Pagado', '2025-05-06', 1, '1746544768.jpg', '2025-05-06 15:19:29', '2025-05-06 15:19:29'),
(37, 'Licencia de uso de suelo', 'Limpieza de oficina', 1, 200, 'Pagado', '2025-05-10', 4, '', '2025-05-10 18:41:12', '2025-05-10 18:41:12'),
(38, 'Productos area taller', 'Papel higiénico', 1, 60, 'Pagado', '2025-05-10', 4, '', '2025-05-10 18:41:45', '2025-05-10 18:41:45'),
(39, 'Laminas', 'Compra de 2 laminas', 1, 602, 'Pagado', '2025-05-12', 4, '1747097975.jpg', '2025-05-13 00:59:36', '2025-05-13 00:59:36'),
(40, 'Lampara', 'Compra de 1 lampara para área de taller', 1, 239, 'Pagado', '2025-05-12', 4, '1747098119.jpg', '2025-05-13 01:01:59', '2025-05-13 01:01:59'),
(41, 'Pago de luz', 'Pago de luz', 1, 755, 'Pagado', '2025-05-12', 4, '1747098268.jpg', '2025-05-13 01:04:28', '2025-05-13 01:04:28'),
(42, 'Uber', 'Pago de uber', 1, 95, 'Pagado', '2025-05-16', 4, '', '2025-05-17 00:20:13', '2025-05-17 00:20:13'),
(44, 'Lavado de carro', 'Lavado de Mercedes Benz Negro', 1, 170, 'Pagado', '2025-05-16', 4, '', '2025-05-17 00:21:44', '2025-05-17 00:21:44'),
(45, 'Limpieza de oficina', 'Limpieza de oficina', 1, 200, 'Pagado', '2025-05-19', 4, '', '2025-05-19 18:13:59', '2025-05-19 18:13:59'),
(46, 'Lavado de carro', 'Lavado y aspirado mercedes benz', 1, 150, 'Pagado', '2025-05-20', 4, '', '2025-05-20 23:43:35', '2025-05-20 23:43:35'),
(47, 'Pago de internet', 'Pago de internet', 1, 250, 'Pagado', '2025-05-20', 4, '', '2025-05-20 23:44:04', '2025-05-20 23:44:04'),
(48, 'Herramienta', 'Pinza alicate, dado 1/4 entrada de 1/4', 1, 157, 'Pagado', '2025-05-21', 4, '', '2025-05-21 16:04:08', '2025-05-21 16:04:08'),
(49, 'Carrito para herramienta', 'Discos de corte, pintura, llantas gomas', 1, 251, 'Pagado', '2025-05-22', 4, '', '2025-05-23 00:45:20', '2025-05-23 00:45:20'),
(50, 'Tubos PVC', '4 tubos, coples, tapa,', 1, 821, 'Pagado', '2025-05-23', 4, '', '2025-05-24 03:19:30', '2025-05-24 03:19:30'),
(51, 'Recolecta de aceite', 'Recolecta de aceite', 1, 50, 'Pagado', '2025-05-28', 4, '', '2025-05-28 23:25:14', '2025-05-28 23:25:14'),
(52, 'Tubos PVC', 'Tubería de PCV para drenaje de techo', 1, 98, 'Pagado', '2025-06-12', 4, '', '2025-06-12 21:27:39', '2025-06-12 21:27:39'),
(53, 'Coladores', NULL, 1, 50, 'Pagado', '2025-06-16', 4, '', '2025-06-16 17:44:38', '2025-06-16 17:44:38'),
(55, 'Pago de internet', 'Pago de internet', 1, 250, 'Pagado', '2025-06-16', 4, '', '2025-06-16 17:45:38', '2025-06-16 17:45:38'),
(56, 'Lavado de carro', 'Lavado y aspirado L200', 1, 150, 'Pagado', '2025-06-16', 4, '', '2025-06-16 23:14:45', '2025-06-16 23:14:45'),
(57, 'Uber', 'Uber', 1, 100, 'Pagado', '2025-06-24', 4, '', '2025-06-24 16:38:37', '2025-06-24 16:38:37'),
(58, 'Desvastadores', 'Desvastadores', 1, 65, 'Pagado', '2025-06-24', 4, '', '2025-06-25 00:52:54', '2025-06-25 00:52:54'),
(59, 'Alineación', 'Alineación Sorento', 1, 100, 'Pagado', '2025-06-24', 4, '', '2025-06-25 00:53:50', '2025-06-25 00:53:50'),
(60, 'Pago de luz', 'Pago de luz', 1, 982, 'Pagado', '2025-06-25', 4, '1750897422.jpg', '2025-06-26 00:23:42', '2025-06-26 00:23:42'),
(61, 'uber', 'Uber', 1, 100, 'Pagado', '2025-06-30', 4, '', '2025-07-01 00:51:16', '2025-07-01 00:51:16'),
(62, 'Limpieza de oficina', 'Limpieza de oficina', 1, 200, 'Pagado', '2025-07-01', 4, '', '2025-07-01 16:10:59', '2025-07-01 16:10:59'),
(63, 'Bolsa de trapos', 'Bolsa de trapos', 1, 450, 'Pagado', '2025-07-03', 4, '', '2025-07-04 01:00:08', '2025-07-04 01:00:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(550, '2014_10_12_000000_create_users_table', 1),
(551, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(552, '2019_08_19_000000_create_failed_jobs_table', 1),
(553, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(554, '2024_02_07_232401_create_clients', 1),
(555, '2024_02_08_002513_create_autos', 1),
(556, '2024_02_14_210419_create_postalcodes', 1),
(557, '2024_02_14_234752_create_brands', 1),
(558, '2024_02_14_234846_create_models', 1),
(559, '2024_02_16_181819_create_services_items', 1),
(560, '2024_02_16_215709_create_services', 1),
(561, '2024_02_20_103912_create_expenses', 1),
(562, '2024_02_23_130424_create_calendar', 1),
(563, '2024_03_27_185756_create_employees', 1),
(564, '2024_04_15_120025_create_salaries', 1),
(565, '2025_02_26_130943_create_salaries_details', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `models`
--

CREATE TABLE `models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `models`
--

INSERT INTO `models` (`id`, `brand`, `model`) VALUES
(1, 'Nissan', 'Versa'),
(2, 'Mitsubishi', 'L200'),
(3, 'Ford', 'Ranger'),
(4, 'Chevrolet', 'Beat'),
(5, 'Toyota', 'Camry'),
(6, 'Mercedes Benz', 'GLK 280'),
(7, 'Mercedes Benz', 'GLK 300'),
(8, 'Mazda', 'CX-7'),
(9, 'Mercedes Benz', 'C 180'),
(10, 'Lincoln', 'MKC'),
(11, 'Suzuki', 'Swift'),
(12, 'Mercedes Benz', 'CLA 250'),
(13, 'BMW', '320i'),
(14, 'Honda', 'CR-V'),
(15, 'Chevrolet', 'Colorado'),
(16, 'Chevrolet', 'Spark'),
(17, 'Seat', 'Toledo'),
(18, 'Honda', 'Fit'),
(19, 'Nissan', 'March'),
(20, 'Nissan', 'NP 300'),
(21, 'Mercedes Benz', 'GLC 300'),
(22, 'Audi', 'A4'),
(23, 'Chevrolet', 'Aveo'),
(24, 'Mercedes Benz', 'C 230 KOMPRESSOR'),
(25, 'Mercedes Benz', 'C 200'),
(26, 'BMW', 'Mini Cooper S'),
(27, 'BMW', 'Mini Cooper'),
(28, 'Audi', 'A6'),
(29, 'BMW', '420i'),
(30, 'Kia', 'Sorento'),
(31, 'Mazda', 'Mazda 3'),
(32, 'BMW', 'X3'),
(33, 'Chevrolet', 'Chevy'),
(34, 'GMC', 'Acadia'),
(35, 'Toyota', 'Avanza'),
(36, 'Ford', 'Fiesta Ikon'),
(37, 'Mercedes Benz', 'C 280'),
(38, 'Ford', 'EcoSport'),
(39, 'Toyota', 'Sienna'),
(40, 'Seat', 'Ibiza'),
(41, 'Dodge', 'Grand Caravan'),
(42, 'XXXX', 'XXXX'),
(43, 'Jeep', 'Compass'),
(44, 'Audi', 'Q7'),
(45, 'Chevrolet', 'Traverse');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `montly_balances`
--

CREATE TABLE `montly_balances` (
  `id` int(11) NOT NULL,
  `income` double DEFAULT NULL,
  `expenses` double DEFAULT NULL,
  `balance` double DEFAULT NULL,
  `close_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `comments` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `montly_balances`
--

INSERT INTO `montly_balances` (`id`, `income`, `expenses`, `balance`, `close_date`, `comments`, `created_at`) VALUES
(1, 16669, 0, 16669, '2025-03-01 05:56:03', 'Cierre del mes de febrero', '2025-03-01 02:33:58'),
(2, 26700, 42133, 1236, '2025-04-01 05:31:16', 'Cierre del mes de marzo', '2025-04-01 04:23:41'),
(3, 24000, 25236, 0, '2025-05-01 05:20:38', 'Comentarios del cierre de mes', '2025-05-01 01:20:38'),
(4, 21200, 19735, 1465, '2025-05-31 17:43:22', 'Comentarios del cierre de mes', '2025-06-01 03:29:45'),
(5, 20635, 18095, 4005, '2025-07-01 03:23:03', 'Comentarios del cierre de mes', '2025-07-01 03:23:03');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `montly_balance_view`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `montly_balance_view` (
`type` varchar(18)
,`concept` varchar(511)
,`date` date
,`cash_in` double
,`cash_out` double
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `postalcodes`
--

CREATE TABLE `postalcodes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `postalcode` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `postalcodes`
--

INSERT INTO `postalcodes` (`id`, `postalcode`, `address`, `city`, `state`) VALUES
(1, '97000', 'Mérida Centro', 'Mérida', 'Yucatán'),
(2, '97000', 'Itzaes', 'Mérida', 'Yucatán'),
(3, '97000', 'Madrid', 'Mérida', 'Yucatán'),
(4, '97000', 'Villa Fontana', 'Mérida', 'Yucatán'),
(5, '97000', 'La Quinta', 'Mérida', 'Yucatán'),
(6, '97000', 'Los Cocos', 'Mérida', 'Yucatán'),
(7, '97000', 'Privada Del Maestro', 'Mérida', 'Yucatán'),
(8, '97000', 'Jardines de San Sebastian', 'Mérida', 'Yucatán'),
(9, '97003', 'Los Reyes', 'Mérida', 'Yucatán'),
(10, '97050', 'Alcalá Martín', 'Mérida', 'Yucatán'),
(11, '97050', 'Yucatán', 'Mérida', 'Yucatán'),
(12, '97059', 'Señorial', 'Mérida', 'Yucatán'),
(13, '97060', 'Carrillo Ancona', 'Mérida', 'Yucatán'),
(14, '97069', 'Inalámbrica', 'Mérida', 'Yucatán'),
(15, '97070', 'Dolores Patron', 'Mérida', 'Yucatán'),
(16, '97070', 'Garcia Gineres', 'Mérida', 'Yucatán'),
(17, '97070', 'El Pedregal', 'Mérida', 'Yucatán'),
(18, '97080', 'La Huerta', 'Mérida', 'Yucatán'),
(19, '97088', 'Santa Cecilia', 'Mérida', 'Yucatán'),
(20, '97089', 'Cupules', 'Mérida', 'Yucatán'),
(21, '97098', 'Lourdes', 'Mérida', 'Yucatán'),
(22, '97099', 'Waspa', 'Mérida', 'Yucatán'),
(23, '97100', 'Itzimna', 'Mérida', 'Yucatán'),
(24, '97100', 'Itzimna', 'Mérida', 'Yucatán'),
(25, '97100', 'Itzimna 2', 'Mérida', 'Yucatán'),
(26, '97100', 'Rinconada Itzmina', 'Mérida', 'Yucatán'),
(27, '97107', 'Manola', 'Mérida', 'Yucatán'),
(28, '97108', 'Las Arboledas', 'Mérida', 'Yucatán'),
(29, '97109', 'Ferrocarrileros', 'Mérida', 'Yucatán'),
(30, '97109', 'Jesús Carranza', 'Mérida', 'Yucatán'),
(31, '97110', 'Revolución (Cordemex)', 'Mérida', 'Yucatán'),
(32, '97113', 'Montebello', 'Mérida', 'Yucatán'),
(33, '97113', 'San Antonio', 'Mérida', 'Yucatán'),
(34, '97113', 'Xaman-Tan', 'Mérida', 'Yucatán'),
(35, '97114', 'Monte Alban', 'Mérida', 'Yucatán'),
(36, '97114', 'Residencial Sol Campestre', 'Mérida', 'Yucatán'),
(37, '97115', 'Sodzil Norte', 'Mérida', 'Yucatán'),
(38, '97115', 'Montes de Ame', 'Mérida', 'Yucatán'),
(39, '97115', 'Gonzalo Guerrero', 'Mérida', 'Yucatán'),
(40, '97115', 'Residencial Montejo Norte', 'Mérida', 'Yucatán'),
(41, '97115', 'Ampliación Revolución', 'Mérida', 'Yucatán'),
(42, '97115', 'Residencial San Angelo', 'Mérida', 'Yucatán'),
(43, '97116', 'San Antonio Cucul', 'Mérida', 'Yucatán'),
(44, '97116', 'Privada San Antonio Cucul', 'Mérida', 'Yucatán'),
(45, '97117', 'San Ramon Norte', 'Mérida', 'Yucatán'),
(46, '97117', 'San Ramon Sur', 'Mérida', 'Yucatán'),
(47, '97117', 'San Ramon Norte I', 'Mérida', 'Yucatán'),
(48, '97117', 'Villareal', 'Mérida', 'Yucatán'),
(49, '97117', 'Xaman-Kab', 'Mérida', 'Yucatán'),
(50, '97118', 'Plan de Ayala', 'Mérida', 'Yucatán'),
(51, '97118', 'Villas Del Sol', 'Mérida', 'Yucatán'),
(52, '97118', 'Ampliación Plan de Ayala (Villas del Sol)', 'Mérida', 'Yucatán'),
(53, '97119', 'Benito Juárez Nte', 'Mérida', 'Yucatán'),
(54, '97119', 'Villas La Hacienda', 'Mérida', 'Yucatán'),
(55, '97119', 'Gonzalo Guerrero', 'Mérida', 'Yucatán'),
(56, '97119', 'Villas del Rey', 'Mérida', 'Yucatán'),
(57, '97120', 'Campestre', 'Mérida', 'Yucatán'),
(58, '97120', 'Del Norte', 'Mérida', 'Yucatán'),
(59, '97120', 'Tecnológico', 'Mérida', 'Yucatán'),
(60, '97120', 'Ampliación del Norte (1a. Ampliación)', 'Mérida', 'Yucatán'),
(61, '97125', 'México', 'Mérida', 'Yucatán'),
(62, '97125', 'Privada Nuevo México', 'Mérida', 'Yucatán'),
(63, '97127', 'Buenavista', 'Mérida', 'Yucatán'),
(64, '97127', 'Montejo', 'Mérida', 'Yucatán'),
(65, '97128', 'México Norte', 'Mérida', 'Yucatán'),
(66, '97128', 'Privada Mediterráneo', 'Mérida', 'Yucatán'),
(67, '97128', 'Residencial Colonia México', 'Mérida', 'Yucatán'),
(68, '97129', 'Emiliano Zapata Nte', 'Mérida', 'Yucatán'),
(69, '97130', 'Torremolinos', 'Mérida', 'Yucatán'),
(70, '97130', 'Diaz Ordaz', 'Mérida', 'Yucatán'),
(71, '97130', 'San Carlos', 'Mérida', 'Yucatán'),
(72, '97130', 'Vista Alegre', 'Mérida', 'Yucatán'),
(73, '97130', 'Residencial Palmerales de Altabrisa', 'Mérida', 'Yucatán'),
(74, '97130', 'Missan II', 'Mérida', 'Yucatán'),
(75, '97130', 'Residencial Altabrisa', 'Mérida', 'Yucatán'),
(76, '97130', 'Montecarlo', 'Mérida', 'Yucatán'),
(77, '97130', 'Vista Alegre', 'Mérida', 'Yucatán'),
(78, '97130', 'Vista Alegre Norte', 'Mérida', 'Yucatán'),
(79, '97130', 'Altabrisa', 'Mérida', 'Yucatán'),
(80, '97130', 'San Remo', 'Mérida', 'Yucatán'),
(81, '97130', 'Santa Rita Cholul', 'Mérida', 'Yucatán'),
(82, '97133', 'Montecristo', 'Mérida', 'Yucatán'),
(83, '97133', 'Montevideo', 'Mérida', 'Yucatán'),
(84, '97133', 'Residencial Camara de Comercio Norte', 'Mérida', 'Yucatán'),
(85, '97133', 'Monterreal', 'Mérida', 'Yucatán'),
(86, '97134', 'Maya', 'Mérida', 'Yucatán'),
(87, '97134', 'Paraíso Maya', 'Mérida', 'Yucatán'),
(88, '97134', 'Jose Maria Iturralde', 'Mérida', 'Yucatán'),
(89, '97135', 'Jardines de Mérida', 'Mérida', 'Yucatán'),
(90, '97136', 'Felipe Carrillo Puerto Nte', 'Mérida', 'Yucatán'),
(91, '97137', 'México Oriente', 'Mérida', 'Yucatán'),
(92, '97138', 'Jardines del Noreste', 'Mérida', 'Yucatán'),
(93, '97138', 'Los Álamos', 'Mérida', 'Yucatán'),
(94, '97138', 'Residencial Del Arco', 'Mérida', 'Yucatán'),
(95, '97138', 'La Florida', 'Mérida', 'Yucatán'),
(96, '97138', 'Los Pinos', 'Mérida', 'Yucatán'),
(97, '97138', 'Jardines Del Norte', 'Mérida', 'Yucatán'),
(98, '97138', 'Jardines de Vista Alegre', 'Mérida', 'Yucatán'),
(99, '97138', 'Residencial Bancarios', 'Mérida', 'Yucatán'),
(100, '97138', 'San Pedro Cholul', 'Mérida', 'Yucatán'),
(101, '97138', 'Santa Maria', 'Mérida', 'Yucatán'),
(102, '97138', 'El Arco', 'Mérida', 'Yucatán'),
(103, '97138', 'Jardines de Vista Alegre II', 'Mérida', 'Yucatán'),
(104, '97138', 'Vista Alegre Lotificacion', 'Mérida', 'Yucatán'),
(105, '97138', 'Pinos Norte II', 'Mérida', 'Yucatán'),
(106, '97139', 'Prado Norte', 'Mérida', 'Yucatán'),
(107, '97139', 'San Antonio Cinta', 'Mérida', 'Yucatán'),
(108, '97139', 'Jardines del Norte de Prado Norte', 'Mérida', 'Yucatán'),
(109, '97140', 'Lopez Mateos', 'Mérida', 'Yucatán'),
(110, '97140', 'San Luis', 'Mérida', 'Yucatán'),
(111, '97140', 'San Miguel', 'Mérida', 'Yucatán'),
(112, '97142', 'Unidad Habitacional CTM', 'Mérida', 'Yucatán'),
(113, '97142', 'Antonia Jimenez Trava', 'Mérida', 'Yucatán'),
(114, '97142', 'Antonia Jimenez Trava II', 'Mérida', 'Yucatán'),
(115, '97142', 'San Vicente Oriente (La Isla)', 'Mérida', 'Yucatán'),
(116, '97143', 'Polígono 108', 'Mérida', 'Yucatán'),
(117, '97143', 'Vicente Guerrero', 'Mérida', 'Yucatán'),
(118, '97143', 'Boulevares de Oriente', 'Mérida', 'Yucatán'),
(119, '97143', 'Itzimna 108', 'Mérida', 'Yucatán'),
(120, '97143', 'Luis Donaldo Colosio', 'Mérida', 'Yucatán'),
(121, '97143', 'Leandro Valle', 'Mérida', 'Yucatán'),
(122, '97143', 'Brisas Del Bosque', 'Mérida', 'Yucatán'),
(123, '97144', 'Emiliano Zapata Ote', 'Mérida', 'Yucatán'),
(124, '97144', 'Las Brisas', 'Mérida', 'Yucatán'),
(125, '97144', 'Las Brisas Del Norte', 'Mérida', 'Yucatán'),
(126, '97144', 'Ampliación las Brisas', 'Mérida', 'Yucatán'),
(127, '97145', 'Las Palmas', 'Mérida', 'Yucatán'),
(128, '97145', 'Pet-kanche', 'Mérida', 'Yucatán'),
(129, '97145', 'San Juan Grande', 'Mérida', 'Yucatán'),
(130, '97145', 'Noria II', 'Mérida', 'Yucatán'),
(131, '97146', 'Nueva Alemán', 'Mérida', 'Yucatán'),
(132, '97146', 'Las Flores', 'Mérida', 'Yucatán'),
(133, '97147', 'Nuevo Yucatán', 'Mérida', 'Yucatán'),
(134, '97147', 'San Nicolás', 'Mérida', 'Yucatán'),
(135, '97148', 'Miguel Alemán', 'Mérida', 'Yucatán'),
(136, '97149', 'San Esteban', 'Mérida', 'Yucatán'),
(137, '97150', 'Industrial', 'Mérida', 'Yucatán'),
(138, '97150', 'Trava Quintero', 'Mérida', 'Yucatán'),
(139, '97155', 'Fenix', 'Mérida', 'Yucatán'),
(140, '97155', 'Lourdes Industrial', 'Mérida', 'Yucatán'),
(141, '97156', 'Los Reyes', 'Mérida', 'Yucatán'),
(142, '97157', 'Lázaro Cárdenas Ote', 'Mérida', 'Yucatán'),
(143, '97157', 'Nueva Mayapan', 'Mérida', 'Yucatán'),
(144, '97158', 'Chuminopolis', 'Mérida', 'Yucatán'),
(145, '97159', 'Máximo Ancona', 'Mérida', 'Yucatán'),
(146, '97159', 'Manuel Avila Camacho', 'Mérida', 'Yucatán'),
(147, '97159', 'Mayapan', 'Mérida', 'Yucatán'),
(148, '97159', 'Nueva Pacabtun', 'Mérida', 'Yucatán'),
(149, '97159', 'Nueva Mayapan', 'Mérida', 'Yucatán'),
(150, '97159', 'Lotificacion las Brisas', 'Mérida', 'Yucatán'),
(151, '97160', 'Del Parque', 'Mérida', 'Yucatán'),
(152, '97160', 'Pacabtun', 'Mérida', 'Yucatán'),
(153, '97160', 'Manuel Avila Camacho', 'Mérida', 'Yucatán'),
(154, '97160', 'Privada Del Autotransporte CTM', 'Mérida', 'Yucatán'),
(155, '97165', 'Melchor Ocampo', 'Mérida', 'Yucatán'),
(156, '97165', 'Melchor Ocampo II', 'Mérida', 'Yucatán'),
(157, '97166', 'Fidel Velázquez', 'Mérida', 'Yucatán'),
(158, '97166', 'Salvador Alvarado Oriente', 'Mérida', 'Yucatán'),
(159, '97166', 'Fidel Velázquez 2a Etapa', 'Mérida', 'Yucatán'),
(160, '97167', 'Emilio Portes Gil', 'Mérida', 'Yucatán'),
(161, '97167', 'Bosques de Oriente', 'Mérida', 'Yucatán'),
(162, '97167', 'Privada Emilio Portes Gil', 'Mérida', 'Yucatán'),
(163, '97168', 'Del Carmen', 'Mérida', 'Yucatán'),
(164, '97168', 'Cortes Sarmiento', 'Mérida', 'Yucatán'),
(165, '97168', 'Jardines de Miraflores', 'Mérida', 'Yucatán'),
(166, '97168', 'Cerillera', 'Mérida', 'Yucatán'),
(167, '97169', 'Esperanza', 'Mérida', 'Yucatán'),
(168, '97169', 'Wallis', 'Mérida', 'Yucatán'),
(169, '97170', 'Chichen-itza', 'Mérida', 'Yucatán'),
(170, '97170', 'Nueva Chichen-itza', 'Mérida', 'Yucatán'),
(171, '97173', 'Vergel', 'Mérida', 'Yucatán'),
(172, '97173', 'Vergel II', 'Mérida', 'Yucatán'),
(173, '97173', 'Vergel III', 'Mérida', 'Yucatán'),
(174, '97173', 'Vergel IV', 'Mérida', 'Yucatán'),
(175, '97173', 'San Jose Vergel', 'Mérida', 'Yucatán'),
(176, '97173', 'Real San José', 'Mérida', 'Yucatán'),
(177, '97173', 'Misne III', 'Mérida', 'Yucatán'),
(178, '97174', 'Villas La Macarena', 'Mérida', 'Yucatán'),
(179, '97174', 'Morelos Oriente', 'Mérida', 'Yucatán'),
(180, '97175', 'Amalia Solorzano', 'Mérida', 'Yucatán'),
(181, '97176', 'Misné II', 'Mérida', 'Yucatán'),
(182, '97176', 'San Pablo Oriente', 'Mérida', 'Yucatán'),
(183, '97176', 'Vergel 65', 'Mérida', 'Yucatán'),
(184, '97176', 'San Antonio Kaua', 'Mérida', 'Yucatán'),
(185, '97176', 'El Vergel', 'Mérida', 'Yucatán'),
(186, '97177', 'Azcorra', 'Mérida', 'Yucatán'),
(187, '97178', 'Benito Juárez Ote', 'Mérida', 'Yucatán'),
(188, '97179', 'Miraflores', 'Mérida', 'Yucatán'),
(189, '97179', 'Privada Miraflores', 'Mérida', 'Yucatán'),
(190, '97180', 'Vicente Solis', 'Mérida', 'Yucatán'),
(191, '97189', 'Canto', 'Mérida', 'Yucatán'),
(192, '97189', 'San Jose', 'Mérida', 'Yucatán'),
(193, '97190', 'Morelos', 'Mérida', 'Yucatán'),
(194, '97190', 'Morelos Issste Fovissste', 'Mérida', 'Yucatán'),
(195, '97195', 'Nueva Kukulkan', 'Mérida', 'Yucatán'),
(196, '97195', 'San Antonio Kaua', 'Mérida', 'Yucatán'),
(197, '97195', 'San Antonio Kaua II', 'Mérida', 'Yucatán'),
(198, '97195', 'Miraflores II', 'Mérida', 'Yucatán'),
(199, '97195', 'San Antonio Kaua I', 'Mérida', 'Yucatán'),
(200, '97195', 'Aquaparque', 'Mérida', 'Yucatán'),
(201, '97196', 'Salvador Alvarado Sur', 'Mérida', 'Yucatán'),
(202, '97196', 'Militar', 'Mérida', 'Yucatán'),
(203, '97196', 'Salvador Alvarado Sur II', 'Mérida', 'Yucatán'),
(204, '97196', 'Ampliación Salvador Alvarado Sur', 'Mérida', 'Yucatán'),
(205, '97198', 'Ampliación Granjas', 'Mérida', 'Yucatán'),
(206, '97198', 'Reparto Granjas', 'Mérida', 'Yucatán'),
(207, '97198', 'Kukulcan', 'Mérida', 'Yucatán'),
(208, '97199', 'Maria Luisa', 'Mérida', 'Yucatán'),
(209, '97203', 'Cordeleros de Chuburna', 'Mérida', 'Yucatán'),
(210, '97203', 'El Prado', 'Mérida', 'Yucatán'),
(211, '97203', 'San Pedro Uxmal', 'Mérida', 'Yucatán'),
(212, '97203', 'Tulias de Chuburna', 'Mérida', 'Yucatán'),
(213, '97203', 'Arcos del Sol', 'Mérida', 'Yucatán'),
(214, '97203', 'Aurea Residencial', 'Mérida', 'Yucatán'),
(215, '97203', 'Arekas', 'Mérida', 'Yucatán'),
(216, '97203', 'Brisas de Chuburna', 'Mérida', 'Yucatán'),
(217, '97203', 'Camara de La Construcción', 'Mérida', 'Yucatán'),
(218, '97203', 'Cocoteros', 'Mérida', 'Yucatán'),
(219, '97203', 'Del Bosque', 'Mérida', 'Yucatán'),
(220, '97203', 'El Conquistador', 'Mérida', 'Yucatán'),
(221, '97203', 'San Pablo', 'Mérida', 'Yucatán'),
(222, '97203', 'Terranova', 'Mérida', 'Yucatán'),
(223, '97203', 'Villas Palma Real', 'Mérida', 'Yucatán'),
(224, '97203', 'Villas Del Prado', 'Mérida', 'Yucatán'),
(225, '97203', 'Vista Alegre de Chuburna', 'Mérida', 'Yucatán'),
(226, '97203', 'Privada Chuburna de Hidalgo (II)', 'Mérida', 'Yucatán'),
(227, '97203', 'Privada Chuburna Plus', 'Mérida', 'Yucatán'),
(228, '97203', 'Privada Palma Caribeña', 'Mérida', 'Yucatán'),
(229, '97203', 'Francisco de Montejo', 'Mérida', 'Yucatán'),
(230, '97203', 'San José Chuburna', 'Mérida', 'Yucatán'),
(231, '97203', 'Magnolias', 'Mérida', 'Yucatán'),
(232, '97203', 'Rincón Colonial', 'Mérida', 'Yucatán'),
(233, '97203', 'Puesta del Sol', 'Mérida', 'Yucatán'),
(234, '97203', 'Las Haciendas III', 'Mérida', 'Yucatán'),
(235, '97203', 'La Castellana', 'Mérida', 'Yucatán'),
(236, '97203', 'Privada Corozal', 'Mérida', 'Yucatán'),
(237, '97203', 'Ampliación Francisco de Montejo', 'Mérida', 'Yucatán'),
(238, '97203', 'Francisco de Montejo II', 'Mérida', 'Yucatán'),
(239, '97203', 'Francisco de Montejo III', 'Mérida', 'Yucatán'),
(240, '97203', 'Francisco de Montejo IV', 'Mérida', 'Yucatán'),
(241, '97203', 'Francisco de Montejo V', 'Mérida', 'Yucatán'),
(242, '97203', 'Platino', 'Mérida', 'Yucatán'),
(243, '97204', 'Xcumpich', 'Mérida', 'Yucatán'),
(244, '97204', 'Vía Montejo', 'Mérida', 'Yucatán'),
(245, '97204', 'Residencial Piedrasul', 'Mérida', 'Yucatán'),
(246, '97204', 'Residencial Galerias', 'Mérida', 'Yucatán'),
(247, '97204', 'Revolución', 'Mérida', 'Yucatán'),
(248, '97205', 'Residencial Hacienda Real', 'Mérida', 'Yucatán'),
(249, '97205', 'Chuburna de Hidalgo', 'Mérida', 'Yucatán'),
(250, '97205', 'Bugambilias', 'Mérida', 'Yucatán'),
(251, '97205', 'El Cortijo I', 'Mérida', 'Yucatán'),
(252, '97205', 'El Cortijo II', 'Mérida', 'Yucatán'),
(253, '97205', 'Juan B Sosa', 'Mérida', 'Yucatán'),
(254, '97205', 'Loma Bonita Xcumpich', 'Mérida', 'Yucatán'),
(255, '97205', 'Residencial La Noria', 'Mérida', 'Yucatán'),
(256, '97205', 'Callejones de Chuburna', 'Mérida', 'Yucatán'),
(257, '97205', 'Las Hadas', 'Mérida', 'Yucatán'),
(258, '97205', 'Boulevares de Chuburna', 'Mérida', 'Yucatán'),
(259, '97205', 'Chuburna Inn', 'Mérida', 'Yucatán'),
(260, '97205', 'El Campanario', 'Mérida', 'Yucatán'),
(261, '97205', 'San Ángel', 'Mérida', 'Yucatán'),
(262, '97205', 'Chuburna de Hidalgo (La Floresta)', 'Mérida', 'Yucatán'),
(263, '97205', 'Las Dalias II', 'Mérida', 'Yucatán'),
(264, '97205', 'Tabachines', 'Mérida', 'Yucatán'),
(265, '97205', 'Villas Chuburna IV', 'Mérida', 'Yucatán'),
(266, '97205', 'Paraíso', 'Mérida', 'Yucatán'),
(267, '97205', 'San Luis Chuburna', 'Mérida', 'Yucatán'),
(268, '97205', 'Pinzon', 'Mérida', 'Yucatán'),
(269, '97205', 'Privada las Flores', 'Mérida', 'Yucatán'),
(270, '97205', 'Privada Chuburna de Hidalgo I', 'Mérida', 'Yucatán'),
(271, '97205', 'Privada Pedregal II', 'Mérida', 'Yucatán'),
(272, '97205', 'Privada Arboledas', 'Mérida', 'Yucatán'),
(273, '97205', 'Arboledas Chuburna', 'Mérida', 'Yucatán'),
(274, '97205', 'Privada Campestre Chuburna', 'Mérida', 'Yucatán'),
(275, '97205', 'Privada San Ángel Chuburna', 'Mérida', 'Yucatán'),
(276, '97205', 'Loma Bonita', 'Mérida', 'Yucatán'),
(277, '97206', 'El Rosario', 'Mérida', 'Yucatán'),
(278, '97206', 'San Francisco Chuburna', 'Mérida', 'Yucatán'),
(279, '97206', 'San Francisco Chuburna II', 'Mérida', 'Yucatán'),
(280, '97206', 'San Jose I', 'Mérida', 'Yucatán'),
(281, '97206', 'San Jose II', 'Mérida', 'Yucatán'),
(282, '97206', 'Mérida (Elefante Grande)', 'Mérida', 'Yucatán'),
(283, '97206', 'San Vicente Chuburna', 'Mérida', 'Yucatán'),
(284, '97206', 'Privada Cipreses', 'Mérida', 'Yucatán'),
(285, '97206', 'Residencial Turquesa', 'Mérida', 'Yucatán'),
(286, '97207', 'Villas de Chuburna', 'Mérida', 'Yucatán'),
(287, '97208', 'Malaga', 'Mérida', 'Yucatán'),
(288, '97208', 'Rinconada de Chuburna', 'Mérida', 'Yucatán'),
(289, '97208', 'Residencial Atlantis', 'Mérida', 'Yucatán'),
(290, '97208', 'El Cedral', 'Mérida', 'Yucatán'),
(291, '97208', 'Felipe Carrillo Puerto', 'Mérida', 'Yucatán'),
(292, '97208', 'Las Quintas (Chuburna)', 'Mérida', 'Yucatán'),
(293, '97208', 'Privada Chuburna de Hidalgo', 'Mérida', 'Yucatán'),
(294, '97209', 'Jardines de Chuburna', 'Mérida', 'Yucatán'),
(295, '97209', 'Privada San Jorge (Chuburna)', 'Mérida', 'Yucatán'),
(296, '97210', 'Tanlum', 'Mérida', 'Yucatán'),
(297, '97210', 'Joaquín Ceballos Mimenza', 'Mérida', 'Yucatán'),
(298, '97210', 'Pedregales de Tanlum', 'Mérida', 'Yucatán'),
(299, '97215', 'Colonial Buenavista', 'Mérida', 'Yucatán'),
(300, '97215', 'Colonial Chuburna', 'Mérida', 'Yucatán'),
(301, '97215', 'Águilas Chuburna', 'Mérida', 'Yucatán'),
(302, '97217', 'Fovissste', 'Mérida', 'Yucatán'),
(303, '97217', 'Residencial Pensiones I y II', 'Mérida', 'Yucatán'),
(304, '97217', 'Francisco El Porvenir', 'Mérida', 'Yucatán'),
(305, '97217', 'Residencial Pensiones III', 'Mérida', 'Yucatán'),
(306, '97217', 'Residencial Pensiones IV', 'Mérida', 'Yucatán'),
(307, '97217', 'Residencial Pensiones V', 'Mérida', 'Yucatán'),
(308, '97217', 'Residencial Pensiones VI', 'Mérida', 'Yucatán'),
(309, '97217', 'Residencial Pensiones III (1)', 'Mérida', 'Yucatán'),
(310, '97217', 'Residencial Pensiones III (II)', 'Mérida', 'Yucatán'),
(311, '97217', 'Pensiones Norte', 'Mérida', 'Yucatán'),
(312, '97218', 'Roma', 'Mérida', 'Yucatán'),
(313, '97218', 'San Damián', 'Mérida', 'Yucatán'),
(314, '97218', 'Residencial Roma', 'Mérida', 'Yucatán'),
(315, '97218', 'San Isidro', 'Mérida', 'Yucatán'),
(316, '97218', 'Conjunto los Naranjos', 'Mérida', 'Yucatán'),
(317, '97218', 'Lotificacion San Damián', 'Mérida', 'Yucatán'),
(318, '97218', 'Privada San Damián', 'Mérida', 'Yucatán'),
(319, '97219', 'Francisco Villa', 'Mérida', 'Yucatán'),
(320, '97219', 'Lindavista', 'Mérida', 'Yucatán'),
(321, '97219', 'Limones', 'Mérida', 'Yucatán'),
(322, '97219', 'Privada Pensiones', 'Mérida', 'Yucatán'),
(323, '97219', 'San Damiancito', 'Mérida', 'Yucatán'),
(324, '97219', 'Jardines de Pensiones', 'Mérida', 'Yucatán'),
(325, '97219', 'Residencial del Norte', 'Mérida', 'Yucatán'),
(326, '97219', 'Amapola', 'Mérida', 'Yucatán'),
(327, '97219', 'Lindavista II', 'Mérida', 'Yucatán'),
(328, '97219', 'Jardines de Lindavista', 'Mérida', 'Yucatán'),
(329, '97219', 'Lotificacion San Damiancito I', 'Mérida', 'Yucatán'),
(330, '97219', 'Lotificacion San Damiancito II', 'Mérida', 'Yucatán'),
(331, '97219', 'Quinta Versalles', 'Mérida', 'Yucatán'),
(332, '97219', 'Unidad Habitacional Mérida Issste', 'Mérida', 'Yucatán'),
(333, '97219', 'Residencial Pensiones VII', 'Mérida', 'Yucatán'),
(334, '97219', 'Paseos de Pensiones', 'Mérida', 'Yucatán'),
(335, '97219', 'Pensiones', 'Mérida', 'Yucatán'),
(336, '97219', 'Ampliación Lindavista (Elefante Chico)', 'Mérida', 'Yucatán'),
(337, '97219', 'Paseos de Chenku', 'Mérida', 'Yucatán'),
(338, '97219', 'Pedregal de Lindavista', 'Mérida', 'Yucatán'),
(339, '97220', 'Nueva Hidalgo', 'Mérida', 'Yucatán'),
(340, '97220', 'La Vaca Feliz', 'Mérida', 'Yucatán'),
(341, '97220', 'Miguel Hidalgo', 'Mérida', 'Yucatán'),
(342, '97220', 'Zona Dorada', 'Mérida', 'Yucatán'),
(343, '97220', 'Atlántida', 'Mérida', 'Yucatán'),
(344, '97225', 'Paseo de las Fuentes', 'Mérida', 'Yucatán'),
(345, '97225', 'Privada San Pedro', 'Mérida', 'Yucatán'),
(346, '97226', 'El Porvenir', 'Mérida', 'Yucatán'),
(347, '97227', 'Jacinto Canek', 'Mérida', 'Yucatán'),
(348, '97227', 'Las Vigas', 'Mérida', 'Yucatán'),
(349, '97229', 'Luis Echeverría Alvarez', 'Mérida', 'Yucatán'),
(350, '97229', '15 de Mayo', 'Mérida', 'Yucatán'),
(351, '97229', 'Hacienda San Antonio', 'Mérida', 'Yucatán'),
(352, '97229', 'Xcom', 'Mérida', 'Yucatán'),
(353, '97229', 'Zona Dorada II', 'Mérida', 'Yucatán'),
(354, '97229', 'Villa Zona Dorada', 'Mérida', 'Yucatán'),
(355, '97229', 'Ampliación Roma (Luis Echeverría)', 'Mérida', 'Yucatán'),
(356, '97229', 'Hacienda Inn', 'Mérida', 'Yucatán'),
(357, '97230', 'Bojorquez', 'Mérida', 'Yucatán'),
(358, '97230', 'Armando Avila Gurrutia', 'Mérida', 'Yucatán'),
(359, '97237', 'Central de Abasto', 'Mérida', 'Yucatán'),
(360, '97238', 'Nora Quintana', 'Mérida', 'Yucatán'),
(361, '97238', 'Yucalpeten', 'Mérida', 'Yucatán'),
(362, '97238', 'Villas de Yucalpeten', 'Mérida', 'Yucatán'),
(363, '97238', 'Residencial Casa Blanca', 'Mérida', 'Yucatán'),
(364, '97238', 'Brisas del Poniente (Yucalpeten)', 'Mérida', 'Yucatán'),
(365, '97238', 'Jardines de Yucalpeten', 'Mérida', 'Yucatán'),
(366, '97239', 'Yucalpeten Secc Florida', 'Mérida', 'Yucatán'),
(367, '97240', 'Francisco I Madero', 'Mérida', 'Yucatán'),
(368, '97245', 'Lopez Portillo', 'Mérida', 'Yucatán'),
(369, '97245', 'Xoclan Canto', 'Mérida', 'Yucatán'),
(370, '97245', 'Xoclan Santos', 'Mérida', 'Yucatán'),
(371, '97246', 'Juan Pablo II Secc. Mérida 2000', 'Mérida', 'Yucatán'),
(372, '97246', 'Bosques del Poniente', 'Mérida', 'Yucatán'),
(373, '97246', 'Jardines de Nueva Mulsay', 'Mérida', 'Yucatán'),
(374, '97246', 'La Reja', 'Mérida', 'Yucatán'),
(375, '97246', 'Mulsay', 'Mérida', 'Yucatán'),
(376, '97246', 'Mulsay de La Magdalena', 'Mérida', 'Yucatán'),
(377, '97246', 'Xoclan', 'Mérida', 'Yucatán'),
(378, '97246', 'Xoclan Xbech', 'Mérida', 'Yucatán'),
(379, '97246', 'Juan Pablo II Cardenales', 'Mérida', 'Yucatán'),
(380, '97246', 'Juan Pablo II', 'Mérida', 'Yucatán'),
(381, '97246', 'México Poniente', 'Mérida', 'Yucatán'),
(382, '97246', 'Xoclan Carmelitas', 'Mérida', 'Yucatán'),
(383, '97246', 'Bosques de Mulsay', 'Mérida', 'Yucatán'),
(384, '97246', 'Granja Fruticola Susula', 'Mérida', 'Yucatán'),
(385, '97246', 'Mulsay Solidaridad', 'Mérida', 'Yucatán'),
(386, '97246', 'Hacienda Mulsay', 'Mérida', 'Yucatán'),
(387, '97246', 'Ampliación Juan Pablo II', 'Mérida', 'Yucatán'),
(388, '97246', 'Paseos de Opichen', 'Mérida', 'Yucatán'),
(389, '97246', 'Villas de Tixcacal', 'Mérida', 'Yucatán'),
(390, '97246', 'Los Ángeles', 'Mérida', 'Yucatán'),
(391, '97246', 'Angeles II', 'Mérida', 'Yucatán'),
(392, '97246', 'Anexo Juan Pablo II', 'Mérida', 'Yucatán'),
(393, '97247', 'San Lorenzo', 'Mérida', 'Yucatán'),
(394, '97249', 'Mulsay', 'Mérida', 'Yucatán'),
(395, '97249', 'Nueva Mulsay', 'Mérida', 'Yucatán'),
(396, '97249', 'Nueva Mulsay I', 'Mérida', 'Yucatán'),
(397, '97249', 'Plantel México', 'Mérida', 'Yucatán'),
(398, '97249', 'Pedregales de Nueva Mulsay Etapa', 'Mérida', 'Yucatán'),
(399, '97249', 'Xoclan Susula', 'Mérida', 'Yucatán'),
(400, '97249', 'Jardines de Nueva Mulsay II', 'Mérida', 'Yucatán'),
(401, '97249', 'Nueva Reforma Agraria', 'Mérida', 'Yucatán'),
(402, '97249', 'Tixcacal Opichen', 'Mérida', 'Yucatán'),
(403, '97249', 'Villa Magna', 'Mérida', 'Yucatán'),
(404, '97249', 'Cinturón Verde', 'Mérida', 'Yucatán'),
(405, '97249', 'Villa Magna II', 'Mérida', 'Yucatán'),
(406, '97249', 'Ampliación Tixcacal Opichen', 'Mérida', 'Yucatán'),
(407, '97249', 'Hacienda Opichen', 'Mérida', 'Yucatán'),
(408, '97249', 'Jardines de Nueva Mulsay III', 'Mérida', 'Yucatán'),
(409, '97249', 'Núcleo Mulsay', 'Mérida', 'Yucatán'),
(410, '97249', 'Girasoles de Opichen', 'Mérida', 'Yucatán'),
(411, '97249', 'Hacienda Opichen', 'Mérida', 'Yucatán'),
(412, '97249', 'Residencial Valparaiso', 'Mérida', 'Yucatán'),
(413, '97249', 'Diamante Paseos de Opichen', 'Mérida', 'Yucatán'),
(414, '97250', 'Nueva Sambula', 'Mérida', 'Yucatán'),
(415, '97250', 'Sambula', 'Mérida', 'Yucatán'),
(416, '97255', 'Bicentenario', 'Mérida', 'Yucatán'),
(417, '97255', 'El Roble', 'Mérida', 'Yucatán'),
(418, '97255', 'Manuel Crescencio Rejon', 'Mérida', 'Yucatán'),
(419, '97255', 'El Roble II', 'Mérida', 'Yucatán'),
(420, '97255', 'Roble Agrícola III', 'Mérida', 'Yucatán'),
(421, '97256', 'Álvaro Torres', 'Mérida', 'Yucatán'),
(422, '97256', 'Graciano Ricalde', 'Mérida', 'Yucatán'),
(423, '97256', 'Libertad II', 'Mérida', 'Yucatán'),
(424, '97256', 'Villas Mérida', 'Mérida', 'Yucatán'),
(425, '97256', 'Libertad III', 'Mérida', 'Yucatán'),
(426, '97256', 'Lol-Be', 'Mérida', 'Yucatán'),
(427, '97256', 'Residencial Nicte', 'Mérida', 'Yucatán'),
(428, '97260', 'Obrera', 'Mérida', 'Yucatán'),
(429, '97260', 'Villa de la Obrera II', 'Mérida', 'Yucatán'),
(430, '97260', 'Villas del Mayab', 'Mérida', 'Yucatán'),
(431, '97260', 'Nueva Obrera', 'Mérida', 'Yucatán'),
(432, '97260', 'Bosques del Pedregal', 'Mérida', 'Yucatán'),
(433, '97260', 'Circuito Colonias', 'Mérida', 'Yucatán'),
(434, '97260', 'Villa Moderna', 'Mérida', 'Yucatán'),
(435, '97267', 'Manzana 115', 'Mérida', 'Yucatán'),
(436, '97268', 'Delio Moreno Canton', 'Mérida', 'Yucatán'),
(437, '97268', 'Quinta Valencia', 'Mérida', 'Yucatán'),
(438, '97269', 'Meliton Salazar', 'Mérida', 'Yucatán'),
(439, '97269', 'Santa Maria de Guadalupe', 'Mérida', 'Yucatán'),
(440, '97269', 'Renacimiento I', 'Mérida', 'Yucatán'),
(441, '97270', 'Dolores Otero', 'Mérida', 'Yucatán'),
(442, '97277', 'Mercedes Barrera', 'Mérida', 'Yucatán'),
(443, '97278', 'Castilla Camara', 'Mérida', 'Yucatán'),
(444, '97279', 'Santa Rosa', 'Mérida', 'Yucatán'),
(445, '97279', 'Quinta Santa Rosa', 'Mérida', 'Yucatán'),
(446, '97280', '5 Colonias', 'Mérida', 'Yucatán'),
(447, '97280', 'Santa Rita', 'Mérida', 'Yucatán'),
(448, '97284', 'Lomas Del Sur', 'Mérida', 'Yucatán'),
(449, '97284', 'Lindavista', 'Mérida', 'Yucatán'),
(450, '97285', 'Bellavista', 'Mérida', 'Yucatán'),
(451, '97285', 'Serapio Rendón', 'Mérida', 'Yucatán'),
(452, '97285', 'San José Tzal', 'Mérida', 'Yucatán'),
(453, '97285', 'Villa Bonita', 'Mérida', 'Yucatán'),
(454, '97285', 'Ampliación Plan de Ayala', 'Mérida', 'Yucatán'),
(455, '97285', 'Haltunchén', 'Mérida', 'Yucatán'),
(456, '97285', 'Plan de Ayala Sur', 'Mérida', 'Yucatán'),
(457, '97285', 'Serapio Rendón III', 'Mérida', 'Yucatán'),
(458, '97285', 'Villas Del Sur', 'Mérida', 'Yucatán'),
(459, '97285', 'Lotificacion Serapio Rendón 1', 'Mérida', 'Yucatán'),
(460, '97285', 'San Carlos del Sur', 'Mérida', 'Yucatán'),
(461, '97285', 'Villa Magna del Sur', 'Mérida', 'Yucatán'),
(462, '97285', 'Jardines del Sur', 'Mérida', 'Yucatán'),
(463, '97285', 'Álamos del Sur', 'Mérida', 'Yucatán'),
(464, '97285', 'Plan de Ayala Sur III', 'Mérida', 'Yucatán'),
(465, '97285', 'Serapio Rendón II', 'Mérida', 'Yucatán'),
(466, '97285', 'Las Nubes', 'Mérida', 'Yucatán'),
(467, '97285', 'Palmas del Sur', 'Mérida', 'Yucatán'),
(468, '97286', 'Las Brisas Del Sur', 'Mérida', 'Yucatán'),
(469, '97287', 'Del Sur', 'Mérida', 'Yucatán'),
(470, '97288', 'Ciudad Industrial', 'Mérida', 'Yucatán'),
(471, '97288', 'Industrial Bridec', 'Mérida', 'Yucatán'),
(472, '97289', 'La Hacienda', 'Mérida', 'Yucatán'),
(473, '97289', 'San Nicolás Del Sur', 'Mérida', 'Yucatán'),
(474, '97289', 'Ampliación La Hacienda', 'Mérida', 'Yucatán'),
(475, '97290', 'San Antonio Xluch', 'Mérida', 'Yucatán'),
(476, '97290', 'Nueva San Jose Tecoh', 'Mérida', 'Yucatán'),
(477, '97290', 'San Antonio Xluch II', 'Mérida', 'Yucatán'),
(478, '97290', 'La Guadalupana', 'Mérida', 'Yucatán'),
(479, '97295', 'Mérida (Lic. Manuel Crescencio Rejón)', 'Mérida', 'Yucatán'),
(480, '97295', 'San Marcos', 'Mérida', 'Yucatán'),
(481, '97295', 'Gran Roble', 'Mérida', 'Yucatán'),
(482, '97295', 'El Roble Agrícola', 'Mérida', 'Yucatán'),
(483, '97295', 'Santa Cruz', 'Mérida', 'Yucatán'),
(484, '97296', 'San Marcos Nocoh', 'Mérida', 'Yucatán'),
(485, '97297', 'Villas Quetzal', 'Mérida', 'Yucatán'),
(486, '97297', 'Emiliano Zapata Sur', 'Mérida', 'Yucatán'),
(487, '97297', 'El Rosal', 'Mérida', 'Yucatán'),
(488, '97297', 'San Luis Sur', 'Mérida', 'Yucatán'),
(489, '97297', 'Metropolitana', 'Mérida', 'Yucatán'),
(490, '97297', 'San Antonio Xluch III', 'Mérida', 'Yucatán'),
(491, '97298', 'Zacilha', 'Mérida', 'Yucatán'),
(492, '97298', 'San Jose Tecoh Sur', 'Mérida', 'Yucatán'),
(493, '97298', 'Privada Zuzil - Ha', 'Mérida', 'Yucatán'),
(494, '97298', 'Zazil - Ha II', 'Mérida', 'Yucatán'),
(495, '97298', 'Brisas de San José', 'Mérida', 'Yucatán'),
(496, '97299', 'San Jose Tecoh', 'Mérida', 'Yucatán'),
(497, '97302', 'Los Tamarindos', 'Mérida', 'Yucatán'),
(498, '97302', 'Residencial Xcanatún', 'Mérida', 'Yucatán'),
(499, '97302', 'Royal del Parque', 'Mérida', 'Yucatán'),
(500, '97302', 'Chablekal', 'Mérida', 'Yucatán'),
(501, '97302', 'Komchén', 'Mérida', 'Yucatán'),
(502, '97302', 'Xcanatún', 'Mérida', 'Yucatán'),
(503, '97302', 'Dzidzilché', 'Mérida', 'Yucatán'),
(504, '97302', 'Sierra Papacal', 'Mérida', 'Yucatán'),
(505, '97302', 'Piedra Antigua', 'Mérida', 'Yucatán'),
(506, '97302', 'Palmequén', 'Mérida', 'Yucatán'),
(507, '97302', 'Xotik', 'Mérida', 'Yucatán'),
(508, '97302', 'San Antonio Residencial', 'Mérida', 'Yucatán'),
(509, '97302', 'Residencial La Alborada', 'Mérida', 'Yucatán'),
(510, '97302', 'Residencial Club Norte Mérida', 'Mérida', 'Yucatán'),
(511, '97302', 'San Antonio Hool', 'Mérida', 'Yucatán'),
(512, '97302', 'Real de Dzityá', 'Mérida', 'Yucatán'),
(513, '97302', 'Punta Lago', 'Mérida', 'Yucatán'),
(514, '97302', 'Parque Industrial Yucatán', 'Mérida', 'Yucatán'),
(515, '97302', 'San Juan Bautista', 'Mérida', 'Yucatán'),
(516, '97302', 'Dzityá', 'Mérida', 'Yucatán'),
(517, '97302', 'Sac-Nicté', 'Mérida', 'Yucatán'),
(518, '97302', 'Temozón Norte', 'Mérida', 'Yucatán'),
(519, '97302', 'Club de Golf La Ceiba', 'Mérida', 'Yucatán'),
(520, '97302', 'Las Américas', 'Mérida', 'Yucatán'),
(521, '97302', 'Real Montejo', 'Mérida', 'Yucatán'),
(522, '97302', 'Residencial del Mayab', 'Mérida', 'Yucatán'),
(523, '97302', 'Las Fincas', 'Mérida', 'Yucatán'),
(524, '97302', 'Núcleo Sodzil', 'Mérida', 'Yucatán'),
(525, '97303', 'Cosgaya', 'Mérida', 'Yucatán'),
(526, '97303', 'Kikteil', 'Mérida', 'Yucatán'),
(527, '97303', 'Noc Ac', 'Mérida', 'Yucatán'),
(528, '97303', 'Cheumán', 'Mérida', 'Yucatán'),
(529, '97304', 'Xcunyá', 'Mérida', 'Yucatán'),
(530, '97304', 'Tamanché', 'Mérida', 'Yucatán'),
(531, '97305', 'Residencial Campestre Viladiu', 'Mérida', 'Yucatán'),
(532, '97305', 'Gran San Pedro Cholul', 'Mérida', 'Yucatán'),
(533, '97305', 'Villas Cholul', 'Mérida', 'Yucatán'),
(534, '97305', 'Bogdan', 'Mérida', 'Yucatán'),
(535, '97305', 'San Luis Cholul', 'Mérida', 'Yucatán'),
(536, '97305', 'Cholul', 'Mérida', 'Yucatán'),
(537, '97305', 'Parque Central', 'Mérida', 'Yucatán'),
(538, '97305', 'Sian Kaan', 'Mérida', 'Yucatán'),
(539, '97305', 'Residencial Anturio', 'Mérida', 'Yucatán'),
(540, '97305', 'Altavista', 'Mérida', 'Yucatán'),
(541, '97305', 'Granjas Cholul', 'Mérida', 'Yucatán'),
(542, '97305', 'Alura', 'Mérida', 'Yucatán'),
(543, '97305', 'Tixcuytún', 'Mérida', 'Yucatán'),
(544, '97305', 'Villas del Bosque Cholul', 'Mérida', 'Yucatán'),
(545, '97305', 'San Gabriel Tulipanes', 'Mérida', 'Yucatán'),
(546, '97305', 'Cabo Norte', 'Mérida', 'Yucatán'),
(547, '97305', 'Parque Natura', 'Mérida', 'Yucatán'),
(548, '97305', 'El Triunfo', 'Mérida', 'Yucatán'),
(549, '97305', 'Santa Gertrudis Copo', 'Mérida', 'Yucatán'),
(550, '97305', 'Algarrobos Desarrollo Residencial', 'Mérida', 'Yucatán'),
(551, '97305', 'Las Margaritas de Cholul', 'Mérida', 'Yucatán'),
(552, '97305', 'Dzibilchaltún', 'Mérida', 'Yucatán'),
(553, '97305', 'Cocoyoles', 'Mérida', 'Yucatán'),
(554, '97305', 'Jalapa', 'Mérida', 'Yucatán'),
(555, '97306', 'Chichi Suárez', 'Mérida', 'Yucatán'),
(556, '97306', 'Sitpach', 'Mérida', 'Yucatán'),
(557, '97306', 'Residencial Floresta', 'Mérida', 'Yucatán'),
(558, '97306', 'Santa María Chí', 'Mérida', 'Yucatán'),
(559, '97306', 'Los Héroes', 'Mérida', 'Yucatán'),
(560, '97307', 'La Rejoyada', 'Mérida', 'Yucatán'),
(561, '97307', 'Jardines de Rejoyada', 'Mérida', 'Yucatán'),
(562, '97307', 'Komchén (Santuario)', 'Mérida', 'Yucatán'),
(563, '97308', 'Santa María Yaxché', 'Mérida', 'Yucatán'),
(564, '97308', 'Yucatán Country Club', 'Mérida', 'Yucatán'),
(565, '97308', 'Misnébalam', 'Mérida', 'Yucatán'),
(566, '97308', 'Universidad del Mayab', 'Mérida', 'Yucatán'),
(567, '97309', 'Yaxché Casares', 'Mérida', 'Yucatán'),
(568, '97310', 'Oncán', 'Mérida', 'Yucatán'),
(569, '97312', 'Los Faisanes de Tixcacal', 'Mérida', 'Yucatán'),
(570, '97312', 'Solana Residencial', 'Mérida', 'Yucatán'),
(571, '97312', 'Providencia', 'Mérida', 'Yucatán'),
(572, '97312', 'Tixcacal', 'Mérida', 'Yucatán'),
(573, '97312', 'Chalmuch', 'Mérida', 'Yucatán'),
(574, '97314', 'Balcones II', 'Mérida', 'Yucatán'),
(575, '97314', 'Ciudad Caucel II', 'Mérida', 'Yucatán'),
(576, '97314', 'Hogares Caucel', 'Mérida', 'Yucatán'),
(577, '97314', 'Caucel', 'Mérida', 'Yucatán'),
(578, '97314', 'Cerradas de la Herradura', 'Mérida', 'Yucatán'),
(579, '97314', 'Villa Jardín', 'Mérida', 'Yucatán'),
(580, '97314', 'La Ceiba', 'Mérida', 'Yucatán'),
(581, '97314', 'La Perla Ciudad Caucel', 'Mérida', 'Yucatán'),
(582, '97314', 'Gran Herradura', 'Mérida', 'Yucatán'),
(583, '97314', 'La Ciudadela', 'Mérida', 'Yucatán'),
(584, '97314', 'Piedra Norte Caucel', 'Mérida', 'Yucatán'),
(585, '97314', 'Sol Caucel', 'Mérida', 'Yucatán'),
(586, '97314', 'Jardines de Caucel', 'Mérida', 'Yucatán'),
(587, '97314', 'Susulá', 'Mérida', 'Yucatán'),
(588, '97314', 'Los Balcones', 'Mérida', 'Yucatán'),
(589, '97314', 'Los Almendros', 'Mérida', 'Yucatán'),
(590, '97314', 'Villas de Caucel', 'Mérida', 'Yucatán'),
(591, '97314', 'Boulevares', 'Mérida', 'Yucatán'),
(592, '97314', 'Arboleda', 'Mérida', 'Yucatán'),
(593, '97314', 'Las Torres I', 'Mérida', 'Yucatán'),
(594, '97314', 'Pedregales de Ciudad Caucel', 'Mérida', 'Yucatán'),
(595, '97314', 'La Herradura II', 'Mérida', 'Yucatán'),
(596, '97314', 'Gran Santa Fe', 'Mérida', 'Yucatán'),
(597, '97314', 'Las Torres', 'Mérida', 'Yucatán'),
(598, '97314', 'Viva Caucel', 'Mérida', 'Yucatán'),
(599, '97314', 'Hacienda Caucel', 'Mérida', 'Yucatán'),
(600, '97314', 'La Herradura III', 'Mérida', 'Yucatán'),
(601, '97314', 'Las Torres II', 'Mérida', 'Yucatán'),
(602, '97314', 'Centenario Cámara de Comercio Caucel', 'Mérida', 'Yucatán'),
(603, '97314', 'Sol Caucel III', 'Mérida', 'Yucatán'),
(604, '97314', 'Ciudad Caucel', 'Mérida', 'Yucatán'),
(605, '97315', 'Nuevo San José Tecoh III', 'Mérida', 'Yucatán'),
(606, '97315', 'Dzununcán', 'Mérida', 'Yucatán'),
(607, '97315', 'Molas', 'Mérida', 'Yucatán'),
(608, '97315', 'San José Tzal', 'Mérida', 'Yucatán'),
(609, '97315', 'Tahdzibichén', 'Mérida', 'Yucatán'),
(610, '97315', 'San Antonio Tzacalá', 'Mérida', 'Yucatán'),
(611, '97315', 'Dzununcan', 'Mérida', 'Yucatán'),
(612, '97315', 'Hunxectamán', 'Mérida', 'Yucatán'),
(613, '97315', 'Jardines de Tahdzibichén', 'Mérida', 'Yucatán'),
(614, '97315', 'San Pedro Chimay', 'Mérida', 'Yucatán'),
(615, '97315', 'Texán Cámara', 'Mérida', 'Yucatán'),
(616, '97315', 'Santa Cruz Palomeque', 'Mérida', 'Yucatán'),
(617, '97315', 'Xmatkuil', 'Mérida', 'Yucatán'),
(618, '97315', 'La Guadalupana', 'Mérida', 'Yucatán'),
(619, '97315', 'Nuevo San José Tecoh', 'Mérida', 'Yucatán'),
(620, '97315', 'Petac', 'Mérida', 'Yucatán'),
(621, '97316', 'Dzoyaxché', 'Mérida', 'Yucatán'),
(622, '97316', 'San Ignacio Tesip', 'Mérida', 'Yucatán'),
(623, '97316', 'Yaxnic', 'Mérida', 'Yucatán'),
(624, '97320', 'Vicente Guerrero', 'Progreso', 'Yucatán'),
(625, '97320', 'Progreso Centro', 'Progreso', 'Yucatán'),
(626, '97320', 'Feliciano Canul Reyes', 'Progreso', 'Yucatán'),
(627, '97320', 'Ismael Garcia', 'Progreso', 'Yucatán'),
(628, '97320', 'Juan Montalvo', 'Progreso', 'Yucatán'),
(629, '97320', 'Nueva Yucalpeten', 'Progreso', 'Yucatán'),
(630, '97320', 'Revolución', 'Progreso', 'Yucatán'),
(631, '97320', 'Héctor Victoria', 'Progreso', 'Yucatán'),
(632, '97320', 'Costa Azul', 'Progreso', 'Yucatán'),
(633, '97320', '23 de Noviembre', 'Progreso', 'Yucatán'),
(634, '97320', 'Las Fuentes', 'Progreso', 'Yucatán'),
(635, '97320', 'Fovissste', 'Progreso', 'Yucatán'),
(636, '97320', 'Las Palmas', 'Progreso', 'Yucatán'),
(637, '97320', 'Fovissste Brisas', 'Progreso', 'Yucatán'),
(638, '97320', 'Ciénega 2000', 'Progreso', 'Yucatán'),
(639, '97320', 'Francisco I. Madero', 'Progreso', 'Yucatán'),
(640, '97324', 'Campestre Flamboyanes', 'Progreso', 'Yucatán'),
(641, '97330', 'Chicxulub Puerto', 'Progreso', 'Yucatán'),
(642, '97334', 'San Ignacio', 'Progreso', 'Yucatán'),
(643, '97336', 'Chuburna Puerto', 'Progreso', 'Yucatán'),
(644, '97336', 'Chelem', 'Progreso', 'Yucatán'),
(645, '97336', 'Yucalpeten', 'Progreso', 'Yucatán'),
(646, '97337', 'Muelle y Puerto de Altura', 'Progreso', 'Yucatán'),
(647, '97340', 'Chicxulub', 'Chicxulub Pueblo', 'Yucatán'),
(648, '97342', 'Quintas Baspul', 'Chicxulub Pueblo', 'Yucatán'),
(649, '97343', 'Ixil', 'Ixil', 'Yucatán'),
(650, '97343', 'Concepción', 'Ixil', 'Yucatán'),
(651, '97343', 'San Rafael', 'Ixil', 'Yucatán'),
(652, '97345', 'Jardines de Conkal', 'Conkal', 'Yucatán'),
(653, '97345', 'Villas de Conkal', 'Conkal', 'Yucatán'),
(654, '97345', 'Real de Conkal', 'Conkal', 'Yucatán'),
(655, '97345', 'Paseo del Ángel', 'Conkal', 'Yucatán'),
(656, '97345', 'Santa Cruz', 'Conkal', 'Yucatán'),
(657, '97345', 'Pedregales de Conkal', 'Conkal', 'Yucatán'),
(658, '97345', 'Palma Real', 'Conkal', 'Yucatán'),
(659, '97345', 'Bosques de Conkal', 'Conkal', 'Yucatán'),
(660, '97345', 'Magnolia Residencial', 'Conkal', 'Yucatán'),
(661, '97345', 'Manere', 'Conkal', 'Yucatán'),
(662, '97345', 'Conkal', 'Conkal', 'Yucatán'),
(663, '97345', 'Los Laureles', 'Conkal', 'Yucatán'),
(664, '97345', 'Verde Limón', 'Conkal', 'Yucatán'),
(665, '97346', 'Vega del Mayab', 'Conkal', 'Yucatán'),
(666, '97346', 'X-Cuyum', 'Conkal', 'Yucatán'),
(667, '97346', 'Santa María Rosas', 'Conkal', 'Yucatán'),
(668, '97347', 'Praderas del Mayab', 'Conkal', 'Yucatán'),
(669, '97347', 'Kantoyna', 'Conkal', 'Yucatán'),
(670, '97348', 'Yaxkukul', 'Yaxkukul', 'Yucatán'),
(671, '97350', 'Papagayos', 'Hunucmá', 'Yucatán'),
(672, '97350', 'Centro Hunucmá', 'Hunucmá', 'Yucatán'),
(673, '97353', 'Texán de Palomeque', 'Hunucmá', 'Yucatán'),
(674, '97353', 'San Antonio Chel', 'Hunucmá', 'Yucatán'),
(675, '97353', 'Hunkanab', 'Hunucmá', 'Yucatán'),
(676, '97356', 'Sisal', 'Hunucmá', 'Yucatán'),
(677, '97357', 'San Juan', 'Ucú', 'Yucatán'),
(678, '97357', 'Ucú', 'Ucú', 'Yucatán'),
(679, '97357', 'Yaxche de Peón', 'Ucú', 'Yucatán'),
(680, '97360', 'Kinchil', 'Kinchil', 'Yucatán'),
(681, '97362', 'Tamchén', 'Kinchil', 'Yucatán'),
(682, '97364', 'Tetiz', 'Tetiz', 'Yucatán'),
(683, '97365', 'Nohuayun', 'Tetiz', 'Yucatán'),
(684, '97367', 'Celestún', 'Celestún', 'Yucatán'),
(685, '97367', 'Chac Canché', 'Celestún', 'Yucatán'),
(686, '97367', 'Santa Cruz Xixim', 'Celestún', 'Yucatán'),
(687, '97370', 'Santa Cecilia', 'Kanasín', 'Yucatán'),
(688, '97370', 'Valle Azul', 'Kanasín', 'Yucatán'),
(689, '97370', 'Privada del Sol', 'Kanasín', 'Yucatán'),
(690, '97370', 'Girasoles', 'Kanasín', 'Yucatán'),
(691, '97370', 'Fontana I', 'Kanasín', 'Yucatán'),
(692, '97370', 'Las Palmeras', 'Kanasín', 'Yucatán'),
(693, '97370', 'Arecas', 'Kanasín', 'Yucatán'),
(694, '97370', 'San Haroldo San José Tzal', 'Kanasín', 'Yucatán'),
(695, '97370', 'Leona Vicario', 'Kanasín', 'Yucatán'),
(696, '97370', 'Jardines de San Pedro Noh Pat', 'Kanasín', 'Yucatán'),
(697, '97370', 'Puerta del Sol', 'Kanasín', 'Yucatán'),
(698, '97370', 'Pedregales de Kanasín II', 'Kanasín', 'Yucatán'),
(699, '97370', 'Valle Oriente', 'Kanasín', 'Yucatán'),
(700, '97370', 'Villas Turquesa', 'Kanasín', 'Yucatán'),
(701, '97370', 'Álamos de Oriente', 'Kanasín', 'Yucatán'),
(702, '97370', 'Cuauhtémoc', 'Kanasín', 'Yucatán'),
(703, '97370', 'Los Pinos de Mulchechen', 'Kanasín', 'Yucatán'),
(704, '97370', 'Puerta Esmeralda', 'Kanasín', 'Yucatán'),
(705, '97370', 'La Ceiba', 'Kanasín', 'Yucatán'),
(706, '97370', 'Pedregales del Oriente', 'Kanasín', 'Yucatán'),
(707, '97370', 'Las Palmas Yucatán', 'Kanasín', 'Yucatán'),
(708, '97370', 'Xelpac', 'Kanasín', 'Yucatán'),
(709, '97370', 'Ampliación Xelpac', 'Kanasín', 'Yucatán'),
(710, '97370', 'San Ignacio', 'Kanasín', 'Yucatán'),
(711, '97370', 'Santa Ana', 'Kanasín', 'Yucatán'),
(712, '97370', 'Condesa', 'Kanasín', 'Yucatán'),
(713, '97370', 'Mulchechén II', 'Kanasín', 'Yucatán'),
(714, '97370', 'Cielo Alto', 'Kanasín', 'Yucatán'),
(715, '97370', 'Despertare', 'Kanasín', 'Yucatán'),
(716, '97370', 'Coyoles', 'Kanasín', 'Yucatán'),
(717, '97370', 'El Encanto Kanasín', 'Kanasín', 'Yucatán'),
(718, '97370', 'Arboleda Kanasín', 'Kanasín', 'Yucatán'),
(719, '97370', 'San José Kanasín', 'Kanasín', 'Yucatán'),
(720, '97370', 'Villa Bonita', 'Kanasín', 'Yucatán'),
(721, '97370', 'Rinconada Kanasín', 'Kanasín', 'Yucatán'),
(722, '97370', 'Villa Mercedes', 'Kanasín', 'Yucatán'),
(723, '97370', 'Las Perlas', 'Kanasín', 'Yucatán'),
(724, '97370', 'Valle Oriente de San Pedro Noh Pat', 'Kanasín', 'Yucatán'),
(725, '97370', 'Pedregales de Kanasín', 'Kanasín', 'Yucatán'),
(726, '97370', 'Residencial', 'Kanasín', 'Yucatán'),
(727, '97370', 'VIVAH', 'Kanasín', 'Yucatán'),
(728, '97370', 'Las Haciendas', 'Kanasín', 'Yucatán'),
(729, '97370', 'La Piedra', 'Kanasín', 'Yucatán'),
(730, '97370', 'Andrés Quintana Roo', 'Kanasín', 'Yucatán'),
(731, '97370', 'Alamos Mulchechen', 'Kanasín', 'Yucatán'),
(732, '97370', 'El Cerrito', 'Kanasín', 'Yucatán'),
(733, '97370', 'Vistana', 'Kanasín', 'Yucatán'),
(734, '97370', 'Amalia Solorzano II', 'Kanasín', 'Yucatán'),
(735, '97370', 'Kanasín Centro', 'Kanasín', 'Yucatán'),
(736, '97370', 'Colibrí', 'Kanasín', 'Yucatán'),
(737, '97370', 'CROC', 'Kanasín', 'Yucatán'),
(738, '97370', 'Francisco Villa Oriente', 'Kanasín', 'Yucatán'),
(739, '97370', 'Mulchechén', 'Kanasín', 'Yucatán'),
(740, '97370', 'San Antonio Kaua III', 'Kanasín', 'Yucatán'),
(741, '97370', 'Hector Victoria', 'Kanasín', 'Yucatán'),
(742, '97370', 'Pablo Moreno', 'Kanasín', 'Yucatán'),
(743, '97370', 'Reparto las Granjas', 'Kanasín', 'Yucatán'),
(744, '97370', 'San Camilo', 'Kanasín', 'Yucatán'),
(745, '97370', 'Los Encinos', 'Kanasín', 'Yucatán'),
(746, '97370', 'San Pedro Noh Pat', 'Kanasín', 'Yucatán'),
(747, '97370', 'Flor de Mayo', 'Kanasín', 'Yucatán'),
(748, '97370', 'Jardines de Mulchechen', 'Kanasín', 'Yucatán'),
(749, '97370', 'Jardines de Kanasín', 'Kanasín', 'Yucatán'),
(750, '97370', 'Los Tulipanes', 'Kanasín', 'Yucatán'),
(751, '97370', 'Palmas San Pedro', 'Kanasín', 'Yucatán'),
(752, '97370', 'Las Flores', 'Kanasín', 'Yucatán'),
(753, '97370', 'Los Robles III', 'Kanasín', 'Yucatán'),
(754, '97370', 'La Joya', 'Kanasín', 'Yucatán'),
(755, '97370', 'Los Robles', 'Kanasín', 'Yucatán'),
(756, '97370', 'Villas del Oriente', 'Kanasín', 'Yucatán'),
(757, '97370', 'Cecilio Chi', 'Kanasín', 'Yucatán'),
(758, '97373', 'Santa Isabel', 'Kanasín', 'Yucatán'),
(759, '97374', 'San Aroldo', 'Kanasín', 'Yucatán'),
(760, '97374', 'San Pedro (Deshuesadero)', 'Kanasín', 'Yucatán'),
(761, '97374', 'Teya', 'Kanasín', 'Yucatán'),
(762, '97376', 'San Antonio Tehuitz', 'Kanasín', 'Yucatán'),
(763, '97377', 'Tekik de Regil', 'Timucuy', 'Yucatán'),
(764, '97377', 'Timucuy', 'Timucuy', 'Yucatán'),
(765, '97378', 'Subincancab', 'Timucuy', 'Yucatán'),
(766, '97380', 'Santiago', 'Acanceh', 'Yucatán'),
(767, '97380', 'Acanceh', 'Acanceh', 'Yucatán'),
(768, '97380', 'Canicab', 'Acanceh', 'Yucatán'),
(769, '97380', 'Ticopó', 'Acanceh', 'Yucatán'),
(770, '97380', 'El Zapotal', 'Acanceh', 'Yucatán'),
(771, '97382', 'Tepich Carrillo', 'Acanceh', 'Yucatán'),
(772, '97383', 'Cibceh', 'Acanceh', 'Yucatán'),
(773, '97383', 'Petectunich', 'Acanceh', 'Yucatán'),
(774, '97383', 'Sacchich', 'Acanceh', 'Yucatán'),
(775, '97386', 'Tixpéhual', 'Tixpéhual', 'Yucatán'),
(776, '97387', 'Chocho', 'Tixpéhual', 'Yucatán'),
(777, '97387', 'Kilinche', 'Tixpéhual', 'Yucatán'),
(778, '97388', 'Sahe', 'Tixpéhual', 'Yucatán'),
(779, '97388', 'Cuca', 'Tixpéhual', 'Yucatán'),
(780, '97389', 'Techoh', 'Tixpéhual', 'Yucatán'),
(781, '97390', 'Brisas de Umán', 'Umán', 'Yucatán'),
(782, '97390', 'Las Perlas de Umán', 'Umán', 'Yucatán'),
(783, '97390', 'El Oasis', 'Umán', 'Yucatán'),
(784, '97390', 'Camino Real', 'Umán', 'Yucatán'),
(785, '97390', 'Los Arcos I', 'Umán', 'Yucatán'),
(786, '97390', 'Residencial San Lázaro', 'Umán', 'Yucatán'),
(787, '97390', 'Centro Umán', 'Umán', 'Yucatán'),
(788, '97390', 'Acim I', 'Umán', 'Yucatán'),
(789, '97390', 'Los Ceibos', 'Umán', 'Yucatán'),
(790, '97390', 'Ampliación Ciudad Industrial', 'Umán', 'Yucatán'),
(791, '97390', 'La Mejorada', 'Umán', 'Yucatán'),
(792, '97390', 'Bosques de San Francisco', 'Umán', 'Yucatán'),
(793, '97390', 'San Lorenzo', 'Umán', 'Yucatán'),
(794, '97390', 'Cepeda Peraza', 'Umán', 'Yucatán'),
(795, '97390', 'Lázaro Cárdenas', 'Umán', 'Yucatán'),
(796, '97390', 'La Candelaria', 'Umán', 'Yucatán'),
(797, '97390', 'Dzibikal', 'Umán', 'Yucatán'),
(798, '97390', 'Santa Elena', 'Umán', 'Yucatán'),
(799, '97390', 'Miguel Hidalgo y Costilla', 'Umán', 'Yucatán'),
(800, '97390', 'Bosques de Umán', 'Umán', 'Yucatán'),
(801, '97390', 'Los Arcos II', 'Umán', 'Yucatán'),
(802, '97390', 'Acim II', 'Umán', 'Yucatán'),
(803, '97390', 'San Carlos', 'Umán', 'Yucatán'),
(804, '97392', 'Piedra de Agua', 'Umán', 'Yucatán'),
(805, '97392', 'El Roble Agrícola IV', 'Umán', 'Yucatán'),
(806, '97392', 'Itzincab', 'Umán', 'Yucatán'),
(807, '97393', 'Oxcum', 'Umán', 'Yucatán'),
(808, '97393', 'Dzibikak', 'Umán', 'Yucatán'),
(809, '97394', 'Taníl', 'Umán', 'Yucatán'),
(810, '97394', 'Xcucul Sur', 'Umán', 'Yucatán'),
(811, '97394', 'Gran Santa Cruz', 'Umán', 'Yucatán'),
(812, '97394', 'Tebec', 'Umán', 'Yucatán'),
(813, '97394', 'Ticimul', 'Umán', 'Yucatán'),
(814, '97394', 'Petecbiltun', 'Umán', 'Yucatán'),
(815, '97394', 'Xtepen', 'Umán', 'Yucatán'),
(816, '97395', 'Hotzuc', 'Umán', 'Yucatán'),
(817, '97396', 'Yaxcopoil', 'Umán', 'Yucatán'),
(818, '97396', 'San Antonio Mulix', 'Umán', 'Yucatán'),
(819, '97397', 'Bolon', 'Umán', 'Yucatán'),
(820, '97397', 'Oxholon', 'Umán', 'Yucatán'),
(821, '97397', 'San Antonio Chun', 'Umán', 'Yucatán'),
(822, '97397', 'Poxila', 'Umán', 'Yucatán'),
(823, '97400', 'Centro Telchac Pueblo', 'Telchac Pueblo', 'Yucatán'),
(824, '97404', 'INFONAVIT', 'Dzemul', 'Yucatán'),
(825, '97404', 'Dzemul', 'Dzemul', 'Yucatán'),
(826, '97405', 'Xtampú', 'Dzemul', 'Yucatán'),
(827, '97405', 'Xcambó', 'Dzemul', 'Yucatán'),
(828, '97406', 'San Eduardo', 'Dzemul', 'Yucatán'),
(829, '97406', 'San Diego', 'Dzemul', 'Yucatán'),
(830, '97407', 'Telchac Puerto', 'Telchac Puerto', 'Yucatán'),
(831, '97410', 'Cansahcab', 'Cansahcab', 'Yucatán'),
(832, '97414', 'Santa María', 'Cansahcab', 'Yucatán'),
(833, '97415', 'San Antonio Xiat', 'Cansahcab', 'Yucatán'),
(834, '97415', 'Kankabchen de Molina', 'Cansahcab', 'Yucatán'),
(835, '97417', 'San Antonio', 'Cansahcab', 'Yucatán'),
(836, '97420', 'Sinanché', 'Sinanché', 'Yucatán'),
(837, '97420', 'Miguel Alemán', 'Sinanché', 'Yucatán'),
(838, '97424', 'San Crisanto', 'Sinanché', 'Yucatán'),
(839, '97425', 'Yobaín', 'Yobaín', 'Yucatán'),
(840, '97426', 'Chabihau', 'Yobaín', 'Yucatán'),
(841, '97430', 'Motul de Carrillo Puerto Centro', 'Motul', 'Yucatán'),
(842, '97430', 'Sambulá', 'Motul', 'Yucatán'),
(843, '97430', 'San Carlos', 'Motul', 'Yucatán'),
(844, '97430', 'El Roble', 'Motul', 'Yucatán'),
(845, '97430', 'Santa Cruz Pachón', 'Motul', 'Yucatán'),
(846, '97432', 'San Silverio', 'Motul', 'Yucatán'),
(847, '97432', 'Felipe Carrillo Puerto', 'Motul', 'Yucatán'),
(848, '97432', 'Infonavit', 'Motul', 'Yucatán'),
(849, '97432', 'Mario H Cuevas', 'Motul', 'Yucatán'),
(850, '97432', 'Perla de La Costa', 'Motul', 'Yucatán'),
(851, '97432', 'Las Huertas', 'Motul', 'Yucatán'),
(852, '97432', 'Puerta del Sol', 'Motul', 'Yucatán'),
(853, '97432', 'Londres', 'Motul', 'Yucatán'),
(854, '97432', 'Vivah', 'Motul', 'Yucatán'),
(855, '97433', 'Santiago Castillo', 'Motul', 'Yucatán'),
(856, '97433', 'San Juan', 'Motul', 'Yucatán'),
(857, '97434', 'Edesio Carrillo', 'Motul', 'Yucatán'),
(858, '97434', 'Rogelio Chalé', 'Motul', 'Yucatán'),
(859, '97434', 'La Herradura', 'Motul', 'Yucatán'),
(860, '97434', 'San Roque', 'Motul', 'Yucatán'),
(861, '97436', 'Sacapuc', 'Motul', 'Yucatán'),
(862, '97436', 'Timul', 'Motul', 'Yucatán'),
(863, '97437', 'Kini', 'Motul', 'Yucatán'),
(864, '97440', 'Uci', 'Motul', 'Yucatán'),
(865, '97440', 'Kancabchen', 'Motul', 'Yucatán'),
(866, '97440', 'Komchén Martínez', 'Motul', 'Yucatán'),
(867, '97440', 'Santa Teresa', 'Motul', 'Yucatán'),
(868, '97440', 'San Pedro Chacabal', 'Motul', 'Yucatán'),
(869, '97443', 'Tanya', 'Motul', 'Yucatán'),
(870, '97443', 'Kancabal', 'Motul', 'Yucatán'),
(871, '97444', 'Kaxatah', 'Motul', 'Yucatán'),
(872, '97444', 'Mesatunich', 'Motul', 'Yucatán'),
(873, '97444', 'Kopte', 'Motul', 'Yucatán'),
(874, '97444', 'Kambul', 'Motul', 'Yucatán'),
(875, '97444', 'Dzununcan', 'Motul', 'Yucatán'),
(876, '97444', 'Kancabchén Uci', 'Motul', 'Yucatán'),
(877, '97444', 'San Pedro Camara', 'Motul', 'Yucatán'),
(878, '97445', 'San Antonio Dzinah', 'Motul', 'Yucatán'),
(879, '97446', 'San José Hili', 'Motul', 'Yucatán'),
(880, '97446', 'Sakolá', 'Motul', 'Yucatán'),
(881, '97450', 'Baca', 'Baca', 'Yucatán'),
(882, '97452', 'Tixkuncheil', 'Baca', 'Yucatán'),
(883, '97452', 'Kankabchen', 'Baca', 'Yucatán'),
(884, '97453', 'San Isidro Kuxub', 'Baca', 'Yucatán'),
(885, '97453', 'San Nicolás', 'Baca', 'Yucatán'),
(886, '97454', 'Mococha', 'Mocochá', 'Yucatán'),
(887, '97455', 'Too', 'Mocochá', 'Yucatán'),
(888, '97456', 'Tekat', 'Mocochá', 'Yucatán'),
(889, '97457', 'Muxupip', 'Muxupip', 'Yucatán'),
(890, '97458', 'San Juan Koop', 'Muxupip', 'Yucatán'),
(891, '97458', 'San José Grande', 'Muxupip', 'Yucatán'),
(892, '97460', 'Santa Teresa', 'Cacalchén', 'Yucatán'),
(893, '97460', 'Cacalchen', 'Cacalchén', 'Yucatán'),
(894, '97466', 'Bokobá', 'Bokobá', 'Yucatán'),
(895, '97470', 'Tixkokob', 'Tixkokob', 'Yucatán'),
(896, '97473', 'Kankabchen', 'Tixkokob', 'Yucatán'),
(897, '97473', 'San José', 'Tixkokob', 'Yucatán'),
(898, '97474', 'Ekmul', 'Tixkokob', 'Yucatán'),
(899, '97474', 'Euan', 'Tixkokob', 'Yucatán'),
(900, '97474', 'Ruinas de Ake', 'Tixkokob', 'Yucatán'),
(901, '97475', 'Hubila', 'Tixkokob', 'Yucatán'),
(902, '97476', 'San Antonio Millet', 'Tixkokob', 'Yucatán'),
(903, '97477', 'Nolo', 'Tixkokob', 'Yucatán'),
(904, '97480', 'Hoctun', 'Hoctún', 'Yucatán'),
(905, '97483', 'Dziuche', 'Hoctún', 'Yucatán'),
(906, '97486', 'San José Oriente', 'Hoctún', 'Yucatán'),
(907, '97490', 'Tahmek', 'Tahmek', 'Yucatán'),
(908, '97500', 'Dzidzantún', 'Dzidzantún', 'Yucatán'),
(909, '97500', 'Emiliano Zapata', 'Dzidzantún', 'Yucatán'),
(910, '97500', 'San Diego Chumul', 'Dzidzantún', 'Yucatán'),
(911, '97500', 'San Juan', 'Dzidzantún', 'Yucatán'),
(912, '97500', 'Vicente Guerrero', 'Dzidzantún', 'Yucatán'),
(913, '97504', 'Mina de Oro', 'Dzidzantún', 'Yucatán'),
(914, '97504', 'Santa Clara', 'Dzidzantún', 'Yucatán'),
(915, '97506', 'San Francisco Manzanilla', 'Dzidzantún', 'Yucatán'),
(916, '97510', 'Temax', 'Temax', 'Yucatán'),
(917, '97513', 'San Antonio Camara', 'Temax', 'Yucatán'),
(918, '97515', 'Chucmichén', 'Temax', 'Yucatán'),
(919, '97515', 'Chenche de Las Torres', 'Temax', 'Yucatán'),
(920, '97516', 'Santa Ursula', 'Temax', 'Yucatán'),
(921, '97520', 'Tekantó', 'Tekantó', 'Yucatán'),
(922, '97522', 'Tixkocho', 'Tekantó', 'Yucatán'),
(923, '97522', 'Sanlatah', 'Tekantó', 'Yucatán'),
(924, '97523', 'San Francisco Dzan', 'Tekantó', 'Yucatán'),
(925, '97524', 'Teya', 'Teya', 'Yucatán'),
(926, '97527', 'Suma', 'Suma', 'Yucatán'),
(927, '97527', 'San Nicolás', 'Suma', 'Yucatán'),
(928, '97530', 'Tepakán', 'Tepakán', 'Yucatán'),
(929, '97532', 'Kantirix', 'Tepakán', 'Yucatán'),
(930, '97535', 'Tekal de Venegas', 'Tekal de Venegas', 'Yucatán'),
(931, '97536', 'El Ancla', 'Tekal de Venegas', 'Yucatán'),
(932, '97536', 'Tohoku', 'Tekal de Venegas', 'Yucatán'),
(933, '97536', 'San Felipe', 'Tekal de Venegas', 'Yucatán'),
(934, '97540', 'Benito Juárez', 'Izamal', 'Yucatán'),
(935, '97540', 'Quinta Real', 'Izamal', 'Yucatán'),
(936, '97540', 'San Genaro', 'Izamal', 'Yucatán'),
(937, '97540', 'Santo Domingo', 'Izamal', 'Yucatán');
INSERT INTO `postalcodes` (`id`, `postalcode`, `address`, `city`, `state`) VALUES
(938, '97540', 'Emiliano Zapata', 'Izamal', 'Yucatán'),
(939, '97540', 'Izamal', 'Izamal', 'Yucatán'),
(940, '97540', 'Real del Sol', 'Izamal', 'Yucatán'),
(941, '97540', 'San Juan Izamal', 'Izamal', 'Yucatán'),
(942, '97545', 'Sitilpech', 'Izamal', 'Yucatán'),
(943, '97550', 'Citilcum', 'Izamal', 'Yucatán'),
(944, '97550', 'Kimbila', 'Izamal', 'Yucatán'),
(945, '97553', 'San José Kanán', 'Izamal', 'Yucatán'),
(946, '97555', 'Cuauhtémoc', 'Izamal', 'Yucatán'),
(947, '97556', 'Xanabá', 'Izamal', 'Yucatán'),
(948, '97556', 'Yaxché', 'Izamal', 'Yucatán'),
(949, '97556', 'Popolá', 'Izamal', 'Yucatán'),
(950, '97557', 'San José', 'Izamal', 'Yucatán'),
(951, '97557', 'San Antonio', 'Izamal', 'Yucatán'),
(952, '97560', 'Hocabá', 'Hocabá', 'Yucatán'),
(953, '97563', 'El Nance', 'Hocabá', 'Yucatán'),
(954, '97564', 'Sahcaba', 'Hocabá', 'Yucatán'),
(955, '97566', 'Xocchel', 'Xocchel', 'Yucatán'),
(956, '97570', 'Seyé', 'Seyé', 'Yucatán'),
(957, '97570', 'Vicente Guerrero', 'Seyé', 'Yucatán'),
(958, '97573', 'Holactún', 'Seyé', 'Yucatán'),
(959, '97574', 'Xucu', 'Seyé', 'Yucatán'),
(960, '97575', 'San Bernardino', 'Seyé', 'Yucatán'),
(961, '97575', 'Nohcham', 'Seyé', 'Yucatán'),
(962, '97577', 'Cuzama', 'Cuzamá', 'Yucatán'),
(963, '97577', 'Eknacan', 'Cuzamá', 'Yucatán'),
(964, '97577', 'Nohchacan', 'Cuzamá', 'Yucatán'),
(965, '97578', 'Yaxkukul', 'Cuzamá', 'Yucatán'),
(966, '97578', 'Chunkanan', 'Cuzamá', 'Yucatán'),
(967, '97579', 'San Francisco Sisal', 'Cuzamá', 'Yucatán'),
(968, '97580', 'Viva', 'Homún', 'Yucatán'),
(969, '97580', 'Homun', 'Homún', 'Yucatán'),
(970, '97583', 'Polabán', 'Homún', 'Yucatán'),
(971, '97585', 'Yalahau', 'Homún', 'Yucatán'),
(972, '97586', 'San Isidro Ochil', 'Homún', 'Yucatán'),
(973, '97587', 'Sanahcat', 'Sanahcat', 'Yucatán'),
(974, '97590', 'Huhí', 'Huhí', 'Yucatán'),
(975, '97596', 'Tixcacal Quintero', 'Huhí', 'Yucatán'),
(976, '97600', 'Dzilam González', 'Dzilam González', 'Yucatán'),
(977, '97604', 'Dzonot Sabila', 'Dzilam González', 'Yucatán'),
(978, '97606', 'Dzilam de Bravo', 'Dzilam de Bravo', 'Yucatán'),
(979, '97608', 'Chun-Xaan', 'Dzilam de Bravo', 'Yucatán'),
(980, '97609', 'Kennedy', 'Dzilam de Bravo', 'Yucatán'),
(981, '97610', 'Panaba', 'Panabá', 'Yucatán'),
(982, '97614', 'San Juan del Río', 'Panabá', 'Yucatán'),
(983, '97614', 'Loche', 'Panabá', 'Yucatán'),
(984, '97614', 'San Francisco', 'Panabá', 'Yucatán'),
(985, '97615', 'San Antonio', 'Panabá', 'Yucatán'),
(986, '97615', 'Cenote Yalsihón Buena Fe', 'Panabá', 'Yucatán'),
(987, '97615', 'Vista Alegre', 'Panabá', 'Yucatán'),
(988, '97615', 'Noczal', 'Panabá', 'Yucatán'),
(989, '97616', 'San Felipe', 'San Felipe', 'Yucatán'),
(990, '97620', 'Buctzotz', 'Buctzotz', 'Yucatán'),
(991, '97623', 'X-bec', 'Buctzotz', 'Yucatán'),
(992, '97623', 'Chanmotul', 'Buctzotz', 'Yucatán'),
(993, '97624', 'Nohyaxche', 'Buctzotz', 'Yucatán'),
(994, '97624', 'La Gran Lucha', 'Buctzotz', 'Yucatán'),
(995, '97625', 'Nup-Dzonot', 'Buctzotz', 'Yucatán'),
(996, '97625', 'B. Esperanza', 'Buctzotz', 'Yucatán'),
(997, '97625', 'San Francisco', 'Buctzotz', 'Yucatán'),
(998, '97625', 'Grano de Oro', 'Buctzotz', 'Yucatán'),
(999, '97625', 'U. Juárez', 'Buctzotz', 'Yucatán'),
(1000, '97626', 'San Juan', 'Buctzotz', 'Yucatán'),
(1001, '97626', 'San Pedro', 'Buctzotz', 'Yucatán'),
(1002, '97627', 'Santo Domingo', 'Buctzotz', 'Yucatán'),
(1003, '97630', 'Sucilá', 'Sucilá', 'Yucatán'),
(1004, '97634', 'Chan Panaba', 'Sucilá', 'Yucatán'),
(1005, '97636', 'A.G. San Martín', 'Sucilá', 'Yucatán'),
(1006, '97640', 'Cenotillo', 'Cenotillo', 'Yucatán'),
(1007, '97645', 'Tixbacab', 'Cenotillo', 'Yucatán'),
(1008, '97645', 'X-Lobos', 'Cenotillo', 'Yucatán'),
(1009, '97645', 'Tucina', 'Cenotillo', 'Yucatán'),
(1010, '97646', 'Dzoncauich', 'Dzoncauich', 'Yucatán'),
(1011, '97647', 'Chacmay', 'Dzoncauich', 'Yucatán'),
(1012, '97650', 'Tunkás', 'Tunkás', 'Yucatán'),
(1013, '97653', 'San José Pibtuch', 'Tunkás', 'Yucatán'),
(1014, '97653', 'Chabak', 'Tunkás', 'Yucatán'),
(1015, '97654', 'Nicte Ha', 'Tunkás', 'Yucatán'),
(1016, '97654', 'Mactun', 'Tunkás', 'Yucatán'),
(1017, '97654', 'Kancabchén', 'Tunkás', 'Yucatán'),
(1018, '97654', 'Noc Ac', 'Tunkás', 'Yucatán'),
(1019, '97654', 'Chakan Ebula', 'Tunkás', 'Yucatán'),
(1020, '97654', 'Onichen', 'Tunkás', 'Yucatán'),
(1021, '97654', 'San Román', 'Tunkás', 'Yucatán'),
(1022, '97654', 'San Antonio Chuc', 'Tunkás', 'Yucatán'),
(1023, '97654', 'Yaxha', 'Tunkás', 'Yucatán'),
(1024, '97654', 'Santa Rosa', 'Tunkás', 'Yucatán'),
(1025, '97655', 'Quintana Roo', 'Quintana Roo', 'Yucatán'),
(1026, '97660', 'Dzitás', 'Dzitás', 'Yucatán'),
(1027, '97666', 'Xocempich', 'Dzitás', 'Yucatán'),
(1028, '97666', 'Yaxche', 'Dzitás', 'Yucatán'),
(1029, '97670', 'Kantunil', 'Kantunil', 'Yucatán'),
(1030, '97675', 'Holcá', 'Kantunil', 'Yucatán'),
(1031, '97676', 'Sudzal', 'Sudzal', 'Yucatán'),
(1032, '97677', 'Brasil', 'Sudzal', 'Yucatán'),
(1033, '97677', 'San Antonio Chalante', 'Sudzal', 'Yucatán'),
(1034, '97677', 'San Juan', 'Sudzal', 'Yucatán'),
(1035, '97677', 'Tzalam', 'Sudzal', 'Yucatán'),
(1036, '97677', 'San Martín', 'Sudzal', 'Yucatán'),
(1037, '97678', 'Chumbec', 'Sudzal', 'Yucatán'),
(1038, '97678', 'Kamcabchen', 'Sudzal', 'Yucatán'),
(1039, '97680', 'Tekit', 'Tekit', 'Yucatán'),
(1040, '97684', 'Susula', 'Tekit', 'Yucatán'),
(1041, '97686', 'Yaxic', 'Tekit', 'Yucatán'),
(1042, '97690', 'Sotuta', 'Sotuta', 'Yucatán'),
(1043, '97694', 'Tibolon', 'Sotuta', 'Yucatán'),
(1044, '97695', 'Tabi', 'Sotuta', 'Yucatán'),
(1045, '97697', 'Zavala', 'Sotuta', 'Yucatán'),
(1046, '97700', 'Tizimin Centro', 'Tizimín', 'Yucatán'),
(1047, '97700', 'Santa Cruz', 'Tizimín', 'Yucatán'),
(1048, '97702', 'Las Palmas', 'Tizimín', 'Yucatán'),
(1049, '97702', 'Residencial Tizimín', 'Tizimín', 'Yucatán'),
(1050, '97702', 'Comichén', 'Tizimín', 'Yucatán'),
(1051, '97702', 'Benito Juárez', 'Tizimín', 'Yucatán'),
(1052, '97702', 'Fovissste', 'Tizimín', 'Yucatán'),
(1053, '97702', 'Jacinto Canek', 'Tizimín', 'Yucatán'),
(1054, '97702', '8 Calles', 'Tizimín', 'Yucatán'),
(1055, '97702', 'Los Reyes', 'Tizimín', 'Yucatán'),
(1056, '97702', 'Aviación', 'Tizimín', 'Yucatán'),
(1057, '97702', 'Santa Maria', 'Tizimín', 'Yucatán'),
(1058, '97702', 'Zoológico', 'Tizimín', 'Yucatán'),
(1059, '97702', 'Villas Campestre', 'Tizimín', 'Yucatán'),
(1060, '97702', 'Campestre San Francisco', 'Tizimín', 'Yucatán'),
(1061, '97702', 'Justo Sierra', 'Tizimín', 'Yucatán'),
(1062, '97702', 'Viva', 'Tizimín', 'Yucatán'),
(1063, '97702', 'San Martín', 'Tizimín', 'Yucatán'),
(1064, '97703', 'Adolfo Lopez Mateos', 'Tizimín', 'Yucatán'),
(1065, '97703', 'San Jose Nabalam', 'Tizimín', 'Yucatán'),
(1066, '97703', 'Santo Domingo', 'Tizimín', 'Yucatán'),
(1067, '97703', 'Lázaro Cárdenas', 'Tizimín', 'Yucatán'),
(1068, '97703', 'San Carlos', 'Tizimín', 'Yucatán'),
(1069, '97703', 'Huayita', 'Tizimín', 'Yucatán'),
(1070, '97703', 'Los Reyes', 'Tizimín', 'Yucatán'),
(1071, '97704', 'Adolfo López Mateos', 'Tizimín', 'Yucatán'),
(1072, '97704', 'Los Aguacates', 'Tizimín', 'Yucatán'),
(1073, '97704', 'Santa Maria de Lima', 'Tizimín', 'Yucatán'),
(1074, '97704', 'Residencial Del Parque', 'Tizimín', 'Yucatán'),
(1075, '97705', 'Sucopó', 'Tizimín', 'Yucatán'),
(1076, '97705', 'Chan San Antonio', 'Tizimín', 'Yucatán'),
(1077, '97705', 'Kikil', 'Tizimín', 'Yucatán'),
(1078, '97705', 'Yokdzonot Meneses', 'Tizimín', 'Yucatán'),
(1079, '97705', 'X-Pambihá', 'Tizimín', 'Yucatán'),
(1080, '97706', 'Xkalax de Dzibalkú', 'Tizimín', 'Yucatán'),
(1081, '97706', 'Santa Clara Dzibalkú', 'Tizimín', 'Yucatán'),
(1082, '97706', 'Dzadz Palma', 'Tizimín', 'Yucatán'),
(1083, '97706', 'San Antonio', 'Tizimín', 'Yucatán'),
(1084, '97706', 'Libre Unión', 'Tizimín', 'Yucatán'),
(1085, '97706', 'Dzonot Box', 'Tizimín', 'Yucatán'),
(1086, '97706', 'San Román', 'Tizimín', 'Yucatán'),
(1087, '97706', 'Chunsubul', 'Tizimín', 'Yucatán'),
(1088, '97706', 'X-Panhatoro', 'Tizimín', 'Yucatán'),
(1089, '97706', 'Chenkekén', 'Tizimín', 'Yucatán'),
(1090, '97706', 'Buena Esperanza', 'Tizimín', 'Yucatán'),
(1091, '97706', 'Bondzonot Número Dos', 'Tizimín', 'Yucatán'),
(1092, '97706', 'X-Lal', 'Tizimín', 'Yucatán'),
(1093, '97706', 'X-Cail', 'Tizimín', 'Yucatán'),
(1094, '97706', 'Dzonot Tigre', 'Tizimín', 'Yucatán'),
(1095, '97707', 'Yohactún de Hidalgo', 'Tizimín', 'Yucatán'),
(1096, '97707', 'Dzonot Carretero', 'Tizimín', 'Yucatán'),
(1097, '97707', 'El Cuyo', 'Tizimín', 'Yucatán'),
(1098, '97707', 'San Francisco', 'Tizimín', 'Yucatán'),
(1099, '97707', 'Benito Juárez', 'Tizimín', 'Yucatán'),
(1100, '97707', 'San Juan', 'Tizimín', 'Yucatán'),
(1101, '97707', 'Moctezuma', 'Tizimín', 'Yucatán'),
(1102, '97707', 'Dolores', 'Tizimín', 'Yucatán'),
(1103, '97707', 'Emiliano Zapata', 'Tizimín', 'Yucatán'),
(1104, '97710', 'San Pedro Juárez', 'Tizimín', 'Yucatán'),
(1105, '97710', 'Colonia Yucatán', 'Tizimín', 'Yucatán'),
(1106, '97710', 'Dzonot Aké', 'Tizimín', 'Yucatán'),
(1107, '97710', 'San Isidro Chuncopó', 'Tizimín', 'Yucatán'),
(1108, '97710', 'Yaxchekú', 'Tizimín', 'Yucatán'),
(1109, '97710', 'Teapa', 'Tizimín', 'Yucatán'),
(1110, '97710', 'La Sierra', 'Tizimín', 'Yucatán'),
(1111, '97710', 'Lázaro Cárdenas', 'Tizimín', 'Yucatán'),
(1112, '97710', 'Felipe Carrillo Puerto Dos', 'Tizimín', 'Yucatán'),
(1113, '97710', 'San Enrique', 'Tizimín', 'Yucatán'),
(1114, '97710', 'Kabichén', 'Tizimín', 'Yucatán'),
(1115, '97710', 'El Ramonal', 'Tizimín', 'Yucatán'),
(1116, '97710', 'Orizaba', 'Tizimín', 'Yucatán'),
(1117, '97710', 'San Luis Tzuctuk', 'Tizimín', 'Yucatán'),
(1118, '97712', 'Santa Rosa Concepción', 'Tizimín', 'Yucatán'),
(1119, '97713', 'San Miguel', 'Tizimín', 'Yucatán'),
(1120, '97713', 'Santa Pilar', 'Tizimín', 'Yucatán'),
(1121, '97713', 'Santa Isabel', 'Tizimín', 'Yucatán'),
(1122, '97713', 'Santa Rosa y Anexas', 'Tizimín', 'Yucatán'),
(1123, '97713', 'Cenote Azul', 'Tizimín', 'Yucatán'),
(1124, '97713', 'Samaria', 'Tizimín', 'Yucatán'),
(1125, '97713', 'Benito Juárez', 'Tizimín', 'Yucatán'),
(1126, '97713', 'Rancho Grande', 'Tizimín', 'Yucatán'),
(1127, '97713', 'Santa Ana', 'Tizimín', 'Yucatán'),
(1128, '97713', 'Paraíso', 'Tizimín', 'Yucatán'),
(1129, '97713', 'La Libertad', 'Tizimín', 'Yucatán'),
(1130, '97714', 'Santa María', 'Tizimín', 'Yucatán'),
(1131, '97714', 'San Pedro Sacboc', 'Tizimín', 'Yucatán'),
(1132, '97715', 'San Hipólito', 'Tizimín', 'Yucatán'),
(1133, '97715', 'El Limonar', 'Tizimín', 'Yucatán'),
(1134, '97715', 'San Pedro Bacab', 'Tizimín', 'Yucatán'),
(1135, '97715', 'Nuevo León', 'Tizimín', 'Yucatán'),
(1136, '97715', 'Nuevo Tezoco', 'Tizimín', 'Yucatán'),
(1137, '97715', 'San Arturo', 'Tizimín', 'Yucatán'),
(1138, '97715', 'San Isidro', 'Tizimín', 'Yucatán'),
(1139, '97715', 'Francisco Villa', 'Tizimín', 'Yucatán'),
(1140, '97715', 'Manuel Cepeda Peraza', 'Tizimín', 'Yucatán'),
(1141, '97715', 'Santa Clara', 'Tizimín', 'Yucatán'),
(1142, '97715', 'Tres Marias', 'Tizimín', 'Yucatán'),
(1143, '97715', 'San Juan', 'Tizimín', 'Yucatán'),
(1144, '97715', 'Santa Elena', 'Tizimín', 'Yucatán'),
(1145, '97715', 'Luis Rosado Vega', 'Tizimín', 'Yucatán'),
(1146, '97716', 'San Manuel', 'Tizimín', 'Yucatán'),
(1147, '97716', 'Papoinah', 'Tizimín', 'Yucatán'),
(1148, '97716', 'El Edén (Yaxic)', 'Tizimín', 'Yucatán'),
(1149, '97716', 'Adolfo López Mateos', 'Tizimín', 'Yucatán'),
(1150, '97716', 'Santa Rosa', 'Tizimín', 'Yucatán'),
(1151, '97716', 'Quintana', 'Tizimín', 'Yucatán'),
(1152, '97716', 'San José Montecristo', 'Tizimín', 'Yucatán'),
(1153, '97716', 'Felipe Carrillo Puerto Número Uno', 'Tizimín', 'Yucatán'),
(1154, '97716', 'Chan Tres Reyes', 'Tizimín', 'Yucatán'),
(1155, '97716', 'La Esperanza', 'Tizimín', 'Yucatán'),
(1156, '97716', 'San Isidro Kilómetro Catorce (San Isidro)', 'Tizimín', 'Yucatán'),
(1157, '97717', 'Tixcancal', 'Tizimín', 'Yucatán'),
(1158, '97717', 'Chan Cenote', 'Tizimín', 'Yucatán'),
(1159, '97717', 'San Isidro Kancabdzonot', 'Tizimín', 'Yucatán'),
(1160, '97717', 'Trascorral', 'Tizimín', 'Yucatán'),
(1161, '97717', 'Dzonot Mezo', 'Tizimín', 'Yucatán'),
(1162, '97717', 'San Lorenzo', 'Tizimín', 'Yucatán'),
(1163, '97717', 'San Lorenzo Chiquilá', 'Tizimín', 'Yucatán'),
(1164, '97720', 'Río Lagartos', 'Río Lagartos', 'Yucatán'),
(1165, '97723', 'Las Coloradas', 'Río Lagartos', 'Yucatán'),
(1166, '97726', 'Quinientos', 'Río Lagartos', 'Yucatán'),
(1167, '97730', 'Espita', 'Espita', 'Yucatán'),
(1168, '97730', 'Santa Cruz Regario', 'Espita', 'Yucatán'),
(1169, '97733', 'Nacuche', 'Espita', 'Yucatán'),
(1170, '97734', 'San Antonio Xuilub', 'Espita', 'Yucatán'),
(1171, '97734', 'Kunche', 'Espita', 'Yucatán'),
(1172, '97734', 'San Pedro Chenchelo', 'Espita', 'Yucatán'),
(1173, '97739', 'Holcá', 'Espita', 'Yucatán'),
(1174, '97740', 'Temozón', 'Temozón', 'Yucatán'),
(1175, '97743', 'Santa Rita', 'Temozón', 'Yucatán'),
(1176, '97743', 'Xeb', 'Temozón', 'Yucatán'),
(1177, '97743', 'Kante', 'Temozón', 'Yucatán'),
(1178, '97743', 'Actuncah', 'Temozón', 'Yucatán'),
(1179, '97743', 'Ekbalam', 'Temozón', 'Yucatán'),
(1180, '97743', 'Xuch', 'Temozón', 'Yucatán'),
(1181, '97744', 'Hunukú', 'Temozón', 'Yucatán'),
(1182, '97744', 'Nahbalam', 'Temozón', 'Yucatán'),
(1183, '97744', 'Yokdzonot Presentado', 'Temozón', 'Yucatán'),
(1184, '97744', 'Xcanchechen', 'Temozón', 'Yucatán'),
(1185, '97744', 'Xtut', 'Temozón', 'Yucatán'),
(1186, '97744', 'Dzalbay', 'Temozón', 'Yucatán'),
(1187, '97745', 'Calotmul', 'Calotmul', 'Yucatán'),
(1188, '97746', 'Tahcabo', 'Calotmul', 'Yucatán'),
(1189, '97747', 'Pocoboch', 'Calotmul', 'Yucatán'),
(1190, '97748', 'Yokdzonot', 'Calotmul', 'Yucatán'),
(1191, '97750', 'Tinum', 'Tinum', 'Yucatán'),
(1192, '97751', 'Piste', 'Tinum', 'Yucatán'),
(1193, '97753', 'Poom', 'Tinum', 'Yucatán'),
(1194, '97754', 'Balantun', 'Tinum', 'Yucatán'),
(1195, '97755', 'San Francisco', 'Tinum', 'Yucatán'),
(1196, '97755', 'San Francisco Grande', 'Tinum', 'Yucatán'),
(1197, '97755', 'Tohopku', 'Tinum', 'Yucatán'),
(1198, '97756', 'X-Calakoop', 'Tinum', 'Yucatán'),
(1199, '97756', 'San Felipe', 'Tinum', 'Yucatán'),
(1200, '97757', 'Chichen-itza', 'Tinum', 'Yucatán'),
(1201, '97758', 'Tzukmuc', 'Chankom', 'Yucatán'),
(1202, '97758', 'Xanlá', 'Chankom', 'Yucatán'),
(1203, '97758', 'Muchucuxcáh', 'Chankom', 'Yucatán'),
(1204, '97758', 'Chankom', 'Chankom', 'Yucatán'),
(1205, '97758', 'Ticimul', 'Chankom', 'Yucatán'),
(1206, '97758', 'Xcopteil', 'Chankom', 'Yucatán'),
(1207, '97758', 'Xcatun', 'Chankom', 'Yucatán'),
(1208, '97758', 'Xtohil', 'Chankom', 'Yucatán'),
(1209, '97758', 'San Isidro', 'Chankom', 'Yucatán'),
(1210, '97758', 'Pambá', 'Chankom', 'Yucatán'),
(1211, '97758', 'Nicte-Ha', 'Chankom', 'Yucatán'),
(1212, '97758', 'X-Cocail', 'Chankom', 'Yucatán'),
(1213, '97758', 'X-Bohom', 'Chankom', 'Yucatán'),
(1214, '97758', 'Yokdzonot', 'Chankom', 'Yucatán'),
(1215, '97758', 'San Juan', 'Chankom', 'Yucatán'),
(1216, '97759', 'San Juan Xkalakdzonot', 'Chankom', 'Yucatán'),
(1217, '97759', 'Xcalakdzonot', 'Chankom', 'Yucatán'),
(1218, '97760', 'Chichimilá', 'Chichimilá', 'Yucatán'),
(1219, '97760', 'San José', 'Chichimilá', 'Yucatán'),
(1220, '97760', 'Celtun', 'Chichimilá', 'Yucatán'),
(1221, '97760', 'X-Chay', 'Chichimilá', 'Yucatán'),
(1222, '97760', 'Chan X-Cail', 'Chichimilá', 'Yucatán'),
(1223, '97760', 'Tixcancal Dzonot', 'Chichimilá', 'Yucatán'),
(1224, '97760', 'San Pedro', 'Chichimilá', 'Yucatán'),
(1225, '97761', 'Dzitox', 'Chichimilá', 'Yucatán'),
(1226, '97762', 'Tixcacalcupul', 'Tixcacalcupul', 'Yucatán'),
(1227, '97763', 'Carolina', 'Tixcacalcupul', 'Yucatán'),
(1228, '97763', 'San José', 'Tixcacalcupul', 'Yucatán'),
(1229, '97763', 'Monte Verde', 'Tixcacalcupul', 'Yucatán'),
(1230, '97763', 'Poop', 'Tixcacalcupul', 'Yucatán'),
(1231, '97763', 'Ekpedz', 'Tixcacalcupul', 'Yucatán'),
(1232, '97763', 'Mahas', 'Tixcacalcupul', 'Yucatán'),
(1233, '97763', 'Xtobil', 'Tixcacalcupul', 'Yucatán'),
(1234, '97764', 'Kaua', 'Kaua', 'Yucatán'),
(1235, '97764', 'Xtzeal', 'Kaua', 'Yucatán'),
(1236, '97765', 'San Esteban', 'Kaua', 'Yucatán'),
(1237, '97766', 'Cuncunul', 'Cuncunul', 'Yucatán'),
(1238, '97766', 'San Francisco', 'Cuncunul', 'Yucatán'),
(1239, '97766', 'San Diego', 'Cuncunul', 'Yucatán'),
(1240, '97767', 'Chebalam', 'Cuncunul', 'Yucatán'),
(1241, '97768', 'Tekom', 'Tekom', 'Yucatán'),
(1242, '97768', 'San Antonio', 'Tekom', 'Yucatán'),
(1243, '97768', 'Dzidzilché', 'Tekom', 'Yucatán'),
(1244, '97769', 'X-Cocmil', 'Tekom', 'Yucatán'),
(1245, '97769', 'Chindzonot', 'Tekom', 'Yucatán'),
(1246, '97769', 'Pocbichen', 'Tekom', 'Yucatán'),
(1247, '97769', 'Xuxcab', 'Tekom', 'Yucatán'),
(1248, '97769', 'Chibilub', 'Tekom', 'Yucatán'),
(1249, '97770', 'Chemax', 'Chemax', 'Yucatán'),
(1250, '97770', 'Benito Juárez García', 'Chemax', 'Yucatán'),
(1251, '97773', 'X-Catzín (Catzín)', 'Chemax', 'Yucatán'),
(1252, '97773', 'Uspibil', 'Chemax', 'Yucatán'),
(1253, '97773', 'Chechmil', 'Chemax', 'Yucatán'),
(1254, '97773', 'Xmaab', 'Chemax', 'Yucatán'),
(1255, '97773', 'Xuneb', 'Chemax', 'Yucatán'),
(1256, '97773', 'Xalaú', 'Chemax', 'Yucatán'),
(1257, '97773', 'Kuxeb', 'Chemax', 'Yucatán'),
(1258, '97774', 'X-can', 'Chemax', 'Yucatán'),
(1259, '97774', 'Santa Cruz', 'Chemax', 'Yucatán'),
(1260, '97774', 'Cholul', 'Chemax', 'Yucatán'),
(1261, '97774', 'San Andrés', 'Chemax', 'Yucatán'),
(1262, '97774', 'San Roman', 'Chemax', 'Yucatán'),
(1263, '97774', 'San Pedro Chemax', 'Chemax', 'Yucatán'),
(1264, '97774', 'Santa Elena', 'Chemax', 'Yucatán'),
(1265, '97774', 'San Juan Chen', 'Chemax', 'Yucatán'),
(1266, '97774', 'Mucel', 'Chemax', 'Yucatán'),
(1267, '97774', 'Xtejas', 'Chemax', 'Yucatán'),
(1268, '97775', 'Cocoyol', 'Chemax', 'Yucatán'),
(1269, '97775', 'Buenavista', 'Chemax', 'Yucatán'),
(1270, '97775', 'Santa Rita', 'Chemax', 'Yucatán'),
(1271, '97776', 'Sisbichén', 'Chemax', 'Yucatán'),
(1272, '97776', 'Pabalam', 'Chemax', 'Yucatán'),
(1273, '97776', 'Champolin', 'Chemax', 'Yucatán'),
(1274, '97777', 'Chachadzonot', 'Chemax', 'Yucatán'),
(1275, '97777', 'Lol-Bé', 'Chemax', 'Yucatán'),
(1276, '97777', 'Chuluntan', 'Chemax', 'Yucatán'),
(1277, '97777', 'Yaxche', 'Chemax', 'Yucatán'),
(1278, '97780', 'Valladolid Centro', 'Valladolid', 'Yucatán'),
(1279, '97782', 'San Isidro', 'Valladolid', 'Yucatán'),
(1280, '97782', 'Las Palmas', 'Valladolid', 'Yucatán'),
(1281, '97782', 'Orquídeas', 'Valladolid', 'Yucatán'),
(1282, '97782', 'Los Cipreses', 'Valladolid', 'Yucatán'),
(1283, '97782', 'Candelaria', 'Valladolid', 'Yucatán'),
(1284, '97782', 'Flor Campestre', 'Valladolid', 'Yucatán'),
(1285, '97782', 'Jardines Del Oriente', 'Valladolid', 'Yucatán'),
(1286, '97782', 'Lol-beh', 'Valladolid', 'Yucatán'),
(1287, '97782', 'Residencial Campestre', 'Valladolid', 'Yucatán'),
(1288, '97782', 'Santa Ana', 'Valladolid', 'Yucatán'),
(1289, '97782', 'Santa Lucia', 'Valladolid', 'Yucatán'),
(1290, '97782', 'Fernando Novelo', 'Valladolid', 'Yucatán'),
(1291, '97782', 'Santa Ana', 'Valladolid', 'Yucatán'),
(1292, '97782', 'Militar', 'Valladolid', 'Yucatán'),
(1293, '97782', 'Santa Cruz', 'Valladolid', 'Yucatán'),
(1294, '97783', 'Leonardo Rodríguez Alcaine', 'Valladolid', 'Yucatán'),
(1295, '97783', 'Militar', 'Valladolid', 'Yucatán'),
(1296, '97783', 'Oaxaqueña', 'Valladolid', 'Yucatán'),
(1297, '97783', 'San Juan', 'Valladolid', 'Yucatán'),
(1298, '97783', 'San Antonio', 'Valladolid', 'Yucatán'),
(1299, '97783', 'Sacyabil', 'Valladolid', 'Yucatán'),
(1300, '97783', 'Santana', 'Valladolid', 'Yucatán'),
(1301, '97783', 'San Francisco', 'Valladolid', 'Yucatán'),
(1302, '97783', 'San Vicente', 'Valladolid', 'Yucatán'),
(1303, '97784', 'Residencial del Bosque', 'Valladolid', 'Yucatán'),
(1304, '97784', 'Bacalar', 'Valladolid', 'Yucatán'),
(1305, '97784', 'Sisal', 'Valladolid', 'Yucatán'),
(1306, '97784', 'Xcorazon', 'Valladolid', 'Yucatán'),
(1307, '97784', 'Emiliano Zapata', 'Valladolid', 'Yucatán'),
(1308, '97784', 'Puesta Del Sol', 'Valladolid', 'Yucatán'),
(1309, '97784', 'Capules', 'Valladolid', 'Yucatán'),
(1310, '97784', 'Flamboyanes', 'Valladolid', 'Yucatán'),
(1311, '97784', 'Colonos', 'Valladolid', 'Yucatán'),
(1312, '97784', 'San Carlos', 'Valladolid', 'Yucatán'),
(1313, '97784', 'Cruz Verde', 'Valladolid', 'Yucatán'),
(1314, '97785', 'Kanxoc', 'Valladolid', 'Yucatán'),
(1315, '97785', 'Xocen', 'Valladolid', 'Yucatán'),
(1316, '97785', 'Batun', 'Valladolid', 'Yucatán'),
(1317, '97785', 'Kampepén', 'Valladolid', 'Yucatán'),
(1318, '97786', 'Sidra Kin', 'Valladolid', 'Yucatán'),
(1319, '97786', 'Timas', 'Valladolid', 'Yucatán'),
(1320, '97787', 'Santa Cruz', 'Valladolid', 'Yucatán'),
(1321, '97787', 'Xuilib', 'Valladolid', 'Yucatán'),
(1322, '97787', 'Nohsuytun', 'Valladolid', 'Yucatán'),
(1323, '97787', 'Yaxche', 'Valladolid', 'Yucatán'),
(1324, '97787', 'Chamul', 'Valladolid', 'Yucatán'),
(1325, '97790', 'La Guadalupana', 'Valladolid', 'Yucatán'),
(1326, '97790', 'Pixoy', 'Valladolid', 'Yucatán'),
(1327, '97790', 'Popola', 'Valladolid', 'Yucatán'),
(1328, '97793', 'Tesoco', 'Valladolid', 'Yucatán'),
(1329, '97793', 'Ticúch', 'Valladolid', 'Yucatán'),
(1330, '97793', 'Chan Yokdzonot', 'Valladolid', 'Yucatán'),
(1331, '97793', 'Tepakan', 'Valladolid', 'Yucatán'),
(1332, '97793', 'Tahmuy', 'Valladolid', 'Yucatán'),
(1333, '97793', 'Zodzilchén', 'Valladolid', 'Yucatán'),
(1334, '97793', 'Yunchen', 'Valladolid', 'Yucatán'),
(1335, '97794', 'Yalcoba', 'Valladolid', 'Yucatán'),
(1336, '97794', 'Chiople', 'Valladolid', 'Yucatán'),
(1337, '97794', 'San Andres Bac', 'Valladolid', 'Yucatán'),
(1338, '97795', 'Dzitnup', 'Valladolid', 'Yucatán'),
(1339, '97795', 'Yalcon', 'Valladolid', 'Yucatán'),
(1340, '97795', 'Ebtun', 'Valladolid', 'Yucatán'),
(1341, '97795', 'X-Kekén', 'Valladolid', 'Yucatán'),
(1342, '97795', 'Tixhualactún', 'Valladolid', 'Yucatán'),
(1343, '97796', 'Uayma', 'Uayma', 'Yucatán'),
(1344, '97798', 'Santa María', 'Uayma', 'Yucatán'),
(1345, '97799', 'San Lorenzo', 'Uayma', 'Yucatán'),
(1346, '97800', 'Maxcanu', 'Maxcanú', 'Yucatán'),
(1347, '97800', 'Guadalupe', 'Maxcanú', 'Yucatán'),
(1348, '97800', 'La Sirena', 'Maxcanú', 'Yucatán'),
(1349, '97803', 'Chan Chocholá (Santa Eduviges Chan Chocholá)', 'Maxcanú', 'Yucatán'),
(1350, '97803', 'Granada (Chican Granada)', 'Maxcanú', 'Yucatán'),
(1351, '97803', 'Santa Cruz', 'Maxcanú', 'Yucatán'),
(1352, '97803', 'Kanachén', 'Maxcanú', 'Yucatán'),
(1353, '97804', 'Kochol', 'Maxcanú', 'Yucatán'),
(1354, '97804', 'Santo Domingo', 'Maxcanú', 'Yucatán'),
(1355, '97804', 'San Fernando', 'Maxcanú', 'Yucatán'),
(1356, '97804', 'Santa Rosa', 'Maxcanú', 'Yucatán'),
(1357, '97804', 'Paraíso', 'Maxcanú', 'Yucatán'),
(1358, '97804', 'Coahuila (Santa Teresa Coahuila)', 'Maxcanú', 'Yucatán'),
(1359, '97804', 'X-Cacal', 'Maxcanú', 'Yucatán'),
(1360, '97804', 'Yaxcaba', 'Maxcanú', 'Yucatán'),
(1361, '97804', 'Lázaro Cárdenas', 'Maxcanú', 'Yucatán'),
(1362, '97805', 'Chunchucmil', 'Maxcanú', 'Yucatán'),
(1363, '97805', 'San Simón Sinkehuel', 'Maxcanú', 'Yucatán'),
(1364, '97806', 'San Rafael', 'Maxcanú', 'Yucatán'),
(1365, '97807', 'Chencoh', 'Maxcanú', 'Yucatán'),
(1366, '97810', 'Samahil', 'Samahil', 'Yucatán'),
(1367, '97810', 'Kuchel', 'Samahil', 'Yucatán'),
(1368, '97812', 'San Antonio Tedzidz', 'Samahil', 'Yucatán'),
(1369, '97813', 'Opichen', 'Opichén', 'Yucatán'),
(1370, '97814', 'Calcehtoc', 'Opichén', 'Yucatán'),
(1371, '97816', 'Chochola', 'Chocholá', 'Yucatán'),
(1372, '97816', 'San Antonio Chable', 'Chocholá', 'Yucatán'),
(1373, '97818', 'Kopomá', 'Kopomá', 'Yucatán'),
(1374, '97818', 'San Bernardo', 'Kopomá', 'Yucatán'),
(1375, '97820', 'Tecoh', 'Tecoh', 'Yucatán'),
(1376, '97822', 'Lepan', 'Tecoh', 'Yucatán'),
(1377, '97822', 'Oxtapacab', 'Tecoh', 'Yucatán'),
(1378, '97822', 'Itzincab', 'Tecoh', 'Yucatán'),
(1379, '97822', 'Sotuta de Peón', 'Tecoh', 'Yucatán'),
(1380, '97823', 'Chinkilá', 'Tecoh', 'Yucatán'),
(1381, '97823', 'Sabacché', 'Tecoh', 'Yucatán'),
(1382, '97823', 'Pixyah', 'Tecoh', 'Yucatán'),
(1383, '97824', 'Telchaquillo', 'Tecoh', 'Yucatán'),
(1384, '97824', 'Xcanchakan', 'Tecoh', 'Yucatán'),
(1385, '97824', 'Mayapan', 'Tecoh', 'Yucatán'),
(1386, '97824', 'Mahzucil', 'Tecoh', 'Yucatán'),
(1387, '97825', 'Abalá', 'Abalá', 'Yucatán'),
(1388, '97825', 'Mukuiche', 'Abalá', 'Yucatán'),
(1389, '97825', 'Uayalceh', 'Abalá', 'Yucatán'),
(1390, '97826', 'Sinhuchen', 'Abalá', 'Yucatán'),
(1391, '97826', 'Cacao', 'Abalá', 'Yucatán'),
(1392, '97826', 'Peba', 'Abalá', 'Yucatán'),
(1393, '97827', 'Temozon Sur', 'Abalá', 'Yucatán'),
(1394, '97830', 'Halacho', 'Halachó', 'Yucatán'),
(1395, '97830', 'San José', 'Halachó', 'Yucatán'),
(1396, '97835', 'Cepeda', 'Halachó', 'Yucatán'),
(1397, '97835', 'Cuch Holoch', 'Halachó', 'Yucatán'),
(1398, '97835', 'Siho', 'Halachó', 'Yucatán'),
(1399, '97835', 'Unidad Agrícola Guadalupe', 'Halachó', 'Yucatán'),
(1400, '97835', 'Concepción', 'Halachó', 'Yucatán'),
(1401, '97836', 'San Mateo', 'Halachó', 'Yucatán'),
(1402, '97836', 'Dzbzibachi', 'Halachó', 'Yucatán'),
(1403, '97836', 'Kankabchen', 'Halachó', 'Yucatán'),
(1404, '97837', 'Santa Maria Acu', 'Halachó', 'Yucatán'),
(1405, '97837', 'Santa Sofia', 'Halachó', 'Yucatán'),
(1406, '97840', 'Tepakán', 'Muna', 'Yucatán'),
(1407, '97840', 'Muna de Leopoldo Arana Cabrera', 'Muna', 'Yucatán'),
(1408, '97840', 'Benito Juárez', 'Muna', 'Yucatán'),
(1409, '97840', 'San Bernardo', 'Muna', 'Yucatán'),
(1410, '97840', 'San Mateo', 'Muna', 'Yucatán'),
(1411, '97840', 'San Sebastián', 'Muna', 'Yucatán'),
(1412, '97840', 'Víctor Cervera Pacheco', 'Muna', 'Yucatán'),
(1413, '97843', 'Choyob', 'Muna', 'Yucatán'),
(1414, '97843', 'Yaxha', 'Muna', 'Yucatán'),
(1415, '97844', 'San Jose Tipceh', 'Muna', 'Yucatán'),
(1416, '97844', 'U.F. Lázaro Cárdenas', 'Muna', 'Yucatán'),
(1417, '97845', 'Sacalum', 'Sacalum', 'Yucatán'),
(1418, '97847', 'San Antonio Sodzil', 'Sacalum', 'Yucatán'),
(1419, '97848', 'Yunku', 'Sacalum', 'Yucatán'),
(1420, '97850', 'Mani', 'Maní', 'Yucatán'),
(1421, '97851', 'Tipikal', 'Maní', 'Yucatán'),
(1422, '97854', 'Dzan', 'Dzan', 'Yucatán'),
(1423, '97857', 'Chapab', 'Chapab', 'Yucatán'),
(1424, '97858', 'Citincabchen', 'Chapab', 'Yucatán'),
(1425, '97858', 'Hunabchen', 'Chapab', 'Yucatán'),
(1426, '97858', 'San Cristóbal', 'Chapab', 'Yucatán'),
(1427, '97860', 'Ticul Centro', 'Ticul', 'Yucatán'),
(1428, '97862', 'De los Electricistas', 'Ticul', 'Yucatán'),
(1429, '97862', 'Deportivo Campestre', 'Ticul', 'Yucatán'),
(1430, '97862', 'Mejorada', 'Ticul', 'Yucatán'),
(1431, '97862', 'Guadalupe', 'Ticul', 'Yucatán'),
(1432, '97862', 'Obrera', 'Ticul', 'Yucatán'),
(1433, '97862', 'Campestre', 'Ticul', 'Yucatán'),
(1434, '97863', 'San Juan', 'Ticul', 'Yucatán'),
(1435, '97864', 'San Joaquín', 'Ticul', 'Yucatán'),
(1436, '97864', 'San Enrique', 'Ticul', 'Yucatán'),
(1437, '97864', 'Las Tinajas', 'Ticul', 'Yucatán'),
(1438, '97864', 'San Benito', 'Ticul', 'Yucatán'),
(1439, '97864', 'Santa Maria', 'Ticul', 'Yucatán'),
(1440, '97864', 'San Román', 'Ticul', 'Yucatán'),
(1441, '97864', 'Santiago', 'Ticul', 'Yucatán'),
(1442, '97870', 'Pustunich', 'Ticul', 'Yucatán'),
(1443, '97873', 'Yotholin', 'Ticul', 'Yucatán'),
(1444, '97880', 'Tutul Xiú', 'Oxkutzcab', 'Yucatán'),
(1445, '97880', 'Oxkutzcab', 'Oxkutzcab', 'Yucatán'),
(1446, '97882', 'San José Kunché', 'Oxkutzcab', 'Yucatán'),
(1447, '97883', 'Lol-Tún', 'Oxkutzcab', 'Yucatán'),
(1448, '97883', 'Yaaxhom', 'Oxkutzcab', 'Yucatán'),
(1449, '97883', 'Emiliano Zapata', 'Oxkutzcab', 'Yucatán'),
(1450, '97883', 'Xohuayan', 'Oxkutzcab', 'Yucatán'),
(1451, '97884', 'Nohcacab', 'Oxkutzcab', 'Yucatán'),
(1452, '97884', 'Xul', 'Oxkutzcab', 'Yucatán'),
(1453, '97884', 'Sacamucuy', 'Oxkutzcab', 'Yucatán'),
(1454, '97884', 'Xobenhaltun', 'Oxkutzcab', 'Yucatán'),
(1455, '97885', 'Sayil', 'Oxkutzcab', 'Yucatán'),
(1456, '97886', 'Yaxhacchen', 'Oxkutzcab', 'Yucatán'),
(1457, '97886', 'Kihuic', 'Oxkutzcab', 'Yucatán'),
(1458, '97887', 'Tabi', 'Oxkutzcab', 'Yucatán'),
(1459, '97887', 'Xlapak', 'Oxkutzcab', 'Yucatán'),
(1460, '97887', 'Labna', 'Oxkutzcab', 'Yucatán'),
(1461, '97890', 'Santa Elena', 'Santa Elena', 'Yucatán'),
(1462, '97890', 'San Agustín', 'Santa Elena', 'Yucatán'),
(1463, '97894', 'Kabah', 'Santa Elena', 'Yucatán'),
(1464, '97895', 'San Simón', 'Santa Elena', 'Yucatán'),
(1465, '97899', 'Hotel Villas Arqueológicas', 'Santa Elena', 'Yucatán'),
(1466, '97899', 'Hotel Hacienda Uxmal', 'Santa Elena', 'Yucatán'),
(1467, '97900', 'Mama', 'Mama', 'Yucatán'),
(1468, '97904', 'Chumayel', 'Chumayel', 'Yucatán'),
(1469, '97908', 'Mayapan', 'Mayapán', 'Yucatán'),
(1470, '97910', 'Teabo', 'Teabo', 'Yucatán'),
(1471, '97915', 'Cantamayec', 'Cantamayec', 'Yucatán'),
(1472, '97917', 'Nenela', 'Cantamayec', 'Yucatán'),
(1473, '97918', 'Cholul', 'Cantamayec', 'Yucatán'),
(1474, '97920', 'Yaxcaba', 'Yaxcabá', 'Yucatán'),
(1475, '97922', 'Yokdzonot', 'Yaxcabá', 'Yucatán'),
(1476, '97922', 'Mexil', 'Yaxcabá', 'Yucatán'),
(1477, '97923', 'Libre Unión', 'Yaxcabá', 'Yucatán'),
(1478, '97923', 'Cenote Xtohil', 'Yaxcabá', 'Yucatán'),
(1479, '97924', 'Cenote Aban', 'Yaxcabá', 'Yucatán'),
(1480, '97924', 'San Marcos', 'Yaxcabá', 'Yucatán'),
(1481, '97924', 'Popola', 'Yaxcabá', 'Yucatán'),
(1482, '97924', 'Chimay', 'Yaxcabá', 'Yucatán'),
(1483, '97924', 'Yaxunah', 'Yaxcabá', 'Yucatán'),
(1484, '97924', 'Z.A. Yaxuna', 'Yaxcabá', 'Yucatán'),
(1485, '97925', 'Tiholop', 'Yaxcabá', 'Yucatán'),
(1486, '97925', 'Santa Maria', 'Yaxcabá', 'Yucatán'),
(1487, '97925', 'Kancabdzonot', 'Yaxcabá', 'Yucatán'),
(1488, '97925', 'Yokdzonot-Hú', 'Yaxcabá', 'Yucatán'),
(1489, '97925', 'Huechen Balam', 'Yaxcabá', 'Yucatán'),
(1490, '97925', 'San Pedro', 'Yaxcabá', 'Yucatán'),
(1491, '97925', 'Sahcabá', 'Yaxcabá', 'Yucatán'),
(1492, '97926', 'Cacalchen', 'Yaxcabá', 'Yucatán'),
(1493, '97926', 'Canakom', 'Yaxcabá', 'Yucatán'),
(1494, '97927', 'Tahdzibichen', 'Yaxcabá', 'Yucatán'),
(1495, '97927', 'Tixcacaltuyub', 'Yaxcabá', 'Yucatán'),
(1496, '97929', 'Tinuncah', 'Yaxcabá', 'Yucatán'),
(1497, '97929', 'Cipché', 'Yaxcabá', 'Yucatán'),
(1498, '97930', 'Peto Centro', 'Peto', 'Yucatán'),
(1499, '97930', 'Benito Juárez', 'Peto', 'Yucatán'),
(1500, '97930', 'Francisco I Madero', 'Peto', 'Yucatán'),
(1501, '97930', 'Francisco Sarabia', 'Peto', 'Yucatán'),
(1502, '97930', 'Miraflores', 'Peto', 'Yucatán'),
(1503, '97930', 'Morelos y Fátima', 'Peto', 'Yucatán'),
(1504, '97930', '3 Cruces', 'Peto', 'Yucatán'),
(1505, '97930', 'Trinidad', 'Peto', 'Yucatán'),
(1506, '97930', 'Felipe Carrillo Puerto', 'Peto', 'Yucatán'),
(1507, '97930', 'Jacinto Kanek', 'Peto', 'Yucatán'),
(1508, '97930', 'Ciprés', 'Peto', 'Yucatán'),
(1509, '97932', 'Xoy', 'Peto', 'Yucatán'),
(1510, '97933', 'Progresito', 'Peto', 'Yucatán'),
(1511, '97933', 'Tixhualactun', 'Peto', 'Yucatán'),
(1512, '97933', 'San Gregorio', 'Peto', 'Yucatán'),
(1513, '97933', 'Temozon', 'Peto', 'Yucatán'),
(1514, '97933', 'San Pedro', 'Peto', 'Yucatán'),
(1515, '97934', 'Guadalupe', 'Peto', 'Yucatán'),
(1516, '97934', 'San Diego', 'Peto', 'Yucatán'),
(1517, '97934', 'Xcabanchen', 'Peto', 'Yucatán'),
(1518, '97934', 'San Nicolás Yoactún', 'Peto', 'Yucatán'),
(1519, '97934', 'San Bernabe', 'Peto', 'Yucatán'),
(1520, '97935', 'Papacal', 'Peto', 'Yucatán'),
(1521, '97935', 'Santa Elena', 'Peto', 'Yucatán'),
(1522, '97935', 'San Francisco', 'Peto', 'Yucatán'),
(1523, '97935', 'Dzonotchel', 'Peto', 'Yucatán'),
(1524, '97935', 'Chan Calotmul', 'Peto', 'Yucatán'),
(1525, '97935', 'San Mateo', 'Peto', 'Yucatán'),
(1526, '97935', 'Santa Cruz', 'Peto', 'Yucatán'),
(1527, '97936', 'Polinkin', 'Peto', 'Yucatán'),
(1528, '97936', 'La Esperanza', 'Peto', 'Yucatán'),
(1529, '97936', 'Kambul', 'Peto', 'Yucatán'),
(1530, '97936', 'Abal', 'Peto', 'Yucatán'),
(1531, '97936', 'San Sebastián', 'Peto', 'Yucatán'),
(1532, '97936', 'San Dionisio', 'Peto', 'Yucatán'),
(1533, '97936', 'Petulillo', 'Peto', 'Yucatán'),
(1534, '97937', 'Tobxila', 'Peto', 'Yucatán'),
(1535, '97937', 'San Miguel', 'Peto', 'Yucatán'),
(1536, '97937', 'Uitzina', 'Peto', 'Yucatán'),
(1537, '97937', 'Trapiche', 'Peto', 'Yucatán'),
(1538, '97937', 'San Salvador', 'Peto', 'Yucatán'),
(1539, '97937', 'Santa Rosa', 'Peto', 'Yucatán'),
(1540, '97937', 'Justicia Social', 'Peto', 'Yucatán'),
(1541, '97937', 'Santa Ursula', 'Peto', 'Yucatán'),
(1542, '97937', 'Xpechil', 'Peto', 'Yucatán'),
(1543, '97937', 'Candelaria (San Pedro)', 'Peto', 'Yucatán'),
(1544, '97937', 'Macmay', 'Peto', 'Yucatán'),
(1545, '97937', 'Yaxcopil', 'Peto', 'Yucatán'),
(1546, '97940', 'Chikindzonot', 'Chikindzonot', 'Yucatán'),
(1547, '97943', 'Chan Santa María', 'Chikindzonot', 'Yucatán'),
(1548, '97943', 'Chanchimila', 'Chikindzonot', 'Yucatán'),
(1549, '97943', 'X-Poxil', 'Chikindzonot', 'Yucatán'),
(1550, '97943', 'Xcampana', 'Chikindzonot', 'Yucatán'),
(1551, '97944', 'Ichmul', 'Chikindzonot', 'Yucatán'),
(1552, '97945', 'Tahdziu', 'Tahdziú', 'Yucatán'),
(1553, '97947', 'Timul', 'Tahdziú', 'Yucatán'),
(1554, '97948', 'San Ignacio', 'Tahdziú', 'Yucatán'),
(1555, '97948', 'Mocté', 'Tahdziú', 'Yucatán'),
(1556, '97950', 'Tixmehuac', 'Tixméhuac', 'Yucatán'),
(1557, '97953', 'Chuchub', 'Tixméhuac', 'Yucatán'),
(1558, '97953', 'Chican', 'Tixméhuac', 'Yucatán'),
(1559, '97953', 'Sabacche', 'Tixméhuac', 'Yucatán'),
(1560, '97953', 'Sisbic', 'Tixméhuac', 'Yucatán'),
(1561, '97953', 'Kimbila', 'Tixméhuac', 'Yucatán'),
(1562, '97953', 'Dzutoh', 'Tixméhuac', 'Yucatán'),
(1563, '97954', 'Sacchacan', 'Tixméhuac', 'Yucatán'),
(1564, '97955', 'Chacsinkin', 'Chacsinkín', 'Yucatán'),
(1565, '97956', 'Xno-Huayab', 'Chacsinkín', 'Yucatán'),
(1566, '97957', 'Xbox', 'Chacsinkín', 'Yucatán'),
(1567, '97960', 'Tzucacab Centro', 'Tzucacab', 'Yucatán'),
(1568, '97963', 'Ekbalam', 'Tzucacab', 'Yucatán'),
(1569, '97963', 'Dzi', 'Tzucacab', 'Yucatán'),
(1570, '97963', 'Kakalnah', 'Tzucacab', 'Yucatán'),
(1571, '97963', 'Solidaridad', 'Tzucacab', 'Yucatán'),
(1572, '97964', 'Bichcopo', 'Tzucacab', 'Yucatán'),
(1573, '97964', 'Hobonil', 'Tzucacab', 'Yucatán'),
(1574, '97964', 'Sacbecan', 'Tzucacab', 'Yucatán'),
(1575, '97964', 'Noh-bec', 'Tzucacab', 'Yucatán'),
(1576, '97964', 'Polhuaczil', 'Tzucacab', 'Yucatán'),
(1577, '97965', 'Corral', 'Tzucacab', 'Yucatán'),
(1578, '97965', 'Blanca Flor', 'Tzucacab', 'Yucatán'),
(1579, '97965', 'El Escondido', 'Tzucacab', 'Yucatán'),
(1580, '97965', 'Tigre Grande', 'Tzucacab', 'Yucatán'),
(1581, '97966', 'La Esperanza', 'Tzucacab', 'Yucatán'),
(1582, '97966', 'San Isidro', 'Tzucacab', 'Yucatán'),
(1583, '97966', 'San Salvador Piste Akal', 'Tzucacab', 'Yucatán'),
(1584, '97967', 'Caxaytuk', 'Tzucacab', 'Yucatán'),
(1585, '97967', 'Thul', 'Tzucacab', 'Yucatán'),
(1586, '97967', 'Lázaro Cárdenas', 'Tzucacab', 'Yucatán'),
(1587, '97967', 'Emiliano Zapata', 'Tzucacab', 'Yucatán'),
(1588, '97969', 'Catmís', 'Tzucacab', 'Yucatán'),
(1589, '97970', 'Los Cedros', 'Tekax', 'Yucatán'),
(1590, '97970', 'Villas Santa María', 'Tekax', 'Yucatán'),
(1591, '97970', 'San Francisco', 'Tekax', 'Yucatán'),
(1592, '97970', 'Villa Flores', 'Tekax', 'Yucatán'),
(1593, '97970', 'Paraíso Tekax', 'Tekax', 'Yucatán'),
(1594, '97970', 'Lázaro Cárdenas', 'Tekax', 'Yucatán'),
(1595, '97970', 'Tekax de Álvaro Obregón', 'Tekax', 'Yucatán'),
(1596, '97970', 'Benito Juárez', 'Tekax', 'Yucatán'),
(1597, '97970', 'Francisco I Madero', 'Tekax', 'Yucatán'),
(1598, '97970', 'Padre Eterno', 'Tekax', 'Yucatán'),
(1599, '97970', 'Yocchenkax', 'Tekax', 'Yucatán'),
(1600, '97970', 'Chunchucun', 'Tekax', 'Yucatán'),
(1601, '97970', 'Chobenche', 'Tekax', 'Yucatán'),
(1602, '97970', 'San Ignacio', 'Tekax', 'Yucatán'),
(1603, '97970', 'Ermita', 'Tekax', 'Yucatán'),
(1604, '97970', 'Fovissste (Módulo Social)', 'Tekax', 'Yucatán'),
(1605, '97970', 'Unidad Antigua', 'Tekax', 'Yucatán'),
(1606, '97973', 'Kinil', 'Tekax', 'Yucatán'),
(1607, '97973', 'Xaya', 'Tekax', 'Yucatán'),
(1608, '97973', 'Penkuyut', 'Tekax', 'Yucatán'),
(1609, '97973', 'Tixcuytun', 'Tekax', 'Yucatán'),
(1610, '97974', 'Ticum', 'Tekax', 'Yucatán'),
(1611, '97975', 'Kantemo', 'Tekax', 'Yucatán'),
(1612, '97975', 'San Marcos', 'Tekax', 'Yucatán'),
(1613, '97977', 'Kancab', 'Tekax', 'Yucatán'),
(1614, '97977', 'Canek', 'Tekax', 'Yucatán'),
(1615, '97977', 'Chacmultun', 'Tekax', 'Yucatán'),
(1616, '97979', 'Manuel Cepeda Peraza', 'Tekax', 'Yucatán'),
(1617, '97979', 'Alfonso Caso', 'Tekax', 'Yucatán'),
(1618, '97980', 'Benito Juárez', 'Tekax', 'Yucatán'),
(1619, '97980', 'San Agustín (Salvador Alvarado)', 'Tekax', 'Yucatán'),
(1620, '97980', 'San Pedro Zula', 'Tekax', 'Yucatán'),
(1621, '97980', 'San Martín Hili', 'Tekax', 'Yucatán'),
(1622, '97983', 'Chan Dzinup', 'Tekax', 'Yucatán'),
(1623, '97983', 'Huntochac', 'Tekax', 'Yucatán'),
(1624, '97983', 'Nuevo Popolá', 'Tekax', 'Yucatán'),
(1625, '97983', 'Pocoboh', 'Tekax', 'Yucatán'),
(1626, '97983', 'San Isidro Yaxche', 'Tekax', 'Yucatán'),
(1627, '97983', 'San Salvador', 'Tekax', 'Yucatán'),
(1628, '97983', 'Nueva Santa Cruz (Santa Cruz Cutzá)', 'Tekax', 'Yucatán'),
(1629, '97983', 'Mac-Yan (San Isidro Mac-Yan)', 'Tekax', 'Yucatán'),
(1630, '97984', 'Sacpukenhá', 'Tekax', 'Yucatán'),
(1631, '97984', 'Becanchen', 'Tekax', 'Yucatán'),
(1632, '97984', 'San Gaspar', 'Tekax', 'Yucatán'),
(1633, '97984', 'San Diego Buenavista', 'Tekax', 'Yucatán'),
(1634, '97985', 'Nohalal', 'Tekax', 'Yucatán'),
(1635, '97986', 'Ayim', 'Tekax', 'Yucatán'),
(1636, '97987', 'San Felipe Segundo', 'Tekax', 'Yucatán'),
(1637, '97987', 'Mesatunich', 'Tekax', 'Yucatán'),
(1638, '97987', 'San Rufino', 'Tekax', 'Yucatán'),
(1639, '97987', 'San Pedro Xtokil', 'Tekax', 'Yucatán'),
(1640, '97987', 'San Juan Tekax', 'Tekax', 'Yucatán'),
(1641, '97989', 'Sudzal Chico', 'Tekax', 'Yucatán'),
(1642, '97990', 'Akil Centro', 'Akil', 'Yucatán');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salaries`
--

CREATE TABLE `salaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` enum('Pendiente','Pagado','Cancelado') NOT NULL DEFAULT 'Pendiente',
  `type` enum('Nomina','Aguinaldo','Finiquito','Liquidacion','Otras percepciones') NOT NULL DEFAULT 'Nomina',
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `paid_date` varchar(100) DEFAULT NULL,
  `total` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `salaries`
--

INSERT INTO `salaries` (`id`, `user_id`, `status`, `type`, `start_date`, `end_date`, `paid_date`, `total`, `created_at`, `updated_at`) VALUES
(1, 3, 'Pagado', 'Nomina', '2025-02-03', '2025-03-09', '2025-02-08', 50, '2025-02-07 17:27:46', '2025-03-04 17:27:46'),
(2, 3, 'Pagado', 'Nomina', '2025-02-10', '2025-03-16', '2025-02-15', 50, '2025-02-15 17:28:33', '2025-03-04 17:28:33'),
(3, 3, 'Pagado', 'Nomina', '2025-02-17', '2025-02-23', '2025-02-22', 50, '2025-02-21 17:29:22', '2025-03-04 17:29:22'),
(4, 3, 'Pagado', 'Nomina', '2025-02-24', '2025-03-02', '2025-03-01', 50, '2025-02-27 17:30:50', '2025-03-04 17:30:50'),
(5, 3, 'Pagado', 'Nomina', '2025-03-03', '2025-03-09', '2025-03-08', 3000, '2025-03-07 18:41:32', '2025-03-07 18:41:32'),
(6, 3, 'Pagado', 'Nomina', '2025-03-10', '2025-03-16', '2025-03-15', 3000, '2025-03-14 19:39:22', '2025-03-14 19:39:22'),
(7, 3, 'Pagado', 'Nomina', '2025-03-17', '2025-03-23', '2025-03-22', 3000, '2025-03-21 17:03:14', '2025-03-21 17:03:14'),
(8, 3, 'Pagado', 'Nomina', '2025-03-24', '2025-03-30', '2025-03-29 11:11:17', 3000, '2025-03-28 18:07:25', '2025-03-29 17:11:17'),
(9, 3, 'Pagado', 'Otras percepciones', '2025-03-01', '2025-03-31', '2025-04-01 15:14:06', 200, '2025-04-01 21:13:48', '2025-04-01 21:14:06'),
(10, 3, 'Pagado', 'Nomina', '2025-03-31', '2025-04-06', '2025-04-05 10:11:50', 3000, '2025-04-07 16:11:45', '2025-04-07 16:11:50'),
(11, 3, 'Pagado', 'Nomina', '2025-04-07', '2025-04-13', '2025-04-12 11:33:00', 3000, '2025-04-15 17:32:56', '2025-04-15 17:33:00'),
(12, 3, 'Pagado', 'Nomina', '2025-04-14', '2025-04-20', '2025-04-19 08:58:14', 3000, '2025-04-19 14:58:09', '2025-04-19 14:58:14'),
(13, 3, 'Pagado', 'Nomina', '2025-04-21', '2025-04-27', '2025-04-26 15:55:07', 3000, '2025-04-30 21:55:02', '2025-04-30 21:55:07'),
(14, 3, 'Pagado', 'Otras percepciones', '2025-04-01', '2025-04-30', '2025-04-30 23:14:25', 200, '2025-05-01 05:14:18', '2025-05-01 05:14:25'),
(15, 2, 'Pagado', 'Nomina', '2025-04-01', '2025-04-30', '2025-04-30 23:26:42', 7765, '2025-05-01 05:26:38', '2025-05-01 05:26:42'),
(16, 3, 'Pagado', 'Nomina', '2025-04-28', '2025-05-04', '2025-05-04 11:54:29', 3000, '2025-05-11 17:54:26', '2025-05-11 17:54:29'),
(17, 3, 'Pagado', 'Nomina', '2025-05-05', '2025-05-11', '2025-05-11 11:55:43', 3000, '2025-05-11 17:55:40', '2025-05-11 17:55:43'),
(18, 3, 'Pagado', 'Nomina', '2025-05-12', '2025-05-18', '2025-05-19 10:20:09', 3000, '2025-05-19 16:20:05', '2025-05-19 16:20:09'),
(19, 3, 'Pagado', 'Nomina', '2025-05-19', '2025-05-25', '2025-05-27 10:05:23', 3000, '2025-05-27 16:05:20', '2025-05-27 16:05:23'),
(20, 3, 'Pagado', 'Nomina', '2025-05-26', '2025-05-31', '2025-05-31 01:09:03', 3000, '2025-05-31 07:08:59', '2025-05-31 07:09:03'),
(21, 3, 'Pagado', 'Otras percepciones', '2025-05-01', '2025-05-31', '2025-05-31 01:14:25', 250, '2025-05-31 07:14:22', '2025-05-31 07:14:25'),
(22, 3, 'Pagado', 'Nomina', '2025-06-02', '2025-06-07', '2025-06-09 09:12:07', 3000, '2025-06-09 15:12:02', '2025-06-09 15:12:07'),
(23, 3, 'Pagado', 'Nomina', '2025-06-09', '2025-06-14', '2025-06-16 11:47:23', 3000, '2025-06-16 17:47:19', '2025-06-16 17:47:23'),
(24, 3, 'Pagado', 'Otras percepciones', '2025-06-09', '2025-06-14', '2025-06-16 11:48:19', 1500, '2025-06-16 17:48:14', '2025-06-16 17:48:19'),
(25, 3, 'Pagado', 'Nomina', '2025-06-16', '2025-06-21', '2025-06-30 10:19:19', 3000, '2025-06-20 21:16:43', '2025-06-30 16:19:19'),
(26, 3, 'Pagado', 'Nomina', '2025-06-23', '2025-06-28', '2025-06-30 10:20:09', 3000, '2025-06-30 16:20:06', '2025-06-30 16:20:09'),
(27, 3, 'Pagado', 'Nomina', '2025-06-01', '2025-06-30', '2025-06-30 20:06:57', 200, '2025-07-01 02:06:44', '2025-07-01 02:06:57'),
(28, 2, 'Pagado', 'Nomina', '2025-06-01', '2025-06-30', '2025-06-30 20:29:44', 1000, '2025-07-01 02:15:27', '2025-07-01 02:29:44'),
(29, 1, 'Pagado', 'Nomina', '2025-06-01', '2025-06-30', '2025-06-30 20:57:34', 1000, '2025-07-01 02:16:06', '2025-07-01 02:57:34'),
(30, 1, 'Pagado', 'Otras percepciones', '2025-06-01', '2025-06-30', '2025-06-30 20:16:57', 500, '2025-07-01 02:16:53', '2025-07-01 02:16:57'),
(31, 3, 'Pagado', 'Nomina', '2025-06-30', '2025-07-05', '2025-07-07 13:03:44', 3000, '2025-07-07 19:03:41', '2025-07-07 19:03:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salaries_details`
--

CREATE TABLE `salaries_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `salary_id` varchar(255) NOT NULL,
  `concept` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `salaries_details`
--

INSERT INTO `salaries_details` (`id`, `salary_id`, `concept`, `number`, `amount`) VALUES
(1, '1', 'Caja de ahorro', '', 50),
(2, '2', 'Caja de ahorro', '', 50),
(3, '3', 'Caja de ahorro', '', 50),
(4, '4', 'Caja de ahorro', '', 50),
(5, '5', 'Salario', '', 2950),
(6, '5', 'Caja de ahorro', '', 50),
(7, '6', 'Salario', '', 2950),
(8, '6', 'Caja de ahorro', '', 50),
(9, '7', 'Salario', '', 2950),
(10, '7', 'Caja de ahorro', '', 50),
(11, '8', 'Salario', '', 2950),
(12, '8', 'Caja de ahorro', '', 50),
(13, '9', 'Caja de ahorro', '', 200),
(14, '10', 'Salario', '', 2950),
(15, '10', 'Caja de ahorro', '', 50),
(16, '11', 'Salario', '', 2950),
(17, '11', 'Caja de ahorro', '', 50),
(18, '12', 'Salario', '', 2950),
(19, '12', 'Caja de ahorro', '', 50),
(20, '13', 'Salario', '', 2950),
(21, '13', 'Caja de ahorro', '', 50),
(22, '14', 'Caja de ahorro', '', 200),
(23, '15', 'Salario', '', 7765),
(24, '16', 'Salario', '', 2950),
(25, '16', 'Caja de ahorro', '', 50),
(26, '17', 'Salario', '', 2950),
(27, '17', 'Caja de ahorro', '', 50),
(28, '18', 'Salario', '', 2950),
(29, '18', 'Caja de ahorro', '', 50),
(30, '19', 'Salario', '', 2950),
(31, '19', 'Caja de ahorro', '', 50),
(32, '20', 'Salario', '', 2950),
(33, '20', 'Caja de ahorro', '', 50),
(34, '21', 'Caja de ahorro', '', 250),
(35, '22', 'Salario', '', 2950),
(36, '22', 'Caja de ahorro', '', 50),
(37, '23', 'Salario', '', 2950),
(38, '23', 'Caja de ahorro', '', 50),
(40, '24', 'Prima Vacacional', '', 1500),
(41, '25', 'Salario', '', 2950),
(42, '25', 'Caja de ahorro', '', 50),
(43, '26', 'Salario', '', 2950),
(44, '26', 'Caja de ahorro', '', 50),
(45, '27', 'Caja de ahorro', '', 200),
(46, '28', 'Salario', '', 1000),
(47, '29', 'Salario', '', 1000),
(48, '30', 'Salario', '', 500),
(49, '31', 'Salario', '', 2950),
(50, '31', 'Caja de ahorro', '', 50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `odometer` varchar(30) DEFAULT NULL,
  `fault` text NOT NULL,
  `service_type` varchar(20) NOT NULL,
  `comments` text DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pendiente',
  `notes` text DEFAULT NULL,
  `entry_date` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `finished_date` date DEFAULT NULL,
  `total` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `services`
--

INSERT INTO `services` (`id`, `client_id`, `car_id`, `odometer`, `fault`, `service_type`, `comments`, `status`, `notes`, `entry_date`, `due_date`, `finished_date`, `total`, `created_at`, `updated_at`) VALUES
(1, 2, 11, '21697', 'Servicio mayor', 'Major', NULL, 'Entregado', NULL, '2025-03-01', '2025-03-01', '2025-03-01', 1600, '2025-03-01 06:00:00', '2025-03-01 06:00:00'),
(2, 9, 12, '185909', 'Fuga de anticongelante \r\nDepósitos de anticongelante y liquido limpiaparabrisas \r\nLuz de check engine encendido', 'Fallo', NULL, 'Entregado', NULL, '2025-03-01', '2025-03-08', '2025-03-08', 8668, '2025-03-01 06:00:00', '2025-03-03 16:40:41'),
(3, 10, 13, '84573', 'Fallo en transmisión, falla en Reversa', 'Fallo', NULL, 'Entregado', NULL, '2025-03-01', '2025-03-04', '2025-03-04', 6610, '2025-03-01 06:00:00', '2025-03-03 16:51:39'),
(4, 11, 14, '140,561', 'Mensajes de advertencia ABS en el tablero', 'Fallo', NULL, 'Entregado', NULL, '2025-02-15', '2025-03-07', '2025-03-07', 3170, '2025-02-15 06:00:00', '2025-03-04 22:57:18'),
(5, 5, 5, '164258', 'Vibración al manejar', 'Fallo', NULL, 'Entregado', 'Cambio de piezas por garantía (Bases de motor y flecha homocinética lado izquierdo)', '2025-03-04', '2025-03-21', '2025-03-21', 1100, '2025-03-04 06:00:00', '2025-03-05 02:03:34'),
(6, 10, 15, '119002', 'Mantenimiento\r\nMantenimiento de transmisión \r\nCambio de intercooler', 'Fallo', NULL, 'Entregado', NULL, '2025-03-05', '2025-03-15', '2025-03-15', 11825, '2025-03-05 06:00:00', '2025-03-05 20:55:28'),
(7, 11, 14, '140706', 'Testigos de ABS prendidos en el tablero', 'Fallo', NULL, 'Entregado', NULL, '2025-03-07', '2025-03-11', '2025-03-11', 2670, '2025-03-07 06:00:00', '2025-03-08 01:32:39'),
(8, 13, 16, '115,029', 'Cabezote', 'Fallo', NULL, 'Entregado', 'Se le reportó al cliente posibles fugas de anticongelante y bomba de agua. Cliente no autorizó cambio de piezas.', '2025-01-14', NULL, '2025-07-05', 6222, '2025-01-14 06:00:00', '2025-07-05 18:40:11'),
(9, 14, 17, '251867', 'Flecha homocinética derecha\r\nAmortiguadores delanteros', 'Fallo', NULL, 'Entregado', 'El cliente trajo sus refacciones\r\nAmortiguadores delanteros, base de motor, base de caja.\r\nSe trabajo la flecha', '2025-03-10', NULL, '2025-04-07', 2500, '2025-03-10 06:00:00', '2025-04-08 00:59:47'),
(10, 3, 3, '134725', 'Fuga de líquido de clutch\r\nLuz de cuarto trasero izquierdo', 'Fallo', NULL, 'Entregado', NULL, '2025-03-10', '2025-03-13', '2025-03-13', 2660, '2025-03-10 06:00:00', '2025-03-10 20:37:12'),
(11, 4, 4, '140998', 'Cambio de ventilador\r\nCambio de varillas de dirección', 'Fallo', NULL, 'Entregado', NULL, '2025-03-11', '2025-03-11', '2025-03-11', 3080, '2025-03-11 06:00:00', '2025-03-11 23:54:41'),
(12, 15, 18, '154529', 'Servicio mayor\r\nRuido en suspensión \r\nRevisión de clutch', 'Major', NULL, 'Entregado', NULL, '2025-03-12', '2025-03-18', '2025-03-18', 6990, '2025-03-12 06:00:00', '2025-03-12 16:34:41'),
(13, 11, 14, '140782', 'Fuga de anticongelante', 'Fallo', NULL, 'Entregado', NULL, '2025-03-12', '2025-03-24', '2025-03-24', 2080, '2025-03-12 06:00:00', '2025-03-13 02:05:38'),
(14, 16, 21, '57319', 'Fuga del sistema de A/C', 'Menor', NULL, 'Entregado', NULL, '2025-03-14', '2025-03-14', '2025-03-14', 3340, '2025-03-14 06:00:00', '2025-03-14 17:07:41'),
(15, 2, 22, '192610', 'No entra reversa', 'Menor', NULL, 'Entregado', NULL, '2025-03-15', '2025-03-15', '2025-03-15', 1400, '2025-03-15 06:00:00', '2025-03-15 18:42:58'),
(16, 10, 13, '86276', 'Falla en Reversa', 'Fallo', NULL, 'Entregado', NULL, '2025-03-15', '2025-03-18', '2025-03-18', 4870, '2025-03-15 06:00:00', '2025-03-15 18:48:58'),
(17, 17, 23, '160677', 'Horquilla derecha inferior rota', 'Fallo', NULL, 'Entregado', 'Cliente trajo las refacciones', '2025-03-15', '2025-03-18', '2025-03-18', 1600, '2025-03-15 06:00:00', '2025-03-18 17:17:04'),
(18, 6, 6, '184842', 'Calentamiento', 'Fallo', NULL, 'Entregado', 'Revisión de ventilador', '2025-03-19', '2025-03-20', '2025-03-20', 500, '2025-03-19 06:00:00', '2025-03-19 17:53:23'),
(19, 6, 7, '118277', 'Revisión de luces', 'Menor', NULL, 'Entregado', NULL, '2025-03-20', '2025-03-21', '2025-03-21', 3250, '2025-03-20 06:00:00', '2025-03-20 22:54:45'),
(20, 18, 24, '167871', 'Servicio Mayor', 'Major', NULL, 'Entregado', NULL, '2025-03-21', '2025-03-22', '2025-03-22', 5625, '2025-03-21 06:00:00', '2025-03-22 00:17:07'),
(21, 12, 25, NULL, 'Cabezote', 'Fallo', NULL, 'Entregado', NULL, '2025-03-21', NULL, '2025-05-12', 1800, '2025-03-22 00:39:41', '2025-05-13 00:47:05'),
(22, 19, 26, '41228', 'Brazo tensor de banda de accesorios', 'Fallo', NULL, 'Entregado', NULL, '2025-03-25', '2025-03-26', '2025-03-31', 1780, '2025-03-25 18:30:39', '2025-04-01 04:17:51'),
(23, 9, 12, '186065', 'Ruido en el diferencial', 'Fallo', NULL, 'Entregado', 'Se reparo diferencial, el cliente compro las refacciones', '2025-03-31', NULL, '2025-04-20', 2400, '2025-03-31 18:05:41', '2025-04-22 00:54:53'),
(24, 20, 27, NULL, 'Fuga interna de anticongelante', 'Fallo', NULL, 'Finalizado', NULL, '2025-03-31', NULL, NULL, 1600, '2025-04-01 04:33:23', '2025-04-01 04:37:39'),
(25, 4, 28, '125529', 'Icono de batería encendido en el tablero', 'Fallo', NULL, 'Entregado', NULL, '2025-04-01', NULL, '2025-04-02', 7400, '2025-04-01 15:19:04', '2025-04-03 04:05:37'),
(26, 5, 5, '164258', 'No arranca', 'Fallo', NULL, 'Entregado', NULL, '2025-04-03', NULL, '2025-04-04', 1350, '2025-04-03 16:31:09', '2025-04-04 16:13:57'),
(27, 3, 3, NULL, 'No arranca con tanque a la mitad\r\nluces\r\nclima', 'Fallo', NULL, 'Entregado', 'Se cambio bomba de gasolina, se reparo clima, se puso relevador a luces', '2025-04-09', NULL, '2025-04-21', 2800, '2025-04-22 00:18:16', '2025-04-22 17:39:16'),
(28, 4, 4, '149940', 'Servicio mayor', 'Mayor', NULL, 'Entregado', NULL, '2025-04-21', NULL, '2025-04-21', 800, '2025-04-22 00:21:45', '2025-04-22 01:40:35'),
(29, 21, 29, NULL, 'Balatas delanteras', 'Fallo', NULL, 'Entregado', NULL, '2025-04-21', NULL, '2025-04-21', 1920, '2025-04-22 00:29:30', '2025-04-22 00:31:18'),
(30, 22, 30, NULL, 'Servicio Menor', 'Menor', NULL, 'Entregado', NULL, '2025-04-21', NULL, '2025-04-21', 400, '2025-04-22 00:38:46', '2025-04-22 00:39:10'),
(31, 23, 31, NULL, 'Fuga de anticongelante', 'Menor', NULL, 'Entregado', NULL, '2025-04-21', NULL, '2025-04-21', 900, '2025-04-22 00:47:34', '2025-04-22 00:48:17'),
(32, 24, 32, NULL, 'Fuga de anticongelante', 'Fallo', NULL, 'Entregado', 'Se cambio manguera inferior de radiador y amortiguador de cofre', '2025-04-21', NULL, '2025-04-21', 800, '2025-04-22 00:53:33', '2025-04-22 00:54:19'),
(33, 10, 13, '87371', 'Fuga de anticongelante', 'Fallo', NULL, 'Entregado', NULL, '2025-04-17', NULL, '2025-04-24', 1800, '2025-04-22 17:36:50', '2025-04-25 03:26:02'),
(34, 10, 15, NULL, 'Cambio de rejilla', 'Fallo', NULL, 'Entregado', NULL, '2025-04-24', NULL, '2025-05-19', 1800, '2025-04-25 02:23:27', '2025-05-19 18:04:16'),
(35, 25, 33, NULL, 'Fuga de anticongelante, Luces, Fuga de aceite', 'Fallo', NULL, 'Entregado', NULL, '2025-04-24', NULL, '2025-04-25', 1580, '2025-04-25 03:24:26', '2025-04-25 15:42:40'),
(36, 9, 12, NULL, 'Fuga de aceite de diferencial', 'Fallo', NULL, 'Entregado', NULL, '2025-04-24', NULL, '2025-04-24', 5573, '2025-04-25 03:26:59', '2025-04-25 03:30:27'),
(37, 26, 34, NULL, 'No arranca, testigos de ABS prendido en el tablero, ruido en suspensión trasera', 'Fallo', NULL, 'Entregado', NULL, '2025-04-24', NULL, '2025-04-28', 7550, '2025-04-25 03:36:56', '2025-04-28 23:51:24'),
(38, 25, 35, NULL, 'Cambio de rotulas y base de motor', 'Fallo', NULL, 'Entregado', NULL, '2025-04-25', NULL, '2025-04-28', 4973, '2025-04-25 15:55:56', '2025-04-28 15:39:04'),
(39, 27, 36, '159441', 'No sube la presión de aceite', 'Fallo', NULL, 'Esperando refaccion', NULL, '2025-04-28', NULL, NULL, 0, '2025-04-28 23:58:15', '2025-05-17 00:17:55'),
(40, 7, 8, NULL, 'Fuga de anticongelante', 'Fallo', NULL, 'Cancelado', NULL, '2025-04-28', NULL, NULL, 4280, '2025-04-29 03:22:32', '2025-06-25 16:27:34'),
(41, 4, 28, '126010', 'Ruido en el soplador del clima', 'Fallo', NULL, 'Entregado', NULL, '2025-04-29', NULL, '2025-04-30', 500, '2025-04-29 15:29:04', '2025-05-01 04:55:08'),
(42, 23, 31, '171733', 'Cambio de bases de motor, cambio de bujes y deposito de anticongelante', 'Fallo', NULL, 'Entregado', NULL, '2025-04-30', NULL, '2025-04-30', 3000, '2025-04-30 22:34:58', '2025-04-30 22:40:21'),
(43, 4, 4, '152257', 'Cambio de gomas de barra estabilizadora', 'Fallo', NULL, 'Entregado', NULL, '2025-05-01', NULL, '2025-05-01', 400, '2025-05-02 00:42:49', '2025-05-02 01:03:02'),
(44, 4, 4, '156,631', 'Cambio de gomas de barra estabilizadora', 'Fallo', NULL, 'Entregado', 'Se cambio base de motor', '2025-05-19', NULL, '2025-05-19', 300, '2025-05-02 00:42:58', '2025-05-20 00:38:22'),
(48, 28, 37, '320938', 'Cambio de bases de motor, fuga de aceite', 'Fallo', NULL, 'Entregado', NULL, '2025-05-08', NULL, '2025-05-12', 3000, '2025-05-08 19:13:30', '2025-05-13 00:51:22'),
(49, 29, 38, '280589', 'Cigarrera no funciona', 'Fallo', NULL, 'Entregado', NULL, '2025-05-13', NULL, '2025-05-13', 300, '2025-05-13 18:58:09', '2025-05-13 22:10:44'),
(50, 30, 39, '132404', 'Calentamiento', 'Fallo', NULL, 'Entregado', NULL, '2025-05-13', NULL, '2025-05-14', 3858, '2025-05-13 22:17:19', '2025-05-14 22:51:26'),
(51, 31, 40, '234175', 'Ruido de motor', 'Fallo', NULL, 'Esperando refaccion', NULL, '2025-05-15', NULL, NULL, 0, '2025-05-17 00:17:29', '2025-05-21 22:27:10'),
(52, 10, 13, '90129', 'Ruido en suspensión delantera', 'Fallo', NULL, 'Entregado', NULL, '2025-05-19', NULL, '2025-05-23', 5430, '2025-05-19 18:07:00', '2025-05-24 03:19:48'),
(53, 2, 41, '174991', 'Servicio Mayor', 'Mayor', NULL, 'Entregado', NULL, '2025-05-19', NULL, '2025-05-19', 1500, '2025-05-19 18:09:25', '2025-05-19 18:09:54'),
(54, 32, 42, NULL, 'Cabezote, Fallo de motor', 'Fallo', NULL, 'Entregado', NULL, '2024-04-03', NULL, '2025-05-19', 7000, '2025-05-19 18:45:18', '2025-05-19 18:46:35'),
(55, 33, 43, '105,442', 'Servicio', 'Fallo', NULL, 'Entregado', NULL, '2025-05-26', NULL, '2025-05-26', 6060, '2025-05-19 18:59:48', '2025-05-26 23:59:51'),
(56, 18, 24, '168284', 'Reparación de fascia trasera', 'Fallo', NULL, 'Entregado', NULL, '2025-05-19', NULL, '2025-05-21', 900, '2025-05-20 00:39:34', '2025-05-22 01:35:55'),
(57, 29, 44, NULL, 'Ruido en suspensión', 'Fallo', NULL, 'Cancelado', NULL, '2025-05-29', NULL, NULL, 3108.8, '2025-05-29 19:37:50', '2025-06-17 18:39:33'),
(58, 29, 38, NULL, 'Fuga de aceite y fuga de anticongelante.', 'Fallo', NULL, 'Cancelado', NULL, '2025-05-31', NULL, NULL, 1972, '2025-05-31 13:52:27', '2025-06-17 18:39:21'),
(59, 6, 7, NULL, 'Rescate (No arranca, problemas de bateria)', 'Fallo', NULL, 'Entregado', NULL, '2025-06-02', NULL, '2025-06-02', 800, '2025-06-02 23:47:41', '2025-06-02 23:48:03'),
(60, 22, 30, NULL, 'Revisión de luces', 'Fallo', NULL, 'Entregado', 'Se reparo cables rotos', '2025-06-02', NULL, '2025-06-02', 600, '2025-06-02 23:48:26', '2025-06-02 23:49:01'),
(61, 34, 45, '81522', 'Respaldo de asiento lado conductor no funciona correctamente', 'Fallo', NULL, 'Entregado', 'Reparación de asiento lado conductor', '2025-06-04', NULL, '2025-06-05', 1200, '2025-06-05 00:35:09', '2025-06-05 23:38:16'),
(62, 2, 41, '175859', 'Fuga de anticongelante.\r\nFuga de aceite.\r\nCambio de trípode y cubrepolvo.', 'Fallo', NULL, 'Entregado', NULL, '2025-06-05', NULL, '2025-06-07', 5335, '2025-06-05 20:34:24', '2025-06-07 19:11:21'),
(63, 35, 46, '256779', 'No arranca', 'Fallo', NULL, 'Entregado', 'Se reparó motor de arranque', '2025-06-05', NULL, '2025-06-05', 1200, '2025-06-05 23:37:05', '2025-06-05 23:37:42'),
(64, 20, 27, NULL, 'Cabezote', 'Fallo', NULL, 'Pendiente', NULL, '2025-06-10', NULL, NULL, 8890, '2025-06-10 18:29:15', '2025-06-26 00:51:02'),
(65, 2, 22, '194,596', 'Cambio de clutch', 'Fallo', NULL, 'Entregado', NULL, '2025-06-10', NULL, '2025-06-16', 7550, '2025-06-10 19:54:12', '2025-06-16 17:44:18'),
(66, 37, 48, NULL, 'Rescate, auto no arranca', 'Fallo', NULL, 'Entregado', 'Cambio de bomba de gasolina, Chevrolet Beat 2020', '2025-06-10', NULL, '2025-06-10', 800, '2025-06-10 23:44:29', '2025-06-10 23:46:09'),
(67, 37, 48, '116645', 'Fallo de motor', 'Fallo', 'Toyota Corolla 2016', 'Entregado', NULL, '2025-06-12', NULL, '2025-06-12', 2731, '2025-06-12 19:07:18', '2025-06-12 21:25:42'),
(68, 5, 5, '164258', 'Servicio mayor', 'Mayor', NULL, 'Entregado', NULL, '2025-06-13', NULL, '2025-06-16', 4460, '2025-06-13 22:22:43', '2025-06-16 14:46:58'),
(69, 38, 49, '183,182', 'Se descarga la batería', 'Fallo', NULL, 'Entregado', NULL, '2025-06-14', NULL, '2025-06-18', 9245, '2025-06-16 19:36:56', '2025-06-19 01:49:04'),
(70, 3, 50, '98588', 'Servicio mayor', 'Mayor', NULL, 'Entregado', NULL, '2025-06-16', NULL, '2025-06-16', 4200, '2025-06-16 22:28:47', '2025-06-16 23:03:51'),
(71, 25, 33, '135,754', 'Fuga de aceite.\r\nCheck engine encendido.\r\ncambio de foco de luz anti-niebla.', 'Fallo', NULL, 'Entregado', NULL, '2025-06-17', NULL, '2025-07-02', 5585, '2025-06-17 18:28:50', '2025-07-03 01:06:38'),
(72, 37, 48, NULL, 'Fuga de gasolina', 'Fallo', 'Mercedes Benz C200 Hugo', 'Entregado', NULL, '2025-06-19', NULL, '2025-06-19', 900, '2025-06-20 01:40:47', '2025-06-20 01:41:43'),
(73, 26, 34, '126161', 'Ruido en suspensión.', 'Fallo', NULL, 'Entregado', NULL, '2025-06-21', NULL, '2025-06-24', 7300, '2025-06-21 18:06:05', '2025-06-25 00:57:24'),
(74, 26, 51, NULL, 'Fuga de aceite.', 'Fallo', NULL, 'Entregado', NULL, '2025-06-30', NULL, '2025-06-30', 2300, '2025-07-01 00:49:22', '2025-07-01 02:03:58'),
(75, 39, 52, '110176', 'Fallo de motor.', 'Fallo', NULL, 'Pendiente', NULL, '2025-07-03', NULL, NULL, NULL, '2025-07-04 00:26:04', '2025-07-04 00:26:04'),
(76, 10, 15, '128119', 'Ruido en suspensión.\r\nRuido al encender clima.\r\nRevisión de chicote de cofre.', 'Fallo', NULL, 'Pendiente', NULL, '2025-07-03', NULL, NULL, 10560, '2025-07-04 00:27:10', '2025-07-08 02:25:28'),
(77, 29, 53, NULL, 'Pérdida de potencia (Se apaga).\r\nServicio Mayor', 'Fallo', NULL, 'Pendiente', NULL, '2025-07-04', NULL, NULL, 8574.72, '2025-07-04 23:28:03', '2025-07-04 23:45:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `services_items`
--

CREATE TABLE `services_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` int(11) NOT NULL,
  `amount` int(11) DEFAULT NULL,
  `item` varchar(255) DEFAULT NULL,
  `supplier` varchar(255) DEFAULT NULL,
  `labour` tinyint(1) NOT NULL DEFAULT 0,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `services_items`
--

INSERT INTO `services_items` (`id`, `service_id`, `amount`, `item`, `supplier`, `labour`, `price`) VALUES
(1, 1, 1, 'Servicio (mano de obra)', NULL, 1, 1600),
(2, 3, 1, 'Sensor de ABS delantero derecho', 'Original', 0, 1690),
(3, 3, 1, 'Sensor de ABS trasero izquierdo', 'Original', 0, 2380),
(4, 3, 2, 'Orings de anticongelante', 'Original', 0, 80),
(5, 3, 1, 'Orings de aceite', 'Original', 0, 130),
(6, 3, 1, 'Galón de anticongelante', 'Autozone', 0, 290),
(7, 3, 2, 'Litros de aceite de motor', 'Original', 0, 230),
(8, 3, 1, 'Servicio (mano de obra)', NULL, 1, 1500),
(9, 4, 1, 'Sensor de ABS delantero derecho', 'Safe', 0, 780),
(10, 4, 1, 'Sensor de ABS trasero izquierdo', 'Safe', 0, 690),
(17, 2, 1, 'Depósito de anticongelante y wipers', 'Madero', 0, 1735),
(18, 2, 1, 'Tubo de calefacción', 'Madero', 0, 1800),
(19, 2, 1, 'Tubo refrigerante de motor', 'Madero', 0, 1235),
(20, 2, 2, 'Galón de anticongelante', 'Autozone', 0, 299),
(21, 2, 3, 'Abrazaderas', 'Autozone', 0, 30),
(22, 2, 1, 'Líquido para lavar inyectores', 'Ancona', 0, 160),
(23, 2, 1, 'Líquido limpiaparabrisas concentrado', 'Mercedes Benz', 0, 150),
(24, 2, 1, 'Servicio (mano de obra)', NULL, 1, 2900),
(25, 4, 1, 'Servicio (mano de obra)', NULL, 1, 1700),
(26, 7, 1, 'Sensor de ABS delantero izquierdo', 'Safe', 0, 780),
(27, 7, 1, 'Sensor de ABS trasero derecho', 'Safe', 0, 690),
(28, 7, 1, 'Servicio (mano de obra)', NULL, 1, 1200),
(29, 8, 5, 'Litros de aceite de motor', 'Peugeot', 0, 230),
(30, 8, 1, 'Filtro de aceite', 'Ancona', 0, 190),
(31, 8, 4, 'Bujías', 'Ancona', 0, 78),
(32, 8, 1, 'Empaque de cabezote', 'Ancona', 0, 570),
(33, 8, 1, 'Galón de anticongelante', 'Ancona', 0, 240),
(34, 8, 1, 'Carbuclean', 'Ancona', 0, 130),
(35, 8, 1, 'Silicón', 'Ancona', 0, 130),
(36, 8, 1, 'Servicio (mano de obra)', NULL, 1, 3500),
(37, 11, 1, 'Ventilador', 'Mercado Libre', 0, 1600),
(38, 11, 2, 'Varilla de dirección', 'Mercado Libre', 0, 290),
(39, 11, 1, 'Servicio (mano de obra)', NULL, 1, 900),
(40, 6, 4, 'Litros de aceite de motor', 'Peugeot', 0, 230),
(41, 6, 1, 'Filtro de aceite', 'Ancona', 0, 190),
(42, 6, 1, 'Filtro de aire', 'Ancona', 0, 380),
(43, 6, 1, 'Filtro de cabina', 'Ancona', 0, 420),
(44, 6, 4, 'Bujías', 'Ancona', 0, 530),
(45, 6, 1, 'Carbuclean', 'Ancona', 0, 130),
(47, 6, 1, 'Líquido para lavar inyectores', 'Ancona', 0, 150),
(48, 6, 1, 'Líquido limpiaparabrisas concentrado', 'Mercedes Benz', 0, 150),
(49, 6, 5, 'Litros de aceite de transmisión', 'Original', 0, 585),
(50, 6, 1, 'Sikaflex', 'Sika', 0, 290),
(51, 6, 1, 'Paquete de cintillas', 'Autozone', 0, 250),
(52, 6, 1, 'Servicio (mano de obra)', NULL, 1, 4700),
(53, 10, 1, 'Litro de líquido de freno', 'Madero', 0, 280),
(54, 10, 1, 'Foco de luz de cuarto trasero', 'Apymsa', 0, 80),
(55, 10, 1, 'Servicio (mano de obra)', NULL, 1, 2300),
(56, 12, 4, 'Litros de aceite de motor', 'Peugeot', 0, 230),
(57, 14, 4, 'Litros de aceite de motor', 'Peugeot', 0, 230),
(60, 12, 1, 'Filtro de aceite', 'Ancona', 0, 290),
(61, 12, 1, 'Filtro de cabina', 'Ancona', 0, 320),
(62, 12, 4, 'Bujías de platino', 'Ancona', 0, 260),
(63, 12, 1, 'Líquido para lavar inyectores', 'Ancona', 0, 130),
(64, 12, 1, 'Carbuclean', 'Ancona', 0, 130),
(65, 12, 2, 'Varilla de dirección', 'Ancona', 0, 690),
(66, 12, 1, 'Servicio (mano de obra)', NULL, 1, 2200),
(67, 14, 1, 'Filtro de aceite', 'Peugeot', 0, 220),
(68, 14, 1, 'Reparación de manguera de sistema A/C', NULL, 0, 1800),
(69, 14, 1, 'Servicio (mano de obra)', NULL, 1, 400),
(70, 13, 1, 'Manguera de radiador superior', 'Safe', 0, 850),
(71, 13, 1, 'Liga de sensor de nivel de aceite', 'Reinsur', 0, 140),
(72, 13, 1, 'Galón de anticongelante', 'Autozone', 0, 290),
(73, 13, 1, 'Servicio (mano de obra)', NULL, 1, 800),
(74, 12, 1, 'Banda de accesorios', 'Ancona', 0, 580),
(75, 15, 4, 'Litros de aceite de motor', 'Peugeot', 0, 200),
(76, 15, 1, 'Servicio (mano de obra)', NULL, 1, 600),
(78, 6, 1, 'Servicio (mano de obra)', NULL, 1, -800),
(79, 16, 1, 'Sensor de ABS delantero izquierdo', 'Original', 0, 1690),
(80, 16, 1, 'Sensor de ABS trasero derecho', 'Original', 0, 2380),
(81, 16, 1, 'Servicio (mano de obra)', NULL, 1, 800),
(82, 17, 1, 'Servicio (mano de obra)', NULL, 1, 1600),
(83, 18, 1, 'Servicio (mano de obra)', NULL, 1, 500),
(84, 19, 8, 'Litros de aceite de motor', 'Peugeot', 0, 230),
(86, 19, 1, 'Filtro de aceite', 'Autozone', 0, 320),
(87, 19, 1, 'Foco halógeno H7', 'Autozone', 0, 190),
(88, 19, 1, 'Servicio (mano de obra)', NULL, 1, 900),
(89, 5, 1, 'Servicio (mano de obra)', NULL, 1, 1100),
(90, 20, 7, 'Litros de aceite de motor', 'Peugeot', 0, 230),
(91, 20, 1, 'Filtro de aceite', 'Safe', 0, 380),
(92, 20, 1, 'Filtro de aire', 'Safe', 0, 340),
(93, 20, 1, 'Filtro de cabina interior', 'Safe', 0, 395),
(94, 20, 1, 'Filtro de cabina exterior', 'Safe', 0, 340),
(95, 20, 4, 'Bujías de platino', 'Safe', 0, 390),
(96, 20, 1, 'Servicio (mano de obra)', NULL, 1, 1000),
(97, 22, 1, 'Tensor de banda de accesorios', 'Madero', 0, 980),
(98, 22, 1, 'Servicio (mano de obra)', NULL, 1, 800),
(99, 24, 1, 'Galón de anticongelante', 'Autozone', 0, 290),
(100, 24, 1, 'Liga de toma de agua', 'Reinsur', 0, 110),
(101, 24, 1, 'Servicio (mano de obra)', NULL, 1, 1200),
(102, 25, 1, 'Alternador restaurado', NULL, 0, 6000),
(103, 25, 1, 'Terminal tipo ojillo', 'Apymsa', 0, 100),
(104, 25, 1, 'Servicio (mano de obra)', NULL, 1, 1300),
(105, 26, 1, 'Arnés de sensor de cigüeñal', 'Marco arneses', 0, 450),
(106, 26, 1, 'Servicio (mano de obra)', NULL, 1, 900),
(107, 9, 1, 'Servicio (mano de obra)', NULL, 1, 2500),
(108, 29, 1, 'Juego de balatas delanteras', 'Safe', 0, 1250),
(109, 29, 1, 'Sensor de desgaste de freno delantero', 'Safe', 0, 170),
(110, 29, 1, 'Servicio (mano de obra)', NULL, 1, 500),
(111, 30, 1, 'Servicio (mano de obra)', NULL, 1, 400),
(112, 31, 1, 'Servicio (mano de obra)', NULL, 1, 900),
(113, 27, 1, 'Servicio (mano de obra)', NULL, 1, 2800),
(114, 23, 1, 'Servicio (mano de obra)', NULL, 1, 2400),
(115, 32, 1, 'Servicio (mano de obra)', NULL, 1, 800),
(116, 28, 1, 'Servicio (mano de obra)', NULL, 1, 800),
(117, 33, 1, 'Servicio (mano de obra)', NULL, 1, 1800),
(118, 35, 2, 'Foco de xenón', 'Safe', 0, 380),
(119, 35, 1, 'Purguero de depósito de anticongelante', 'Safe', 0, 220),
(120, 36, 1, 'Kit de balero con reten de rueda', 'Central de baleros', 0, 3073),
(121, 36, 4, 'Litros de aceite de transmisión manual', 'Ancona', 0, 175),
(122, 36, 1, 'Servicio (mano de obra)', NULL, 1, 1800),
(123, 37, 1, 'Motor de arranque', 'Pineda', 0, 3000),
(124, 35, 1, 'Servicio (mano de obra)', NULL, 1, 600),
(125, 38, 2, 'Rotulas', 'Kaua', 0, 490),
(126, 38, 1, 'Base de motor', 'Kaua', 0, 2793),
(127, 38, 1, 'Servicio (mano de obra)', NULL, 1, 1200),
(129, 37, 1, 'Sensor de ABS trasero izquierdo', 'Original', 0, 2750),
(130, 37, 1, 'Servicio (mano de obra)', NULL, 1, 1800),
(139, 42, 1, 'Servicio (mano de obra)', NULL, 1, 3000),
(140, 41, 1, 'Servicio (mano de obra)', NULL, 1, 500),
(141, 43, 1, 'Servicio (mano de obra)', NULL, 1, 400),
(142, 21, 1, 'Servicio (mano de obra)', NULL, 1, 1800),
(143, 48, 1, 'Servicio (mano de obra)', NULL, 1, 3000),
(144, 49, 1, 'Servicio (mano de obra)', NULL, 1, 300),
(145, 50, 1, 'Termostato', 'Autozone', 0, 2380),
(146, 50, 1, 'Sensor de temperatura', 'Autozone', 0, 378),
(147, 50, 1, 'Servicio (mano de obra)', NULL, 1, 1100),
(148, 34, 1, 'Servicio (mano de obra)', NULL, 1, 1800),
(149, 53, 1, 'Servicio (mano de obra)', NULL, 1, 1500),
(150, 54, 1, 'Servicio (mano de obra)', NULL, 1, 7000),
(151, 52, 1, 'Amortiguador delantero', 'Safe', 0, 3280),
(152, 52, 1, 'Base de amortiguador delantero', 'Safe', 0, 1350),
(153, 52, 1, 'Servicio (mano de obra)', NULL, 1, 800),
(166, 44, 1, 'Servicio (mano de obra)', NULL, 1, 300),
(167, 56, 1, 'Servicio (mano de obra)', NULL, 1, 900),
(168, 55, 5, 'Litros de aceite de motor', 'Ancona', 0, 230),
(169, 55, 1, 'Filtro de aceite', 'Ancona', 0, 180),
(170, 55, 1, 'Filtro de gasolina', 'Ancona', 0, 190),
(171, 55, 1, 'Filtro de cabina', 'Ancona', 0, 420),
(172, 55, 4, 'Bujías', 'Ancona', 0, 135),
(173, 55, 1, 'Líquido para lavar inyectores', 'Ancona', 0, 200),
(174, 55, 1, 'Carbuclean', 'Ancona', 0, 100),
(175, 55, 2, 'Litros de aceite de transmisión', 'Autozone', 0, 490),
(176, 55, 1, 'Servicio (mano de obra)', NULL, 1, 2300),
(177, 57, 4, 'Bujes de horquilla', 'Kaua', 0, 370),
(178, 57, 1, 'Servicio (mano de obra)', NULL, 1, 1200),
(179, 57, 1, 'I.V.A.', 'Taller', 0, 428.8),
(180, 58, 1, 'Empaque de tapa de punterías', 'Kaua', 0, 290),
(181, 58, 1, 'Carbuclean', 'Ancona', 0, 130),
(182, 58, 1, 'Manguera de anticongelante', 'Ancona', 0, 320),
(183, 58, 2, 'Abrazaderas', 'Teresita', 0, 30),
(184, 58, 1, 'Servicio (mano de obra)', NULL, 1, 900),
(185, 58, 1, 'I.V.A.', 'Taller', 0, 272),
(186, 59, 1, 'Servicio (mano de obra)', NULL, 1, 800),
(187, 60, 1, 'Servicio (mano de obra)', NULL, 1, 600),
(188, 61, 1, 'Servicio (mano de obra)', NULL, 1, 1200),
(189, 63, 1, 'Servicio (mano de obra)', NULL, 1, 1200),
(190, 62, 1, 'Radiador', 'Ancona', 0, 1680),
(191, 62, 1, 'Empaque de tapa de punterías', 'Ancona', 0, 560),
(192, 62, 1, 'Trípode', 'Ancona', 0, 490),
(193, 62, 1, 'Cubre polvo de flecha homocinética', 'Ancona', 0, 360),
(194, 62, 1, 'Anticongelante', 'Ancona', 0, 290),
(195, 62, 1, 'Carbuclean', 'Ancona', 0, 120),
(196, 62, 1, 'Abrazadera', 'Ancona', 0, 35),
(197, 62, 1, 'Servicio (mano de obra)', NULL, 1, 1800),
(198, 66, 1, 'Servicio (mano de obra)', NULL, 1, 800),
(201, 65, 1, 'Kit de Cluth', 'Mercado Libre', 0, 4050),
(202, 65, 1, 'Servicio (mano de obra)', NULL, 1, 3500),
(203, 67, 1, 'Bobina de encendido', 'Ancona', 0, 935),
(204, 67, 4, 'Bujías de platino', 'Ancona', 0, 224),
(205, 67, 1, 'Servicio (mano de obra)', NULL, 1, 900),
(206, 68, 5, 'Litros de aceite de motor', 'Ancona', 0, 200),
(207, 68, 1, 'Filtro de aceite', 'Ancona', 0, 240),
(208, 68, 1, 'Filtro de aire', 'Ancona', 0, 320),
(209, 68, 1, 'Filtro de cabina', 'Ancona', 0, 140),
(210, 68, 4, 'Bujías de platino', 'Ancona', 0, 265),
(211, 68, 1, 'Líquido para lavar inyectores', 'Ancona', 0, 200),
(212, 68, 1, 'Servicio (mano de obra)', NULL, 1, 1500),
(213, 70, 5, 'Litros de aceite de motor', 'Ancona', 0, 230),
(214, 70, 1, 'Filtro de aceite', 'Ancona', 0, 230),
(215, 70, 1, 'Filtro de aire', 'Ancona', 0, 280),
(216, 70, 1, 'Filtro de cabina', 'Ancona', 0, 250),
(217, 70, 4, 'Bujías de platino', 'Ancona', 0, 85),
(218, 70, 1, 'Carbuclean', 'Ancona', 0, 100),
(219, 70, 1, 'Líquido para lavar inyectores', 'Ancona', 0, 200),
(220, 70, 1, 'Servicio (mano de obra)', NULL, 1, 1650),
(221, 69, 1, 'Alternador', 'Pineda', 0, 4675),
(223, 69, 1, 'Manguera de radiador superior', 'Autozone', 0, 2580),
(224, 69, 1, 'Anticongelante', 'Autozone', 0, 290),
(225, 69, 1, 'Servicio (mano de obra)', NULL, 1, 1700),
(226, 71, 2, 'Tapas de cierre de motor', 'Original', 0, 490),
(227, 71, 1, 'Liga de sensor de nivel de aceite', 'Reinsur', 0, 180),
(228, 71, 1, 'Manguera de respiradero de tapa de punterías', 'Original', 0, 1480),
(229, 71, 1, 'Valvula PCV', 'Safe', 0, 560),
(230, 71, 1, 'Foco halógeno H8', 'Autozone', 0, 155),
(231, 71, 1, 'Carbuclean', 'Ancona', 0, 100),
(232, 71, 1, 'Litros de aceite de motor', 'Ancona', 0, 230),
(233, 71, 1, 'Servicio (mano de obra)', NULL, 1, 1900),
(234, 72, 4, 'Orings de inyectores', NULL, 0, 25),
(235, 72, 1, 'Servicio (mano de obra)', NULL, 1, 800),
(236, 73, 2, 'Bujes grande de horquilla', 'Grob', 0, 446),
(237, 73, 2, 'Terminales de dirección', 'Ancona', 0, 633),
(238, 73, 2, 'Tornilos estabilizadores', 'Grob', 0, 615),
(239, 73, 1, 'Juego de gomas de barra estabilizadora delantera', 'Ancona', 0, 269),
(240, 73, 1, 'Juego de gomas de barra estabilizadora trasera', 'Autozone', 0, 358),
(241, 73, 1, 'Sikaflex', 'Sika', 0, 300),
(242, 73, 1, 'Servicio (mano de obra)', NULL, 1, 2985),
(243, 64, 1, 'Empaque de cabezote', 'Safe', 0, 780),
(244, 64, 1, 'Silicón', 'Ancona', 0, 180),
(245, 64, 1, 'Anticongelante', 'Autozone', 0, 290),
(246, 64, 6, 'Litros de aceite de motor', 'Ancona', 0, 230),
(247, 64, 1, 'Filtro de aceite', 'Safe', 0, 260),
(248, 64, 1, 'Servicio (mano de obra)', NULL, 1, 3500),
(250, 40, 1, 'Radiador', 'Ancona', 0, 2800),
(251, 40, 2, 'Galón de anticongelante', 'Autozone', 0, 290),
(252, 40, 1, 'Servicio (mano de obra)', NULL, 1, 900),
(253, 64, 1, 'Corte y rectificado de cabezote', NULL, 0, 2500),
(254, 74, 2, 'Empaque de tapa de punterías', 'Safe', 0, 550),
(256, 74, 1, 'Servicio (mano de obra)', NULL, 1, 1200),
(257, 77, 5, 'Litros de aceite de motor', 'Ancona', 0, 230),
(258, 77, 1, 'Filtro de aceite', 'Ancona', 0, 90),
(259, 77, 1, 'Filtro de aire', NULL, 0, 198),
(260, 77, 1, 'Filtro de gasolina', NULL, 0, 89),
(261, 77, 4, 'Bujías de platino', NULL, 0, 80),
(262, 77, 1, 'Líquido para lavar inyectores', NULL, 0, 200),
(263, 77, 1, 'Carbuclean', NULL, 0, 130),
(267, 77, 1, 'Bomba de gasolina', NULL, 0, 2415),
(268, 77, 1, 'Servicio (mano de obra)', NULL, 1, 2800),
(270, 77, 1, 'I.V.A.', NULL, 0, 1182.72),
(271, 76, 2, 'Amortiguador delantero', 'Grob', 0, 1390),
(272, 76, 2, 'Base de amortiguador delantero', 'Grob', 0, 1250),
(273, 76, 2, 'Terminales de dirección', 'Grob', 0, 650),
(274, 76, 2, 'Tornilos estabilizadores', 'Grob', 0, 590),
(275, 76, 1, 'Servicio (mano de obra)', NULL, 1, 2800);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `services_view`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `services_view` (
`service_id` bigint(20) unsigned
,`client_id` int(11)
,`car_id` int(11)
,`fault` text
,`name` varchar(255)
,`car` varchar(511)
,`entry_date` date
,`finished_date` date
,`status` varchar(255)
,`total` double
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `service_quote`
--

CREATE TABLE `service_quote` (
  `id` int(11) NOT NULL,
  `amount` int(11) DEFAULT NULL,
  `item` varchar(100) DEFAULT NULL,
  `price` double DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `section` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `settings`
--

INSERT INTO `settings` (`id`, `name`, `value`, `section`) VALUES
(3, 'telegram_api', 'bot8169963766:AAGGQYcAR-bwEew8p9Amo5SWb-PL79IQGAM', ''),
(4, 'whatsapp_api', 'EAARe8OvWY7MBO9XINyyUBxlqHa8Eim5r6ZAcLtGbAlhGZA8SP9vYlkdUWQhJfivKSUYCTu99Qq6zYZAfcX0cO1GhgGIb8bBw4NsfGs2RmomZCqihD0mAC49hSDRVkT2lyG8Ts8srQvkLGLZA0mchlP3D1y7JQFZANEqSyB7I0qKAhK7rQEZBYMoahp5A4u6SyUG2nXLXVNZCN9Lc9EGcvC2eYniD', ''),
(5, 'genericClient', '37', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('Activo','Inactivo','Cancelado') NOT NULL,
  `rol` enum('Admin','Limit','Client') NOT NULL DEFAULT 'Admin',
  `comments` text DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `password`, `status`, `rol`, `comments`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Marcos Tzuc Cen', '9991210261', 'mtc.nxd@gmail.com', '$2y$12$XOAUu56juXnI9yDDAOM9NeUQXFvs73AJRTXy/EjjILsYUNfBaIDq2', 'Activo', 'Admin', NULL, NULL, '2023-03-01 20:35:13', NULL),
(2, 'Javier Rubio Magaña', '9994484463', 'j-ar-8@hotmail.com', '$2y$12$MDgDGZxFldFebhxmJU7TR.pqpZJtpYpH8kebfUEw8K5qidIqkAymi', 'Activo', 'Admin', NULL, NULL, '2023-03-01 20:35:13', '2025-02-27 20:35:13'),
(3, 'Alexander Xix Ortiz', '9971035139', 'alexanderxixjr@gmail.com', '$2y$12$z5QnjYu5ufK5.IpyD93vRec0v4AlzplFS6SMw574gfawDr8Zq/.Im', 'Activo', 'Limit', 'Mecanico', NULL, '2024-01-22 20:35:59', '2025-02-27 20:35:59'),
(4, 'Ingenieria Mecanica Rubio', '9991000000', 'admin@mecanicarubio.com', '', 'Activo', 'Admin', NULL, NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autos`
--
ALTER TABLE `autos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `models`
--
ALTER TABLE `models`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `montly_balances`
--
ALTER TABLE `montly_balances`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `postalcodes`
--
ALTER TABLE `postalcodes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `salaries`
--
ALTER TABLE `salaries`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `salaries_details`
--
ALTER TABLE `salaries_details`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `services_items`
--
ALTER TABLE `services_items`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `service_quote`
--
ALTER TABLE `service_quote`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autos`
--
ALTER TABLE `autos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de la tabla `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `calendar`
--
ALTER TABLE `calendar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=566;

--
-- AUTO_INCREMENT de la tabla `models`
--
ALTER TABLE `models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `montly_balances`
--
ALTER TABLE `montly_balances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `postalcodes`
--
ALTER TABLE `postalcodes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1643;

--
-- AUTO_INCREMENT de la tabla `salaries`
--
ALTER TABLE `salaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `salaries_details`
--
ALTER TABLE `salaries_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT de la tabla `services_items`
--
ALTER TABLE `services_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=276;

--
-- AUTO_INCREMENT de la tabla `service_quote`
--
ALTER TABLE `service_quote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

-- --------------------------------------------------------

--
-- Estructura para la vista `montly_balance_view`
--
DROP TABLE IF EXISTS `montly_balance_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `montly_balance_view`  AS SELECT 'Servicio' AS `type`, concat(`autos`.`brand`,' ',`autos`.`model`) AS `concept`, `services`.`finished_date` AS `date`, `services_items`.`price` AS `cash_in`, 0.0 AS `cash_out` FROM ((`services` join `services_items` on(`services`.`id` = `services_items`.`service_id`)) join `autos` on(`services`.`car_id` = `autos`.`id`)) WHERE `services_items`.`labour` = 1 AND `services`.`status` = 'Entregado'union select `salaries`.`type` AS `type`,concat(`users`.`name`,' - ',`salaries`.`start_date`,' ',`salaries`.`end_date`) AS `concept`,cast(`salaries`.`created_at` as date) AS `date`,0 AS `ingress`,`salaries`.`total` AS `cash_out` from (`salaries` join `users` on(`salaries`.`user_id` = `users`.`id`)) where `salaries`.`status` = 'Pagado' union select 'Egreso' AS `type`,`expenses`.`name` AS `name`,cast(`expenses`.`created_at` as date) AS `date`,0 AS `ingress`,`expenses`.`price` AS `egress` from `expenses` where `expenses`.`status` = 'Pagado'  ;

-- --------------------------------------------------------

--
-- Estructura para la vista `services_view`
--
DROP TABLE IF EXISTS `services_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `services_view`  AS SELECT `services`.`id` AS `service_id`, `services`.`client_id` AS `client_id`, `services`.`car_id` AS `car_id`, `services`.`fault` AS `fault`, `clients`.`name` AS `name`, concat(`autos`.`brand`,' ',`autos`.`model`) AS `car`, `services`.`entry_date` AS `entry_date`, `services`.`finished_date` AS `finished_date`, `services`.`status` AS `status`, `services`.`total` AS `total` FROM ((`services` join `autos` on(`services`.`car_id` = `autos`.`id`)) join `clients` on(`services`.`client_id` = `clients`.`id`)) ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
