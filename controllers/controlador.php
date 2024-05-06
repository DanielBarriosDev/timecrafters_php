<?php
    ob_start();

    class Controlador {

        function cargarTemplate () {
            // include 'views/template.php';
            include 'views/modules/login.php';
        }

        public function enlacesPaginasControlador() {
            if (isset($_GET["action"])) {
                if (isset($enlace) && count($enlace) > 1) {
                    unset ($enlace);
                }
                $enlace = explode("/", $_GET["action"]);
            }
            else {
                $enlace[0] = "login";
                $enlace[1] = "home";
            }
            
            
            $enlacesPaginasModelo = new EnlacesPaginasModelo();
            $respuesta = $enlacesPaginasModelo -> enlacesPaginas($enlace);
            // echo $respuesta; 
            include ($respuesta);
        }
    }

    class Controladord {

        function cargarTemplate () {
            include 'views/template.php';
            // include 'views/modules/template.php';
        }

        public function enlacesPaginasControladord() {
            if (isset($_GET["action"])) {
                if (isset($enlace) && count($enlace) > 1) {
                    unset ($enlace);
                }
                $enlace = explode("/", $_GET["action"]);
            }
            else {
                $enlace[0] = "dashboard";
                // $enlace[1] = "";
            }
            
            
            $enlacesPaginasModelo = new EnlacesPaginasModelo();
            $respuesta = $enlacesPaginasModelo -> enlacesPaginas($enlace);
            // echo $respuesta; 
            include ($respuesta);
        }
    }
?>