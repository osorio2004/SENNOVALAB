<div class="data-container">
    <?php if (isset($usuario) && is_object($usuario)): ?>
        <div class="record">
            <p><strong>ID:</strong> <?= htmlspecialchars($usuario->idUsuario) ?></p>
            <p><strong>Nombre:</strong> <?= htmlspecialchars($usuario->nombre) ?></p>
            <p><strong>Apellido:</strong> <?= htmlspecialchars($usuario->apellido) ?></p>
            <p><strong>Correo Electrónico:</strong> <?= htmlspecialchars($usuario->correoElectronico) ?></p>
            <p><strong>Rol:</strong> <?= htmlspecialchars($usuario->nombreRol) ?></p>
        </div>
    <?php else: ?>
        <p class="no-data">No se encontraron datos del usuario.</p>
    <?php endif; ?>
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
    .record p {
        margin: 8px 0;
        font-size: 14px;
    }
    .no-data {
        color: red;
        font-weight: bold;
        text-align: center;
    }
</style>
