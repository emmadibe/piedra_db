<?php 
    include "../conexion.php";
    $sql = "SELECT * FROM usuarios WHERE usuario_id = ".$usuario_id;
    $res = mysqli_query($link, $sql);
    $jaja = mysqli_fetch_array($res);
?>

<div class="modal" tabindex="-1" id="modal_editar_usuario">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title ">Editar usuario!!</h5>
                <br>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <h6> Hola, <?php echo $_SESSION["usuario"] ?>.</h6> 
                <br>
                <h6> ¿Vas a editar al siguiente usuario?</h6>
                <form action="../acc/acc_nuevo_usuario.php" method="POST">
                    <div class="form-group">
                        <label for="usuario">Usuario</label>
                        <input type="text" class="form-control" id="modal_editar_usuario_usuario" name="usuario" placeholder="Ej.: Emma" required>
                    </div>
                    <div class="form-group">
                        <label for="pass">Contraseña</label>
                        <input type="password" class="form-control" id="modal_editar_usuario_pass" name="pass" placeholder="Ej.: Emma" required>
                    </div>
                    <div class="form-group">
                        <label for="rol_id">Rol</label>
                        <select class="form-control" name="rol_id" id="modal_editar_usuario_rol">
                            <?php while($opcion=mysqli_fetch_array($res_roles)){   ?> 
                                    <option value=<?php echo $opcion["rol_id"] ?>> <?php echo $opcion["rol"] ?> </option>
                            <?php }/*while*/ ?>
                        </select>
                    </div>
                </form>
           

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <a id="modal_editar_usuario_guardar" class="btn btn-success">Guardar cambios</a>
            </div>
        </div>
        </div>
    </div>