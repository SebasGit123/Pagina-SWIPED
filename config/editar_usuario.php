<?php
require_once 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitiza y valida los datos recibidos del formulario.
    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
    $nombre = trim($_POST['nameD']);
    $usuario = trim($_POST['username']);
    $correo = trim($_POST['email']);
    $rol = trim($_POST['rol']);
    $division = trim($_POST['division']); // Obtener el valor del nuevo campo
    $nueva_contrasena = $_POST['password'] ?? '';

    // Si algún dato requerido falta, redirige con un error.
    if (!$id || empty($nombre) || empty($usuario) || empty($correo) || empty($rol)) {
        header("Location: ../jefatura/pruebas.php?error=Datos incompletos o inválidos");
        exit();
    }

    // Prepara una consulta para verificar si el nuevo nombre de usuario o correo ya existe,
    // excluyendo al usuario que estamos editando.
    $stmt_check = $conexion->prepare("SELECT id FROM usuarios_db WHERE (username = ? OR email = ?) AND id != ?");
    $stmt_check->bind_param("ssi", $usuario, $correo, $id);
    $stmt_check->execute();
    
    // Si la consulta devuelve resultados, significa que el usuario o correo ya existen.
    if ($stmt_check->get_result()->num_rows > 0) {
        header("Location: ../jefatura/pruebas.php?error=Usuario o correo ya existen");
        exit();
    }
    $stmt_check->close();

    // Si hay una nueva contraseña, la hashea y actualiza todos los campos.
    if (!empty($nueva_contrasena)) {
        $hashed_password = password_hash($nueva_contrasena, PASSWORD_DEFAULT);

$stmt = $conexion->prepare("UPDATE usuarios_db SET nameD = ?, username = ?, email = ?, rol = ?, division = ?, password = ? WHERE id = ?");
$stmt->bind_param("ssssssi", $nombre, $usuario, $correo, $rol, $division, $hashed_password, $id);

    } else {
        // Si no hay nueva contraseña, actualiza solo los campos restantes.
      
$stmt = $conexion->prepare("UPDATE usuarios_db SET nameD = ?, username = ?, email = ?, rol = ?, division = ? WHERE id = ?");
$stmt->bind_param("sssssi", $nombre, $usuario, $correo, $rol, $division, $id);

    }

    // Ejecuta la consulta de actualización.
    if ($stmt->execute()) {
        $mensaje = $stmt->affected_rows > 0 ? "success=Usuario actualizado" : "info=No hubo cambios";
        header("Location: ../jefatura/pruebas.php?$mensaje");
    } else {
        header("Location: ../jefatura/pruebas.php?error=Error al actualizar");
    }
    
    $stmt->close();
    $conexion->close();
} else {
    // Si la solicitud no es POST, redirige al usuario.
    header("Location: ../jefatura/pruebas.php");
}
exit();
?>