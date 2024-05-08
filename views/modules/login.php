<?php

    include_once 'php/config.php';

    if (isset($_POST['usuario']) && isset($_POST['password'])) {
        $loginControlador = new LoginControlador();
        $loginControlador -> ingresarLoginControlador();
    }

?>
<!-- login -->
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link href="https://fonts.googleapis.com/css?family=Archivo+Black&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="<?php echo SERVERURL; ?>views/css/variables.css">
  <link rel="stylesheet" href="<?php echo SERVERURL; ?>views/css/login.css">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js" integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <title>TimeCrafters</title>


</head>

<body class="d-flex align-items-center py-4 bg-body-tertiary m-0 min-vh-100">

    <main class="form-signin mx-auto text-center my-auto">
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
                <span class="mt-5 mb-3 text-body-secondary"><a href="<?php SERVERURL?>salir">¿Olvidaste tu contraseña?</a></span>
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
    </main>   



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.0/dist/jquery.validate.js"></script>
    
</body>

</html>