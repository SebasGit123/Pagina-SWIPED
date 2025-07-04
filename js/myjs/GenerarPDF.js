    let timeout = null;
    let pdfActual = null;

    function generarYMostrarPDF() {
      const nombre = document.getElementById("nombre").value;
      const correo = document.getElementById("correo").value;
      const mensaje = document.getElementById("mensaje").value;

      const doc = new jsPDF();
      doc.setFontSize(14);
      doc.text("Vista previa del formulario", 10, 10);
      doc.setFontSize(12);
      doc.text("Nombre: " + nombre, 10, 20);
      doc.text("Correo: " + correo, 10, 30);
      doc.text("Mensaje:", 10, 40);
      doc.text(mensaje, 10, 50);

      // Guarda el PDF actual en memoria
      pdfActual = doc;

      // Mostrar en el visor
      const dataURI = doc.output("datauristring");
      document.getElementById("visorPDF").src = dataURI;
    }

    function guardarPDF() {
      if (pdfActual) {
        pdfActual.save("formulario.pdf");
      } else {
        alert("Primero debes llenar el formulario para generar el PDF.");
      }
    }

    // Detectar cambios en los campos
    const campos = document.querySelectorAll("#miFormulario input, #miFormulario textarea");
    campos.forEach(campo => {
      campo.addEventListener("input", () => {
        clearTimeout(timeout);
        timeout = setTimeout(generarYMostrarPDF, 500); // Espera antes de actualizar
      });
    });