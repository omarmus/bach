-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 23-08-2013 a las 04:50:58
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Volcado de datos para la tabla `sys_files`
--

INSERT INTO `sys_files` (`id_file`, `filename`, `title`, `type`, `fullpath`, `size`, `image_width`, `image_height`, `image_type`, `is_image`) VALUES
(2, '1f80766f6c90d53762514faaa4414cb9.png', '', 'image/png', 'C:/wamp/www/bach/public_html/files/users/1f80766f6c90d53762514faaa4414cb9.png', '34', 400, 400, 'png', 'YES'),
(3, 'a6d1868684a3dea76f3d97e1c094abc6.jpg', '', 'image/jpeg', 'C:/wamp/www/bach/public_html/files/users/a6d1868684a3dea76f3d97e1c094abc6.jpg', '763', 1024, 768, 'jpeg', 'YES'),
(4, '05a8469237d00455e7faec9440d8f39f.jpg', '', 'image/jpeg', 'C:/wamp/www/bach/public_html/files/users/05a8469237d00455e7faec9440d8f39f.jpg', '826', 1024, 768, 'jpeg', 'YES'),
(5, '7f04d77f11fa8c60107c399b30f6a21a.jpg', '', 'image/jpeg', 'C:/wamp/www/bach/public_html/files/users/7f04d77f11fa8c60107c399b30f6a21a.jpg', '581', 1024, 768, 'jpeg', 'YES'),
(6, '22352eeae3444658a9c6dae558925704.jpg', '', 'image/jpeg', 'C:/wamp/www/bach/public_html/files/users/22352eeae3444658a9c6dae558925704.jpg', '548', 1024, 768, 'jpeg', 'YES'),
(7, '80d9b8dc8528a8b034876eae6cde6420.jpg', '', 'image/jpeg', 'C:/wamp/www/bach/public_html/files/users/80d9b8dc8528a8b034876eae6cde6420.jpg', '760', 1024, 768, 'jpeg', 'YES'),
(8, 'd02a3042b7c05a01e397e42e855bfbf9.jpg', '', 'image/jpeg', 'C:/wamp/www/bach/public_html/files/users/d02a3042b7c05a01e397e42e855bfbf9.jpg', '606', 1024, 768, 'jpeg', 'YES'),
(10, '4ce9f0033348d58a877ce4ebcf2c8611.jpg', '', 'image/jpeg', 'C:/wamp/www/bach/public_html/files/users/4ce9f0033348d58a877ce4ebcf2c8611.jpg', '760', 1024, 768, 'jpeg', 'YES'),
(11, '401d0aa1acf9fe9f582997d6f956ba79.jpg', '', 'image/jpeg', 'C:/wamp/www/bach/public_html/files/users/401d0aa1acf9fe9f582997d6f956ba79.jpg', '826', 1024, 768, 'jpeg', 'YES'),
(12, 'a537687410714f62bc167e147237bcbb.jpg', '', 'image/jpeg', 'C:/wamp/www/bach/public_html/files/users/a537687410714f62bc167e147237bcbb.jpg', '859', 1024, 768, 'jpeg', 'YES'),
(13, '94368e44882deb8cd9fa8a27fe32ec98.jpg', '', 'image/jpeg', 'C:/wamp/www/bach/public_html/files/users/94368e44882deb8cd9fa8a27fe32ec98.jpg', '763', 1024, 768, 'jpeg', 'YES'),
(14, '6fe7801fa29ff4bada283a06ee2f075b.jpg', '', 'image/jpeg', 'C:/wamp/www/bach/public_html/files/users/6fe7801fa29ff4bada283a06ee2f075b.jpg', '548', 1024, 768, 'jpeg', 'YES'),
(15, '1ee8ef666d47aeac1e8b98d0d67fe8cc.jpg', '', 'image/jpeg', 'C:/wamp/www/bach/public_html/files/users/1ee8ef666d47aeac1e8b98d0d67fe8cc.jpg', '606', 1024, 768, 'jpeg', 'YES'),
(22, '49cfa37d2f096f27d790a5d4855dacdd.jpg', '', 'image/jpeg', 'C:/wamp/www/bach/public_html/files/users/49cfa37d2f096f27d790a5d4855dacdd.jpg', '43', 587, 506, 'jpeg', 'YES'),
(23, '565704463bf201323245ac3a227acd95.jpg', '', 'image/jpeg', 'C:/wamp/www/bach/public_html/files/users/565704463bf201323245ac3a227acd95.jpg', '43', 587, 506, 'jpeg', 'YES');

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
  `id_module` int(11) unsigned DEFAULT '0',
  `id_section` int(11) DEFAULT '0',
  `state` varchar(20) DEFAULT 'ACTIVE',
  `visible` varchar(20) DEFAULT 'YES',
  PRIMARY KEY (`id_page`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Volcado de datos para la tabla `sys_pages`
--

INSERT INTO `sys_pages` (`id_page`, `title`, `slug`, `order`, `id_module`, `id_section`, `state`, `visible`) VALUES
(19, 'Configuration', 'configuration', 1, 0, 0, 'ACTIVE', 'YES'),
(20, 'Pages & Permissions', 'page', 2, 19, 0, 'ACTIVE', 'YES'),
(21, 'Users', 'user', 3, 19, 0, 'ACTIVE', 'YES'),
(23, 'My profile', 'profile', 4, 19, 0, 'ACTIVE', 'YES');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sys_parameters`
--

CREATE TABLE IF NOT EXISTS `sys_parameters` (
  `name` varchar(50) NOT NULL,
  `value` varchar(255) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sys_parameters`
--

INSERT INTO `sys_parameters` (`name`, `value`, `title`, `description`) VALUES
('SMTP', 'OFF', 'SMTP', NULL),
('SMTP_HOST', 'bach.com', 'SMTP Host', NULL),
('SMTP_PASS', 'bach123', 'SMTP Password', NULL),
('SMTP_USER', 'bach', 'SMTP User', NULL),
('SYSTEM_EMAIL', 'omargc.mus@gmail.com', 'Email del sistema', NULL),
('SYSTEM_NAME', 'Bach', 'Nombre del sistema', NULL);

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

--
-- Volcado de datos para la tabla `sys_permissions`
--

INSERT INTO `sys_permissions` (`id_page`, `id_rol`, `create`, `read`, `update`, `delete`) VALUES
(19, 1, 'YES', 'YES', 'YES', 'YES'),
(19, 2, 'NO', 'NO', 'NO', 'NO'),
(19, 3, 'NO', 'NO', 'NO', 'NO'),
(19, 4, 'NO', 'NO', 'NO', 'NO'),
(19, 5, 'NO', 'NO', 'NO', 'NO'),
(20, 1, 'YES', 'YES', 'YES', 'YES'),
(20, 2, 'NO', 'NO', 'NO', 'NO'),
(20, 3, 'NO', 'NO', 'NO', 'NO'),
(20, 4, 'NO', 'NO', 'NO', 'NO'),
(20, 5, 'NO', 'NO', 'NO', 'NO'),
(21, 1, 'YES', 'YES', 'YES', 'YES'),
(21, 2, 'NO', 'NO', 'NO', 'NO'),
(21, 3, 'NO', 'NO', 'NO', 'NO'),
(21, 4, 'NO', 'NO', 'NO', 'NO'),
(21, 5, 'NO', 'NO', 'NO', 'NO'),
(23, 1, 'YES', 'YES', 'YES', 'YES'),
(23, 2, 'NO', 'YES', 'NO', 'NO'),
(23, 3, 'NO', 'NO', 'NO', 'NO'),
(23, 4, 'NO', 'NO', 'NO', 'NO'),
(23, 5, 'NO', 'NO', 'NO', 'NO');

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
('6c5ce8a4e976efb927b13f11a536cba6', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:22.0) Gecko/20100101 Firefox/22.0', 1377233183, 'a:10:{s:9:"user_data";s:0:"";s:8:"username";s:4:"bach";s:5:"email";s:20:"omargc.mus@gmail.com";s:7:"id_user";i:1;s:6:"id_rol";i:1;s:8:"loggedin";b:1;s:8:"id_photo";i:23;s:5:"photo";s:36:"565704463bf201323245ac3a227acd95.jpg";s:10:"parameters";a:6:{s:4:"SMTP";a:2:{s:5:"Value";s:3:"OFF";s:5:"Title";s:4:"SMTP";}s:9:"SMTP_HOST";a:2:{s:5:"Value";s:8:"bach.com";s:5:"Title";s:9:"SMTP Host";}s:9:"SMTP_PASS";a:2:{s:5:"Value";s:7:"bach123";s:5:"Title";s:13:"SMTP Password";}s:9:"SMTP_USER";a:2:{s:5:"Value";s:4:"bach";s:5:"Title";s:9:"SMTP User";}s:12:"SYSTEM_EMAIL";a:2:{s:5:"Value";s:20:"omargc.mus@gmail.com";s:5:"Title";s:17:"Email del sistema";}s:11:"SYSTEM_NAME";a:2:{s:5:"Value";s:4:"Bach";s:5:"Title";s:18:"Nombre del sistema";}}s:11:"permissions";a:4:{s:13:"configuration";a:4:{s:7:"CREATED";s:3:"YES";s:4:"READ";s:3:"YES";s:6:"UPDATE";s:3:"YES";s:6:"DELETE";s:3:"YES";}s:4:"page";a:4:{s:7:"CREATED";s:3:"YES";s:4:"READ";s:3:"YES";s:6:"UPDATE";s:3:"YES";s:6:"DELETE";s:3:"YES";}s:4:"user";a:4:{s:7:"CREATED";s:3:"YES";s:4:"READ";s:3:"YES";s:6:"UPDATE";s:3:"YES";s:6:"DELETE";s:3:"YES";}s:7:"profile";a:4:{s:7:"CREATED";s:3:"YES";s:4:"READ";s:3:"YES";s:6:"UPDATE";s:3:"YES";s:6:"DELETE";s:3:"YES";}}}');

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
  `state` varchar(20) DEFAULT 'CREATED',
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Volcado de datos para la tabla `sys_users`
--

INSERT INTO `sys_users` (`id_user`, `username`, `password`, `email`, `first_name`, `last_name`, `state`, `id_rol`, `id_photo`, `created`, `phone`, `modified`, `lang_code`, `mobile`) VALUES
(1, 'bach', '$2a$08$lCkrUnqGscSUZ/x3/VPW9O92bPpb3vJIRgsKVulO0YY5hi2iUGfO2', 'omargc.mus@gmail.com', 'Omar', 'Gutiérrez Condori', 'ACTIVE', 1, 23, NULL, '70520083', '2013-08-22 23:29:10', 'EN', NULL);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `sys_permissions`
--
ALTER TABLE `sys_permissions`
  ADD CONSTRAINT `sys_permissions_fk` FOREIGN KEY (`id_page`) REFERENCES `sys_pages` (`id_page`),
  ADD CONSTRAINT `sys_permissions_fk1` FOREIGN KEY (`id_rol`) REFERENCES `sys_roles` (`id_rol`);

--
-- Filtros para la tabla `sys_users`
--
ALTER TABLE `sys_users`
  ADD CONSTRAINT `sys_users_fk` FOREIGN KEY (`id_rol`) REFERENCES `sys_roles` (`id_rol`),
  ADD CONSTRAINT `sys_users_fk1` FOREIGN KEY (`id_photo`) REFERENCES `sys_files` (`id_file`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
