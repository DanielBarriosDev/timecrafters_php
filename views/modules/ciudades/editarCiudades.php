<?php

    $ciudadesControlador = new CiudadesControlador();

    if (isset($_POST['enviar'])) {
        $ciudadesControlador -> actualizarCiudadesControlador();
    }

    if (isset($_GET['action'])) {
        $action = explode("/", $_GET['action']);
        $lista = $ciudadesControlador -> listarCiudadesByIdControlador($action[2]);
    }

?>

<div class="card text-center container">
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item ">
                <a class="nav-link" href="<?php echo SERVERURL; ?>ciudades/consultarCiudades">Consultar ciudades</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link active" aria-current="true" href="<?php echo SERVERURL; ?>ciudades/registrarCiudades">Crear ciudad</a>
            </li>
        </ul>
    </div>
    <div class="card-body">
        <form method="post" class="mt-4">

            <div class="mb-3 d-flex flex-column align-items-start">
                <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $lista['ciudades_id'] ?>" required>
                <label for="nombreCiudad" class="form-label">Nombre de la ciudad:</label>
                <input type="text" class="form-control" name="nombreCiudad" id="nombreCiudad" value="<?php echo $lista['ciudades_nombre'] ?>" required>
            </div>

            <input type="submit" name="enviar" value="Guardar ciudad">

            <!-- <button type="submit">Guardar ciudad</button> -->
        </form>

        <?php

        if (isset($_GET["action"])) {
            $action = explode("/", $_GET['action']);
            if (count($action) == 4) {
                switch ($action[3]) {
                    case "okUp":
                        $msg = "Ciudad Actualizada";
                        break;

                    case "erUp":
                        $msg = "Ciudad NO Actualizada";
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