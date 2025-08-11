<?php
require_once 'conexion.php';

$sql = "SELECT id, nameD, username, email, rol, password FROM registrodocente";
$busqueda = '';
$params = [];
$types = "";

if (isset($_POST['busqueda']) && !empty($_POST['busqueda'])) {
    $busqueda = "%" . trim($_POST['busqueda']) . "%";
    $sql .= " WHERE nameD LIKE ? OR username LIKE ? OR email LIKE ?";
    $params = array_fill(0, 3, $busqueda);
    $types = "sss";
}

$stmt = $conexion->prepare($sql);
if ($stmt === false) {
    die("Error en la preparación de la consulta: " . $conexion->error);
}

if (!empty($params)) {
    $stmt->bind_param($types, ...$params);
}

$stmt->execute();
$resultado = $stmt->get_result();

function getBadgeClass($rol) {
    switch ($rol) {
        case 'jefatura': return 'bg-primary';
        case 'docente': return 'bg-success';
        case 'academia': return 'bg-warning text-dark';
        default: return 'bg-secondary';
    }
}

if ($resultado && $resultado->num_rows > 0) {
    while($row = $resultado->fetch_assoc()) {
        echo '<tr>';
        echo '<td>'.htmlspecialchars($row['nameD']).'</td>';
        echo '<td>'.htmlspecialchars($row['username']).'</td>';
        echo '<td>'.htmlspecialchars($row['email']).'</td>';
        echo '<td><span class="badge '.getBadgeClass($row['rol']).'">'.htmlspecialchars(ucfirst($row['rol'])).'</span></td>';
        echo '<td>'.substr($row['password'], 0, 10).'*****</td>';
        echo '<td class="text-nowrap">';
        echo '<button class="css-button-rounded--blue me-2" data-bs-toggle="modal" data-bs-target="#modalEditar" onclick="cargarDatosEdicion('.htmlspecialchars($row['id']).')">
                <i class="fas fa-edit"></i> Editar
              </button>';
        echo '<form action="eliminar_usuario.php" method="POST" onsubmit="return confirm(\'¿Eliminar este usuario?\')" class="d-inline">
                <input type="hidden" name="id" value="'.htmlspecialchars($row['id']).'">
                <button type="submit" class="css-button-rounded--red">
                  <i class="fas fa-trash-alt"></i> Eliminar
                </button>
              </form>';
        echo '</td>';
        echo '</tr>';
    }
} else {
    echo '<tr><td colspan="6" class="text-center py-4">No se encontraron usuarios</td></tr>';
}

$stmt->close();
$conexion->close();
?>