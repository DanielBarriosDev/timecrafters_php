<?php

    if(!file_exists("config/conexion.php")){
        require_once '../../../config/conexion.php';
    }
    else{
        require_once 'config/conexion.php';
    }

    class RolesUsuariosDAO extends Conexion {

        public function registrarRolesUsuariosModelo ($datos) {

            $sql = "INSERT into roles_usuarios (roles_usuarios_usuarios_id, roles_usuarios_roles_id) value (:id, :roles) ";

            try {
                $conexion = new Conexion();
                $stmt = $conexion -> conectar() -> prepare($sql);

                $contador = 0;

                foreach ($datos['roles'] as $key => $valor) {
                    $stmt -> bindParam(':id', $datos['id'], PDO::PARAM_INT);
                    $stmt -> bindParam(':roles', $valor, PDO::PARAM_INT);

                    if ($stmt -> execute()) {
                        $contador++;
                    }
                }

                if ($contador == count($datos['roles'])) {
                    return "success"    ;
                    $conexion = null;
                    $stmt = null;
                } 
                else {
                    return "error";
                }
                
            } catch (\Throwable $th) {
                return $th  -> getTraceAsString();
            }
        }

        public function listarRolesUsuariosModelo () {
            $sql = "SELECT ru.roles_usuarios_id,
                            ru.roles_usuarios_fecha_asignacion,
                            ru.roles_usuarios_fecha_cancelacion,
                            ru.roles_usuarios_estado,
                            u.usuarios_nombres,
                            u.usuarios_apellidos,
                            u.usuarios_identificacion,
                            r.roles_nombre
                    FROM roles_usuarios ru
                    INNER JOIN usuarios u ON ru.roles_usuarios_usuarios_id = u.usuarios_id
                    INNER JOIN roles r ON ru.roles_usuarios_roles_id = r.roles_id 
                    ORDER BY u.usuarios_nombres";

            try {
                $conexion = new Conexion();
                $stmt = $conexion -> conectar() -> prepare($sql);
                $stmt -> execute();

                return $stmt -> fetchAll();

                $conexion = null;
                $stmt = null;

            } catch (\Throwable $th) {
                echo $th  -> getTraceAsString();
            }
        }

        public function listarRolesUsuariosBusquedaModelo ($busqueda) {
            $sql = "SELECT ru.roles_usuarios_id,
                            ru.roles_usuarios_fecha_asignacion,
                            ru.roles_usuarios_fecha_cancelacion,
                            ru.roles_usuarios_estado,
                            u.usuarios_nombres,
                            u.usuarios_apellidos,
                            u.usuarios_identificacion,
                            r.roles_nombre
                    FROM roles_usuarios ru
                    INNER JOIN usuarios u ON ru.roles_usuarios_usuarios_id = u.usuarios_id
                    INNER JOIN roles r ON ru.roles_usuarios_roles_id = r.roles_id 
                    WHERE u.usuarios_nombres LIKE '%$busqueda%'
                        OR u.usuarios_apellidos LIKE '%$busqueda%'
                        OR r.roles_nombre LIKE '%$busqueda%'
                    ORDER BY u.usuarios_nombres";

            try {
                $conexion = new Conexion();
                $stmt = $conexion -> conectar() -> prepare($sql);
                $stmt -> execute();

                return $stmt -> fetchAll();

                $conexion = null;
                $stmt = null;

            } catch (\Throwable $th) {
                echo $th  -> getTraceAsString();
            }
        }

        public function listarRolesUsuariosByIdModelo ($id) {
            $sql = "SELECT ru.roles_usuarios_id,
                            ru.roles_usuarios_fecha_asignacion,
                            ru.roles_usuarios_fecha_cancelacion,
                            ru.roles_usuarios_estado,
                            u.usuarios_nombres,
                            u.usuarios_apellidos,
                            u.usuarios_identificacion,
                            r.roles_nombre
                    FROM roles_usuarios ru
                    INNER JOIN usuarios u ON ru.roles_usuarios_usuarios_id = u.usuarios_id
                    INNER JOIN roles r ON ru.roles_usuarios_roles_id = r.roles_id 
                    WHERE ru.roles_usuarios_id = :id";

            try {
                $conexion = new Conexion();
                $stmt = $conexion -> conectar() -> prepare($sql);
                $stmt -> bindParam(":id", $id, PDO::PARAM_INT);
                $stmt -> execute();

                return $stmt -> fetch();

                $conexion = null;
                $stmt = null;
            } catch (\Throwable $th) {
                echo $th -> getTraceAsString();
            }
        }

    }

?>