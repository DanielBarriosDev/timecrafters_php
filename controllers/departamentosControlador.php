<?php 

    ob_start();

    class DepartamentosControlador {

        public function registrarDepartamentosControlador () {

            $patronNombre = '/^[A-Za-zÁáÉéÍíÓóÚúÑñÜü\s]+$/';

            if (isset($_POST["nombreDepartamento"])) {

                if (!preg_match($patronNombre, $_POST["nombreDepartamento"])) {
                    header("location:" . SERVERURL . "departamentos/registrarDepartamentos/regNom");
                    exit;
                } else {

                    $nombreDepartamento = $_POST["nombreDepartamento"];

                    $departamentosDao = new DepartamentosDAO();
                    $respuesta = $departamentosDao -> registrarDepartamentosModelo($nombreDepartamento, 'departamentos');

                    if ($respuesta == "success") {
                        header("location:" . SERVERURL . "departamentos/registrarDepartamentos/okDepartamento");
                    }
                    else {
                        header("location:" . SERVERURL . "departamentos/registrarDepartamentos/errorDepartamento"); 
                    }
                    exit;
                }
            }
        }

        public function listarDepartamentosControlador () {
            $departamentosDao = new DepartamentosDAO();

            if (isset($_POST['busqueda'])) {
                $busqueda = $_POST['busqueda'];
                $listado = $departamentosDao -> listarDepartamentosBusquedaModelo($busqueda);
            } else {
                $listado = $departamentosDao -> listarDepartamentosModelo();
            }
            return $listado;
        }

        public function listarDepartamentosByIdControlador ($id) {
            $departamentosDao = new DepartamentosDAO();
            $resultado = $departamentosDao -> listarDepartamentosByIdModelo($id);
            return $resultado;
        }

        public function actualizarDepartamentosControlador () {
            $patronNombre = '/^[A-Za-zÁáÉéÍíÓóÚúÑñÜü\s]+$/';

            if (isset($_POST['nombreDepartamento'])) {

                if (!preg_match($patronNombre, $_POST['nombreDepartamento'])) {
                    header("location:" . SERVERURL . "departamentos/registrarDepartamentos/regNom");
                }
                else {

                    $datos = array (
                        'nombreDepartamento' => $_POST['nombreDepartamento'],
                        'id' => $_POST['id']
                    );

                    $departamentosDao = new DepartamentosDAO();
                    $respuesta = $departamentosDao -> actualizarDepartamentosModelo($datos, 'departamentos');

                    if ($respuesta == "success") {
                        header("location:" . SERVERURL . "departamentos/editarDepartamentos/" . $_POST['id'] . "/okUp");
                    }
                    else {
                        header("location:" . SERVERURL . "departamentos/editarDepartamentos/"  . $_POST['id'] . "/erUp");
                    }
                }
            }
        }

        public function eliminarDepartamentosControlador ($id) {

            if (isset($id)) {
                $departamentosDao = new DepartamentosDAO();
                $respuesta = $departamentosDao -> eliminarDepartamentosModelo($id);

                return $respuesta;

                if ($respuesta == "success") {
                    header("location:" . SERVERURL . "departamentos/eliminar/okdel");
                } else {
                    header("location:" . SERVERURL . "departamentos/eliminar/errdel");
                }
            }
        }

    }
?>