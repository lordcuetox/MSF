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
(1, 'eder.weiss87', 'marvel87');

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


