<?php

    if(isset($_GET["usuario_id"])){

        $usuario_id=$_GET["usuario_id"];
        $pass=$_GET["pass"];

        include "../conexion.php";

        $sql = "SELECT * FROM usuarios WHERE usuario_id=".$usuario_id."";//Traeme (SELECT) todos (*) los campos de (FROM) la tabla usuarios de la base de datos piedra_db (conectada con el include) en donde el campo usuario_id sea igual a la variable $usuario_id que me traje vía GET.

        $res = mysqli_query($link, $sql);

        $fila=mysqli_fetch_array($res);//Con la consulta mysqli_fetch_array hago visibles a los datos que traigo de la base de datos cuando los convoque. Por eso, en placeholder puedo poner que se vea el usuario haciendo echo $fila["usuario"]

?>

<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Boostrap, librería de CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <!-- Boostrap, librería de JS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

        <title>Editar usuarios</title>

        <style>

            body{

                background:black;
            }

        </style>

    </head>

    <body>
        <?php

            $pass=$_GET["pass"];

        ?>

        <div class = "conteiner text-center">    
                <br><br>
            <div class="row">

                <div class="col-12">

                    <h1 style="color:purple">Editar usuario</h1>

                </div>
                
            <br><br><br>

            </div>

            <div class="row">

                <div class="col-4">

                    &nbsp;

                </div>

                <div class="col-4">

                    <form method="POST" action="../acc/acc_editar_usuario.php?pass=<?php echo $pass ?>&usuario_id=<?php echo $usuario_id ?>">
                        <!-- Acordate que el valor del campo usuario_id me lo tengo que llevar sí o sí para en acc_editar_usuario.php saber qué usuario_id editar!!! -->
                        <!-- Me debo llevar el valor de la contraseña inicial (pass)  para que el usuario luego ingrese ese valor y se compruebe si lo que ingresó el usuario (pass0) corresponde a su contraseña incial. Es un mecanismo de seguridad que suelen tener las páginas o aplicaciones_ que el usuario vuelva a ingresar su contraseña original antes de ditar los datos. -->
                        <div class="form-group">

                            <label for="usuario"><h4 style="color: red">Usuario</h4></label>
                            <input type="text" name="usuario" class="form-control" placeholder="<?php echo $fila["usuario"]  ?>" required>
                                <!-- Recordar que puedo hacer "visibles", "legibles" a los datos que me traigo de la base de datos con la consulta mysli_fecth_array. -->
                        </div>

                        <div class="form-group">

                            <label for="pass0"><h4 style="color: red">Contraseña inicial</h4><label>
                            <input type="password" name="pass0" class="form-control" placeholder="Ej: pepe" required>
<!-- Es común que el usuario deba ingresar su contraseña original antes de editar un dato suyo. Luego, en el archivo acc_editar_usuario.php, mediante una estructura condicional (if) comprobaré si se ingresó la contraseña correcta para continuar con la edición. -->
                        </div>
                        <div class="form-group">

                            <label for="pass1"><h4 style="color: red">Nueva contraseña</h4></label>
                            <input type="password" name="pass1" class="form-control" placeholder="Ej: 32323232iiodsds" required>

                        </div>

                        <div class="form-group">

                            <label for="pass2"><h4 style="color: red">Confirmar la nueva ontraseña</h4></label>
                            <input type="password" name="pass2" class="form-control" placeholder="Ej: wrwrwrwfwfwfwfwf" required>

                        </div>

                        <div class="form-group">

                            <label for="rol_id"><h4 style="color: red">Rol</h4></label>
                            <select class="form-control" name="rol_id">

                                <?php if($fila["rol_id"]==1){ ?>
                                <option value="1" selected>Administrador</option>
                                <?php }else{ ?>
                                <option value="1">Administrador</option>
                                <?php } ?>
                                <?php  if($fila["rol_id"]==2){?>
                                <option value="2" selected>Usuario</option>
                                <?php }else{ ?>
                                <option value="2">Usuario</option>
                                <?php } ?>
                                <?php if($fila["rol_id"]=3){ ?>
                                <option value="3" selected>Invitado</option>
                                <?php }else{ ?>
                                <option value="3">Invitado</option>
                                <?php } ?>
                                
                                <!-- Con los if hago que aparezca de manera predeterminada (selected) el rol original del usuario. Por eso, por ejemplo, si rol_id es igual a 1 aparecerá como opción predeterminada Administrador; sino, aparecerá como una opción más. Y así con cada tipo de rol.  -->
                            </select>

                        </div>

                        <button type="submit" name="boton" class="btn btn-success">Actualizar datos del usuario</button>

                    </form>

                </div>

                <div class="col-4">

                    &nbsp;

                </div>

            </div>


            <?php

                    }

            ?>

        </div>

    </body>

</html>