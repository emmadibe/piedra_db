<?php

    if(isset($_GET["usuario_id"])){
        $usuario_id=$_GET["usuario_id"];

        include "../conexion.php";

        $sql = "SELECT * FROM usuarios WHERE usuario_id = ".$usuario_id;
        $res = mysqli_query($link, $sql);

        $respuesta = mysqli_fetch_array($res);
        echo json_encode($respuesta);


    }

?>