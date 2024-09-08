/* -------------------------------------->  Cambiar la Base de datos */

CREATE DATABASE proyectoNexlanpruebas;
USE proyectoNexlanpruebas;

CREATE TABLE estudiante (
    IDEstudiante INT NOT NULL AUTO_INCREMENT,
    documento VARCHAR(12) UNIQUE,
    primerNombre VARCHAR(50),
    segundoNombre VARCHAR(50) DEFAULT NULL,
    primerApellido VARCHAR(50),
    segundoApellido VARCHAR(50) DEFAULT NULL,
    calle VARCHAR(100),
    numeroPuerta VARCHAR(10),
    barrio VARCHAR(50),
    localidad VARCHAR(50),
    tel VARCHAR(20),
    email VARCHAR(100),
    pass VARCHAR(50),
    teorico VARCHAR(10),
    activo BOOLEAN DEFAULT TRUE,
    PRIMARY KEY (IDEstudiante, documento)
);

CREATE TABLE instructor (
    IDInstructor INT NOT NULL AUTO_INCREMENT,
    documento VARCHAR(12) UNIQUE,
    primerNombre VARCHAR(50),
    segundoNombre VARCHAR(50) DEFAULT NULL,
    primerApellido VARCHAR(50),
    segundoApellido VARCHAR(50) DEFAULT NULL,
    calle VARCHAR(100),
    numeroPuerta VARCHAR(10),
    barrio VARCHAR(50),
    localidad VARCHAR(50),
    tel VARCHAR(20),
    email VARCHAR(100),
    pass VARCHAR(50),
    activo BOOLEAN DEFAULT TRUE,
    PRIMARY KEY (IDInstructor, documento)
);

CREATE TABLE admin (
    nombre VARCHAR(8) UNIQUE NOT NULL,
    pass VARCHAR (50),
    PRIMARY KEY (nombre) 
);


INSERT INTO admin (nombre, pass) VALUES ('aguslopoli@gmail.com', '1234');
INSERT INTO admin (nombre, pass) VALUES ('roberto34xd@gmail.com', '1234');



CREATE TABLE vehiculos (
    ID_Vehiculos INT NOT NULL AUTO_INCREMENT,
    Matricula VARCHAR(8) UNIQUE,
    tipoId ENUM('Auto', 'Moto') NOT NULL,
    Modelo VARCHAR(30),
    Marca VARCHAR(20),
    AnioFabricacion INT(4),
    Color VARCHAR(15),
    Precio INT(10),
    Estado ENUM('Disponible', 'En clase', 'En mantenimiento'),
    activo BOOLEAN DEFAULT TRUE,
    PRIMARY KEY (ID_Vehiculos, Matricula)
);


CREATE TABLE events (
    id INT AUTO_INCREMENT,
    title VARCHAR(255),
    color VARCHAR(7),
    start DATE,
    descripcion VARCHAR(255),
    -- end DATE,
    `time` TIME,
    tipo ENUM('Teórico', 'Práctico'),
    IDInstructor INT,
    ID_Vehiculos INT,
    IDEstudiante INT,
    PRIMARY KEY (id),
    FOREIGN KEY (IDInstructor) REFERENCES instructor(IDInstructor),
    FOREIGN KEY (ID_Vehiculos) REFERENCES vehiculos(ID_Vehiculos),
    FOREIGN KEY (IDEstudiante) REFERENCES estudiante(IDEstudiante)
);