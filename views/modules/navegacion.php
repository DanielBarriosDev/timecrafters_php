
<?php

  // include_once('controllers/loginControlador.php');

  // validarSesion();

?>
<nav class="d-flex flex-column flex-shrink-0 p-3 bg-body-tertiary" style="width: 280px; height: 100vh;">
  <a href="" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
    <img src="<?php echo SERVERURL; ?>views/img/logo.svg" alt="" class="me-2" style="width: 60px; height: 60px;">
    <span class="fs-4" style="padding: 0 10px;">Administrador</span>
  </a>
  <hr>
  <ul class="nav nav-pills flex-column mb-auto">
    <li class="nav-item">
      <a href="<?php echo SERVERURL; ?>inicio" class="nav-link link-body-emphasis" aria-current="page">
        <i class="bi bi-house-door me-2"></i>
        <span class="nav_ocultar">Inicio</span>
      </a>
    </li>
    <li>
      <a href="<?php echo SERVERURL; ?>usuarios/consultarUsuarios" class="nav-link link-body-emphasis ">
        <i class="bi bi-person-plus-fill me-2"></i>
        <span class="nav_ocultar">Usuarios</span>
      </a>
    </li>
    <li>
      <a href="<?php echo SERVERURL; ?>ciudades/consultarCiudades" class="nav-link link-body-emphasis ">
        <i class="bi bi-geo-alt me-2"></i>
        <span class="nav_ocultar">Ciudades</span>
      </a>
    </li>
    <li>
      <a href="<?php echo SERVERURL; ?>roles/consultarRoles" class="nav-link link-body-emphasis">
        <i class="bi bi-ui-checks me-2"></i>
        <span class="nav_ocultar">Roles</span>
      </a>
    </li>
    <li>
      <a href="<?php echo SERVERURL; ?>rolesUsuarios/consultarRolesUsuarios" class="nav-link">
        <i class="bi bi-person-gear me-2"></i>
        <span class="nav_ocultar">Roles de Usuario</span>
      </a>
    </li>
    <li>
      <a href="<?php echo SERVERURL; ?>auten/consultarLogin" class="nav-link link-body-emphasis">
        <i class="bi bi-key me-2"></i>
        <span class="nav_ocultar">Login</span>
      </a>
    </li>
    <li>
      <a href="<?php echo SERVERURL; ?>departamentos/consultarDepartamentos" class="nav-link link-body-emphasis">
        <i class="bi bi-globe me-2"></i>
        <span class="nav_ocultar">Departamentos</span>
      </a>
    </li>
    <li>
      <a href="<?php echo SERVERURL; ?>auten/recuperar" class="nav-link link-body-emphasis">
        <i class="bi bi-globe me-2"></i>
        <span class="nav_ocultar">Recuperar contraseña</span>
      </a>
    </li>
    <li>
      <a href="<?php echo SERVERURL; ?>auten/correoRestablecer" class="nav-link link-body-emphasis">
        <i class="bi bi-globe me-2"></i>
        <span class="nav_ocultar">Correo restablecer</span>
      </a>
    </li>
    <!-- <li>
        <a href="gestionResultados.html" class="nav-link link-body-emphasis">
          <i class="bi bi-check2-circle me-2"></i>
          <span class="nav_ocultar">Resultados</span>
        </a>
      </li>
      <li>
        <a href="gestionProfesiones.html" class="nav-link link-body-emphasis">
          <i class="bi bi-person-lines-fill me-2"></i>
          <span class="nav_ocultar">Profesiones</span>
        </a>
      </li> -->
  </ul>
  <hr>
  <div class="dropdown">
    <a href="" class="d-flex align-items-center link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
      <!-- <img src="https://cdn.icon-icons.com/icons2/2645/PNG/512/person_circle_icon_159926.png" alt="" width="32"
          height="32" class="rounded-circle me-2">-->
      <strong>mdo</strong>
    </a>
    <ul class="dropdown-menu text-small shadow">
      <li><a class="dropdown-item" href="perfilCoordinador.html">Perfil</a></li>
      <li>
        <hr class="dropdown-divider">
      </li>
      <li><a class="dropdown-item" href="<?php echo SERVERURL; ?>salir">Cerrar sesión</a></li>
    </ul>
  </div>
</nav>