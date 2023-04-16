<?php
//Todos los códigos de este archivo son ejecutados en segundo plano gracias a la función de JS $.get. Es decir, no hay recargue de página.
    if(isset($_GET["jugada_id"])){

        $jugada_id = $_GET["jugada_id"]; //Es la variable que me traigo desde la función de J $.get

        include "../conexion.php";//Me conecto al servidor de mi base de datos y a mi base de datos piedra_db.
        $sql = "DELETE * FROM cofres WHERE jugada_id=".$jugada_id;//Borrame (DELETE) todos los campos (*) de la tabla cofres de la base de datos piedra_db (conectada mediante el include) en donde el campo jugada_id sea igual a la variable $jugada_id que me traje con $.get. Gracias a que me traigo la variable jugada_id, el sistema sabe qué datos borrar. Pues, no hay dos jugada_id iguales en la tabla cofres.
        $res = mysqli_query($link, $sql);//Me termina de borrar los datos.

    }
    $json=array();//Establezo el array json.
    $json["datos_consulta"]=$res;//Dentro de ese array creo el campo datos_consulta y le agrego como valor la variable $res. Acordate que el valor de $res (la consulta mysqli_query) devuelve true, si se hizo la consulta anterior (DELETE, en mi caso); o false; si no se hizo.
    echo jsno_encode($json);//Mostrame el array en pantalla. La función json_encode(); me codifica el array para que sea visible.
    //El json es para tirar un alerta, por ejemplo. Como no puedo enviar una variable vía url (pues, no hay reedireccionamiento) con estos códigos y con el true o false que me tira res puedo hacer un cartelito. Por supuesto, el dato se borraría igual de la base de datos sin esto. Pero, siempe está bueno que un evento me devuelva algo. 
    //Por ejemplo, si $res me devuelve true el cartel puede decir: "el dato fue borrado".

?>