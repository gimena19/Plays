-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-09-2018 a las 08:22:39
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `goldenglove`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenidos`
--

CREATE TABLE `contenidos` (
  `contenidoId` bigint(20) NOT NULL,
  `contenido` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `titulo` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `paginaId` bigint(20) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `orden` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `contenidos`
--

INSERT INTO `contenidos` (`contenidoId`, `contenido`, `titulo`, `paginaId`, `fecha`, `orden`) VALUES
(1, 'hola', 'prueba', 1, NULL, 1),
(2, 'Esta es una prueba de funcionamiento del formulario modal para insertar contenido desde cualquier pÃ¡gina de creada, ya sea \"index\", \"nosotros\", \"entrenamientos\", etc.... \r\nCon este funcionamiento hemos logrado un gran avance, ahora,solo falta agregar imÃ¡genes a las publicaciones.', 'Prueba de funcionami', 1, NULL, 2),
(3, 'preuba', '123456789123456789', 1, NULL, 3),
(4, 'aewfaefafa', 'efafawe', 1, NULL, 4),
(5, 'sregsehrhrthsth', 'prueba pag', 1, NULL, 5),
(6, 'ProveyÃ©ndoles, mÃ¡s oportunidades a los boxeadores del Ã¡rea,\r\n\r\nque no han podido superarse a causa de las grandes compaÃ±Ã­as boxÃ­sticas que han dejado en el olvido esta zona de Puerto Rico.\r\n\r\nAsÃ­, rescataremos los boxeadores y los guiaremos hacia el camino del Ã©xito.\r\n\r\nPorque entendemos que tienen todos las cualidades que se requieren para ser grandes campeones.', 'MisiÃ³n', 2, NULL, 1),
(7, 'prueba<br><br>\r\nquiero quitar las etiquetas <br> de los textarea chales...', 'VisÃ­on superheroe', 2, NULL, 2),
(8, 'Este es un objetivo rÃ¡pido de la represa.\r\n\r\nEste objetivo estÃ¡ escrito desde un celular para corroborar su funcionamiento.\r\n\r\nAÃºn no puedo quitar las etiquetas br del textarea...', 'Objetivo', 2, NULL, 3),
(9, 'esta es una prueba para quitar los espacios\r\n\r\na este parrafo se le dio 2 enter\r\n\r\n\r\na este se le dio 3 enter', 'prueba sin br', 1, NULL, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `estadoId` bigint(20) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `imagenId` bigint(20) NOT NULL,
  `link` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `titulo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `contenidoId` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagina`
--

CREATE TABLE `pagina` (
  `paginaId` bigint(20) NOT NULL,
  `nombre` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pagina`
--

INSERT INTO `pagina` (`paginaId`, `nombre`) VALUES
(3, 'entrenamiento'),
(4, 'galeria'),
(1, 'index'),
(2, 'nosotros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuario`
--

CREATE TABLE `tipousuario` (
  `tipoUsuarioId` bigint(20) NOT NULL,
  `tipoUsuario` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipousuario`
--

INSERT INTO `tipousuario` (`tipoUsuarioId`, `tipoUsuario`) VALUES
(1, 'admin'),
(2, 'socio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `usuarioId` bigint(20) NOT NULL,
  `nombre` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `apellidoMat` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `apellidoPat` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `sexo` char(1) COLLATE utf8_spanish_ci NOT NULL,
  `mail` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `calle` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `numeroInt` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `cp` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `colonia` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `estado` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `fechaIng` date NOT NULL,
  `usuario` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `psw` longtext COLLATE utf8_spanish_ci NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `tipoUsuarioId` bigint(20) NOT NULL,
  `fechaAlta` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usuarioId`, `nombre`, `apellidoMat`, `apellidoPat`, `sexo`, `mail`, `calle`, `numeroInt`, `cp`, `colonia`, `estado`, `telefono`, `fechaIng`, `usuario`, `psw`, `activo`, `tipoUsuarioId`, `fechaAlta`) VALUES
(1, 'Luis', 'Olvera', 'Guajardo', 'M', 'imxrako@gmail.com', 'Av. central', '45', '78395', 'Zona Ind', 'San Luis PotosÃ­', '8320000', '2018-09-12', 'LuisG', 'pass', 1, 1, '2018-09-12');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contenidos`
--
ALTER TABLE `contenidos`
  ADD PRIMARY KEY (`contenidoId`),
  ADD KEY `paginaId_idx` (`paginaId`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`estadoId`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`imagenId`),
  ADD KEY `contenidoId` (`contenidoId`);

--
-- Indices de la tabla `pagina`
--
ALTER TABLE `pagina`
  ADD PRIMARY KEY (`paginaId`),
  ADD UNIQUE KEY `nombre_UNIQUE` (`nombre`);

--
-- Indices de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  ADD PRIMARY KEY (`tipoUsuarioId`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuarioId`),
  ADD KEY `tipoUsuarioIdFK` (`tipoUsuarioId`),
  ADD KEY `estadoIdFK` (`estado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contenidos`
--
ALTER TABLE `contenidos`
  MODIFY `contenidoId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `estadoId` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `imagenId` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pagina`
--
ALTER TABLE `pagina`
  MODIFY `paginaId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  MODIFY `tipoUsuarioId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usuarioId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `contenidos`
--
ALTER TABLE `contenidos`
  ADD CONSTRAINT `paginaId` FOREIGN KEY (`paginaId`) REFERENCES `pagina` (`paginaId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD CONSTRAINT `imagenes_ibfk_1` FOREIGN KEY (`contenidoId`) REFERENCES `contenidos` (`contenidoId`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `tipoUsuarioIdFK` FOREIGN KEY (`tipoUsuarioId`) REFERENCES `tipousuario` (`tipoUsuarioId`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
