<?php

    SESSION_START();

    if(isset($_POST ["usuario"]) AND isset($_POST["pass"])){

        $usuario=$_POST["usuario"];
        $pass=$_POST["pass"];

        include "../conexion.php";

        $sql= "SELECT * FROM usuarios WHERE usuario='".$usuario."' AND pass='".$pass."'";//Traeme de la base de datos piedra_db (conectada ya con el include) todos (*) los CAMPOS con sus valores que tengas de la TABLA usuarios en donde el campo usuario sea igual a $usuario y el campo pass igual a $pass (o sea, que sea del usuario ingresado).

        $res=mysqli_query($link, $sql);//Transformo los datos en un array.

        $datos=mysqli_fetch_array($res);//Me decodifica los datos en forma de array.

        if(mysqli_affected_rows($link)){//el affected es una consulta que permite ver si hay una coincidencia. Si marca 1, hay coincidencia ( o sea, el usuario fue bien ingresado); sino, 0. //Si encontraste alguna fila (lo cual quiere decir que el usuario y la contraseña ingresados son correctos) hacé lo siguiente:

            $_SESSION["usuario"]=$usuario;

            $_SESSION["usuario_id"]=$datos["usuario_id"];//Traeme los datos de ese usuario_id.
            $_SESSION["rol_id"]=$datos["rol_id"];//Traeme los datos de ese usuario_id.

            //De esta manera, en los otros archivos voy a poder, escribiendo la variable $_SESSION, traerme los valores de los siguientes campos de la tabla usuarios de la base de datos piedra_db: "usuario", "usuario_id" y de "rol_id"

            header("location: ../frm/frm_elegir_juego.php?INFORMACION=SESION_EXITO&usuario_id=".$_SESSION["usuario_id"]."");//Solo me dirijirá a la página del juego si hay una coincidencia entre el usuario y la contraseña.

        }else{

            header("location: ../index.php?INFORMACION=ERROR_CREDENCIALES"); // Si no hay coincidencia entre los campos usuairo y pass y los valores ingresados por el usuario en el formulario, lo reedirigirá de nuevo al index llevando la variable INFORMACION vía url con el valor string ERROR_CREDENCIALES.

        }

    }
?>