
        <div class="data-container">
            <?php
            if ($tipoUsuario && is_object($tipoUsuario)) {
                echo "<div class='record'>
                        <span>ID: $tipoUsuario->id - </span>
                        <span>Nombre: $tipoUsuario->nombre</span>
                      </div>";
            }
            ?>
        </div>
