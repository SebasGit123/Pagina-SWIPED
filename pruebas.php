<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sistema Integral ISC || TESCI</title>
  <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <link rel="stylesheet" href="css/mystyles/pruebas.css">
  <link rel="stylesheet" href="css/mystyles/global.css">
</head>

<body>
<header class="navbar navbar-expand-lg navbar-dark fixed-top encabezado">
  <div class="container-fluid d-flex align-items-center justify-content-center">
    <div class="d-flex align-items-center me-auto">
      <button class="navbar-toggler" type="button" id="toggleSidebar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#">
        <img src="img/logo.png" alt="Logotipo" height="30" class="logoZ">
      </a>
    </div>

    <h1 class="NavTit">Sistema Integral ISC</h1>

    <div class="ms-auto"></div>
  </div> 
</header>
  <div class="container-fluid">
    <div class="row">

      <nav class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse" id="sidebarMenu">
        <div class="position-sticky">
          <br><br>
          <img src="img/ArchivosDocen.png" alt="Usuario" class="avatar my-3"> 
          <ul class="nav flex-column text-primary">
            <li class="nav-item">
              <a class="nav-link" href="#"><img src="img/inicio1.png" width="20" height="20" alt=""> <span class="ms-1">Inicio</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><img src="img/instru1.png" width="20" height="20"> <span class="ms-1">Instrument.</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><img src="img/docentes1.png" width="20" height="20"> <span class="ms-1">Docentes</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><img src="img/academia1.png" width="20" height="20"> <span class="ms-1">Academias</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><img src="img/asig1.png" width="20" height="20"> <span class="ms-1">Asignaturas</span></a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="img/opcion1.png" width="20" height="20">
                <span class="ms-1">Más opciones</span>
              </a>
              <ul class="dropdown-menu">
                <li>
                  <a class="dropdown-item" href="#">
                    <img src="img/conf1.png" width="20" height="20">
                    <span class="ms-1">Configuración</span>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="#">
                    <img src="img/cont1.png" width="20" height="20">
                    <span class="ms-1">Contacto</span>
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="#">
                    <button class="css-button-rounded--red espaciado" onclick="location.href='INDEX.html'">
                      <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
                    </button>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>

      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <br><br>
        <h1 class="mt-4">Bienvenido al Sistema</h1>
        <div class="container py-4">
          <h2 class="text-center mb-4">Gestión de Docentes</h2>
<form method="POST" action="pruebas.php" class="d-flex mb-3">
  <input name="busqueda" type="search" class="form-control me-2" placeholder="Buscar por docente o usuario">
  <button type="submit" class="css-button-rounded--green">Buscar</button>
</form>
          <button type="button" class="css-button-rounded--blue" data-bs-toggle="modal" data-bs-target="#modalAgregar">
            Agregar Usuario
          </button>
          <br><br>
          <div class="table-responsive table-container">
            <table class="table table-striped table-bordered">
              <thead class="table-dark sticky-header">
                <tr>
                  <th>Nombre del docente</th>
                  <th>Usuario</th>
                  <th>Contraseña (encriptada)</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                <?php include 'leer_usuarios.php'; ?>
              </tbody>
            </table>
          </div>
        </div>
      </main>
    </div>
  </div>

  <div class="modal fade" id="modalAgregar" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Agregar Usuario</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>
        <form action="crear_usuario.php" method="POST">
          <div class="modal-body">
            <div class="mb-3">
              <label for="nombre" class="form-label">Nombre del docente</label>
              <input type="text" name="nombre" class="form-control" required>
            </div>
            <div class="mb-3">
              <label for="usuario" class="form-label">Nombre de usuario</label>
              <input type="text" name="usuario" class="form-control" required>
            </div>
            <div class="mb-3">
              <label for="correo" class="form-label">Correo institucional</label>
              <input type="email" name="correo" class="form-control" pattern=".+@tesci\.edu\.mx" required>
            </div>
            <div class="mb-3">
              <label for="contrasena" class="form-label">Contraseña</label>
              <input type="password" name="contrasena" class="form-control" required>
            </div>
            <div class="mb-3">
              <label for="confirmar" class="form-label">Confirmar contraseña</label>
              <input type="password" name="confirmar" class="form-control" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="css-button-rounded--green">Guardar</button>
            <button type="button" class="css-button-rounded--red" data-bs-dismiss="modal">Cancelar</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="js/bootstrap.bundle.min.js"></script>
  <script>
    document.getElementById('toggleSidebar').addEventListener('click', function () {
      const sidebar = document.getElementById('sidebarMenu');
      sidebar.classList.toggle('show');
    });
  </script>
</body>
</html>