<?php

    if(!file_exists("config/conexion.php")){
        require_once '../../../config/conexion.php';
    }
    else{
        require_once 'config/conexion.php';
    }

    class DepartamentosDAO extends Conexion {
        
        public function registrarDepartamentosModelo ($datos) {
            $sql = "INSERT into departamentos (departamentos_nombre) value (:nombreDepartamento)";

            try {
                $conexion = new Conexion();
                $stmt = $conexion -> conectar() -> prepare($sql);

                $stmt -> bindParam(":nombreDepartamento", $datos, PDO::PARAM_STR);

                if ($stmt -> execute()) {
                    $conexion = null;
                    $conexion = null;
                    return "success";
                } else {
                    return "error";
                }
            } catch (\Throwable $th) {
                echo $th -> getTraceAsString();
            }
        }

        public function listarDepartamentosModelo () {
            $sql = "SELECT departamentos_id, departamentos_nombre FROM departamentos ORDER BY departamentos_nombre";

            try {
                $conexion = new Conexion();
                $stmt = $conexion -> conectar() -> prepare($sql);
                $stmt -> execute();

                return $stmt -> fetchAll();

                $conexion= null;
                $stmt = null;

            } catch (\Throwable $th) {
                echo $th -> getTraceAsString();
            }
        }

        public function listarDepartamentosBusquedaModelo ($busqueda) {
            $sql = "SELECT departamentos_id, departamentos_nombre
                    FROM departamentos
                    WHERE departamentos_nombre LIKE '%$busqueda%'
                    ORDER BY departamentos_nombre";

            try {
                $conexion = new Conexion();
                $stmt = $conexion -> conectar() -> prepare($sql);
                $stmt -> execute();

                return $stmt -> fetchAll();

                $conexion = null;
                $stmt = null;

            } catch (\Throwable $th) {
                echo $th -> getTraceAsString();
            }
        }

        public function listarDepartamentosByIdModelo ($id) {
            $sql = "SELECT departamentos_id, departamentos_nombre FROM departamentos WHERE departamentos_id = :id";

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

        public function actualizarDepartamentosModelo ($datos) {
            $sql = "UPDATE departamentos SET departamentos_nombre = :nombreDepartamento WHERE departamentos_id = :id";

            try {
                $conexion = new Conexion();
                $stmt = $conexion -> conectar() -> prepare($sql);

                $stmt -> bindParam(":nombreDepartamento", $datos["nombreDepartamento"], PDO::PARAM_STR);
                $stmt -> bindParam("id", $datos["id"], PDO::PARAM_INT);

                if ($stmt -> execute()) {
                    $conexion = null;
                    $stmt = null;
                    return "success";
                } else {
                    return "error";
                }
            } catch (\Throwable $th) {
                echo $th -> getTraceAsString();
            }
        }

        public function eliminarDepartamentosModelo ($id) {
            $sql1 = "SELECT count(*) as valor FROM departamentos";
            $sql2 = "DELETE FROM departamentos WHERE departamentos_id = :id";

            try {
                $conexion = new Conexion();
                $stmt = $conexion -> conectar() -> prepare($sql1);

                if ($stmt -> execute()) {
                    $departamentos = $stmt -> fetch();
                }

                if ($departamentos['valor'] > 1) {
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