<?php
    class EnlacesPaginasModelo {

        /*public static function enlacesPaginas($enlace) {
            // Verificar si la ruta existe en modules
            $rutaModules = 'modules/' . $enlace[0] . '.php';
            if (file_exists('views/' . $rutaModules)) {
                return $rutaModules;
            }
    
            // Verificar si la ruta existe en modules con subdirectorio
            if (isset($enlace[1])) {
                $rutaSubmodulo = 'modules/' . $enlace[0] . '/' . $enlace[1] . '.php';
                if (file_exists('views/' . $rutaSubmodulo)) {
                    return $rutaSubmodulo;
                }
            }
    
            // Verificar si la ruta es inicio o salir
            if ($enlace[0] === 'inicio' || $enlace[0] === 'salir') {
                return $enlace[0] . '.php';
            }
    
            // Si no existe en ninguna parte, redirigir a una página de error (404)
            return '404.php'; 
        }*/

        public static function enlacesPaginas($enlace) {
            // Verificar si la ruta existe en modules
            $rutaModules = 'modules/' . $enlace[0] . '.php'; 
            if (file_exists('views/' . $rutaModules)) {
                return $rutaModules;
            }
    
            // Verificar si la ruta existe en modules con subdirectorio
            // if (isset($enlace[1])) {
            //     $rutaSubmodulo = 'modules/' . $enlace[0] . '/' . $enlace[1] . '.php';
            //     if (file_exists('views/' . $rutaSubmodulo)) {
            //         return $rutaSubmodulo;
            //     }
            // }
    
            // Si no existe en modules, buscar en views
            $rutaViews = $enlace[0] . '.php';
            if (file_exists('views/' . $rutaViews)) {
                return $rutaViews;
            }
            
            // Si no existe en ninguna parte, redirigir a una página de error (404)
            return '404.php'; 
        }
    }

?>