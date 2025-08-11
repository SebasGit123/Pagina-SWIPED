document.addEventListener('DOMContentLoaded', function() {
    // Simulación de datos de docentes por área
    const teachersByArea = {
        'programacion': [
            { name: 'Mtro José Luis Camacho Campero', area: 'Programación' },
            { name: 'Prof. Esteban Sánchez Escarriola', area: 'Programación' },
            { name: 'Prof. Elva Bernal Rodríguez', area: 'Programación' }
        ],
        'basedatos': [
            { name: 'Prof. Ana María López', area: 'Base de Datos' },
            { name: 'Prof. Carlos Ruiz', area: 'Base de Datos' }
        ],
        'ingenieria': [
            { name: 'Mtro. Roberto Jiménez', area: 'Ingeniería de Software' },
            { name: 'Dra. Laura Méndez', area: 'Ingeniería de Software' }
        ],
        'redes': [
            { name: 'Ing. Fernando Torres', area: 'Redes' },
            { name: 'Prof. Patricia Navarro', area: 'Redes' }
        ],
        'arquitectura': [
            { name: 'Dr. Miguel Ángel Castro', area: 'Arq. de Computadoras y SO' },
            { name: 'Prof. Silvia Gómez', area: 'Arq. de Computadoras y SO' }
        ],
        'seguridad': [
            { name: 'Mtro. Alejandro Ramírez', area: 'Seguridad' },
            { name: 'Prof. Adriana Vega', area: 'Seguridad' }
        ],
        'administracion': [
            { name: 'Lic. Jorge Medina', area: 'Administración' },
            { name: 'Prof. Lucía Ríos', area: 'Administración' }
        ],
        'ciencias': [
            { name: 'Dr. Ernesto Sánchez', area: 'Ciencias Básicas' },
            { name: 'Dra. Isabel Flores', area: 'Ciencias Básicas' }
        ]
    };

    // Obtener elementos del DOM
    const areaItems = document.querySelectorAll('.area-item');
    const teachersContainer = document.getElementById('teachers-container');
    const currentAreaTitle = document.querySelector('.current-area');

    // Función para cargar docentes por área
    function loadTeachers(area) {
        const teachers = teachersByArea[area];
        const areaName = document.querySelector(`.area-item[data-area="${area}"]`).textContent.trim();
        
        // Actualizar título del área
        currentAreaTitle.innerHTML = `<i class="fas fa-folder-open me-2"></i>${areaName}`;
        
        // Limpiar contenedor
        teachersContainer.innerHTML = '';
        
        // Agregar docentes al contenedor
        if (teachers && teachers.length > 0) {
            teachers.forEach(teacher => {
                const teacherCard = `
                    <div class="col-md-3 col-sm-6 folder-container">
                        <div class="folder-card">
                            <img src="https://img.icons8.com/fluency/96/folder-invoices.png" alt="Folder" class="folder-icon">
                            <div class="folder-info">
                                <h5>${teacher.name}</h5>
                                <p class="text-muted">${teacher.area}</p>
                            </div>
                        </div>
                    </div>
                `;
                teachersContainer.innerHTML += teacherCard;
            });
        } else {
            teachersContainer.innerHTML = `
                <div class="col-12 text-center py-5">
                    <i class="fas fa-folder-open fa-3x mb-3 text-muted"></i>
                    <h5 class="text-muted">No hay docentes registrados en esta área</h5>
                </div>
            `;
        }
    }

    // Manejar clic en áreas
    areaItems.forEach(item => {
        item.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Remover clase active de todos los items
            areaItems.forEach(i => i.classList.remove('active'));
            
            // Agregar clase active al item clickeado
            this.classList.add('active');
            
            // Cargar docentes del área seleccionada
            const area = this.getAttribute('data-area');
            loadTeachers(area);
        });
    });

    // Cargar docentes del área activa por defecto
    const activeArea = document.querySelector('.area-item.active').getAttribute('data-area');
    loadTeachers(activeArea);

    // Manejar búsqueda
    const searchInput = document.querySelector('input[type="text"]');
    searchInput.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        const folders = document.querySelectorAll('.folder-card');
        
        folders.forEach(folder => {
            const teacherName = folder.querySelector('h5').textContent.toLowerCase();
            if (teacherName.includes(searchTerm)) {
                folder.parentElement.style.display = 'block';
            } else {
                folder.parentElement.style.display = 'none';
            }
        });
    });

    // Mostrar/ocultar sidebar en móviles
    const sidebarToggle = document.createElement('button');
    sidebarToggle.className = 'btn btn-primary sidebar-toggle d-lg-none';
    sidebarToggle.innerHTML = '<i class="fas fa-bars"></i> Áreas';
    sidebarToggle.style.position = 'fixed';
    sidebarToggle.style.bottom = '20px';
    sidebarToggle.style.right = '20px';
    sidebarToggle.style.zIndex = '1000';
    sidebarToggle.style.borderRadius = '50px';
    sidebarToggle.style.padding = '10px 20px';
    sidebarToggle.style.backgroundColor = 'var(--Fondo)';
    sidebarToggle.style.border = 'none';
    sidebarToggle.style.boxShadow = '0 4px 8px rgba(0, 0, 0, 0.2)';
    
    document.body.appendChild(sidebarToggle);
    
    sidebarToggle.addEventListener('click', function() {
        document.querySelector('.sidebar').classList.toggle('show');
    });
});