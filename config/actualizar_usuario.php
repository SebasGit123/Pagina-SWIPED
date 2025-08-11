<?php
require_once 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nombre = $_POST['nameD'];
    $usuario = $_POST['username'];
    $correo = $_POST['email'];
    $rol = $_POST['rol'];
    
    // Preparar la consulta base
    $sql = "UPDATE registrodocente SET nameD = ?, username = ?, email = ?, rol = ?";
    $params = [$nombre, $usuario, $correo, $rol];
    $types = "ssss";
    
    // Verificar si se proporcionó una nueva contraseña
    if (!empty($_POST['password'])) {
        $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $sql .= ", password = ?";
        $params[] = $hashed_password;
        $types .= "s";
    }
    
    $sql .= " WHERE id = ?";
    $params[] = $id;
    $types .= "i";
    
    $stmt = $conexion->prepare($sql);
    if ($stmt === false) {
        die("Error en la preparación de la consulta: " . $conexion->error);
    }
    
    $stmt->bind_param($types, ...$params);
    
    if ($stmt->execute()) {
        header("Location: ../jefatura/pruebas.php?success=actualizado");
        exit();
    } else {
        header("Location: ../jefatura/pruebas.php?error=" . urlencode($stmt->error));
        exit();
    }
    
    $stmt->close();
    $conexion->close();
} else {
    header("Location: ../jefatura/pruebas.php?error=metodo_no_valido");
    exit();
}
?>