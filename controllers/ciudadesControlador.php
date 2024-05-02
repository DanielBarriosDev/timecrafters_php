<?php

    ob_start();

    class CiudadesControlador {

        public function registrarCiudadesControlador () {

            $patronNombre = '/^[A-Za-zÁáÉéÍíÓóÚúÑñÜü\s]+$/';

            if (isset($_POST["nombreCiudad"])) {

                if (!preg_match($patronNombre, $_POST["nombreCiudad"])) {
                    header("location:" . SERVERURL . "ciudades/registrarCiudades/regNom");
                    exit;
                }
                else {

                    $nombreCiudad = $_POST["nombreCiudad"];

                    $ciudadesDao = new CiudadesDAO();
                    $respuesta = $ciudadesDao -> registrarCiudadesModelo($nombreCiudad, 'ciudades');

                    if ($respuesta == "success") {
                        header("location:" . SERVERURL . "ciudades/registrarCiudades/okCiudad");
                    }
                    else {
                        header("location:" . SERVERURL . "ciudades/registrarCiudades/errorCiudad");
                    }
                    exit;
                }
            }
        }

        public function listarCiudadesControlador () {
            $ciudadesDao = new CiudadesDAO();

            if (isset($_POST['busqueda'])) {
                $busqueda = $_POST['busqueda'];
                $listado = $ciudadesDao -> listarCiudadesBusquedaModelo($busqueda);
            }
            else {
                $listado = $ciudadesDao -> listarCiudadesModelo();
            }
            return $listado;
        }

        public function listarCiudadesByIdControlador ($id) {
            $ciudadesDao = new CiudadesDAO();
            $resultado = $ciudadesDao -> listarCiudadesByIdModelo($id);
            return $resultado;
        }

        public function actualizarCiudadesControlador () {
            $patronNombre = '/^[A-Za-zÁáÉéÍíÓóÚúÑñÜü\s]+$/';

            if (isset($_POST["nombreCiudad"])) {

                if (!preg_match($patronNombre, $_POST['nombreCiudad'])) {
                    header("location:" . SERVERURL . "ciudades/editarCiudades/regNom");
                }
                else {

                    $datos = array (
                        'nombreCiudad' => $_POST['nombreCiudad'],
                        'id' => $_POST['id']
                    );

                    // $nombreCiudad = $_POST['nombreCiudad'];
                
                    $ciudadesDao = new CiudadesDAO();
                    $respuesta = $ciudadesDao -> actualizarCiudadesModelo($datos, 'ciudades');

                    if ($respuesta == "success") {
                        header("location:" . SERVERURL . "ciudades/editarCiudades/" . $_POST['id'] . "/okUp");
                    }
                    else {
                        header("location:" . SERVERURL . "ciudades/editarCiudades/"  . $_POST['id'] . "/erUp");
                    }
                }
            }
        }

        public function eliminarCiudadesControlador($id) {

            if (isset($id)) {
                $ciudadesDao = new CiudadesDAO();
                $respuesta = $ciudadesDao -> eliminarCiudadesModelo($id);

                return $respuesta;
            
                if ($respuesta == "success") {
                    header("location:" . SERVERURL . "ciudades/eliminar/okdel");
                } else {
                    header("location:" . SERVERURL . "ciudades/eliminar/errdel");
                }
            } 
        }

    }
?>