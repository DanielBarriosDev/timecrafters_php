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
    

</div>