<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=	, initial-scale=1.0">
	<title>Sistema Integral ISC Docentes || TESCI</title>
	<link rel="stylesheet" href="assets/css/bootstrap/bootstrap.min.css">   
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="assets/css/mystyles/loginRoles.css">
  <link rel="stylesheet" href="assets/css/mystyles/global.css">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">


 
</head>

<body class="bg-micolor">
  <?php session_start(); ?>


<header class="navbar navbar-expand-lg navbar-dark fixed-top encabezado navi">
  <div class="container-fluid">
    <div class="d-flex me-auto">
      <a class="navbar-brand" href="#">
        <img src="assets/img/Logo.png" alt="Logotipo" height="30" class="logoZ">
      </a>
    </div>

    <div class="header-content">
      <h1 class="TESCI">Sistema Integral ISC</h1>
    </div>

    <div class="ms-auto"></div>
  </div> 
</header>


<div class="container mt-1 pt-3">
  <div class="form-container formLogin">
    <h3 class="text-center mb-3">Inicio de Sesión</h3>
    <?php if (isset($_SESSION['error'])): ?>
      <div class="alert alert-danger"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></div>
    <?php endif; ?>
    <form action="includes/login.php" method="POST">
      <div class="mb-3">
        <label>Email institucional</label>
        <input type="email" name="email" class="form-control" required pattern=".+@cuautitlan\.tecnm\.mx">
      </div>
      <div class="mb-3">
        <label>Contraseña</label>
        <input type="password" name="password" class="form-control" required minlength="8">
      </div>
      <div class="mb-3">
        <label>Rol</label>
        <select name="rol" class="form-control" required>
          <option value="">Seleccione su rol</option>
          <option value="jefatura">Jefatura</option>
          <option value="docente">Docente</option>
          <option value="academia">Academia</option>
        </select>
      </div>
      <button type="submit" class="css-button-rounded--blue w-100">Iniciar sesión</button>
    </form>

  </div>

<div></div>

</div>




  <!-- jQuery -->

  <script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/bootstrap.bundle.min.js"></script>


</body>
</html>

