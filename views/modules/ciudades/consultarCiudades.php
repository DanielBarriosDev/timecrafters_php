<?php
    
    // if (!isset($_SESSION['validado'])) {
    //     header("location:views/modules/login.php"); 
    //     exit();
    // }
     
?>
<div class="card text-center container">
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item ">
                <a class="nav-link active" aria-current="true" href="<?php echo SERVERURL; ?>ciudades/consultarCiudades">Consultar ciudades</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="<?php echo SERVERURL; ?>ciudades/registrarCiudades">Crear ciudad</a>
            </li>
        </ul>
    </div>
    <div class="card">
        <div class="card-body">
            <nav class="navbar bg-body-tertiary">
                <div class="container-fluid">
                    <form class="d-flex w-100" role="search" method="post">
                        <input class="form-control me-2 flex-grow-1" type="search" name="busqueda" id="busqueda" aria-label="Search" placeholder="Busqueda de ciudad">
                        <button type="submit">Buscar</button>
                    </form>
                </div>
            </nav>

            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Ciudad</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $ciudadesControlador = new CiudadesControlador();
                    $datos = $ciudadesControlador -> listarCiudadesControlador();

                    foreach ($datos as $key => $value) {
                        echo "<tr id='fila" . $value['ciudades_id'] . "'>";
                        echo "<td>" . $value['ciudades_id'] . "</td>";
                        echo  "<td>" . $value['ciudades_nombre'] . "</td>";
                        echo  "<td><center><a href='" . SERVERURL . "ciudades/editarCiudades/" . $value['ciudades_id'] . "'><i class='bi bi-pencil'></i></a></center></td>";
                        echo  "<td><center><a href='" . SERVERURL . "ciudades/eliminar/" . $value['ciudades_id'] . "' onclick='return eliminarCiudades(event);'><i class='bi bi-trash3'></i></a></center></td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>

            <script src="<?php echo SERVERURL ?>views/js/ciudadesJs/eliminarCiudades.js"></script>

            <?php

            if (isset($action) && count($action) == 2) {
                switch ($action[1]) {
                    case 'okdel':
                        $msg = "Ciudad eliminada correctamente";
                        break;

                    case 'errdel':
                        $msg = "Error al eliminar la ciudad";
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