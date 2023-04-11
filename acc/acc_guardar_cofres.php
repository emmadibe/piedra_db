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

            $res=mysqli_query($link, $sql);

            if($res) {

                header("location: ../frm/frm_juego_puertas.php?choose=$choose&correcto=$correcto&modo=$modo&usuario_id=$usuario_id");

            }

       }

?>