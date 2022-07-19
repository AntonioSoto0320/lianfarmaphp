-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 17-07-2022 a las 13:19:22
-- Versión del servidor: 8.0.27
-- Versión de PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `lianfarmaphp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito_usuarios`
--

DROP TABLE IF EXISTS `carrito_usuarios`;
CREATE TABLE IF NOT EXISTS `carrito_usuarios` (
  `id_carrito` int NOT NULL AUTO_INCREMENT,
  `usuario` varchar(255) NOT NULL,
  `id_producto` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`id_carrito`),
  KEY `id_producto` (`id_producto`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `carrito_usuarios`
--

INSERT INTO `carrito_usuarios` (`id_carrito`, `usuario`, `id_producto`) VALUES
(30, 'antonio', 999),
(29, 'antonio', 998),
(28, 'antonio', 997),
(27, 'antonio', 997);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE IF NOT EXISTS `productos` (
  `id_producto` int NOT NULL,
  `nombre_producto` varchar(255) NOT NULL,
  `categoria` char(2) NOT NULL,
  `precio` float NOT NULL,
  `stock` int NOT NULL,
  `descripcion` varchar(5000) NOT NULL,
  `nombre_imagen` varchar(50) NOT NULL,
  `imagen` longblob NOT NULL,
  `tipo_imagen` varchar(50) NOT NULL,
  PRIMARY KEY (`id_producto`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `productos`

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_admin`
--

DROP TABLE IF EXISTS `usuario_admin`;
CREATE TABLE IF NOT EXISTS `usuario_admin` (
  `id_usuario_admin` int NOT NULL AUTO_INCREMENT,
  `usuario` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dni` varchar(8) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `tipo` char(1) NOT NULL,
  PRIMARY KEY (`id_usuario_admin`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuario_admin`
--

INSERT INTO `usuario_admin` (`id_usuario_admin`, `usuario`, `password`, `dni`, `correo`, `tipo`) VALUES
(2, 'antonio', 'antonio123', '', '', 'a'),
(3, 'antonio45', 'antonio123', '75098945', 'ANTONIOSOTOFUT7@GMAIL.COM', 'u'),
(4, 'antonio5888', 'antonio123', '75098948', 'ANTONIOSOfdsfsfTOFUT7@GMAIL.COM', 'u');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
