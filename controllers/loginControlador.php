<?php
    ob_start();

    class LoginControlador {

        public function ingresarLoginControlador () {
            
        }

        public function generarPasswordDefectoControlador() {
            $loginDao = new LoginDAO();
            $usuariosDao = new UsuariosDAO();
            $respuesta = $usuariosDao -> listarUsuariosModelo();
    
            if (!empty($respuesta)) { 
                foreach ($respuesta as $usuario) {
                    $usuariosId = $usuario['usuarios_id'];
        
                    $passwordDefecto = $loginDao -> generarPasswordDefectoModelo($usuariosId);
                    $passwordEncriptada = password_hash($passwordDefecto, PASSWORD_DEFAULT);
        
                    $resultado = $loginDao -> registrarPasswordModelo($usuariosId, $passwordEncriptada);
                    if ($resultado === "success") {
                        echo "Contraseña generada con éxito para el usuario con ID: $usuariosId<br>";
                    } else {
                        echo "Error al generar contraseña para el usuario con ID: $usuariosId<br>";
                    }
                }
            } else {
                echo "No hay usuarios para generar contraseñas.";
            }
        }


        public function listarLoginControlador () {
            $loginDao = new LoginDAO();

            if (isset($_POST['busqueda'])) {
                $busqueda = $_POST['busqueda'];
                $listado = $loginDao -> listarLoginBusquedaModelo($busqueda);
            }
            else {
                $listado = $loginDao -> listarLoginModelo();
            }
            
            return $listado;
        }
          
    }

?>