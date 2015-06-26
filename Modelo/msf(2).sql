-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 26-06-2015 a las 22:51:07
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `msf`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CAT_BIBLIOTECA`
--

CREATE TABLE IF NOT EXISTS `CAT_BIBLIOTECA` (
  `CVE_TIPO` int(11) NOT NULL,
  `DESCRIPCION` varchar(50) DEFAULT NULL,
  `ACTIVO` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `CAT_BIBLIOTECA`
--

INSERT INTO `CAT_BIBLIOTECA` (`CVE_TIPO`, `DESCRIPCION`, `ACTIVO`) VALUES
(1, 'Libros', b'1'),
(2, 'Hemeroteca', b'1'),
(3, 'Trabajos de logias', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CLASIFICACIONES`
--

CREATE TABLE IF NOT EXISTS `CLASIFICACIONES` (
  `CVE_RITO` int(11) NOT NULL,
  `CVE_CLASIFICACION` int(11) NOT NULL,
  `DESCRIPCION` varchar(50) DEFAULT NULL,
  `ACTIVO` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='se clasifican en dos \r\nsimbolica\r\ny filosofica';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CONTACTOS_REGISTROS`
--

CREATE TABLE IF NOT EXISTS `CONTACTOS_REGISTROS` (
  `CVE_CONTACTO` int(11) NOT NULL,
  `CVE_REGISTRO` int(11) NOT NULL,
  `DATO` varchar(100) DEFAULT NULL,
  `ACTIVO` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='es la relacion de medios de contacto con los registros de se';

--
-- Volcado de datos para la tabla `CONTACTOS_REGISTROS`
--

INSERT INTO `CONTACTOS_REGISTROS` (`CVE_CONTACTO`, `CVE_REGISTRO`, `DATO`, `ACTIVO`) VALUES
(4, 1, '9931674589', b'1'),
(4, 2, '9931674589', b'1'),
(4, 3, '9931674589', b'1'),
(4, 4, '9931674589', b'1'),
(5, 1, '/Abogados_Asociados', b'1'),
(5, 2, '/Abogados_AsociadosII', b'1'),
(5, 3, '/Abogados_AsociadosIII', b'1'),
(5, 4, '/Abogados_AsociadosIV', b'1'),
(6, 1, '@Abogados_Asociados', b'1'),
(6, 2, '@Abogados_AsociadosII', b'1'),
(6, 3, '@Abogados_AsociadosIII', b'1'),
(6, 4, '@Abogados_AsociadosIV', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `EL_REATON`
--

CREATE TABLE IF NOT EXISTS `EL_REATON` (
  `CVE_REATA` int(11) NOT NULL,
  `HABILITADO` varchar(50) DEFAULT NULL,
  `FRESITA` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `EL_REATON`
--

INSERT INTO `EL_REATON` (`CVE_REATA`, `HABILITADO`, `FRESITA`) VALUES
(1, 'eder.weiss87', 'marvel87');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `EVENTOS`
--

CREATE TABLE IF NOT EXISTS `EVENTOS` (
  `CVE_EVENTO` int(11) NOT NULL,
  `NOMBRE` varchar(20) DEFAULT NULL,
  `FOTO_PRINCIPAL` varchar(30) DEFAULT NULL,
  `FOTO1` varchar(30) DEFAULT NULL,
  `FOTO2` varchar(30) DEFAULT NULL,
  `FOTO3` varchar(30) DEFAULT NULL,
  `FOTO4` varchar(30) DEFAULT NULL,
  `DESCRIPCION` varchar(1000) DEFAULT NULL,
  `FECHA_INICIO` datetime DEFAULT NULL,
  `FECHA_FIN` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `EVENTOS`
--

INSERT INTO `EVENTOS` (`CVE_EVENTO`, `NOMBRE`, `FOTO_PRINCIPAL`, `FOTO1`, `FOTO2`, `FOTO3`, `FOTO4`, `DESCRIPCION`, `FECHA_INICIO`, `FECHA_FIN`) VALUES
(1, 'Evento de prueba 01', 'img/eventos/1.jpg', 'img/eventos/1_1.jpg', 'img/eventos/1_2.jpg', 'img/eventos/1_3.jpg', 'img/eventos/1_4.jpg', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', '2015-06-09 00:00:00', '2016-06-25 23:59:59'),
(2, 'Evento de prueba 02', 'img/eventos/2.jpg', NULL, NULL, NULL, NULL, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', '2015-06-09 23:59:59', '2016-06-09 23:59:59'),
(3, 'Evento de prueba 03', 'img/eventos/3.jpg', NULL, NULL, NULL, NULL, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', '2015-06-09 23:59:59', '2016-06-09 23:59:59'),
(4, 'Evento de prueba 04', 'img/eventos/4.jpg', NULL, NULL, NULL, 'img/eventos/4_4.jpg', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', '2015-06-09 23:59:59', '2016-06-09 23:59:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `GRADOS`
--

CREATE TABLE IF NOT EXISTS `GRADOS` (
  `CVE_RITO` int(11) NOT NULL,
  `CVE_CLASIFICACION` int(11) NOT NULL,
  `CVE_GRADO` int(11) NOT NULL,
  `DESCRIPCION` varchar(50) DEFAULT NULL,
  `ACTIVO` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='grados de los ritos por clasificacion';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `GRANDES_LOGIAS`
--

CREATE TABLE IF NOT EXISTS `GRANDES_LOGIAS` (
  `CVE_GRAN_LOGIA` int(11) NOT NULL,
  `CVE_RITO` int(11) NOT NULL,
  `NOMBRE` varchar(50) DEFAULT NULL,
  `FOTO` varchar(100) DEFAULT NULL,
  `PAIS` varchar(50) DEFAULT NULL,
  `ESTADO` varchar(50) DEFAULT NULL,
  `DIRECCION` varchar(200) DEFAULT NULL,
  `ACTIVO` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `LOGIAS`
--

CREATE TABLE IF NOT EXISTS `LOGIAS` (
  `CVE_LOGIA` int(11) NOT NULL,
  `CVE_GRAN_LOGIA` int(11) DEFAULT NULL,
  `NOMBRE` varchar(50) DEFAULT NULL,
  `DIRECCION` varchar(100) DEFAULT NULL,
  `TRABAJOS` varchar(30) DEFAULT NULL,
  `ACTIVO` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `MEDIOS_CONTACTO`
--

CREATE TABLE IF NOT EXISTS `MEDIOS_CONTACTO` (
  `CVE_CONTACTO` int(11) NOT NULL,
  `DESCRIPCION` varchar(100) DEFAULT NULL,
  `IMAGEN` varchar(50) DEFAULT NULL,
  `ACTIVO` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `MEDIOS_CONTACTO`
--

INSERT INTO `MEDIOS_CONTACTO` (`CVE_CONTACTO`, `DESCRIPCION`, `IMAGEN`, `ACTIVO`) VALUES
(1, 'Teléfono', 'img/phone-icon.png', b'1'),
(2, 'Celular', 'img/Devices-phone-icon.png', b'1'),
(3, 'Email', 'img/Mail-icon.png', b'1'),
(4, 'WhatsApp', 'img/WhatsApp-icon.png', b'1'),
(5, 'Facebook', 'img/social-facebook-box-blue-icon.png', b'1'),
(6, 'Twitter', 'img/social-twitter-box-blue-icon.png', b'1'),
(7, 'Google Plus', 'img/Web-Google-plus-alt-Metro-icon.png', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `NOTICIAS`
--

CREATE TABLE IF NOT EXISTS `NOTICIAS` (
  `CVE_NOTICIA` int(11) NOT NULL,
  `TITULO` varchar(30) DEFAULT NULL,
  `NOTICIA_CORTA` varchar(200) DEFAULT NULL,
  `NOTICIA` varchar(1000) DEFAULT NULL,
  `FECHA_INICIO` datetime DEFAULT NULL,
  `FECHA_FIN` datetime DEFAULT NULL,
  `FOTO_PORTADA` varchar(40) DEFAULT NULL,
  `FOTO1` varchar(40) DEFAULT NULL,
  `FOTO2` varchar(40) DEFAULT NULL,
  `FOTO3` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `NOTICIAS`
--

INSERT INTO `NOTICIAS` (`CVE_NOTICIA`, `TITULO`, `NOTICIA_CORTA`, `NOTICIA`, `FECHA_INICIO`, `FECHA_FIN`, `FOTO_PORTADA`, `FOTO1`, `FOTO2`, `FOTO3`) VALUES
(1, 'Noticia de prueba 01', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>', '2015-06-09 23:59:59', '2016-06-09 23:59:59', 'img/noticias/1.jpg', 'img/noticias/1_1.jpg', 'img/noticias/1_2.jpg', 'img/noticias/1_3.jpg'),
(2, 'Noticia de prueba 02', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', '2015-06-09 23:59:59', '2016-06-09 23:59:59', 'img/noticias/2.jpg', NULL, NULL, 'img/noticias/2_3.jpg'),
(3, 'Noticia de prueba 03', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', '2015-06-09 23:59:59', '2016-06-09 23:59:59', 'img/noticias/3.jpg', NULL, NULL, NULL),
(4, 'Noticia de prueba 01', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', '2015-06-09 00:00:00', '2015-06-26 23:59:59', 'img/noticias/4.jpg', 'img/noticias/4_1.jpg', 'img/noticias/4_2.jpg', 'img/noticias/4_3.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PROFESIONES`
--

CREATE TABLE IF NOT EXISTS `PROFESIONES` (
  `CVE_PROFESION` int(11) NOT NULL,
  `DESCRIPCION` varchar(100) DEFAULT NULL,
  `LOGO` varchar(50) NOT NULL,
  `ACTIVO` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='En esta tabla se encontraran las profesiones que se den de a';

--
-- Volcado de datos para la tabla `PROFESIONES`
--

INSERT INTO `PROFESIONES` (`CVE_PROFESION`, `DESCRIPCION`, `LOGO`, `ACTIVO`) VALUES
(1, 'Abogado', 'img/profesiones/1.png', b'1'),
(2, 'Arquitecto ', 'img/profesiones/2.png', b'1'),
(3, 'Veterinario', 'img/profesiones/3.png', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PROSPECTOS`
--

CREATE TABLE IF NOT EXISTS `PROSPECTOS` (
  `CVE_CLIENTE` int(11) NOT NULL,
  `CVE_LOGIA` int(11) DEFAULT NULL,
  `NOMBRE` varchar(50) DEFAULT NULL,
  `APELLIDO_PAT` varchar(50) DEFAULT NULL,
  `APELLIDO_MAT` varchar(50) DEFAULT NULL,
  `SEXO` bit(1) DEFAULT NULL,
  `FECHA_REGISTRO` datetime DEFAULT NULL,
  `HABILITADO` varchar(20) DEFAULT NULL COMMENT 'campo que guarda el usuario del cliente',
  `FRESITA` varchar(20) DEFAULT NULL COMMENT 'campo que guardara la contrase�a del usuario',
  `ACTIVO` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `REGISTRO_PROFESIONES`
--

CREATE TABLE IF NOT EXISTS `REGISTRO_PROFESIONES` (
  `CVE_REGISTRO` int(11) NOT NULL,
  `CVE_PROFESION` int(11) DEFAULT NULL,
  `NOMBRE_EMPRESA` varchar(200) DEFAULT NULL,
  `LOGO` varchar(50) NOT NULL,
  `DOMICILIO` varchar(500) DEFAULT NULL,
  `SERVICIOS_OFRECIDOS` varchar(1000) DEFAULT NULL,
  `ACTIVO` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Listado de personas que ofrecen servicios';

--
-- Volcado de datos para la tabla `REGISTRO_PROFESIONES`
--

INSERT INTO `REGISTRO_PROFESIONES` (`CVE_REGISTRO`, `CVE_PROFESION`, `NOMBRE_EMPRESA`, `LOGO`, `DOMICILIO`, `SERVICIOS_OFRECIDOS`, `ACTIVO`) VALUES
(1, 1, 'Abogados & Asociados', 'img/registro_profesiones/1.jpg', 'Villahermosa,Tabasco,México', '<ul><li>Servicio 01</li><li>Servicio 02</li><li>Servicio 03</li><li>Servicio 04</li><li>Servicio 05</li></ul>', b'1'),
(2, 1, 'Abogados & Asociados II', 'img/registro_profesiones/2.jpg', 'Villahermosa,Tabasco,México', '<ul><li>Servicio 01</li><li>Servicio 02</li><li>Servicio 03</li><li>Servicio 04</li><li>Servicio 05</li></ul>', b'1'),
(3, 1, 'Abogados & Asociados III', 'img/registro_profesiones/3.jpg', 'Villahermosa,Tabasco,México', '<ul><li>Servicio 01</li><li>Servicio 02</li><li>Servicio 03</li><li>Servicio 04</li><li>Servicio 05</li></ul>', b'1'),
(4, 1, 'Abogados & Asociados IV', 'img/registro_profesiones/4.jpg', 'Villahermosa,Tabasco,México', '<ul><li>Servicio 01</li><li>Servicio 02</li><li>Servicio 03</li><li>Servicio 04</li><li>Servicio 05</li></ul>', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `RITOS`
--

CREATE TABLE IF NOT EXISTS `RITOS` (
  `CVE_RITO` int(11) NOT NULL,
  `DESCRIPCION` varchar(50) DEFAULT NULL,
  `FOTO` varchar(50) DEFAULT NULL,
  `ACTIVO` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='CATALOGOS DE RITOS';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `VOLUMENES`
--

CREATE TABLE IF NOT EXISTS `VOLUMENES` (
  `CVE_VOLUMEN` int(11) NOT NULL,
  `CVE_TIPO` int(11) DEFAULT NULL,
  `TITULO` varchar(50) DEFAULT NULL,
  `AUTOR` varchar(100) DEFAULT NULL,
  `DESCRIPCION` varchar(200) DEFAULT NULL,
  `ACTIVO` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `VOLUMEN_GRADO`
--

CREATE TABLE IF NOT EXISTS `VOLUMEN_GRADO` (
  `CVE_CLASIFICACION` int(11) NOT NULL,
  `CVE_RITO` int(11) NOT NULL,
  `CVE_GRADO` int(11) NOT NULL,
  `CVE_VOLUMEN` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `CAT_BIBLIOTECA`
--
ALTER TABLE `CAT_BIBLIOTECA`
 ADD PRIMARY KEY (`CVE_TIPO`), ADD KEY `INDEX_1` (`CVE_TIPO`);

--
-- Indices de la tabla `CLASIFICACIONES`
--
ALTER TABLE `CLASIFICACIONES`
 ADD PRIMARY KEY (`CVE_CLASIFICACION`,`CVE_RITO`), ADD KEY `INDEX_1` (`CVE_RITO`,`CVE_CLASIFICACION`);

--
-- Indices de la tabla `CONTACTOS_REGISTROS`
--
ALTER TABLE `CONTACTOS_REGISTROS`
 ADD PRIMARY KEY (`CVE_CONTACTO`,`CVE_REGISTRO`), ADD KEY `INDEX_1` (`CVE_CONTACTO`), ADD KEY `FK_REFERENCE_3` (`CVE_REGISTRO`);

--
-- Indices de la tabla `EL_REATON`
--
ALTER TABLE `EL_REATON`
 ADD PRIMARY KEY (`CVE_REATA`), ADD KEY `INDEX_1` (`CVE_REATA`);

--
-- Indices de la tabla `EVENTOS`
--
ALTER TABLE `EVENTOS`
 ADD PRIMARY KEY (`CVE_EVENTO`), ADD KEY `INDEX_1` (`CVE_EVENTO`);

--
-- Indices de la tabla `GRADOS`
--
ALTER TABLE `GRADOS`
 ADD PRIMARY KEY (`CVE_CLASIFICACION`,`CVE_RITO`,`CVE_GRADO`), ADD KEY `INDEX_1` (`CVE_RITO`,`CVE_CLASIFICACION`,`CVE_GRADO`);

--
-- Indices de la tabla `GRANDES_LOGIAS`
--
ALTER TABLE `GRANDES_LOGIAS`
 ADD PRIMARY KEY (`CVE_GRAN_LOGIA`), ADD KEY `INDEX_1` (`CVE_GRAN_LOGIA`), ADD KEY `FK_REFERENCE_8` (`CVE_RITO`);

--
-- Indices de la tabla `LOGIAS`
--
ALTER TABLE `LOGIAS`
 ADD PRIMARY KEY (`CVE_LOGIA`), ADD KEY `INDEX_1` (`CVE_LOGIA`), ADD KEY `FK_REFERENCE_9` (`CVE_GRAN_LOGIA`);

--
-- Indices de la tabla `MEDIOS_CONTACTO`
--
ALTER TABLE `MEDIOS_CONTACTO`
 ADD PRIMARY KEY (`CVE_CONTACTO`), ADD KEY `INDEX_1` (`CVE_CONTACTO`);

--
-- Indices de la tabla `NOTICIAS`
--
ALTER TABLE `NOTICIAS`
 ADD PRIMARY KEY (`CVE_NOTICIA`), ADD KEY `INDEX_1` (`CVE_NOTICIA`);

--
-- Indices de la tabla `PROFESIONES`
--
ALTER TABLE `PROFESIONES`
 ADD PRIMARY KEY (`CVE_PROFESION`), ADD KEY `INDEX_1` (`CVE_PROFESION`);

--
-- Indices de la tabla `PROSPECTOS`
--
ALTER TABLE `PROSPECTOS`
 ADD PRIMARY KEY (`CVE_CLIENTE`), ADD KEY `INDEX_1` (`CVE_CLIENTE`), ADD KEY `FK_REFERENCE_7` (`CVE_LOGIA`);

--
-- Indices de la tabla `REGISTRO_PROFESIONES`
--
ALTER TABLE `REGISTRO_PROFESIONES`
 ADD PRIMARY KEY (`CVE_REGISTRO`), ADD KEY `INDEX_1` (`CVE_REGISTRO`), ADD KEY `FK_REFERENCE_122` (`CVE_PROFESION`);

--
-- Indices de la tabla `RITOS`
--
ALTER TABLE `RITOS`
 ADD PRIMARY KEY (`CVE_RITO`), ADD KEY `INDEX_1` (`CVE_RITO`);

--
-- Indices de la tabla `VOLUMENES`
--
ALTER TABLE `VOLUMENES`
 ADD PRIMARY KEY (`CVE_VOLUMEN`), ADD KEY `INDEX_1` (`CVE_VOLUMEN`), ADD KEY `FK_REFERENCE_10` (`CVE_TIPO`);

--
-- Indices de la tabla `VOLUMEN_GRADO`
--
ALTER TABLE `VOLUMEN_GRADO`
 ADD PRIMARY KEY (`CVE_CLASIFICACION`,`CVE_RITO`,`CVE_GRADO`,`CVE_VOLUMEN`), ADD KEY `INDEX_1` (`CVE_CLASIFICACION`), ADD KEY `FK_REFERENCE_12` (`CVE_VOLUMEN`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `CLASIFICACIONES`
--
ALTER TABLE `CLASIFICACIONES`
ADD CONSTRAINT `FK_REFERENCE_1` FOREIGN KEY (`CVE_RITO`) REFERENCES `RITOS` (`CVE_RITO`);

--
-- Filtros para la tabla `CONTACTOS_REGISTROS`
--
ALTER TABLE `CONTACTOS_REGISTROS`
ADD CONSTRAINT `FK_REFERENCE_2` FOREIGN KEY (`CVE_CONTACTO`) REFERENCES `MEDIOS_CONTACTO` (`CVE_CONTACTO`),
ADD CONSTRAINT `FK_REFERENCE_3` FOREIGN KEY (`CVE_REGISTRO`) REFERENCES `REGISTRO_PROFESIONES` (`CVE_REGISTRO`);

--
-- Filtros para la tabla `GRADOS`
--
ALTER TABLE `GRADOS`
ADD CONSTRAINT `FK_REFERENCE_22` FOREIGN KEY (`CVE_CLASIFICACION`, `CVE_RITO`) REFERENCES `CLASIFICACIONES` (`CVE_CLASIFICACION`, `CVE_RITO`);

--
-- Filtros para la tabla `GRANDES_LOGIAS`
--
ALTER TABLE `GRANDES_LOGIAS`
ADD CONSTRAINT `FK_REFERENCE_8` FOREIGN KEY (`CVE_RITO`) REFERENCES `RITOS` (`CVE_RITO`);

--
-- Filtros para la tabla `LOGIAS`
--
ALTER TABLE `LOGIAS`
ADD CONSTRAINT `FK_REFERENCE_9` FOREIGN KEY (`CVE_GRAN_LOGIA`) REFERENCES `GRANDES_LOGIAS` (`CVE_GRAN_LOGIA`);

--
-- Filtros para la tabla `PROSPECTOS`
--
ALTER TABLE `PROSPECTOS`
ADD CONSTRAINT `FK_REFERENCE_7` FOREIGN KEY (`CVE_LOGIA`) REFERENCES `LOGIAS` (`CVE_LOGIA`);

--
-- Filtros para la tabla `REGISTRO_PROFESIONES`
--
ALTER TABLE `REGISTRO_PROFESIONES`
ADD CONSTRAINT `FK_REFERENCE_122` FOREIGN KEY (`CVE_PROFESION`) REFERENCES `PROFESIONES` (`CVE_PROFESION`);

--
-- Filtros para la tabla `VOLUMENES`
--
ALTER TABLE `VOLUMENES`
ADD CONSTRAINT `FK_REFERENCE_10` FOREIGN KEY (`CVE_TIPO`) REFERENCES `CAT_BIBLIOTECA` (`CVE_TIPO`);

--
-- Filtros para la tabla `VOLUMEN_GRADO`
--
ALTER TABLE `VOLUMEN_GRADO`
ADD CONSTRAINT `FK_REFERENCE_11` FOREIGN KEY (`CVE_CLASIFICACION`, `CVE_RITO`, `CVE_GRADO`) REFERENCES `GRADOS` (`CVE_CLASIFICACION`, `CVE_RITO`, `CVE_GRADO`),
ADD CONSTRAINT `FK_REFERENCE_12` FOREIGN KEY (`CVE_VOLUMEN`) REFERENCES `VOLUMENES` (`CVE_VOLUMEN`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
