<!-- <h1>consultar roles</h1> -->

<div class="card text-center container">
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item ">
                <a class="nav-link active" aria-current="true" href="<?php echo SERVERURL; ?>roles/consultarRoles">Consultar roles</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="<?php echo SERVERURL; ?>roles/registrarRoles">Crear roles</a>
            </li>
        </ul>
    </div>
    <div class="card">
        <div class="card-body">
            <nav class="navbar bg-body-tertiary">
                <div class="container-fluid">
                    <form class="d-flex w-100" role="search" method="post">
                        <input class="form-control me-2 flex-grow-1" type="search" name="busqueda" id="busqueda" aria-label="Search" placeholder="Busqueda de roles"> 
                        <button type="submit">Buscar</button>
                    </form>
                </div>
            </nav>

            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Rol</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $rolesControlador = new RolesControlador();
                    $datos = $rolesControlador->listarRolesControlador();

                    foreach ($datos as $value) {
                        echo "<tr id='fila" . $value['roles_id'] . "'>";
                        echo "<td>" . $value['roles_id'] . "</td>";
                        echo  "<td>" . $value['roles_nombre'] . "</td>";
                        echo  "<td><center><a href='" . SERVERURL . "roles/editarRoles/" . $value['roles_id'] . "'><i class='bi bi-pencil'></i></a></center></td>";
                        echo  "<td><center><a href='" . SERVERURL . "roles/eliminar/" . $value['roles_id'] . "' onclick='return eliminarRoles(event);'><i class='bi bi-trash3'></i></a></center></td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>

            <script src="<?php echo SERVERURL ?>views/js/rolesJs/eliminarRoles.js"></script>

            <?php

            if (isset($action) && count($action) == 2) {
                switch ($action[1]) {
                    case 'okdel':
                        $msg = "Rol eliminado correctamente";
                        break;

                    case 'errdel':
                        $msg = "Error al eliminar el rol";
                        break;

                    default:
                        $msg = "";
                        break;
                }
                echo "<center>" . $msg . "</center>";
            }

            ?>
        </div>
    </div>
</div>