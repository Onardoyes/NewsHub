-- Crear base de datos
CREATE DATABASE IF NOT EXISTS NewsHub;
USE NewsHub;

-- Tabla: Fuente (tipografía para la UI)
CREATE TABLE Fuente (
    id INT AUTO_INCREMENT PRIMARY KEY,
    Nombre VARCHAR(100) NOT NULL  -- Ej: 'Roboto', 'Open Sans', etc.
);

-- Tabla: Categoria
CREATE TABLE Categoria (
    id INT AUTO_INCREMENT PRIMARY KEY,
    Nombre VARCHAR(100) NOT NULL,
    Descripcion TEXT
);

-- Tabla: Filtro
CREATE TABLE Filtro (
    id INT AUTO_INCREMENT PRIMARY KEY,
    Nombre VARCHAR(100) NOT NULL,
    Descripcion TEXT
);

-- Tabla: Usuario
CREATE TABLE Usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    Nombre VARCHAR(100) NOT NULL,
    Password VARCHAR(255) NOT NULL,
    Correo VARCHAR(100) NOT NULL UNIQUE,
    FotoPerfil VARCHAR(255),
    RecordarInicio BOOLEAN DEFAULT FALSE,
    nav_Color_Up VARCHAR(20),
    nav_Color_Left VARCHAR(20),
    Tema VARCHAR(50), -- Claro u Obscuro
    Fuente INT, -- clave foránea a Fuente.id
    fuente_color VARCHAR(20), -- color de la fuente tipográfica
    FOREIGN KEY (Fuente) REFERENCES Fuente(id) ON DELETE SET NULL ON UPDATE CASCADE
);

-- Tabla intermedia: Usuario <-> Categoria (muchos a muchos)
CREATE TABLE Usuario_Categoria (
    usuario_id INT,
    categoria_id INT,
    PRIMARY KEY (usuario_id, categoria_id),
    FOREIGN KEY (usuario_id) REFERENCES Usuario(id) ON DELETE CASCADE,
    FOREIGN KEY (categoria_id) REFERENCES Categoria(id) ON DELETE CASCADE
);

-- Tabla intermedia: Usuario <-> Filtro (muchos a muchos)
CREATE TABLE Usuario_Filtro (
    usuario_id INT,
    filtro_id INT,
    PRIMARY KEY (usuario_id, filtro_id),
    FOREIGN KEY (usuario_id) REFERENCES Usuario(id) ON DELETE CASCADE,
    FOREIGN KEY (filtro_id) REFERENCES Filtro(id) ON DELETE CASCADE
);
