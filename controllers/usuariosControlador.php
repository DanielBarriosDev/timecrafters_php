<?php

    ob_start();

    class UsuariosControlador{
        
        public function registrarUsuariosControlador(){
            
            $patronNombre = '/^[A-Za-zÁáÉéÍíÓóÚúÑñÜü\s]+$/';
            $patronIdentificacion = '/^[0-9]{5,12}$/';
            $patronCorreo = '/^[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}+$/';

            if (isset($_POST["nombres"]) && isset($_POST['apellidos']) && isset($_POST['tipoIdentificacion']) && 
                isset($_POST['identificacion']) && isset($_POST['correo']) && isset($_POST['estado']) && isset($_POST['ciudades'])) {

                if (!preg_match($patronNombre, $_POST['nombres'])) {
                    header("location:" . SERVERURL . "usuarios/registrarUsuarios/regNom");
                    exit;
                } 
                else if (!preg_match($patronNombre, $_POST['apellidos'])) {
                    header("location:" . SERVERURL . "usuarios/registrarUsuarios/regApel");
                    exit;
                }
                else if (!preg_match($patronNombre, $_POST['tipoIdentificacion'])) {
                    header("location:" . SERVERURL . "usuarios/registrarUsuarios/regTipoId");
                    exit;
                }
                else if (!preg_match($patronIdentificacion, $_POST['identificacion'])) {
                    header("location:" . SERVERURL . "usuarios/registrarUsuarios/regIden");
                    exit;
                } 
                else if (!filter_var($_POST['correo'], FILTER_VALIDATE_EMAIL)){
                    header("location:" . SERVERURL . "usuarios/registrarUsuarios/regEmail");
                    exit;
                }
                else if (!preg_match($patronNombre, $_POST['estado'])) {
                    header("location:" . SERVERURL . "usuarios/registrarUsuarios/regEstado");
                    exit;
                }
                else {

                    $datos = array(
                        'nombres' => $_POST['nombres'],
                        'apellidos' => $_POST['apellidos'],
                        'tipoIdentificacion' => $_POST['tipoIdentificacion'],
                        'identificacion' => $_POST['identificacion'],
                        'correo' => $_POST['correo'],
                        'estado' => $_POST['estado'],
                        'ciudades' => $_POST['ciudades']
                    );


                    $usuariosDao = new UsuariosDAO();
                    $respuesta = $usuariosDao -> registrarUsuariosModelo($datos, 'usuarios');

                    if ($respuesta == "success") {
                        header("location:" . SERVERURL . "usuarios/registrarUsuarios/okUser");
                    } else {
                        header("location:" . SERVERURL . "usuarios/registrarUsuarios/erUser");
                    }
                    exit;
                        
                }

            }
        }

        public function listarUsuariosControlador(){
            $usuariosDao = new UsuariosDAO();

            if (isset($_POST['busqueda'])) {
                $busqueda = $_POST['busqueda'];
                $listado = $usuariosDao -> listarUsuariosBusquedaModelo($busqueda);
            }
            else {
                $listado = $usuariosDao -> listarUsuariosModelo();
            }

            return $listado;
        }


        public function listarUsuariosByIdControlador ($id){
            $usuariosDao = new UsuariosDAO();
            $resultado = $usuariosDao -> listarUsuariosByIdModelo($id);
            return $resultado;
        }


        public function actualizarUsuarioControlador(){

            $patronNombre = '/^[A-Za-zÁáÉéÍíÓóÚúÑñÜü\s]+$/';
            $patronIdentificacion = '/^[0-9]{5,12}$/';
            $patronCorreo = '/^[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}+$/';

            if (
                isset($_POST["nombres"]) && isset($_POST['apellidos']) && isset($_POST['tipoIdentificacion']) &&
                isset($_POST['identificacion']) && isset($_POST['correo']) && isset($_POST['estado']) && isset($_POST['ciudades'])
            ) {

                if (!preg_match($patronNombre, $_POST['nombres'])) {
                    header("location:" . SERVERURL . "usuarios/editarUsuarios/regNom");
                    exit;
                } else if (!preg_match($patronNombre, $_POST['apellidos'])) {
                    header("location:" . SERVERURL . "usuarios/editarUsuarios/regApel");
                    exit;
                } else if (!preg_match($patronNombre, $_POST['tipoIdentificacion'])) {
                    header("location:" . SERVERURL . "usuarios/editarUsuarios/regTipoId");
                    exit;
                } else if (!preg_match($patronIdentificacion, $_POST['identificacion'])) {
                    header("location:" . SERVERURL . "usuarios/editarUsuarios/regIden");
                    exit;
                } else if (!filter_var($_POST['correo'], FILTER_VALIDATE_EMAIL)) {
                    header("location:" . SERVERURL . "usuarios/editarUsuarios/regEmail");
                    exit;
                } else if (!preg_match($patronNombre, $_POST['estado'])) {
                    header("location:" . SERVERURL . "usuarios/editarUsuarios/regEstado");
                    exit;
                } else {

                    $datos = array(
                        'nombres' => $_POST['nombres'],
                        'apellidos' => $_POST['apellidos'],
                        'tipoIdentificacion' => $_POST['tipoIdentificacion'],
                        'identificacion' => $_POST['identificacion'],
                        'correo' => $_POST['correo'],
                        'estado' => $_POST['estado'],
                        'ciudades' => $_POST['ciudades'],
                        "id" => $_POST['id']

                    );

                    $usuariosDao = new UsuariosDAO();
                    $respuesta = $usuariosDao -> actualizarUsuariosModelo($datos, 'usuarios');

                    if ($respuesta == "success") {
                        header("location:" . SERVERURL . "usuarios/editarUsuarios/" . $_POST['id'] . "/okUp");
                    } else {
                        header("location:" . SERVERURL . "usuarios/editarUsuarios/" . $_POST['id'] . "/erUp");
                    }
                }
            }
        }


        //Eliminar algun usuario
        ///////////////////////////////////////////

        public function eliminarUsuariosControlador($id){
            
            if (isset($id)) {
                $usuariosDao = new UsuariosDAO();
                $respuesta = $usuariosDao -> eliminarUsuariosModelo($id);
        
                return $respuesta;
                if ($respuesta == "success") {
                    header("location:" . SERVERURL . "usuarios/consultarUsuarios/okdel");
                } else {
                    header("location:" . SERVERURL . "usuarios/consultarUsuarios/errdel");
                }
            }

        }


        //// Validacion en Ajax

        public function validarUsuariosControlador ($identificacion) {
            $usuariosDao = new UsuariosDAO;
            $respuesta = $usuariosDao -> validarUsuariosModelo($identificacion);
            if ($respuesta > 0) {
                return "si";
            }
            else {
                return "no";
            }
        }
    }

?>

