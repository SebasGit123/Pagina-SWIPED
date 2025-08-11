function autoResizeTextarea(textarea) {
      textarea.style.height = 'auto';
      textarea.style.height = (textarea.scrollHeight) + 0.5 + 'px';
    }

    // Aplicar a todos los textareas con clase auto-resize-textarea
    document.querySelectorAll('.auto-resize-textarea').forEach(textarea => {
      // Ajustar inicialmente
      autoResizeTextarea(textarea);
      
      // Ajustar en cada entrada
      textarea.addEventListener('input', function() {
        autoResizeTextarea(this);
      });
    });

    // CREACION DE LA TABLA

    function actualizarTablaCompetencias() {
    const cantidad = parseInt(document.getElementById('cantidadCompetencias').value);
    const cuerpoTabla = document.getElementById('cuerpoTablaCompetencias');
    
    // Validar entrada
    if (isNaN(cantidad) || cantidad < 1) {
        alert('Por favor ingrese un número válido (1-20)');
        return;
    }
    
    // Limpiar tabla
    cuerpoTabla.innerHTML = '';
    
    // Generar nuevas filas
    for (let i = 0; i <= cantidad; i++) {
        const fila = document.createElement('tr');
        
        // Celda de número
        const celdaNumero = document.createElement('td');
        celdaNumero.textContent = i;
        fila.appendChild(celdaNumero);
        
        // Celda de descripción con textarea
        const celdaDescripcion = document.createElement('td');
        const textarea = document.createElement('textarea');
        textarea.className = 'auto-resize-textarea tabla-textarea';
        textarea.placeholder = 'Descripción de la competencia';
        celdaDescripcion.appendChild(textarea);
        fila.appendChild(celdaDescripcion);
        
        cuerpoTabla.appendChild(fila);
    }
    
    // Inicializar los nuevos textareas
    inicializarTextareasAutoajustables();
}

// Función para inicializar textareas autoajustables
function inicializarTextareasAutoajustables() {
    document.querySelectorAll('.tabla-textarea').forEach(textarea => {
        // Configurar evento de entrada
        textarea.addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = (this.scrollHeight) + 'px';
            
            // Ajustar altura de la fila
            const fila = this.closest('tr');
            fila.style.height = 'auto';
            fila.style.height = (this.scrollHeight + 10) + 'px'; // +20px para padding
        });
        
        // Disparar evento input para ajustar inicialmente
        textarea.dispatchEvent(new Event('input'));
    });
}

// Inicializar al cargar la página
document.addEventListener('DOMContentLoaded', function() {
    inicializarTextareasAutoajustables();
});

// AJUSTE CALENDARIO
