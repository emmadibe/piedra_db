<?php 
    include "../conexion.php";
    $sql = "SELECT * FROM usuarios WHERE usuario_id = ".$usuario_id;
    $res = mysqli_query($link, $sql);
    $jaja = mysqli_fetch_array($res);
?>

<div class="modal" tabindex="-1" id="modal_agregar_img">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title ">Agregar una imagen de perfil</h5>
                <br>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <h6> Hola, <?php echo $_SESSION["usuario"] ?>.</h6> 
                <br>
                <h6> ¿Vas a agregarle una imagen a tu perfil de usuario?</h6>
                <form action="#" method="GET">
                    <div class="form-group">
                        <label for="img">Imagen de perfil</label>
                        <input type="file" class="form-control" accept="image/*" id="agregar_img" name="img" required>
                        <!-- Para que el usuario deba subir un archivo, en el atributo type debo escribir el valor "file". Para que ese archivo sea una imagen, debo utilizar el atributo accept y agregarle el valor "image/*". Ello hace que los archivos que el usuario pueda seleccionar tengan la extensión .png, .jpg o .gif; o sea, los formatos de imágenes. -->
                    </div>
                  
                </form>
           

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <a id="modal_agregar_imagen_guardar" class="btn btn-success">Guardar imagen</a>
            </div>
        </div>
        </div>
    </div>