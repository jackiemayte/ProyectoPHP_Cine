-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Servidor: localhost:8889
-- Tiempo de generación: 16-01-2016 a las 23:10:40
-- Versión del servidor: 5.5.42
-- Versión de PHP: 5.6.10
-- @Maite_Echeverry

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `cine`
--
CREATE DATABASE IF NOT EXISTS `cine` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `cine`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

DROP TABLE IF EXISTS `administrador`;
CREATE TABLE IF NOT EXISTS `administrador` (
  `dni` varchar(9) DEFAULT NULL,
  `clave` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`dni`, `clave`) VALUES
('root', 'root'),
('maite', 'maite');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `butaca`
--

DROP TABLE IF EXISTS `butaca`;
CREATE TABLE IF NOT EXISTS `butaca` (
  `id_sala` int(11) NOT NULL,
  `fila` int(11) NOT NULL,
  `col` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `butaca`
--

INSERT INTO `butaca` (`id_sala`, `fila`, `col`) VALUES
(1, 1, 1),
(1, 1, 2),
(1, 1, 3),
(1, 1, 4),
(1, 1, 5),
(1, 2, 1),
(1, 2, 2),
(1, 2, 3),
(1, 2, 4),
(1, 2, 5),
(1, 3, 1),
(1, 3, 2),
(1, 3, 3),
(1, 3, 4),
(1, 3, 5),
(1, 4, 1),
(1, 4, 2),
(1, 4, 3),
(1, 4, 4),
(1, 4, 5),
(1, 5, 1),
(1, 5, 2),
(1, 5, 3),
(1, 5, 4),
(1, 5, 5),
(3, 1, 1),
(3, 1, 2),
(3, 1, 3),
(3, 1, 4),
(3, 1, 5),
(3, 1, 6),
(3, 1, 7),
(3, 1, 8),
(3, 2, 1),
(3, 2, 2),
(3, 2, 3),
(3, 2, 4),
(3, 2, 5),
(3, 2, 6),
(3, 2, 7),
(3, 2, 8),
(3, 3, 1),
(3, 3, 2),
(3, 3, 3),
(3, 3, 4),
(3, 3, 5),
(3, 3, 6),
(3, 3, 7),
(3, 3, 8),
(3, 4, 1),
(3, 4, 2),
(3, 4, 3),
(3, 4, 4),
(3, 4, 5),
(3, 4, 6),
(3, 4, 7),
(3, 4, 8),
(3, 5, 1),
(3, 5, 2),
(3, 5, 3),
(3, 5, 4),
(3, 5, 5),
(3, 5, 6),
(3, 5, 7),
(3, 5, 8),
(3, 6, 1),
(3, 6, 2),
(3, 6, 3),
(3, 6, 4),
(3, 6, 5),
(3, 6, 6),
(3, 6, 7),
(3, 6, 8),
(3, 7, 1),
(3, 7, 2),
(3, 7, 3),
(3, 7, 4),
(3, 7, 5),
(3, 7, 6),
(3, 7, 7),
(3, 7, 8),
(3, 8, 1),
(3, 8, 2),
(3, 8, 3),
(3, 8, 4),
(3, 8, 5),
(3, 8, 6),
(3, 8, 7),
(3, 8, 8),
(6, 1, 1),
(6, 1, 2),
(6, 1, 3),
(6, 1, 4),
(6, 1, 5),
(6, 1, 6),
(6, 1, 7),
(6, 2, 1),
(6, 2, 2),
(6, 2, 3),
(6, 2, 4),
(6, 2, 5),
(6, 2, 6),
(6, 2, 7),
(6, 3, 1),
(6, 3, 2),
(6, 3, 3),
(6, 3, 4),
(6, 3, 5),
(6, 3, 6),
(6, 3, 7),
(6, 4, 1),
(6, 4, 2),
(6, 4, 3),
(6, 4, 4),
(6, 4, 5),
(6, 4, 6),
(6, 4, 7),
(6, 5, 1),
(6, 5, 2),
(6, 5, 3),
(6, 5, 4),
(6, 5, 5),
(6, 5, 6),
(6, 5, 7),
(6, 6, 1),
(6, 6, 2),
(6, 6, 3),
(6, 6, 4),
(6, 6, 5),
(6, 6, 6),
(6, 6, 7),
(6, 7, 1),
(6, 7, 2),
(6, 7, 3),
(6, 7, 4),
(6, 7, 5),
(6, 7, 6),
(6, 7, 7),
(8, 1, 1),
(8, 1, 2),
(8, 1, 3),
(8, 1, 4),
(8, 1, 5),
(8, 1, 6),
(8, 2, 1),
(8, 2, 2),
(8, 2, 3),
(8, 2, 4),
(8, 2, 5),
(8, 2, 6),
(8, 3, 1),
(8, 3, 2),
(8, 3, 3),
(8, 3, 4),
(8, 3, 5),
(8, 3, 6),
(8, 4, 1),
(8, 4, 2),
(8, 4, 3),
(8, 4, 4),
(8, 4, 5),
(8, 4, 6),
(8, 5, 1),
(8, 5, 2),
(8, 5, 3),
(8, 5, 4),
(8, 5, 5),
(8, 5, 6),
(8, 6, 1),
(8, 6, 2),
(8, 6, 3),
(8, 6, 4),
(8, 6, 5),
(8, 6, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `dni` char(9) NOT NULL,
  `numTarjeta` bigint(16) NOT NULL,
  `clave` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nombre`, `apellido`, `dni`, `numTarjeta`, `clave`) VALUES
(20, 'Maite', 'Echeverry', '70971870B', 4309866108828397, 'maite'),
(21, 'Matilde', 'Garcia', '11965401L', 4432925810890531, 'mati'),
(22, 'Carmen', 'Montenegro', '11965401M', 4589994145444563, 'carmen');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrada`
--

DROP TABLE IF EXISTS `entrada`;
CREATE TABLE IF NOT EXISTS `entrada` (
  `id_cliente` int(11) NOT NULL,
  `id_pelicula` int(11) NOT NULL,
  `id_sala` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `fila` int(11) NOT NULL,
  `col` int(11) NOT NULL,
  `n_entradas` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `entrada`
--

INSERT INTO `entrada` (`id_cliente`, `id_pelicula`, `id_sala`, `fecha`, `hora`, `fila`, `col`, `n_entradas`, `total`) VALUES
(20, 5, 1, '2016-01-19', '16:00:00', 2, 1, 2, 12),
(20, 5, 1, '2016-01-19', '16:00:00', 2, 2, 2, 12),
(20, 5, 1, '2016-01-19', '16:00:00', 3, 2, 2, 12),
(20, 5, 1, '2016-01-19', '16:00:00', 3, 3, 2, 12),
(20, 5, 1, '2016-01-19', '16:00:00', 4, 2, 4, 24),
(20, 5, 1, '2016-01-19', '16:00:00', 4, 3, 4, 24),
(20, 5, 1, '2016-01-19', '16:00:00', 4, 4, 4, 24),
(20, 5, 1, '2016-01-19', '16:00:00', 4, 5, 4, 24),
(20, 6, 3, '2016-01-22', '21:00:00', 1, 3, 3, 36),
(20, 6, 3, '2016-01-22', '21:00:00', 1, 4, 3, 36),
(20, 6, 3, '2016-01-22', '21:00:00', 1, 5, 3, 36),
(20, 6, 3, '2016-01-22', '23:00:00', 4, 4, 2, 24),
(20, 6, 3, '2016-01-22', '23:00:00', 4, 5, 2, 24),
(20, 8, 8, '2016-01-25', '16:00:00', 5, 3, 2, 12),
(20, 8, 8, '2016-01-25', '16:00:00', 5, 4, 2, 12),
(20, 8, 8, '2016-01-25', '16:00:00', 6, 5, 2, 12),
(20, 8, 8, '2016-01-25', '16:00:00', 6, 6, 2, 12),
(20, 9, 6, '2016-01-22', '20:00:00', 1, 6, 2, 8),
(20, 9, 6, '2016-01-22', '20:00:00', 1, 7, 2, 8),
(20, 9, 6, '2016-01-22', '20:00:00', 2, 1, 2, 8),
(20, 9, 6, '2016-01-22', '20:00:00', 2, 2, 2, 8),
(20, 9, 6, '2016-01-22', '20:00:00', 3, 1, 2, 8),
(20, 9, 6, '2016-01-22', '20:00:00', 3, 2, 2, 8),
(20, 9, 6, '2016-01-22', '20:00:00', 4, 3, 2, 8),
(20, 9, 6, '2016-01-22', '20:00:00', 4, 4, 2, 8),
(20, 9, 6, '2016-01-22', '20:00:00', 4, 7, 3, 12),
(20, 16, 3, '2016-01-21', '20:00:00', 1, 7, 2, 24),
(20, 16, 3, '2016-01-21', '20:00:00', 1, 8, 2, 24),
(20, 16, 3, '2016-01-21', '20:00:00', 7, 7, 2, 24),
(20, 16, 3, '2016-01-21', '20:00:00', 7, 8, 2, 24),
(20, 16, 3, '2016-01-21', '20:00:00', 8, 7, 2, 24),
(20, 16, 3, '2016-01-21', '20:00:00', 8, 8, 2, 24),
(20, 16, 3, '2016-01-21', '22:00:00', 3, 7, 2, 24),
(20, 16, 3, '2016-01-21', '22:00:00', 3, 8, 2, 24),
(20, 16, 3, '2016-01-21', '22:00:00', 8, 1, 1, 12),
(20, 18, 3, '2016-01-19', '19:00:00', 3, 3, 3, 36),
(20, 18, 3, '2016-01-19', '19:00:00', 3, 4, 3, 36),
(20, 18, 3, '2016-01-19', '19:00:00', 3, 5, 3, 36),
(20, 18, 3, '2016-01-19', '19:00:00', 4, 2, 4, 48),
(20, 18, 3, '2016-01-19', '19:00:00', 4, 3, 4, 48),
(20, 18, 3, '2016-01-19', '19:00:00', 4, 4, 4, 48),
(20, 18, 3, '2016-01-19', '19:00:00', 4, 5, 4, 48),
(21, 5, 1, '2016-01-19', '16:00:00', 1, 1, 5, 30),
(21, 5, 1, '2016-01-19', '16:00:00', 1, 2, 5, 30),
(21, 5, 1, '2016-01-19', '16:00:00', 1, 3, 5, 30),
(21, 5, 1, '2016-01-19', '16:00:00', 1, 4, 5, 30),
(21, 5, 1, '2016-01-19', '16:00:00', 1, 5, 5, 30),
(21, 5, 1, '2016-01-19', '16:00:00', 5, 2, 3, 18),
(21, 5, 1, '2016-01-19', '16:00:00', 5, 3, 3, 18),
(21, 5, 1, '2016-01-19', '16:00:00', 5, 4, 3, 18),
(21, 6, 6, '2016-01-22', '23:00:00', 4, 3, 2, 16),
(21, 6, 6, '2016-01-22', '23:00:00', 4, 4, 2, 16),
(21, 6, 6, '2016-01-22', '23:00:00', 5, 3, 3, 24),
(21, 6, 6, '2016-01-22', '23:00:00', 5, 4, 3, 24),
(21, 6, 6, '2016-01-22', '23:00:00', 5, 5, 3, 24),
(21, 8, 8, '2016-01-25', '16:00:00', 1, 5, 2, 12),
(21, 8, 8, '2016-01-25', '16:00:00', 1, 6, 2, 12),
(21, 16, 3, '2016-01-21', '20:00:00', 5, 3, 2, 24),
(21, 16, 3, '2016-01-21', '20:00:00', 5, 4, 2, 24),
(22, 6, 3, '2016-01-22', '21:00:00', 5, 3, 2, 24),
(22, 6, 3, '2016-01-22', '21:00:00', 5, 4, 2, 24),
(22, 6, 6, '2016-01-22', '23:00:00', 3, 3, 2, 16),
(22, 6, 6, '2016-01-22', '23:00:00', 3, 4, 2, 16),
(22, 6, 6, '2016-01-22', '23:00:00', 5, 3, 3, 24),
(22, 6, 6, '2016-01-22', '23:00:00', 5, 4, 3, 24),
(22, 6, 6, '2016-01-22', '23:00:00', 5, 5, 3, 24),
(22, 8, 8, '2016-01-25', '16:00:00', 3, 1, 3, 18),
(22, 8, 8, '2016-01-25', '16:00:00', 3, 2, 3, 18),
(22, 8, 8, '2016-01-25', '16:00:00', 3, 3, 3, 18),
(22, 9, 6, '2016-01-22', '20:00:00', 2, 5, 1, 8),
(22, 9, 6, '2016-01-22', '20:00:00', 6, 4, 4, 16),
(22, 9, 6, '2016-01-22', '20:00:00', 6, 5, 4, 16),
(22, 9, 6, '2016-01-22', '20:00:00', 6, 6, 4, 16),
(22, 9, 6, '2016-01-22', '20:00:00', 6, 7, 4, 16),
(22, 16, 3, '2016-01-21', '20:00:00', 4, 4, 4, 48),
(22, 16, 3, '2016-01-21', '20:00:00', 5, 3, 4, 48),
(22, 16, 3, '2016-01-21', '20:00:00', 5, 4, 4, 48),
(22, 16, 3, '2016-01-21', '20:00:00', 5, 5, 4, 48);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pelicula`
--

DROP TABLE IF EXISTS `pelicula`;
CREATE TABLE IF NOT EXISTS `pelicula` (
  `id_pelicula` int(11) NOT NULL,
  `titulo` varchar(25) NOT NULL,
  `director` varchar(20) NOT NULL,
  `duracion` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pelicula`
--

INSERT INTO `pelicula` (`id_pelicula`, `titulo`, `director`, `duracion`) VALUES
(3, 'El Puente de los Espias', 'Steven Spielberg', 127),
(4, 'Un paseo por el bosque', 'Ken Kwapis', 127),
(5, 'Krampus - Maldita Navidad', 'Michael Dougherty', 127),
(6, 'Techo y comida', 'Juan Miguel Del Cast', 127),
(7, 'El Viaje de Arlo', 'Peter Sohn', 127),
(8, 'Ocho Apellidos Catalanes', 'Emilio MartÃ­nez LÃ¡', 127),
(9, 'Sicario', 'Dennis Villeneuve', 127),
(11, 'Spectre', 'Sam Mendes', 127),
(12, 'La Novia', 'Director:  Paula Ort', 127),
(13, 'El Becario', 'Nancy Meyers', 127),
(14, 'Hotel Transilvania 2', 'Genndy Tartakovsky', 99),
(15, 'Marte (The Martian)', 'Ridley Scott', 120),
(16, 'Los Juegos del Hambre', 'Lawrence', 127),
(17, 'Elysium', 'Neil Blomkamp', 126),
(18, 'Star Wars', 'George Lucas', 127);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `precio`
--

DROP TABLE IF EXISTS `precio`;
CREATE TABLE IF NOT EXISTS `precio` (
  `id_precio` int(11) NOT NULL,
  `tipo_precio` varchar(15) NOT NULL,
  `precio` decimal(10,0) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `precio`
--

INSERT INTO `precio` (`id_precio`, `tipo_precio`, `precio`) VALUES
(1, 'Reducido', '4'),
(2, 'Normal', '6'),
(3, '3D', '8'),
(4, 'PREMIUN', '12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sala`
--

DROP TABLE IF EXISTS `sala`;
CREATE TABLE IF NOT EXISTS `sala` (
  `id_sala` int(11) NOT NULL,
  `nom_sala` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sala`
--

INSERT INTO `sala` (`id_sala`, `nom_sala`) VALUES
(1, 'sala 1'),
(3, 'sala premiun'),
(6, 'sala 3D'),
(8, 'sala 2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesion`
--

DROP TABLE IF EXISTS `sesion`;
CREATE TABLE IF NOT EXISTS `sesion` (
  `id_pelicula` int(11) NOT NULL,
  `id_sala` int(11) NOT NULL,
  `fecha` date NOT NULL DEFAULT '0000-00-00',
  `hora` time NOT NULL DEFAULT '00:00:00',
  `id_precio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sesion`
--

INSERT INTO `sesion` (`id_pelicula`, `id_sala`, `fecha`, `hora`, `id_precio`) VALUES
(5, 1, '2016-01-19', '16:00:00', 2),
(8, 8, '2016-01-25', '16:00:00', 2),
(8, 8, '2016-01-25', '19:00:00', 2),
(6, 6, '2016-01-22', '23:00:00', 3),
(9, 6, '2016-01-22', '20:00:00', 3),
(6, 3, '2016-01-22', '21:00:00', 4),
(6, 3, '2016-01-22', '23:00:00', 4),
(16, 3, '2016-01-21', '20:00:00', 4),
(16, 3, '2016-01-21', '22:00:00', 4),
(18, 3, '2016-01-19', '19:00:00', 4);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `butaca`
--
ALTER TABLE `butaca`
  ADD PRIMARY KEY (`id_sala`,`fila`,`col`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`),
  ADD UNIQUE KEY `dni` (`dni`),
  ADD UNIQUE KEY `numTarjeta` (`numTarjeta`);

--
-- Indices de la tabla `entrada`
--
ALTER TABLE `entrada`
  ADD PRIMARY KEY (`id_cliente`,`id_pelicula`,`id_sala`,`fecha`,`hora`,`fila`,`col`),
  ADD KEY `fk_butaca` (`id_sala`,`fila`,`col`),
  ADD KEY `fk_sesion` (`id_pelicula`,`id_sala`,`fecha`,`hora`);

--
-- Indices de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  ADD PRIMARY KEY (`id_pelicula`);

--
-- Indices de la tabla `precio`
--
ALTER TABLE `precio`
  ADD PRIMARY KEY (`id_precio`);

--
-- Indices de la tabla `sala`
--
ALTER TABLE `sala`
  ADD PRIMARY KEY (`id_sala`);

--
-- Indices de la tabla `sesion`
--
ALTER TABLE `sesion`
  ADD PRIMARY KEY (`id_pelicula`,`id_sala`,`fecha`,`hora`),
  ADD KEY `fk_ssala` (`id_sala`),
  ADD KEY `id_precio` (`id_precio`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  MODIFY `id_pelicula` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `precio`
--
ALTER TABLE `precio`
  MODIFY `id_precio` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `sala`
--
ALTER TABLE `sala`
  MODIFY `id_sala` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `butaca`
--
ALTER TABLE `butaca`
  ADD CONSTRAINT `fk_sala` FOREIGN KEY (`id_sala`) REFERENCES `sala` (`id_sala`);

--
-- Filtros para la tabla `entrada`
--
ALTER TABLE `entrada`
  ADD CONSTRAINT `fk_butaca` FOREIGN KEY (`id_sala`, `fila`, `col`) REFERENCES `butaca` (`id_sala`, `fila`, `col`),
  ADD CONSTRAINT `fk_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`),
  ADD CONSTRAINT `fk_sesion` FOREIGN KEY (`id_pelicula`, `id_sala`, `fecha`, `hora`) REFERENCES `sesion` (`id_pelicula`, `id_sala`, `fecha`, `hora`);

--
-- Filtros para la tabla `sesion`
--
ALTER TABLE `sesion`
  ADD CONSTRAINT `fk_pelicula` FOREIGN KEY (`id_pelicula`) REFERENCES `pelicula` (`id_pelicula`),
  ADD CONSTRAINT `fk_precio` FOREIGN KEY (`id_precio`) REFERENCES `precio` (`id_precio`),
  ADD CONSTRAINT `fk_ssala` FOREIGN KEY (`id_sala`) REFERENCES `sala` (`id_sala`);
