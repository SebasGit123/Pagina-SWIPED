<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sistema Integral ISC || TESCI</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <link rel="stylesheet" href="../assets/css/mystyles/pruebas.css">
  <link rel="stylesheet" href="../assets/css/mystyles/global.css">
  <link rel="stylesheet" href="../assets/css/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/Fontawesome/css/all.min.css">
</head>
<body>
<header class="navbar navbar-expand-lg navbar-dark fixed-top encabezado">
  <div class="container-fluid">
    <div class="d-flex me-auto">
      <button class="navbar-toggler" type="button" id="toggleSidebar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#">
        <img src="../assets/img/logo.png" alt="Logotipo" height="30" class="logoZ">
      </a>
    </div>

    <div class="header-content">
      <h1 class="NavTit">Sistema Integral ISC</h1>
    </div>

    <div class="ms-auto"></div>
  </div> 
</header>

<div class="container-fluid">
  <div class="row">
    <nav class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse" id="sidebarMenu">
      <div class="position-sticky">
        <br><br>
        <img src="../assets/img/ArchivosDocen.png" alt="Usuario" class="avatar my-3"> 
        <ul class="nav flex-column text-primary">
  <li class="nav-item">
    <a class="nav-link" href="#">
      <i class="fas fa-home me-2"></i>Inicio
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">
      <i class="fas fa-file-alt me-2"></i>Instrumentos
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">
      <i class="fas fa-chalkboard-teacher me-2"></i>Docentes
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">
      <i class="fas fa-file-signature me-2"></i>Reportes
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">
      <i class="fas fa-users me-2"></i>Academias
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">
      <i class="fas fa-book me-2"></i>Asignaturas
    </a>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
      <i class="fas fa-cog me-2"></i>Más opciones
    </a>
    <ul class="dropdown-menu">
      <li>
        <a class="dropdown-item" href="#">
          <i class="fas fa-tools me-2"></i>Configuración
        </a>
      </li>
      <li>
        <a class="dropdown-item" href="#">
          <i class="fas fa-envelope me-2"></i>Contacto
        </a>
      </li>
      <li>
        <a class="dropdown-item" href="#">
          <i class="fas fa-sign-out-alt me-2"></i>Cerrar Sesión
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
        
        <!-- Barra de búsqueda -->
        <form method="POST" action="pruebas.php" class="d-flex mb-3">
          <input name="busqueda" type="search" class="form-control me-2" placeholder="Buscar por docente o usuario">
          <button type="submit" class="css-button-rounded--green">Buscar</button>
        </form>
        
        <!-- Botón para agregar usuario -->
        <button type="button" class="css-button-rounded--blue" data-bs-toggle="modal" data-bs-target="#modalAgregar">
          Agregar Usuario
        </button>
        
        <br><br>
        
        <!-- Tabla de usuarios -->
        <div class="table-responsive table-container">
          <table class="table table-striped table-bordered">
            <thead class="table-dark sticky-header">
              <tr>
                <th>Nombre del docente</th>
                <th>Usuario</th>
                <th>Correo</th>
                <th>Rol</th>
                 <th>División</th>
                <th>Contraseña (encriptada)</th>
                <th>Acciones</th>
              </tr>
            </thead>
           <tbody>
    <?php include '../config/leer_usuarios.php'; ?>
</tbody>
          </table>
        </div>
      </div>
    </main>
  </div>
</div>

<!-- Modal para Agregar Usuario -->
<div class="modal fade" id="modalAgregar" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Agregar Usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <form action="../config/crear_usuario.php" method="POST">
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Nombre del docente</label>
            <input type="text" name="nameD" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Nombre de usuario</label>
            <input type="text" name="username" class="form-control" id="usernameInput" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Correo institucional</label>
            <div class="input-group">
              <input type="text" name="email_prefix" class="form-control" id="emailPrefix" required>
              <span class="input-group-text">@cuautitlan.tecnm.mx</span>
              <input type="hidden" name="email" id="emailComplete">
            </div>
            <small class="text-muted">El correo se formará automáticamente como: usuario@cuautitlan.tecnm.mx</small>
          </div>
          <div class="mb-3">
    <label class="form-label">Rol del usuario</label>
    <select name="rol" class="form-select" required>
      <option value="" selected disabled>Seleccione un rol</option>
      <option value="jefatura">Jefatura</option>
      <option value="docente">Docente</option>
      <option value="academia">Academia</option>
    </select>
</div>
<div class="mb-3">
    <label class="form-label">División</label>
    <select name="division" class="form-select" required>
        <option value="" selected disabled>Seleccione una división</option>
        <option value="División de Ingeniería Industrial">División de Ingeniería Industrial</option>
        <option value="División de Ingeniería en Sistemas Computacionales">División de Ingeniería en Sistemas Computacionales</option>
        <option value="División de Ingeniería en Tecnologías de la Información y Comunicaciones">División de Ingeniería en Tecnologías de la Información y Comunicaciones</option>
        <option value="División de Contaduría Pública">División de Contaduría Pública</option>
        <option value="División de Ingeniería Electrónica">División de Ingeniería Electrónica</option>
        <option value="División de Ingeniería en Gestión Empresarial">División de Ingeniería en Gestión Empresarial</option>
        <option value="División de Ingeniería en Logística">División de Ingeniería en Logística</option>
        <option value="División de Ingeniería en Administración">División de Ingeniería en Administración</option>
        <option value="División de Ingeniería Mecatrónica">División de Ingeniería Mecatrónica</option>
    </select>
</div>
          <div class="mb-3">
            <label class="form-label">Contraseña</label>
            <input type="password" name="password" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Confirmar contraseña</label>
            <input type="password" name="password_confirm" class="form-control" required>
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

<!-- Modal para Editar Usuario -->
<div class="modal fade" id="modalEditar" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Editar Usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <form action="../config/editar_usuario.php" method="POST" id="formEditar">
        <div class="modal-body" id="modalEditarBody">
          <!-- Contenido cargado dinámicamente por JavaScript -->
        </div>
        <div class="modal-footer">
          <button type="submit" class="css-button-rounded--green">Guardar Cambios</button>
          <button type="button" class="css-button-rounded--red" data-bs-dismiss="modal">Cancelar</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- JavaScript -->
<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
<script>
// Función para cargar datos en el modal de edición
function cargarDatosEdicion(id) {
  fetch(`obtener_usuario.php?id=${id}`)
    .then(response => response.json())
    // Dentro de la función cargarDatosEdicion(id)
.then(data => {
    const emailPrefix = data.email.replace('@cuautitlan.tecnm.mx', '');
    
    // ... tu código existente para generar el formulario HTML ...

    // Aquí se agrega el nuevo campo de "División"
    const formHTML = `
        <input type="hidden" name="id" value="${data.id}">
        <div class="mb-3">
            <label class="form-label">Nombre completo</label>
            <input type="text" name="nameD" class="form-control" value="${data.nameD}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Usuario</label>
            <input type="text" name="username" class="form-control" value="${data.username}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Correo</label>
            <div class="input-group">
                <input type="text" name="email_prefix" class="form-control" value="${emailPrefix}" required>
                <span class="input-group-text">@cuautitlan.tecnm.mx</span>
                <input type="hidden" name="email" id="emailCompleteEdit">
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Rol</label>
            <select name="rol" class="form-select" required>
                <option value="jefatura" ${data.rol === 'jefatura' ? 'selected' : ''}>Jefatura</option>
                <option value="docente" ${data.rol === 'docente' ? 'selected' : ''}>Docente</option>
                <option value="academia" ${data.rol === 'academia' ? 'selected' : ''}>Academia</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">División</label>
            <select name="division" class="form-select" required>
                <option value="División de Ingeniería Industrial" ${data.division === 'División de Ingeniería Industrial' ? 'selected' : ''}>División de Ingeniería Industrial</option>
                <option value="División de Ingeniería en Sistemas Computacionales" ${data.division === 'División de Ingeniería en Sistemas Computacionales' ? 'selected' : ''}>División de Ingeniería en Sistemas Computacionales</option>
                <option value="División de Ingeniería en Tecnologías de la Información y Comunicaciones" ${data.division === 'División de Ingeniería en Tecnologías de la Información y Comunicaciones' ? 'selected' : ''}>División de Ingeniería en Tecnologías de la Información y Comunicaciones</option>
                <option value="División de Contaduría Pública" ${data.division === 'División de Contaduría Pública' ? 'selected' : ''}>División de Contaduría Pública</option>
                <option value="División de Ingeniería Electrónica" ${data.division === 'División de Ingeniería Electrónica' ? 'selected' : ''}>División de Ingeniería Electrónica</option>
                <option value="División de Ingeniería en Gestión Empresarial" ${data.division === 'División de Ingeniería en Gestión Empresarial' ? 'selected' : ''}>División de Ingeniería en Gestión Empresarial</option>
                <option value="División de Ingeniería en Logística" ${data.division === 'División de Ingeniería en Logística' ? 'selected' : ''}>División de Ingeniería en Logística</option>
                <option value="División de Ingeniería en Administración" ${data.division === 'División de Ingeniería en Administración' ? 'selected' : ''}>División de Ingeniería en Administración</option>
                <option value="División de Ingeniería Mecatrónica" ${data.division === 'División de Ingeniería Mecatrónica' ? 'selected' : ''}>División de Ingeniería Mecatrónica</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Nueva contraseña</label>
            <input type="password" name="password" class="form-control" placeholder="Dejar vacío para no cambiar">
            <div class="form-text">Mínimo 8 caracteres</div>
        </div>
    `;
    document.getElementById('modalEditarBody').innerHTML = formHTML;
    // ... el resto de la función es el mismo ...
});
}

// Función para el sidebar
document.getElementById('toggleSidebar').addEventListener('click', function() {
  const sidebar = document.getElementById('sidebarMenu');
  sidebar.classList.toggle('show');
});

// Auto-completar correo en el formulario de agregar
document.getElementById('usernameInput').addEventListener('input', function() {
  const username = this.value.trim();
  document.getElementById('emailPrefix').value = username;
});

// Asegurar que el correo completo se envíe en el formulario de agregar
document.querySelector('#modalAgregar form').addEventListener('submit', function(e) {
  const prefix = document.getElementById('emailPrefix').value.trim();
  document.getElementById('emailComplete').value = prefix + '@cuautitlan.tecnm.mx';
});

// Asegurar que el correo completo se envíe en el formulario de editar
document.getElementById('formEditar').addEventListener('submit', function(e) {
  const prefix = document.querySelector('#modalEditarBody input[name="email_prefix"]').value.trim();
  document.getElementById('emailCompleteEdit').value = prefix + '@cuautitlan.tecnm.mx';
});
</script>
<script>
// Función para cargar datos en el modal de edición
function cargarDatosEdicion(id) {
    // Asegúrate de que la ruta sea correcta
    fetch(`../config/obtener_usuario.php?id=${id}`) 
        .then(response => {
            if (!response.ok) {
                throw new Error('Error al obtener datos del usuario');
            }
            return response.json();
        })
        .then(data => {
            const emailPrefix = data.email.replace('@cuautitlan.tecnm.mx', '');
            // El resto de tu código para generar el formulario HTML es correcto
            const formHTML = `
                <input type="hidden" name="id" value="${data.id}">
                <div class="mb-3">
                    <label class="form-label">Nombre completo</label>
                    <input type="text" name="nameD" class="form-control" value="${data.nameD}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Usuario</label>
                    <input type="text" name="username" class="form-control" value="${data.username}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Correo</label>
                    <div class="input-group">
                        <input type="text" name="email_prefix" class="form-control" value="${emailPrefix}" required>
                        <span class="input-group-text">@cuautitlan.tecnm.mx</span>
                        <input type="hidden" name="email" id="emailCompleteEdit">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Rol</label>
                    <select name="rol" class="form-select" required>
                        <option value="jefatura" ${data.rol === 'jefatura' ? 'selected' : ''}>Jefatura</option>
                        <option value="docente" ${data.rol === 'docente' ? 'selected' : ''}>Docente</option>
                        <option value="academia" ${data.rol === 'academia' ? 'selected' : ''}>Academia</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nueva contraseña</label>
                    <input type="password" name="password" class="form-control" placeholder="Dejar vacío para no cambiar">
                    <div class="form-text">Mínimo 8 caracteres</div>
                </div>
            `;
            document.getElementById('modalEditarBody').innerHTML = formHTML;
            // Asegurar que el correo completo se envíe en el formulario de editar
            document.getElementById('formEditar').addEventListener('submit', function(e) {
                const prefix = document.querySelector('#modalEditarBody input[name="email_prefix"]').value.trim();
                document.getElementById('emailCompleteEdit').value = prefix + '@cuautitlan.tecnm.mx';
            });
            // Opcional: mostrar el modal manualmente, en caso de que el `data-bs-target` falle por la recarga del contenido
            const modalEditar = new bootstrap.Modal(document.getElementById('modalEditar'));
            modalEditar.show();
        })
        .catch(error => {
            console.error('Error:', error);
            document.getElementById('modalEditarBody').innerHTML = `<div class="alert alert-danger">Error: ${error.message}</div>`;
        });
}
</script>
</body>
</html>