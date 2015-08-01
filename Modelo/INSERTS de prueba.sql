INSERT INTO `CAT_BIBLIOTECA` (`CVE_TIPO`, `DESCRIPCION`, `ACTIVO`) VALUES
(1, 'Libros', b'1'),
(2, 'Hemeroteca', b'1'),
(3, 'Trabajos de logias', b'1');

INSERT INTO `MEDIOS_CONTACTO` (`CVE_CONTACTO`, `DESCRIPCION`, `IMAGEN`, `ACTIVO`) VALUES
(1, 'Teléfono', 'img/phone-icon.png', b'1'),
(2, 'Celular', 'img/Devices-phone-icon.png', b'1'),
(3, 'Email', 'img/Mail-icon.png', b'1'),
(4, 'WhatsApp', 'img/WhatsApp-icon.png', b'1'),
(5, 'Facebook', 'img/social-facebook-box-blue-icon.png', b'1'),
(6, 'Twitter', 'img/social-twitter-box-blue-icon.png', b'1'),
(7, 'Google Plus', 'img/Web-Google-plus-alt-Metro-icon.png', b'1');

INSERT INTO `PROFESIONES` (`CVE_PROFESION`, `DESCRIPCION`, `LOGO`, `ACTIVO`) VALUES
(1, 'Abogado', 'img/profesiones/1.png', b'1'),
(2, 'Arquitecto ', 'img/profesiones/2.png', b'1'),
(3, 'Veterinario', 'img/profesiones/3.png', b'1');

INSERT INTO `REGISTRO_PROFESIONES` (`CVE_REGISTRO`, `CVE_PROFESION`, `NOMBRE_EMPRESA`, `LOGO`, `DOMICILIO`, `SERVICIOS_OFRECIDOS`, `ACTIVO`) VALUES
(1, 1, 'Abogados & Asociados', 'img/registro_profesiones/1.jpg', 'Villahermosa,Tabasco,México', '<ul><li>Servicio 01</li><li>Servicio 02</li><li>Servicio 03</li><li>Servicio 04</li><li>Servicio 05</li></ul>', b'1'),
(2, 1, 'Abogados & Asociados II', 'img/registro_profesiones/2.jpg', 'Villahermosa,Tabasco,México', '<ul><li>Servicio 01</li><li>Servicio 02</li><li>Servicio 03</li><li>Servicio 04</li><li>Servicio 05</li></ul>', b'1'),
(3, 1, 'Abogados & Asociados III', 'img/registro_profesiones/3.jpg', 'Villahermosa,Tabasco,México', '<ul><li>Servicio 01</li><li>Servicio 02</li><li>Servicio 03</li><li>Servicio 04</li><li>Servicio 05</li></ul>', b'1'),
(4, 1, 'Abogados & Asociados IV', 'img/registro_profesiones/4.jpg', 'Villahermosa,Tabasco,México', '<ul><li>Servicio 01</li><li>Servicio 02</li><li>Servicio 03</li><li>Servicio 04</li><li>Servicio 05</li></ul>', b'1');

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

INSERT INTO `EL_REATON` (`CVE_REATA`, `HABILITADO`, `FRESITA`) VALUES
(1, 'jorge', 'password');

INSERT INTO `EVENTOS` (`CVE_EVENTO`, `NOMBRE`, `FOTO_PRINCIPAL`, `FOTO1`, `FOTO2`, `FOTO3`, `FOTO4`, `DESCRIPCION`, `FECHA_INICIO`, `FECHA_FIN`) VALUES
(1, 'Evento de prueba 01', 'img/eventos/1.jpg', 'img/eventos/1_1.jpg', 'img/eventos/1_2.jpg', 'img/eventos/1_3.jpg', 'img/eventos/1_4.jpg', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', '2015-06-09 00:00:00', '2016-06-25 23:59:59'),
(2, 'Evento de prueba 02', 'img/eventos/2.jpg', NULL, NULL, NULL, NULL, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', '2015-06-09 23:59:59', '2016-06-09 23:59:59'),
(3, 'Evento de prueba 03', 'img/eventos/3.jpg', NULL, NULL, NULL, NULL, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', '2015-06-09 23:59:59', '2016-06-09 23:59:59'),
(4, 'Evento de prueba 04', 'img/eventos/4.jpg', NULL, NULL, NULL, 'img/eventos/4_4.jpg', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', '2015-06-09 23:59:59', '2016-06-09 23:59:59');


INSERT INTO `NOTICIAS` (`CVE_NOTICIA`, `TITULO`, `NOTICIA_CORTA`, `NOTICIA`, `FECHA_INICIO`, `FECHA_FIN`, `FOTO_PORTADA`, `FOTO1`, `FOTO2`, `FOTO3`) VALUES
(1, 'Noticia de prueba 01', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>', '2015-06-09 23:59:59', '2016-06-09 23:59:59', 'img/noticias/1.jpg', 'img/noticias/1_1.jpg', 'img/noticias/1_2.jpg', 'img/noticias/1_3.jpg'),
(2, 'Noticia de prueba 02', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', '2015-06-09 23:59:59', '2016-06-09 23:59:59', 'img/noticias/2.jpg', NULL, NULL, 'img/noticias/2_3.jpg'),
(3, 'Noticia de prueba 03', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', '2015-06-09 23:59:59', '2016-06-09 23:59:59', 'img/noticias/3.jpg', NULL, NULL, NULL),
(4, 'Noticia de prueba 01', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', '2015-06-09 00:00:00', '2015-06-26 23:59:59', 'img/noticias/4.jpg', 'img/noticias/4_1.jpg', 'img/noticias/4_2.jpg', 'img/noticias/4_3.jpg');

insert grandes_orientes values (1,',Aguascalientes','img/grandes_orientes/1.jpg',1),
 (2,'Baja California Norte','img/grandes_orientes/2.jpg',1),
 (3,'Baja California Sur','img/grandes_orientes/3.jpg',1),
 (4,'Campeche','img/grandes_orientes/4.jpg',1),
 (5,'Coahuila de Zaragoza','img/grandes_orientes/5.jpg',1),
 (6,'Colima','img/grandes_orientes/6.jpg',1),
 (7,'Chiapas','img/grandes_orientes/7.jpg',1),
 (8,'Chihuahua','img/grandes_orientes/8.jpg',1),
 (9,'Distrito Federal','img/grandes_orientes/9.jpg',1),
 (10,'Durango','img/grandes_orientes/10.jpg',1),
 (11,'Guanajuato','img/grandes_orientes/11.jpg',1),
 (12,'Guerrero','img/grandes_orientes/12.jpg',1),
 (13,'Hidalgo','img/grandes_orientes/13.jpg',1),
 (14,'Jalisco','img/grandes_orientes/14.jpg',1),
 (15,'México','img/grandes_orientes/15.jpg',1),
 (16,'Michoacán de Ocampo','img/grandes_orientes/16.jpg',1),
 (17,'Morelos','img/grandes_orientes/17.jpg',1),
 (18,'Nayarit','img/grandes_orientes/18.jpg',1),
 (19,'Nuevo León','img/grandes_orientes/19.jpg',1),
 (20,'Oaxaca','img/grandes_orientes/20.jpg',1),
 (21,'Puebla','img/grandes_orientes/21.jpg',1),
 (22,'Querétaro de Arteaga','img/grandes_orientes/22.jpg',1),
 (23,'Quintana Roo','img/grandes_orientes/23.jpg',1),
 (24,'San Luis Potosí','img/grandes_orientes/24.jpg',1),
 (25,'Sinaloa','img/grandes_orientes/25.jpg',1),
 (26,'Sonora','img/grandes_orientes/26.jpg',1),
 (27,'Tabasco','img/grandes_orientes/27.jpg',1),
 (28,'Tamaulipas','img/grandes_orientes/28.jpg',1),
 (29,'Tlaxcala','img/grandes_orientes/29.jpg',1),
 (30,'Veracruz','img/grandes_orientes/30.jpg',1),
 (31,'Yucatán','img/grandes_orientes/31.jpg',1),
 (32,'Zacatecas','img/grandes_orientes/32.jpg',1)

