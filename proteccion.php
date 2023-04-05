<?php

    SESSION_START();

    if(!isset($_SESSION["usuario"])){

        header("location:index.php?INFORMACION=PROHIBIDO");
        exit();

    }

?>


<!-- Código que utilizaré mucho. Es de seguridad. Siempre debe iniciar sesión. 
    La seguridad es clave para cualquier programa, app o página web.-->