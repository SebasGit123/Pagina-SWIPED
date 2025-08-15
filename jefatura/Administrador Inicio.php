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
  <title>Inicio de Administrador</title>
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
        <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#modalPerfil">
          <i class="fa-solid fa-user-gear"></i> Configuración de perfil
        </a>
      </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
          <i class="fa-solid fa-list-ul"></i>
          <span class="ms-1">Generador de Reportes</span>
        </a>
        <ul class="dropdown-menu">
          <li>
            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modalCiencias_Inge">
              <i class="fa-solid fa-gears"></i> Ciencias de la Ingeneria 
            </a>
          </li>
          <li>
            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modalBasicas">
              <i class="fas fa-flask me-2"></i> Ciencias Básicas
            </a>
          </li>
          <li>
            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modalEconomico_Adminis">
              <i class="fa-solid fa-chart-line"></i> Economico Administrativo
            </a>
          </li>
          <li>
            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modalDiseño">
              <i class="fas fa-drafting-compass me-2"></i> Diseño de Ingeneria
            </a>
          </li>
        </ul>
        <ul class="nav flex-column text-primary">
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
          <i class="fa-solid fa-list-ul"></i>
          <span class="ms-1">Más opciones</span>
        </a>
        <ul class="dropdown-menu">
          <li>
              <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">
                <i class="fa-solid fa-user-lock"></i> Cerrar sesión
              </a>
            </li>
          <li>
              <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#supportModal">
               <i class="fa-solid fa-question"></i> Soporte y Ayuda
             </a>
            </li>       
        </ul>
      </li> 
      </ul>
   </div>
  <div class="cards-container">
    <div class="titulo-central text-center">
    </div>
    <div class="cards-grid">
      <!-- Card 1 -->
      <div class="flip-card">
        <div class="flip-card-inner">
          <div class="flip-card-front">
            <img src="../assets/img/Registro de docentes 2.png" alt="Registro de Docentes" />
          </div>
          <div class="flip-card-back">
            <h4>Gestión de Docentes</h4>
            <p>El jefe de carrera podrá dar de alta a los docentes y gestionar funciones sencillas.</p>
            <a href="pruebas.php" class="btn btn-light btn-learn">Ir a Gestionar</a>
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
            <a href="ActualizacionEn.html" class="btn btn-light btn-learn">Ir a Actualizar</a>
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
<!-- Modal Gestión de Docentes -->
<div class="modal fade" id="modalGestionDocentes" tabindex="-1" aria-labelledby="modalGestionDocentesLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Generador de Reportes</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
          <table class="table table-bordered table-hover">
            <thead class="table-primary">
              <tr>
                <th>Nombre del Docente</th>
                <th>Asignatura</th>
                <th>Fecha de Creación</th>
                <th>Actualizada</th>
                <th>Aprobada</th>
                <th>Entregada en Tiempo y Forma</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Juan Pérez</td>
                <td>Matemáticas</td>
                <td>01/02/2025</td>
                <td>Sí</td>
                <td>Sí</td>
                <td>Sí</td>
              </tr>
              <tr>
                <td>María López</td>
                <td>Programación</td>
                <td>15/02/2025</td>
                <td>No</td>
                <td>Sí</td>
                <td>No</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal Ciencias de la Ingeniería -->                
<div class="modal fade" id="modalCiencias_Inge" tabindex="-1" aria-labelledby="modalCienciasIngeLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalCienciasIngeLabel">Generador de Reportes - Ciencias de la Ingeniería</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
          <table class="table table-bordered table-hover">
            <thead class="table-primary">
              <tr>
                <th>Nombre del Docente</th>
                <th>Asignatura</th>
                <th>Fecha de Creación</th>
                <th>Actualizada</th>
                <th>Aprobada</th>
                <th>Entregada en Tiempo y Forma</th>
              </tr>
            </thead>
            <tbody>
              <!-- Aquí puedes agregar más filas según sea necesario -->
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Diseño de Ingeniería -->
<div class="modal fade" id="modalDiseño" tabindex="-1" aria-labelledby="modalDiseñoLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalDiseñoLabel">Generador de Reportes - Diseño de Ingeniería</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
          <table class="table table-bordered table-hover">
            <thead class="table-primary">
              <tr>
                <th>Nombre del Docente</th>
                <th>Asignatura</th>
                <th>Fecha de Creación</th>
                <th>Actualizada</th>
                <th>Aprobada</th>
                <th>Entregada en Tiempo y Forma</th>
              </tr>
            </thead>
            <tbody>
              <!-- Aquí puedes agregar más filas según sea necesario -->
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Económico Administrativo --> 
<div class="modal fade" id="modalEconomico_Adminis" tabindex="-1" aria-labelledby="modalEconomicoAdminisLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalEconomicoAdminisLabel">Generador de Reportes - Económico Administrativo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
          <table class="table table-bordered table-hover">
            <thead class="table-primary">
              <tr>
                <th>Nombre del Docente</th>
                <th>Asignatura</th>
                <th>Fecha de Creación</th>
                <th>Actualizada</th>
                <th>Aprobada</th>
                <th>Entregada en Tiempo y Forma</th>
              </tr>
            </thead>
            <tbody>
              <!-- Aquí puedes agregar más filas según sea necesario -->
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Ciencias Básicas -->
<div class="modal fade" id="modalBasicas" tabindex="-1" aria-labelledby="modalBasicasLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalBasicasLabel">Generador de Reportes - Ciencias Básicas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
          <table class="table table-bordered table-hover">
            <thead class="table-primary">
              <tr>
                <th>Nombre del Docente</th>
                <th>Asignatura</th>
                <th>Fecha de Creación</th>
                <th>Actualizada</th>
                <th>Aprobada</th>
                <th>Entregada en Tiempo y Forma</th>
              </tr>
            </thead>
            <tbody>
              <!-- Aquí puedes agregar más filas según sea necesario -->
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal Configuración de Perfil -->
<div class="modal fade" id="modalPerfil" tabindex="-1" aria-labelledby="modalPerfilLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Configuración de Perfil</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label class="form-label">Nombres</label>
            <input type="text" class="form-control" placeholder="Escribe tus nombres">
          </div>
          <div class="mb-3">
            <label class="form-label">Apellidos</label>
            <input type="text" class="form-control" placeholder="Escribe tus apellidos">
          </div>
          <div class="mb-3">
            <label class="form-label">Correo electrónico</label>
            <input type="email" class="form-control" placeholder="correo@ejemplo.com">
          </div>
          <div class="mb-3">
            <label class="form-label">Jefe de carrera del área de</label>
            <input type="text" class="form-control" placeholder="Área">
          </div>
          <div class="mb-3">
            <label class="form-label">Clave de Control</label>
            <input type="text" class="form-control" placeholder="Clave de Control">
          </div>
          <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal Cerrar Sesión -->
  <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-danger text-white">
          <h5 class="modal-title" id="logoutModalLabel">Confirmar cierre de sesión</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>
        <div class="modal-body">
          ¿Estás seguro de que deseas cerrar sesión?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <!-- Aquí rediriges a logout.php -->
          <a href="logout.php" class="btn btn-danger">Cerrar sesión</a>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="supportModal" tabindex="-1" aria-labelledby="supportModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="supportModalLabel">Soporte y Ayuda</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        <p>Si tienes problemas con el sistema, contáctanos:</p>
        <ul>
          <li><strong>Email:</strong> soporte@tuinstitucion.mx</li>
          <li><strong>Teléfono:</strong> +52 55 1234 5678</li>
          <li><strong>Horario:</strong> Lunes a Viernes, 9:00 a 18:00</li>
        </ul>
        <p>También puedes consultar el <a href="manual_usuario.pdf" target="_blank">manual de usuario</a>.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
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

