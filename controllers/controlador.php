<?php
    ob_start();

    class Controlador {
    
        public function cargarTemplate($vista) {
            include 'views/' . $vista;
        }
    
        public function enlacesPaginasControlador() {
            // Obtener la acción de la URL reescrita
            $action = isset($_GET['action']) ? $_GET['action'] : '';
    
            // Manejo de rutas específicas
            if ($action === '' || $action === '/index.php') {
                $this->cargarTemplate('modules/login.php'); // Cargar login en la raíz
            } elseif ($action === 'dashboard' && isset($_SESSION['validado'])) {
                $this->cargarTemplate('dashboard.php'); // Cargar dashboard si ha iniciado sesión
            } else {
                // Manejo de otras rutas (usando EnlacesPaginasModelo)
                $enlacesPaginasModelo = new EnlacesPaginasModelo();
                $rutaVista = $enlacesPaginasModelo->enlacesPaginas(explode('/', $action)); 
                if (file_exists('views/' . $rutaVista)) {
                    $this->cargarTemplate($rutaVista);
                } else {
                    // Si la vista no existe, mostrar un error 404
                    $this->cargarTemplate('404.php'); 
                }
            }
        }
        
    }

?>