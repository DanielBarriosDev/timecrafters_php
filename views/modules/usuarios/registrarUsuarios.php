<?php
    $usuariosControlador = new UsuariosControlador();
    $usuariosControlador -> registrarUsuariosControlador();
   
?>
<!-- <h1>REGISTRAR USUARIOS</h1> -->

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
            <form method="post" class="mt-4" id="formularioUsuarios">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-2 d-flex flex-column align-items-start">
                            <label for="nombres" class="form-label">Nombres: <span></span></label>
                            <input type="text" class="form-control nombres" name="nombres" id="nombres" placeholder="Nombres" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-2 d-flex flex-column align-items-start">
                            <label for="apellidos" class="form-label">Apellidos: <span></span></label>
                            <input type="text" class="form-control" name="apellidos" id="apellidos" placeholder="Apellidos" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-2 d-flex flex-column align-items-start">
                            <label for="tipoIdentificacion" class="form-label">Tipo de Documento: <span></span></label>
                            <select class="form-select" name="tipoIdentificacion" id="tipoIdentificacion" required>
                                <option value="TI">Tarjeta de Identidad</option>
                                <option value="CC">Cedula de Ciudadania</option>
                                <option value="PTT">Cedula de Extranjería</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-2 d-flex flex-column align-items-start">
                            <label for="identificacion" class="form-label">Identificación: <span></span></label>
                            <input type="number" class="form-control" name="identificacion" id="identificacion" required>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="mb-2 d-flex flex-column align-items-start">
                            <label for="correo" class="form-label">Correo electronico: <span></span></label>
                            <input type="email" class="form-control" name="correo" id="correo" placeholder="ejemplo@gmail.com" required>
                        </div>

                        <div class="mb-2 d-flex flex-column align-items-start">
                            <label for="estado" class="form-label">Estado: <span></span></label>
                            <select class="form-select" name="estado" id="estado" required>
                                <option value="Activo">Activo</option>
                                <option value="Inactivo">Inactivo</option>
                            </select>
                        </div>

                        <div class="mb-2 d-flex flex-column align-items-start">
                            <label for="ciudades" class="form-label">Ciudad: <span></span></label>
                            <select class="form-select" name="ciudades" id="ciudades" required>
                                <?php

                                    $ciudadesControlador = new CiudadesControlador();

                                    $datos = $ciudadesControlador -> listarCiudadesControlador();

                                    foreach ($datos as $ciudades) {
                                        echo "<option value='" . $ciudades['ciudades_id'] . "'>" . $ciudades['ciudades_nombre'] . "</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <input type="submit" name="enviar" value="Guardar Usuario">
                
            </form>
            <?php

            if (isset($_GET['action'])) {
                $accion = explode("/", $_GET['action']);
                if (count($accion) > 2) {
                    switch ($accion[2]) {
                        case "okUser":
                            $msg = "Usuario Registrado";
                            break;

                        case "erUser":
                            $msg = "Usuario NO Registrado";
                            break;

                        case "regNom":
                            $msg = "Acceso denegado Nombre de Usuario";
                            break;

                        case "regEmail":
                            $msg = "Acceso denegado Email de Usuario";
                            break;

                        case "regCla":
                            $msg = "Acceso denegado Clave de Usuario";
                            break;

                        case "regTer":
                            $msg = "Acceso denegado Terminos";
                            break;
                    }
                }

                if (isset($msg)) {
                    echo "<center>" . $msg . "</center>";
                }
            }

            ?>
        </div>
    </div>
</div>


