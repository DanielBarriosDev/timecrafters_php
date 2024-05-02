<?php
    ob_start();

    class LoginControlador {

        public function ingresarLoginControlador () {
            
        }

        public function generarContrasenasDefecto() {
            // Obtener todos los usuarios
            $loginDAO = new LoginDAO();
            $usuarios = $loginDAO->obtenerUsuarios();
    
            if ($usuarios) {
                foreach ($usuarios as $usuario) {
                    $usuario_id = $usuario['usuarios_id'];
    
                    // Generar contraseña por defecto
                    $password_defecto = $loginDAO->generarPasswordDefecto($usuario_id);
    
                    // Encriptar la contraseña
                    $password_encriptada = password_hash($password_defecto, PASSWORD_DEFAULT);
    
                    // Actualizar información del usuario
                    $loginDAO->actualizarInformacionUsuario($usuario_id, $password_encriptada);
                }
            }
        }
          
    }

?>