<?php

    if(isset($_GET["modo"]) AND
       isset($_GET["choose"])AND
       isset($_GET["usuario_id"])){

            $modo = $_GET["modo"];
            $choose = $_GET["choose"];
            $usuario_id = $_GET["usuario_id"];
            $fecha = date("Y-m-d H:i:s");

            $correcto = rand(1, 3);

            include "../conexion.php";

            $sql = "INSERT INTO cofres (usuario_id,
                                        modo,
                                        choose,
                                        correcto,
                                        fecha)
                        VALUES (".$usuario_id.",
                                '".$modo."',
                                ".$choose.",
                                ".$correcto.",
                                '".$fecha."')";
//Guardame en la base de datos (INSERT INTO) piedra_db (lo comboqué con el include conexion.php) en la tabla cofres los campos usuario_id, modo, choose, correcto y fecha con los valores (VALUE) $usuario_id, $modo, $choose, $correcto y $fecha.
            $res=mysqli_query($link, $sql);//Terminan de guardarse los datos. 

            if($res) {

                header("location: ../frm/frm_juego_puertas.php?choose=$choose&correcto=$correcto&modo=$modo&usuario_id=$usuario_id"); //Me reedirige automáticamente al archivo del juego y se lleva todas esas variables vía url. Son necesarias para que no salte ningún error y para el buen funcionamiento del juego. Por ejemplo, debo llevar qué valor eligió el usuario y cuál la PC.

            }

       }

?>