<?php
    // if (!isset($_SESSION['user'])) {
    //     header("location:ingresar");
    //     exit();
    // }

    $usuariosControlador = new UsuariosControlador();
    if (isset($_POST['enviar'])) {
        $usuariosControlador->actualizarUsuarioControlador();
    }

    if (isset($_GET['action'])) {
            $action = explode("/", $_GET['action']);
            $lista = $usuariosControlador -> listarUsuariosByIdControlador($action[2]);
            // return $resultado;
    }
     
?>

<!-- <h1>EDITAR USUARIO</h1> -->

<div class="card text-center container">
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
                <a class="nav-link " aria-current="true" href="<?php echo SERVERURL; ?>usuarios/consultarUsuarios">Consultar Usuarios</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="<?php echo SERVERURL; ?>usuarios/registrarUsuarios">Crear Usuario</a>
            </li>
        </ul>
    </div>
    
    <div class="card">
        <div class="card-body">
            <form method="post" class="mt-4">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-2 d-flex flex-column align-items-start">
                            <input type="hidden" name="id" value="<?php echo $lista['usuarios_id'] ?>">
                            <label for="nombres" class="form-label">Nombres:</label>
                            <input type="text" class="form-control nombres" name="nombres" id="nombres" value="<?php echo $lista['usuarios_nombres'] ?>" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-2 d-flex flex-column align-items-start">
                            <label for="apellidos" class="form-label">Apellidos:</label>
                            <input type="text" class="form-control" name="apellidos" id="apellidos" value="<?php echo $lista['usuarios_apellidos'] ?>" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-2 d-flex flex-column align-items-start">
                            <label for="tipoIdentificacion" class="form-label">Tipo de Documento:</label>
                            <select class="form-select" name="tipoIdentificacion" id="tipoIdentificacion" required>
                                <?php

                                    $tipoIdentificacion = [
                                        'TI' => 'Tarjeta de Identidad',
                                        'CC' => 'Cedula de Ciudadania',
                                        'PTT' => 'Cedula de Extranjería'
                                    ];

                                    foreach ($tipoIdentificacion as $tipo => $nombre) {
                                        $selected = ($lista['usuarios_tipo_identificacion'] == $tipo) ? 'selected' : '';
                                        echo "<option value='$tipo' $selected>$nombre</option>"; 
                                    }

                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-2 d-flex flex-column align-items-start">
                            <label for="identificacion" class="form-label">Identificación:</label>
                            <input type="number" class="form-control" name="identificacion" id="identificacion" value="<?php echo $lista['usuarios_identificacion'] ?>" required>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="mb-2 d-flex flex-column align-items-start">
                            <label for="correo" class="form-label">Correo electronico:</label>
                            <input type="email" class="form-control" name="correo" id="correo" value="<?php echo $lista['usuarios_correo'] ?>" required>
                        </div>

                        <div class="mb-2 d-flex flex-column align-items-start">
                            <label for="estado" class="form-label">Estado:</label>
                            <select class="form-select" name="estado" id="estado" required>
                                <?php
                                    $estado = [
                                        'Activo' => 'Activo',
                                        'Inactivo' => 'Inactivo'
                                    ];

                                    foreach ($estado as $valor => $nombre) {
                                        $selected = ($lista['usuarios_estado'] == $valor) ? 'selected' : '';
                                        echo "<option value='$valor' $selected>$nombre</option>";
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="mb-2 d-flex flex-column align-items-start">
                            <label for="ciudades" class="form-label">Ciudad:</label>
                            <select class="form-select" name="ciudades" id="ciudades" required>
                                <?php
                                    $ciudadesControlador = new CiudadesControlador();
                                    
                                    $datos = $ciudadesControlador -> listarCiudadesControlador();

                                    foreach ($datos as $ciudades) {
                                        $selected = ($lista['usuarios_ciudades_id'] == $ciudades['ciudades_id']) ? 'selected' : '';
                                        echo "<option value='" . $ciudades['ciudades_id'] . "' $selected>" . $ciudades['ciudades_nombre'] . "</option>";
                                    }
                                ?>                               
                            </select>
                        </div>
                    </div>
                </div>
                <input type="submit" name="enviar" value="Guardar Usuario">
                
            </form>
            <?php
                if (isset($_GET["action"])) {
                    $action = explode("/", $_GET['action']);
                    if (count($action) == 4) {
                        switch ($action[3]) {
                            case "okUp":
                                $msg = "Usuario Actualizado";
                                break;

                            case "erUp":
                                $msg = "Usuario NO Actualizado";
                                break;

                            default :
                                $msg = "";
                        }
                        echo "<center>" . $msg . "</center>";
                    }
                }
            ?>
        </div>
    </div>
</div>


