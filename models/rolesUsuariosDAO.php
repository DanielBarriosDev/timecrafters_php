<?php

    if(!file_exists("config/conexion.php")){
        require_once '../../../config/conexion.php';
    }
    else{
        require_once 'config/conexion.php';
    }

    class RolesUsuariosDAO extends Conexion {

        public function registrarRolesUsuariosModelo ($datos) {
            $sql = "INSERT into roles_usuarios
                                (roles_usuarios_fecha_asignacion, 
                                roles_usuarios_fecha_cancelacion,
                                roles_usuarios_estado, 
                                roles_usuarios_usuarios_id, 
                                roles_usuarios_roles_id)
                    value (:fechaAsignacion, :fechaCancelacion, :estadoRol, :id, :roles)";

            try {
                $conexion = new Conexion();
                $stmt = $conexion -> conectar() -> prepare($sql);

                $stmt -> bindParam(':fechaAsignacion', $datos['fechaAsignacion'], PDO::PARAM_STR);
                $stmt -> bindParam(':fechaCancelacion', $datos['fechaCancelacion'], PDO::PARAM_STR);
                $stmt -> bindParam(':estadoRol', $datos['estadoRol'], PDO::PARAM_STR);
                $stmt -> bindParam(':id', $datos['id'], PDO::PARAM_INT);
                $stmt -> bindParam('roles', $datos['roles'], PDO::PARAM_INT);

                if ($stmt -> execute()) {
                    return "success";
                    $conexion = null;
                    $stmt = null;
                }
                else {
                    return "error";
                }

            } catch (\Throwable $th) {
                echo $th  -> getTraceAsString();
            }
        }

    }

?>