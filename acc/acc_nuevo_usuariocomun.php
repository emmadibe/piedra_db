<?php

    if(isset($_POST["usuario"]) AND
        isset($_POST["pass"])){

            $usuario=$_POST["usuario"];
            $pass=$_POST["pass"];
            $pass2=$_POST["pass2"];
            $color=$_POST["color"];
            $imagen=$_GET["imagen"];//A la variable imagen me la traje vía GET.
            $rol_id=$_GET["rol_id"];//Acordate que me la traje vía url. Pues, no lo elije el usuairo. Sí o sí es 2 (usuario).

        if($_POST["pass"] == $_POST["pass2"]){
            //De esta manera, si el usuario se equivocó al reescribir su contraseña, los datos no serán guardados. 
            include "../conexion.php";//Me conecta al servidor de la base de datos y a la base de datos.

            $sql = "INSERT INTO usuarios(usuario, 
                                            pass,
                                            rol_id,
                                            fecha,
                                            color,
                                            imagen)
                                    VALUE('".$usuario."',
                                            '".$pass."',
                                            ".$rol_id.",  
                                            '".$fecha."',
                                            '".$color."',
                                            '".$imagen."')"; 

            //Me guarda en la BASE DE DATOS piedra_db en la TABLA usuarios los valores, traídos por las variables vía POST y GET, de los CAMPOS usuario, pass, rol_id y fecha. 
            $res = mysqli_query($link, $sql);

            header("location: ../index.php?INFORMACION=USUARIO_EXITO2&color=".$color."");
            //<!-- Me llevo, también vía url, la variable imagen con la ubicación de mi imagen de usuario en blanco. Así, la imagen de perfil del usuario será esa hasta que sea editada en barra.  -->
        }else{

            header("location: ../frm/frm_crear_usuario.php?INFORMACION=USUARIO_MALPASS");            

        }
//O sea, si pass es igual a pass2, me va a guardar los valores de las variables que les traje en los campos seleccionados de la tabla usuarios de la base de datos piedra_db(convocada con el input). Luego, me reedirige a index.php con el valor USUARIO_EXITO" de la variable INFORMACION y el valor $color para la variable color (lo envía vía url todo).
//Sino, si pass no es igual pass2, me reedirige a index.php con el valor USUARIO_MALPASS de la variable INFORMACION enviada vía GET. Gracias al código puesto en el archivo alertas.php, en index.php saldrá un cartel que diga "las contraseñas no coinciden". 
    }

?>
