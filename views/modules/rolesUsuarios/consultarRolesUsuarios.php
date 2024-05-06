<?php

    // if (!isset($_SESSION['validado'])) {
    //     header("location: views/modules/login.php"); 
    //     exit();
    // }

?>

<div class="card text-center container">
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
                <a class="nav-link active" aria-current="true" href="<?php echo SERVERURL; ?>rolesUsuarios/consultarRolesUsuarios">Consultar roles de Usuarios</a>
            </li>
        </ul>
    </div>
    <div class="card">
        <div class="card-body">
            
            
            <nav class="navbar bg-body-tertiary">
                <div class="container-fluid">
                    <form class="d-flex w-100" role="search" method="post">
                        <input class="form-control me-2 flex-grow-1" type="search" name="busqueda" id="busqueda" aria-label="Search" placeholder="Busqueda de usuario">
                        <button type="submit">Buscar</button>
                    </form>
                </div>
            </nav>
            
            <table class="table table-striped ">
                <thead>
                    <tr>
                        <th>Nombres</th>
                        <th>Identificación</th>
                        <th>Fecha Asignación</th>
                        <th>Fecha Cancelación</th>
                        <th>Rol</th>
                        <th>Estado</th>
                        <th></th>
                        <th></th>
                    </tr>
                    
                </thead>
                <tbody>
                    <?php

                    $rolesUsuariosControlador = new RolesUsuariosControlador();
                    $datos = $rolesUsuariosControlador -> listarRolesUsuariosControlador();

                    foreach ($datos as $value) {
                        echo "<tr id='fila" . $value['roles_usuarios_id'] . "'>";
                        echo "<td>" . $value['usuarios_nombres'] . " " . $value['usuarios_apellidos'] . "</td>";
                        echo "<td>" . $value['usuarios_identificacion'] . "</td>";
                        echo "<td>" . $value['roles_usuarios_fecha_asignacion'] . "</td>";
                        echo "<td>" . $value['roles_usuarios_fecha_cancelacion'] . "</td>";
                        echo "<td>" . $value['roles_nombre'] . "</td>";
                        echo "<td>" . $value['roles_usuarios_estado'] . "</td>";
                        echo "<td><center><a href='" . SERVERURL . "rolesUsuarios/editarRolesUsuarios/" . $value['roles_usuarios_id'] . "'><i class='bi bi-pencil'></i></a></center></td>";
                        echo "<td><center><a href='" . SERVERURL . "rolesUsuarios/eliminar/" . $value['roles_usuarios_id'] . "' onclick='return eliminarRolesUsuarios(event);'><i class='bi bi-trash3'></i></a></center></td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        
            <script src="<?php echo SERVERURL ?>views/js/rolesUsuariosJs/eliminarRolesUsuarios.js"></script>

            <?php
            if (isset($action) && count($action) == 2) {
                switch ($action[1]) {
                    case "okdel":
                        $msg = "Usuario eliminado correctamente";
                        break;

                    case "erdel":
                        $msg = "Error al eliminar un usuario";
                        break;

                    default:
                        $msg = "";
                }
                echo "<center>" . $msg . "</center>";
            }
            ?>
        </div>


        <!-- <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav> -->
    </div>
</div>

