CREATE TABLE `user` (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `name` varchar(255) default NULL,
  `email` varchar(255) default NULL,
  `password` varchar(4),
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=1;

INSERT INTO `user` (`name`,`email`,`password`)
VALUES
  ("Theodore Jarvis","risus.quis.diam@protonmail.edu",9846),
  ("Keane Chavez","nisl.maecenas.malesuada@icloud.net",7688),
  ("Brock Burke","risus@icloud.org",8711),
  ("Jessamine Lucas","ipsum.nunc@icloud.org",9279),
  ("Deanna Marks","amet.ante.vivamus@aol.ca",7183);

CREATE TABLE `factura` (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `cabecera` varchar(255) default NULL,
  `detalle` varchar(255) default NULL,
    `fecha_creacion` varchar(255),
    `fecha_modif` varchar(255) default NULL,
    `estado` varchar(255) default NULL,
    `id_user` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`id_user`) REFERENCES `user`(`id`)
) AUTO_INCREMENT=1;

INSERT INTO `factura` (`cabecera`,`detalle`,`fecha_creacion`, `estado`, `id_user`)
VALUES
    ("Facturacion Enero","Facturacion realizada en el mes de Enero","22/01/2023", "a", 1),
    ("Facturacion Febrero","Facturacion realizada en el mes de Febrero","23/02/2023", "a", 1),
    ("Facturacion Marzo","Facturacion realizada en el mes de Marzo","23/03/2023", "d", 1),
    ("Grupo Porcelanosa","Facturacion realizada en el mes de Febrero Porcelanosa","23/02/2023", "a", 2),
    ("Grupo Mercadona","Facturacion realizada en el mes de Febrero Mercadona","23/02/2023", "a", 2);