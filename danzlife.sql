-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 25-06-2018 a las 08:06:08
-- Versión del servidor: 5.7.22-0ubuntu0.16.04.1
-- Versión de PHP: 7.0.30-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `danzlife`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnas`
--

CREATE TABLE `alumnas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `grupo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alumnas`
--

INSERT INTO `alumnas` (`id`, `nombre`, `apellido`, `fecha_nacimiento`, `grupo`) VALUES
(2, 'Alejandra', 'Avalos', '1996-08-21', '1A'),
(3, 'Jazmin', 'Guevara', '1997-02-09', '1B'),
(4, 'Abigail', 'Sanchez', '1998-06-16', '2A'),
(5, 'Angela', 'Carrizales', '1997-06-18', '2A'),
(6, 'Mariana', 'petronila', '1997-10-17', '1B'),
(8, 'Selene', 'Torres', '1998-06-16', '5B');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

CREATE TABLE `grupos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `grupos`
--

INSERT INTO `grupos` (`id`, `nombre`) VALUES
(1, '1A'),
(2, '2A'),
(3, '1B'),
(4, '2B'),
(9, '5B');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id` int(11) NOT NULL,
  `id_alumna` int(11) NOT NULL,
  `id_grupo` int(11) NOT NULL,
  `mama` varchar(150) NOT NULL,
  `fecha_pago` date NOT NULL,
  `archivo` varchar(100) DEFAULT NULL,
  `fecha_registro` datetime NOT NULL,
  `folio` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`id`, `id_alumna`, `id_grupo`, `mama`, `fecha_pago`, `archivo`, `fecha_registro`, `folio`) VALUES
(39, 2, 4, 'qwe qwe', '2018-06-02', '01_00_32_output_4_0.png', '2018-06-25 01:00:32', '123123'),
(40, 2, 1, 'Abigail Sepulveda', '2018-06-07', '01_20_44_Captura de pantalla 2018-06-16 a la(s) 12.55.34 a. m..png', '2018-06-25 01:20:44', '123123'),
(41, 3, 2, 'Gabriela Echeverria', '2018-04-30', '01_21_17_output_3_0.png', '2018-06-25 01:21:17', '123123'),
(43, 4, 1, 'Yesica Arredondo', '2018-06-01', '04_15_12_Captura de pantalla 2018-06-16 a la(s) 12.55.34 a. m..png', '2018-06-25 04:15:12', '123123'),
(44, 5, 4, 'Maribel Guerrero', '2018-06-01', '04_16_22_output_4_0.png', '2018-06-25 04:16:22', '12451'),
(45, 8, 9, 'dfgdfg dfg', '2018-06-21', '06_53_54_plots.png', '2018-06-25 06:53:54', '345');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnas`
--
ALTER TABLE `alumnas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnas`
--
ALTER TABLE `alumnas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `grupos`
--
ALTER TABLE `grupos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
