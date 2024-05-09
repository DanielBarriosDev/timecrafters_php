<?php

    $rolesControlador = new RolesControlador();
    $rolesControlador -> registarRolesControlador();
    
?>

<div class="card text-center container">
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item ">
                <a class="nav-link" href="<?php echo SERVERURL; ?>roles/consultarRoles">Consultar roles</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link active" aria-current="true" href="<?php echo SERVERURL; ?>roles/registrarRoles">Crear roles</a>
            </li>
        </ul>
    </div>
    <div class="card-body">
        <form method="post" class="mt-4">

            <div class="mb-3 d-flex flex-column align-items-start">
                <label for="nombreRol" class="form-label">Nombre del rol:</label>
                <input type="text" class="form-control" name="nombreRol" id="nombreRol" required>
            </div>

            <input type="submit" name="enviar" value="Guardar ciudad">

            <!-- <button type="submit">Guardar ciudad</button> -->
        </form>

        <?php

            if (isset($_GET['action'])) {
                $action = explode("/", $_GET['action']);
                if (count($action) > 2) {
                    switch ($action[2]) {
                        case 'okRol':
                            $msg = "Rol registrado";
                            break;
                        case 'errorRol':
                            $msg = "errorRol";
                            break;
                        case 'regNom':
                            $msg = "Acceso denegado nombre de Rol";
                            break;
                        default: 
                            $msg = "";
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
