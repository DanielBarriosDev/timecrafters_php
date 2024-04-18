<?php
// if (!isset($_SESSION['user'])) {
//     header("location:ingresar");
//     exit();
// }

    $usuariosControlador = new UsuariosControlador();

?>

<!-- <h1>Listado de Usuarios</h1> -->

<!-- <h3>Bienvenido: <?php echo $_SESSION['user'] ?></h3> -->

<div class="card text-center container">
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
                <a class="nav-link active" aria-current="true" href="<?php echo SERVERURL; ?>usuarios/consultarUsuarios">Consultar Usuarios</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo SERVERURL; ?>usuarios/registrarUsuarios">Crear Usuario</a>
            </li>
        </ul>
    </div>
    <div class="card">
        <div class="card-body">


            <nav class="navbar bg-body-tertiary">
                <div class="container-fluid">
                    <form class="d-flex w-100" role="search" method="post">
                        <input class="form-control me-2 flex-grow-1" type="search" name="busqueda" id="busqueda"  aria-label="Search" placeholder="Busqueda de usuario">
                        <button type="submit">Buscar</button>
                    </form>
                </div>
            </nav>

            <table class="table table-striped ">
                <thead>
                    <tr>
                        <th>Nombres</th>
                        <th>TI</th>
                        <th>Identificacion</th>
                        <th>Correo</th>
                        <th>Estado</th>
                        <th>Ciudad</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>

                </thead>
                <tbody>
                    <?php

                    $datos = $usuariosControlador -> listarUsuariosControlador();

                    foreach ($datos as $value) {
                        echo "<tr id='fila".$value['usuarios_id']."'>";
                        echo "<td>" . $value['usuarios_nombres'] . " " . $value['usuarios_apellidos'] . "</td>";
                        echo "<td>" . $value['usuarios_tipo_identificacion'] . "</td>";
                        echo "<td>" . $value['usuarios_identificacion'] . "</td>";
                        echo "<td>" . $value['usuarios_correo'] . "</td>";
                        echo "<td>" . $value['usuarios_estado'] . "</td>";
                        echo "<td>" . $value['ciudades_nombre'] . "</td>";
                        echo "<td><center><a href='" . SERVERURL . "rolesUsuarios/asignarRolesUsuarios/" . $value['usuarios_id'] . "'><i class='bi bi-person-gear'></i></i></a></center></td>";
                        echo "<td><center><a href='" . SERVERURL . "usuarios/editarUsuarios/" . $value['usuarios_id'] . "'><i class='bi bi-pencil'></i></a></center></td>";
                        echo "<td><center><a href='" . SERVERURL . "usuarios/eliminar/" . $value['usuarios_id'] . "' onclick='return validarEliminarUsuarios(event);'><i class='bi bi-trash3'></i></a></center></td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        
            <script src="<?php echo SERVERURL ?>views/js/usuariosJs/eliminarUsuarios.js"></script>

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

