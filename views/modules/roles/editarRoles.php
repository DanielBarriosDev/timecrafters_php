<?php

    // if (!isset($_SESSION['validado'])) {
    //     header("location: views/modules/login.php"); 
    //     exit();
    // }
    
    $rolesControlador = new RolesControlador();

    if (isset($_POST['enviar'])) {
        $rolesControlador -> actualizarRolesControlador();
    }

    if (isset($_GET['action'])) {
        $action = explode("/", $_GET['action']);
        $lista = $rolesControlador -> listarRolesByIdControlador($action[2]);
    }

?>

<div class="card text-center container">
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item ">
                <a class="nav-link" href="<?php echo SERVERURL; ?>roles/consultarRoles">Consultar roles</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link active" aria-current="true" href="<?php echo SERVERURL; ?>roles/registrarRoles">Crear rol</a>
            </li>
        </ul>
    </div>
    <div class="card-body">
        <form method="post" class="mt-4">

            <div class="mb-3 d-flex flex-column align-items-start">
                <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $lista['roles_id'] ?>" required>
                <label for="nombreRol" class="form-label">Nombre del rol:</label>
                <input type="text" class="form-control" name="nombreRol" id="nombreRol" value="<?php echo $lista['roles_nombre'] ?>" required>
            </div>

            <input type="submit" name="enviar" value="Guardar rol">

            <!-- <button type="submit">Guardar ciudad</button> -->
        </form>

        <?php
        if (isset($_GET['action'])) {
            $action = explode("/", $_GET['action']);
            if (count($action) == 4) {
                switch ($action[3]) {
                    case "okUp":
                        $msg = "Rol actualizado";
                        break;
                    case "erUp":
                        $msg = "Rol NO actualizado";
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