
        <div class="data-container">
           <form action="/tipoUsuario/update" method="post">
                <div class="form-group">
                    <label for="">Id del tipo de usuario</label>
                    <input type="text" readonly value="<?php echo $tipoUsuario->id ?>" name="txtId" id="txtId" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Nombre del tipo de usuario</label>
                    <input type="text" value="<?php echo $tipoUsuario->nombre ?>" name="txtNombre" id="txtNombre" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit">Editar</button>
                </div>
           </form>
        </div>
