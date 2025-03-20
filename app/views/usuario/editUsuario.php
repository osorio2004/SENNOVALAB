<div class="data-container">
    <form action="/usuario/update" method="post">
        <div class="form-group">
            <label>ID Usuario</label>
            <input readonly required value="<?= htmlspecialchars($usuario->idUsuario) ?>" type="number" name="idUsuario" class="form-control">
        </div>
        <div class="form-group">
            <label>Nombre</label>
            <input required value="<?= htmlspecialchars($usuario->nombre) ?>" type="text" name="nombre" class="form-control">
        </div>
        <div class="form-group">
            <label>Apellido</label>
            <input required value="<?= htmlspecialchars($usuario->apellido) ?>" type="text" name="apellido" class="form-control">
        </div>
        <div class="form-group">
            <label>Correo Electrónico</label>
            <input required value="<?= htmlspecialchars($usuario->correoElectronico) ?>" type="email" name="correoElectronico" class="form-control">
        </div>
        <div class="form-group">
            <label>Contraseña</label>
            <input required type="password" name="contraseña" class="form-control">
        </div>
        <div class="form-group">
            <label>Rol</label>
            <select name="idRol">
                <option value="">Seleccione un rol...</option>
                <?php foreach ($roles as $rol): ?>
                    <option <?= ($rol->id == $usuario->idRol) ? "selected" : "" ?> value="<?= $rol->id ?>">
                        <?= htmlspecialchars($rol->nombre) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn-submit">Guardar</button>
        </div>
    </form>
</div>

<style>
    .data-container {
        max-width: 450px;
        margin: auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f9f9f9;
    }
    .form-group {
        margin-bottom: 15px;
    }
    .form-control, select {
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
        width: 100%;
    }
    .btn-submit:hover {
        background-color: #0056b3;
    }
</style>
