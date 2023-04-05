<?php

    SESSION_START();

    $chau=SESSION_DESTROY();//Destruye las variables de sesión guardadas en el servidor. Es  para cerrar sesión. Obviamente, para acceder a esas variables y destruirlas debo escribir, primero, SESSION_START();

    if($chau){ //Si existe la variable $chau (o sea, si las variables de sesión almacenadas en el servidor fueron destruidas y, por ende, se cerró sesión), hacé la siguiente función o actividad:

        header("location: ../index.php?INFORMACION=CERRAR_EXITO");//Reedirijime a index.php con CERRAR_EXITO como valor de la variable INFORMACION enviada vía url (GET).

    }else{ //Si no existe la variable $chau (y, por ende, no fueron destruidas las variables de sesión almacenadas en el servidor, por lo que no se cerró sesión), hacé la siguiente función o actividad:

        header("location: ../frm/frm_piedra.papel.tijera.php?CERRAR_FRACASO");//Reedirijime al archivo del juego con CERRAR_FRACASO como valor de la variable INFORMACION.

    }
?>

<!-- Cuando clickeo en el partado "cerrar sesión" de la barra, el sistema me redirije a este archivo, el cual trae las variables de sesión almacenadas en el servidor (SESSION_START();), me las destruye (SESSION_DESTROY();) y me redirije a index.php para que inicie sesión nuevamente. -->