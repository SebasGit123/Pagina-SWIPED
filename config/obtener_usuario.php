<?php
// Incluye el archivo de conexión a la base de datos.
require_once 'conexion.php';

// Verifica si se recibió el ID del usuario por GET.
if (isset($_GET['id'])) {
    // Sanitiza el ID para evitar inyecciones SQL.
    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    
    // Si el ID es válido...
    if ($id) {
        // Prepara la consulta SQL para evitar inyecciones.
       $stmt = $conexion->prepare("SELECT id, nameD, username, email, rol, division FROM usuarios_db WHERE id = ?");

        $stmt->bind_param("i", $id);
        $stmt->execute();
        $resultado = $stmt->get_result();

        // Si se encuentra un usuario, devuelve sus datos como JSON.
        if ($fila = $resultado->fetch_assoc()) {
            header('Content-Type: application/json');
            echo json_encode($fila);
        } else {
            // Si no se encuentra, devuelve un error 404.
            http_response_code(404);
            echo json_encode(['error' => 'Usuario no encontrado']);
        }
        $stmt->close();
    } else {
        // Si el ID no es válido, devuelve un error 400.
        http_response_code(400);
        echo json_encode(['error' => 'ID de usuario inválido']);
    }
} else {
    // Si no se proporcionó un ID, devuelve un error 400.
    http_response_code(400);
    echo json_encode(['error' => 'ID no proporcionado']);
}

$conexion->close();
?>