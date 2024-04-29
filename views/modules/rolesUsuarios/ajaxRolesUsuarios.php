<?php
    include_once '../../../controllers/rolesUsuariosControlador.php';
    include_once '../../../models/rolesUsuariosDAO.php';

    class AjaxRolesUsuarios {

        public $url;
        public $id;
        public $ope;

        public function eliminarRolesUsuarios () {
            $rolesUsuariosControlador = new RolesUsuariosControlador();
            $respuesta = $rolesUsuariosControlador -> eliminarRolesUsuariosControlador($this -> id);
            print $respuesta;
        }


    }

    $ajaxRolesUsuarios = new AjaxRolesUsuarios();

    if (isset($_POST['id']) && isset($_POST['ope'])) {
        $ajaxRolesUsuarios -> id = $_POST['id'];
        $ajaxRolesUsuarios -> ope = $_POST['ope'];
        $ajaxRolesUsuarios -> eliminarRolesUsuarios();
    }



?>