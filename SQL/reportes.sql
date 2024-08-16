-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-08-2024 a las 14:33:10
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
-- Base de datos: `reportes`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizar_descripcion_ticket` (IN `p_id_ticket` INT, IN `p_nueva_descripcion` TEXT)   BEGIN
    -- Actualiza la descripción del ticket concatenando la nueva descripción
    UPDATE ticket 
    SET descripcion = CONCAT(descripcion, p_nueva_descripcion)
    WHERE id = p_id_ticket;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizar_estado_ticket` (IN `id_ticket` INT, IN `nuevo_estado` ENUM("Nuevo","En progreso","Finalizado"))   BEGIN
    -- Actualiza la descripción del ticket concatenando la nueva descripción
    UPDATE ticket 
    SET estado = nuevo_estado
    WHERE id = id_ticket;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizar_estado_usuario` (IN `usuario_id` INT, IN `nuevo_estado` TINYINT)   BEGIN
    UPDATE usuario SET estado = nuevo_estado WHERE id = usuario_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `cambiar_contraseña_usuario` (IN `usuario_id` INT, IN `nueva_contraseña` VARCHAR(100))   BEGIN
    UPDATE usuario SET contraseña = nueva_contraseña WHERE id = usuario_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertar_mensaje_chat` (IN `id_ticket` INT, IN `id_usuario` INT, IN `mensaje` TEXT)   BEGIN
  INSERT INTO chat (id_ticket, id_usuario, mensaje, fecha_envio)
  VALUES (id_ticket, id_usuario, mensaje, NOW());
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertar_soporte` (IN `id_usuario` INT, IN `curp` CHAR(18), IN `rfc` VARCHAR(13), IN `numero_seguro_social` CHAR(11))   BEGIN
    INSERT INTO soporte (id_usuario, curp, rfc, numero_seguro_social)
    VALUES (id_usuario, curp, rfc, numero_seguro_social);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `obtener_tickets_por_estado` (IN `p_estado` ENUM('Nuevo','En progreso','Finalizado'))   BEGIN
    IF p_estado = 'Nuevo' THEN
        SELECT * FROM ticket t
        WHERE t.estado = p_estado;

    ELSEIF p_estado = 'En progreso' THEN
        SELECT * FROM ticket t
        WHERE t.estado = p_estado;

    ELSEIF p_estado = 'Finalizado' THEN
        SELECT * FROM ticket t
        WHERE t.estado = p_estado;
    END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `obtener_tickets_por_fecha` (IN `p_fecha_inicio` DATE, IN `p_fecha_fin` DATE)   BEGIN
    SELECT * FROM ticket
    WHERE DATE(fecha_creacion) BETWEEN p_fecha_inicio AND p_fecha_fin;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `obtener_tickets_por_tiempo` (IN `intervalo` ENUM('Mensual','Bimestral','Semestral','Anual'))   BEGIN
    CASE intervalo
        WHEN 'Mensual' THEN
            SELECT DATE_FORMAT(fecha_creacion, '%Y-%m') AS Periodo,
                   COUNT(*) AS Total_Tickets
            FROM ticket
            GROUP BY Periodo;
        WHEN 'Bimestral' THEN
            SELECT CONCAT(YEAR(fecha_creacion), '-', LPAD((MONTH(fecha_creacion) + 1) DIV 2, 2, '0')) AS Periodo,
                   COUNT(*) AS Total_Tickets
            FROM ticket
            GROUP BY Periodo;
        WHEN 'Semestral' THEN
            SELECT CONCAT(YEAR(fecha_creacion), '-', IF(MONTH(fecha_creacion) <= 6, '01', '02')) AS Periodo,
                   COUNT(*) AS Total_Tickets
            FROM ticket
            GROUP BY Periodo;
        WHEN 'Anual' THEN
            SELECT YEAR(fecha_creacion) AS Periodo,
                   COUNT(*) AS Total_Tickets
            FROM ticket
            GROUP BY Periodo;
        ELSE
            SELECT 'Intervalo no válido' AS Error;
    END CASE;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `obtener_tickets_por_usuario` (IN `usuario_id` INT)   BEGIN
    SELECT t.id, t.id_usuario, t.descripcion, t.estado, t.fecha_creacion, t.fecha_cierre, t.id_encuesta
    FROM ticket t
    WHERE t.id_usuario = usuario_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `obtener_ticket_por_id` (IN `p_id_ticket` INT)   BEGIN
    SELECT t.id, t.id_soporte, t.id_usuario, t.descripcion, t.fecha_creacion, t.fecha_cierre, t.estado
    FROM ticket t
    WHERE t.id = p_id_ticket;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `obtener_usuarios_por_rol` (IN `rol_usuario` ENUM('admin','usuario','soporte'))   BEGIN
    SELECT id, usuario, correo
    FROM usuario
    WHERE rol = rol_usuario;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `obtener_usuario_por_id` (IN `usuario_id` INT)   BEGIN
    SELECT * FROM usuario WHERE id = usuario_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `registrar_usuario` (IN `nombre` VARCHAR(100), IN `apellido_paterno` VARCHAR(100), IN `apellido_materno` VARCHAR(100), IN `correo` VARCHAR(100), IN `usuario` VARCHAR(100), IN `contraseña` VARCHAR(100), IN `telefono` CHAR(10), IN `fecha_nacimiento` DATE, IN `rol` ENUM('admin','usuario','soporte'))   BEGIN
    DECLARE hashed_password VARCHAR(100);

    -- Cifrar la contraseña
    SET hashed_password = SHA2(contraseña, 256);

    -- Insertar el usuario en la tabla
    INSERT INTO usuario (
        nombre, apellido_paterno, apellido_materno, correo, usuario, contraseña, telefono, fecha_nacimiento, rol
    ) VALUES (
        nombre, apellido_paterno, apellido_materno, correo, usuario, hashed_password, telefono, fecha_nacimiento, rol
    );
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `tomar_ticket` (IN `p_id_ticket` INT, IN `p_id_soporte` INT)   BEGIN
    -- Verificamos que el p_id_soporte no sea NULL
    IF p_id_soporte IS NULL THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'El id_soporte no puede ser NULL';
    ELSE
        -- Verificamos que el ticket esté en estado 'Nuevo' antes de asignar el soporte
        IF (SELECT estado FROM ticket WHERE id = p_id_ticket) = 'Nuevo' THEN
            UPDATE ticket
            SET id_soporte = p_id_soporte, estado = 'En progreso'
            WHERE id = p_id_ticket;
        ELSE
            SIGNAL SQLSTATE '45000'
            SET MESSAGE_TEXT = 'El ticket ya está asignado y/o finalizado';
        END IF;
    END IF;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta`
--

CREATE TABLE `pregunta` (
  `id` int(11) NOT NULL,
  `pregunta` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pregunta`
--

INSERT INTO `pregunta` (`id`, `pregunta`) VALUES
(1, 'Cómo calificarías la amabilidad del agente?\r\n'),
(2, '¿El agente comprendió correctamente tu problema?'),
(3, '¿La explicación proporcionada fue clara?'),
(4, '¿El tiempo de respuesta fue adecuado?'),
(5, '¿Cómo calificarías la competencia técnica del agente?'),
(6, '¿El agente mantuvo una actitud profesional durante la conversación?'),
(7, '¿Recibiste la ayuda necesaria para resolver tu problema?'),
(8, '¿El agente te proporcionó información adicional útil?'),
(9, '¿El agente fue paciente al responder tus preguntas?'),
(10, '¿El agente fue respetuoso en todo momento?'),
(11, '¿La solución ofrecida resolvió el problema de forma definitiva?'),
(12, '¿Cómo calificarías la actitud general del agente durante la asistencia?'),
(13, '¿El agente se comunicó de manera clara y comprensible?'),
(14, '¿La solución proporcionada se ajustó a tus expectativas?'),
(15, '¿Cómo calificarías la habilidad del agente para resolver problemas complejos?');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas`
--

CREATE TABLE `respuestas` (
  `id` int(11) NOT NULL,
  `id_ticket` int(11) DEFAULT NULL,
  `pregunta_id` int(11) DEFAULT NULL,
  `calificacion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `respuestas`
--



--
-- Estructura de tabla para la tabla `soporte`
--

CREATE TABLE `soporte` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `curp` char(18) NOT NULL,
  `rfc` varchar(13) NOT NULL,
  `numero_seguro_social` char(11) NOT NULL,
  `ine` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `soporte`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticket`
--

CREATE TABLE `ticket` (
  `id` int(11) NOT NULL,
  `id_soporte` int(11) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `fecha_creacion` datetime DEFAULT current_timestamp(),
  `fecha_cierre` datetime DEFAULT NULL,
  `estado` enum('Nuevo','En progreso','Finalizado') DEFAULT 'Nuevo',
  `id_encuesta` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `contraseña` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `estado` tinyint(1) DEFAULT 0,
  `nombre` varchar(100) DEFAULT NULL,
  `apellido_paterno` varchar(100) DEFAULT NULL,
  `apellido_materno` varchar(100) DEFAULT NULL,
  `fecha_nacimiento` date NOT NULL,
  `telefono` char(10) NOT NULL,
  `rol` enum('admin','usuario','soporte') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--


-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `view_respuestas_por_ticket`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `view_respuestas_por_ticket` (
`respuesta_id` int(11)
,`id_ticket` int(11)
,`pregunta` varchar(255)
,`calificacion` varchar(255)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `view_soportes_info_usuario`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `view_soportes_info_usuario` (
`soporte_id` int(11)
,`nombre_usuario` varchar(100)
,`apellido_usuario` varchar(100)
,`curp` char(18)
,`rfc` varchar(13)
,`numero_seguro_social` char(11)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `view_tickets_detalle`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `view_tickets_detalle` (
`ticket_id` int(11)
,`descripcion` text
,`fecha_creacion` datetime
,`fecha_cierre` datetime
,`estado` enum('Nuevo','En progreso','Finalizado')
,`nombre_usuario` varchar(100)
,`apellido_usuario` varchar(100)
,`id_soporte` int(11)
,`curp_soporte` char(18)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `view_tickets_finalizados`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `view_tickets_finalizados` (
`id` int(11)
,`descripcion` text
,`fecha_creacion` datetime
,`fecha_cierre` datetime
,`id_usuario` int(11)
,`id_soporte` int(11)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `view_tickets_por_usuario`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `view_tickets_por_usuario` (
`usuario_id` int(11)
,`nombre` varchar(100)
,`apellido_paterno` varchar(100)
,`total_tickets` bigint(21)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `view_usuarios_activos`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `view_usuarios_activos` (
`id` int(11)
,`usuario` varchar(100)
,`correo` varchar(100)
,`nombre` varchar(100)
,`apellido_paterno` varchar(100)
,`apellido_materno` varchar(100)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `view_respuestas_por_ticket`
--
DROP TABLE IF EXISTS `view_respuestas_por_ticket`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_respuestas_por_ticket`  AS SELECT `r`.`id` AS `respuesta_id`, `r`.`id_ticket` AS `id_ticket`, `p`.`pregunta` AS `pregunta`, `r`.`calificacion` AS `calificacion` FROM (`respuestas` `r` join `pregunta` `p` on(`r`.`pregunta_id` = `p`.`id`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `view_soportes_info_usuario`
--
DROP TABLE IF EXISTS `view_soportes_info_usuario`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_soportes_info_usuario`  AS SELECT `s`.`id` AS `soporte_id`, `u`.`nombre` AS `nombre_usuario`, `u`.`apellido_paterno` AS `apellido_usuario`, `s`.`curp` AS `curp`, `s`.`rfc` AS `rfc`, `s`.`numero_seguro_social` AS `numero_seguro_social` FROM (`soporte` `s` join `usuario` `u` on(`s`.`id_usuario` = `u`.`id`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `view_tickets_detalle`
--
DROP TABLE IF EXISTS `view_tickets_detalle`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_tickets_detalle`  AS SELECT `t`.`id` AS `ticket_id`, `t`.`descripcion` AS `descripcion`, `t`.`fecha_creacion` AS `fecha_creacion`, `t`.`fecha_cierre` AS `fecha_cierre`, `t`.`estado` AS `estado`, `u`.`nombre` AS `nombre_usuario`, `u`.`apellido_paterno` AS `apellido_usuario`, `s`.`id_usuario` AS `id_soporte`, `s`.`curp` AS `curp_soporte` FROM ((`ticket` `t` join `usuario` `u` on(`t`.`id_usuario` = `u`.`id`)) join `soporte` `s` on(`t`.`id_soporte` = `s`.`id`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `view_tickets_finalizados`
--
DROP TABLE IF EXISTS `view_tickets_finalizados`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_tickets_finalizados`  AS SELECT `ticket`.`id` AS `id`, `ticket`.`descripcion` AS `descripcion`, `ticket`.`fecha_creacion` AS `fecha_creacion`, `ticket`.`fecha_cierre` AS `fecha_cierre`, `ticket`.`id_usuario` AS `id_usuario`, `ticket`.`id_soporte` AS `id_soporte` FROM `ticket` WHERE `ticket`.`estado` = 'Finalizado' ;

-- --------------------------------------------------------

--
-- Estructura para la vista `view_tickets_por_usuario`
--
DROP TABLE IF EXISTS `view_tickets_por_usuario`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_tickets_por_usuario`  AS SELECT `u`.`id` AS `usuario_id`, `u`.`nombre` AS `nombre`, `u`.`apellido_paterno` AS `apellido_paterno`, count(`t`.`id`) AS `total_tickets` FROM (`usuario` `u` left join `ticket` `t` on(`u`.`id` = `t`.`id_usuario`)) GROUP BY `u`.`id` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `view_usuarios_activos`
--
DROP TABLE IF EXISTS `view_usuarios_activos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_usuarios_activos`  AS SELECT `usuario`.`id` AS `id`, `usuario`.`usuario` AS `usuario`, `usuario`.`correo` AS `correo`, `usuario`.`nombre` AS `nombre`, `usuario`.`apellido_paterno` AS `apellido_paterno`, `usuario`.`apellido_materno` AS `apellido_materno` FROM `usuario` WHERE `usuario`.`estado` = 1 ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_ticket` (`id_ticket`),
  ADD KEY `pregunta_id` (`pregunta_id`);

--
-- Indices de la tabla `soporte`
--
ALTER TABLE `soporte`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `curp` (`curp`),
  ADD UNIQUE KEY `rfc` (`rfc`),
  ADD UNIQUE KEY `numero_seguro_social` (`numero_seguro_social`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_soporte` (`id_soporte`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `soporte`
--
ALTER TABLE `soporte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD CONSTRAINT `respuestas_ibfk_1` FOREIGN KEY (`id_ticket`) REFERENCES `ticket` (`id`),
  ADD CONSTRAINT `respuestas_ibfk_2` FOREIGN KEY (`pregunta_id`) REFERENCES `pregunta` (`id`);

--
-- Filtros para la tabla `soporte`
--
ALTER TABLE `soporte`
  ADD CONSTRAINT `soporte_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`id_soporte`) REFERENCES `soporte` (`id`),
  ADD CONSTRAINT `ticket_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
