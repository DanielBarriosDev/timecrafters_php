<?php

    $ciudadesControlador = new CiudadesControlador();
    $ciudadesControlador -> registrarCiudadesControlador();

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
                <label for="nombreCiudad" class="form-label">Nombre de la ciudad:</label>
                <input type="text" class="form-control" name="nombreCiudad" id="nombreCiudad" required>
            </div>

            <input type="submit" name="enviar" value="Guardar ciudad">

            <!-- <button type="submit">Guardar ciudad</button> -->
        </form>

        <?php

        if (isset($_GET['action'])) {
            $action = explode("/", $_GET['action']);
            if (count($action) > 2) {
                switch ($action[2]) {
                    case 'okCiudad':
                        $msg = "Ciudad registrada";
                        break;

                    case 'errorCiudad':
                        $msg = "Ciudad no registrada";
                        break;

                    case 'regNom':
                        $msg = "Acceso denegado nombre de Ciudad";
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