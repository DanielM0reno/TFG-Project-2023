CREATE DATABASE 'proyecto-tfg';

CREATE TABLE `user` (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `name` varchar(255) default NULL,
  `email` varchar(255) default NULL,
  `password` varchar(15),
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=1;

CREATE TABLE `client` (
    `id` mediumint(8) unsigned NOT NULL auto_increment,
    `name` varchar(255) default NULL,
    `email` varchar(255) default NULL,
    `domicilio` varchar(255) default NULL,
    `telefono` varchar(4),
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=1;

CREATE TABLE `factura` (
    `id` mediumint(8) unsigned NOT NULL auto_increment,
    `cabecera` varchar(255) default NULL,
    `fecha_creacion` varchar(255),
    `fecha_modif` varchar(255) default NULL,
    `estado` varchar(255) default NULL,
    `id_user` mediumint(8) unsigned NOT NULL,
    `id_client` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`id_user`) REFERENCES `user`(`id`),
  FOREIGN KEY (`id_client`) REFERENCES `client`(`id`)
) AUTO_INCREMENT=1;

CREATE TABLE `product` (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `name` varchar(255) default NULL,
  `precio` float default NULL,
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=1;

CREATE TABLE `linea` (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `detalle` varchar(255) default NULL,
  `cantidad` integer default NULL,
  `id_product` mediumint(8) unsigned NOT NULL,
  `id_factura` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`id_product`) REFERENCES `product`(`id`),
  FOREIGN KEY (`id_factura`) REFERENCES `factura`(`id`)
) AUTO_INCREMENT=1;


INSERT INTO `user` (`name`,`email`,`password`)
VALUES
  ("Theodore Jarvis","risus.quis.diam@protonmail.edu",9846),
  ("Keane Chavez","nisl.maecenas.malesuada@icloud.net",7688),
  ("Brock Burke","risus@icloud.org",8711),
  ("Jessamine Lucas","ipsum.nunc@icloud.org",9279),
  ("Deanna Marks","amet.ante.vivamus@aol.ca",7183);