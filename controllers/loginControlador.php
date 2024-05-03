<?php
    ob_start();

    class LoginControlador {

        public function ingresarLoginControlador () {
            
        }

        public function generarPasswordDefectoControlador() {
            $loginDao = new LoginDAO();
            $usuariosDao = new UsuariosDAO();
            $loginControlador = new LoginControlador();
            $respuesta = $usuariosDao -> listarUsuariosModelo();
          
            if (!empty($respuesta)) {
              for ($i = 0; $i < count($respuesta); $i++) {
                $usuario = $respuesta[$i];
                $usuariosId = $usuario['usuarios_id'];

                
                $passwordDefecto = $loginControlador -> generarPasswordControlador();
                $passwordEncriptada = password_hash($passwordDefecto, PASSWORD_DEFAULT);
          
                $resultado = $loginDao -> registrarPasswordModelo($usuariosId, $passwordEncriptada);
          
                // ... (resto del código para el manejo de éxito/error)
              }
            } else {
              // ... (mensaje de no se encontraron usuarios)
            }
        }
        
        function generarPasswordControlador() {
            $password = substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789@#*.', 16)), 0, 16);
            return $password;
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