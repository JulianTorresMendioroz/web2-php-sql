<?php

class AuthView {

    public function register() {
        require_once 'templates/header.php';
?>
        <form action="registered" method="POST">
            <h2>Registrar:</h2>
            <div class="form-group">
                <label for="exampleInputEmail1">Usuario</label>
                <input type="text" name="user" class="form-control"  aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-muted">No compartas el tu usuario con nadie.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Contraseña</label>
                <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
           
            <button type="submit" class="btn btn-primary">Registrarme</button>
        </form>
<?php
        require_once 'templates/footer.php';
    }

    public function login() {
        require_once 'templates/header.php';
?>
        <form action="logged" method="POST">
        <h2>Ingresar:</h2>
            <div class="form-group">
                <label for="exampleInputEmail1">Usuario</label>
                <input type="text" name="user" class="form-control"  aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-muted">No compartas el tu usuario con nadie.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Contraseña</label>
                <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
           
            <button type="submit" class="btn btn-primary">Ingresar</button>
        </form>
<?php
        require_once 'templates/footer.php';
    }


}

