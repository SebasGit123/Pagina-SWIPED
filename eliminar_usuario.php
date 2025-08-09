<?php
// Incluir el archivo de conexión a la base de datos
require_once 'conexion.php';

// Verificar que se haya enviado un ID a través del método POST
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];

    // Prevenir inyecciones SQL
    $stmt = $conexion->prepare("DELETE FROM usuarios WHERE id = ?");

    // Verificar si la preparación de la consulta fue exitosa
    if ($stmt === false) {
        die("Error en la preparación de la consulta: " . $conexion->error);
    }

    // Enlazar el parámetro 'id' a la consulta
    $stmt->bind_param("i", $id);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        // Redireccionar a la página principal después de eliminar el registro
        header("Location: pruebas.php");
        exit();
    } else {
        echo "Error al eliminar el registro: " . $stmt->error;
    }

    // Cerrar la conexión
    $stmt->close();
    $conexion->close();
} else {
    // Si no se recibió un ID, redireccionar de vuelta
    header("Location: pruebas.php");
    exit();
}
?>