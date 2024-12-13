-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-12-2024 a las 16:08:01
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pizzeria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito_compra`
--

CREATE TABLE `carrito_compra` (
  `ID` int(11) NOT NULL,
  `PedidoID` int(11) NOT NULL,
  `ProductoID` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `precioVenta` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Apellido` varchar(100) NOT NULL,
  `DNI` varchar(8) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `Direccion` varchar(255) DEFAULT NULL,
  `distrito` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `ID` int(11) NOT NULL,
  `UsuarioID` int(11) NOT NULL,
  `FechaPedido` datetime NOT NULL,
  `MetodoPago` enum('Tarjeta','Efectivo') NOT NULL,
  `Total` decimal(10,2) NOT NULL,
  `Estado` enum('Pendiente','Procesado') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Descripcion` text DEFAULT NULL,
  `Precio` decimal(10,2) NOT NULL,
  `foto_prod` varchar(100) DEFAULT NULL,
  `DescuentoTarjeta` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`ID`, `Nombre`, `Descripcion`, `Precio`, `foto_prod`, `DescuentoTarjeta`) VALUES
(4, 'lazana de carne', 'lazana', 17.50, '../imagenes/lazaña de carne.jpeg', 5.00),
(5, 'lazana', 'lazana', 17.50, '../imagenes/lazaña de carne.jpeg', 5.00),
(6, 'lazana de pollo', 'lazana pollo', 17.50, '../imagenes/lazaña de pollo.jpeg', 2.50),
(7, 'pizza aceitunas', 'aceitunas', 7.50, '../imagenes/Pizza de aceitunas.jpeg', 0.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promociones`
--

CREATE TABLE `promociones` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Descripcion` text DEFAULT NULL,
  `Descuento` decimal(5,2) NOT NULL,
  `FechaInicio` date NOT NULL,
  `FechaFin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promocionesporusuario`
--

CREATE TABLE `promocionesporusuario` (
  `ID` int(11) NOT NULL,
  `UsuarioID` int(11) NOT NULL,
  `PromocionID` int(11) NOT NULL,
  `FechaCanje` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_de_usuario`
--

CREATE TABLE `tipo_de_usuario` (
  `ID` int(11) NOT NULL,
  `Tipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_de_usuario`
--

INSERT INTO `tipo_de_usuario` (`ID`, `Tipo`) VALUES
(1, 'Administrador'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `Contrasena` varchar(100) NOT NULL,
  `ClienteID` int(11) DEFAULT NULL,
  `TipoUsuarioID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID`, `user`, `Contrasena`, `ClienteID`, `TipoUsuarioID`) VALUES
(2, 'ehinar', '$2y$10$dVLhPITkdvwA84zu7SVsRusHYcI9ofUyOlEgZCy1xyHoMFyZGy/76', NULL, 1),
(6, 'sugar', '$2y$10$9/UsdKitI6b/qJrYtBKnI..axNujYk5Hw6pZIwh23/U2xn4eWEUdu', NULL, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito_compra`
--
ALTER TABLE `carrito_compra`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `PedidoID` (`PedidoID`),
  ADD KEY `ProductoID` (`ProductoID`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `DNI` (`DNI`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UsuarioID` (`UsuarioID`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `promociones`
--
ALTER TABLE `promociones`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `promocionesporusuario`
--
ALTER TABLE `promocionesporusuario`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UsuarioID` (`UsuarioID`),
  ADD KEY `PromocionID` (`PromocionID`);

--
-- Indices de la tabla `tipo_de_usuario`
--
ALTER TABLE `tipo_de_usuario`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `user` (`user`),
  ADD KEY `ClienteID` (`ClienteID`),
  ADD KEY `TipoUsuarioID` (`TipoUsuarioID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito_compra`
--
ALTER TABLE `carrito_compra`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `promociones`
--
ALTER TABLE `promociones`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `promocionesporusuario`
--
ALTER TABLE `promocionesporusuario`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_de_usuario`
--
ALTER TABLE `tipo_de_usuario`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito_compra`
--
ALTER TABLE `carrito_compra`
  ADD CONSTRAINT `carrito_compra_ibfk_1` FOREIGN KEY (`PedidoID`) REFERENCES `pedidos` (`ID`),
  ADD CONSTRAINT `carrito_compra_ibfk_2` FOREIGN KEY (`ProductoID`) REFERENCES `productos` (`ID`);

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`UsuarioID`) REFERENCES `usuarios` (`ID`);

--
-- Filtros para la tabla `promocionesporusuario`
--
ALTER TABLE `promocionesporusuario`
  ADD CONSTRAINT `promocionesporusuario_ibfk_1` FOREIGN KEY (`UsuarioID`) REFERENCES `usuarios` (`ID`),
  ADD CONSTRAINT `promocionesporusuario_ibfk_2` FOREIGN KEY (`PromocionID`) REFERENCES `promociones` (`ID`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`ClienteID`) REFERENCES `clientes` (`ID`),
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`TipoUsuarioID`) REFERENCES `tipo_de_usuario` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
