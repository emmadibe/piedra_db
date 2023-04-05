<?php

if(isset($_POST["color"])){

    $color=$_POST["color"];
    $usuario_id=$_GET["usuario_id"];

    include "../conexion.php";

    $sql = "UPDATE usuarios SET color = '".$color."' WHERE usuario_id = ".$usuario_id;

    $res = mysqli_query($link, $sql);

    header ("location:../frm/frm_piedra.papel.tijera.php?usuario_id=$usuario_id&color=$color&INFORMACION=COLOR_EXITO");

}

?>
<!-- Color no es una variable que deba ser guardada en la base de dato. La idea es que el usuario pueda cambiar de colores a su placer.  -->