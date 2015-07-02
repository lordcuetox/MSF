/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     01/07/2015 08:16:35 p. m.                    */
/*==============================================================*/


drop table if exists cat_biblioteca;

drop index index_1 on clasificaciones;

drop table if exists clasificaciones;

drop table if exists contactos_registros;

drop index index_1 on el_reaton;

drop table if exists el_reaton;

drop table if exists eventos;

drop index index_1 on grados;

drop table if exists grados;

drop table if exists grandes_logias;

drop table if exists grandes_orientes;

drop table if exists logias;

drop table if exists medios_contacto;

drop table if exists noticias;

drop table if exists profesiones;

drop index index_1 on prospectos;

drop table if exists prospectos;

drop table if exists registro_profesiones;

drop index index_1 on ritos;

drop table if exists ritos;

drop table if exists trabajos_logias;

drop table if exists volumenes;

drop table if exists volumen_grado;

/*==============================================================*/
/* Table: cat_biblioteca                                        */
/*==============================================================*/
create table cat_biblioteca
(
   cve_tipo             int not null,
   descripcion          varchar(50),
   activo               bit,
   primary key (cve_tipo)
);

/*==============================================================*/
/* Table: clasificaciones                                       */
/*==============================================================*/
create table clasificaciones
(
   cve_rito             int not null,
   cve_clasificacion    int not null,
   descripcion          varchar(50),
   activo               bool,
   primary key (cve_clasificacion, cve_rito)
);

alter table clasificaciones comment 'se clasifican en dos 
simbolica
y filosofica';

/*==============================================================*/
/* Index: index_1                                               */
/*==============================================================*/
create index index_1 on clasificaciones
(
   cve_rito,
   cve_clasificacion
);

/*==============================================================*/
/* Table: contactos_registros                                   */
/*==============================================================*/
create table contactos_registros
(
   cve_contacto         int not null,
   cve_registro         int not null,
   dato                 varchar(100),
   activo               bit,
   primary key (cve_contacto, cve_registro)
);

alter table contactos_registros comment 'es la relacion de medios de contacto con los registros de se';

/*==============================================================*/
/* Table: el_reaton                                             */
/*==============================================================*/
create table el_reaton
(
   cve_reata            int not null,
   habilitado           varchar(50),
   fresita              varchar(50),
   primary key (cve_reata)
);

/*==============================================================*/
/* Index: index_1                                               */
/*==============================================================*/
create index index_1 on el_reaton
(
   cve_reata
);

/*==============================================================*/
/* Table: eventos                                               */
/*==============================================================*/
create table eventos
(
   cve_evento           int not null,
   nombre               varchar(20),
   foto_principal       varchar(30),
   foto1                varchar(30),
   foto2                varchar(30),
   foto3                varchar(30),
   foto4                varchar(30),
   descripcion          varchar(1000),
   fecha_inicio         datetime,
   fecha_fin            datetime,
   primary key (cve_evento)
);

/*==============================================================*/
/* Table: grados                                                */
/*==============================================================*/
create table grados
(
   cve_rito             int not null,
   cve_clasificacion    int not null,
   cve_grado            int not null,
   descripcion          varchar(50),
   activo               bool,
   primary key (cve_clasificacion, cve_rito, cve_grado)
);

alter table grados comment 'grados de los ritos por clasificacion';

/*==============================================================*/
/* Index: index_1                                               */
/*==============================================================*/
create index index_1 on grados
(
   cve_rito,
   cve_clasificacion,
   cve_grado
);

/*==============================================================*/
/* Table: grandes_logias                                        */
/*==============================================================*/
create table grandes_logias
(
   cve_gran_logia       int not null,
   cve_rito             int not null,
   cve_oriente          int,
   nombre               varchar(50),
   foto                 varchar(100),
   estado               varchar(50),
   direccion            varchar(200),
   activo               bit,
   primary key (cve_gran_logia)
);

/*==============================================================*/
/* Table: grandes_orientes                                      */
/*==============================================================*/
create table grandes_orientes
(
   cve_oriente          int not null,
   descripcion          varchar(100),
   foto                 varchar(50),
   activo               bit,
   primary key (cve_oriente)
);

/*==============================================================*/
/* Table: logias                                                */
/*==============================================================*/
create table logias
(
   cve_logia            int not null,
   cve_gran_logia       int,
   nombre               varchar(50),
   direccion            varchar(100),
   trabajos             varchar(30),
   activo               bit,
   primary key (cve_logia)
);

/*==============================================================*/
/* Table: medios_contacto                                       */
/*==============================================================*/
create table medios_contacto
(
   cve_contacto         int not null,
   descripcion          varchar(100),
   imagen               varchar(50),
   activo               bit,
   primary key (cve_contacto)
);

/*==============================================================*/
/* Table: noticias                                              */
/*==============================================================*/
create table noticias
(
   cve_noticia          int not null,
   titulo               varchar(30),
   noticia_corta        varchar(200),
   noticia              varchar(1000),
   fecha_inicio         datetime,
   fecha_fin            datetime,
   foto_portada         varchar(40),
   foto1                varchar(40),
   foto2                varchar(40),
   foto3                varchar(40),
   primary key (cve_noticia)
);

/*==============================================================*/
/* Table: profesiones                                           */
/*==============================================================*/
create table profesiones
(
   cve_profesion        int not null,
   descripcion          varchar(100),
   logo                 varchar(50),
   activo               bit,
   primary key (cve_profesion)
);

alter table profesiones comment 'En esta tabla se encontraran las profesiones que se den de a';

/*==============================================================*/
/* Table: prospectos                                            */
/*==============================================================*/
create table prospectos
(
   cve_cliente          int not null,
   cve_logia            int,
   nombre               varchar(50),
   apellido_pat         varchar(50),
   apellido_mat         varchar(50),
   sexo                 bit,
   fecha_registro       datetime,
   habilitado           varchar(20) comment 'campo que guarda el usuario del cliente',
   fresita              varchar(20) comment 'campo que guardara la contraseña del usuario',
   activo               bool,
   primary key (cve_cliente)
);

/*==============================================================*/
/* Index: index_1                                               */
/*==============================================================*/
create index index_1 on prospectos
(
   cve_cliente
);

/*==============================================================*/
/* Table: registro_profesiones                                  */
/*==============================================================*/
create table registro_profesiones
(
   cve_registro         int not null,
   cve_profesion        int,
   nombre_empresa       varchar(200),
   logo                 varchar(50),
   domicilio            varchar(500),
   servicios_ofrecidos  varchar(1000),
   activo               bit,
   primary key (cve_registro)
);

alter table registro_profesiones comment 'Listado de personas que ofrecen servicios';

/*==============================================================*/
/* Table: ritos                                                 */
/*==============================================================*/
create table ritos
(
   cve_rito             int not null,
   descripcion          varchar(50),
   foto                 varchar(50),
   activo               bool,
   primary key (cve_rito)
);

alter table ritos comment 'CATALOGOS DE RITOS';

/*==============================================================*/
/* Index: index_1                                               */
/*==============================================================*/
create index index_1 on ritos
(
   cve_rito
);

/*==============================================================*/
/* Table: trabajos_logias                                       */
/*==============================================================*/
create table trabajos_logias
(
   cve_logia            int,
   cve_volumen          int
);

/*==============================================================*/
/* Table: volumenes                                             */
/*==============================================================*/
create table volumenes
(
   cve_volumen          int not null,
   cve_tipo             int,
   titulo               varchar(50),
   autor                varchar(100),
   imagen               varchar(100),
   descripcion          varchar(200),
   activo               bit,
   primary key (cve_volumen)
);

/*==============================================================*/
/* Table: volumen_grado                                         */
/*==============================================================*/
create table volumen_grado
(
   cve_clasificacion    int not null,
   cve_rito             int not null,
   cve_grado            int not null,
   cve_volumen          int not null,
   primary key (cve_clasificacion, cve_rito, cve_grado, cve_volumen)
);

alter table clasificaciones add constraint fk_reference_1 foreign key (cve_rito)
      references ritos (cve_rito);

alter table contactos_registros add constraint fk_reference_2 foreign key (cve_contacto)
      references medios_contacto (cve_contacto) on delete restrict on update restrict;

alter table contactos_registros add constraint fk_reference_3 foreign key (cve_registro)
      references registro_profesiones (cve_registro) on delete restrict on update restrict;

alter table grados add constraint fk_reference_2 foreign key (cve_clasificacion, cve_rito)
      references clasificaciones (cve_clasificacion, cve_rito);

alter table grandes_logias add constraint fk_reference_13 foreign key (cve_oriente)
      references grandes_orientes (cve_oriente) on delete restrict on update restrict;

alter table grandes_logias add constraint fk_reference_8 foreign key (cve_rito)
      references ritos (cve_rito) on delete restrict on update restrict;

alter table logias add constraint fk_reference_9 foreign key (cve_gran_logia)
      references grandes_logias (cve_gran_logia) on delete restrict on update restrict;

alter table prospectos add constraint fk_reference_7 foreign key (cve_logia)
      references logias (cve_logia) on delete restrict on update restrict;

alter table registro_profesiones add constraint fk_reference_1 foreign key (cve_profesion)
      references profesiones (cve_profesion) on delete restrict on update restrict;

alter table trabajos_logias add constraint fk_reference_14 foreign key (cve_logia)
      references logias (cve_logia) on delete restrict on update restrict;

alter table trabajos_logias add constraint fk_reference_15 foreign key (cve_volumen)
      references volumenes (cve_volumen) on delete restrict on update restrict;

alter table volumenes add constraint fk_reference_10 foreign key (cve_tipo)
      references cat_biblioteca (cve_tipo) on delete restrict on update restrict;

alter table volumen_grado add constraint fk_reference_11 foreign key (cve_clasificacion, cve_rito, cve_grado)
      references grados (cve_clasificacion, cve_rito, cve_grado) on delete restrict on update restrict;

alter table volumen_grado add constraint fk_reference_12 foreign key (cve_volumen)
      references volumenes (cve_volumen) on delete restrict on update restrict;

