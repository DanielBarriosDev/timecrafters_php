<div class="container-fluid d-flex align-items-center justify-content-center py-4 bg-body-tertiary m-0 min-vh-100">
    <div class="card p-4">
        <div class="card-header">
            <h2 class="card-title">Recupera tu cuenta</h2>
        </div>
        <div class="card-body">
            <form method="post">
                <div class="mb-3">
                    <div class="form-label">Ingresa tu correo electrónico para restablecer tu contraseña.</div>
                    <!-- <label for="correo" class="form-label">Ingresa tu correo electrónico para buscar tu cuenta.</label> -->
                    <input type="text" class="form-control" id="correo" name="email" placeholder="Correo electrónico" autofocus="1" aria-label="Correo electrónico o número de celular">
                </div>
                <div class="d-grid gap-2">
                    <a href="<?php SERVERURL ?>login/login" class="btn btn-danger">Cancelar</a>
                    <button type="submit" class="w-100 py-2">Buscar</button>
                </div>
            </form>
        </div>
    </div>
</div>


