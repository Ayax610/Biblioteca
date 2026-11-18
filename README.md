# Creación de archivos
<p>
Algunos de los pasos que se hicieron para crear los archivos
</p>
- Git init
- Git status
- Git add .
- Git commit -m
- Git push

**Entre otros comandos...**
📚 Sistema de Control de Biblioteca
1. Descripción del proyecto

Sistema web para administrar el inventario de una biblioteca, desarrollado con PHP, MySQL, HTML, CSS y JavaScript, utilizando AwardSpace como servicio de alojamiento.

Funcionalidades
Registrar nuevos libros.
Consultar el inventario.
Mostrar título, autor e ISBN.
Identificar libros disponibles y prestados.
Prestar libros.
Devolver libros.
Validar los campos del formulario.
2. Tecnologías utilizadas
HTML5
CSS3
JavaScript
PHP
MySQL
phpMyAdmin
AwardSpace
GitHub
3. Crear los archivos del proyecto

Crear una carpeta llamada biblioteca con la siguiente estructura:

text
biblioteca/
│
├── index.php
├── guardar.php
├── cambiarEstado.php
├── styles.css
├── script.js
└── README.md

4. Crear la base de datos en AwardSpace
Ingresar a la cuenta de AwardSpace.
Entrar a Database Manager.
Crear una nueva base de datos MySQL.
Guardar los datos de conexión:
Servidor (hostname).
Nombre de la base de datos.
Usuario.
Contraseña.
Abrir phpMyAdmin.
Seleccionar la base de datos creada.
5. Crear la tabla principal en phpMyAdmin

Ingresar a la pestaña SQL y ejecutar:

sql
CREATE TABLE libros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(150) NOT NULL,
    autor VARCHAR(100) NOT NULL,
    isbn VARCHAR(20) NOT NULL,
    disponible INT DEFAULT 1
);

Descripción de los campos
Campo	Descripción
id	Identificador único del libro
titulo	Nombre del libro
autor	Nombre del autor
isbn	Código ISBN
disponible	1 = Disponible, 0 = Prestado
6. Insertar dos libros de ejemplo

Ejecutar el siguiente código SQL:

sql
INSERT INTO libros (titulo, autor, isbn, disponible) VALUES
('Cien años de soledad', 'Gabriel García Márquez', '978-0307474728', 1),
('Don Quijote de la Mancha', 'Miguel de Cervantes', '978-8424937461', 1);


Estos serán los dos primeros registros de la tabla.

7. Crear el archivo index.php

Este archivo es la página principal del sistema.

Sus funciones son:

Conectarse a la base de datos.
Consultar los libros registrados.
Mostrar el formulario para registrar libros.
Mostrar el inventario.
Identificar el estado de cada libro.
Mostrar las acciones para prestar y devolver.

Configurar los datos de conexión de AwardSpace:

php
