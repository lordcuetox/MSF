/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     08/06/2015 11:28:53 a. m.                    */
/*==============================================================*/


drop table if exists CAT_BIBLIOTECA;

drop index INDEX_1 on CLASIFICACIONES;

drop table if exists CLASIFICACIONES;

drop table if exists CONTACTOS_REGISTROS;

drop table if exists EVENTOS;

drop index INDEX_1 on GRADOS;

drop table if exists GRADOS;

drop table if exists GRANDES_LOGIAS;

drop table if exists LOGIAS;

drop table if exists MEDIOS_CONTACTO;

drop table if exists NOTICIAS;

drop table if exists PROFESIONES;

drop index INDEX_1 on PROSPECTOS;

drop table if exists PROSPECTOS;

drop table if exists REGISTRO_PROFESIONES;

drop index INDEX_1 on RITOS;

drop table if exists RITOS;

drop table if exists VOLUMENES;

drop table if exists VOLUMEN_GRADO;

/*==============================================================*/
/* Table: CAT_BIBLIOTECA                                        */
/*==============================================================*/
create table CAT_BIBLIOTECA
(
   CVE_TIPO             int not null,
   DESCRIPCION          varchar(50),
   ACTIVO               bit,
   primary key (CVE_TIPO)
);

/*==============================================================*/
/* Table: CLASIFICACIONES                                       */
/*==============================================================*/
create table CLASIFICACIONES
(
   CVE_RITO             int not null,
   CVE_CLASIFICACION    int not null,
   DESCRIPCION          varchar(50),
   ACTIVO               bool,
   primary key (CVE_CLASIFICACION, CVE_RITO)
);

alter table CLASIFICACIONES comment 'se clasifican en dos 
simbolica
y filosofica';

/*==============================================================*/
/* Index: INDEX_1                                               */
/*==============================================================*/
create index INDEX_1 on CLASIFICACIONES
(
   CVE_RITO,
   CVE_CLASIFICACION
);

/*==============================================================*/
/* Table: CONTACTOS_REGISTROS                                   */
/*==============================================================*/
create table CONTACTOS_REGISTROS
(
   CVE_CONTACTO         int not null,
   CVE_REGISTRO         int not null,
   DATO                 varchar(100),
   ACTIVO               bit,
   primary key (CVE_CONTACTO, CVE_REGISTRO)
);

alter table CONTACTOS_REGISTROS comment 'es la relacion de medios de contacto con los registros de se';

/*==============================================================*/
/* Table: EVENTOS                                               */
/*==============================================================*/
create table EVENTOS
(
   CVE_EVENTO           int not null,
   NOMBRE               varchar(20),
   FOTO_PRINCIPAL       varchar(30),
   FOTO1                varchar(30),
   FOTO2                varchar(30),
   FOTO3                varchar(30),
   FOTO4                varchar(30),
   DESCRIPCION          varchar(1000),
   FECHA_INICIO         datetime,
   FECHA_FIN            datetime,
   primary key (CVE_EVENTO)
);

/*==============================================================*/
/* Table: GRADOS                                                */
/*==============================================================*/
create table GRADOS
(
   CVE_RITO             int not null,
   CVE_CLASIFICACION    int not null,
   CVE_GRADO            int not null,
   DESCRIPCION          varchar(50),
   ACTIVO               bool,
   primary key (CVE_CLASIFICACION, CVE_RITO, CVE_GRADO)
);

alter table GRADOS comment 'grados de los ritos por clasificacion';

/*==============================================================*/
/* Index: INDEX_1                                               */
/*==============================================================*/
create index INDEX_1 on GRADOS
(
   CVE_RITO,
   CVE_CLASIFICACION,
   CVE_GRADO
);

/*==============================================================*/
/* Table: GRANDES_LOGIAS                                        */
/*==============================================================*/
create table GRANDES_LOGIAS
(
   CVE_GRAN_LOGIA       int not null,
   CVE_RITO             int not null,
   NOMBRE               varchar(50),
   FOTO                 varchar(100),
   PAIS                 varchar(50),
   ESTADO               varchar(50),
   DIRECCION            varchar(200),
   ACTIVO               bit,
   primary key (CVE_GRAN_LOGIA)
);

/*==============================================================*/
/* Table: LOGIAS                                                */
/*==============================================================*/
create table LOGIAS
(
   CVE_LOGIA            int not null,
   CVE_GRAN_LOGIA       int,
   NOMBRE               varchar(50),
   DIRECCION            varchar(100),
   TRABAJOS             varchar(30),
   ACTIVO               bit,
   primary key (CVE_LOGIA)
);

/*==============================================================*/
/* Table: MEDIOS_CONTACTO                                       */
/*==============================================================*/
create table MEDIOS_CONTACTO
(
   CVE_CONTACTO         int not null,
   DESCRIPCION          varchar(100),
   IMAGEN               varchar(50),
   BIT                  bit,
   primary key (CVE_CONTACTO)
);

/*==============================================================*/
/* Table: NOTICIAS                                              */
/*==============================================================*/
create table NOTICIAS
(
   CVE_NOTICIA          int not null,
   TITULO               varchar(30),
   NOTICIA_CORTA        varchar(200),
   NOTICIA              varchar(1000),
   FECHA_INICIO         datetime,
   FECHA_FIN            datetime,
   FOTO_PORTADA         varchar(40),
   FOTO1                varchar(40),
   FOTO2                varchar(40),
   FOTO3                varchar(40),
   primary key (CVE_NOTICIA)
);

/*==============================================================*/
/* Table: PROFESIONES                                           */
/*==============================================================*/
create table PROFESIONES
(
   CVE_PROFESION        int not null,
   DESCRIPCION          varchar(100),
   ACTIVO               bit,
   primary key (CVE_PROFESION)
);

alter table PROFESIONES comment 'En esta tabla se encontraran las profesiones que se den de a';

/*==============================================================*/
/* Table: PROSPECTOS                                            */
/*==============================================================*/
create table PROSPECTOS
(
   CVE_CLIENTE          int not null,
   CVE_LOGIA            int,
   NOMBRE               varchar(50),
   APELLIDO_PAT         varchar(50),
   APELLIDO_MAT         varchar(50),
   SEXO                 bit,
   FECHA_REGISTRO       datetime,
   HABILITADO           varchar(20) comment 'campo que guarda el usuario del cliente',
   FRESITA              varchar(20) comment 'campo que guardara la contraseña del usuario',
   ACTIVO               bool,
   primary key (CVE_CLIENTE)
);

/*==============================================================*/
/* Index: INDEX_1                                               */
/*==============================================================*/
create index INDEX_1 on PROSPECTOS
(
   CVE_CLIENTE
);

/*==============================================================*/
/* Table: REGISTRO_PROFESIONES                                  */
/*==============================================================*/
create table REGISTRO_PROFESIONES
(
   CVE_REGISTRO         int not null,
   CVE_PROFESION        int,
   NOMBRE_EMPRESA       varchar(200),
   DOMICILIO            varchar(500),
   SERVICIOS_OFRECIDOS  varchar(1000),
   ACTIVO               bit,
   primary key (CVE_REGISTRO)
);

alter table REGISTRO_PROFESIONES comment 'Listado de personas que ofrecen servicios';

/*==============================================================*/
/* Table: RITOS                                                 */
/*==============================================================*/
create table RITOS
(
   CVE_RITO             int not null,
   DESCRIPCION          varchar(50),
   FOTO                 varchar(50),
   ACTIVO               bool,
   primary key (CVE_RITO)
);

alter table RITOS comment 'CATALOGOS DE RITOS';

/*==============================================================*/
/* Index: INDEX_1                                               */
/*==============================================================*/
create index INDEX_1 on RITOS
(
   CVE_RITO
);

/*==============================================================*/
/* Table: VOLUMENES                                             */
/*==============================================================*/
create table VOLUMENES
(
   CVE_VOLUMEN          int not null,
   CVE_TIPO             int,
   TITULO               varchar(50),
   AUTOR                varchar(100),
   DESCRIPCION          varchar(200),
   ACTIVO               bit,
   primary key (CVE_VOLUMEN)
);

/*==============================================================*/
/* Table: VOLUMEN_GRADO                                         */
/*==============================================================*/
create table VOLUMEN_GRADO
(
   CVE_CLASIFICACION    int not null,
   CVE_RITO             int not null,
   CVE_GRADO            int not null,
   CVE_VOLUMEN          int not null,
   primary key (CVE_CLASIFICACION, CVE_RITO, CVE_GRADO, CVE_VOLUMEN)
);

alter table CLASIFICACIONES add constraint FK_REFERENCE_1 foreign key (CVE_RITO)
      references RITOS (CVE_RITO);

alter table CONTACTOS_REGISTROS add constraint FK_REFERENCE_2 foreign key (CVE_CONTACTO)
      references MEDIOS_CONTACTO (CVE_CONTACTO) on delete restrict on update restrict;

alter table CONTACTOS_REGISTROS add constraint FK_REFERENCE_3 foreign key (CVE_REGISTRO)
      references REGISTRO_PROFESIONES (CVE_REGISTRO) on delete restrict on update restrict;

alter table GRADOS add constraint FK_REFERENCE_2 foreign key (CVE_CLASIFICACION, CVE_RITO)
      references CLASIFICACIONES (CVE_CLASIFICACION, CVE_RITO);

alter table GRANDES_LOGIAS add constraint FK_REFERENCE_8 foreign key (CVE_RITO)
      references RITOS (CVE_RITO) on delete restrict on update restrict;

alter table LOGIAS add constraint FK_REFERENCE_9 foreign key (CVE_GRAN_LOGIA)
      references GRANDES_LOGIAS (CVE_GRAN_LOGIA) on delete restrict on update restrict;

alter table PROSPECTOS add constraint FK_REFERENCE_7 foreign key (CVE_LOGIA)
      references LOGIAS (CVE_LOGIA) on delete restrict on update restrict;

alter table REGISTRO_PROFESIONES add constraint FK_REFERENCE_1 foreign key (CVE_PROFESION)
      references PROFESIONES (CVE_PROFESION) on delete restrict on update restrict;

alter table VOLUMENES add constraint FK_REFERENCE_10 foreign key (CVE_TIPO)
      references CAT_BIBLIOTECA (CVE_TIPO) on delete restrict on update restrict;

alter table VOLUMEN_GRADO add constraint FK_REFERENCE_11 foreign key (CVE_CLASIFICACION, CVE_RITO, CVE_GRADO)
      references GRADOS (CVE_CLASIFICACION, CVE_RITO, CVE_GRADO) on delete restrict on update restrict;

alter table VOLUMEN_GRADO add constraint FK_REFERENCE_12 foreign key (CVE_VOLUMEN)
      references VOLUMENES (CVE_VOLUMEN) on delete restrict on update restrict;

