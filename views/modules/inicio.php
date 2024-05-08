<?php

    if (!isset($_SESSION['validado']) || $_SESSION['validado'] !== true) {
        header("Location: " . SERVERURL);
        exit();
    }
    
?>


<h1>Pagina de inicio</h1>