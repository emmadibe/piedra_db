<!-- En este archivo yo me traigo las variables defrm_usuarios.php ($usuarios, $pass y $rol_id) y las guardo en mi base de datos piedra_db en la tabla usuarios -->
<?php

    if(isset($_POST["usuario"]) AND
       isset($_POST["pass"])AND
       isset($_POST["rol_id"])){

        $usuario=$_POST["usuario"];
        $pass=$_POST["pass"];
        $rol_id=$_POST["rol_id"];
        $fecha=date("Y-m-d H:i:s");//A la fecha me la traigo desde la base de datos; pues, es algo que debe estar completado automáticamente, no que el usuario la seleccione. 

        include "../conexion.php";//Me conecto al servidor de la base de datos y a mi base de datos. 

        $sql = "INSERT INTO usuarios(usuario, 
                                        pass,
                                         rol_id,
                                          fecha)
                                          
                            VALUES('".$usuario."',
                                    '".$pass."',
                                    ".$rol_id.", 
                                    '".$fecha."')";
//Como rol_id es un número, va solo con comillas dobles "".

        $res=mysqli_query($link,$sql);

        if($res){
            header("location:../frm/frm_usuarios.php?INFORMACION=USUARIO_EXITO");
        }else{
            header("location:../frm/frm_usuarios.php?INFORMACION=USUARIO_FRACASO");
        }//if res


       }else{
        header("location:../frm/frm_usuarios.php?INFORMACION=FORMULARIO");
        }//if isset

?>