-- phpMyAdmin SQL Dump
-- version 4.6.5.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 08-06-2018 a las 06:54:12
-- Versión del servidor: 5.6.34
-- Versión de PHP: 7.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `prodedb`
--
CREATE DATABASE IF NOT EXISTS `prodedb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `prodedb`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE `equipos` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  `bandera` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`id`, `descripcion`, `bandera`) VALUES
(1, 'Argentina', 'Argentina.ico'),
(2, 'Brasil', 'Brazil.ico'),
(3, 'Rusia', 'Russia.ico'),
(4, 'Portugal', 'Portugal.ico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos_usuarios`
--

CREATE TABLE `grupos_usuarios` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partidos`
--

CREATE TABLE `partidos` (
  `id` int(11) NOT NULL,
  `torneo_id` int(11) NOT NULL,
  `equipo_id_local` int(11) NOT NULL,
  `equipo_id_visitante` int(11) NOT NULL,
  `equipo_id_ganador` int(11) DEFAULT NULL,
  `fecha` varchar(40) NOT NULL,
  `dia_partido` datetime NOT NULL,
  `goles_local` int(11) DEFAULT NULL,
  `goles_visitante` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `partidos`
--

INSERT INTO `partidos` (`id`, `torneo_id`, `equipo_id_local`, `equipo_id_visitante`, `equipo_id_ganador`, `fecha`, `dia_partido`, `goles_local`, `goles_visitante`, `created`, `modified`) VALUES
(1, 1, 2, 3, NULL, 'PRIMERA FECHA', '2018-06-20 11:58:00', 3, 3, '2018-06-03 12:01:56', '2018-06-07 00:23:08'),
(6, 1, 1, 3, NULL, 'PRIMERA FECHA', '2018-06-07 01:45:00', 5, 5, '2018-06-06 23:50:19', '2018-06-07 19:05:32'),
(7, 1, 3, 4, NULL, 'PRIMERA FECHA', '2018-06-13 23:50:00', 0, 0, '2018-06-06 23:50:33', '2018-06-08 01:00:09'),
(9, 1, 2, 4, NULL, 'PRIMERA FECHA', '2018-06-09 18:39:00', 0, 1, '2018-06-07 18:39:52', '2018-06-08 01:01:24'),
(10, 1, 2, 1, NULL, 'PRIMERA FECHA', '2018-06-13 18:59:00', 2, 0, '2018-06-07 18:59:30', '2018-06-07 21:45:25'),
(11, 1, 1, 4, NULL, 'PRIMERA FECHA', '2018-06-08 03:53:00', 2, 2, '2018-06-07 21:49:45', '2018-06-08 01:51:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partidos_apuestas_users`
--

CREATE TABLE `partidos_apuestas_users` (
  `partido_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `goles_local` int(11) NOT NULL,
  `goles_visitante` int(11) NOT NULL,
  `acertado` tinyint(1) NOT NULL DEFAULT '0',
  `cargado` tinyint(1) NOT NULL DEFAULT '0',
  `puntaje_obtenido` int(11) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `partidos_apuestas_users`
--

INSERT INTO `partidos_apuestas_users` (`partido_id`, `user_id`, `goles_local`, `goles_visitante`, `acertado`, `cargado`, `puntaje_obtenido`, `created`, `modified`, `id`) VALUES
(1, 20, 1, 0, 0, 1, 0, '2018-06-08 00:32:55', '2018-06-08 01:53:12', 6),
(7, 20, 0, 0, 0, 1, 3, '2018-06-08 00:51:20', '2018-06-08 01:53:12', 7),
(9, 20, 1, 1, 0, 1, 0, '2018-06-08 00:51:26', '2018-06-08 01:53:12', 8),
(10, 20, 2, 0, 0, 1, 3, '2018-06-08 00:51:31', '2018-06-08 01:53:12', 9),
(11, 20, 0, 0, 0, 1, 1, '2018-06-08 00:51:39', '2018-06-08 01:53:12', 10),
(9, 22, 2, 0, 0, 1, 0, '2018-06-08 01:44:02', '2018-06-08 01:47:51', 11),
(1, 22, 0, 0, 0, 1, 1, '2018-06-08 01:44:23', '2018-06-08 01:47:51', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `descripcion`) VALUES
(1, 'ADMINISTRADOR'),
(2, 'USUARIOS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `torneos`
--

CREATE TABLE `torneos` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  `fecha_inicio` datetime DEFAULT NULL,
  `fecha_fin` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `torneos`
--

INSERT INTO `torneos` (`id`, `descripcion`, `fecha_inicio`, `fecha_fin`, `created`, `modified`, `active`) VALUES
(1, 'Mundial Rusia 2018', '2018-06-19 10:00:00', '2018-07-19 10:00:00', '2018-06-03 11:12:00', '2018-06-03 11:12:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nombre` varchar(65) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `grupo_id` int(11) DEFAULT NULL,
  `rol_id` int(11) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nombre`, `apellido`, `grupo_id`, `rol_id`, `active`) VALUES
(20, 'admin', '$2y$10$weYAS98Zf0Xuaj3waiizyOLV7mrDzF6V1G6nD1OZLtfMtCQGDk5Pa', 'Nicolas', 'Quiroga', NULL, 1, 1),
(21, 'usuario', '$2y$10$DZHTOAaDCDpDcT4Dptvr5ORcXZ4jgVVnK3VXdQYqBqrvjSclkaAFa', 'usuario', 'usuario', NULL, 2, 1),
(22, 'dquipildor', '$2y$10$6sGdKWlBGXW/D0Ohg9va2u/qACuSz.w83xtqUIHODQKFoUa3knzaq', 'David', 'Quipildor', NULL, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_torneos`
--

CREATE TABLE `users_torneos` (
  `torneo_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users_torneos`
--

INSERT INTO `users_torneos` (`torneo_id`, `user_id`, `id`) VALUES
(1, 20, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `descripcion_UNIQUE` (`descripcion`);

--
-- Indices de la tabla `grupos_usuarios`
--
ALTER TABLE `grupos_usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `descripcion_UNIQUE` (`descripcion`);

--
-- Indices de la tabla `partidos`
--
ALTER TABLE `partidos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `torneo_id` (`torneo_id`,`equipo_id_local`,`equipo_id_visitante`,`fecha`),
  ADD UNIQUE KEY `unique_index` (`torneo_id`,`equipo_id_local`,`equipo_id_visitante`,`fecha`),
  ADD UNIQUE KEY `unique_partidos` (`torneo_id`,`equipo_id_local`,`equipo_id_visitante`,`fecha`),
  ADD KEY `equipos_ganador_partidos_idx` (`equipo_id_ganador`),
  ADD KEY `equipos_visitante_partidos_idx` (`equipo_id_visitante`),
  ADD KEY `equipos_local_partidos_idx` (`equipo_id_local`);

--
-- Indices de la tabla `partidos_apuestas_users`
--
ALTER TABLE `partidos_apuestas_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_partidos_apuestas_usuarios` (`user_id`,`partido_id`),
  ADD KEY `apuestas_partidos` (`partido_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `descripcion_UNIQUE` (`descripcion`);

--
-- Indices de la tabla `torneos`
--
ALTER TABLE `torneos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`),
  ADD UNIQUE KEY `nombre_UNIQUE` (`nombre`),
  ADD UNIQUE KEY `apellido_UNIQUE` (`apellido`),
  ADD KEY `roles_usuarios_idx` (`rol_id`),
  ADD KEY `grupos_usuarios_usuarios_idx` (`grupo_id`);

--
-- Indices de la tabla `users_torneos`
--
ALTER TABLE `users_torneos`
  ADD PRIMARY KEY (`torneo_id`,`user_id`,`id`),
  ADD UNIQUE KEY `torneo_id_UNIQUE` (`torneo_id`),
  ADD UNIQUE KEY `user_id_UNIQUE` (`user_id`),
  ADD KEY `users_users_idx` (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `grupos_usuarios`
--
ALTER TABLE `grupos_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `partidos`
--
ALTER TABLE `partidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `partidos_apuestas_users`
--
ALTER TABLE `partidos_apuestas_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `torneos`
--
ALTER TABLE `torneos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `partidos`
--
ALTER TABLE `partidos`
  ADD CONSTRAINT `equipos_ganador_partidos` FOREIGN KEY (`equipo_id_ganador`) REFERENCES `equipos` (`id`),
  ADD CONSTRAINT `equipos_local_partidos` FOREIGN KEY (`equipo_id_local`) REFERENCES `equipos` (`id`),
  ADD CONSTRAINT `equipos_visitante_partidos` FOREIGN KEY (`equipo_id_visitante`) REFERENCES `equipos` (`id`),
  ADD CONSTRAINT `torneo_partidos` FOREIGN KEY (`torneo_id`) REFERENCES `torneos` (`id`);

--
-- Filtros para la tabla `partidos_apuestas_users`
--
ALTER TABLE `partidos_apuestas_users`
  ADD CONSTRAINT `apuestas_partidos` FOREIGN KEY (`partido_id`) REFERENCES `partidos` (`id`),
  ADD CONSTRAINT `apuestas_usuarios` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `grupos_usuarios_usuarios` FOREIGN KEY (`grupo_id`) REFERENCES `grupos_usuarios` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `roles_usuarios` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Filtros para la tabla `users_torneos`
--
ALTER TABLE `users_torneos`
  ADD CONSTRAINT `users_torneos_users` FOREIGN KEY (`torneo_id`) REFERENCES `torneos` (`id`),
  ADD CONSTRAINT `users_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
