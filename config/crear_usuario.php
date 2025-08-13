<?php
require_once 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nameD'];
    $usuario = $_POST['username'];
    $correo = $_POST['email'];
    $rol = $_POST['rol'];
    $contrasena = $_POST['password'];
    $confirmar_contrasena = $_POST['password_confirm'];

    // Validar contraseñas
    if ($contrasena !== $confirmar_contrasena) {
        header("Location: ../jefatura/pruebas.php?error=Las contraseñas no coinciden");
        exit();
    }

    // Verificar usuario existente
    $stmt_check = $conexion->prepare("SELECT id FROM usuarios_db WHERE username = ? OR email = ?");
    $stmt_check->bind_param("ss", $usuario, $correo);
    $stmt_check->execute();
    $stmt_check->store_result();

    if ($stmt_check->num_rows > 0) {
        header("Location: ../jefatura/pruebas.php?error=El usuario o correo ya existe");
        exit();
    }
    $stmt_check->close();

    // Insertar nuevo usuario
    $hashed_password = password_hash($contrasena, PASSWORD_DEFAULT);
    // ...
$division = $_POST['division']; // Obtener el valor del nuevo campo
// ...
$stmt = $conexion->prepare("INSERT INTO usuarios_db (nameD, username, email, password, rol, division) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $nombre, $usuario, $correo, $hashed_password, $rol, $division);
// ...

    if ($stmt->execute()) {
        header("Location: ../jefatura/pruebas.php?success=Usuario creado exitosamente");
        exit();
    } else {
        header("Location: ../jefatura/pruebas.php?error=" . urlencode($stmt->error));
        exit();
    }

    $stmt->close();
    $conexion->close();
} else {
    header("Location: ../jefatura/pruebas.php");
    exit();
}
?>