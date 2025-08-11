document.addEventListener('DOMContentLoaded', function () {
  document.getElementById('loginForm').addEventListener('submit', function (e) {
    e.preventDefault();

    const rol = document.getElementById('rol').value;
    const clave = document.getElementById('clave').value.trim();
    const password = document.getElementById('password').value.trim();

    // Simulación de base de datos
    const usuarios = {
      'docente': {
        clave: 'D001',
        password: 'docente123',
        redireccion: 'docente.html'
      },
      'jefe-carrera': {
        clave: 'JC002',
        password: 'carrera456',
        redireccion: 'Administrador Inicio.html'
      },
      'jefe-academia': {
        clave: 'JA003',
        password: 'academia789',
        redireccion: 'jefe_academia.html'
      }
    };

    if (!rol || !clave || !password) {
      alert('Por favor, llena todos los campos.');
      return;
    }

    const usuario = usuarios[rol];

    if (usuario && clave === usuario.clave && password === usuario.password) {
      alert('Inicio de sesión exitoso');
      window.location.href = usuario.redireccion;
    } else {
      alert('Datos incorrectos. Verifica tu Clave de Control, Contraseña y Rol.');
    }
  });
});
