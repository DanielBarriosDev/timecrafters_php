<?php
    include_once '../../../controllers/loginControlador.php';
    include_once '../../../models/loginDAO.php';

    class AjaxLogin {
        public $url;
        public $id;
        public $ope;

        public function eliminarLogin () {
            $loginControlador = new LoginControlador();
            $respuesta = $loginControlador -> eliminarLoginControlador($this -> id);
            print $respuesta;
        }
    }

    $ajaxLogin = new AjaxLogin();

    if (isset($_POST['id']) && isset($_POST['ope'])) {
        $ajaxLogin -> id = $_POST['id']; 
        $ajaxLogin -> ope = $_POST['ope'];
        $ajaxLogin -> eliminarLogin(); 

    }


?>