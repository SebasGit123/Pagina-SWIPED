 <?php
session_start();
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'jefatura') {
    header("Location: ../index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <title>inicio de Administrador</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="../assets/css/bootstrap/bootstrap.min.css"/>
  <link rel="stylesheet" href="../assets/css/mystyles/administradoraestilo.css" />
  <link rel="stylesheet" href="../assets/Fontawesome/css/all.min.css" />
</head>
<body>
 <!-- Navbar -->
  <nav class="navbar navbar-dark navi fixed-top">
    <div class="container-fluid justify-content-center">
      <span class="TESCI">ISC || TESCI</span>
    </div>
  </nav>
  <!-- Contenido principal con sidebar y carrusel -->
  <div class="main-content">
    <!-- Sidebar -->
    <div class="sidebar">
      <div class="user-info">
  <img src="https://i.pravatar.cc/200" alt="Usuario" class="avatar">
 <h2 class="user-name">Bienvenido, <?php echo $_SESSION['username']; ?> (<?php echo $_SESSION['rol']; ?>)</h2>
    </div>
      <ul class="nav flex-column text-primary">
        <li class="nav-item">
      <a class="nav-link" href="Administrador_Inicio.html">
        <i class="fa-solid fa-book-open"></i> Generar Reportes
      </a>
        </li>
        <li class="nav-item">
      <a class="nav-link" href="Perfil.html">
        <i class="fa-solid fa-user-gear"></i> Configuración de perfil
      </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <img src="../assets/img/academia1.png" width="20" height="20"> <span class="ms-1">Academias</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <img src="img/asig1.png" width="20" height="20"> <span class="ms-1">Asignaturas</span>
          </a>
        </li>
      </ul>
      <!-- Submenú -->
      <ul class="nav flex-column text-primary">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
            <i class="fa-solid fa-list-ul"></i>
            <span class="ms-1">Más opciones</span>
          </a>
          <ul class="dropdown-menu">
            <li>
              <a class="dropdown-item" href="../includes/logout.php">
               <i class="fa-solid fa-user-lock"></i> Cerrar sesión
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
    <!-- Carrusel -->
    <div class="carousel-container">
   
      <div id="cardCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <!-- Slide 1 -->
          <div class="carousel-item active">
            <div class="card-group-wrapper">
              <!-- Card 1 -->
              <div class="flip-card">
                <div class="flip-card-inner">
                  <div class="flip-card-front">
                    <img src="../assets/img/Registro de docentes 2.png" alt="Registro de Docentes" />
                  </div>
                  <div class="flip-card-back">
                    <h4>Gestion de Docentes</h4>
                    <p>El jefe de carrera podrá dar de alta a un nuevo docente.</p>
                    <a href="pruebas.php" class="btn btn-light btn-learn">Ir a Registrar</a>
                  </div>
                </div>
              </div>
              <!-- Card 2 -->
              <div class="flip-card">
                <div class="flip-card-inner">
                  <div class="flip-card-front">
                    <img src="../assets/img/AsignaM.png" alt="Asignación de Materias" />
                  </div>
                  <div class="flip-card-back">
                    <h4>Asignación de Materias</h4>
                    <p>Asigna materias a los docentes de forma sencilla.</p>
                    <select class="form-select mt-3" onchange="redirigir(this.value)">
                      <option selected disabled>Selecciona una opción</option>
                      <option value="Ciencias_Inge.html">Ciencias de la Ingeniería</option>
                      <option value="Diseño.html">Diseño de Ingeniería</option>
                      <option value="Ciencias_Basicas.html">Ciencias Básicas</option>
                      <option value="Economico_Adminis.html">Económico Administrativo</option>
                    </select>
                  </div>
                </div>
              </div>
              <!-- Card 3 -->
              <div class="flip-card">
                <div class="flip-card-inner">
                  <div class="flip-card-front">
                    <img src="../assets/img/ArchivosDocen.png" alt="Archivos Docentes" />
                  </div>
                  <div class="flip-card-back">
                    <h4>Archivos Docentes</h4>
                    <p>Revisa las instrumentaciones que los docentes ya tienen hechas.</p>
                    <a href="ArchivosDocen.html" class="btn btn-light btn-learn">Ver Archivos</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Slide 2 -->
          <div class="carousel-item">
            <div class="card-group-wrapper">
              <!-- Card 4 -->
              <div class="flip-card">
                <div class="flip-card-inner">
                  <div class="flip-card-front">
                    <img src="../assets/img/Especialidad..png" alt="Especialidades" />
                  </div>
                  <div class="flip-card-back">
                    <h4>Actualización de Especialidades</h4>
                    <p>Próximamente disponible para actualizar especialidades.</p>
                    <a href="ActualizacionEs.html" class="btn btn-light btn-learn">Ir a Actualizar</a>
                  </div>
                </div>
              </div>
              <!-- Card 5 -->
              <div class="flip-card">
                <div class="flip-card-inner">
                  <div class="flip-card-front">
                    <img src="../assets/img/Encabezado2.png" alt="Encabezados" />
                  </div>
                  <div class="flip-card-back">
                    <h4>Actualización de Encabezados</h4>
                    <p>Actualiza los encabezados de documentos oficiales.</p>
                    <a href="Index.html" class="btn btn-light btn-learn">Ir a Actualizar</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Controles -->
        <button class="carousel-control-prev" type="button" data-bs-target="#cardCarousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#cardCarousel" data-bs-slide="next">
          <span class="carousel-control-next-icon"></span>
        </button>
      </div>
    </div>
  </div>

  <script>
    function redirigir(pagina) {
      if (pagina) {
        window.location.href = pagina;
      }
    }
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
