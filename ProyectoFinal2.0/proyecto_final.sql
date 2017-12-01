-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-12-2017 a las 00:58:47
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
(29, '2017-11-01', 'dapawa', 'fabrizio', 'bla bla bla'),
(32, '2017-11-24', 'fabrizio', 'rodrigo', 'rodrigo'),
(34, '2017-11-04', 'fabrizio', 'rodrigo', 'Mensaje de prueva'),
(46, '2017-11-09', 'bot1', 'fabrizio', 'algo que no se'),
(57, '2017-11-01', 'rodrigo', 'fabrizio', 'feliz cumple'),
(61, '2017-11-01', 'rodrigo', 'fabrizio', 'tetete'),
(62, '2017-11-01', 'rodrigo', 'fabrizio', 'tetete'),
(63, '2017-11-01', 'rodrigo', 'fabrizio', 'asdasdasd'),
(65, '2017-11-12', 'rodrigo', 'bot1', 'hola'),
(66, '2017-11-27', 'fabrizio', 'rodrigo', 'hola parce'),
(79, '2017-11-27', 'rodrigo', 'fabrizio', 'jellouuuuuuuuuuuu'),
(80, '2017-11-27', 'rodrigo', 'fabrizio', 'dsadsfsfsd'),
(81, '2017-11-27', 'rodrigo', 'fabrizio', 'dapawarullssaÃ±djaskldja'),
(82, '2017-11-27', 'rodrigo', 'fabrizio', 'dapawarullssaÃ±djaskldja'),
(83, '2017-11-27', 'rodrigo', 'fabrizio', 'dapawarullssaÃ±djaskldja'),
(84, '2017-11-27', 'rodrigo', 'fabrizio', 'dapawarullssaÃ±djaskldja'),
(95, '2017-11-30', 'FabrizioRodrigo', 'RodrigoAli', 'Hola Amigo Como estas ? '),
(96, '2017-11-30', 'FabrizioRodrigo', 'RodrigoAli', 'Todo Bien ?'),
(97, '2017-11-30', 'RodrigoAli', 'FabrizioRodrigo', 'Claro Todo Bien Gracias Por Preguntar'),
(98, '2017-11-30', 'RodrigoAli', 'FabrizioRodrigo', ':)'),
(99, '2017-11-30', 'RodrigoAli', 'FabrizioRodrigo', 'y como te va a ti ? '),
(101, '2017-11-30', 'RodrigoAli', 'FabrizioRodrigo', 'todo bien en el trabajo?'),
(102, '2017-11-30', 'FabrizioRodrigo', 'RodrigoAli', 'Todo Genial :)'),
(103, '2017-11-30', 'FabrizioRodrigo', 'RodrigoAli', 'justo hoy me subieron el sueldo xD'),
(104, '2017-12-01', 'fabrizio', 'rodrigo', 'test ssss'),
(105, '2017-12-01', 'fabrizio', 'rodrigo', 'xdddddddd'),
(106, '2017-12-01', 'fabrizio', 'rodrigo', 'algo reandom'),
(107, '2017-12-01', 'fabrizio', 'FabrizioRodrigo', 'Hola quiero ser tu amigo ^_^');

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
(17, 'dapawaruls', '951706175', 'USA', 'dapawa', 'Dapawarils'),
(18, 'FabrizioRodrigo', '951703175', 'Arequipa-Peru', '123', 'Fabrizio Flores Pari'),
(19, 'RodrigoAli', '951703176', 'Arequipa-Peru', '123', 'Rodrigo Ali');

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
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
