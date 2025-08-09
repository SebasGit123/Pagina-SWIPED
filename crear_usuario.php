<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $usuario = $_POST['usuario'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    $confirmar_contrasena = $_POST['confirmar'];

    // 1. Validar que las contraseñas coincidan
    if ($contrasena !== $confirmar_contrasena) {
        // Redirige con un mensaje de error para mostrarlo en el front-end
        header("Location: pruebas.php?error=contrasena_no_coincide");
        exit();
    }

    // 2. Verificar si el usuario ya existe en la base de datos
    $sql_check = "SELECT id FROM usuarios WHERE usuario = ?";
    $stmt_check = $conexion->prepare($sql_check);
    if ($stmt_check === false) {
        die("Error en la preparación de la consulta de verificación: " . $conexion->error);
    }
    $stmt_check->bind_param("s", $usuario);
    $stmt_check->execute();
    $stmt_check->store_result();

    if ($stmt_check->num_rows > 0) {
        // El usuario ya existe, redirige con un mensaje de error
        header("Location: pruebas.php?error=usuario_existente");
        exit();
    }

    $stmt_check->close();

    // 3. Si el usuario no existe, encriptar la contraseña y proceder con la inserción
    $hashed_password = password_hash($contrasena, PASSWORD_DEFAULT);

    $stmt = $conexion->prepare("INSERT INTO usuarios (nombre, usuario, correo, contrasena) VALUES (?, ?, ?, ?)");
    if ($stmt === false) {
        die("Error en la preparación de la consulta de inserción: " . $conexion->error);
    }
    $stmt->bind_param("ssss", $nombre, $usuario, $correo, $hashed_password);

    if ($stmt->execute()) {
        // Redirige a la página principal con un mensaje de éxito
        header("Location: pruebas.php?success=1");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conexion->close();
}
?>