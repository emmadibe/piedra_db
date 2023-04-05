<?php

if(isset($_GET["INFORMACION"])){
        
        if(isset($_GET["usuario_id"])){ 
                 //Con este if no me va a tirar un error de UNDEFINIDED variable usuario_id. Es que, por ejemplo, cuando inicio sesión, existe la variable INFORMACION enviada vía url (GET), pero no usuario_id. 
                $usuario_id=$_GET["usuario_id"];
                include "conexion.php";
                $sql = "SELECT * FROM usuarios WHERE usuario_id=".$usuario_id;
                $res = mysqli_query($link, $sql);
                $filita = mysqli_fetch_array($res);
                
                //Con esto, tengo más opciones para los carteles. No sé por qué, si cuando edito el usuario pongo Excelente, $_SESSION["usuario"] sigue saltando el nombre del usuario no editado. En cambio, si escribo Excelente,  $_filita["usuario"] ? sale el cartel con el nuevo nombre del usuario.
        }

     

        include "config.php";

//Incluyo el config.php para poder incluir en la alerta de SESION_EXITO (la cual aparece si el usuario y contraseña son correctos) el mensaje que dice: Bienvenido, $_SESSION [usuario]. Así, por ejemplo, si inicia sesión el usuario Emmanuel va a decir: "Bienvenido, Emmanuel".

    $info=$_GET["INFORMACION"];

    switch($info){

        case "ELIMINADO_EXITO";

?>

            <div class="alert alert-success" role="alert">
            <p>Muy bien, <?php echo $_SESSION["usuario"] ?>.</p>
            <!-- Me va a tirar el valor del campo usuario que lo traigo del servidor. Está bueno. -->
            <p>Partida eliminada con éxito!</p>
            </div>

<?php

        break;

?>

<?php

        case "ERROR_CREDENCIALES";

?>

            <div class="alert alert-dark" role="alert">
                Usuario y/o contraseña incorrectos!
            </div>

<?php

        break;

?>


<?php

        case "SESION_EXITO";

?>
                     
             <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">EXCELENTE!</h4>
                <p>Sesión iniciada con éxito.</p>
                <hr>
                <p class="mb-0">Bienvenido, <?php echo @$_SESSION["usuario"]  ?>.</p>
            </div>

<?php

        break;

?>

<?php

        case "USUARIO_EXITO";

?>
                     
             <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">EXCELENTE!</h4>
                <p>Usuario creado con éxito.</p>
                <hr>
            </div>

<?php

        break;

?>

<?php

        case "EDITAR_EXITO";

?>
                     
             <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">EXCELENTE, <?php echo $filita["usuario"] ?>!</h4>
                <p>El usuario fue editado con éxito.</p>
                <hr>
            </div>

<?php

        break;

?>

<?php

        case "USUARIO_EXITO2";

?>
                     
             <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">EXCELENTE!</h4>
                <p>Usuario creado con éxito.</p>
                <hr>
                <p>Ahora inicie sesión para jugar.</p>
                <hr>
            </div>

<?php

        break;

?>

<?php

        case "USUARIO_FRACASO";

?>

            <div class="alert alert-dark" role="alert">
                No se pudo crear ni guardar el usuario!
            </div>

<?php

        break;

?>

<?php

        case "GUARDAR_EXITO";

?>
                     
                <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading">EXCELENTE!</h4>
                        <p>Partida de <?php echo $filita["usuario"] ?> guardada con éxito.</p>
            
                </div>
                <!--  Pude descubrir que convocando la variable desde el fetch_array, se actualiza más rápido cuando edito un usuario que trayéndola desde el servidor con $_SESSION. Si, en vez de escribir $filita["usuario"] escribía $_SESSION["usuario"], recién el cartel se actualizaría con el nombre del usuario editado cuando cierro y vuelvo a iniciar sesión.  -->
<?php

        break;

?>


<?php

        case "CERRAR_EXITO";

?>
                     
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Okay...</strong> See you later.
        </div>

<?php

        break;

?>

<?php

        case "OKEY";

?>
                     
        <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Okay...</strong> Format has been changed with success.
        </div>

<?php

        break;

?>

<?php

        case "CERRAR_FRACASO";

?>

            <div class="alert alert-dark" role="alert">
                No se pudo cerrar sesión!
            </div>

<?php

        break;

?>

<?php

        case "USUARIO_MALPASS";

?>

        <div class="alert alert-danger" role="alert">
                <h4 class="alert">NO SE PUEDO CREAR EL USUARIO!</h4>
                <p>NO COINCIDEN LAS CONTRASEÑAS.</p>
                <hr>
        </div>
<?php

        break;

?>

<?php

        case "PASS0_ERROR";

?>

        <div class="alert alert-danger" role="alert">
                <h4 class="alert">NO SE PUEDO EDITAR EL USUARIO!</h4>
                <p>ERROR AL ESCRIBIR LA CONTRASEÑA INICIAL.</p>
                <hr>
        </div>
<?php

        break;

?>

<?php

        }

}

?>