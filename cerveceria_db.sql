-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-09-2023 a las 16:51:59
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
-- Base de datos: `db_cerveceria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cervezas`
--

CREATE TABLE `cervezas` (
  `cerveza_id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `IBU` float NOT NULL,
  `%ALC` float NOT NULL,
  `estilo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cervezas`
--

INSERT INTO `cervezas` (`cerveza_id`, `nombre`, `IBU`, `%ALC`, `estilo_id`) VALUES
(1, 'Choco 03 Imperial Stout', 82, 7.9, 3),
(2, 'American Pale Ale', 35, 7.9, 5),
(3, 'Baguales Belgian Blonde Ale', 20, 5.5, 6),
(4, 'Golden Ale', 19, 5.2, 2),
(5, 'English Pale Ale', 35, 5.1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estilos`
--

CREATE TABLE `estilos` (
  `estilo_id` int(11) NOT NULL,
  `tipo de estilo` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estilos`
--

INSERT INTO `estilos` (`estilo_id`, `tipo de estilo`) VALUES
(1, 'IPA (India Pale Ale)'),
(2, 'Lager'),
(3, 'Stout'),
(4, 'Porter'),
(5, 'Sour Ale'),
(6, 'Belgian Ale'),
(7, 'Barleywine');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cervezas`
--
ALTER TABLE `cervezas`
  ADD PRIMARY KEY (`cerveza_id`),
  ADD KEY `estilo_id` (`estilo_id`);

--
-- Indices de la tabla `estilos`
--
ALTER TABLE `estilos`
  ADD PRIMARY KEY (`estilo_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cervezas`
--
ALTER TABLE `cervezas`
  MODIFY `cerveza_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `estilos`
--
ALTER TABLE `estilos`
  MODIFY `estilo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cervezas`
--
ALTER TABLE `cervezas`
  ADD CONSTRAINT `estilo_id` FOREIGN KEY (`estilo_id`) REFERENCES `estilos` (`estilo_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
