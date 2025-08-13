<?php
require_once 'conexion.php';

// Consulta de usuarios
$sql = "SELECT id, nameD, username, email, rol, password FROM usuarios_db";
$resultado = $conexion->query($sql);

if ($resultado && $resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($fila['nameD']) . "</td>";
        echo "<td>" . htmlspecialchars($fila['username']) . "</td>";
        echo "<td>" . htmlspecialchars($fila['email']) . "</td>";
        echo "<td>" . htmlspecialchars($fila['rol']) . "</td>";
        echo "<td class='password-cell'><i class='fas fa-lock'></i> **********</td>";

        echo "<td class='text-center actions-cell'>";
        echo "<button type='button' class='btn btn-primary btn-sm me-1' onclick='cargarDatosEdicion({$fila['id']})' data-bs-toggle='modal' data-bs-target='#modalEditar'>";
        echo "<i class='fas fa-edit'></i>";
        echo "</button>";

        echo "<form action='../config/eliminar_usuario.php' method='POST' style='display:inline-block;' onsubmit=\"return confirm('¿Seguro que quieres eliminar este usuario?');\">";
        echo "<input type='hidden' name='id' value='{$fila['id']}'>";
        echo "<button type='submit' class='btn btn-danger btn-sm'>";
        echo "<i class='fas fa-trash-alt'></i>";
        echo "</button>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='6' class='text-center'>No hay docentes registrados</td></tr>";
}

$conexion->close();
?>