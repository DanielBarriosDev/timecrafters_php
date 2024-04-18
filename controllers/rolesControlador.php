<?php
    ob_start();
    class RolesControlador {

        public function registarRolesControlador () {
            
            $patronNombre = '/^[A-Za-zÁáÉéÍíÓóÚúÑñÜü\s]+$/';
            
            if (isset($_POST["nombreRol"])) {

                if (!preg_match($patronNombre, $_POST["nombreRol"])) {
                    header("location:" . SERVERURL . "roles/registrarRoles/regNom");
                    exit;
                }
                else {

                    $nombreRol = $_POST["nombreRol"];

                    $rolesDao = new RolesDAO();
                    $respuesta = $rolesDao -> registrarRolesModelo($nombreRol, 'roles');

                    if ($respuesta == "success") {
                        header("location:" . SERVERURL . "roles/registrarRoles/okRol");
                    }
                    else {
                        header("location:" . SERVERURL . "roles/registrarRoles/errorRol");
                    }
                    exit;

                }
            }
        }

        public function listarRolesControlador () {
            $rolesDao = new RolesDAO();

            if (isset($_POST['busqueda'])) {
                $busqueda = $_POST['busqueda'];
                $listado = $rolesDao -> listarRolesBusquedaModelo($busqueda);
            }
            else {
                $listado = $rolesDao -> listarRolesModelo();
            }
            return $listado;
        }

        public function listarRolesByIdControlador ($id) {
            $rolesDao = new RolesDAO();
            $resultado = $rolesDao -> listarRolesByIdModelo($id);
            return $resultado;
        }

        public function actualizarRolesControlador () {
            $patronNombre = '/^[A-Za-zÁáÉéÍíÓóÚúÑñÜü\s]+$/';

            if (!preg_match($patronNombre, $_POST['nombreRol'])) {
                header("location:" . SERVERURL . "roles/editarRoles/regNom");
            }
            else {

                $datos = array (
                    'nombreRol' => $_POST['nombreRol'],
                    'id' => $_POST['id']
                );

                $rolesDao = new RolesDAO();
                $respuesta = $rolesDao -> actualizarRolesModelo($datos, 'roles');

                if ($respuesta == "success") {
                    header("location:" . SERVERURL . "roles/editarRoles/" . $_POST['id'] . "/okUp");
                }
                else {
                    header("location:" . SERVERURL . "roles/editarRoles/" . $_POST['id'] . "/erUp");
                }
            }

        }

        public function eliminarRolesControlador ($id) {

            if (isset($id)) {
                $rolesDao = new RolesDAO();
                $respuesta = $rolesDao -> eliminarRolesModelo($id);

                return $respuesta;

                if ($respuesta == "success") {
                    header("location" . SERVERURL . "roles/eliminar/okdel");
                }
                else {
                    header("location:" . SERVERURL . "roles/eliminar/errdel");
                }
            }
        }


    }
?>