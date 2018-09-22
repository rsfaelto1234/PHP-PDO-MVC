DROP DATABASE IF EXISTS tutorialpdo;

CREATE DATABASE tutorialpdo;
USE tutorialpdo;

CREATE TABLE productos(
	id_producto INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	nombre varchar(100) NOT NULL,
	descripcion varchar(500) NOT NULL,
	categoria varchar(50) NOT NULL,
	precio float NOT NULL
);


SELECT * FROM productos;
