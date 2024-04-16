<?php

    require_once 'config/conexion.php';

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
            $sql = "SELECT ciudades_id, ciudades_nombre from ciudades order by ciudades_nombre";

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

        public function listarCiudadesByIdModelo ($id) {
            $sql = "SELECT ciudades_id, ciudades_nombre from ciudades where ciudades_id = :id";

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
            $sql = "DELETE FROM ciudades WHERE ciudades_id = :id";
        
            try {
                $conexion = new Conexion();
                $stmt = $conexion->conectar()->prepare($sql);
                $stmt->bindParam(":id", $id, PDO::PARAM_INT);
                
                if ($stmt->execute()) {
                    return "success";
                } else {
                    return "error";
                }
            } catch (\Throwable $th) {
                // Manejar el error, por ejemplo, lanzar una excepción o registrar el error en un archivo de registro
                return "error";
            }
        }

    }



?>