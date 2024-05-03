<?php
    ob_start();

    class LoginControlador {

        public function ingresarLoginControlador () {
            
            if (isset($_POST['usuario']) && isset($_POST['password'])){
                
                $patronIdentificacion = '/^[0-9]{5,12}$/';
                $patronPassword = '/^[a-zA-Z0-9@#*.]{8,16}$/';

                if (!preg_match($patronIdentificacion, $_POST['usuario'])) {
                    header("location:" . SERVERURL . "login/ErrUsuario");
                    exit;
                } else if (!preg_match($patronPassword, $_POST['password'])) {
                    header("location:" . SERVERURL . "login/ErrPassword");
                    exit;
                } else {


                    
                }




            }
        }

        public function generarPasswordDefectoControlador() {
            $loginDao = new LoginDAO();
            $usuariosDao = new UsuariosDAO();
            $respuesta = $usuariosDao -> listarUsuariosModelo();

            if (!empty($respuesta)) {
                foreach ($respuesta as $usuario) {
                    $usuariosId = $usuario['usuarios_id'];

                    // Verificar si el usuario ya tiene un registro en la tabla login
                    $loginInfo = $loginDao -> listarLoginByIdModelo($usuariosId);

                    if (empty($loginInfo)) {
                        // El usuario no tiene un registro en la tabla login, proceder a generar la contraseña
                        $passwordDefecto = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789@#*.'), 0, 16);
                        $passwordEncriptada = password_hash($passwordDefecto, PASSWORD_DEFAULT);

                        // Registrar la contraseña en la base de datos
                        $resultado = $loginDao -> registrarPasswordModelo($usuariosId, $passwordEncriptada);

                        // Mostrar la contraseña generada al usuario
                        echo "Contraseña generada para el usuario con ID $usuariosId: $passwordDefecto<br>";
                        
                    } else {
                        // El usuario ya tiene un registro en la tabla login
                        echo "El usuario con ID $usuariosId ya tiene una contraseña registrada.<br>";
                    }
                }
            } else {
                echo "No se encontraron usuarios.";
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


        public function eliminarLoginControlador ($id) {

            if (isset($id)) {
                $loginDao = new LoginDAO();
                $respuesta = $loginDao -> eliminarLoginModelo($id);

                return $respuesta;

                if ($respuesta == "success") {
                    header("location" . SERVERURL . "login/eliminar/okdel");
                }
                else {
                    header("location:" . SERVERURL . "login/eliminar/errdel");
                }
            }
        }
          
    }

?>