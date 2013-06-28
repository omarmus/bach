-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 28-06-2013 a las 06:01:44
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `bach`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sys_migrations`
--

CREATE TABLE IF NOT EXISTS `sys_migrations` (
  `version` int(3) NOT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sys_migrations`
--

INSERT INTO `sys_migrations` (`version`) VALUES
(2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sys_pages`
--

CREATE TABLE IF NOT EXISTS `sys_pages` (
  `id_page` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `order` int(11) NOT NULL,
  `body` text NOT NULL,
  PRIMARY KEY (`id_page`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sys_roles`
--

CREATE TABLE IF NOT EXISTS `sys_roles` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `sys_roles`
--

INSERT INTO `sys_roles` (`id_rol`, `name`, `description`) VALUES
(1, 'Super Administrator', 'Super Administrator'),
(2, 'Administrator', 'Administrator'),
(3, 'User level 1', 'User level 1'),
(4, 'User level 2', 'User level 2'),
(5, 'User level 3', 'User level 3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sys_roles_x_user`
--

CREATE TABLE IF NOT EXISTS `sys_roles_x_user` (
  `id_rol` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_rol`,`id_user`),
  KEY `id_rol` (`id_rol`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sys_roles_x_user`
--

INSERT INTO `sys_roles_x_user` (`id_rol`, `id_user`) VALUES
(1, 1),
(1, 2),
(1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sys_sessions`
--

CREATE TABLE IF NOT EXISTS `sys_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sys_sessions`
--

INSERT INTO `sys_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('811fed568b772602127e15b1da5cceac', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:21.0) Gecko/20100101 Firefox/21.0', 1372398949, 'a:5:{s:8:"username";s:8:"omar.mus";s:5:"email";s:20:"omargc.mus@gmail.com";s:7:"id_user";i:1;s:8:"loggedin";b:1;s:6:"id_rol";i:1;}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sys_users`
--

CREATE TABLE IF NOT EXISTS `sys_users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `sys_users`
--

INSERT INTO `sys_users` (`id_user`, `username`, `password`, `email`, `first_name`, `last_name`) VALUES
(1, 'omar.mus', '$2a$08$DC64wIdzwT1lwNmmEqd2gunVxX7VG9s05tAud/4ZGrwRIpPTAcdTu', 'omargc.mus@gmail.com', 'Omar', 'Gutiérrez'),
(2, 'admin', 'admin123', 'admin@mail.com', 'Administrator', 'First'),
(3, 'Sheila', 'sheila123', 'sheila@mail.com', 'Jocabed', 'Carrillo');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `sys_roles_x_user`
--
ALTER TABLE `sys_roles_x_user`
  ADD CONSTRAINT `sys_roles_x_user_fk1` FOREIGN KEY (`id_user`) REFERENCES `sys_users` (`id_user`),
  ADD CONSTRAINT `sys_roles_x_user_fk` FOREIGN KEY (`id_rol`) REFERENCES `sys_roles` (`id_rol`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
