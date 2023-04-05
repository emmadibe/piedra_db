<?php

    if(isset($_GET["usuario_id"])){
    
        $usuario_id=$_GET["usuario_id"];
    
        include "../conexion.php";

        $sql= "DELETE FROM usuarios WHERE usuario_id=$usuario_id"; //Boorame (DELETE) los campos que tengas de (FROM) la tabla ganador de la base de datos piedra_db (convocada con el include) en donde (WHERE) el campo usuario_id sea igual a la variable usuario_id que me traigo vía GET. 

        $res=mysqli_query($link, $sql);

    }
    $json=array();//Establezo el array json.
    $json["datos_consulta"]=$res;//Dentro de ese array creo el campo datos_consulta y le agrego como valor la variable $res. Acordate que el valor de $res (la consulta mysqli_query) devuelve true, si se hizo la consulta anterior (DELETE, en mi caso); o false; si no se hizo.
    echo json_encode($json);//Mostrame el array en pantalla. La función json_encode(); me codifica el array para que sea visible.
    //El json es para tirar un alerta, por ejemplo. Como no puedo enviar una variable vía url (pues, no hay reedireccionamiento) con estos códigos y con el true o false que me tira res puedo hacer un cartelito. Por supuesto, el dato se borraría igual de la base de datos sin esto. Pero, siempe está bueno que un evento me devuelva algo. 
    //Por ejemplo, si $res me devuelve true el cartel puede decir: "el dato fue borrado".

?>