<?php

    if(!file_exists("config/conexion.php")){
        require_once '../../../config/conexion.php';
    }
    else{
        require_once 'config/conexion.php';
    }

    class CiudadesDAO extends Conexion {

        public function registrarCiudadesModelo ($datos) {
            $sql = "INSERT into ciudades (ciudades_nombre) values (:nombreCiudad)";

            try {
                $conexion = new Conexion();
                $stmt = $conexion -> conectar() -> prepare($sql);

                $stmt -> bindParam("nombreCiudad", $datos, PDO::PARAM_STR);

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

        public function listarCiudadesModelo () {
            $sql = "SELECT ciudades_id, ciudades_nombre FROM ciudades ORDER BY ciudades_nombre";

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

        public function listarCiudadesBusquedaModelo ($busqueda) {
            $sql = "SELECT ciudades_id, ciudades_nombre
                    FROM ciudades
                    WHERE ciudades_nombre LIKE '%$busqueda%'
                    ORDER BY ciudades_nombre";

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

        public function listarCiudadesByIdModelo ($id) {
            $sql = "SELECT ciudades_id, ciudades_nombre FROM ciudades WHERE ciudades_id = :id";

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

        public function actualizarCiudadesModelo($datos)
        {
            $sql = "UPDATE ciudades SET ciudades_nombre = :nombreCiudad WHERE ciudades_id = :id";


            try {
                $conexion = new Conexion();
                $stmt = $conexion->conectar()->prepare($sql);

                $stmt->bindParam(":nombreCiudad", $datos["nombreCiudad"], PDO::PARAM_STR);
                $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

                if ($stmt -> execute()) {
                    $conexion = null;
                    $stmt = null;
                    return "success";
                } else {
                    return "error";
                }
            } catch (\Throwable $th) {
                echo $th->getTraceAsString();
            }
        }

        public function eliminarCiudadesModelo($id) {
            $sql1 = "SELECT count(*) as valor FROM ciudades";
            $sql2 = "DELETE FROM ciudades WHERE ciudades_id = :id";


            try {
                $conexion = new Conexion();
                $stmt = $conexion -> conectar() -> prepare($sql1);

                if ($stmt -> execute()) {
                    $ciudades = $stmt -> fetch();
                }

                if ($ciudades['valor'] > 1) {
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
                }
                else {
                    return "error";
                }
            } catch (\Throwable $th) {
                echo $th->getTraceAsString();
            }
        }

    }



?>