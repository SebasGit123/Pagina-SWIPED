<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=	, initial-scale=1.0">
	<title>Sistema Integral ISC Docentes || TESCI</title>
 <link rel="stylesheet" href="assets/css/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <link rel="stylesheet" href="assets/css/bootstrap/style.css">
 
</head>


<header>
<style>
    body { background-color: #f8f9fa; }
    .form-container { max-width: 400px; margin: auto; margin-top: 100px; }
  </style>
<body>  
  <?php session_start(); ?>
<body>
  <div class="form-container">
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
      <button type="submit" class="btn btn-primary w-100">Iniciar sesión</button>
    </form>
    
  </div>







  <!-- jQuery -->

<script src="/assets/js/jquery.min.js"></script> 
<script src="/assets/js/bootstrap.bundle.min.js"></script>
<script src="/assets/js/tus-scripts.js"></script> 



</body>
</html>

