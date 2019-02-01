/*==============================================================*/
/* DBMS name:      Sybase SQL Anywhere 10                       */
/* Created on:     11/09/2018 12:32:35 a.m.                     */
/*==============================================================*/

drop table if exists CATEGORIA;

drop table if exists PRODUCTO;

drop table if exists OPERACION;


/*==============================================================*/
/* Table: CATEGORIA                                               */
/*==============================================================*/
create table CATEGORIA 
(
   id                   int                            not null AUTO_INCREMENT,
   nombre               varchar(150)                   not null,
   descripcion          varchar(150)                   not null,
   created_at           timestamp,
   updated_at           timestamp,
   constraint PK_CATEGORIA primary key (id)
);

/*==============================================================*/
/* Table: PRODUCTO                                          */
/*==============================================================*/
create table PRODUCTO 
(
   id                   int                            not null AUTO_INCREMENT,
   id_categoria         int                            null,
   nombre               varchar(150)                   not null,
   descripcion          varchar(150)                   not null,
   min_inventario       int                            null,
   precio_compra        float                          not null,
   precio_venta         float                          not null,
   cantidad             int                            not null,
   created_at           timestamp,
   updated_at           timestamp,
   constraint PK_PRODUCTO primary key (id)
);

/*==============================================================*/
/* Table: OPERACION                                             */
/*==============================================================*/
create table OPERACION 
(
   id                   int                            not null AUTO_INCREMENT,
   id_producto          int                            null,
   tipo                 int                            null,
   created_at           timestamp,
   updated_at           timestamp,
   constraint PK_OPERACION primary key (id)
);

alter table PRODUCTO add foreign key (id_categoria) references CATEGORIA (id);

alter table OPERACION add foreign key (id_producto) references PRODUCTO (id);

