<?php

    if(!file_exists("config/conexion.php")){
        require_once '../../../config/conexion.php';
    }
    else{
        require_once 'config/conexion.php';
    }

    class LoginDAO extends Conexion {
        
        public function generarPasswordDefecto($usuario_id) {
            // Implementar la lógica para generar contraseñas por defecto seguras
            // Ejemplo:
            $password = substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789@#*.', 16)), 0, 16);
            return $password;
        }
    
        public function actualizarInformacionUsuario($usuario_id, $password_encriptada) {
            // Actualizar contraseña en la tabla login
            $sql_update_login = "UPDATE login SET login_password = '$password_encriptada' WHERE login_usuarios_id = $usuario_id";
            $this->conectar()->query($sql_update_login);
    
            // Insertar información en la tabla login (opcional)
            $sql_insert_login = "INSERT INTO login (login_usuarios_id, login_password, login_intentos) VALUES ($usuario_id, '$password_encriptada', 0)";
            $this->conectar()->query($sql_insert_login);
        }
    
        // Obtener todos los usuarios
        public function obtenerUsuarios() {
            $sql = "SELECT usuarios_id FROM usuarios";
            $result = $this->conectar()->query($sql);
    
            if ($result->num_rows > 0) {
                $usuarios = [];
                while ($row = $result->fetch_assoc()) {
                    $usuarios[] = $row;
                }
                return $usuarios;
            } else {
                return null; // Or an empty array
            }
        }
    } 

?>