<div class="card text-center container">
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item ">
                <a class="nav-link active" aria-current="true" href="<?php echo SERVERURL; ?>departamentos/consultarDepartamentos">Consultar departamentos</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="<?php echo SERVERURL; ?>departamentos/registrarDepartamentos">Crear departamento</a>
            </li>
        </ul>
    </div>
    <div class="card">
        <div class="card-body">
            <nav class="navbar bg-body-tertiary">
                <div class="container-fluid">
                    <form class="d-flex w-100" role="search" method="post">
                        <input class="form-control me-2 flex-grow-1" type="search" name="busqueda" id="busqueda" aria-label="Search" placeholder="Busqueda del departamento">
                        <button type="submit">Buscar</button>
                    </form>
                </div>
            </nav>

            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Departamento</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $departamentosControlador = new DepartamentosControlador();
                    $datos = $departamentosControlador -> listarDepartamentosControlador();

                    foreach ($datos as $key => $value) {
                        echo "<tr id='fila" . $value['departamentos_id'] . "'>";
                        echo "<td>" . $value['departamentos_id'] . "</td>";
                        echo  "<td>" . $value['departamentos_nombre'] . "</td>";
                        echo  "<td><center><a href='" . SERVERURL . "departamentos/editarDepartamentos/" . $value['departamentos_id'] . "'><i class='bi bi-pencil'></i></a></center></td>";
                        echo  "<td><center><a href='" . SERVERURL . "departamentos/eliminar/" . $value['departamentos_id'] . "' onclick='return eliminarDepartamentos(event);'><i class='bi bi-trash3'></i></a></center></td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>

            <script src="<?php echo SERVERURL ?>views/js/departamentosJs/eliminarDepartamentos.js"></script>

            <?php

            if (isset($action) && count($action) == 2) {
                switch ($action[1]) {
                    case 'okdel':
                        $msg = "Departamento eliminado correctamente";
                        break;

                    case 'errdel':
                        $msg = "Error al eliminar el departamento";
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