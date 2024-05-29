-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-05-2024 a las 23:01:19
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
-- Base de datos: `ja_barbershop2`
--
CREATE DATABASE IF NOT EXISTS `ja_barbershop2` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ja_barbershop2`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `centros`
--

CREATE TABLE `centros` (
  `nombre` varchar(255) NOT NULL,
  `ubicacion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `centros`
--

INSERT INTO `centros` (`nombre`, `ubicacion`) VALUES
('BarberShop_ElRaal', 'C. San Antonio, 303, 30139 Murcia'),
('BarberShop_VistaAlegre', 'Vista Alegre, Pl. Pintor Inocencio Medina Vera, 8, 30007 Murcia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id` int(11) NOT NULL,
  `peluquero` varchar(64) NOT NULL,
  `cliente` varchar(64) NOT NULL,
  `servicio` int(11) NOT NULL,
  `centro` varchar(64) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `email` varchar(64) NOT NULL,
  `clave` varchar(32) NOT NULL,
  `nombre` varchar(32) NOT NULL,
  `apellidos` varchar(64) NOT NULL,
  `telefono` int(9) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`email`, `clave`, `nombre`, `apellidos`, `telefono`, `foto`) VALUES
('2', '2', '2', '2', 2, '2'),
('acifuentes@ucam.edu', 'cifu32', 'Alejandro', 'Cifuentes Rueda', 616777222, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peluqueros`
--

CREATE TABLE `peluqueros` (
  `nif` varchar(9) NOT NULL,
  `email` varchar(64) NOT NULL,
  `clave` varchar(32) NOT NULL,
  `nombre` varchar(32) NOT NULL,
  `apellidos` varchar(64) NOT NULL,
  `telefono` int(9) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `centro_peluquero` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `peluqueros`
--

INSERT INTO `peluqueros` (`nif`, `email`, `clave`, `nombre`, `apellidos`, `telefono`, `foto`, `centro_peluquero`) VALUES
('1', '1', '1', '1', '1', 1, '1', 'BarberShop_VistaAlegre'),
('089754942', 'peligros@ucam.es', '1234', 'Peligros del Rosario', 'Martinez Lopez', 555555555, 'peligros.jpg', 'BarberShop_ElRaal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(64) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `precio` decimal(8,2) NOT NULL,
  `stock` int(8) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `sku` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `duracion` time NOT NULL,
  `precio` decimal(8,2) NOT NULL,
  `imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id`, `nombre`, `descripcion`, `duracion`, `precio`, `imagen`) VALUES
(1, 'Afeitado Clasico', 'Afeitado clasico con navaja de barbero y toallas calientes.', '00:45:00', 8.00, 'AfeitadoClasico.jpg'),
(2, 'Corte de Pelo para Niños', 'Corte de pelo divertido y adecuado para niños.', '00:15:00', 8.00, 'CorteNinio.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_centro` int(11) NOT NULL,
  `cantidad` int(8) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `centros`
--
ALTER TABLE `centros`
  ADD PRIMARY KEY (`nombre`);

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_citas_peluqueros` (`peluquero`),
  ADD KEY `fk_citas_clientes` (`cliente`),
  ADD KEY `fk_citas_servicios` (`servicio`),
  ADD KEY `fk_citas_centros` (`centro`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `peluqueros`
--
ALTER TABLE `peluqueros`
  ADD PRIMARY KEY (`email`),
  ADD KEY `fk_peluqueros_centros` (`centro_peluquero`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ventas_productos` (`id_producto`),
  ADD KEY `fk_ventas_centros` (`id_centro`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `fk_citas_centros` FOREIGN KEY (`centro`) REFERENCES `centros` (`nombre`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_citas_clientes` FOREIGN KEY (`cliente`) REFERENCES `clientes` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_citas_peluqueros` FOREIGN KEY (`peluquero`) REFERENCES `peluqueros` (`email`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_citas_servicios` FOREIGN KEY (`servicio`) REFERENCES `servicios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `peluqueros`
--
ALTER TABLE `peluqueros`
  ADD CONSTRAINT `fk_peluqueros_centros` FOREIGN KEY (`centro_peluquero`) REFERENCES `centros` (`nombre`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `fk_ventas_centros` FOREIGN KEY (`id_centro`) REFERENCES `centros` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_ventas_productos` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
