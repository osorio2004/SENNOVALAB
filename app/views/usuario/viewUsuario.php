<div class="data-container">
    <?php
    if (isset($usuario) && is_object($usuario)) {
        echo "<div class='record record-column'>
                <span>ID: $usuario->id</span>
                <span>Nombre: $usuario->nombre</span>
              </div>";
    } else {
        echo "<div>No se encontró el usuario.</div>";
    }
    ?>
</div>