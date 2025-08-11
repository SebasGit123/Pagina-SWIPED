<?php
session_start();
require_once '../config/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $rol = $_POST['rol'];

    $stmt = $pdo->prepare("SELECT * FROM registrodocente WHERE email = ? AND rol = ?");
    $stmt->execute([$email, $rol]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['username'] = $user['username'];
        $_SESSION['rol'] = $user['rol'];

        switch ($rol) {
            case 'jefatura':
                header('Location: ../jefatura/pruebas.php');
                break;
            case 'docente':
                header('Location: ../docente/inicioD.html');
                break;
            case 'academia':
                header('Location: ../academias/dashboard3.php');
                break;
        }
        exit;
    } else {
        $_SESSION['error'] = "Email, rol o contraseña incorrectos.";
        header('Location: ../index.php');
        exit;
    }
}
?>
