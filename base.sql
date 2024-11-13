/* -------------------------------------->  Cambiar la Base de datos */

CREATE DATABASE NexlanFinal;
USE NexlanFinal;

CREATE TABLE usuarios (
    id INT NOT NULL AUTO_INCREMENT,
    documento VARCHAR(12) UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    pass VARCHAR(50) NOT NULL,
    profile_image VARCHAR(255) DEFAULT 'img/default.png',
    rol ENUM('estudiante', 'instructor', 'administrativo') NOT NULL,
    PRIMARY KEY (id)
);


CREATE TABLE estudiante (
    IDEstudiante INT NOT NULL AUTO_INCREMENT,
    usuario_id INT NOT NULL UNIQUE,
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
    teorico VARCHAR(10),
    activo BOOLEAN DEFAULT TRUE,
    PRIMARY KEY (IDEstudiante),
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id),
    FOREIGN KEY (documento) REFERENCES usuarios(documento)
);

CREATE TABLE instructor (
    IDInstructor INT NOT NULL AUTO_INCREMENT,
    usuario_id INT NOT NULL UNIQUE,
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
    horasDictadas INT DEFAULT 0,
    activo BOOLEAN DEFAULT TRUE,
    PRIMARY KEY (IDInstructor),
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id),
    FOREIGN KEY (documento) REFERENCES usuarios(documento)
);

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
    kilometraje INT DEFAULT 0,
    activo BOOLEAN DEFAULT TRUE,
    PRIMARY KEY (ID_Vehiculos)
);





CREATE TABLE clases (
    id INT AUTO_INCREMENT,
    title VARCHAR(255),
    color VARCHAR(7),
    start DATE,
    descripcion VARCHAR(255),
    -- end DATE,
    `time` TIME,
    tipo ENUM('Teórico', 'Práctico'),
    IDInstructor INT,
    IDEstudiante INT,
    activo BOOLEAN DEFAULT TRUE,
    monto INT(10) DEFAULT 0,
    categoria ENUM(
    'G1', 'G2', 'G3',  -- Licencias para Motos
    'A1', 'A2', 'A3', 'A4', 'A5',  -- Licencias para Autos
    'F'  -- Licencia Especial
    )NOT NULL,
    Nota INT DEFAULT 0,
    notaDescripcion VARCHAR(255) DEFAULT 'Sin Evaluar',
    PRIMARY KEY (id),
    FOREIGN KEY (IDInstructor) REFERENCES instructor(IDInstructor),
    FOREIGN KEY (IDEstudiante) REFERENCES estudiante(IDEstudiante)
);

CREATE TABLE clases_teoricas (
    id INT PRIMARY KEY,
    FOREIGN KEY (id) REFERENCES clases(id)
);

CREATE TABLE clases_practicas (
    id INT PRIMARY KEY,
    ID_Vehiculos INT NOT NULL,
    FOREIGN KEY (id) REFERENCES clases(id),
    FOREIGN KEY (ID_Vehiculos) REFERENCES vehiculos(ID_Vehiculos)
);







DELIMITER $$
CREATE TRIGGER calcular_monto_clase
BEFORE INSERT ON clases
FOR EACH ROW
BEGIN
    IF NEW.categoria = 'G1' OR NEW.categoria = 'G2' OR NEW.categoria = 'G3' THEN
        SET NEW.monto = 500;  
    ELSE
        SET NEW.monto = 800;  
    END IF;
END;
$$
DELIMITER ;

CREATE TABLE admin (
    nombre VARCHAR(8) UNIQUE NOT NULL,
    pass VARCHAR (50),
    PRIMARY KEY (nombre) 
);

INSERT INTO admin (nombre, pass) VALUES ('administrativo@example.com', '1234');


/*************************************************************************/
CREATE TABLE preguntas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    texto TEXT NOT NULL,
    opcionA TEXT NOT NULL,
    opcionB TEXT NOT NULL,
    opcionC TEXT NOT NULL,
    opcionD TEXT NOT NULL,
    respuestaCorrecta CHAR(1) NOT NULL
);

CREATE TABLE material_didactico (
    id INT NOT NULL AUTO_INCREMENT,
    rutaPDF VARCHAR(255),
    PRIMARY KEY (id)
);

INSERT INTO preguntas (texto, opcionA, opcionB, opcionC, opcionD, respuestaCorrecta) VALUES
('¿Cuál es el límite de velocidad general en zonas urbanas?', '60 km/h', '45 km/h', '50 km/h', '40 km/h', 'b'),
('¿Cuál es el límite de alcohol en sangre permitido para conductores?', '0,3 g/L', '0,5 g/L', '0,1 g/L', '0,0 g/L', 'd'),
('Al acercarse a un paso de cebra, un conductor debe:', 'Aumentar la velocidad', 'Disminuir la velocidad y ceder el paso a los peatones', 'Continuar sin cambiar la velocidad', 'Tocar la bocina', 'b'),
('¿Quién tiene prioridad en un cruce peatonal?', 'Los vehículos', 'Los peatones', 'Los ciclistas', 'Los vehículos de emergencia', 'b'),
('¿Cada cuánto tiempo debe renovarse la licencia de conducir en Uruguay?', 'Cada 1 año', 'Cada 5 años', 'Cada 10 años', 'Nunca', 'b'),
('¿Qué es un "punto ciego"?', 'Un lugar de estacionamiento', 'Una zona donde no se puede ver otros vehículos', 'Una señal de tránsito', 'Un área de descanso', 'b'),
('¿Qué documentos debe llevar un conductor siempre?', 'Cédula de identidad', 'Licencia de conducir', 'Comprobante del vehículo', 'Todas las anteriores', 'd'),
('En una rotonda, ¿quién tiene prioridad de paso?', 'El vehículo que está dentro de la rotonda', 'El vehículo que intenta ingresar a la rotonda', 'El vehículo más grande', 'El vehículo que viene por la derecha', 'a'),
('En una intersección sin semáforos ni señales, ¿quién tiene prioridad de paso?', 'El vehículo que viene por la derecha', 'El vehículo que viene por la izquierda', 'El vehículo más rápido', 'El vehículo más grande', 'a'),
('¿Cuándo es obligatorio encender las luces bajas del vehículo?', 'Solo de noche', 'De noche y en días de lluvia', 'Las 24 horas en rutas nacionales', 'Solo cuando hay niebla', 'c'),
('¿Qué significa una señal de tránsito triangular con borde rojo?', 'Prohibición', 'Obligación', 'Peligro o precaución', 'Información', 'c'),
('¿Qué significa una señal de tránsito circular con borde rojo?', 'Peligro', 'Prohibición', 'Obligación', 'Fin de prohibición', 'b'),
('¿Es obligatorio el uso del cinturón de seguridad?', 'Solo para el conductor', 'Solo para los pasajeros delanteros', 'Sí, para todos los ocupantes', 'No es obligatorio', 'c'),
('¿Qué debe hacer un conductor si ve un vehículo de emergencia con sirena y luces encendidas?', 'Acelerar para pasar primero', 'Mantener la velocidad', 'Desviarse a un lado y detenerse', 'Continuar su camino', 'c'),
('¿Qué función tienen las luces de freno en un vehículo?', 'Indicar que el vehículo está detenido', 'Advertir a los demás conductores que el vehículo está frenando', 'No tienen función', 'Mejorar la visibilidad del vehículo', 'b'),
('¿Qué significa una señal de "Zona de Obras"?', 'Se permite el estacionamiento', 'Cambios temporales en la señalización y condiciones de la vía', 'Está prohibido adelantar', 'Se debe acelerar', 'b'),
('¿Qué deben hacer los peatones al cruzar la calle?', 'Cruzar donde quieran', 'Usar el paso de cebra y mirar antes de cruzar', 'Solo mirar hacia la izquierda', 'Esperar que no haya vehículos', 'b'),
('¿Qué indica una señal de "Ceda el paso"?', 'Detenerse completamente', 'Reducir la velocidad y ceder el paso', 'Continuar sin detenerse', 'Acelerar para pasar', 'b'),
('¿Qué significa el uso de luces intermitentes en un vehículo?', 'Que el conductor está cansado', 'Que el vehículo está detenido o en maniobra', 'Que el conductor va a cambiar de dirección', 'Que el vehículo está en emergencia', 'b'),
('¿Qué debe hacer un conductor al cambiar de carril?', 'Señalizar y verificar el ángulo muerto', 'Cambiar sin avisar', 'Solo mirar por el espejo retrovisor', 'Esperar a que no haya tráfico', 'a'),
('¿Qué debe hacer un conductor al ver un ciclista en su carril?', 'Cambiar de carril sin advertencia', 'Tocar la bocina para advertir', 'Mantener la distancia y ceder el paso', 'Acelerar para pasar primero', 'c'),
('¿Qué se debe hacer al encontrar una señal de "Zona de riesgo"?', 'Ignorar la señal', 'Aumentar la velocidad', 'Reducir la velocidad y estar atento', 'Solo mirar a los lados', 'c'),
('¿Qué luces deben utilizarse al conducir en condiciones de poca visibilidad?', 'Luces de posición', 'Luces altas', 'Luces bajas', 'Ninguna luz', 'c'),
('¿Qué deben hacer los ciclistas al transitar por una carretera donde no hay ciclo vías?', 'Circular por la acera', 'Usar el carril derecho y estar atentos a los vehículos', 'Ignorar el tráfico', 'Solo circular por la calzada si hay poco tráfico', 'b'),
('¿Qué equipo de protección es obligatorio para un motociclista?', 'Solo casco', 'Casco y guantes', 'Casco, guantes y chaqueta adecuada', 'No es obligatorio el uso de protección', 'c'),
('¿Qué tipo de licencia se necesita para conducir una motocicleta?', 'Licencia de categoría A', 'Licencia de categoría B', 'Licencia de categoría C', 'No se requiere licencia', 'a'),
('¿Qué indica un cartel de "Prohibido adelantar"?', 'Se puede adelantar solo a vehículos lentos', 'Está prohibido adelantar en esa zona', 'Se debe reducir la velocidad al adelantar', 'Se permite adelantar si no hay tráfico', 'b'),
('¿Qué significa un cartel de "Stop"?', 'Se debe reducir la velocidad y continuar', 'Detenerse completamente antes de continuar', 'Solo mirar y proceder', 'No es obligatorio detenerse', 'b'),
('¿Qué significa un cartel de "Prohibido el paso"?', 'Se permite el acceso solo a vehículos de emergencia', 'Está prohibido el acceso a todos los vehículos', 'Solo se permite el paso a bicicletas', 'Se puede pasar si no hay tráfico', 'b'),
('¿Qué indica un cartel de "Prohibido estacionar"?', 'Se permite el estacionamiento solo durante la noche', 'Está prohibido detenerse y estacionar en esa área', 'Solo se permite estacionar con un permiso especial', 'Se permite estacionar solo a vehículos de emergencia', 'b');
/*************************************************************************/




CREATE TABLE usan (
    id INT AUTO_INCREMENT,
    ID_Vehiculos INT,
    IDEstudiante INT,
    PRIMARY KEY (id),
    FOREIGN KEY (ID_Vehiculos) REFERENCES vehiculos(ID_Vehiculos),
    FOREIGN KEY (IDEstudiante) REFERENCES estudiante(IDEstudiante)
);

CREATE TABLE dictan (
    id INT AUTO_INCREMENT,
    IDInstructor INT,
    idCurso INT,
    fechaHoraDicta datetime,
    PRIMARY KEY (id),
    FOREIGN KEY (IDInstructor) REFERENCES instructor(IDInstructor),
    FOREIGN KEY (idCurso) REFERENCES clases(id)
);

CREATE TABLE cursan (
    id INT AUTO_INCREMENT,
    IDEstudiante INT,
    idCurso INT,
    fechaHoraCursan datetime,
    PRIMARY KEY (id),
    FOREIGN KEY (IDEstudiante) REFERENCES estudiante(IDEstudiante),
    FOREIGN KEY (idCurso) REFERENCES clases(id)
);




-- Más inserts
INSERT INTO usuarios (documento, email, pass, rol) VALUES
('CI:567890123', 'estudiante3@example.com', 'password5', 'estudiante'),
('CI:678901234', 'estudiante4@example.com', 'password6', 'estudiante'),
('CI:789012345', 'instructor3@example.com', 'password7', 'instructor'),
('CI:890123456', 'instructor4@example.com', 'password8', 'instructor');
-- Insertar estudiantes
INSERT INTO estudiante (usuario_id, documento, primerNombre, segundoNombre, primerApellido, segundoApellido, calle, numeroPuerta, barrio, localidad, tel, teorico) VALUES
((SELECT id FROM usuarios WHERE documento = 'CI:567890123'), 'CI:567890123', 'Pedro', 'N/A', 'Diaz', 'N/A', 'Calle Azul', '321', 'Oeste', 'Montevideo', '099222333', 'Aprobado'),
((SELECT id FROM usuarios WHERE documento = 'CI:678901234'), 'CI:678901234', 'Laura', 'N/A', 'Fernandez', 'N/A', 'Calle Verde', '654', 'Este', 'Montevideo', '099555666', 'Pendiente');
-- Insertar instructores
INSERT INTO instructor (usuario_id, documento, primerNombre, segundoNombre, primerApellido, segundoApellido, calle, numeroPuerta, barrio, localidad, tel) VALUES
((SELECT id FROM usuarios WHERE documento = 'CI:789012345'), 'CI:789012345', 'Alejandro', 'N/A', 'Gonzalez', 'N/A', 'Calle Amarilla', '987', 'Centro', 'Montevideo', '099777888'),
((SELECT id FROM usuarios WHERE documento = 'CI:890123456'), 'CI:890123456', 'Sofia', 'N/A', 'Ramirez', 'N/A', 'Calle Naranja', '210', 'Sur', 'Montevideo', '099999000');
-- Insertar vehículos
INSERT INTO vehiculos (Matricula, tipoId, Modelo, Marca, AnioFabricacion, Color, Precio, Estado) VALUES
('DEF2468', 'Auto', 'Civic', 'Honda', 2018, 'Azul', 25000, 'Disponible'),
('GHI8642', 'Moto', 'R6', 'Yamaha', 2021, 'Rojo', 20000, 'Disponible');
-- Insertar clases teóricas
INSERT INTO clases (title, color, start, descripcion, time, tipo, IDInstructor, IDEstudiante, categoria) VALUES
('Clase Teórica 3', '#800080', '2024-10-03', 'Descripción Clase Teórica 3', '14:00:00', 'Teórico', (SELECT IDInstructor FROM instructor WHERE documento = 'CI:789012345'), (SELECT IDEstudiante FROM estudiante WHERE documento = 'CI:567890123'), 'A3'),
('Clase Teórica 4', '#008080', '2024-10-04', 'Descripción Clase Teórica 4', '15:00:00', 'Teórico', (SELECT IDInstructor FROM instructor WHERE documento = 'CI:890123456'), (SELECT IDEstudiante FROM estudiante WHERE documento = 'CI:678901234'), 'A4');
-- Insertar en clases_teoricas
INSERT INTO clases_teoricas (id) VALUES
((SELECT id FROM clases WHERE title = 'Clase Teórica 3')),
((SELECT id FROM clases WHERE title = 'Clase Teórica 4'));
-- Insertar en dictan y cursan para clases teóricas
INSERT INTO dictan (IDInstructor, idCurso, fechaHoraDicta) VALUES
((SELECT IDInstructor FROM instructor WHERE documento = 'CI:789012345'), (SELECT id FROM clases WHERE title = 'Clase Teórica 3'), '2024-10-03 14:00:00'),
((SELECT IDInstructor FROM instructor WHERE documento = 'CI:890123456'), (SELECT id FROM clases WHERE title = 'Clase Teórica 4'), '2024-10-04 15:00:00');
INSERT INTO cursan (IDEstudiante, idCurso, fechaHoraCursan) VALUES
((SELECT IDEstudiante FROM estudiante WHERE documento = 'CI:567890123'), (SELECT id FROM clases WHERE title = 'Clase Teórica 3'), '2024-10-03 14:00:00'),
((SELECT IDEstudiante FROM estudiante WHERE documento = 'CI:678901234'), (SELECT id FROM clases WHERE title = 'Clase Teórica 4'), '2024-10-04 15:00:00');
-- Insertar clases prácticas
INSERT INTO clases (title, color, start, descripcion, time, tipo, IDInstructor, IDEstudiante, categoria) VALUES
('Clase Práctica 3', '#800000', '2024-10-05', 'Descripción Clase Práctica 3', '16:00:00', 'Práctico', (SELECT IDInstructor FROM instructor WHERE documento = 'CI:789012345'), (SELECT IDEstudiante FROM estudiante WHERE documento = 'CI:567890123'), 'A3'),
('Clase Práctica 4', '#008000', '2024-10-06', 'Descripción Clase Práctica 4', '17:00:00', 'Práctico', (SELECT IDInstructor FROM instructor WHERE documento = 'CI:890123456'), (SELECT IDEstudiante FROM estudiante WHERE documento = 'CI:678901234'), 'A4');
-- Insertar en clases_practicas
INSERT INTO clases_practicas (id, ID_Vehiculos) VALUES
((SELECT id FROM clases WHERE title = 'Clase Práctica 3'), (SELECT ID_Vehiculos FROM vehiculos WHERE Matricula = 'DEF2468')),
((SELECT id FROM clases WHERE title = 'Clase Práctica 4'), (SELECT ID_Vehiculos FROM vehiculos WHERE Matricula = 'GHI8642'));
-- Insertar en usan, dictan y cursan para clases prácticas
INSERT INTO usan (ID_Vehiculos, IDEstudiante) VALUES
((SELECT ID_Vehiculos FROM vehiculos WHERE Matricula = 'DEF2468'), (SELECT IDEstudiante FROM estudiante WHERE documento = 'CI:567890123')),
((SELECT ID_Vehiculos FROM vehiculos WHERE Matricula = 'GHI8642'), (SELECT IDEstudiante FROM estudiante WHERE documento = 'CI:678901234'));
INSERT INTO dictan (IDInstructor, idCurso, fechaHoraDicta) VALUES
((SELECT IDInstructor FROM instructor WHERE documento = 'CI:789012345'), (SELECT id FROM clases WHERE title = 'Clase Práctica 3'), '2024-10-05 16:00:00'),
((SELECT IDInstructor FROM instructor WHERE documento = 'CI:890123456'), (SELECT id FROM clases WHERE title = 'Clase Práctica 4'), '2024-10-06 17:00:00');
INSERT INTO cursan (IDEstudiante, idCurso, fechaHoraCursan) VALUES
((SELECT IDEstudiante FROM estudiante WHERE documento = 'CI:567890123'), (SELECT id FROM clases WHERE title = 'Clase Práctica 3'), '2024-10-05 16:00:00'),
((SELECT IDEstudiante FROM estudiante WHERE documento = 'CI:678901234'), (SELECT id FROM clases WHERE title = 'Clase Práctica 4'), '2024-10-06 17:00:00');








-- Insertar usuarios
INSERT INTO usuarios (documento, email, pass, rol) VALUES
('CI:123456789', 'estudiante5@example.com', 'password9', 'estudiante'),
('CI:234567890', 'estudiante6@example.com', 'password10', 'estudiante'),
('CI:345678901', 'instructor5@example.com', 'password11', 'instructor'),
('CI:456789012', 'instructor6@example.com', 'password12', 'instructor');

-- Insertar estudiantes
INSERT INTO estudiante (usuario_id, documento, primerNombre, segundoNombre, primerApellido, segundoApellido, calle, numeroPuerta, barrio, localidad, tel, teorico) VALUES
((SELECT id FROM usuarios WHERE documento = 'CI:123456789'), 'CI:123456789', 'Carlos', 'N/A', 'Perez', 'N/A', 'Calle Roja', '111', 'Norte', 'Montevideo', '099111222', 'Aprobado'),
((SELECT id FROM usuarios WHERE documento = 'CI:234567890'), 'CI:234567890', 'Ana', 'N/A', 'Martinez', 'N/A', 'Calle Blanca', '222', 'Sur', 'Montevideo', '099333444', 'Pendiente');

-- Insertar instructores
INSERT INTO instructor (usuario_id, documento, primerNombre, segundoNombre, primerApellido, segundoApellido, calle, numeroPuerta, barrio, localidad, tel) VALUES
((SELECT id FROM usuarios WHERE documento = 'CI:345678901'), 'CI:345678901', 'Luis', 'N/A', 'Rodriguez', 'N/A', 'Calle Negra', '333', 'Este', 'Montevideo', '099555666'),
((SELECT id FROM usuarios WHERE documento = 'CI:456789012'), 'CI:456789012', 'Maria', 'N/A', 'Lopez', 'N/A', 'Calle Gris', '444', 'Oeste', 'Montevideo', '099777888');

-- Insertar vehículos
INSERT INTO vehiculos (Matricula, tipoId, Modelo, Marca, AnioFabricacion, Color, Precio, Estado) VALUES
('JKL1357', 'Auto', 'Accord', 'Honda', 2019, 'Negro', 27000, 'Disponible'),
('MNO7531', 'Moto', 'CBR500', 'Honda', 2020, 'Blanco', 22000, 'Disponible');

-- Insertar clases teóricas
INSERT INTO clases (title, color, start, descripcion, time, tipo, IDInstructor, IDEstudiante, categoria) VALUES
('Clase Teórica 5', '#FF5733', '2024-11-01', 'Descripción Clase Teórica 5', '10:00:00', 'Teórico', (SELECT IDInstructor FROM instructor WHERE documento = 'CI:345678901'), (SELECT IDEstudiante FROM estudiante WHERE documento = 'CI:123456789'), 'A1'),
('Clase Teórica 6', '#33FF57', '2024-11-02', 'Descripción Clase Teórica 6', '11:00:00', 'Teórico', (SELECT IDInstructor FROM instructor WHERE documento = 'CI:456789012'), (SELECT IDEstudiante FROM estudiante WHERE documento = 'CI:234567890'), 'A2');

-- Insertar en clases_teoricas
INSERT INTO clases_teoricas (id) VALUES
((SELECT id FROM clases WHERE title = 'Clase Teórica 5')),
((SELECT id FROM clases WHERE title = 'Clase Teórica 6'));

-- Insertar en dictan y cursan para clases teóricas
INSERT INTO dictan (IDInstructor, idCurso, fechaHoraDicta) VALUES
((SELECT IDInstructor FROM instructor WHERE documento = 'CI:345678901'), (SELECT id FROM clases WHERE title = 'Clase Teórica 5'), '2024-11-01 10:00:00'),
((SELECT IDInstructor FROM instructor WHERE documento = 'CI:456789012'), (SELECT id FROM clases WHERE title = 'Clase Teórica 6'), '2024-11-02 11:00:00');

INSERT INTO cursan (IDEstudiante, idCurso, fechaHoraCursan) VALUES
((SELECT IDEstudiante FROM estudiante WHERE documento = 'CI:123456789'), (SELECT id FROM clases WHERE title = 'Clase Teórica 5'), '2024-11-01 10:00:00'),
((SELECT IDEstudiante FROM estudiante WHERE documento = 'CI:234567890'), (SELECT id FROM clases WHERE title = 'Clase Teórica 6'), '2024-11-02 11:00:00');

-- Insertar clases prácticas
INSERT INTO clases (title, color, start, descripcion, time, tipo, IDInstructor, IDEstudiante, categoria) VALUES
('Clase Práctica 5', '#FF33FF', '2024-11-03', 'Descripción Clase Práctica 5', '12:00:00', 'Práctico', (SELECT IDInstructor FROM instructor WHERE documento = 'CI:345678901'), (SELECT IDEstudiante FROM estudiante WHERE documento = 'CI:123456789'), 'A1'),
('Clase Práctica 6', '#33FFFF', '2024-11-04', 'Descripción Clase Práctica 6', '13:00:00', 'Práctico', (SELECT IDInstructor FROM instructor WHERE documento = 'CI:456789012'), (SELECT IDEstudiante FROM estudiante WHERE documento = 'CI:234567890'), 'A2');

-- Insertar en clases_practicas
INSERT INTO clases_practicas (id, ID_Vehiculos) VALUES
((SELECT id FROM clases WHERE title = 'Clase Práctica 5'), (SELECT ID_Vehiculos FROM vehiculos WHERE Matricula = 'JKL1357')),
((SELECT id FROM clases WHERE title = 'Clase Práctica 6'), (SELECT ID_Vehiculos FROM vehiculos WHERE Matricula = 'MNO7531'));

-- Insertar en usan, dictan y cursan para clases prácticas
INSERT INTO usan (ID_Vehiculos, IDEstudiante) VALUES
((SELECT ID_Vehiculos FROM vehiculos WHERE Matricula = 'JKL1357'), (SELECT IDEstudiante FROM estudiante WHERE documento = 'CI:123456789')),
((SELECT ID_Vehiculos FROM vehiculos WHERE Matricula = 'MNO7531'), (SELECT IDEstudiante FROM estudiante WHERE documento = 'CI:234567890'));

INSERT INTO dictan (IDInstructor, idCurso, fechaHoraDicta) VALUES
((SELECT IDInstructor FROM instructor WHERE documento = 'CI:345678901'), (SELECT id FROM clases WHERE title = 'Clase Práctica 5'), '2024-11-03 12:00:00'),
((SELECT IDInstructor FROM instructor WHERE documento = 'CI:456789012'), (SELECT id FROM clases WHERE title = 'Clase Práctica 6'), '2024-11-04 13:00:00');

INSERT INTO cursan (IDEstudiante, idCurso, fechaHoraCursan) VALUES
((SELECT IDEstudiante FROM estudiante WHERE documento = 'CI:123456789'), (SELECT id FROM clases WHERE title = 'Clase Práctica 5'), '2024-11-03 12:00:00'),
((SELECT IDEstudiante FROM estudiante WHERE documento = 'CI:234567890'), (SELECT id FROM clases WHERE title = 'Clase Práctica 6'), '2024-11-04 13:00:00');






-- Insertar usuarios
INSERT INTO usuarios (documento, email, pass, rol) VALUES
('CI:567890124', 'estudiante7@example.com', 'password13', 'estudiante'),
('CI:678901235', 'estudiante8@example.com', 'password14', 'estudiante'),
('CI:789012346', 'instructor7@example.com', 'password15', 'instructor'),
('CI:890123457', 'instructor8@example.com', 'password16', 'instructor');

-- Insertar estudiantes
INSERT INTO estudiante (usuario_id, documento, primerNombre, segundoNombre, primerApellido, segundoApellido, calle, numeroPuerta, barrio, localidad, tel, teorico) VALUES
((SELECT id FROM usuarios WHERE documento = 'CI:567890124'), 'CI:567890124', 'Juan', 'N/A', 'Gomez', 'N/A', 'Calle Azul', '123', 'Oeste', 'Montevideo', '099123456', 'Aprobado'),
((SELECT id FROM usuarios WHERE documento = 'CI:678901235'), 'CI:678901235', 'Marta', 'N/A', 'Lopez', 'N/A', 'Calle Verde', '456', 'Este', 'Montevideo', '099654321', 'Pendiente');

-- Insertar instructores
INSERT INTO instructor (usuario_id, documento, primerNombre, segundoNombre, primerApellido, segundoApellido, calle, numeroPuerta, barrio, localidad, tel) VALUES
((SELECT id FROM usuarios WHERE documento = 'CI:789012346'), 'CI:789012346', 'Carlos', 'N/A', 'Martinez', 'N/A', 'Calle Amarilla', '789', 'Centro', 'Montevideo', '099987654'),
((SELECT id FROM usuarios WHERE documento = 'CI:890123457'), 'CI:890123457', 'Lucia', 'N/A', 'Fernandez', 'N/A', 'Calle Naranja', '321', 'Sur', 'Montevideo', '099321987');

-- Insertar vehículos
INSERT INTO vehiculos (Matricula, tipoId, Modelo, Marca, AnioFabricacion, Color, Precio, Estado) VALUES
('DEF1357', 'Auto', 'Corolla', 'Toyota', 2020, 'Blanco', 28000, 'Disponible'),
('GHI7531', 'Moto', 'Ninja', 'Kawasaki', 2021, 'Verde', 23000, 'Disponible');

-- Insertar clases teóricas
INSERT INTO clases (title, color, start, descripcion, time, tipo, IDInstructor, IDEstudiante, categoria) VALUES
('Clase Teórica 7', '#FF5733', '2024-12-01', 'Descripción Clase Teórica 7', '09:00:00', 'Teórico', (SELECT IDInstructor FROM instructor WHERE documento = 'CI:789012346'), (SELECT IDEstudiante FROM estudiante WHERE documento = 'CI:567890124'), 'A1'),
('Clase Teórica 8', '#33FF57', '2024-12-02', 'Descripción Clase Teórica 8', '10:00:00', 'Teórico', (SELECT IDInstructor FROM instructor WHERE documento = 'CI:890123457'), (SELECT IDEstudiante FROM estudiante WHERE documento = 'CI:678901235'), 'A2');

-- Insertar en clases_teoricas
INSERT INTO clases_teoricas (id) VALUES
((SELECT id FROM clases WHERE title = 'Clase Teórica 7')),
((SELECT id FROM clases WHERE title = 'Clase Teórica 8'));

-- Insertar en dictan y cursan para clases teóricas
INSERT INTO dictan (IDInstructor, idCurso, fechaHoraDicta) VALUES
((SELECT IDInstructor FROM instructor WHERE documento = 'CI:789012346'), (SELECT id FROM clases WHERE title = 'Clase Teórica 7'), '2024-12-01 09:00:00'),
((SELECT IDInstructor FROM instructor WHERE documento = 'CI:890123457'), (SELECT id FROM clases WHERE title = 'Clase Teórica 8'), '2024-12-02 10:00:00');

INSERT INTO cursan (IDEstudiante, idCurso, fechaHoraCursan) VALUES
((SELECT IDEstudiante FROM estudiante WHERE documento = 'CI:567890124'), (SELECT id FROM clases WHERE title = 'Clase Teórica 7'), '2024-12-01 09:00:00'),
((SELECT IDEstudiante FROM estudiante WHERE documento = 'CI:678901235'), (SELECT id FROM clases WHERE title = 'Clase Teórica 8'), '2024-12-02 10:00:00');

-- Insertar clases prácticas
INSERT INTO clases (title, color, start, descripcion, time, tipo, IDInstructor, IDEstudiante, categoria) VALUES
('Clase Práctica 7', '#FF33FF', '2024-12-03', 'Descripción Clase Práctica 7', '11:00:00', 'Práctico', (SELECT IDInstructor FROM instructor WHERE documento = 'CI:789012346'), (SELECT IDEstudiante FROM estudiante WHERE documento = 'CI:567890124'), 'A1'),
('Clase Práctica 8', '#33FFFF', '2024-12-04', 'Descripción Clase Práctica 8', '12:00:00', 'Práctico', (SELECT IDInstructor FROM instructor WHERE documento = 'CI:890123457'), (SELECT IDEstudiante FROM estudiante WHERE documento = 'CI:678901235'), 'A2');

-- Insertar en clases_practicas
INSERT INTO clases_practicas (id, ID_Vehiculos) VALUES
((SELECT id FROM clases WHERE title = 'Clase Práctica 7'), (SELECT ID_Vehiculos FROM vehiculos WHERE Matricula = 'DEF1357')),
((SELECT id FROM clases WHERE title = 'Clase Práctica 8'), (SELECT ID_Vehiculos FROM vehiculos WHERE Matricula = 'GHI7531'));

-- Insertar en usan, dictan y cursan para clases prácticas
INSERT INTO usan (ID_Vehiculos, IDEstudiante) VALUES
((SELECT ID_Vehiculos FROM vehiculos WHERE Matricula = 'DEF1357'), (SELECT IDEstudiante FROM estudiante WHERE documento = 'CI:567890124')),
((SELECT ID_Vehiculos FROM vehiculos WHERE Matricula = 'GHI7531'), (SELECT IDEstudiante FROM estudiante WHERE documento = 'CI:678901235'));

INSERT INTO dictan (IDInstructor, idCurso, fechaHoraDicta) VALUES
((SELECT IDInstructor FROM instructor WHERE documento = 'CI:789012346'), (SELECT id FROM clases WHERE title = 'Clase Práctica 7'), '2024-12-03 11:00:00'),
((SELECT IDInstructor FROM instructor WHERE documento = 'CI:890123457'), (SELECT id FROM clases WHERE title = 'Clase Práctica 8'), '2024-12-04 12:00:00');

INSERT INTO cursan (IDEstudiante, idCurso, fechaHoraCursan) VALUES
((SELECT IDEstudiante FROM estudiante WHERE documento = 'CI:567890124'), (SELECT id FROM clases WHERE title = 'Clase Práctica 7'), '2024-12-03 11:00:00'),
((SELECT IDEstudiante FROM estudiante WHERE documento = 'CI:678901235'), (SELECT id FROM clases WHERE title = 'Clase Práctica 8'), '2024-12-04 12:00:00');








