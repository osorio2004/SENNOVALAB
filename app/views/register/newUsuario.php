<div class="data-container">
    <?php 
    if(isset($errors)){
        echo "<div class='errors'>";
        echo $errors;
        echo "</div>";
    }
    ?>
    <h2>Registrar usuario</h2>
    <form action="/usuario/create" method="post">
        <div class="form-group">
            <label for="">Nombre</label>
            <input type="text" name="nombre" required class="form-control">
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="email" name="email" required class="form-control">
        </div>
        <div class="form-group">
            <label for="">Contraseña</label>
            <input type="password" name="password" required class="form-control">
        </div>
        <div class="form-group">
            <button type="submit">Registrar</button>
        </div>
    </form>
</div>