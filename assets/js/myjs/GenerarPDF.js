const { jsPDF } = window.jspdf;

const nombreInput = document.getElementById('nombre');
const apellidoInput = document.getElementById('apellido');
const pdfViewer = document.getElementById('pdfViewer');
const printBtn = document.getElementById('printBtn');

let currentBlobUrl = '';

function generatePDF() {
  const doc = new jsPDF({
    orientation: 'landscape', 
    unit: 'mm',
    format: 'a4'
  });

  const nombre = nombreInput.value || '...';
  const apellido = apellidoInput.value || '...';

  doc.setFontSize(20);
  doc.text(`Nombre: ${nombre}`, 20, 40);
  doc.text(`Apellido: ${apellido}`, 20, 60);
  doc.text('División de la Universidad de la República', 20, 80);

  // Liberar blob anterior
  if (currentBlobUrl) {
    URL.revokeObjectURL(currentBlobUrl);
  }

  // Generar blob URL y asignar al iframe
  const pdfBlob = doc.output('blob');
  currentBlobUrl = URL.createObjectURL(pdfBlob);
  pdfViewer.src = currentBlobUrl;
}

nombreInput.addEventListener('input', generatePDF);
apellidoInput.addEventListener('input', generatePDF);

printBtn.addEventListener('click', () => {
  const doc = new jsPDF({
    orientation: 'landscape', 
    unit: 'mm',
    format: 'a4'
  });

  const nombre = nombreInput.value || '...';
  const apellido = apellidoInput.value || '...';

  doc.setFontSize(20);
  doc.text(`Nombre: ${nombre}`, 20, 40);
  doc.text(`Apellido: ${apellido}`, 20, 60);

  doc.autoPrint();
  doc.output('dataurlnewwindow');
});

// Generar PDF inicial
generatePDF();
