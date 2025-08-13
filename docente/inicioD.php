 <?php
session_start();
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'docente') {
    header("Location: ../index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Usuario - ISC TESCI</title>
    <link rel="stylesheet" href="../assets/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="css/mystyles/archivos.css">
    <link rel="stylesheet" href="../assets/css/mystyles/global.css">
    <link rel="stylesheet" href="../assets/css/mystyles/archivos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark navi">
  <div class="container-fluid">
    <img src="../assets/img/logo.png" class="logoZ">
    <a class="navbar-brand">ISC || TESCI</a>
  </div>
</nav>

<div class="container">
    <div class="main-layout">
        <!-- Panel lateral -->
        <div class="sidebar">
            <div class="user-info">
                <div class="user-avatar">
                    <img src="../assets/img/perfil.jpg" alt="Avatar">
                </div>
                 <h2 class="user-name">Bienvenido, <?php echo $_SESSION['username']; ?> (<?php echo $_SESSION['rol']; ?>)</h2>
                <p class="user-degree"><small>Division :</small>Ingeniería en sistemas computacionales</p>
            </div>
            
            <button class="main-btn" onclick="location.href='rubricas.html'">
                <i class="fas fa-plus-circle"></i> Crear Nueva Instrumentación
            </button>
            
            <div class="menu-options">
             <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Materias asignadas</button>
              
            <button class="css-button-rounded--red espaciado" onclick="location.href=''">
                <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
            </button>
            </div>
        </div>
        
        <!-- Contenido principal -->
        <div class="content-panel">
            <h2><i class="fas fa-clipboard-list"></i> Mis Instrumentaciones</h2>
            
            <div class="rubrics-list" >
                <!-- Instrumentación 1 -->
                <div class="rubric-card">
                    <h3 class="rubric-title">Instrumentación de Programación</h3>
                    <div class="rubric-details">
                        <span><i class="fas fa-calendar-alt"></i> 10/05/2023</span>
                        <span><i class="fas fa-file-word"></i> 1.6 MB</span>
                    </div>
                    <div class="rubric-actions">
                        <button class="action-btn btn-show" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="fas fa-eye"></i> Mostrar
                        </button>
                        <button class="action-btn btn-modify">
                            <i class="fas fa-edit"></i> Modificar
                        </button>
                        <button class="action-btn btn-delete">
                            <i class="fas fa-trash"></i> Borrar
                        </button>
                    </div>
                </div>
                
                <!-- Instrumentación 2 -->
                <div class="rubric-card">
                    <h3 class="rubric-title">Instrumentación de Base de Datos</h3>
                    <div class="rubric-details">
                        <span><i class="fas fa-calendar-alt"></i> 01/05/2023</span>
                        <span><i class="fas fa-file-powerpoint"></i> 5.7 MB</span>
                    </div>
                    <div class="rubric-actions">
                        <button class="action-btn btn-show" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="fas fa-eye"></i> Mostrar
                        </button>
                        <button class="action-btn btn-modify">
                            <i class="fas fa-edit"></i> Modificar
                        </button>
                        <button class="action-btn btn-delete">
                            <i class="fas fa-trash"></i> Borrar
                        </button>
                    </div>
                </div>
                
                <!-- Instrumentación3 -->
                <div class="rubric-card">
                    <h3 class="rubric-title">Instrumentación de Física</h3>
                    <div class="rubric-details">
                        <span><i class="fas fa-calendar-alt"></i> 05/05/2023</span>
                        <span><i class="fas fa-file-excel"></i> 3.2 MB</span>
                    </div>
                    <div class="rubric-actions">
                        <button class="action-btn btn-show" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="fas fa-eye"></i> Mostrar
                        </button>
                        <button class="action-btn btn-modify">
                            <i class="fas fa-edit"></i> Modificar
                        </button>
                        <button class="action-btn btn-delete">
                            <i class="fas fa-trash"></i> Borrar
                        </button>
                    </div>
                </div>
                
                <!-- Instrumentación 4 -->
                <div class="rubric-card">
                    <h3 class="rubric-title">Instrumentación de Administración</h3>
                    <div class="rubric-details">
                        <span><i class="fas fa-calendar-alt"></i> 25/04/2023</span>
                        <span><i class="fas fa-file-alt"></i> 0.8 MB</span>
                    </div>
                    <div class="rubric-actions">
                        <button class="action-btn btn-show" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="fas fa-eye"></i> Mostrar
                        </button>
                        <button class="action-btn btn-modify">
                            <i class="fas fa-edit"></i> Modificar
                        </button>
                        <button class="action-btn btn-delete">
                            <i class="fas fa-trash"></i> Borrar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal para visualizar PDF -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Vista previa Instrumentaciones</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-0">
        <iframe src="../assets/pdfs/rubricaEjemplo.pdf" frameborder="0" class="pdf-iframe"></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal para Materias Asignadas -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Materias asignadas</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <table class="table table-striped table-hover">
            <thead class="table-primary">
              <tr>
                <th>Materia</th>
                <th>Grupo</th>
                <th>Horario</th>
                <th>Aula</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Programación Avanzada</td>
                <td>ISC-801</td>
                <td>Lunes y Miércoles 10:00-12:00</td>
                <td>Aula 304</td>
              </tr>
              <tr>
                <td>Base de Datos</td>
                <td>ISC-802</td>
                <td>Martes y Jueves 08:00-10:00</td>
                <td>Laboratorio 2</td>
              </tr>
              <tr>
                <td>Arquitectura de Computadoras</td>
                <td>ISC-701</td>
                <td>Viernes 14:00-18:00</td>
                <td>Aula 201</td>
              </tr>
              <tr>
                <td>Ingeniería de Software</td>
                <td>ISC-901</td>
                <td>Lunes y Miércoles 16:00-18:00</td>
                <td>Aula 402</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>



<script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>