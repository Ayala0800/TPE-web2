-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-09-2023 a las 17:42:13
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
-- Base de datos: `cerveceria_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cervezas`
--

CREATE TABLE `cervezas` (
  `Cerveza_ID` int(11) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `IBU` float NOT NULL,
  `%ALC` float NOT NULL,
  `Precio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cervezas`
--

INSERT INTO `cervezas` (`Cerveza_ID`, `Nombre`, `IBU`, `%ALC`, `Precio`) VALUES
(1000123, 'Choco 03 Imperial Stout', 82, 7.9, 899),
(1000124, 'American Pale Ale', 35, 7.9, 899),
(1000125, 'Baguales Belgian Blonde Ale', 20, 5.5, 855),
(1000126, 'Golden Ale', 19, 5.2, 850),
(1000127, 'English Pale Ale', 35, 5.1, 990);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `Cliente_ID` int(11) NOT NULL,
  `Nombre y Apellido` varchar(45) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Telefono` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`Cliente_ID`, `Nombre y Apellido`, `Email`, `Telefono`) VALUES
(2000123, 'Lucas Ayala', 'lucasayala@gmail.com', 1231214),
(2000124, 'María Rodriguez', 'mariarodriguez@gmail.com', 789445),
(2000125, 'Diego Lopez', 'diego10@gmail.com', 9822417),
(2000126, 'Luciana Garcia', 'lugarcia@gmail.com', 2336491),
(2000127, 'Martin Palermo', 'titan12@gmail.com', 20062007);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `Pedido_ID` int(11) NOT NULL,
  `Cliente_ID` int(11) NOT NULL,
  `Cerveza_ID` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Precio Total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`Pedido_ID`, `Cliente_ID`, `Cerveza_ID`, `Fecha`, `Cantidad`, `Precio Total`) VALUES
(3000123, 2000123, 1000123, '2023-09-22', 12, 10800),
(3000124, 2000124, 1000124, '2023-09-20', 2, 2000),
(3000125, 2000125, 1000125, '2023-09-19', 6, 5600),
(3000126, 2000126, 1000126, '2023-09-24', 9, 8600),
(3000127, 2000127, 1000127, '2023-09-20', 24, 21500);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cervezas`
--
ALTER TABLE `cervezas`
  ADD PRIMARY KEY (`Cerveza_ID`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`Cliente_ID`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`Pedido_ID`),
  ADD KEY `FK_pedido_clientes` (`Cliente_ID`),
  ADD KEY `FK_pedido_cerveza` (`Cerveza_ID`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `FK_pedido_cerveza` FOREIGN KEY (`Cerveza_ID`) REFERENCES `cervezas` (`Cerveza_ID`),
  ADD CONSTRAINT `FK_pedido_clientes` FOREIGN KEY (`Cliente_ID`) REFERENCES `clientes` (`Cliente_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
