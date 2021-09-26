-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-09-2021 a las 05:02:44
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `madaweb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `IdCategoria` int(11) NOT NULL,
  `NombreCategoria` varchar(200) NOT NULL,
  `UrlImagen` varchar(1000) NOT NULL,
  `Estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`IdCategoria`, `NombreCategoria`, `UrlImagen`, `Estado`) VALUES
(1, 'Vestidos', 'Vestidos.jpg', 1),
(2, 'Jeans', 'jeansCategoria.jpg', 1),
(4, 'Buzos', 'hoodies.jpg', 1),
(5, 'Conjuntos', 'conjuntosC.jpg', 1),
(6, 'Shorts', 'ShortsC.jpg', 1),
(7, 'Leggins', 'leggins.jpg', 0),
(9, 'Camisetas', 'camisetas.jpg', 1),
(10, 'Chaquetas', 'chaquetas.jpg', 1),
(14, 'Blusas', 'blusas.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedidos`
--

CREATE TABLE `detalle_pedidos` (
  `IdDetallePedido` int(11) NOT NULL,
  `ValorUnitario` double NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `IdPedido` int(11) NOT NULL,
  `IdDetalleProducto` int(11) NOT NULL,
  `Anulado` tinyint(1) NOT NULL,
  `Observacion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_pedidos`
--

INSERT INTO `detalle_pedidos` (`IdDetallePedido`, `ValorUnitario`, `Cantidad`, `IdPedido`, `IdDetalleProducto`, `Anulado`, `Observacion`) VALUES
(1, 20000, 2, 1, 12, 0, NULL),
(2, 38000, 1, 1, 16, 1, 'El cliente se arrepiente de la compra del producto'),
(3, 33320, 1, 2, 21, 0, NULL),
(4, 146370, 1, 2, 36, 1, 'El cliente selecciono por error el producto'),
(5, 33320, 3, 3, 21, 0, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_productos`
--

CREATE TABLE `detalle_productos` (
  `IdDetalleProducto` int(11) NOT NULL,
  `Color` varchar(100) NOT NULL,
  `Talla` varchar(20) NOT NULL,
  `Stock` int(11) NOT NULL,
  `IdProducto` int(11) NOT NULL,
  `Estado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_productos`
--

INSERT INTO `detalle_productos` (`IdDetalleProducto`, `Color`, `Talla`, `Stock`, `IdProducto`, `Estado`) VALUES
(10, 'Amarillo', 'S', 18, 3, 1),
(12, 'Rojo', 'S', 7, 2, 1),
(13, 'Amarillo', 'M', 1, 2, 1),
(14, 'Amarillo', 'S', 4, 2, 1),
(15, 'Negro', 'S', 5, 2, 1),
(16, 'Negro', 'M', 11, 5, 1),
(17, 'Rojo', 'S', 6, 5, 1),
(21, 'Negro', 'M', 10, 7, 1),
(22, 'Rojo', 'S', 12, 7, 1),
(23, 'Azul', 'L', 8, 7, 1),
(25, 'Verde', 'XS', 3, 2, 1),
(26, 'Verde', 'M', 4, 2, 1),
(27, 'Amarillo', 'L', 3, 7, 1),
(28, 'Gris', 'M', 4, 7, 1),
(30, 'Blanco', 'S', 2, 7, 1),
(31, 'Rojo', 'M', 7, 7, 1),
(32, 'Negro', 'S', 12, 5, 1),
(33, 'Verde', 'M', 4, 5, 1),
(34, 'Azul', 'M', 3, 5, 1),
(36, 'Beige', 'M', 10, 9, 1),
(37, 'Beige', 'L', 2, 2, 1),
(38, 'Negro', 'S', 2, 10, 1),
(39, 'Negro', 'M', 4, 10, 1),
(40, 'Negro y blanco', 'S', 3, 11, 1),
(41, 'Negro', 'M', 1, 11, 1),
(42, 'Blanco', 'S', 2, 11, 1),
(43, 'Negro', '32', 4, 12, 1),
(44, 'Blanco', 'S', 9, 13, 1),
(45, 'Beige', 'M', 6, 13, 1),
(46, 'Azul claro', '28', 5, 14, 1),
(47, 'Naranjado', 'M', 5, 15, 1),
(48, 'Negro', 'M', 8, 15, 1),
(49, 'Morado', 'S', 4, 7, 1),
(50, 'Morado', 'M', 3, 7, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados_pedidos`
--

CREATE TABLE `estados_pedidos` (
  `IdEstadoPedido` int(11) NOT NULL,
  `NombreEstado` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estados_pedidos`
--

INSERT INTO `estados_pedidos` (`IdEstadoPedido`, `NombreEstado`) VALUES
(1, 'Pendiente'),
(2, 'En proceso'),
(3, 'Cancelado'),
(4, 'Enviado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `IdPedido` int(11) NOT NULL,
  `FechaPedido` date DEFAULT NULL,
  `Subtotal` double DEFAULT NULL,
  `Total` double DEFAULT NULL,
  `IdEstadoPedido` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`IdPedido`, `FechaPedido`, `Subtotal`, `Total`, `IdEstadoPedido`, `IdUsuario`) VALUES
(1, '2021-09-01', 2000, 9600, 4, 4),
(2, '2021-09-01', -116370, -110039.2, 4, 22),
(3, '2021-09-01', 25000, 27500, 3, 26);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `IdProducto` int(11) NOT NULL,
  `NombreProducto` varchar(100) NOT NULL,
  `Descripcion` varchar(255) NOT NULL,
  `Precio` decimal(5,3) NOT NULL,
  `IdCategoria` int(11) NOT NULL,
  `Estado` tinyint(1) NOT NULL,
  `Imagen1` varchar(255) NOT NULL,
  `Imagen2` varchar(255) NOT NULL,
  `Imagen3` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`IdProducto`, `NombreProducto`, `Descripcion`, `Precio`, `IdCategoria`, `Estado`, `Imagen1`, `Imagen2`, `Imagen3`) VALUES
(2, 'Conjunto ', 'Conjunto de sudadera y camiseta hombliguera especial para realizar deporte.', '50.000', 5, 1, 'conjunto1.jpg', 'conjunto2.jpg', 'conjunto3.jpg'),
(3, 'Camibuso', 'Camibuso de color amarillo sin estampados y...', '23.800', 4, 1, 'camibuso1.jpg', 'camibuso2.jpg', 'camibuso3.jpg'),
(5, 'Vestido', 'Vestido especial para ocasiones...', '53.550', 1, 1, 'vestido1.jpg', 'vestido2.jpg', 'vestido3.jpg'),
(7, 'Camiseta básica', 'Camiseta especial para...', '29.750', 9, 1, 'camiseta 1.jpg', 'camiseta 2.jpg', 'camiseta 3.jpg'),
(9, 'Chaqueta de cuero', 'Chaqueta de cuero con detalles de botones y cierres...', '83.300', 10, 1, 'chaqueta 1.jpg', 'chaqueta 2.jpg', 'chaqueta 3.jpg'),
(10, 'Chaqueta cuerina', 'Chaqueta en material cuerina con botones y a media altura.', '55.930', 10, 1, 'chaqueta cuero 1.jpg', 'chaqueta cuero 2.jpg', 'chaqueta cuero 3.jpg'),
(11, 'Conjunto chaqueta y sudadera', 'Conjunto de chaqueta y sudadera antifluidos', '71.400', 5, 1, 'conjunto chaqueta 1.jpg', 'conjunto chaqueta 2.jpg', 'conjunto chaqueta 3.jpg'),
(12, 'Pantalón negro', 'Pantalón de color negro especial para las ocasiones de...', '70.210', 2, 1, 'pantalon negro 1.jpg', 'pantalon negro 2.jpg', 'pantalon negro 3.jpg'),
(13, 'Croptop', 'Croptop en tela fria, diseño de escote en la espalda.', '35.700', 14, 1, 'croptop 1.jpg', 'croptop 2.jpg', 'croptop 3.jpg'),
(14, 'Jeans', 'Jeans claros con detalle de roto en la altura de el bolsillo frontal derecho', '41.650', 2, 1, 'jeans 1.jpg', 'jeans 2.jpg', 'jeans 3.jpg'),
(15, 'Vestido Smile', 'Vestido con mangas estilo correa y escotes lateral...', '83.300', 1, 1, 'vestido correa 1.jpg', 'vestido correa 2.jpg', 'vestido correa 3.jpg'),
(17, 'Top', 'Top básico para...', '20.000', 14, 1, 'top1.jpg', 'top2.jpg', 'top3.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recuperarcontrasena`
--

CREATE TABLE `recuperarcontrasena` (
  `id` int(11) NOT NULL,
  `codigo` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `recuperarcontrasena`
--

INSERT INTO `recuperarcontrasena` (`id`, `codigo`, `correo`) VALUES
(3, '160d941380bb86', 'almenesesso@unal.edu.co'),
(8, '160ff211329950', 'davidmeneses07123@gmail.com'),
(13, '1610bedd589a99', 'davidmeneses07123@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `IdRol` int(11) NOT NULL,
  `Nombre_Rol` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`IdRol`, `Nombre_Rol`) VALUES
(1, 'Administrador'),
(2, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `IdUsuario` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Apellido` varchar(100) NOT NULL,
  `Correo` varchar(255) NOT NULL,
  `Contrasena` varchar(255) NOT NULL,
  `Estado` tinyint(4) NOT NULL,
  `IdRol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`IdUsuario`, `Nombre`, `Apellido`, `Correo`, `Contrasena`, `Estado`, `IdRol`) VALUES
(1, 'Administrador', 'Jefe', 'admin@gmail.com', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', 1, 1),
(3, 'David Enrique', 'Meneses Solorzano', 'davidmeneses07123@gmail.com', '402e9585645f19f0e805a5ba4062f3e8e2b46fa2a08cd33d13dc27c3dfa2deb91c03f306d42b89b41943a00a3f1e08dfd917a248188794c8a8b4d87bc80fe0d5', 1, 1),
(4, 'Juliana', 'Guzman', 'juliana@hotmail.com', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 1, 2),
(7, 'Sara', 'Rivera', 'sara@gmail.com', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 1, 2),
(8, 'Maria', 'Rodriguez Salaza', 'mariarodriguezsa@gmail.com', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 1, 2),
(9, 'Milena', 'Martínez Herrera', 'mmherrera@hotmail.com', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 1, 2),
(11, 'Juliana Maria', 'Grisales Rendon', 'julianaG@gmail.com', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', 1, 2),
(13, 'Luisa', 'Torres', 'luisa@gmail.com', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 1, 2),
(14, 'Marcela ', 'Herrera', 'marcela@gmail.com', '32564566eea281ca203b950bd534cdda9630a8c4ceb085f0b395d4c08d2ba55445a3ba04c63db244d3d02e4c990365834c89e22a3721f5b846e056692292770a', 1, 1),
(21, 'Mariana', 'Diaz', 'mariana@gmail.com', '35fbf0cf67e25f84bd9cd6755f377b0ffbd7b334f3238d7bd0d2e29b69925ba1abf4e8823c0706144b1e416cf1082c0180f852c335e79e3f26b2ed43fd62553f', 1, 1),
(22, 'Mariana', 'Palacios', 'mariana123@gmail.com', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 1, 2),
(26, 'Maria', 'Guzman', 'mar@gmail.com', '4f22a5b713259a8b3e6d47c9073d7eef25e6ced4c20cbe49abaaa2e80b01e4e37c1a7c16891810668dd9a6bd88f259bbf8b7a672d37e785c3f2f3aa0b7169b54', 1, 2),
(27, 'Manuela', 'Zapata Jiménez', 'manuela@gmail.com', '32564566eea281ca203b950bd534cdda9630a8c4ceb085f0b395d4c08d2ba55445a3ba04c63db244d3d02e4c990365834c89e22a3721f5b846e056692292770a', 1, 2),
(29, 'Yuliana', 'Salgado Sandoval', 'yuli@gmail.com', '4f22a5b713259a8b3e6d47c9073d7eef25e6ced4c20cbe49abaaa2e80b01e4e37c1a7c16891810668dd9a6bd88f259bbf8b7a672d37e785c3f2f3aa0b7169b54', 1, 2),
(31, 'Perla', 'Salas Fernandez', 'perla@gmail.com', '4f22a5b713259a8b3e6d47c9073d7eef25e6ced4c20cbe49abaaa2e80b01e4e37c1a7c16891810668dd9a6bd88f259bbf8b7a672d37e785c3f2f3aa0b7169b54', 1, 2),
(62, 'Paula', 'Giraldo', 'paulaq@gmail.com', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', 1, 1),
(66, 'Juliana Marcela', 'Gomez Giraldo', 'julianamarcela@gmail.com', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', 1, 2),
(73, 'Melisa', 'Saldarriaga', 'meli@gmail.com', 'cfcc073f77ec9238e2ceb6f8edd14107842eec2949054bd705c72ad56c1776f97ddcf64cacf13571bd0f2d621a0adf375d0df91d7fedf0fed0d1399c9d28dce3', 1, 2),
(74, 'Laura', 'Tobon', 'luratobon@gmail.com', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', 1, 1),
(75, 'Maria Valentina', 'Saldarriaga Mejia', 'mariaVal@gmail.com', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', 1, 2),
(76, 'Julieth', 'Valbuena', 'julieth@gmail.com', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', 1, 1),
(77, 'David Enrique', 'Meneses Solorzano', 'demeneses4@misena.edu.co', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', 1, 2),
(78, 'Juliana', 'Suarez', 'juliana123@gmail.com', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', 1, 2),
(79, 'Julio', 'Barrientos', 'julio@gmail.com', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', 1, 2),
(80, 'Maritza', 'Valderrama', 'maritza@gmail.com', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', 1, 2),
(81, 'Melisa', 'Betancur', 'melissa@gmail.com', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', 1, 2),
(86, 'Santiago', 'Marin', 'santi@gmail.com', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', 1, 1),
(87, 'Ximena', 'Giraldo Toro', 'ximeT@gmail.com', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', 1, 2),
(88, 'Julieta', 'Moreno', 'julietamm@gmail.com', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', 1, 2),
(89, 'Andrea', 'Mora', 'andreamora@gmail.com', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', 1, 2),
(90, 'Carrito', 'Prueba Session Carrito', 'carrito@gmail.com', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', 1, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`IdCategoria`);

--
-- Indices de la tabla `detalle_pedidos`
--
ALTER TABLE `detalle_pedidos`
  ADD PRIMARY KEY (`IdDetallePedido`),
  ADD KEY `IdPedido` (`IdPedido`),
  ADD KEY `IdDetalleProducto` (`IdDetalleProducto`);

--
-- Indices de la tabla `detalle_productos`
--
ALTER TABLE `detalle_productos`
  ADD PRIMARY KEY (`IdDetalleProducto`),
  ADD KEY `IdProducto` (`IdProducto`);

--
-- Indices de la tabla `estados_pedidos`
--
ALTER TABLE `estados_pedidos`
  ADD PRIMARY KEY (`IdEstadoPedido`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`IdPedido`),
  ADD KEY `IdEstadoPedido` (`IdEstadoPedido`),
  ADD KEY `IdUsuario` (`IdUsuario`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`IdProducto`),
  ADD KEY `IdCategoria` (`IdCategoria`);

--
-- Indices de la tabla `recuperarcontrasena`
--
ALTER TABLE `recuperarcontrasena`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`IdRol`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`IdUsuario`),
  ADD UNIQUE KEY `CorreoUnico` (`Correo`),
  ADD KEY `IdRol` (`IdRol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `IdCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `detalle_pedidos`
--
ALTER TABLE `detalle_pedidos`
  MODIFY `IdDetallePedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `detalle_productos`
--
ALTER TABLE `detalle_productos`
  MODIFY `IdDetalleProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `estados_pedidos`
--
ALTER TABLE `estados_pedidos`
  MODIFY `IdEstadoPedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `IdPedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `IdProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `recuperarcontrasena`
--
ALTER TABLE `recuperarcontrasena`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `IdRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `IdUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_pedidos`
--
ALTER TABLE `detalle_pedidos`
  ADD CONSTRAINT `detalle_pedidos_ibfk_1` FOREIGN KEY (`IdPedido`) REFERENCES `pedidos` (`IdPedido`),
  ADD CONSTRAINT `detalle_pedidos_ibfk_2` FOREIGN KEY (`IdDetalleProducto`) REFERENCES `detalle_productos` (`IdDetalleProducto`);

--
-- Filtros para la tabla `detalle_productos`
--
ALTER TABLE `detalle_productos`
  ADD CONSTRAINT `detalle_productos_ibfk_1` FOREIGN KEY (`IdProducto`) REFERENCES `productos` (`IdProducto`);

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`IdEstadoPedido`) REFERENCES `estados_pedidos` (`IdEstadoPedido`),
  ADD CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`IdUsuario`) REFERENCES `usuarios` (`IdUsuario`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`IdCategoria`) REFERENCES `categorias` (`IdCategoria`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`IdRol`) REFERENCES `roles` (`IdRol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
