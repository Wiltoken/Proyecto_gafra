-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 13-06-2024 a las 06:25:36
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
-- Base de datos: `gafra`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gafra_insumos`
--

CREATE TABLE `gafra_insumos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gafra_inventario_logs`
--

CREATE TABLE `gafra_inventario_logs` (
  `id` int(11) NOT NULL,
  `id_insumo` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `fecha_modificacion` date DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gafra_multimedia`
--

CREATE TABLE `gafra_multimedia` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `contenido` longblob DEFAULT NULL,
  `fecha_subida` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gafra_productos`
--

CREATE TABLE `gafra_productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario_insumos`
--

CREATE TABLE `inventario_insumos` (
  `id` int(11) NOT NULL,
  `insumo` varchar(100) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_proveedor` int(11) DEFAULT NULL,
  `fecha_modificacion` date DEFAULT NULL,
  `id_insumo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Disparadores `inventario_insumos`
--
DELIMITER $$
CREATE TRIGGER `after_inventario_insumos_update` AFTER UPDATE ON `inventario_insumos` FOR EACH ROW BEGIN
    INSERT INTO gafra_inventario_logs (id_insumo, cantidad, fecha_modificacion, id_usuario)
    VALUES (NEW.id_insumo, NEW.cantidad, NOW(), NEW.id_usuario);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario_producido`
--

CREATE TABLE `inventario_producido` (
  `id` int(11) NOT NULL,
  `producto` varchar(100) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `fecha_produccion` date DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Disparadores `inventario_producido`
--
DELIMITER $$
CREATE TRIGGER `before_inventario_producido_insert` BEFORE INSERT ON `inventario_producido` FOR EACH ROW BEGIN
    IF NEW.fecha_produccion IS NULL THEN
        SET NEW.fecha_produccion = NOW();
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes`
--

CREATE TABLE `solicitudes` (
  `id` int(11) NOT NULL,
  `insumo` varchar(100) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `fecha_solicitud` date DEFAULT NULL,
  `aprobada` tinyint(1) DEFAULT 0,
  `id_usuario` int(11) DEFAULT NULL,
  `id_insumo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Disparadores `solicitudes`
--
DELIMITER $$
CREATE TRIGGER `before_solicitudes_insert` BEFORE INSERT ON `solicitudes` FOR EACH ROW BEGIN
    SET NEW.fecha_solicitud = NOW();
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `clave_acceso` varchar(255) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `tipo_usuario` enum('administrador','operario_corte','operario_ensamble','operario_tuberia','operario_satelite') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `correo`, `clave_acceso`, `telefono`, `tipo_usuario`) VALUES
(1, 'Camilo', 'garcia', 'julian@gmail.com', '$2y$10$jTjCHHXNbIhKIcQV3wV6aO3fLUN4YsIYGDHfVukahdmbuNJhV3KQm', '555555', 'administrador'),
(3, 'Nicolas', 'Pineda', 'Pineda@gmail.com', '$2y$10$DOCtLAffqdU/6BqOSdj2UutTE3RfNbaM0Asp7snBUG5Doq3XyFT3W', '11254365', 'operario_ensamble'),
(4, 'Alvaro', 'Garzon', 'Pinzon@gmail.com', '$2y$10$uXcFYrHDzE5wpOKWJooTZeYIVj4I7cNKa5Bb4MQEWIW8bIPVOmKKG', '988928422', 'administrador');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `gafra_insumos`
--
ALTER TABLE `gafra_insumos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `gafra_inventario_logs`
--
ALTER TABLE `gafra_inventario_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_insumo` (`id_insumo`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `gafra_multimedia`
--
ALTER TABLE `gafra_multimedia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `gafra_productos`
--
ALTER TABLE `gafra_productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inventario_insumos`
--
ALTER TABLE `inventario_insumos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_proveedor` (`id_proveedor`),
  ADD KEY `id_insumo` (`id_insumo`);

--
-- Indices de la tabla `inventario_producido`
--
ALTER TABLE `inventario_producido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- Indices de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_insumo` (`id_insumo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo` (`correo`),
  ADD UNIQUE KEY `correo_2` (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `gafra_insumos`
--
ALTER TABLE `gafra_insumos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `gafra_inventario_logs`
--
ALTER TABLE `gafra_inventario_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `gafra_multimedia`
--
ALTER TABLE `gafra_multimedia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `gafra_productos`
--
ALTER TABLE `gafra_productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inventario_insumos`
--
ALTER TABLE `inventario_insumos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inventario_producido`
--
ALTER TABLE `inventario_producido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `gafra_inventario_logs`
--
ALTER TABLE `gafra_inventario_logs`
  ADD CONSTRAINT `gafra_inventario_logs_ibfk_1` FOREIGN KEY (`id_insumo`) REFERENCES `gafra_insumos` (`id`),
  ADD CONSTRAINT `gafra_inventario_logs_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `gafra_multimedia`
--
ALTER TABLE `gafra_multimedia`
  ADD CONSTRAINT `gafra_multimedia_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `inventario_insumos`
--
ALTER TABLE `inventario_insumos`
  ADD CONSTRAINT `inventario_insumos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `inventario_insumos_ibfk_2` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedores` (`id`),
  ADD CONSTRAINT `inventario_insumos_ibfk_3` FOREIGN KEY (`id_insumo`) REFERENCES `gafra_insumos` (`id`),
  ADD CONSTRAINT `inventario_insumos_ibfk_4` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `inventario_insumos_ibfk_5` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedores` (`id`);

--
-- Filtros para la tabla `inventario_producido`
--
ALTER TABLE `inventario_producido`
  ADD CONSTRAINT `inventario_producido_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `inventario_producido_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `gafra_productos` (`id`),
  ADD CONSTRAINT `inventario_producido_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD CONSTRAINT `solicitudes_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `solicitudes_ibfk_2` FOREIGN KEY (`id_insumo`) REFERENCES `gafra_insumos` (`id`),
  ADD CONSTRAINT `solicitudes_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
