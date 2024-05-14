-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-05-2024 a las 23:09:55
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
-- Base de datos: `ja_barbershop`
--
CREATE DATABASE IF NOT EXISTS `ja_barbershop` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ja_barbershop`;

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
  `id_cita` varchar(8) NOT NULL,
  `peluquero` varchar(64) NOT NULL,
  `cliente` varchar(64) NOT NULL,
  `servicio` varchar(255) NOT NULL,
  `centro` varchar(255) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `Email` varchar(64) NOT NULL,
  `Telefono` int(9) NOT NULL,
  `Nombre` varchar(32) NOT NULL,
  `Apellidos` varchar(64) NOT NULL,
  `clave` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`Email`, `Telefono`, `Nombre`, `Apellidos`, `clave`) VALUES
('1', 1, '1', '1', '1'),
('cliente10@example.com', 888999666, 'Martín', 'Jiménez', 'contraseña10'),
('cliente1@example.com', 123456789, 'Juan', 'González', 'contraseña1'),
('cliente2@example.com', 987654321, 'María', 'López', 'contraseña2'),
('cliente3@example.com', 555666777, 'Pedro', 'Martínez', 'contraseña3'),
('cliente4@example.com', 333222111, 'Laura', 'Pérez', 'contraseña4'),
('cliente5@example.com', 444333222, 'Ana', 'Sánchez', 'contraseña5'),
('cliente6@example.com', 666777888, 'David', 'García', 'contraseña6'),
('cliente7@example.com', 999888777, 'Sofía', 'Fernández', 'contraseña7'),
('cliente8@example.com', 111222333, 'Carlos', 'Ruiz', 'contraseña8'),
('cliente9@example.com', 222111444, 'Elena', 'Díaz', 'contraseña9'),
('fran@php', 1, 'Fran', 'Php', 'php');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peluqueros`
--

CREATE TABLE `peluqueros` (
  `Email` varchar(64) NOT NULL,
  `NIF` varchar(9) NOT NULL,
  `Nombre` varchar(32) NOT NULL,
  `Apellidos` varchar(64) NOT NULL,
  `Telefono` int(9) NOT NULL,
  `clave` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `peluqueros`
--

INSERT INTO `peluqueros` (`Email`, `NIF`, `Nombre`, `Apellidos`, `Telefono`, `clave`) VALUES
('2', '2', '2', '2', 2, '2'),
('peluquero1@example.com', '12345678A', 'Antonio', 'García', 111222333, 'clave1'),
('peluquero2@example.com', '87654321B', 'María', 'López', 444555666, 'clave2'),
('peluquero3@example.com', '98765432C', 'Javier', 'Martínez', 777888999, 'clave3'),
('peluquero4@example.com', '54321678D', 'Sara', 'Pérez', 333444555, 'clave4'),
('peluquero5@example.com', '87654321E', 'David', 'Sánchez', 666777888, 'clave5'),
('peluquero6@example.com', '34567891F', 'Laura', 'García', 222333444, 'clave6');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `SKU` varchar(64) NOT NULL,
  `nombre` varchar(64) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `Precio` decimal(8,0) NOT NULL,
  `Stock` int(8) NOT NULL,
  `Imagenes` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`SKU`, `nombre`, `descripcion`, `Precio`, `Stock`, `Imagenes`) VALUES
('P001', 'Secador de Pelo Profesional', 'Potente secador de pelo para uso profesional.', 100, 20, 'secador.jpg'),
('P002', 'Plancha de Pelo Cerámica', 'Plancha de pelo con placas de cerámica para un alisado perfecto.', 80, 30, 'plancha.jpg'),
('P003', 'Tijeras de Corte Profesional', 'Tijeras de corte de alta calidad para peluquería.', 50, 15, 'tijeras.jpg'),
('P004', 'Cepillo Desenredante', 'Cepillo desenredante con cerdas suaves para cabello.', 20, 50, 'cepillo.jpg'),
('P005', 'Champú Hidratante', 'Champú hidratante para todo tipo de cabello.', 15, 40, 'champu.jpg'),
('P006', 'Acondicionador Reparador', 'Acondicionador reparador para cabellos dañados.', 18, 35, 'acondicionador.jpg'),
('P007', 'Mascarilla Capilar Nutritiva', 'Mascarilla capilar nutritiva para cabellos secos.', 25, 25, 'mascarilla.jpg'),
('P008', 'Gel de Peinado Extrafuerte', 'Gel de peinado extrafuerte para estilos duraderos.', 12, 30, 'gel.jpg'),
('P009', 'Espuma Modeladora Voluminizadora', 'Espuma modeladora voluminizadora para dar cuerpo al cabello.', 15, 25, 'espuma.jpg'),
('P010', 'Laca de Fijación Fuerte', 'Laca de fijación fuerte para mantener el peinado en su lugar.', 10, 40, 'laca.jpg'),
('P011', 'Cera Moldeadora Mate', 'Cera moldeadora mate para crear estilos definidos.', 18, 20, 'cera.jpg'),
('P012', 'Aceite Capilar Reparador', 'Aceite capilar reparador para puntas secas.', 30, 15, 'aceite.jpg'),
('P013', 'Tinte para Cabello Permanente', 'Tinte para cabello permanente en varios tonos.', 12, 50, 'tinte.jpg'),
('P014', 'Decolorante en Polvo', 'Decolorante en polvo para mechas y reflejos.', 20, 30, 'decolorante.jpg'),
('P015', 'Cape de Peluquería Profesional', 'Cape de peluquería profesional impermeable y resistente.', 25, 20, 'cape.jpg'),
('P016', 'Peine de Carbono Antiestático', 'Peine de carbono antiestático para evitar el encrespamiento.', 8, 60, 'peine.jpg'),
('P017', 'Rulos de Velcro para Rizar', 'Rulos de velcro para crear rizos naturales.', 10, 40, 'rulos.jpg'),
('P018', 'Pinzas de Peluquería Profesional', 'Pinzas de peluquería profesional para sujetar el cabello.', 5, 70, 'pinzas.jpg'),
('P019', 'Turbante de Microfibra para Secado', 'Turbante de microfibra para secar el cabello rápidamente.', 15, 30, 'turbante.jpg'),
('P020', 'Gorro de Mechas Reutilizable', 'Gorro de mechas reutilizable para realizar mechas de forma precisa.', 7, 50, 'gorro.jpg'),
('P021', 'Cepillo Térmico Redondo', 'Cepillo térmico redondo para crear volumen y ondas.', 22, 25, 'cepilloter.jpg'),
('P022', 'Maquinilla de Afeitar Profesional', 'Maquinilla de afeitar profesional para contornos precisos.', 50, 15, 'maquinilla.jpg'),
('P023', 'Navaja de Barbero Clásica', 'Navaja de barbero clásica para un afeitado tradicional.', 40, 20, 'navaja.jpg'),
('P024', 'Bálsamo After Shave', 'Bálsamo after shave para calmar la piel después del afeitado.', 18, 30, 'balsamo.jpg'),
('P025', 'Crema de Afeitar Hidratante', 'Crema de afeitar hidratante para un afeitado suave.', 15, 40, 'cremaafeitar.jpg'),
('P026', 'Brocha de Afeitar de Pelo de Tejón', 'Brocha de afeitar de pelo de tejón para una aplicación uniforme.', 35, 25, 'brocha.jpg'),
('P027', 'Gel de Afeitar Transparente', 'Gel de afeitar transparente para un afeitado preciso.', 12, 35, 'gelafeitar.jpg'),
('P028', 'Tónico Facial Refrescante', 'Tónico facial refrescante para revitalizar la piel.', 20, 30, 'tonico.jpg'),
('P029', 'Máscara Facial Purificante', 'Máscara facial purificante para limpiar los poros en profundidad.', 25, 25, 'mascara.jpg'),
('P030', 'Exfoliante Facial Suave', 'Exfoliante facial suave para eliminar células muertas.', 18, 35, 'exfoliante.jpg'),
('P031', 'Cepillo Limpiador Facial', 'Cepillo limpiador facial para una limpieza profunda.', 30, 20, 'cepillofacial.jpg'),
('P032', 'Aceite de Barba Hidratante', 'Aceite de barba hidratante para un cuidado óptimo.', 25, 25, 'aceitebarba.jpg'),
('P033', 'Bálsamo para Barba y Bigote', 'Bálsamo para barba y bigote para mantenerlos suaves.', 20, 30, 'balsamobarba.jpg'),
('P034', 'Peine de Barba de Madera', 'Peine de barba de madera para desenredar y dar forma.', 8, 50, 'peinebarba.jpg'),
('P035', 'Cera para Modelar Barba', 'Cera para modelar barba para estilos definidos.', 15, 35, 'cerabarba.jpg'),
('P036', 'Champú para Barba y Bigote', 'Champú para barba y bigote para una limpieza suave.', 12, 40, 'champubarba.jpg'),
('P037', 'Tijeras de Barbero Profesionales', 'Tijeras de barbero profesionales para recortar con precisión.', 40, 20, 'tijerasbarbero.jpg'),
('P038', 'Cape de Barbero con Estampado', 'Cape de barbero con estampado para un estilo único.', 30, 25, 'capebarbero.jpg'),
('P039', 'Afeitadora Eléctrica Recargable', 'Afeitadora eléctrica recargable para un afeitado rápido.', 70, 15, 'afeitadoraelectrica.jpg'),
('P040', 'Crema Hidratante para Manos', 'Crema hidratante para manos para suavizar la piel.', 15, 40, 'cremamanos.jpg'),
('P041', 'Cortaúñas de Acero Inoxidable', 'Cortaúñas de acero inoxidable para un corte preciso.', 10, 50, 'cortauñas.jpg'),
('P042', 'Lima de Uñas Profesional', 'Lima de uñas profesional para dar forma y suavizar.', 8, 60, 'lima.jpg'),
('P043', 'Mascarilla Hidratante para Manos', 'Mascarilla hidratante para manos para restaurar la piel seca.', 20, 30, 'mascarillamanos.jpg'),
('P044', 'Guantes de Látex Desechables', 'Guantes de látex desechables para proteger las manos.', 12, 40, 'guantes.jpg'),
('P045', 'Toallas Desechables de Papel', 'Toallas desechables de papel para limpiar y secar.', 10, 50, 'toallas.jpg'),
('P046', 'Gel Antibacterial para Manos', 'Gel antibacterial para manos para una limpieza rápida.', 8, 60, 'gelmanos.jpg'),
('P047', 'Espejo de Aumento con Luz LED', 'Espejo de aumento con luz LED para detalles precisos.', 35, 20, 'espejo.jpg'),
('P048', 'Cepillo de Cejas y Pestañas', 'Cepillo de cejas y pestañas para definir y separar.', 5, 70, 'cepillocejas.jpg'),
('P049', 'Cinta para Cabello de Satén', 'Cinta para cabello de satén para sujetar el cabello.', 3, 80, 'cinta.jpg'),
('P050', 'Vaporizador Facial Portátil', 'Vaporizador facial portátil para abrir los poros.', 40, 15, 'vaporizador.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `Nombre` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `duracion` time NOT NULL,
  `Precio` decimal(8,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`Nombre`, `descripcion`, `duracion`, `Precio`) VALUES
('Afeitado Clásico', 'Afeitado clásico con navaja de barbero y toallas calientes.', '00:45:00', 25),
('Corte de Cabello y Barba', 'Corte de cabello combinado con arreglo de barba.', '01:00:00', 35),
('Corte de Pelo para Hombres', 'Corte de pelo moderno y a la moda para hombres.', '00:30:00', 20),
('Corte de Pelo para Niños', 'Corte de pelo divertido y adecuado para niños.', '00:20:00', 15),
('Depilación Facial', 'Depilación de cejas, nariz y orejas.', '00:20:00', 15),
('Masaje Capilar', 'Masaje relajante para el cuero cabelludo.', '00:20:00', 20),
('Retoque de Barba', 'Retoque de barba para mantenerla en forma.', '00:30:00', 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_venta` varchar(64) NOT NULL,
  `SKU` varchar(64) NOT NULL,
  `centro` varchar(255) NOT NULL,
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
  ADD PRIMARY KEY (`id_cita`),
  ADD KEY `fk_citas_peluqueros` (`peluquero`),
  ADD KEY `fk_citas_clientes` (`cliente`),
  ADD KEY `fk_citas_servicios` (`servicio`),
  ADD KEY `fk_citas_centros` (`centro`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`Email`);

--
-- Indices de la tabla `peluqueros`
--
ALTER TABLE `peluqueros`
  ADD PRIMARY KEY (`Email`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`SKU`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`Nombre`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `fk_citas_centros` FOREIGN KEY (`centro`) REFERENCES `centros` (`nombre`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_citas_clientes` FOREIGN KEY (`cliente`) REFERENCES `clientes` (`Email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_citas_peluqueros` FOREIGN KEY (`peluquero`) REFERENCES `peluqueros` (`Email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_citas_servicios` FOREIGN KEY (`servicio`) REFERENCES `servicios` (`Nombre`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
