-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-11-2017 a las 16:08:23
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto_final`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `id` int(15) NOT NULL,
  `fecha_enviado` date NOT NULL,
  `remitente` varchar(250) NOT NULL,
  `destinatario` varchar(250) NOT NULL,
  `contenido` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`id`, `fecha_enviado`, `remitente`, `destinatario`, `contenido`) VALUES
(1, '2017-11-30', 'fabrizio', 'rodrigo', 'Hola'),
(2, '2017-12-30', 'rodrigo', 'fabrizio', 'hola que tal'),
(3, '0000-00-00', 'fabrizio', 'dapawa', 'Muerete'),
(29, '2017-11-01', 'dapawa', 'fabrizio', 'bla bla bla'),
(30, '0000-00-00', 'dapawa', 'rodrigo', 'hola que tal como estas '),
(32, '2017-11-24', 'fabrizio', 'rodrigo', 'rodrigo'),
(34, '2017-11-04', 'fabrizio', 'rodrigo', 'Mensaje de prueva'),
(39, '0000-00-00', 'fabrizio', 'dapawa', 'hola que hace'),
(41, '0000-00-00', 'fabrizio', 'dapawa', 'hola iÃ±igo'),
(42, '0000-00-00', 'fabrizio', 'dapawa', 'TEST TEST TEST TEST'),
(43, '0000-00-00', 'fabrizio', 'dapawa', 'Hola como estas'),
(44, '0000-00-00', 'dapawa', 'fabrizio', 'Mensaje de prueva'),
(45, '0000-00-00', 'fabrizio', 'dapawa', 'Mensaje'),
(46, '2017-11-09', 'bot1', 'fabrizio', 'algo que no se'),
(55, '0000-00-00', 'dsadasd', 'asd', 'asdasdasd'),
(56, '0000-00-00', 'a', 'a', 'a'),
(57, '2017-11-01', 'rodrigo', 'fabrizio', 'feliz cumple'),
(58, '0000-00-00', 'rodrigo', 'fabrizio', 'test'),
(59, '0000-00-00', 'rodrigo', 'fabrizio', 'test'),
(60, '0000-00-00', 'rodrigo', 'fabrizio', 'test'),
(61, '2017-11-01', 'rodrigo', 'fabrizio', 'tetete'),
(62, '2017-11-01', 'rodrigo', 'fabrizio', 'tetete'),
(63, '2017-11-01', 'rodrigo', 'fabrizio', 'asdasdasd'),
(64, '2018-01-01', 'rodrigo', 'fabrizio', 'test t2t2t2t2t2'),
(65, '2017-11-12', 'rodrigo', 'bot1', 'hola');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(100) NOT NULL,
  `usuario` varchar(250) NOT NULL,
  `celular` varchar(250) NOT NULL,
  `pais` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `nombre` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `celular`, `pais`, `password`, `nombre`) VALUES
(6, 'fabrizio', ' 951703175 ', ' Arequipa ', 'fabrizio', ' Fabrizio '),
(8, 'rodrigo', '9517031755', 'peru', 'rodrigo', 'Rodrigo'),
(9, 'bot1', '951703177', 'Arequipa ', '123', 'bot1'),
(11, 'bot2', '951703171', 'Peru', '1234', 'bot2'),
(16, 'asdasd', 'asdasd', 'asdasd', '', 'sadasd');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
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
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
