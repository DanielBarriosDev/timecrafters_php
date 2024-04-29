<?php
    ob_start();

    class RolesUsuariosControlador {

        public function registrarRolesUsuariosControlador () {

            $patronNombre = '/^[A-Za-zÁáÉéÍíÓóÚúÑñÜü\s]+$/';
            $patronID = '/^\d+$/';

            if (isset($_POST['roles']) && isset($_POST['estadoRol'])) {

                foreach ($_POST['roles'] as $rol) {
                    if (!preg_match($patronID, $rol)) {
                        header("location:" . SERVERURL . "usuariosRoles/asignarRolesUsuarios/regRoles");
                        exit;
                    }
                }
                if (!preg_match($patronNombre, $_POST['estadoRol'])) {
                    header("location:" . SERVERURL . "usuariosRoles/asignarRolesUsuarios/regEstadoRol");
                    exit;
                }
                else {

                    $datos = array(
                        'id' => $_POST['id'],
                        'roles' => $_POST['roles']
                    );

                    $rolesUsuariosDao = new RolesUsuariosDAO();
                    $respuesta = $rolesUsuariosDao -> registrarRolesUsuariosModelo($datos, 'roles_usuarios');

                    if ($respuesta == "success") {
                        header("location:" . SERVERURL . "rolesUsuarios/asignarRolesUsuarios/okAsignacion");
                    }
                    else {
                        header("location:" . SERVERURL . "rolesUsuarios/asignarRolesUsuarios/errAsignacion/");
                    }
                }

            }
        }

        public function listarRolesUsuariosControlador () {
            $rolesUsuariosDao = new RolesUsuariosDAO;

            if (isset($_POST['busqueda'])) {
                $busqueda = $_POST['busqueda'];
                $listado = $rolesUsuariosDao -> listarRolesUsuariosBusquedaModelo($busqueda);
            }
            else {
                $listado = $rolesUsuariosDao -> listarRolesUsuariosModelo();
            }

            return $listado;
        }


        public function listarRolesUsuariosByIdControlador ($id) {
            $rolesUsuariosDao = new RolesUsuariosDAO();
            $resultado = $rolesUsuariosDao -> listarRolesUsuariosByIdModelo($id);
            return $resultado;
        }

        public function actualizarRolesUsuariosControlador () {
            $patronNombre = '/^[A-Za-zÁáÉéÍíÓóÚúÑñÜü\s]+$/';
            $patronID = '/^\d+$/';

            if (isset($_POST['id']) && isset($_POST['estadoRol'])) {

                foreach ($_POST['id'] as $rol) {
                    if (!preg_match($patronID, $rol)) {
                        header("location:" . SERVERURL . "usuariosRoles/editarRolesUsuarios/regID");
                        exit;
                    }
                }
                if (!preg_match($patronNombre, $_POST['estadoRol'])) {
                    header("location:" . SERVERURL . "usuariosRoles/editarRolesUsuarios/regEstadoRol");
                    exit;
                }
                else {

                    $datos = array(
                        'id' => $_POST['id'],
                        'estadoRol' => $_POST['estadoRol']
                    );

                    $rolesUsuariosDao = new RolesUsuariosDAO();
                    $respuesta = $rolesUsuariosDao -> actualizarRolesUsuariosModelo($datos, 'roles_usuarios');

                    if ($respuesta == "success") {
                        header("location:" . SERVERURL . "rolesUsuarios/editarRolesUsuarios/" . $_POST['id'] . "/okUp");
                    }
                    else {
                        header("location:" . SERVERURL . "rolesUsuarios/editarRolesUsuarios/" . $_POST['id'] . "/erUp");
                    }
                }

            }
        }

        public function eliminarRolesUsuariosControlador ($id) {

            if (isset($id)) {
                $rolesUsuariosDao = new RolesUsuariosDAO();
                $respuesta = $rolesUsuariosDao -> eliminarRolesUsuariosModelo($id);

                return $respuesta;

                if ($respuesta == "success") {
                    header("location:" . SERVERURL . "rolesUsuarios/consultarRolesUsuarios/okdel");
                }
                else {
                    header("location:" . SERVERURL . "rolesUsuarios/consultarRolesUsuarios/errdel");
                }
            }
        }

    }

?>