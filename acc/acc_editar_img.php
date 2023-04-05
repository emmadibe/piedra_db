<?php

    if  (isset($_GET["usuario_id"]) AND 
        isset($_GET["imagen_nueva"])){

            $usuario_id=$_GET["usuario_id"];
            $imagen_nueva=$_GET["imagen_nueva"];

        include "../conexion.php";

        $sql = "UPDATE usuarios SET imagen = '".$imagen_nueva."'
                                    WHERE usuario_id = ".$usuario_id;
                                    
       $res = mysqli_query($link, $sql);
       
       $respuesta = $res;
       echo json_encode($respuesta);

        }

?>