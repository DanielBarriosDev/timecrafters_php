<form method="post" style="width: 100%;">
    <img class="mb-4" src="<?php echo SERVERURL ?>views/img/logo timecrafters.svg" alt="Logo de TimeCrafters" width="100%" height="140px">
    <!-- <h1 class="gradient-text">TimeCrafters</h1> -->

    <div class="form-floating">
        <input type="text" class="form-control" id="usuario" name="usuario" placeholder="" required>
        <label for="usuario">Usuario</label>
    </div>
    <div class="form-floating">
        <input type="password" class="form-control" id="password" name="password" placeholder="" required>
        <label for="password">Contraseña</label>
    </div>

    <div class="form-check text-start my-3">
        <input class="form-check-input" type="checkbox" value="remember-me" id="checkbox">
        <label class="form-check-label" for="checkbox">
            Mantener sesión iniciada
        </label>
    </div>
    <button class="btn custom-btn-color w-100 py-2" type="submit">Iniciar sesión</button>
    <!-- <input type="submit" name="enviar" value="Iniciar sesión"> -->

    <div class="form-check text-start my-3">
        <span class="mt-5 mb-3 text-body-secondary"><a href="<?php SERVERURL ?>salir">¿Olvidaste tu contraseña?</a></span>
        <!-- <span class="mt-5 mb-3 text-body-secondary">© 2024 TimeCrafters. Todos los derechos reservados.</span> -->
    </div>
</form>

<?php

    if (isset($action) && count($action) == 2) {
        switch ($action[1]) {

            case "UsuarioInvalido":
                $msg = "Error al ingresar el Usuario<br>Digite su identificación";
                break;

            case "PasswordInvalida":
                $msg = "Error al ingresar la Contraseña<br>La contraseña debe contener al menos un número y una letra mayúscula y minúscula, y al menos 8 o más caracteres";
                break;

            case "PasswordIncorrecta":
                $msg = "Contraseña Incorrecta";
                break;

            case "IntentosExcedidos":
                $msg = "Ha superado el numero de intentos fallidos<br>Consulte a su administrador";
                break;

            default:
                $msg = "";
        }
        echo "<center>" . $msg . "</center>";
    }

?>