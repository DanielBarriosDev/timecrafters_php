<?php
    include_once '../../../controllers/usuariosControlador.php';
    include_once '../../../models/usuariosDAO.php';

    class AjaxUsuarios {

        public $url;
        public $id;
        public $ope;


        public function eliminarUsuarios () {
            $usuariosControlador = new UsuariosControlador();
            $respuesta = $usuariosControlador -> eliminarUsuariosControlador($this -> id);
            print $respuesta;
        }


    }


    $ajaxUsuarios = new AjaxUsuarios();

    if (isset($_POST['id']) && isset($_POST['ope'])) {
        $ajaxUsuarios -> id = $_POST['id'];
        $ajaxUsuarios -> ope = $_POST['ope'];
        $ajaxUsuarios -> eliminarUsuarios() ;
    } 


?>