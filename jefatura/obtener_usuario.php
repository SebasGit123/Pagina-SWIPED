<?php
require_once '../config/conexion.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $stmt = $conexion->prepare("SELECT id, nameD, username, email, rol FROM registrodocente WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        header('Content-Type: application/json');
        echo json_encode($result->fetch_assoc());
    } else {
        http_response_code(404);
        echo json_encode(['error' => 'Usuario no encontrado']);
    }
    
    $stmt->close();
    $conexion->close();
} else {
    http_response_code(400);
    echo json_encode(['error' => 'ID no proporcionado']);
}
?>