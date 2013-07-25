-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 25-07-2013 a las 04:14:05
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
-- Estructura de tabla para la tabla `sys_files`
--

CREATE TABLE IF NOT EXISTS `sys_files` (
  `id_file` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `fullpath` varchar(255) DEFAULT NULL,
  `size` decimal(20,0) DEFAULT '0',
  `image_width` int(11) DEFAULT '0',
  `image_height` int(11) DEFAULT '0',
  `image_type` varchar(20) DEFAULT NULL,
  `is_image` varchar(20) DEFAULT 'NO',
  PRIMARY KEY (`id_file`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
  `order` int(11) unsigned NOT NULL,
  `id_parent` int(11) unsigned DEFAULT '0',
  PRIMARY KEY (`id_page`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `sys_pages`
--

INSERT INTO `sys_pages` (`id_page`, `title`, `slug`, `order`, `id_parent`) VALUES
(1, 'Configuration', 'configuration', 1, 0),
(7, 'Pages', 'page', 2, 1),
(8, 'Users', 'user', 3, 1),
(14, 'Profile', 'profile', 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sys_permissions`
--

CREATE TABLE IF NOT EXISTS `sys_permissions` (
  `id_page` int(11) unsigned NOT NULL,
  `id_rol` int(11) unsigned NOT NULL,
  `create` varchar(3) DEFAULT 'NO',
  `read` varchar(3) DEFAULT 'NO',
  `update` varchar(3) DEFAULT 'NO',
  `delete` varchar(3) DEFAULT 'NO',
  PRIMARY KEY (`id_page`,`id_rol`),
  KEY `id_page` (`id_page`),
  KEY `id_rol` (`id_rol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sys_roles`
--

CREATE TABLE IF NOT EXISTS `sys_roles` (
  `id_rol` int(11) unsigned NOT NULL AUTO_INCREMENT,
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
('e5291c8ee8b0da81ac3db377f7c8cc7b', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:22.0) Gecko/20100101 Firefox/22.0', 1374722042, 'a:6:{s:9:"user_data";s:0:"";s:8:"username";s:8:"omar.mus";s:5:"email";s:20:"omargc.mus@gmail.com";s:7:"id_user";i:1;s:6:"id_rol";i:1;s:8:"loggedin";b:1;}');

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
  `state` varchar(20) DEFAULT 'CREATE',
  `id_rol` int(11) unsigned DEFAULT NULL,
  `id_photo` int(11) unsigned DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `phone` char(20) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `lang_code` varchar(10) DEFAULT 'EN',
  `mobile` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `email` (`email`),
  KEY `id_rol` (`id_rol`),
  KEY `id_photo` (`id_photo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Volcado de datos para la tabla `sys_users`
--

INSERT INTO `sys_users` (`id_user`, `username`, `password`, `email`, `first_name`, `last_name`, `state`, `id_rol`, `id_photo`, `created`, `phone`, `modified`, `lang_code`, `mobile`) VALUES
(1, 'omar.mus', '$2a$08$DC64wIdzwT1lwNmmEqd2gunVxX7VG9s05tAud/4ZGrwRIpPTAcdTu', 'omargc.mus@gmail.com', 'Omar', 'Gutiérrez', 'CREATE', 1, NULL, NULL, NULL, NULL, 'EN', NULL),
(23, 'jocabed@mail.com', '$2a$08$fmP1LU.3pn/E1A9A/VnFZuw7HwQwsgowo4gHSmZj.fIVeonG4qOnW', 'jocabed@mail.com', 'Jocabed', 'Carrillo', 'CREATE', 1, NULL, '2013-07-18 01:03:38', NULL, NULL, 'EN', NULL);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `sys_permissions`
--
ALTER TABLE `sys_permissions`
  ADD CONSTRAINT `sys_permissions_fk1` FOREIGN KEY (`id_rol`) REFERENCES `sys_roles` (`id_rol`),
  ADD CONSTRAINT `sys_permissions_fk` FOREIGN KEY (`id_page`) REFERENCES `sys_pages` (`id_page`);

--
-- Filtros para la tabla `sys_users`
--
ALTER TABLE `sys_users`
  ADD CONSTRAINT `sys_users_fk` FOREIGN KEY (`id_rol`) REFERENCES `sys_roles` (`id_rol`),
  ADD CONSTRAINT `sys_users_fk1` FOREIGN KEY (`id_photo`) REFERENCES `sys_files` (`id_file`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
