-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-06-2019 a las 21:49:16
-- Versión del servidor: 10.1.39-MariaDB
-- Versión de PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria` text COLLATE utf8_spanish_ci NOT NULL,
  `clientep` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `lugar` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `fechaI` date NOT NULL,
  `fechaF` date NOT NULL,
  `trabR` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `marcaL` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `descripM` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `cantL` int(40) NOT NULL,
  `tipoV` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `consider` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `obvser` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`, `clientep`, `lugar`, `fechaI`, `fechaF`, `trabR`, `marcaL`, `descripM`, `cantL`, `tipoV`, `consider`, `obvser`, `fecha`) VALUES
(2, 'Bruso', 'Antonio', 'Playa del Carmen', '2019-06-01', '2019-06-14', 'Nada especifico', 'Solis', 'Nuevo y barato', 233, 'Relieve poco amigable', 'Poco espacio de construcción', 'Baches muy graves', '2019-06-08 00:38:04');

--
-- Disparadores `categorias`
--
DELIMITER $$
CREATE TRIGGER `borrarRegistros` AFTER DELETE ON `categorias` FOR EACH ROW BEGIN  
    DELETE
    	FROM proyectos 
        WHERE proyectos.idCate = old.id;
     DELETE
     	FROM registro
        WHERE registro.idProyect = old.id;
  END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `censo`
--

CREATE TABLE `censo` (
  `idC` int(11) NOT NULL,
  `lumi` int(50) NOT NULL,
  `luminId` int(11) NOT NULL,
  `rpu` varchar(255) NOT NULL,
  `col` text NOT NULL,
  `calle` text NOT NULL,
  `alP` int(11) NOT NULL,
  `tipoVi` varchar(30) NOT NULL,
  `ubiP` varchar(30) NOT NULL,
  `disIn` int(11) NOT NULL,
  `carriles` int(11) NOT NULL,
  `co` int(50) NOT NULL,
  `estaC` varchar(20) NOT NULL,
  `alimen` varchar(20) NOT NULL,
  `lumiAR` varchar(30) NOT NULL,
  `latitud` text NOT NULL,
  `longitud` text NOT NULL,
  `instalador` varchar(100) NOT NULL,
  `tipoP` varchar(50) NOT NULL,
  `modeloLE` varchar(255) NOT NULL,
  `potenciaLE` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `censo`
--

INSERT INTO `censo` (`idC`, `lumi`, `luminId`, `rpu`, `col`, `calle`, `alP`, `tipoVi`, `ubiP`, `disIn`, `carriles`, `co`, `estaC`, `alimen`, `lumiAR`, `latitud`, `longitud`, `instalador`, `tipoP`, `modeloLE`, `potenciaLE`) VALUES
(1, 3, 123332, '1234332', 'Ejidal', '12', 11, 'Primaria', 'Camellon', 122, 1, 12, 'ON', 'Área', 'Ninguno', '12,11', '22,11', 'Marcos', 'Concreto', 'Solis S.A de C.V.', '13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `contacP` text COLLATE utf8_spanish_ci NOT NULL,
  `puesto` text COLLATE utf8_spanish_ci NOT NULL,
  `documento` int(11) NOT NULL,
  `email` text COLLATE utf8_spanish_ci NOT NULL,
  `telefono` text COLLATE utf8_spanish_ci NOT NULL,
  `direccion` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `compras` int(11) NOT NULL,
  `ultima_compra` datetime NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `contacP`, `puesto`, `documento`, `email`, `telefono`, `direccion`, `fecha_nacimiento`, `compras`, `ultima_compra`, `fecha`) VALUES
(13, 'Julian Villegas', 'Jose Antonio', 'Ejecutivo de Ventas', 2147483647, 'correo@gmail.com', '(098) 120-3123', 'Las palmas 2', '1999-02-03', 92, '2019-06-10 19:25:57', '2019-06-11 00:25:57'),
(14, 'Carlos Espetia', 'Loco Valdes', 'Director General', 2147483647, 'espetia@gmail.com', '(123) 123-1231', 'Calle 23', '2012-03-12', 1, '2019-05-30 18:30:41', '2019-05-30 23:30:41'),
(15, 'Antonio', 'Josefa 123', 'Jefe Supremo', 2147483647, 'flowers@gmail.com', '(123) 123-1231', 'villamar', '2012-03-12', 3, '2019-06-08 12:27:55', '2019-06-08 17:27:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `obser`
--

CREATE TABLE `obser` (
  `id` int(11) NOT NULL,
  `observacion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `obser`
--

INSERT INTO `obser` (`id`, `observacion`) VALUES
(1, 'Nuevo al full'),
(2, 'Nuevo'),
(3, 'Pagado con aticipación'),
(4, 'Pago dos días antes'),
(5, 'Ninguno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `id_categoria` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `nomProyecto` text COLLATE utf8_spanish_ci NOT NULL,
  `codigo` text COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `tipoM` text COLLATE utf8_spanish_ci NOT NULL,
  `imagen` text COLLATE utf8_spanish_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `precio_compra` float NOT NULL,
  `precio_venta` float NOT NULL,
  `ventas` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `id_categoria`, `nomProyecto`, `codigo`, `descripcion`, `tipoM`, `imagen`, `stock`, `precio_compra`, `precio_venta`, `ventas`, `fecha`) VALUES
(68, '11', '', '1102', 'Cable calibre 12', 'Centimetros', 'vistas/img/productos/default/anonymous.png', 500, 1000, 2000, 0, '2019-05-28 17:10:18'),
(69, '11', '', '1103', 'Tornillos', '', 'vistas/img/productos/default/anonymous.png', 50000, 1500, 2100, 0, '2019-05-13 02:22:11'),
(73, '14', '', '1401', 'Cable', '', 'vistas/img/productos/default/anonymous.png', 400, 5000, 12000, 0, '2019-05-13 02:26:56'),
(74, '14', '', '1402', 'Concreto', '', 'vistas/img/productos/default/anonymous.png', 1231, 972, 1360.8, 0, '2019-05-13 02:28:04'),
(75, '15', '', '1502', 'Cemento kg', '', 'vistas/img/productos/default/anonymous.png', 20, 3000, 4200, 0, '2019-05-13 02:35:12'),
(76, '13', '', '1302', 'Cinta', '', 'vistas/img/productos/default/anonymous.png', 196, 2321, 3249.4, 35, '2019-05-13 06:43:55'),
(77, '11', '', '1105', 'Tubo mts', '', 'vistas/img/productos/default/anonymous.png', 123, 431, 603.4, 0, '2019-05-13 02:37:31'),
(78, '11', '', '1106', 'Clavos', '', 'vistas/img/productos/default/anonymous.png', 100, 2300, 3220, 0, '2019-05-13 05:20:59'),
(79, '11', '', '1107', 'Hierro', '', 'vistas/img/productos/default/anonymous.png', 390, 200, 280, 10, '2019-05-13 06:43:55'),
(80, '14', '', '1403', 'Cobre mts', '', 'vistas/img/productos/default/anonymous.png', 300, 1000, 1400, 0, '2019-06-14 19:45:46'),
(81, '13', '', '1303', 'Cable de luz mts', 'Metros', 'vistas/img/productos/default/anonymous.png', 975, 10000, 20000, 25, '2019-06-14 19:45:46'),
(82, '2', '', '1601', 'Cable reforzado', 'Metros', '', 329, 33, 46.2, 4, '2019-06-14 19:42:31'),
(83, '2', 'Bruso', '', 'Fibra Optica', 'mts', '', 208, 2, 2, 15, '2019-06-14 19:48:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `progreso`
--

CREATE TABLE `progreso` (
  `idPro` int(11) NOT NULL,
  `idProyec` int(11) NOT NULL,
  `nomPro` varchar(250) NOT NULL,
  `cliente` varchar(50) NOT NULL,
  `user` varchar(50) NOT NULL,
  `descripM` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `cantidadMP` int(250) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `progreso`
--

INSERT INTO `progreso` (`idPro`, `idProyec`, `nomPro`, `cliente`, `user`, `descripM`, `cantidadMP`, `fecha`) VALUES
(3, 2, 'Bruso', 'Julian Villegas', 'Jorge', '[{\"id\":\"83\",\"descripcion\":\"Fibra Optica\",\"cantidad\":\"2\",\"stock\":\"207\",\"idProyect\":\"2\",\"proyecto\":\"Bruso\"}]', 2, '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos`
--

CREATE TABLE `proyectos` (
  `idP` int(9) NOT NULL,
  `idCate` int(11) NOT NULL,
  `nomP` varchar(50) NOT NULL,
  `lugar` varchar(50) NOT NULL,
  `comV` int(11) NOT NULL,
  `comOP` int(100) NOT NULL,
  `sysC` int(11) NOT NULL,
  `sysS` int(11) NOT NULL,
  `weeks` int(11) NOT NULL,
  `aliPD` int(100) NOT NULL,
  `costoH` int(11) NOT NULL,
  `costoP` int(11) NOT NULL,
  `cashET` int(11) NOT NULL,
  `cashE` int(11) NOT NULL,
  `costoT` int(11) NOT NULL,
  `costoS` int(11) NOT NULL,
  `costoD` int(11) NOT NULL,
  `observacion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proyectos`
--

INSERT INTO `proyectos` (`idP`, `idCate`, `nomP`, `lugar`, `comV`, `comOP`, `sysC`, `sysS`, `weeks`, `aliPD`, `costoH`, `costoP`, `cashET`, `cashE`, `costoT`, `costoS`, `costoD`, `observacion`) VALUES
(2, 2, 'Bruso', 'Playa del Carmen', 6928, 25000, 12500, 15000, 2, 1250, 900, 18750, 45000, 3000, 128328, 64164, 8555, 'Ninguno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE `registro` (
  `idR` int(11) NOT NULL,
  `idProyect` int(11) NOT NULL,
  `nomProyect` varchar(255) NOT NULL,
  `lumi` int(50) NOT NULL,
  `luminId` int(11) NOT NULL,
  `rpu` varchar(255) NOT NULL,
  `col` text NOT NULL,
  `calle` text NOT NULL,
  `alP` int(11) NOT NULL,
  `tipoVi` varchar(30) NOT NULL,
  `ubiP` varchar(30) NOT NULL,
  `disIn` int(11) NOT NULL,
  `carriles` int(11) NOT NULL,
  `co` int(50) NOT NULL,
  `estaC` varchar(20) NOT NULL,
  `alimen` varchar(20) NOT NULL,
  `lumiAR` varchar(30) NOT NULL,
  `latitud` text NOT NULL,
  `longitud` text NOT NULL,
  `instalador` varchar(100) NOT NULL,
  `tipoP` varchar(50) NOT NULL,
  `modeloLE` varchar(255) NOT NULL,
  `potenciaLE` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `registro`
--

INSERT INTO `registro` (`idR`, `idProyect`, `nomProyect`, `lumi`, `luminId`, `rpu`, `col`, `calle`, `alP`, `tipoVi`, `ubiP`, `disIn`, `carriles`, `co`, `estaC`, `alimen`, `lumiAR`, `latitud`, `longitud`, `instalador`, `tipoP`, `modeloLE`, `potenciaLE`) VALUES
(1, 2, 'Bruso', 2, 21, '222', 'Ejidal', '3', 11, 'Secundaria', 'Andador', 11, 2, 123, 'ON', 'Subterránea', 'Ninguno', '11,22', '22,11', 'Antonio', 'Concreto', 'Solis S.A. de C.V.', '22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `usuario` text COLLATE utf8_spanish_ci NOT NULL,
  `password` text COLLATE utf8_spanish_ci NOT NULL,
  `perfil` text COLLATE utf8_spanish_ci NOT NULL,
  `foto` text COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `ultimo_login` datetime NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `password`, `perfil`, `foto`, `estado`, `ultimo_login`, `fecha`) VALUES
(1, 'Administrador', 'admin', '$2a$07$asxx54ahjppf45sd87a5auXBm1Vr2M1NV5t/zNQtGHGpS5fFirrbG', 'Administrador', 'vistas/img/usuarios/admin/191.jpg', 1, '2019-04-13 19:49:37', '2019-04-14 00:49:37'),
(61, 'febo', 'febosadi', '$2a$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 'Administrador', '', 1, '2019-04-20 17:55:26', '2019-04-20 22:55:26'),
(62, 'Jorge', 'jorge1', '$2a$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 'Administrador', '', 1, '2019-06-13 15:40:55', '2019-06-13 20:40:55'),
(65, 'Santiago', 'Santi', '$2a$07$asxx54ahjppf45sd87a5autBMYI.dcfixEKwywxOvVu.ijNpIuH7i', 'Administrador', 'vistas/img/usuarios/Santi/466.jpg', 1, '2019-05-28 16:15:49', '2019-05-28 21:15:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_vendedor` int(11) NOT NULL,
  `productos` text COLLATE utf8_spanish_ci NOT NULL,
  `impuesto` float NOT NULL,
  `neto` float NOT NULL,
  `total` float NOT NULL,
  `metodo_pago` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `codigo`, `id_cliente`, `id_vendedor`, `productos`, `impuesto`, `neto`, `total`, `metodo_pago`, `fecha`) VALUES
(38, 10022, 13, 3, '[{\"id\":\"81\",\"descripcion\":\"Cable de luz mts\",\"cantidad\":\"25\",\"stock\":\"975\",\"precio\":\"20000\",\"total\":\"500000\"},{\"id\":\"79\",\"descripcion\":\"Hierro\",\"cantidad\":\"10\",\"stock\":\"390\",\"precio\":\"280\",\"total\":\"2800\"},{\"id\":\"76\",\"descripcion\":\"Cinta\",\"cantidad\":\"35\",\"stock\":\"196\",\"precio\":\"3249.4\",\"total\":\"113729\"}]', 61652.9, 616529, 678182, 'Efectivo', '2019-05-13 06:43:55');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `censo`
--
ALTER TABLE `censo`
  ADD PRIMARY KEY (`idC`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `obser`
--
ALTER TABLE `obser`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `progreso`
--
ALTER TABLE `progreso`
  ADD PRIMARY KEY (`idPro`);

--
-- Indices de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD PRIMARY KEY (`idP`);

--
-- Indices de la tabla `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`idR`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `censo`
--
ALTER TABLE `censo`
  MODIFY `idC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `obser`
--
ALTER TABLE `obser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT de la tabla `progreso`
--
ALTER TABLE `progreso`
  MODIFY `idPro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  MODIFY `idP` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `registro`
--
ALTER TABLE `registro`
  MODIFY `idR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
