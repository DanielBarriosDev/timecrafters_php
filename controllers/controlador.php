<?php
    ob_start();

    class Controlador {

        function cargarTemplate () {
            include 'views/template.php';
            // include 'views/login.php';
        }

        public function enlacesPaginasControlador() {
            if (isset($_GET["action"])) {
                if (isset($enlace) && count($enlace) > 1) {
                    unset ($enlace);
                }
                $enlace = explode("/", $_GET["action"]);
            }
            else {
                $enlace[0] = "";
                $enlace[1] = "inicio";
            }
            
            
            $enlacesPaginasModelo = new EnlacesPaginasModelo();
            $respuesta = $enlacesPaginasModelo -> enlacesPaginas($enlace);
            // echo $respuesta; 
            include ($respuesta);
        }
    }
?>