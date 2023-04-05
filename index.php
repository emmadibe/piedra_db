<!-- Acordate que el archivo donde inicio sesión debe llamarse index. Pues, el sistema siempre abre el archivo index primero por defecto. -->

<!DOCTYPE html>
<html lang="es">

    <head>

        <meta charset="utf-8">
        <meta name="viewport"  content="width=device-width, initial-scale=1, shrink-to-fit=no">

         <!-- Bootstrap CSS -->
         <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
         <!-- Boostrap JS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

        <title>Iniciar sesión</title>

        <style>

            body{

                background: pink;

            }

        </style>

    </head>

    <body>

        <?php
          
            SESSION_START();

            if(isset($_GET["INFORMACION"])){

                include "alertas.php";

            }

        ?>

        <div class="conteiner text-center">

            <div class="row">

                <div class="col-12">

                    <br><hr><h1 style="color: #F5DEB3 ">Iniciar sesión<hr></h1>

                </div>

            </div>

            <div class="row">

                <div class="col-4">

                    &nbsp;

                </div>

                <div class="col-4">

                    <form action="acc/acc_autorizacion.php" method="POST">

                        <div class="form-group">

                            <label for="usuario">Ingrese usuario</label>
                            <input type="text" class="form-control" name="usuario" required>

                        </div>

                        <div class="form-group">

                            <label for="pass">Ingrese contraseña</label>
                            <input type="password" class="form-control" name="pass" required>

                        </div>

                        <button type="submit" class="btn btn-success" name="boton">Iniciar sesión</button>

                        <br><br><br><br><br>

                        <a href="frm/frm_crear_usuario.php" class="btn btn-warning">Crear nuevo usuario<i class="bi bi-align-center"></i></a>
                        <!-- Fijate que es un vínculo. Tiene forma de botón, pero es un vínculo que me lleva al archivo frm_crear_usuario.php -->

                    </form>

                </div>

                <div class="col-4">

                    &nbsp;

                <div class="col-4">

            </div>

        </div>

        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
        <!-- Lo de arriba son los links que debo copiar de Boostrap para que las alertas se vean.  -->

        <script>//Con la etiqueta de apertura y cierre <script> abro y cierro JS. 
        //Cambiemos las alertas para que desaparezcan después de unos segundos:
                $(document).ready(function(){//Lo que le digo al sistema es: Al presente arhivo ($(document)) cuando esté listo (ready) hacele la siguiente función o acción (function):
                        
                    $('.alert button').hide();

                        setInterval(function(){
                            $('.alert').hide("slow");
                        }, 2000);
                });//documento ready.

        </script>
    </body>

</html>
