 <?php
session_start();
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'jefatura') {
    header("Location: ../index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Panel Jefatura</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Bienvenido, <?php echo $_SESSION['username']; ?> (Jefatura)</h2>
        <a href="../includes/logout.php" class="btn btn-danger mt-3">Cerrar sesión</a>
    </div>
</body>
</html>