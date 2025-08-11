  <?php
session_start();
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'docente') {
    header("Location: ../index.php");
    exit;
}
?>


  <body>
  	
  <div class="container mt-5">
    <h2>Bienvenido, <?php echo $_SESSION['username']; ?> (docente)</h2>
    <a href="../includes/logout.php" class="btn btn-danger mt-3">Cerrar sesión</a>
  </div>

</body>
