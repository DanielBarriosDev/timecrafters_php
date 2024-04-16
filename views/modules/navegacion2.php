<nav>
    <ul>
        <li><a href="<?php echo SERVERURL; ?>inicio">Inicio</a></li>
        <li><a href="<?php echo SERVERURL; ?>usuarios/registrarUsuarios">Registrar Usuarios</a></li>
        <li><a href="<?php echo SERVERURL; ?>usuarios/consultarUsuarios">Consultar Usuarios</a></li>
        <li><a href="<?php echo SERVERURL; ?>ciudades/registrarCiudades">Registrar Ciudades</a></li>
        <li><a href="<?php echo SERVERURL; ?>ciudades/consultarCiudades">Consultar Ciudades</a></li>
        <li><a href="<?php echo SERVERURL; ?>roles/registrarRoles">Registrar Roles</a></li>
        <li><a href="<?php echo SERVERURL; ?>roles/consultarRoles">Consultar Roles</a></li>
        <li><a href="<?php echo SERVERURL; ?>ingresar">Ingresar</a></li>
        <li><a href="<?php echo SERVERURL; ?>salir">Salir</a></li>
    </ul>

    <!-- <?php
        if ($_SESSION['validado']) {
            // header("location:index.php");
            print "<h3 style='color:white'>Bienvenido: " . $_SESSION['user'] . "</h3>";
        }
    ?> -->
</nav>