CREATE TABLE `user` (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `name` varchar(255) default NULL,
  `email` varchar(255) default NULL,
  `password` varchar(4),
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


