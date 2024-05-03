<?php

    if(!file_exists("config/conexion.php")){
        require_once '../../../config/conexion.php';
    }
    else{
        require_once 'config/conexion.php';
    }

    class LoginDAO extends Conexion {

        public function ingresarLoginModelo ($datos) {

            $sql = "SELECT l.login_password,
                            l.login_intentos,
                            u.usuarios_identificacion
                    FROM login l
                    INNER JOIN usuarios u ON l.login_usuarios_id = u.usuarios_id
                    WHERE u.usuario_identificacion = ':usuario'";

            try {
                $conexion = new Conexion();
                $stmt = $conexion -> conectar() -> prepare($sql);
                $stmt -> bindParam(":usuario", $datos['usuario'], PDO::PARAM_STR);
                

                if ($stmt -> execute()) {
                    return $stmt -> fetch();
                    $conexion = null;
                    $stmt = null;
                } else {
                    return "error";
                }
            } catch (\Throwable $th) {
                echo $th  -> getTraceAsString();
            }
        }
        
    
        public function registrarPasswordModelo($usuariosId, $passwordEncriptada) {

            $sql = "INSERT INTO login (login_password, login_usuarios_id) VALUES (:passwordEncriptada, :usuariosId)";

            try {
                $conexion = new Conexion();
                $stmt = $conexion -> conectar() -> prepare($sql);

                $stmt->bindParam(':passwordEncriptada', $passwordEncriptada, PDO::PARAM_STR);
                $stmt->bindParam(':usuariosId', $usuariosId, PDO::PARAM_INT);
        
                if ($stmt -> execute()) {
                    $conexion = null;
                    $stmt = null;
                    return"success";
                } else {
                    return "error";
                }

            } catch (\Throwable $th) {
                echo $th  -> getTraceAsString();

            }
        }

        public function listarLoginModelo () {
            $sql = "SELECT l.login_id,
                            l.login_password,
                            l.login_intentos,
                            u.usuarios_id,
                            u.usuarios_nombres,
                            u.usuarios_apellidos,
                            u.usuarios_identificacion
                    FROM login l
                    INNER JOIN usuarios u ON l.login_usuarios_id = u.usuarios_id
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

        public function listarLoginBusquedaModelo ($busqueda) {
            $sql = "SELECT l.login_id,
                            l.login_password,
                            l.login_intentos,
                            u.usuarios_id,
                            u.usuarios_nombres,
                            u.usuarios_apellidos,
                            u.usuarios_identificacion
                    FROM login l
                    INNER JOIN usuarios u ON l.login_usuarios_id = u.usuarios_id
                    WHERE u.usuarios_nombres LIKE '%$busqueda%'
                        OR u.usuarios_apellidos LIKE '%$busqueda%'
                        OR u.usuarios_identificacion LIKE '%$busqueda%'
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

        public function listarLoginByIdModelo ($usuariosId) {
            $sql = "SELECT l.login_id,
                            l.login_password,
                            l.login_intentos,
                            u.usuarios_id,
                            u.usuarios_nombres,
                            u.usuarios_apellidos,
                            u.usuarios_identificacion
                    FROM login l
                    INNER JOIN usuarios u ON l.login_usuarios_id = u.usuarios_id
                    WHERE u.usuarios_id = :usuariosId";

            try {
                $conexion = new Conexion();
                $stmt = $conexion -> conectar() -> prepare($sql);
                $stmt -> bindParam(':usuariosId', $usuariosId, PDO::PARAM_INT);
                $stmt -> execute();

                return $stmt -> fetch();

                $conexion = null;
                $stmt = null;

            } catch (\Throwable $th) {
                echo $th -> getTraceAsString();
            }
        }


        public function eliminarLoginModelo ($id) {
            $sql1 = "SELECT count(*) as valor FROM login";
            $sql2 = "DELETE FROM login WHERE login_id = :id";
            
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