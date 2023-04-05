<?php

    if(isset($_GET["ganador_id"])){
        $usuario_id=$_GET["usuario_id"];//Me traje la variable usuario_id vía urñ (GET).
        $ganador_id=$_GET["ganador_id"];
    
        include "../conexion.php";

        $sql= "DELETE FROM ganador WHERE ganador_id=$ganador_id";
        $res=mysqli_query($link, $sql);

        /////////Me tengo que traer el usuario_id para que no aparezca un UNDEFINIDE después. Eso es por como yo hice las cosas///////
        $sql = "SELECT * FROM usuarios WHERE usuario_id=".$usuario_id;
        $res_usuario = mysqli_query($link, $sql);
        $ver = mysqli_fetch_array($res_usuario);

        if($res){

            header("location: ../frm/frm_piedra.papel.tijera.php?INFORMACION=ELIMINADO_EXITO&usuario_id=$usuario_id");

        }
    }
?>