-- =======================================================
-- BASE DE DATOS ELORBASE (versión corregida)
-- =======================================================

DROP DATABASE IF EXISTS ElorBase;
CREATE DATABASE ElorBase;
USE ElorBase;

-- =======================================================
-- TABLAS PRINCIPALES
-- =======================================================

-- Tabla roles
CREATE TABLE roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(20) NOT NULL
) ENGINE=InnoDB;

-- Tabla estado
CREATE TABLE estado (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(20) NOT NULL
) ENGINE=InnoDB;

-- Tabla ciclo
CREATE TABLE ciclo (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(60) NOT NULL,
    periodo VARCHAR(20) NOT NULL
) ENGINE=InnoDB;

-- Tabla usuario
CREATE TABLE usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    login VARCHAR(50) NOT NULL,
    dni VARCHAR(9) UNIQUE NOT NULL,
    clave VARCHAR(255) NOT NULL,
    nombre VARCHAR(30) NOT NULL,
    apellido VARCHAR(30) NOT NULL,
    telefono1 VARCHAR(9),
    telefono2 VARCHAR(9),
    foto VARCHAR(100),
    direccion VARCHAR(100)
) ENGINE=InnoDB;

-- Tabla alumno
CREATE TABLE alumno (
    id INT NOT NULL,
    ciclo_id INT NOT NULL,
    curso INT NOT NULL,
    dualIntensiva BOOLEAN,
    PRIMARY KEY (id),
    FOREIGN KEY (id) REFERENCES usuario(id) ON DELETE CASCADE,
    FOREIGN KEY (ciclo_id) REFERENCES ciclo(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- Tabla profesor
CREATE TABLE profesor (
    id INT NOT NULL,
    ciclo_id INT NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (id) REFERENCES usuario(id) ON DELETE CASCADE,
    FOREIGN KEY (ciclo_id) REFERENCES ciclo(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- Tabla asignatura
CREATE TABLE asignatura (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    curso INT NOT NULL,
    horasTotales INT NOT NULL,
    codigo INT(3) NOT NULL
) ENGINE=InnoDB;

-- Tabla horario
CREATE TABLE horario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    dia INT,
    hora INT,
    asignatura_id INT,
    usuario_id INT,
    FOREIGN KEY (asignatura_id) REFERENCES asignatura(id) ON DELETE CASCADE,
    FOREIGN KEY (usuario_id) REFERENCES usuario(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- Tabla reunion
CREATE TABLE reunion (
    id INT AUTO_INCREMENT PRIMARY KEY,
    dia INT,
    hora INT,
    titulo VARCHAR(30),
    asunto VARCHAR(50),
    aula VARCHAR(40),
    numero_Profesores INT,
    estado_id INT,
    FOREIGN KEY (estado_id) REFERENCES estado(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- Tabla usuario_ciclo
CREATE TABLE usuario_ciclo (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    ciclo_id INT NOT NULL,
    FOREIGN KEY (usuario_id) REFERENCES usuario(id) ON DELETE CASCADE,
    FOREIGN KEY (ciclo_id) REFERENCES ciclo(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- Tabla rol_usuario
CREATE TABLE rol_usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    rol_id INT NOT NULL,
    FOREIGN KEY (usuario_id) REFERENCES usuario(id) ON DELETE CASCADE,
    FOREIGN KEY (rol_id) REFERENCES roles(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- Tabla asignatura_ciclo
CREATE TABLE asignatura_ciclo (
    id INT AUTO_INCREMENT PRIMARY KEY,
    asignatura_id INT NOT NULL,
    ciclo_id INT NOT NULL,
    FOREIGN KEY (asignatura_id) REFERENCES asignatura(id) ON DELETE CASCADE,
    FOREIGN KEY (ciclo_id) REFERENCES ciclo(id) ON DELETE CASCADE
) ENGINE=InnoDB;


-- =======================================================
-- INSERCIÓN DE DATOS
-- =======================================================

-- Roles
INSERT INTO roles (nombre) VALUES 
('God'),
('Administracion'),
('Profesor'),
('Alumno');

-- Estados
INSERT INTO estado (nombre) VALUES 
('Confirmado'),
('Cancelado'),
('Pendiente');

-- Ciclos
INSERT INTO ciclo (nombre, periodo) VALUES 
('ASIR', '2024-25'),
('DAM', '2024-25'),
('DAW', '2024-25');

-- Asignaturas
INSERT INTO asignatura (nombre, horasTotales, curso, codigo) VALUES
('Implantación de sistemas operativos', 264, 1, 369),
('Planificación y administración de redes', 198, 1, 370),
('Fundamentos de hardware', 99, 1, 371),
('Gestión de bases de datos', 198, 1, 372),
('Lenguajes de marcas y sistemas de gestión informática', 132, 1, 373),
('Administración de sistemas operativos', 120, 2, 374),
('Servicios de red e internet', 120, 2, 375),
('Implantación de aplicaciones web', 100, 2, 376),
('Administración de sistemas gestores de bases de datos', 60, 2, 377);

-- Usuarios
INSERT INTO usuario (login, dni, clave, nombre, apellido, foto, direccion, telefono1, telefono2)
VALUES
('god@example.com', '12345678A', 'admin', 'God', 'Dios', 'god.jpg', 'Cielo 1', '987654321', '918273645'),
('user@example.com', '12345679A', 'admin', 'User', 'User', 'user.jpg', 'Tierra 2', '987654321', '918273645'),
('maria.fernandez@example.com', '23456789B', 'admin', 'Maria', 'Fernandez', 'maria.jpg', 'Av. Siempre Viva 742', '621345678', '652987341'),
('juan.perez@example.com', '34567890C', 'admin', 'Juan', 'Perez', 'juan.jpg', 'Calle Luna 123', '723456789', '741258963'),
('ana.lopez@example.com', '45678901D', 'admin', 'Ana', 'Lopez', 'ana.jpg', 'Calle Sol 456', '834567890', '845612378'),
('luis.gomez@example.com', '56789012E', 'admin', 'Luis', 'Gomez', 'luis.jpg', 'Plaza Central 789', '945678901', '978456123'),
('sofia.martin@example.com', '67890123F', 'admin', 'Sofia', 'Martin', 'sofia.jpg', 'Av. Principal 101', '876543210', '879123456'),
('carlos.ramirez@example.com', '78901234G', 'admin', 'Carlos', 'Ramirez', 'carlos.jpg', 'Calle Segunda 202', '987654123', '945678901'),
('laura.herrera@example.com', '89012345H', 'admin', 'Laura', 'Herrera', 'laura.jpg', 'Pasaje Tercero 303', '765432198', '741852963');

-- Alumnos
INSERT INTO alumno (id, ciclo_id, curso, dualIntensiva) VALUES
(4, 2, 1, 0),
(5, 3, 2, 1),
(8, 2, 1, 0),
(9, 1, 2, 0);

-- Profesores
INSERT INTO profesor (id, ciclo_id) VALUES
(3, 3),
(6, 1),
(7, 2);

-- Reuniones
INSERT INTO reunion (dia, hora, titulo, asunto, aula, numero_Profesores, estado_id)
VALUES
(1, 8, 'Planificación curso', 'Asignar módulos', 'Aula 104', 2, 1),
(2, 14, 'Evaluación', 'Revisión de notas', 'Aula 106', 3, 2),
(3, 9, 'Tutoría', 'Seguimiento alumnos', 'Aula 104', 1, 3),
(4, 13, 'Formación interna', 'Nuevas tecnologías', 'Aula 106', 2, 2),
(5, 10, 'Reunión ciclo', 'Plan de trabajo', 'Aula 106', 3, 3);

-- usuario_ciclo
INSERT INTO usuario_ciclo (usuario_id, ciclo_id) VALUES
(1,1),(2,1),(3,1),(4,2),(5,2),(6,2),(7,3),(8,3),(9,3);

-- rol_usuario
INSERT INTO rol_usuario (usuario_id, rol_id) VALUES
(1,1),(2,2),(3,3),(4,4),(5,2),(6,3),(7,3),(8,4),(9,4);

-- asignatura_ciclo
INSERT INTO asignatura_ciclo (asignatura_id, ciclo_id) VALUES
(1,1),(2,1),(3,1),
(4,2),(5,2),(6,2),
(7,3),(8,3),(9,3);
