<?php
    include_once '../../../controllers/ciudadesControlador.php';
    include_once '../../../models/ciudadesDAO.php';

    class AjaxCiudades {
        public $url;
        public $id;
        public $ope;

        public function eliminarCiudades () {
            $ciudadesControlador = new CiudadesControlador();
            $respuesta = $ciudadesControlador -> eliminarCiudadesControlador($this -> id);
            print $respuesta;
        }
    }

    $ajaxCiudades = new AjaxCiudades();

    if (isset($_POST['id']) && isset($_POST['ope'])) {
        $ajaxCiudades -> id = $_POST['id'];
        $ajaxCiudades -> ope = $_POST['ope'];
        $ajaxCiudades -> eliminarCiudades();
    }

?>