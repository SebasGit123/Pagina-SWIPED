

        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Obtener valores
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;
            
            // Credenciales válidas (en producción esto debe venir de un servidor)
            const validCredentials = {
                users: {
                    "admin": "admin",
                    "usuario": "123"
                },
                checkCredentials: function(user, pass) {
                    return this.users[user] === pass;
                }
            };
            
            // Validar credenciales
            if (validCredentials.checkCredentials(username, password)) {
                // Redirigir a página de bienvenida
                window.location.href = "inicio.html";
            } else {
                // Mostrar error
                document.getElementById('errorMessage').style.display = 'block';
                // Limpiar campos
                document.getElementById('password').value = '';
                // Enfocar en campo de contraseña
                document.getElementById('password').focus();
            }
        });
        
        // Ocultar mensaje de error al empezar a escribir
        document.getElementById('username').addEventListener('input', function() {
            document.getElementById('errorMessage').style.display = 'none';
        });
        
        document.getElementById('password').addEventListener('input', function() {
            document.getElementById('errorMessage').style.display = 'none';
        });