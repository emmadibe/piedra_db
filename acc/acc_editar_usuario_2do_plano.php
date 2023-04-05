<?php
//Me descargo las variables que me traje con la función .get de frm_usuarios.php
    if(isset($_GET["usuario"]) AND 
        isset($_GET["usuario_id"]) AND
        isset($_GET["pass"]) AND
        isset($_GET["rol_id"])){

        $usuario = $_GET["usuario"];
        $pass = $_GET["pass"];
        $usuario_id = $_GET["usuario_id"];
        $rol_id = $_GET["rol_id"];
        $fecha = date("Y-m-d H:i:s");

            
        include "../conexion.php";//Las sentencias en ese archivo incluido me conectan al servidor de mi base de datos y a mi base de datos (piedra_db)

        $sql = "UPDATE usuarios SET usuario='".$usuario."',
                                    pass='".$pass."',
                                    rol_id=".$rol_id.",
                                    fecha_edicion='".$fecha."'
                                    WHERE usuario_id=".$usuario_id;
//Lo que le dije al sistema con la consulta UPDATE fue: actualizame (UPDATE) los siguientes campos de la tabla usuarios en donde (WHERE) usuario_id sea igual a $usuario_id con los valores de las variabels que te traje: usuario, pass, rol_id, fecha_edicion. O sea, gracias al condicional WHERE, no me actualiza TODOS los campos, sino aquellos en donde usuario_id sea igual a $usuario_id. Como el usuario_id no se repite (el usuario sí puede repetirse) es lo que se usa como referencia para seleccioanr en las consultas qué dato borrar (consulta DELETE) o actualizar (consulta UPDATE).

        
        $res = mysqli_query($link, $sql);//Se terminan de actualizar los campos

        $respuesta = $res;//No utilizo la función mysqli_fetch_array(); porque la consulta UPDATE no te devuelve un array, sino que te devuelve un booleano: pude o no pude (editarlo).
        echo json_encode($respuesta);//Devuelvo a .get en frm_usuarios.php


        }

?>