
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id']) && isset($_POST['actual'])) {

/** @var mysqli $conexion 
 * @param $host: El host de la base de datos 
 * @param $usuario: El nombre de usuario de la base de datos.
 * @param $password: La contraseña de la base de datos.
 * @param $base_datos: El nombre de la base de datos.
 * 
*/

    // Datos de conexión a la base de datos
    $servidor = "fdb1029.awardspace.net";
    $usuario = "4794862_pruebadb";
    $password = "sonoilmeglio10"; // Por defecto viene vacío en Laragon
    $base_datos = "4794862_pruebadb";

    // Establecer conexión
    $conexion = new mysqli($servidor, $usuario, $password, $base_datos);

    // Verificar la conexión
    /* @var $conexion: La conexión a la base de datos. */

    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    // Obtener el ID y el estado actual del libro
    $id = intval($_POST['id']);
    $estado_actual = intval($_POST['actual']);

    // Cambiar el estado del libro
    // Si estaba disponible (1), ahora será prestado (0).
    // Si estaba prestado (0), ahora será disponible (1).
    $nuevo_estado = ($estado_actual === 1) ? 0 : 1;

    // Consulta SQL para actualizar el estado del libro
    /* @var $sql: La consulta SQL para actualizar si el libro está disponible. 
    */
    $sql = "UPDATE libros SET disponible = $nuevo_estado WHERE id = $id";

    // Ejecutar la consulta
    if ($conexion->query($sql) === TRUE) {

        // Redireccionar con un parámetro de éxito
        header("Location: index.php?updated=1");

    } else {

        // Mostrar error si no se pudo actualizar el estado
        echo "Error al actualizar el estado: " . $conexion->error;

    }

    // Cerrar la conexión a la base de datos
    $conexion->close();

} else {

    // Redireccionar a la página principal si no hay datos válidos
    header("Location: index.php");

}

?>
