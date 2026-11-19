
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

/** @var mysqli $conexion 
 * @param $host: El host de la base de datos
 * @param $usuario: El nombre de usuario de la base de datos.
 * @param $password: La contraseña de la base de datos.
 * @param $base_datos: El nombre de la base de datos.
 */ 

    // Datos de conexión a la base de datos
    $host = "fdb1029.awardspace.net";
    $servidor = "fdb1029.awardspace.net";
    $usuario = "4794862_pruebadb";
    $password = "sonoilmeglio10";
    $base_datos = "4794862_pruebadb";

    // Establecer conexión
    $conexion = new mysqli($host, $usuario, $password, $base_datos);

    // Verificar la conexión
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    // Limpiar variables para evitar inyecciones SQL básicas
    $titulo = $conexion->real_escape_string($_POST['titulo']);
    $autor = $conexion->real_escape_string($_POST['autor']);
    $isbn = $conexion->real_escape_string($_POST['isbn']);

    /* @var $titulo: El título del libro a guardar.
     * @var $autor: El autor del libro a guardar.
     * @var $isbn: El ISBN del libro a guardar.
     */
    // Consulta SQL para insertar un nuevo libro
    $sql = "INSERT INTO libros (titulo, autor, isbn)
            VALUES ('$titulo', '$autor', '$isbn')";

    // Ejecutar la consulta
    if ($conexion->query($sql) === TRUE) {

        // Redireccionar a la página principal si se guardó correctamente
        header("Location: index.php?success=1");

    } else {

        // Mostrar error si no se pudo guardar el libro
        echo "Error al guardar el libro: " . $conexion->error;

    }

    // Cerrar la conexión a la base de datos
    $conexion->close();

}

?>
