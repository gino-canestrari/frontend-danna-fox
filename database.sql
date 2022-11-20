-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-11-2022 a las 23:02:43
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dannafox-test`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `campania`
--

CREATE TABLE `campania` (
  `id` int(11) NOT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `texto` varchar(160) COLLATE utf8_unicode_ci NOT NULL,
  `estado` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'CREADA',
  `cantidad_mensajes` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_inicio` date NOT NULL DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `campania_por_localidad`
--

CREATE TABLE `campania_por_localidad` (
  `campania_id` int(11) NOT NULL,
  `localidad_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `razon_social` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cuilcuit` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localidad`
--

CREATE TABLE `localidad` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `codigo_area` varchar(4) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefono`
--

CREATE TABLE `telefono` (
  `id` int(11) NOT NULL,
  `localidad_id` int(11) DEFAULT NULL,
  `nombre` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `numero` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `campania`
--
ALTER TABLE `campania`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_14663447DE734E51` (`cliente_id`);

--
-- Indices de la tabla `campania_por_localidad`
--
ALTER TABLE `campania_por_localidad`
  ADD PRIMARY KEY (`campania_id`,`localidad_id`),
  ADD KEY `IDX_3DD2EF31C6F69FB` (`campania_id`),
  ADD KEY `IDX_3DD2EF3167707C89` (`localidad_id`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_F41C9B256ED1D4FE` (`cuilcuit`);

--
-- Indices de la tabla `localidad`
--
ALTER TABLE `localidad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `telefono`
--
ALTER TABLE `telefono`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_C1E70A7F67707C89` (`localidad_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `campania`
--
ALTER TABLE `campania`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `localidad`
--
ALTER TABLE `localidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `telefono`
--
ALTER TABLE `telefono`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `campania`
--
ALTER TABLE `campania`
  ADD CONSTRAINT `FK_14663447DE734E51` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`);

--
-- Filtros para la tabla `campania_por_localidad`
--
ALTER TABLE `campania_por_localidad`
  ADD CONSTRAINT `FK_3DD2EF3167707C89` FOREIGN KEY (`localidad_id`) REFERENCES `localidad` (`id`),
  ADD CONSTRAINT `FK_3DD2EF31C6F69FB` FOREIGN KEY (`campania_id`) REFERENCES `campania` (`id`);

--
-- Filtros para la tabla `telefono`
--
ALTER TABLE `telefono`
  ADD CONSTRAINT `FK_C1E70A7F67707C89` FOREIGN KEY (`localidad_id`) REFERENCES `localidad` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
