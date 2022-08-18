-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-07-2021 a las 05:23:40
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `carrito`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(400) NOT NULL,
  `imagen` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `descripcion`, `imagen`) VALUES
(1, 'Juvenil', 'Ropa juvenil', 'category-1.jpg'),
(2, 'Accesorios', 'Bisutería y sombreros', 'category-8.PNG'),
(3, 'Cosméticos', 'Maquillaje', 'category-6.PNG'),
(4, 'Temporada', 'trajes de baño ', 'category-9.PNG');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturacion`
--

CREATE TABLE `facturacion` (
  `id_pedido` int(11) NOT NULL,
  `empresa` varchar(40) NOT NULL,
  `direccion` varchar(80) NOT NULL,
  `estado` varchar(30) NOT NULL,
  `cp` int(10) NOT NULL,
  `id_venta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `facturacion`
--

INSERT INTO `facturacion` (`id_pedido`, `empresa`, `direccion`, `estado`, `cp`, `id_venta`) VALUES
(1, 'urbanshop', 'Francisco Marquez', '3', 55140, 11),
(2, 'urbanshop', 'Francisco Marquez', '3', 55023, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(300) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` double NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `inventario` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `talla` varchar(100) NOT NULL,
  `color` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `imagen`, `inventario`, `id_categoria`, `talla`, `color`) VALUES
(1, 'Jersey cropped cuello pico', 'manga larga poliester', 189.99, 'producto-1.PNG', 30, 1, 'CH,M,G', 'morado'),
(2, 'Vestido tailoring corto', 'corte recto con abertura ', 299, 'producto-2.PNG', 2, 1, 'XCH,CH,M', 'azul claro'),
(3, 'Falda mini bicolor', 'estilo cruzado bicolor', 199.9, 'producto-3.PNG', 6, 1, 'CH,M', 'blanco/negro'),
(4, 'Conjunto satin print', 'tela de satin tornasol', 429, 'producto-4.PNG', 2, 1, 'XCH,M', 'amarillo tornasol'),
(5, 'Cazadora nylon cinturón', 'relleno de algodon, tela termica', 389, 'producto-5.PNG', 8, 1, 'M,G,XG', 'cafe claro'),
(6, 'Chaleco demin cropped', 'mezclilla con efecto degradado', 399, 'producto-8.PNG', 8, 1, 'XCH,M', 'mezclilla claro'),
(7, 'Blusa rústica cintura', 'manga larga tipo globo', 229, 'producto-7.PNG', 24, 4, 'XCH,M,G', 'rosa'),
(8, 'Camisa satinada print', 'corte tipo crop-top 3/4', 249.99, 'producto-9.PNG', 9, 1, 'CH,XG', 'blanco con diseño'),
(9, 'Crop-top corrugado', 'managa larga tipo globo', 299, 'producto-6.PNG', 4, 1, 'XCH,M', 'amarillo'),
(10, 'Sudadera manga corta print', 'sudadera top manga corta', 279, 'producto-10.PNG', 15, 1, 'CH,M,G', 'azul marino'),
(11, 'Bolso hombro', 'diseño efecto cocodrilo', 499, 'accesorio1.PNG', 7, 2, 'no aplica', 'negro vinypiel'),
(12, 'Set 4 collares', 'diseño de cruz y cadena', 239, 'accesorio2.PNG', 2, 2, 'no aplica', 'dorado'),
(13, 'Pendientes dorados', 'diseño aro dragón', 149.99, 'accesorio3.PNG', 27, 2, 'no aplica', 'dorado'),
(14, 'Gafas de sol', 'lente con forma hexagonal', 299, 'accesorio4.PNG', 16, 2, 'no aplica', 'cafe'),
(15, 'Cinturón hebilla doble', 'hebilla doble circulo', 239, 'accesorio5.PNG', 10, 2, '75,85,95', 'negro'),
(16, 'Gorra bucket', 'bordado de texto', 189, 'accesorio6.PNG', 7, 2, 'XCH,M', 'beige'),
(17, 'Labial en barra', 'consistencia cremosa', 89.9, 'cosmetico1.PNG', 18, 3, 'no aplica', 'rojo cenizo'),
(18, 'Brillo labial metalic', 'Líquido brilloso con aplicador', 39.9, 'cosmetico2.PNG', 6, 3, 'no aplica', 'rosa diamond'),
(19, 'Sombra metálica', 'un solo tono con glitter', 69.9, 'cosmetico3.PNG', 11, 3, 'no aplica', 'cosmo glam'),
(20, 'Sombra tono verano', 'pigmentación profunda y brillo', 99, 'cosmetico4.PNG', 20, 3, 'no aplica', 'icon sundaze'),
(21, 'Falda mini cuadros', 'corte recto estampado de cuadros', 149, '1627489542..JPG', 14, 1, 'CH,M', 'cuadros verdes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_venta`
--

CREATE TABLE `productos_venta` (
  `id` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` double NOT NULL,
  `precio` double NOT NULL,
  `subtotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos_venta`
--

INSERT INTO `productos_venta` (`id`, `id_venta`, `id_producto`, `cantidad`, `precio`, `subtotal`) VALUES
(1, 2, 2, 4, 299, 1196),
(2, 4, 1, 1, 189, 189),
(3, 6, 1, 1, 189.99, 189.99),
(4, 7, 1, 1, 189.99, 189.99),
(5, 8, 1, 1, 189.99, 189.99),
(6, 9, 1, 1, 189.99, 189.99),
(7, 10, 1, 1, 189.99, 189.99),
(8, 11, 1, 1, 189.99, 189.99),
(9, 12, 2, 1, 299, 299),
(10, 12, 12, 1, 239, 239),
(11, 12, 16, 1, 189, 189),
(12, 13, 2, 1, 299, 299),
(13, 13, 7, 1, 229, 229),
(14, 13, 12, 1, 239, 239);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `telefono` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nivel` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `telefono`, `email`, `password`, `nivel`) VALUES
(1, 'Janet Ochoa Gonzalez', '561748521', 'janet-8aglez@gmail.com', '01jaan07', 'admin'),
(2, 'Janet Ochoa', '5617479966', 'l1311ochoagjanet@gmail.com', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contraseña` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `contraseña`) VALUES
(1, 'janet-8aglez@gmail.com', '01Janet07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `total` double NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `id_usuario`, `total`, `fecha`) VALUES
(1, 1, 1196, '2021-07-23 11:07:10'),
(2, 1, 1196, '2021-07-23 11:07:51'),
(4, 1, 189, '2021-07-23 11:07:34'),
(6, 2, 189.99, '2021-07-27 10:07:55'),
(12, 8, 727, '2021-07-29 11:07:30'),
(13, 9, 767, '2021-07-29 13:07:54');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `facturacion`
--
ALTER TABLE `facturacion`
  ADD PRIMARY KEY (`id_pedido`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos_venta`
--
ALTER TABLE `productos_venta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `facturacion`
--
ALTER TABLE `facturacion`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `productos_venta`
--
ALTER TABLE `productos_venta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
