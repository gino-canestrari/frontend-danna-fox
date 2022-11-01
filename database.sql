SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE `campania` (
  `id` int(11) NOT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `texto` varchar(160) COLLATE utf8_unicode_ci NOT NULL,
  `estado` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'CREADA',
  `cantidad_mensajes` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_inicio` date NOT NULL DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `campania_por_localidad` (
  `campania_id` int(11) NOT NULL,
  `localidad_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `razon_social` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cuilcuit` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `localidad` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `codigo_area` varchar(4) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `localidad` VALUES
(1, 'Campana', '3329'),
(2, 'Baradero', '3329'),
(3, 'Zarate', '3329');

CREATE TABLE `telefono` (
  `id` int(11) NOT NULL,
  `localidad_id` int(11) DEFAULT NULL,
  `numero` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


ALTER TABLE `campania`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_14663447DE734E51` (`cliente_id`);

ALTER TABLE `campania_por_localidad`
  ADD PRIMARY KEY (`campania_id`,`localidad_id`),
  ADD KEY `IDX_3DD2EF31C6F69FB` (`campania_id`),
  ADD KEY `IDX_3DD2EF3167707C89` (`localidad_id`);

ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_F41C9B256ED1D4FE` (`cuilcuit`);

ALTER TABLE `localidad`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `telefono`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_C1E70A7F67707C89` (`localidad_id`);

ALTER TABLE `localidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `campania`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `telefono`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `campania`
  ADD CONSTRAINT `FK_14663447DE734E51` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`);

ALTER TABLE `campania_por_localidad`
  ADD CONSTRAINT `FK_3DD2EF3167707C89` FOREIGN KEY (`localidad_id`) REFERENCES `localidad` (`id`),
  ADD CONSTRAINT `FK_3DD2EF31C6F69FB` FOREIGN KEY (`campania_id`) REFERENCES `campania` (`id`);

ALTER TABLE `telefono`
  ADD CONSTRAINT `FK_C1E70A7F67707C89` FOREIGN KEY (`localidad_id`) REFERENCES `localidad` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
