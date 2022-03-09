-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-03-2022 a las 01:10:17
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_agencia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrada`
--

CREATE TABLE `entrada` (
  `id_entrada` int(11) NOT NULL,
  `fecha_venta` date NOT NULL,
  `vip` tinyint(1) NOT NULL,
  `id_funcion` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_swedish_ci;

--
-- Volcado de datos para la tabla `entrada`
--

INSERT INTO `entrada` (`id_entrada`, `fecha_venta`, `vip`, `id_funcion`, `id_rol`, `id_user`) VALUES
(8, '2022-02-27', 1, 1, 2, 3),
(9, '2022-02-27', 2, 1, 2, 3),
(10, '2022-03-09', 1, 1, 2, 2),
(11, '2022-03-09', 1, 1, 2, 2),
(12, '2022-03-09', 1, 1, 2, 2),
(13, '2022-03-09', 1, 1, 2, 2),
(14, '2022-03-09', 1, 1, 2, 3),
(15, '2022-03-09', 1, 2, 2, 1),
(16, '2022-03-09', 1, 2, 2, 3),
(17, '2022-03-09', 1, 1, 2, 2),
(18, '2022-03-09', 1, 1, 2, 3),
(19, '2022-03-09', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE `evento` (
  `id_evento` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf32_swedish_ci NOT NULL,
  `descripcion` varchar(50) COLLATE utf32_swedish_ci NOT NULL,
  `ciudad` varchar(50) COLLATE utf32_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_swedish_ci;

--
-- Volcado de datos para la tabla `evento`
--

INSERT INTO `evento` (`id_evento`, `nombre`, `descripcion`, `ciudad`) VALUES
(1, 'HDS', 'Heroes del Silencio', 'Mexico'),
(2, 'EB', 'Enrique Bunbury', 'Madrid'),
(3, 'Los Redondos', 'Banda de Rock Argentino', 'Olavarría'),
(4, 'Ciro y los persas', 'Rock nacional', 'Tandil'),
(5, 'Virus', 'Banda rock 80', 'Azul'),
(6, 'Virus-test', 'Virus-test', 'Olv-tes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funcion`
--

CREATE TABLE `funcion` (
  `id_funcion` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `capacidad_maxima` int(11) NOT NULL,
  `id_evento_fk` int(11) NOT NULL,
  `atp` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_swedish_ci;

--
-- Volcado de datos para la tabla `funcion`
--

INSERT INTO `funcion` (`id_funcion`, `fecha`, `capacidad_maxima`, `id_evento_fk`, `atp`) VALUES
(1, '2022-04-01', 500, 4, 1),
(2, '2022-04-30', 250, 3, 0),
(3, '2022-04-30', 250, 2, 1),
(4, '2022-04-30', 500, 1, 1),
(5, '2022-05-13', 500, 5, 0),
(6, '2022-05-13', 250, 6, 1),
(7, '2022-05-13', 250, 4, 1),
(8, '2022-05-28', 250, 1, 1),
(9, '2020-02-06', 250, 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `rol` varchar(255) CHARACTER SET utf32 COLLATE utf32_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_swedish_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `rol`) VALUES
(1, 'administrador'),
(2, 'userBasic');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_user` int(11) NOT NULL,
  `email` varchar(200) COLLATE utf32_swedish_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf32 COLLATE utf32_spanish2_ci NOT NULL,
  `id_rol_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_swedish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_user`, `email`, `password`, `id_rol_fk`) VALUES
(1, 'admin@tudai', '$2y$10$yGZY7pr42LJuudV4g9rSZ.LIeXSRDciBzKoryb5v6qbvUp1y/FiPy', 1),
(2, 'user@tudai', '$2y$10$IZogEvDes.O2Nt2VdWyxeO1/mC5ePbl9nIatF1tc2jm44METIc4Fe', 2),
(3, 'pepe@tudai', '$2y$10$61kWBqZESRlIWq554HuwkuzA7DBjpzhcAmhxi1v/eDiqRjRbkpQS.', 2),
(4, 'seba@tudai', '$2y$10$YR2ey3LCYvakKSsmX4kFaeqLW/11P/uDtBWe0tQD2wvFx0Lh.sdjy', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `entrada`
--
ALTER TABLE `entrada`
  ADD PRIMARY KEY (`id_entrada`),
  ADD KEY `id_rol` (`id_rol`),
  ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`id_evento`);

--
-- Indices de la tabla `funcion`
--
ALTER TABLE `funcion`
  ADD PRIMARY KEY (`id_funcion`),
  ADD KEY `id_evento` (`id_evento_fk`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_rol_fk` (`id_rol_fk`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `entrada`
--
ALTER TABLE `entrada`
  MODIFY `id_entrada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `evento`
--
ALTER TABLE `evento`
  MODIFY `id_evento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `funcion`
--
ALTER TABLE `funcion`
  MODIFY `id_funcion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `funcion`
--
ALTER TABLE `funcion`
  ADD CONSTRAINT `funcion_ibfk_1` FOREIGN KEY (`id_evento_fk`) REFERENCES `evento` (`id_evento`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
