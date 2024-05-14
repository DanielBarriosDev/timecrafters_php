<?php

    $departamentosControlador = new DepartamentosControlador();

    if (isset($_POST['enviar'])) {
        $departamentosControlador -> actualizarDepartamentosControlador();
    }

    if (isset($_GET['action'])) {
        $action = explode("/", $_GET['action']);
        $lista = $departamentosControlador -> listarDepartamentosByIdControlador($action[2]);
    }

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
                <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $lista['departamentos_id'] ?>" required>
                <label for="nombreDepartamento" class="form-label">Nombre del departamento:</label>
                <input type="text" class="form-control" name="nombreDepartamento" id="nombreDepartamento" value="<?php echo $lista['departamentos_nombre'] ?>" required>
            </div>

            <!-- <input type="submit"  value="Guardar ciudad"> -->

            <button type="submit" name="enviar">Guardar departamento</button>
        </form>
        <br>

        <?php

        if (isset($_GET["action"])) {
            $action = explode("/", $_GET['action']);
            if (count($action) == 4) {
                switch ($action[3]) {
                    case "okUp":
                        $msg = "Departamento Actualizado";
                        break;

                    case "erUp":
                        $msg = "Departamento NO Actualizado";
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