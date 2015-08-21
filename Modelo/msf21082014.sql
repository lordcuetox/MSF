-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-08-2015 a las 16:48:33
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
-- Estructura de tabla para la tabla `cat_biblioteca`
--

CREATE TABLE IF NOT EXISTS `cat_biblioteca` (
  `cve_tipo` int(11) NOT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `imagen` varchar(50) NOT NULL,
  `activo` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cat_biblioteca`
--

INSERT INTO `cat_biblioteca` (`cve_tipo`, `descripcion`, `imagen`, `activo`) VALUES
(1, 'Libros', 'img/Books-2-icon.png', b'1'),
(2, 'Hemeroteca', 'img/newspaper-icon.png', b'1'),
(3, 'Trabajos de logias', 'img/desktop-icon.png', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clasificaciones`
--

CREATE TABLE IF NOT EXISTS `clasificaciones` (
  `cve_rito` int(11) NOT NULL,
  `cve_clasificacion` int(11) NOT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='se clasifican en dos \r\nsimbolica\r\ny filosofica';

--
-- Volcado de datos para la tabla `clasificaciones`
--

INSERT INTO `clasificaciones` (`cve_rito`, `cve_clasificacion`, `descripcion`, `activo`) VALUES
(1, 1, 'Simbolico', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos_registros`
--

CREATE TABLE IF NOT EXISTS `contactos_registros` (
  `cve_contacto` int(11) NOT NULL,
  `cve_registro` int(11) NOT NULL,
  `dato` varchar(100) DEFAULT NULL,
  `activo` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='es la relacion de medios de contacto con los registros de se';

--
-- Volcado de datos para la tabla `contactos_registros`
--

INSERT INTO `contactos_registros` (`cve_contacto`, `cve_registro`, `dato`, `activo`) VALUES
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
-- Estructura de tabla para la tabla `el_reaton`
--

CREATE TABLE IF NOT EXISTS `el_reaton` (
  `cve_reata` int(11) NOT NULL,
  `habilitado` varchar(50) DEFAULT NULL,
  `fresita` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `el_reaton`
--

INSERT INTO `el_reaton` (`cve_reata`, `habilitado`, `fresita`) VALUES
(1, 'jorge', 'password');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE IF NOT EXISTS `eventos` (
  `cve_evento` int(11) NOT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `foto_principal` varchar(30) DEFAULT NULL,
  `foto1` varchar(30) DEFAULT NULL,
  `foto2` varchar(30) DEFAULT NULL,
  `foto3` varchar(30) DEFAULT NULL,
  `foto4` varchar(30) DEFAULT NULL,
  `descripcion` varchar(1000) DEFAULT NULL,
  `fecha_inicio` datetime DEFAULT NULL,
  `fecha_fin` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`cve_evento`, `nombre`, `foto_principal`, `foto1`, `foto2`, `foto3`, `foto4`, `descripcion`, `fecha_inicio`, `fecha_fin`) VALUES
(3, 'Evento de prueba 03', 'img/eventos/3.jpg', NULL, NULL, NULL, NULL, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', '2015-06-09 23:59:59', '2016-06-09 23:59:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grados`
--

CREATE TABLE IF NOT EXISTS `grados` (
  `cve_rito` int(11) NOT NULL,
  `cve_clasificacion` int(11) NOT NULL,
  `cve_grado` int(11) NOT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='grados de los ritos por clasificacion';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grandes_logias`
--

CREATE TABLE IF NOT EXISTS `grandes_logias` (
  `cve_gran_logia` int(11) NOT NULL,
  `cve_rito` int(11) NOT NULL,
  `cve_oriente` int(11) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `activo` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `grandes_logias`
--

INSERT INTO `grandes_logias` (`cve_gran_logia`, `cve_rito`, `cve_oriente`, `nombre`, `foto`, `estado`, `direccion`, `activo`) VALUES
(1, 1, 27, 'GRAN LOGIA ESTADO RESTAURACIÓN', 'img/grandes_logias/1.jpg', 'TABASCO', 'Av. Gregorio Mendez, Col. Centro, Villahermosa, Tabasco.', b'1'),
(2, 1, 27, 'vbcbvc', '', 'cvbcvb', 'vcbcvbcv', b'1'),
(3, 1, 27, 'fdgvdfgdgbfgb', 'img/grandes_logias/3.jpg', 'fgbdfgfdgdfg', 'dfgdfgdfgf', b'1'),
(4, 1, 27, 'dsfgrtghtnjghjghjg fghfghfh hgffg', 'img/grandes_logias/4.jpg', 'fdgdgd', 'dfgdfgdfgdfg', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grandes_orientes`
--

CREATE TABLE IF NOT EXISTS `grandes_orientes` (
  `cve_oriente` int(11) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `activo` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `grandes_orientes`
--

INSERT INTO `grandes_orientes` (`cve_oriente`, `descripcion`, `foto`, `activo`) VALUES
(1, 'Aguascalientes', 'img/grandes_orientes/1.jpg', b'1'),
(2, 'Baja California Norte', 'img/grandes_orientes/2.jpg', b'1'),
(3, 'Baja California Sur', 'img/grandes_orientes/3.jpg', b'1'),
(4, 'Campeche', 'img/grandes_orientes/4.jpg', b'1'),
(5, 'Coahuila de Zaragoza', 'img/grandes_orientes/5.jpg', b'1'),
(6, 'Colima', 'img/grandes_orientes/6.jpg', b'1'),
(7, 'Chiapas', 'img/grandes_orientes/7.jpg', b'1'),
(8, 'Chihuahua', 'img/grandes_orientes/8.jpg', b'1'),
(9, 'Distrito Federal', 'img/grandes_orientes/9.jpg', b'1'),
(10, 'Durango', 'img/grandes_orientes/10.jpg', b'1'),
(11, 'Guanajuato', 'img/grandes_orientes/11.jpg', b'1'),
(12, 'Guerrero', 'img/grandes_orientes/12.jpg', b'1'),
(13, 'Hidalgo', 'img/grandes_orientes/13.jpg', b'1'),
(14, 'Jalisco', 'img/grandes_orientes/14.jpg', b'1'),
(15, 'México', 'img/grandes_orientes/15.jpg', b'1'),
(16, 'Michoacán de Ocampo', 'img/grandes_orientes/16.jpg', b'1'),
(17, 'Morelos', 'img/grandes_orientes/17.jpg', b'1'),
(18, 'Nayarit', 'img/grandes_orientes/18.jpg', b'1'),
(19, 'Nuevo León', 'img/grandes_orientes/19.jpg', b'1'),
(20, 'Oaxaca', 'img/grandes_orientes/20.jpg', b'1'),
(21, 'Puebla', 'img/grandes_orientes/21.jpg', b'1'),
(22, 'Querétaro de Arteaga', 'img/grandes_orientes/22.jpg', b'1'),
(23, 'Quintana Roo', 'img/grandes_orientes/23.jpg', b'1'),
(24, 'San Luis Potosí', 'img/grandes_orientes/24.jpg', b'1'),
(25, 'Sinaloa', 'img/grandes_orientes/25.jpg', b'1'),
(26, 'Sonora', 'img/grandes_orientes/26.jpg', b'1'),
(27, 'Tabasco', 'img/grandes_orientes/27.jpg', b'1'),
(28, 'Tamaulipas', 'img/grandes_orientes/28.jpg', b'1'),
(29, 'Tlaxcala', 'img/grandes_orientes/29.jpg', b'1'),
(30, 'Veracruz', 'img/grandes_orientes/30.jpg', b'1'),
(31, 'Yucatán', 'img/grandes_orientes/31.jpg', b'1'),
(32, 'Zacatecas', 'img/grandes_orientes/32.jpg', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logias`
--

CREATE TABLE IF NOT EXISTS `logias` (
  `cve_logia` int(11) NOT NULL,
  `cve_gran_logia` int(11) DEFAULT NULL,
  `cve_oriente` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `trabajos` varchar(30) DEFAULT NULL,
  `foto` varchar(50) NOT NULL,
  `habilitado` varchar(50) NOT NULL,
  `fresita` varchar(50) NOT NULL,
  `activo` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `logias`
--

INSERT INTO `logias` (`cve_logia`, `cve_gran_logia`, `cve_oriente`, `nombre`, `direccion`, `trabajos`, `foto`, `habilitado`, `fresita`, `activo`) VALUES
(1, 1, 27, 'Fenix No. 5', 'Av. Gregorio Mendez, Col. Centro, Villahermosa, Tabasco.', 'Viernes 20:00 hrs', '', 'jorge', 'jorge1', b'1'),
(2, 1, 27, 'dsdf', 'dsfsdf', 'sdfsdf', '', '', '', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medios_contacto`
--

CREATE TABLE IF NOT EXISTS `medios_contacto` (
  `cve_contacto` int(11) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `imagen` varchar(50) DEFAULT NULL,
  `activo` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `medios_contacto`
--

INSERT INTO `medios_contacto` (`cve_contacto`, `descripcion`, `imagen`, `activo`) VALUES
(1, 'Teléfono', 'img/phone-icon.png', b'1'),
(2, 'Celular', 'img/Devices-phone-icon.png', b'1'),
(3, 'Email', 'img/Mail-icon.png', b'1'),
(4, 'WhatsApp', 'img/WhatsApp-icon.png', b'1'),
(5, 'Facebook', 'img/social-facebook-box-blue-icon.png', b'1'),
(6, 'Twitter', 'img/social-twitter-box-blue-icon.png', b'1'),
(7, 'Google Plus', 'img/Web-Google-plus-alt-Metro-icon.png', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE IF NOT EXISTS `noticias` (
  `cve_noticia` int(11) NOT NULL,
  `titulo` varchar(30) DEFAULT NULL,
  `noticia_corta` varchar(200) DEFAULT NULL,
  `noticia` varchar(1000) DEFAULT NULL,
  `fecha_inicio` datetime DEFAULT NULL,
  `fecha_fin` datetime DEFAULT NULL,
  `foto_portada` varchar(40) DEFAULT NULL,
  `foto1` varchar(40) DEFAULT NULL,
  `foto2` varchar(40) DEFAULT NULL,
  `foto3` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`cve_noticia`, `titulo`, `noticia_corta`, `noticia`, `fecha_inicio`, `fecha_fin`, `foto_portada`, `foto1`, `foto2`, `foto3`) VALUES
(3, 'Noticia de prueba 03', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', '2015-06-09 23:59:59', '2016-06-09 23:59:59', 'img/noticias/3.jpg', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesiones`
--

CREATE TABLE IF NOT EXISTS `profesiones` (
  `cve_profesion` int(11) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `logo` varchar(50) DEFAULT NULL,
  `activo` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='En esta tabla se encontraran las profesiones que se den de a';

--
-- Volcado de datos para la tabla `profesiones`
--

INSERT INTO `profesiones` (`cve_profesion`, `descripcion`, `logo`, `activo`) VALUES
(1, 'Abogado', 'img/profesiones/1.png', b'1'),
(2, 'Arquitecto ', 'img/profesiones/2.png', b'1'),
(3, 'Veterinario', 'img/profesiones/3.png', b'1'),
(4, 'cxvxcvxc', '', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prospectos`
--

CREATE TABLE IF NOT EXISTS `prospectos` (
  `cve_cliente` int(11) NOT NULL,
  `cve_logia` int(11) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido_pat` varchar(50) DEFAULT NULL,
  `apellido_mat` varchar(50) DEFAULT NULL,
  `sexo` bit(1) DEFAULT NULL,
  `fecha_registro` datetime DEFAULT NULL,
  `habilitado` varchar(20) DEFAULT NULL COMMENT 'campo que guarda el usuario del cliente',
  `fresita` varchar(20) DEFAULT NULL COMMENT 'campo que guardara la contraseña del usuario',
  `activo` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_profesiones`
--

CREATE TABLE IF NOT EXISTS `registro_profesiones` (
  `cve_registro` int(11) NOT NULL,
  `cve_profesion` int(11) DEFAULT NULL,
  `nombre_empresa` varchar(200) DEFAULT NULL,
  `logo` varchar(50) DEFAULT NULL,
  `domicilio` varchar(500) DEFAULT NULL,
  `servicios_ofrecidos` varchar(1000) DEFAULT NULL,
  `activo` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Listado de personas que ofrecen servicios';

--
-- Volcado de datos para la tabla `registro_profesiones`
--

INSERT INTO `registro_profesiones` (`cve_registro`, `cve_profesion`, `nombre_empresa`, `logo`, `domicilio`, `servicios_ofrecidos`, `activo`) VALUES
(1, 1, 'Abogados & Asociados', 'img/registro_profesiones/1.jpg', 'Villahermosa,Tabasco,México', '<ul><li>Servicio 01</li><li>Servicio 02</li><li>Servicio 03</li><li>Servicio 04</li><li>Servicio 05</li></ul>', b'1'),
(2, 1, 'Abogados & Asociados II', 'img/registro_profesiones/2.jpg', 'Villahermosa,Tabasco,México', '<ul><li>Servicio 01</li><li>Servicio 02</li><li>Servicio 03</li><li>Servicio 04</li><li>Servicio 05</li></ul>', b'1'),
(3, 1, 'Abogados & Asociados III', 'img/registro_profesiones/3.jpg', 'Villahermosa,Tabasco,México', '<ul><li>Servicio 01</li><li>Servicio 02</li><li>Servicio 03</li><li>Servicio 04</li><li>Servicio 05</li></ul>', b'0'),
(4, 1, 'Abogados & Asociados IV', 'img/registro_profesiones/4.jpg', 'Villahermosa,Tabasco,México', '<ul><li>Servicio 01</li><li>Servicio 02</li><li>Servicio 03</li><li>Servicio 04</li><li>Servicio 05</li></ul>', b'0'),
(5, 3, 'dfsdf', '', 'sdfdfsd', '<ul><li>dsfsdf</li></ul>', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ritos`
--

CREATE TABLE IF NOT EXISTS `ritos` (
  `cve_rito` int(11) NOT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='CATALOGOS DE RITOS';

--
-- Volcado de datos para la tabla `ritos`
--

INSERT INTO `ritos` (`cve_rito`, `descripcion`, `foto`, `activo`) VALUES
(1, 'R.E.A.Y.A.', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajos_logias`
--

CREATE TABLE IF NOT EXISTS `trabajos_logias` (
  `cve_logia` int(11) DEFAULT NULL,
  `cve_volumen` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `volumenes`
--

CREATE TABLE IF NOT EXISTS `volumenes` (
  `cve_volumen` int(11) NOT NULL,
  `cve_tipo` int(11) DEFAULT NULL,
  `titulo` varchar(50) DEFAULT NULL,
  `autor` varchar(100) DEFAULT NULL,
  `imagen` varchar(100) DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `activo` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `volumen_grado`
--

CREATE TABLE IF NOT EXISTS `volumen_grado` (
  `cve_clasificacion` int(11) NOT NULL,
  `cve_rito` int(11) NOT NULL,
  `cve_grado` int(11) NOT NULL,
  `cve_volumen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cat_biblioteca`
--
ALTER TABLE `cat_biblioteca`
 ADD PRIMARY KEY (`cve_tipo`);

--
-- Indices de la tabla `clasificaciones`
--
ALTER TABLE `clasificaciones`
 ADD PRIMARY KEY (`cve_clasificacion`,`cve_rito`), ADD KEY `index_1` (`cve_rito`,`cve_clasificacion`);

--
-- Indices de la tabla `contactos_registros`
--
ALTER TABLE `contactos_registros`
 ADD PRIMARY KEY (`cve_contacto`,`cve_registro`), ADD KEY `fk_reference_3` (`cve_registro`);

--
-- Indices de la tabla `el_reaton`
--
ALTER TABLE `el_reaton`
 ADD PRIMARY KEY (`cve_reata`), ADD KEY `index_1` (`cve_reata`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
 ADD PRIMARY KEY (`cve_evento`);

--
-- Indices de la tabla `grados`
--
ALTER TABLE `grados`
 ADD PRIMARY KEY (`cve_clasificacion`,`cve_rito`,`cve_grado`), ADD KEY `index_1` (`cve_rito`,`cve_clasificacion`,`cve_grado`);

--
-- Indices de la tabla `grandes_logias`
--
ALTER TABLE `grandes_logias`
 ADD PRIMARY KEY (`cve_gran_logia`);

--
-- Indices de la tabla `grandes_orientes`
--
ALTER TABLE `grandes_orientes`
 ADD PRIMARY KEY (`cve_oriente`);

--
-- Indices de la tabla `logias`
--
ALTER TABLE `logias`
 ADD PRIMARY KEY (`cve_logia`);

--
-- Indices de la tabla `medios_contacto`
--
ALTER TABLE `medios_contacto`
 ADD PRIMARY KEY (`cve_contacto`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
 ADD PRIMARY KEY (`cve_noticia`);

--
-- Indices de la tabla `profesiones`
--
ALTER TABLE `profesiones`
 ADD PRIMARY KEY (`cve_profesion`);

--
-- Indices de la tabla `prospectos`
--
ALTER TABLE `prospectos`
 ADD PRIMARY KEY (`cve_cliente`), ADD KEY `index_1` (`cve_cliente`);

--
-- Indices de la tabla `registro_profesiones`
--
ALTER TABLE `registro_profesiones`
 ADD PRIMARY KEY (`cve_registro`);

--
-- Indices de la tabla `ritos`
--
ALTER TABLE `ritos`
 ADD PRIMARY KEY (`cve_rito`), ADD KEY `index_1` (`cve_rito`);

--
-- Indices de la tabla `volumenes`
--
ALTER TABLE `volumenes`
 ADD PRIMARY KEY (`cve_volumen`);

--
-- Indices de la tabla `volumen_grado`
--
ALTER TABLE `volumen_grado`
 ADD PRIMARY KEY (`cve_clasificacion`,`cve_rito`,`cve_grado`,`cve_volumen`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clasificaciones`
--
ALTER TABLE `clasificaciones`
ADD CONSTRAINT `fk_reference_1` FOREIGN KEY (`cve_rito`) REFERENCES `ritos` (`cve_rito`);

--
-- Filtros para la tabla `contactos_registros`
--
ALTER TABLE `contactos_registros`
ADD CONSTRAINT `fk_reference_2` FOREIGN KEY (`cve_contacto`) REFERENCES `medios_contacto` (`cve_contacto`),
ADD CONSTRAINT `fk_reference_3` FOREIGN KEY (`cve_registro`) REFERENCES `registro_profesiones` (`cve_registro`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
