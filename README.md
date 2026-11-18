
# Creación de archivos
<p>
Algunos de los pasos que se hicieron para crear los archivos
</p>
- Git init
- Git status
- Git add .
- Git commit -m
- Git push

#Crear repositorio en awardspace
Le llamé **bibliotecaorlando**
# Crear Tabla Principal

	1.  Jueves 12 de Noviembre del 2026

	Creé dentro de **php MySQL** la tabla llamada **libros**

```html
CREATE TABLE libros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(150) NOT NULL,
    autor VARCHAR(100) NOT NULL,
    isbn VARCHAR(20) NOT NULL,
    disponible INT DEFAULT 1
);
```

2.- Inserté un par de libros:
```html
INSERT INTO libros (titulo, autor, isbn, disponible) VALUES
('Cien años de soledad', 'Gabriel García Márquez', '978-0307474728', 1),
('Don Quijote de la Mancha', 'Miguel de Cervantes', '978-8424937461', 1);
```

 #index.php
 
 1.- Puse el siguiente código en el archivo creado **index.php**.
 ```html
 <?php
// Cambia estos datos con los que te proporcione AwardSpace en tu "Database
Manager"
$host = "pdbXX.awardspace.net"; // Reemplaza XX por el número de tu servidor
$usuario = "tu_usuario_bd";
$password = "tu_password_bd";
$base_datos = "tu_nombre_bd";
$conexion = new mysqli($host, $usuario, $password, $base_datos);
if ($conexion->connect_error) {
die("Error de conexión: " . $conexion->connect_error);
}
// Obtener los libros existentes
$resultado = $conexion->query("SELECT * FROM libros ORDER BY id
DESC");
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Control de Biblioteca</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>
<header>
<h1> Sistema de Control de Biblioteca</h1>
</header>
<main class="container">
<!-- Formulario para agregar libros -->
<section class="card">
<h2>Registrar Nuevo Libro</h2>
<form id="formLibro" action="guardar.php" method="POST">
<div class="form-group">
<label for="titulo">Título del Libro:</label>
<input type="text" id="titulo" name="titulo" required>
</div>
<div class="form-group">
<label for="autor">Autor:</label>
<input type="text" id="autor" name="autor" required>
</div>
<div class="form-group">
<label for="isbn">ISBN:</label>
<input type="text" id="isbn" name="isbn" required>
</div>
<button type="submit" class="btn">Guardar Libro</button>
</form>
</section>
<!-- Tabla de libros en la Base de Datos -->
<section class="card table-container">
<h2>Inventario de Libros</h2>
<table id="tablaLibros">
<thead>
<tr>
<th>ID</th>
<th>Título</th>
<th>Autor</th>
<th>ISBN</th>
<th>Estado</th>

</tr>
</thead>
<tbody>
<?php if ($resultado->num_rows > 0): ?>
<?php while($fila = $resultado->fetch_assoc()): ?>
<tr>
<td><?php echo $fila['id']; ?></td>
<td><strong><?php echo htmlspecialchars($fila['titulo']);
?></strong></td>
<td><?php echo htmlspecialchars($fila['autor']); ?></td>
<td><?php echo htmlspecialchars($fila['isbn']); ?></td>
<td>
<span class="badge <?php echo $fila['disponible'] ? 'dispo' :
'prestado'; ?>">
<?php echo $fila['disponible'] ? 'Disponible' : 'Prestado';
?>
</span>
</td>
</tr>
<?php endwhile; ?>
<?php else: ?>
<tr>
<td colspan="5" style="text-align: center;">No hay libros
registrados.</td>
</tr>
<?php endif; ?>
</tbody>
</table>
</section>
</main>
<script src="script.js"></script>
</body>
</html>
<?php $conexion->close(); ?>
```
Cambié los datos con los que me proporcionó AwardSpace en mi "Database
Manager" como: **usuario**,** contraseña**, **root** y nombre de **database**.

#guardar.php

Seguí con el archivo **guardar.php** que creé y puse el siguiente código:
```php
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
        

$host = "fdb1029.awardspace.net"; // Reemplaza XX por el número de tu servidor

$servidor = "fdb1029.awardspace.net";
$usuario = "4794862_pruebadb";
$password = "sonoilmeglio10"; // Por defecto viene vacío en Laragon
$base_datos = "4794862_pruebadb";
$conexion = new mysqli($host, $usuario, $password, $base_datos);

if ($conexion->connect_error) {
die("Error de conexión: " . $conexion->connect_error);
}
// Limpiar variables para evitar inyecciones SQL básicas
$titulo = $conexion->real_escape_string($_POST['titulo']);
$autor = $conexion->real_escape_string($_POST['autor']);
$isbn = $conexion->real_escape_string($_POST['isbn']);
$sql = "INSERT INTO libros (titulo, autor, isbn) VALUES ('$titulo', '$autor',
'$isbn')";
if ($conexion->query($sql) === TRUE) {
// Redireccionar de vuelta a la página principal si se guardó con éxito
header("Location: index.php?success=1");
} else {
echo "Error al guardar el libro: " . $conexion->error;
}
$conexion->close();
}
?>
```
E igual le cambié **usuario**,** contraseña**, **root** y nombre de **database**.

#Style.css
Creé una **hoja de estilo**, la cual me ayudó a darle formato a la página web.

```css
:root {
    --primary-color: #2c3e50;
    --secondary-color: #18bc9c;
    --background-color: #f5f6fa;
    --card-background: #ffffff;
    --text-color: #333333;
}

body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: var(--background-color);
    color: var(--text-color);
    margin: 0;
    padding: 0;
}

header {
    background-color: var(--primary-color);
    color: white;
    text-align: center;
    padding: 1.5rem;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.container {
    max-width: 1000px;
    margin: 2rem auto;
    padding: 0 1rem;
    display: grid;
    grid-template-columns: 1fr 2fr;
    gap: 2rem;
}

@media (max-width: 768px) {
    .container {
        grid-template-columns: 1fr;
    }
}

.card {
    background: var(--card-background);
    padding: 1.5rem;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
}

.form-group {
    margin-bottom: 1.2rem;
}

label {
    display: block;
    margin-bottom: 0.5rem;
    font-weight: 600;
}

input[type="text"] {
    width: 100%;
    padding: 0.7rem;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

.btn {
    background-color: var(--secondary-color);
    color: white;
    border: none;
    padding: 0.75rem 1.5rem;
    border-radius: 4px;
    cursor: pointer;
    font-size: 1rem;

    width: 100%;
    transition: background 0.3s ease;
}

.btn:hover {
    background-color: #128f76;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 1rem;
}

th,
td {
    padding: 0.75rem;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: #f2f2f2;
}

.badge {
    padding: 0.25rem 0.5rem;
    border-radius: 4px;
    font-size: 0.85rem;
    font-weight: bold;
}

.badge.dispo {
    background-color: #d4edda;
    color: #155724;
}

.badge.prestado {
    background-color: #f8d7da;
    color: #721c24;
}

.btn-action {
    padding: 0.4rem 0.8rem;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 0.85rem;
    font-weight: bold;
    color: white;
    transition: background 0.2s ease;
    width: 100%;
    min-width: 80px;
}

.btn-prestar {
    background-color: #3498db;
}

.btn-prestar:hover {
    background-color: #2980b9;
}

.btn-devolver {
    background-color: #e67e22;
}

.btn-devolver:hover {
    background-color: #d35400;
}

/* Ajuste opcional para la tabla responsiva */
.table-container {
    overflow-x: auto;
}
```
Con esto se logró un diseño **mejor** y **bonito**.

#Script.js
```js
document.addEventListener('DOMContentLoaded', () => {
const form = document.getElementById('formLibro');
// Validación interactiva antes de enviar los datos al servidor
form.addEventListener('submit', (e) => {
const titulo = document.getElementById('titulo').value.trim();
const autor = document.getElementById('autor').value.trim();
const isbn = document.getElementById('isbn').value.trim();
if (titulo === "" || autor === "" || isbn === "") {
e.preventDefault(); // Detiene el envío del formulario
alert('Por favor, rellena todos los campos antes de guardar.');

return;
}
// Validación simple para que el formato ISBN no contenga caracteres extraños
if(isbn.length < 10) {
e.preventDefault();
alert('El campo ISBN parece demasiado corto o inválido.');
}
});
// Detectar si venimos de un registro exitoso mediante la URL
const urlParams = new URLSearchParams(window.location.search);
if (urlParams.get('success') === '1') {
// Limpiar el parámetro de la URL estética
window.history.replaceState({}, document.title, window.location.pathname);
alert('¡Libro registrado con éxito en el inventario!');
}
});
```


