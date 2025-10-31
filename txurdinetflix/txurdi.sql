-- Datu basea sortu
CREATE DATABASE IF NOT EXISTS exam_txurdinetflix CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE exam_txurdinetflix;

-- Categories taula
CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Movies taula
CREATE TABLE movies (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(200) NOT NULL,
    director VARCHAR(150) NOT NULL,
    year INT NOT NULL,
    category_id INT NOT NULL,
    image VARCHAR(255) DEFAULT NULL,
    FOREIGN KEY (category_id) REFERENCES categories(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Kategoriak txertatu
INSERT INTO categories (name) VALUES 
('Drama'),
('Komedia'),
('Akzioa'),
('Zientzia-fikzioa'),
('Beldurra'),
('Animazioa');

-- Filmak txertatu
INSERT INTO movies (title, director, year, category_id, image) VALUES 
('Titanic', 'James Cameron', 1997, 1, 'titanic.jpg'),
('The Dark Knight', 'Christopher Nolan', 2008, 3, 'darkknight.jpg'),
('Inception', 'Christopher Nolan', 2010, 4, 'inception.jpg'),
('Forrest Gump', 'Robert Zemeckis', 1994, 1, 'forrestgump.jpg'),
('The Shawshank Redemption', 'Frank Darabont', 1994, 1, 'shawshank.jpg'),
('Superbad', 'Greg Mottola', 2007, 2, 'superbad.jpg'),
('The Hangover', 'Todd Phillips', 2009, 2, 'hangover.jpg'),
('Mad Max Fury Road', 'George Miller', 2015, 3, 'madmax.jpg'),
('The Matrix', 'Lana Wachowski', 1999, 4, 'matrix.jpg'),
('Interstellar', 'Christopher Nolan', 2014, 4, 'interstellar.jpg'),
('The Conjuring', 'James Wan', 2013, 5, 'conjuring.jpg'),
('Get Out', 'Jordan Peele', 2017, 5, 'getout.jpg'),
('Toy Story', 'John Lasseter', 1995, 6, 'toystory.jpg'),
('Finding Nemo', 'Andrew Stanton', 2003, 6, 'findingnemo.jpg'),
('Parasite', 'Bong Joon-ho', 2019, 1, 'parasite.jpg');