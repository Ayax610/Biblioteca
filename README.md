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
# 📚 Sistema de Control de Biblioteca

## 1. Descripción del proyecto

Sistema web para administrar el inventario de una biblioteca, desarrollado con PHP, MySQL, HTML, CSS y JavaScript, utilizando AwardSpace como servicio de alojamiento web.

### Funcionalidades principales

- Registrar nuevos libros.
- Consultar el inventario.
- Mostrar título, autor e ISBN.
- Identificar libros disponibles y prestados.
- Prestar libros.
- Devolver libros.
- Validar los campos del formulario.

## 2. Tecnologías utilizadas

- HTML5
- CSS3
- JavaScript
- PHP
- MySQL
- phpMyAdmin
- AwardSpace
- GitHub

## 3. Estructura de archivos

Crear una carpeta llamada `biblioteca` con los siguientes archivos:

    biblioteca/
    ├── index.php
    ├── guardar.php
    ├── cambiarEstado.php
    ├── styles.css
    ├── script.js
    └── README.md

## 4. Crear la base de datos en AwardSpace

1. Ingresar a la cuenta de AwardSpace.
2. Entrar al apartado **Database Manager**.
3. Crear una nueva base de datos MySQL.
4. Guardar los datos de conexión:
   - Servidor (hostname).
   - Nombre de la base de datos.
   - Usuario.
   - Contraseña.
5. Abrir phpMyAdmin.
6. Seleccionar la base de datos creada.

## 5. Crear la tabla principal en phpMyAdmin

Ingresar a la pestaña SQL y ejecutar el siguiente código:

```sql
CREATE TABLE libros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(150) NOT NULL,
    autor VARCHAR(100) NOT NULL,
    isbn VARCHAR(20) NOT NULL,
    disponible INT DEFAULT 1
);
