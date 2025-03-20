<div class="data-container">
    <?php 
    // Mostrar errores si existen
    if(isset($errors)){
        echo "<div class='errors'>";
        echo $errors;
        echo "</div>";
    }
    ?>
    <h2>Registrar Usuario</h2>
    <form action="/usuario/create" method="post">
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" required class="form-control" placeholder="Ingrese su nombre">
        </div>
        <div class="form-group">
            <label for="apellido">Apellido</label>
            <input type="text" name="apellido" id="apellido" required class="form-control" placeholder="Ingrese su apellido">
        </div>
        <div class="form-group">
            <label for="correoElectronico">Correo Electrónico</label>
            <input type="email" name="correoElectronico" id="correoElectronico" required class="form-control" placeholder="Ingrese su correo">
        </div>
        <div class="form-group">
            <label for="contraseña">Contraseña</label>
            <input type="password" name="contraseña" id="contraseña" required class="form-control" placeholder="Ingrese su contraseña">
        </div>
        <div class="form-group">
            <label for="idRol">Rol</label>
            <select name="idRol" id="idRol" required class="form-control">
                <option value="1">Usuario</option>
                <option value="2">Administrador</option>
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn-submit">Registrar</button>
        </div>
    </form>
    <div class="link-login">
        <p>¿Ya tienes una cuenta? <a href="/login/init">Inicia sesión aquí</a></p>
    </div>
</div>

<style>
    .data-container {
        max-width: 400px;
        margin: auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f9f9f9;
    }
    .form-group {
        margin-bottom: 15px;
    }
    .form-control {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    .btn-submit {
        background-color: #007bff;
        color: white;
        padding: 10px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
    .btn-submit:hover {
        background-color: #0056b3;
    }
    .errors {
        color: red;
        margin-bottom: 10px;
        border: 1px solid red;
        padding: 10px;
        border-radius: 5px;
    }
    .link-login {
        margin-top: 15px;
        text-align: center;
    }
</style>
