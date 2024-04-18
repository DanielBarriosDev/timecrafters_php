<?php
    
    if(!file_exists("config/conexion.php")){
        require_once '../../../config/conexion.php';
    }
    else{
        require_once 'config/conexion.php';
    }

    class UsuariosDAO extends Conexion {

        // Metodo para insertar usuarios en la BD
        ///////////////////////////////////////////

        public function registrarUsuariosModelo($datos) {
            
            $sql = "INSERT into usuarios
                    (usuarios_nombres, usuarios_apellidos, usuarios_tipo_identificacion, usuarios_identificacion, usuarios_correo, usuarios_estado, usuarios_ciudades_id)
                    values (:nombres, :apellidos, :tipoIdentificacion, :identificacion, :correo, :estado, :ciudades)";

            try {
                $conexion = new Conexion();
                $stmt = $conexion -> conectar() -> prepare($sql);

                $stmt -> bindParam(":nombres", $datos["nombres"], PDO::PARAM_STR);
                $stmt -> bindParam(":apellidos", $datos["apellidos"], PDO::PARAM_STR);
                $stmt -> bindParam(":tipoIdentificacion", $datos["tipoIdentificacion"], PDO::PARAM_STR);
                $stmt -> bindParam(":identificacion", $datos["identificacion"], PDO::PARAM_INT);
                $stmt -> bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
                $stmt -> bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
                $stmt -> bindParam(":ciudades", $datos["ciudades"], PDO::PARAM_INT);


                if ($stmt -> execute()) {
                    $conexion = null;
                    $stmt = null;
                    return "success";
                } else {
                    return "error";
                }
            } catch (\Throwable $th) {
                print "<p>Falló</p>";
            }
           
        }


        //Listar todos los usuarios
        ///////////////////

        public function listarUsuariosModelo() {
            $sql = "SELECT u.usuarios_id, 
                            u.usuarios_nombres, 
                            u.usuarios_apellidos, 
                            u.usuarios_tipo_identificacion, 
                            u.usuarios_identificacion, 
                            u.usuarios_correo, 
                            u.usuarios_estado, 
                            c.ciudades_nombre 
                    FROM usuarios u 
                    INNER JOIN ciudades c ON u.usuarios_ciudades_id = c.ciudades_id 
                    ORDER BY u.usuarios_nombres";
            // print $sql;

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


        // Listar los usuarios a traves de la busqueda //
        /////////////////////////////////////////////////

        public function listarUsuariosBusquedaModelo($busqueda) {
            $sql = "SELECT u.usuarios_id,
                u.usuarios_nombres,
                u.usuarios_apellidos,
                u.usuarios_tipo_identificacion,
                u.usuarios_identificacion,
                u.usuarios_correo,
                u.usuarios_estado,
                c.ciudades_nombre
            FROM usuarios u
            INNER JOIN ciudades c ON u.usuarios_ciudades_id = c.ciudades_id
            WHERE u.usuarios_nombres LIKE '%$busqueda%'
                OR u.usuarios_apellidos LIKE '%$busqueda%'
                OR u.usuarios_identificacion LIKE '%$busqueda%'
            ORDER BY u.usuarios_nombres";

            // like es un operador que compara cadenas de texo en una consulta

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


        // Mostrar usuario de manera individual
        ////////////////////////////////////////

        public function listarUsuariosByIdModelo($id) {
            $sql = "SELECT usuarios_id,  usuarios_nombres, usuarios_apellidos, usuarios_tipo_identificacion, usuarios_identificacion, usuarios_correo, usuarios_estado, usuarios_ciudades_id 
            from usuarios where usuarios_id = :id";

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


        // actualizar usuario

        public function actualizarUsuariosModelo ($datos) {
            $sql = "UPDATE usuarios SET usuarios_nombres = :nombres, 
                                        usuarios_apellidos = :apellidos, 
                                        usuarios_tipo_identificacion = :tipoIdentificacion, 
                                        usuarios_identificacion = :identificacion, 
                                        usuarios_correo = :correo, 
                                        usuarios_estado = :estado, 
                                        usuarios_ciudades_id = :ciudades 
                    
                    WHERE usuarios_id = :id";
 

            try {
                $conexion = new Conexion();
                $stmt = $conexion -> conectar() -> prepare($sql);

                $stmt -> bindParam(":nombres", $datos["nombres"], PDO::PARAM_STR);
                $stmt -> bindParam(":apellidos", $datos["apellidos"], PDO::PARAM_STR);
                $stmt -> bindParam(":tipoIdentificacion", $datos["tipoIdentificacion"], PDO::PARAM_STR);
                $stmt -> bindParam(":identificacion", $datos["identificacion"], PDO::PARAM_INT);
                $stmt -> bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
                $stmt -> bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
                $stmt -> bindParam(":ciudades", $datos["ciudades"], PDO::PARAM_INT);
                $stmt -> bindParam(":id", $datos['id'], PDO::PARAM_INT);

                if ($stmt -> execute()) {
                    $conexion = null;
                    $stmt = null;
                    return "success";
                } else {
                    return "error";
                }
            } catch (\Throwable $th) {
                print "<p>Falló</p>";
            }
        }


        //Eliminar usuario
        ///////////////////


        public function eliminarUsuariosModelo($id) {

            $sql1 = "SELECT count(*) as valor from usuarios";
            $sql2 = "DELETE from usuarios where usuarios_id = :id";

            try {
                $conexion = new Conexion;
                $stmt = $conexion -> conectar() -> prepare($sql1);

                if ($stmt -> execute()) {
                    $usuarios = $stmt -> fetch();
                }

                if ($usuarios['valor'] > 1) {
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
                echo $th->getTraceAsString();
            }
        }


    }
?>