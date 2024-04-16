<?php
    class Conexion {
        public function conectar() {
            $pdo = new PDO("mysql:host=localhost; dbname=bd_timecrafters", "root", "123456789");
            return $pdo;
        }   
    }

    $conexion = new Conexion();
    $conexion -> conectar();

?>