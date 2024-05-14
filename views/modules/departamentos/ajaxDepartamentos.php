<?php
    include_once '../../../controllers/departamentosControlador.php';
    include_once '../../../models/departamentosDAO.php';

    class AjaxDepartamentos {
        public $url;
        public $id;
        public $ope;

        public function eliminarDepartamentos () {
            $departamentosControlador = new DepartamentosControlador();
            $respuesta = $departamentosControlador -> eliminarDepartamentosControlador($this -> id);
            print $respuesta;
        }
    }

    $ajaxDepartamentos = new AjaxDepartamentos();

    if (isset($_POST['id']) && isset($_POST['ope'])) {
        $ajaxDepartamentos -> id = $_POST['id'];
        $ajaxDepartamentos -> ope = $_POST['ope'];
        $ajaxDepartamentos -> eliminarDepartamentos();
    }

?>