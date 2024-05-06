<?php

    // if (!isset($_SESSION['validado'])) {
    //     header("location: views/modules/login.php"); 
    //     exit();
    // }
    
?>


<!-- <h1>Pagina de salida</h1> -->



<div class="container-fluid d-flex align-items-center justify-content-center py-4 bg-body-tertiary m-0 min-vh-100">
    <div class="card p-4">
        <div class="card-header">
            <h2 class="card-title">Recupera tu cuenta</h2>
        </div>
        <div class="card-body">
            <form>
                <div class="mb-3">
                    <div class="form-label">Ingresa tu correo electrónico para buscar tu cuenta.</div>
                    <!-- <label for="correo" class="form-label">Ingresa tu correo electrónico para buscar tu cuenta.</label> -->
                    <input type="text" class="form-control" id="correo" name="email" placeholder="Correo electrónico" autofocus="1" aria-label="Correo electrónico o número de celular">
                </div>
                <div class="d-grid gap-2">
                    <a href="/login.php" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </div>
            </form>
        </div>
    </div>
</div>
