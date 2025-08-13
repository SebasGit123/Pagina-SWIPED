<?php
require_once 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['id'])) {
    $id = intval($_POST['id']);

    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    $stmt = $conexion->prepare("DELETE FROM usuarios_db WHERE id = ?");
    if ($stmt === false) {
        die("Error en la preparación de la consulta: " . $conexion->error);
    }

    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: ../jefatura/pruebas.php?success=eliminado");
        exit();
    } else {
        header("Location: ../jefatura/pruebas.php?error=" . urlencode($stmt->error));
        exit();
    }

    $stmt->close();
    $conexion->close();
} else {
    header("Location: ../jefatura/pruebas.php?error=no_id");
    exit();
}
?>
