<?php
    ob_start();

    class RolesUsuariosControlador {

        public function registrarRolesUsuariosControlador () {

            $patronNombre = '/^[A-Za-zÁáÉéÍíÓóÚúÑñÜü\s]+$/';
            $patronFecha = '/^\d{4}\-\d{2}\-\d{2}$/';

            if (isset($_POST['fechaAsignacion']) && isset($_POST['fechaCancelacion']) && 
                isset($_POST['roles']) && isset($_POST['estadoRol'])) {

                // if (!preg_match($patronFecha, $_POST['fechaAsignacion'] )) {
                //     header("location:" . SERVERURL . "usuariosRoles/asignarRolesUsuarios/regFechaAsig");
                //     exit;
                // }
                // else if (!preg_match($patronFecha, $_POST['fechaCancelacion'])) {
                //     header("location:" . SERVERURL . "usuariosRoles/asignarRolesUsuarios/regFechaCan");
                //     exit;
                // }
                // else if (!preg_match($patronNombre, $_POST['roles'])) {
                //     header("location:" . SERVERURL . "usuariosRoles/asignarRolesUsuarios/regRoles");
                //     exit;
                // }
                // else if (!preg_match($patronFecha, $_POST['estadoRol'])) {
                //     header("location:" . SERVERURL . "usuariosRoles/asignarRolesUsuarios/regEstadoRol");
                //     exit;
                // }
                // else {

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
                // }

            }
        }

        public function listarRolesUsuariosControlador () {
            $rolesUsuariosDao = new RolesUsuariosDAO;

            if (isset($_POST['busqueda'])) {
                $busqueda = $_POST['busqueda'];
                $listado = $rolesUsuariosDao -> listarRolesUsuariosModelo($busqueda);
            }
            else {
                $listado = $rolesUsuariosDao -> listarRolesUsuariosModelo();
            }

            return $listado;
        }

    }

?>