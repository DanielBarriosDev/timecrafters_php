<?php

    $rolesControlador = new RolesControlador();
    $rolesUsuariosControlador = new RolesUsuariosControlador();

    if (isset($_POST['enviar'])) {
        $rolesUsuariosControlador -> actualizarRolesUsuariosControlador();
    }

    if (isset($_GET['action'])) {
        $action =  explode("/", $_GET['action']);
        $lista = $rolesUsuariosControlador -> listarRolesUsuariosByIdControlador($action[2]);
    }

?>

<div class="card text-center container">
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
                <a class="nav-link " aria-current="true" href="<?php echo SERVERURL; ?>rolesUsuarios/consultarRolesUsuarios">Consultar roles de Usuarios</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="<?php echo SERVERURL; ?>rolesUsuarios/editarRolesUsuarios">Actualizar roles de usuario</a>
            </li>
        </ul>
    </div>

    <div class="card">
        <div class="card-body">
            <form method="post" class="mt-4">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-2 d-flex flex-column align-items-start">
                            <input type="hidden" name="id" value="<?php echo $lista['roles_usuarios_id'] ?>">
                            <label for="nombres" class="form-label">Nombres:</label>
                            <input type="text" class="form-control nombres" name="nombres" id="nombres" value="<?php echo $lista['usuarios_nombres'] . ' ' . $lista['usuarios_apellidos'] ?>" disabled>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-2 d-flex flex-column align-items-start">
                            <label for="tipoIdentificacion" class="form-label">Tipo de Documento:</label>
                            <select class="form-select" name="tipoIdentificacion" id="tipoIdentificacion" disabled>
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
                            <input type="number" class="form-control" name="identificacion" id="identificacion" value="<?php echo $lista['usuarios_identificacion'] ?>" disabled>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-2 d-flex flex-column align-items-start">
                            <label for="correo" class="form-label">Correo electronico:</label>
                            <input type="email" class="form-control" name="correo" id="correo" value="<?php echo $lista['usuarios_correo'] ?>" disabled>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="mb-2 d-flex flex-column align-items-start">
                            <label for="roles" class="form-label">Roles:</label>
                            <div id="roles-container">
                                <?php

                                $roles = $rolesControlador->listarRolesControlador();

                                foreach ($roles as $rol) {
                                    $checked = (in_array($rol['roles_id'], $lista)) ? 'checked' : '';
                                    $disabled = ($rol['roles_id'] == $lista['roles_id']) ? '' : 'disabled';

                                    echo "<div class='form-check'>
                                                <input type='checkbox' class='form-check-input' id='roles' name='roles[]' value='" . $rol['roles_id'] . "' $checked $disabled>
                                                <span class='form-check-label'>" . $rol['roles_nombre'] . "</span>
                                            </div>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="mb-2 d-flex flex-column align-items-start">
                            <label for="estadoRol" class="form-label">Estado del rol:</label>
                            <select class="form-select" name="estadoRol" id="estadoRol" required>
                                <?php
                                $estadoRol = [
                                    'Activo' => 'Activo',
                                    'Inactivo' => 'Inactivo'
                                ];

                                foreach ($estadoRol as $estado => $nombre) {
                                    $selected = ($lista['roles_usuarios_estado'] == $estado) ? 'selected' : '';
                                    echo "<option value='$estado' $selected>$nombre</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <input type="submit" name="enviar" value="Asignar Roles">
            </form>
            <?php
                if (isset($_GET["action"])) {
                    $action = explode("/", $_GET['action']);
                    if (count($action) == 4) {
                        switch ($action[3]) {
                            case "okUp":
                                $msg = "Rol de Usuario Actualizado";
                                break;

                            case "erUp":
                                $msg = "Rol de Usuario NO Actualizado";
                                break;

                            case "regID":
                                $msg = "Acceso denegado ID Rol de Usuario";
                                break;

                            case "regEstadoRol":
                                $msg = "Acceso denegado Estado del Rol";
                                break;

                            default:
                                $msg = "";
                        }
                        echo "<center>" . $msg . "</center>";
                    }
                }
            ?>
        </div>
    </div>
</div>