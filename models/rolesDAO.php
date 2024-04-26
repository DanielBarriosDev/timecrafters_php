<?php

    if(!file_exists("config/conexion.php")){
        require_once '../../../config/conexion.php';
    }
    else{
        require_once 'config/conexion.php';
    }
    
    class RolesDAO extends Conexion {

        public function registrarRolesModelo ($datos) {
            $sql = "INSERT into roles (roles_nombre) value (:nombreRol)";

            try {
                $conexion = new Conexion();
                $stmt = $conexion -> conectar() -> prepare($sql);

                $stmt -> bindParam(":nombreRol", $datos, PDO::PARAM_STR);

                if ($stmt -> execute()) {
                    $conexion = null;
                    $stmt = null;
                    return "success";
                }
                else {
                    return "error";
                }

            } catch (\Throwable $th) {
                echo $th -> getTraceAsString();
            }
        }

        public function listarRolesModelo () {
            $sql = "SELECT roles_id, roles_nombre from roles order by roles_nombre";

            try {
                $conexion = new Conexion();
                $stmt = $conexion -> conectar() -> prepare($sql);
                $stmt -> execute();
                
                return $stmt -> fetchAll();

                $conexion = null;
                $stmt =  null;

            } catch (\Throwable $th) {
                echo $th -> getTraceAsString();
            }
        }

        public function listarRolesBusquedaModelo ($busqueda) {
            $sql = "SELECT roles_id, roles_nombre
                    FROM roles
                    WHERE roles_nombre LIKE '%$busqueda%'
                    ORDER BY roles_nombre";

            try {
                $conexion = new Conexion;
                $stmt = $conexion -> conectar() -> prepare($sql);
                $stmt -> execute();

                return $stmt -> fetchAll();

                $conexion = null;
                $stmt = null;
            } catch (\Throwable $th) {
                echo $th  -> getTraceAsString();
            }
        }

        public function listarRolesByIdModelo ($id) {
            $sql = "SELECT roles_id, roles_nombre from roles where roles_id = :id";

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

        public function actualizarRolesModelo ($datos) {
            $sql = "UPDATE roles set roles_nombre = :nombreRol where roles_id = :id";

            try {
                $conexion = new Conexion();
                $stmt = $conexion -> conectar() -> prepare($sql);

                $stmt -> bindParam(":nombreRol", $datos["nombreRol"], PDO::PARAM_STR);
                $stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);

                if ($stmt -> execute()) {
                    $conexion = null;
                    $stmt= null;
                    return "success";
                }
                else {
                    return "error";
                }
            } catch (\Throwable $th) {
                echo $th -> getTraceAsString();
            }
        }

        public function eliminarRolesModelo ($id) {
            $sql1 = "SELECT count(*) as valor from roles";
            $sql2 = "DELETE FROM roles WHERE roles_id = :id";
            
            try {
                $conexion = new Conexion();
                $stmt = $conexion -> conectar() -> prepare($sql1);

                if ($stmt -> execute()) {
                    $roles = $stmt -> fetch();
                }

                if ($roles['valor'] > 1) {
                    try {
                        $stmt = null;
                        $stmt = $conexion -> conectar() -> prepare($sql2);

                        $stmt -> bindParam(":id", $id, PDO::PARAM_INT);
                        $stmt -> execute();

                        if ($stmt -> rowCount() > 0) {
                            return "ok";
                            $conexion = null;
                            $stmt = null;

                        } else {
                            return "error";
                        }
                    } catch (\Throwable $th) {
                        //throw $th;
                    }
                } else {
                    return "error";
                }
            } catch (\Throwable $th) {
                echo $th -> getTraceAsString();
            }
        }
    }

?>
