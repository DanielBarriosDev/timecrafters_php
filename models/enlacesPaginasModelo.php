<?php
    class EnlacesPaginasModelo {

        public static function enlacesPaginas($enlace) {
            
            if (count($enlace) == 1) {
                $modulo = "views/modules/" . $enlace[0] . ".php";
            }
            else {
                $modulo = "views/modules/" . $enlace[0] . "/" . $enlace[1] . ".php";
            }
            if (!file_exists(($modulo))) {
                $modulo = "views/modules/inicio.php";
            }
            return $modulo;
        }
    }

?>