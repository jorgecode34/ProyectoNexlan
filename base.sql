/* -------------------------------------->  Cambiar la Base de datos */

CREATE DATABASE proyectoNexlanpruebas;
USE proyectoNexlanpruebas;

CREATE TABLE usuarios (
    id INT NOT NULL AUTO_INCREMENT,
    documento VARCHAR(12) UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    pass VARCHAR(50) NOT NULL,
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
    ID_Vehiculos INT,
    IDEstudiante INT,
    costo INT(255),
    activo BOOLEAN DEFAULT TRUE,
    PRIMARY KEY (id),
    FOREIGN KEY (IDInstructor) REFERENCES instructor(IDInstructor),
    FOREIGN KEY (ID_Vehiculos) REFERENCES vehiculos(ID_Vehiculos),
    FOREIGN KEY (IDEstudiante) REFERENCES estudiante(IDEstudiante)
);

CREATE TABLE admin (
    nombre VARCHAR(8) UNIQUE NOT NULL,
    pass VARCHAR (50),
    PRIMARY KEY (nombre) 
);

INSERT INTO admin (nombre, pass) VALUES ('aguslopoli@gmail.com', '1234');
INSERT INTO admin (nombre, pass) VALUES ('roberto34xd@gmail.com', '1234');


/*************************************************************************/
CREATE TABLE preguntas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    texto TEXT NOT NULL,
    opcion_a TEXT NOT NULL,
    opcion_b TEXT NOT NULL,
    opcion_c TEXT NOT NULL,
    opcion_d TEXT NOT NULL,
    respuesta_correcta CHAR(1) NOT NULL
);

INSERT INTO preguntas (texto, opcion_a, opcion_b, opcion_c, opcion_d, respuesta_correcta) VALUES
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

-- Inserts

-- INSERT INTO estudiante (documento, primerNombre, segundoNombre, primerApellido, segundoApellido, calle, numeroPuerta, barrio, localidad, tel, email, pass, teorico, activo)
-- VALUES
-- ('67345678', 'Juan', 'Carlos', 'Pérez', 'García', 'Av. Italia', '1234', 'Malvín', 'Montevideo', '099123456', 'juan.perez@gmail.com', 'password123', 'Aprobado', TRUE),
-- ('87325673', 'María', NULL, 'Rodríguez', 'Lopez', '18 de Julio', '4321', 'Centro', 'Montevideo', '098765432', 'maria.rodriguez@hotmail.com', 'mypass456', 'Pendiente', TRUE),
-- ('34783739', 'Luis', 'Fernando', 'Gómez', 'Sosa', 'Ellauri', '2211', 'Pocitos', 'Montevideo', '091234567', 'luis.gomez@gmail.com', 'mypwd789', 'Aprobado', TRUE),
-- ('59489389', 'Ana', 'Laura', 'Martínez', 'Figueroa', 'Colonia', '4567', 'Ciudad Vieja', 'Montevideo', '092345678', 'ana.martinez@yahoo.com', 'anapwd123', 'Pendiente', TRUE),
-- ('32432335', 'Pedro', NULL, 'Ramírez', 'Cruz', 'Rivera', '5678', 'Centro', 'Montevideo', '099876543', 'pedro.ramirez@gmail.com', 'pedropwd456', 'Aprobado', FALSE),
-- ('98347332', 'Lucía', 'María', 'Fernández', 'Pérez', 'Santiago', '7890', 'Cordón', 'Montevideo', '093456789', 'lucia.fernandez@gmail.com', 'luciapwd789', 'Pendiente', TRUE),
-- ('23478353', 'Ricardo', NULL, 'Alvarez', 'Gómez', '8 de Octubre', '8901', 'Prado', 'Montevideo', '099123987', 'ricardo.alvarez@hotmail.com', 'ricardopwd', 'Aprobado', TRUE),
-- ('98395782', 'Carolina', 'Isabel', 'Suárez', 'Torres', 'Artigas', '3456', 'Carrasco', 'Montevideo', '094567890', 'carolina.suarez@gmail.com', 'caropwd123', 'Pendiente', TRUE),
-- ('65738223', 'Miguel', 'Ángel', 'Vega', 'Ortega', 'Bvar. España', '6543', 'Pocitos', 'Montevideo', '097654321', 'miguel.vega@hotmail.com', 'miguelpwd456', 'Aprobado', TRUE),
-- ('39425353', 'Sofía', NULL, 'Castro', 'Silva', 'San Martín', '2345', 'La Blanqueada', 'Montevideo', '099876432', 'sofia.castro@gmail.com', 'sofiapwd789', 'Pendiente', FALSE);

-- INSERT INTO instructor (documento, primerNombre, segundoNombre, primerApellido, segundoApellido, calle, numeroPuerta, barrio, localidad, tel, email, pass, horasDictadas, activo)
-- VALUES
-- ('89894524', 'Gustavo', 'Enrique', 'López', 'Fernández', 'San José', '1111', 'Pocitos', 'Montevideo', '099111111', 'gustavo.lopez@outlook.com', 'instpwd123',25, TRUE),
-- ('35838235', 'Carla', 'Andrea', 'Torres', 'Martínez', 'Uruguay', '2222', 'Ciudad Vieja', 'Montevideo', '099222222', 'carla.torres@gmail.com', 'instpwd456',48, TRUE),
-- ('45875383', 'Roberto', NULL, 'González', 'Suárez', 'Mercedes', '3333', 'Malvín', 'Montevideo', '099333333', 'roberto.gonzalez@hotmail.com', 'instpwd789',84, TRUE),
-- ('30493845', 'María', 'Laura', 'Silva', 'Pérez', 'Colonia', '4444', 'Centro', 'Montevideo', '099444444', 'maria.silva@gmail.com', 'instpwd101',73, TRUE),
-- ('73852234', 'Fernando', NULL, 'Díaz', 'Ortega', '18 de Julio', '5555', 'Cordón', 'Montevideo', '099555555', 'fernando.diaz@hotmail.com', 'instpwd202',42, TRUE),
-- ('98394823', 'Lucía', 'Verónica', 'Rodríguez', 'Pintos', 'Rambla', '6666', 'Carrasco', 'Montevideo', '099666666', 'lucia.rodriguez@gmail.com', 'instpwd303',24, TRUE),
-- ('75814532', 'Matías', NULL, 'Pérez', 'Gómez', 'Artigas', '7777', 'Prado', 'Montevideo', '099777777', 'matias.perez@hotmail.com', 'instpwd404',98, TRUE),
-- ('29384372', 'Alejandro', 'Fabián', 'Morales', 'Sosa', 'Rivera', '8888', 'Punta Carretas', 'Montevideo', '099888888', 'alejandro.morales@gmail.com', 'instpwd505',21, TRUE),
-- ('85943236', 'Paola', 'Inés', 'Vega', 'Domínguez', 'San Martín', '9999', 'Centro', 'Montevideo', '099999999', 'paola.vega@outlook.com', 'instpwd606',14, TRUE),
-- ('23475672', 'Jorge', NULL, 'Castro', 'López', 'Ellauri', '1010', 'Cordón', 'Montevideo', '099101010', 'jorge.castro@gmail.com', 'instpwd707',11, TRUE);

-- INSERT INTO vehiculos (Matricula, tipoId, Modelo, Marca, AnioFabricacion, Color, Precio, Estado, kilometraje, activo)
-- VALUES
-- ('ABC1234', 'Auto', 'Corolla', 'Toyota', 2020, 'Blanco', 20000, 'Disponible',20000, TRUE),
-- ('DEF5678', 'Moto', 'CB500', 'Honda', 2019, 'Negro', 15000, 'Disponible',60000, TRUE),
-- ('GHI9012', 'Auto', 'Focus', 'Ford', 2021, 'Rojo', 25000, 'En mantenimiento',1000, TRUE),
-- ('JKL3456', 'Moto', 'Ninja', 'Kawasaki', 2018, 'Verde', 18000, 'Disponible',0, TRUE),
-- ('MNO7890', 'Auto', 'Civic', 'Honda', 2022, 'Azul', 22000, 'En mantenimiento',250000, TRUE),
-- ('PQR1234', 'Moto', 'Duke', 'KTM', 2020, 'Naranja', 16000, 'Disponible',68902, TRUE),
-- ('STU5678', 'Auto', 'Fiesta', 'Ford', 2021, 'Gris', 21000, 'En mantenimiento',24432, TRUE),
-- ('VWX9012', 'Moto', 'MT-07', 'Yamaha', 2019, 'Azul', 17000, 'Disponible',1000, TRUE),
-- ('YZA3456', 'Auto', 'Accord', 'Honda', 2020, 'Negro', 23000, 'En mantenimiento',0, TRUE),
-- ('BCD7890', 'Moto', 'CBR600', 'Honda', 2021, 'Rojo', 19000, 'Disponible',150350, TRUE);

-- INSERT INTO clases (title, color, start, descripcion, time, tipo, IDInstructor, ID_Vehiculos, IDEstudiante, activo)
-- VALUES
-- ('Curso Básico Teórico', '#800020', '2024-09-01', 'Curso introductorio de manejo', '09:00:00', 'Teórico', 1, 1, 1, TRUE), 
-- ('Curso Avanzado Práctico', '#3355ff', '2024-09-02', 'Curso avanzado para conductores', '10:00:00', 'Práctico', 2, 2, 2, TRUE),
-- ('Curso Manejo Nocturno', '#3355ff', '2024-09-03', 'Curso de manejo en condiciones nocturnas', '18:00:00', 'Práctico', 3, 3, 3, TRUE),
-- ('Curso Mecánica Básica', '#800020', '2024-09-04', 'Curso teórico de mecánica para conductores', '14:00:00', 'Teórico', 4, 4, 4, TRUE),
-- ('Curso Conducción Defensiva', '#3355ff', '2024-09-05', 'Curso de manejo defensivo en la ciudad', '11:00:00', 'Práctico', 5, 5, 5, TRUE),
-- ('Curso Licencia para Motos', '#800020', '2024-09-06', 'Curso teórico para obtener licencia de moto', '15:00:00', 'Teórico', 6, 6, 6, TRUE),
-- ('Curso Conducción en Ruta', '#3355ff', '2024-09-07', 'Curso práctico para manejar en rutas', '13:00:00', 'Práctico', 7, 7, 7, TRUE),
-- ('Curso Primeros Auxilios', '#800020', '2024-09-08', 'Curso teórico de primeros auxilios para conductores', '08:00:00', 'Teórico', 8, 8, 8, TRUE),
-- ('Curso Uso de GPS', '#3355ff', '2024-09-09', 'Curso práctico de uso de sistemas de navegación', '09:30:00', 'Práctico', 9, 9, 9, TRUE),
-- ('Curso Manejo de Emergencias', '#800020', '2024-09-10', 'Curso teórico de manejo de emergencias en el tránsito', '10:30:00', 'Teórico', 10, 10, 10, TRUE),
-- ('Examen Teórico', '#800020', '2024-09-11', 'Examen teórico para la licencia de conducción', '10:30:00', 'Teórico', 1, 2, 1, TRUE),
-- ('Examen Práctico', '#3355ff', '2024-09-12', 'Examen práctico para la licencia de conducción', '10:30:00', 'Práctico', 2, 3, 2, TRUE);

-- INSERT INTO usan (ID_Vehiculos, IDEstudiante)
-- VALUES
-- (1, 1),
-- (2, 2),
-- (3, 3),
-- (4, 4),
-- (5, 5),
-- (6, 6),
-- (7, 7),
-- (8, 8),
-- (9, 9),
-- (10, 10),
-- (1, 2),
-- (2, 3),
-- (3, 4),
-- (4, 5),
-- (5, 6),
-- (6, 7),
-- (7, 8),
-- (8, 9),
-- (9, 10),
-- (10, 1);

-- INSERT INTO dictan (IDInstructor, idCurso, fechaHoraDicta)
-- VALUES
-- (1, 1, '2024-09-01 09:00:00'),
-- (2, 2, '2024-09-02 10:00:00'),
-- (3, 3, '2024-09-03 18:00:00'),
-- (4, 4, '2024-09-04 14:00:00'),
-- (5, 5, '2024-09-05 11:00:00'),
-- (6, 6, '2024-09-06 15:00:00'),
-- (7, 7, '2024-09-07 13:00:00'),
-- (8, 8, '2024-09-08 08:00:00'),
-- (9, 9, '2024-09-09 09:30:00'),
-- (10, 10, '2024-09-10 10:30:00'),
-- (1, 11, '2024-09-11 10:30:00'),
-- (2, 12, '2024-09-12 10:30:00');

-- INSERT INTO cursan (IDEstudiante, idCurso, fechaHoraCursan)
-- VALUES
-- (1, 1, '2024-09-01 09:00:00'),
-- (2, 2, '2024-09-02 10:00:00'),
-- (3, 3, '2024-09-03 18:00:00'),
-- (4, 4, '2024-09-04 14:00:00'),
-- (5, 5, '2024-09-05 11:00:00'),
-- (6, 6, '2024-09-06 15:00:00'),
-- (7, 7, '2024-09-07 13:00:00'),
-- (8, 8, '2024-09-08 08:00:00'),
-- (9, 9, '2024-09-09 09:30:00'),
-- (10, 10, '2024-09-10 10:30:00'),
-- (1, 11, '2024-09-11 10:30:00'),
-- (2, 12, '2024-09-12 10:30:00'),
-- (1, 2, '2024-09-02 10:00:00'),
-- (2, 3, '2024-09-03 18:00:00'),
-- (3, 4, '2024-09-04 14:00:00'),
-- (4, 5, '2024-09-05 11:00:00'),
-- (5, 6, '2024-09-06 15:00:00'),
-- (6, 7, '2024-09-07 13:00:00'),
-- (7, 8, '2024-09-08 08:00:00'),
-- (8, 9, '2024-09-09 09:30:00'),
-- (9, 10, '2024-09-10 10:30:00');



-- -- Consultas

-- -- Consulta 1
-- select clases.title, instructor.primerNombre, dictan.fechaHoraDicta from dictan, instructor, clases where dictan.IDInstructor=instructor.IDInstructor and clases.id=dictan.idCurso and instructor.primerNombre='Jorge' and fechaHoraDicta>curdate() order by fechaHoraDicta asc limit 5;

-- -- Consulta 2
-- select clases.tipo, cursan.fechaHoraCursan from cursan, clases where clases.id=cursan.idCurso and cursan.fechaHoraCursan >= curdate() and (clases.tipo='Práctico' or clases.tipo='Teórico');

-- -- Consulta 3
-- select * from vehiculos;

-- -- Consulta 4
-- select DISTINCT estudiante.primerNombre, count(cursan.idCurso) from estudiante, cursan where estudiante.activo = TRUE and estudiante.IDEstudiante=cursan.IDEstudiante and cursan.fechaHoraCursan >= curdate() group by cursan.IDEstudiante;

-- -- Consulta 5
-- select COUNT(DISTINCT cursan.IDEstudiante) from cursan where Year(fechaHoraCursan) = Year(curdate());

-- -- Consulta 6
-- -- Cambíe de 15 a 1, ya que faltan mas registros
-- select estudiante.IDEstudiante, estudiante.primerNombre, estudiante.primerApellido, COUNT(cursan.idCurso) AS CantidadClases from estudiante, cursan where estudiante.activo = TRUE and estudiante.IDEstudiante = cursan.IDEstudiante and cursan.fechaHoraCursan >= CURDATE()
-- GROUP BY estudiante.IDEstudiante, estudiante.primerNombre, estudiante.primerApellido
-- HAVING COUNT(cursan.idCurso) > 1;

-- -- Consulta 7
-- select primerNombre, horasDictadas from instructor;

-- -- Consulta 8
-- select primerNombre, count(dictan.idCurso) from instructor, dictan, cursan where instructor.IDInstructor=dictan.IDInstructor and dictan.idCurso= cursan.idCurso group by dictan.IDInstructor;

-- -- Consulta 9 
-- -- No se puede realizar ya que no se tiene la información necesaria para realizarla (clases no tiene un costo, el costo está asignado a paquetes, no clases)
-- -- select MONTH(fechaHoraCursan), SUM(curso.costo) from curso, cursan where curso.idCurso = cursan.idCurso GROUP BY MONTH(fechaHoraCursan) ORDER BY MONTH(fechaHoraCursan) DESC LIMIT 3;

-- -- Consulta 10
-- SELECT time , COUNT(*) from clases group by time order by count(*) DESC, time ASC;