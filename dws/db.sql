-- ============================================================
-- 📦 Base de datos: exam_txurdinetflix
-- Versión corregida sin errores de clave foránea
-- ============================================================

-- Crear la base de datos
CREATE DATABASE IF NOT EXISTS exam_txurdinetflix
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_general_ci;

USE exam_txurdinetflix;

-- 🔧 Desactivar temporalmente comprobación de claves foráneas
SET FOREIGN_KEY_CHECKS = 0;

-- ============================================================
-- 🗂️ Tablas (drop en orden correcto)
-- ============================================================
DROP TABLE IF EXISTS movies;
DROP TABLE IF EXISTS categories;

-- 🔧 Reactivar comprobaciones
SET FOREIGN_KEY_CHECKS = 1;

-- ============================================================
-- 🗂️ Tabla: categories
-- ============================================================
CREATE TABLE categories (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Datos de ejemplo para categorías
INSERT INTO categories (name) VALUES
('Action'),
('Comedy'),
('Drama'),
('Science Fiction'),
('Horror'),
('Animation'),
('Documentary');

-- ============================================================
-- 🎬 Tabla: movies
-- ============================================================
CREATE TABLE movies (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(150) NOT NULL,
  director VARCHAR(120) NOT NULL,
  year INT(4) NOT NULL,
  category_id INT NOT NULL,
  image VARCHAR(255) DEFAULT NULL,
  FOREIGN KEY (category_id) REFERENCES categories(id)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Datos de ejemplo para películas
INSERT INTO movies (title, director, year, category_id, image) VALUES
('Inception', 'Christopher Nolan', 2010, 4, 'inception.jpg'),
('The Dark Knight', 'Christopher Nolan', 2008, 1, 'dark_knight.jpg'),
('Forrest Gump', 'Robert Zemeckis', 1994, 3, 'forrest_gump.jpg'),
('Toy Story', 'John Lasseter', 1995, 6, 'toy_story.jpg'),
('The Shining', 'Stanley Kubrick', 1980, 5, 'shining.jpg'),
('Superbad', 'Greg Mottola', 2007, 2, 'superbad.jpg'),
('Interstellar', 'Christopher Nolan', 2014, 4, 'interstellar.jpg'),
('The Social Dilemma', 'Jeff Orlowski', 2020, 7, 'social_dilemma.jpg');

-- ============================================================
-- 🖼️ Nota
-- ============================================================
-- Asegúrate de tener 'img/default.jpg' en tu carpeta 'img'
-- para que las películas sin imagen se muestren correctamente.
