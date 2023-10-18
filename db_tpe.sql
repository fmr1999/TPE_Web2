-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-10-2023 a las 03:25:53
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
-- Base de datos: `db_tpe2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `joyerias`
--

CREATE TABLE `joyerias` (
  `id` int(11) NOT NULL,
  `marca` varchar(200) NOT NULL,
  `precio` int(11) NOT NULL,
  `bañado` varchar(200) NOT NULL,
  `id_joya` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `joyerias`
--

INSERT INTO `joyerias` (`id`, `marca`, `precio`, `bañado`, `id_joya`) VALUES
(8, 'TIFFANY ', 10, 'tierra', 'anillo'),
(29, 'DON ROQUE', 10000, 'oro', 'anillo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_joya`
--

CREATE TABLE `tipo_joya` (
  `id` int(11) NOT NULL,
  `id_joya` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `tipo_joya`
--

INSERT INTO `tipo_joya` (`id`, `id_joya`) VALUES
(3, 'anillo'),
(7, 'titanio'),
(5, 'zapas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`username`, `password`) VALUES
('webadmin', '$2a$13$zJhGyBTGGUur2lNahIChJueNK/ER0VPSWbmVr0nqreSu5WkWifxQG');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `joyerias`
--
ALTER TABLE `joyerias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_joya` (`id_joya`);

--
-- Indices de la tabla `tipo_joya`
--
ALTER TABLE `tipo_joya`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_joya` (`id_joya`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `joyerias`
--
ALTER TABLE `joyerias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `tipo_joya`
--
ALTER TABLE `tipo_joya`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `joyerias`
--
ALTER TABLE `joyerias`
  ADD CONSTRAINT `joyerias_ibfk_1` FOREIGN KEY (`id_joya`) REFERENCES `tipo_joya` (`id_joya`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

