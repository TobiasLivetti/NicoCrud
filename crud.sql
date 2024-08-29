DROP DATABASE IF EXISTS crud;

CREATE DATABASE crud;
USE curd;

CREATE TABLE personas (
    idPersonas INT UNSIGNED AUTO_INCREMENT,
    nombre VARCHAR(255) NOT NULL,
    PRIMARY KEY(id)
);

CREATE TABLE usuarios (
    idUsuarios INT AUTO_INCREMENT,
    nombre VARCHAR(255) NOT NULL,
    clave VARCHAR(255) NOT NULL,
    PRIMARY KEY(idUsuarios)
);