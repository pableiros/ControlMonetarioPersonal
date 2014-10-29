-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-10-2014 a las 04:42:29
-- Versión del servidor: 5.6.20
-- Versión de PHP: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sistemamonetario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcartera`
--

CREATE TABLE IF NOT EXISTS `tblcartera` (
`id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `activo` int(11) NOT NULL DEFAULT '1',
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `tblcartera`
--

INSERT INTO `tblcartera` (`id`, `nombre`, `activo`, `idUsuario`) VALUES
(4, 'Ahorro', 1, 4),
(5, 'Cochinito', 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcategoria`
--

CREATE TABLE IF NOT EXISTS `tblcategoria` (
`id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `activo` int(11) NOT NULL DEFAULT '1',
  `idTipo` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `tblcategoria`
--

INSERT INTO `tblcategoria` (`id`, `nombre`, `activo`, `idTipo`, `idUsuario`) VALUES
(3, 'Vicios', 1, 2, 4),
(4, 'Trabajo', 1, 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblmovimiento`
--

CREATE TABLE IF NOT EXISTS `tblmovimiento` (
`id` int(11) NOT NULL,
  `comentario` varchar(255) NOT NULL,
  `cantidad` float(7,2) NOT NULL,
  `fecha` date NOT NULL,
  `unix` int(11) NOT NULL,
  `activo` int(11) NOT NULL DEFAULT '1',
  `idCategoria` int(11) DEFAULT NULL,
  `idProducto` int(11) DEFAULT NULL,
  `idCartera` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `tblmovimiento`
--

INSERT INTO `tblmovimiento` (`id`, `comentario`, `cantidad`, `fecha`, `unix`, `activo`, `idCategoria`, `idProducto`, `idCartera`) VALUES
(1, 'Por fin me pagaron!', 2000.00, '2014-10-28', 1, 1, 4, 3, 4),
(6, 'Cocaa!', 1500.00, '2014-10-28', 2, 1, 3, 2, 4),
(7, 'Novia consentida', 500.00, '2014-10-28', 1414547628, 1, 3, 2, 4),
(8, 'Bono', 500.00, '2014-10-28', 1414548333, 1, 4, 3, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblproducto`
--

CREATE TABLE IF NOT EXISTS `tblproducto` (
`id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `activo` int(11) NOT NULL DEFAULT '1',
  `idCategoria` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `tblproducto`
--

INSERT INTO `tblproducto` (`id`, `nombre`, `activo`, `idCategoria`) VALUES
(2, 'Coca Cola', 1, 3),
(3, 'N/A', 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbltipo`
--

CREATE TABLE IF NOT EXISTS `tbltipo` (
`id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tbltipo`
--

INSERT INTO `tbltipo` (`id`, `nombre`) VALUES
(1, 'Ingreso'),
(2, 'Egreso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblusuario`
--

CREATE TABLE IF NOT EXISTS `tblusuario` (
`id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `activo` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `tblusuario`
--

INSERT INTO `tblusuario` (`id`, `user`, `pass`, `activo`) VALUES
(4, 'usuario', 'c4ca4238a0b923820dcc509a6f75849b', 1);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vistadetallecartera`
--
CREATE TABLE IF NOT EXISTS `vistadetallecartera` (
`id` int(11)
,`nombre` varchar(255)
,`totalIngresos` double(19,2)
,`totalEgresos` double(19,2)
,`total` double(19,2)
,`idUsuario` int(11)
,`activo` int(11)
);
-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vistamovimientos`
--
CREATE TABLE IF NOT EXISTS `vistamovimientos` (
`id` int(11)
,`comentario` varchar(255)
,`cantidad` float(7,2)
,`fecha` date
,`activo` int(11)
,`idCartera` int(11)
,`nomCategoria` varchar(255)
,`nomProducto` varchar(45)
);
-- --------------------------------------------------------

--
-- Estructura para la vista `vistadetallecartera`
--
DROP TABLE IF EXISTS `vistadetallecartera`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vistadetallecartera` AS select `tblcartera`.`id` AS `id`,`tblcartera`.`nombre` AS `nombre`,ifnull((select sum(`vistamovimientos`.`cantidad`) from `vistamovimientos` where ((`vistamovimientos`.`nomProducto` = 'N/A') and (`vistamovimientos`.`idCartera` = `tblcartera`.`id`))),0) AS `totalIngresos`,ifnull((select sum(`vistamovimientos`.`cantidad`) from `vistamovimientos` where ((`vistamovimientos`.`nomProducto` <> 'N/A') and (`vistamovimientos`.`idCartera` = `tblcartera`.`id`))),0) AS `totalEgresos`,(ifnull((select sum(`vistamovimientos`.`cantidad`) from `vistamovimientos` where ((`vistamovimientos`.`nomProducto` = 'N/A') and (`vistamovimientos`.`idCartera` = `tblcartera`.`id`))),0) - ifnull((select sum(`vistamovimientos`.`cantidad`) from `vistamovimientos` where ((`vistamovimientos`.`nomProducto` <> 'N/A') and (`vistamovimientos`.`idCartera` = `tblcartera`.`id`))),0)) AS `total`,`tblcartera`.`idUsuario` AS `idUsuario`,`tblcartera`.`activo` AS `activo` from (`tblcartera` left join `tblmovimiento` on((`tblmovimiento`.`idCartera` = `tblcartera`.`id`))) group by `tblmovimiento`.`idCartera`;

-- --------------------------------------------------------

--
-- Estructura para la vista `vistamovimientos`
--
DROP TABLE IF EXISTS `vistamovimientos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vistamovimientos` AS select `tblmovimiento`.`id` AS `id`,`tblmovimiento`.`comentario` AS `comentario`,`tblmovimiento`.`cantidad` AS `cantidad`,`tblmovimiento`.`fecha` AS `fecha`,`tblmovimiento`.`activo` AS `activo`,`tblmovimiento`.`idCartera` AS `idCartera`,`tblcategoria`.`nombre` AS `nomCategoria`,`tblproducto`.`nombre` AS `nomProducto` from ((`tblmovimiento` join `tblproducto` on((`tblmovimiento`.`idProducto` = `tblproducto`.`id`))) join `tblcategoria` on((`tblmovimiento`.`idCategoria` = `tblcategoria`.`id`))) where (`tblmovimiento`.`activo` = 1) order by `tblmovimiento`.`unix` desc;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tblcartera`
--
ALTER TABLE `tblcartera`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_tblcartera_tblusuario1_idx` (`idUsuario`);

--
-- Indices de la tabla `tblcategoria`
--
ALTER TABLE `tblcategoria`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_tblcategoria_tbltipo1_idx` (`idTipo`), ADD KEY `fk_tblcategoria_tblusuario1_idx` (`idUsuario`);

--
-- Indices de la tabla `tblmovimiento`
--
ALTER TABLE `tblmovimiento`
 ADD PRIMARY KEY (`id`), ADD KEY `cartera` (`idCartera`), ADD KEY `categoria` (`idCategoria`), ADD KEY `producto` (`idProducto`);

--
-- Indices de la tabla `tblproducto`
--
ALTER TABLE `tblproducto`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_tblproducto_tblconcepto1_idx` (`idCategoria`);

--
-- Indices de la tabla `tbltipo`
--
ALTER TABLE `tbltipo`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tblusuario`
--
ALTER TABLE `tblusuario`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `user_UNIQUE` (`user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tblcartera`
--
ALTER TABLE `tblcartera`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `tblcategoria`
--
ALTER TABLE `tblcategoria`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tblmovimiento`
--
ALTER TABLE `tblmovimiento`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `tblproducto`
--
ALTER TABLE `tblproducto`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tbltipo`
--
ALTER TABLE `tbltipo`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tblusuario`
--
ALTER TABLE `tblusuario`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tblcartera`
--
ALTER TABLE `tblcartera`
ADD CONSTRAINT `fk_tblcartera_tblusuario1` FOREIGN KEY (`idUsuario`) REFERENCES `tblusuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tblcategoria`
--
ALTER TABLE `tblcategoria`
ADD CONSTRAINT `fk_tblcategoria_tbltipo1` FOREIGN KEY (`idTipo`) REFERENCES `tbltipo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_tblcategoria_tblusuario1` FOREIGN KEY (`idUsuario`) REFERENCES `tblusuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tblmovimiento`
--
ALTER TABLE `tblmovimiento`
ADD CONSTRAINT `cartera` FOREIGN KEY (`idCartera`) REFERENCES `tblcartera` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `categoria` FOREIGN KEY (`idCategoria`) REFERENCES `tblcategoria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `producto` FOREIGN KEY (`idProducto`) REFERENCES `tblproducto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tblproducto`
--
ALTER TABLE `tblproducto`
ADD CONSTRAINT `fk_tblproducto_tblconcepto1` FOREIGN KEY (`idCategoria`) REFERENCES `tblcategoria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
