-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-07-2024 a las 22:23:03
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `controlparking`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parkagenda`
--

CREATE TABLE `parkagenda` (
  `num_placa` varchar(8) NOT NULL,
  `entrada` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `salida` timestamp NOT NULL DEFAULT current_timestamp(),
  `tiempo` int(10) NOT NULL,
  `tipo` varchar(10) NOT NULL,
  `monto` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `parkagenda`
--

INSERT INTO `parkagenda` (`num_placa`, `entrada`, `salida`, `tiempo`, `tipo`, `monto`) VALUES
('2222', '2024-07-30 01:38:00', '2024-07-30 01:43:00', 5, 'oficial', 0),
('92KWW2', '2024-07-29 20:04:35', '2024-07-29 20:23:54', 0, 'residente', 0),
('ASD123', '2024-07-30 01:43:00', '2024-07-30 01:44:00', 1, 'residente', 1),
('ASD1233', '2024-07-30 01:41:00', '2024-07-30 01:47:00', 6, 'no residen', 18),
('ASD123ss', '2024-07-29 23:00:00', '2024-07-30 02:00:00', 180, 'residente', 180),
('BCA321', '2024-07-30 01:37:00', '2024-07-30 04:37:00', 180, 'no residen', 540),
('DDDDD', '2024-07-29 23:03:00', '2024-07-29 23:03:00', 0, 'residente', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `parkagenda`
--
ALTER TABLE `parkagenda`
  ADD PRIMARY KEY (`num_placa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
