-- Crear la base de datos 'archivo'
CREATE DATABASE IF NOT EXISTS archivo;

-- Usar la base de datos 'archivo'
USE archivo;

-- Crear la tabla 'curso' con columnas 'id_c', 'anio', y 'division'
CREATE TABLE IF NOT EXISTS curso (
    id_c INT AUTO_INCREMENT PRIMARY KEY,
    anio VARCHAR(10) NOT NULL,
    division VARCHAR(10) NOT NULL
);

-- Crear la tabla 'usuario' con columnas 'id_u', 'nombre', 'apellido', 'tipoDocumento', y 'nroDocumento'
CREATE TABLE IF NOT EXISTS usuario (
    id_u INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    apellido VARCHAR(50) NOT NULL,
    tipoDocumento VARCHAR(5) NOT NULL,
    nroDocumento INT(10) NOT NULL,
    tipoUsuario VARCHAR(50) NOT NULL,
    curso_id INT, -- Llave foránea que relaciona al usuario con un curso
    FOREIGN KEY (curso_id) REFERENCES curso(id_c) -- Establecer la relación con la tabla 'curso'
);
