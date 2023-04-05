<!-- A este archivo cualquiera pued entrar desde el indexpara crear un nuevo usuario. Eso sí, los usuarios acá creados serán usuarios (rol_id=1) predeterminadamente, no ADMINISTRAORES. Solo un Administrador puede, desde frm_usuarios.php, crear más administradores o invitados. -->
<!doctype html>
<html lang="es">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Con la etiqueta meta de arriba el tamaño se ajusta a la pantalla del dispositivo que use el usuario al emplear Boostrap. -->

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <!-- Boostrap-JS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
        <title>Crear usuario</title>

        <style>

            body{

                background:yellow;

            }
        
        </style>

    </head>

    <body>

        <div class="container text-center">

            <?php
                
                 include "../alertas.php";

            ?>

            <div class="row">

                <div class="col-12">

                    <h1 style="color:purple">Crear un nuevo usuario</h1>

                </div>

            </div> <?php //div que me cierra la primera fila. ?>

            <br>


            <div class="row">

                <div class="col-4">

                    &nbsp;

                </div>

                <div class="col-4">

                    <form action="../acc/acc_nuevo_usuariocomun.php?rol_id=2&imagen=../img/usuario.png" method="POST">
                    <!-- Obviamente, el método para enviar las variables debe ser POST para que no se vea la contraseña en el url. -->
                    <!-- Me llevo vía url (GET) el rol_id que será 2 sí o sí, usuario. -->
                    <!-- Me llevo vía url (GET) la variable imagen con la ubicación en mi pc de la imagen del usuario en blanco. Eso lo guardaré en la base de datos. Así, el usuario tendra esa imagen hasta que la edite y agregue la que él desee. -->
                   
                        <div class="form-group">

                            <label for="usuario">Usuario</label>    
                            <input type="text" class="form-control" name="usuario" placeholder="Ej: xardas" required>

                        </div>

                        <div class="form-group">

                            <label for="pass">Contraseña</label>
                            <input type="password" minlength="9" maxlength="23" class="form-control" name="pass" placeholder="4838" required>
                            <!-- Viste que suele haber un mínimo de caracteres requeridos en las contraseñas por una cuestión de seguridad. Bueno, el atributo minlength determina el mínimo de caracteres. Por su parte, maxlength determina el máximo de caracteres. -->
                        </div>

                        <div class="form-group">

                            <label for="pass2">Confirmar ontraseña</label>
                            <input type="password" minlength="9" maxlength="23" class="form-control" name="pass2" COnfirmar laceholder="4838" required>
                          
                        </div>
                        <!-- Poniendo otro form-group con una segunda contraseña hago que el usuario se asegure de haber escrito bien la contraseña. En acc_nuevo_usuariocomun.php, los datos se guardarán si (if) pass y pass2 son iguales (==) -->

                        <div class="form-group">

                            <label for="color">¿Cuál es tu color favorito?</label>

                            <select class="form-control" name="color">

                                <option value="table-active">Negro</option>
                                <option value="table-danger">Rojo</option>
                                <option value="table-warning">Amarillo</option>
                                <option value="table-success">verde</option>

                            </select>

                        </div>
                        
                        <button type="submit" class="btn btn-primary" name="boton">Guardar usuario</button>

                    </form>
                    <br> <br> <br> <br>
                    <a href="../index.php" class="btn btn-warning">Volver a inicio de sesión<i class="bi bi-arrow-90deg-left"></i></a>
                        <!-- Fijate que es un vínculo. Tiene forma de botón, pero es un vínculo que me lleva al archivo frm_crear_usuario.php -->

                </div>

           

                <div class="col-4">

                    &nbsp;

                </div>

            </div> <?php //ese div me cierra la segunda fila ?>

        </div>
    
    </body>

</html>
