
        <div class="data-container">
            <a class="btn-add" href="/tipoUsuario/new">+</a>
            <?php
            if (empty($tipoUsuarios)) {
                echo "<br>No se encuentran tipos de usuario en la base de datos";
            } else {
                foreach ($tipoUsuarios as $key => $value) {
                    echo "<div class='record'>
                        <span>ID: $value->id - $value->nombre</span>
                        <div class='buttons'>
                            <a href='/tipoUsuario/view/".$value->id."'>Consultar</a>
                            <a href='/tipoUsuario/edit/".$value->id."'>Editar</a>
                            <a href='/tipoUsuario/delete/".$value->id."'>Eliminar</a>
                        </div>
                    </div>";
                }
            }
            ?>
        </div>
