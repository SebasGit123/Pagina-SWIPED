<?php
// Incluir el archivo de conexión
require_once 'config/conexion.php';

// Iniciar la consulta SQL
$sql = "SELECT id, nombre, usuario, contrasena FROM usuarios";
$busqueda = '';

// Verificar si se ha enviado un término de búsqueda por POST
if (isset($_POST['busqueda']) && !empty($_POST['busqueda'])) {
    $busqueda = "%" . $_POST['busqueda'] . "%";
    $sql .= " WHERE nombre LIKE ? OR usuario LIKE ?";
}

// Preparar la sentencia
$stmt = $conexion->prepare($sql);

if ($stmt === false) {
    die("Error en la preparación de la consulta: " . $conexion->error);
}

// Enlazar los parámetros si hay búsqueda
if (!empty($busqueda)) {
    $stmt->bind_param("ss", $busqueda, $busqueda);
}

// Ejecutar la consulta
$stmt->execute();
$resultado = $stmt->get_result();

// Mostrar los resultados de la tabla
if ($resultado && $resultado->num_rows > 0) {
    while($row = $resultado->fetch_assoc()) {
        echo '<tr>';
        echo '<td>'.htmlspecialchars($row['nombre']).'</td>';
        echo '<td>'.htmlspecialchars($row['usuario']).'</td>';
        echo '<td>'.substr($row['contrasena'], 0, 10).'*****</td>';
        echo '<td>';
        echo '<form action="eliminar_usuario.php" method="POST" onsubmit="return confirm(\'¿Estás seguro de que quieres eliminar este registro?\');" style="display:inline">';
        echo '<input type="hidden" name="id" value="'.htmlspecialchars($row['id']).'">';
        echo '<button type="submit" class="css-button-rounded--red">Eliminar</button>';
        echo '</form>';
        echo '</td>';
        echo '</tr>';
    }
} else {
    echo '<tr><td colspan="4" class="text-center">No se encontraron usuarios o la tabla está vacía.</td></tr>';
}

// Cerrar la conexión
$stmt->close();
$conexion->close();
?>