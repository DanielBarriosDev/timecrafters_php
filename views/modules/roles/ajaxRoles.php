<?php
    include_once '../../../controllers/rolesControlador.php';
    include_once '../../../models/rolesDAO.php';

    class AjaxRoles {
        public $url;
        public $id;
        public $ope;

        public function eliminarRoles () {
            $rolesControlador = new RolesControlador;
            $respuesta = $rolesControlador -> eliminarRolesControlador($this -> id);
            print $respuesta;
        }
    }

    $ajaxRoles = new AjaxRoles();

    if (isset($_POST['id']) && isset($_POST['ope'])) {
        $ajaxRoles -> id = $_POST['id']; 
        $ajaxRoles -> ope = $_POST['ope'];
        $ajaxRoles -> eliminarRoles(); 

    }


?>