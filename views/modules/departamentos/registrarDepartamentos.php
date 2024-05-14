<?php

    $departamentosControlador = new DepartamentosControlador();
    $departamentosControlador -> registrarDepartamentosControlador();

?>

<div class="card text-center container">
    <div class="card-header">
        <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item ">
                <a class="nav-link" href="<?php echo SERVERURL; ?>departamentos/consultarDepartamentos">Consultar departamentos</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link active" aria-current="true" href="<?php echo SERVERURL; ?>departamentos/registrarDepartamentos">Crear departamento</a>
            </li>
        </ul>
    </div>
    <div class="card-body">
        <form method="post" class="mt-4">

            <div class="mb-3 d-flex flex-column align-items-start">
                <label for="nombreDepartamento" class="form-label">Nombre del departamento:</label>
                <input type="text" class="form-control" name="nombreDepartamento" id="nombreDepartamento" required>
            </div>

            <!-- <input type="submit" name="enviar" value="Guardar departamento"> -->

            <button type="submit">Guardar departamento</button>
        </form>
        <br>

        <?php

        if (isset($_GET['action'])) {
            $action = explode("/", $_GET['action']);
            if (count($action) > 2) {
                switch ($action[2]) {
                    case 'okDepartamento':
                        $msg = "Departamento registrado";
                        break;

                    case 'errorDepartamento':
                        $msg = "Departamento no registrado";
                        break;

                    case 'regNom':
                        $msg = "Acceso denegado nombre del departamento";
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