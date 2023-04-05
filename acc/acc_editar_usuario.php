<?php

    if(isset($_POST["usuario"]) AND 
        isset($_GET["pass"])AND
        isset($_POST["rol_id"])AND
        isset($_GET["usuario_id"])AND
        isset($_POST["pass2"])){

            $usuario=$_POST["usuario"];
            $pass=$_GET["pass"];
            $pass0=$_POST["pass0"];
            $pass1=$_POST["pass1"];
            $pass2=$_POST["pass2"];
            $rol_id=$_POST["rol_id"];
            $usuario_id=$_GET["usuario_id"];
            
            include "../config.php";

            SESSION_START();
            
        if($_GET["pass"] == $_POST["pass0"]){

            if($_POST["pass1"] == $_POST["pass2"]){

                include "../conexion.php";

                $sql = "UPDATE usuarios SET usuario='".$usuario."',
                                            pass='".$pass1."',
                                            rol_id=".$rol_id." 
                                        WHERE usuario_id=".$usuario_id;
                //O sea, en esta consulta le digo al sistema: Actualizame (UPDATE) los siguientes campos (usuario, pass, rol_id) de la tabla usuarios con los valores de las variables que me traje en donde (WHERE) el campo usuario_id sea igual al valor de la variable $usuario_id que me traje vía GET. Por eso fue tan importante traerme el dato de usuario_id, para identificar qué datos actualizar. 

                $res = mysqli_query($link, $sql);

                if($res){

                header("location:../frm/frm_piedra.papel.tijera.php?INFORMACION=EDITAR_EXITO&usuario_id=".$usuario_id."");

                }else{//Si existe $res y, por ende, los datos fueron actualizados correctamente en la base de datos, reedirijime a frm_usuarios.php con EDITAR_EXITO como valor de la variable INFORMACION enviada vía url (GET).

                    header("location:../frm/frm_editar_usuario.php?INFORMACION=EDITAR_FRACASO");


                }//Si no existe $res y, por ende, los datos NO fueron actualizados correctamente, reedirijime a frm_usuarios.php con EDITAR_FRACASO como valor de la variable INFORMACION enviada vía url (GET).

            }else{

                header('location: ../frm/frm_editar_usuario.php?INFORMACION=USUARIO_MALPASS2');

            }
        }else{

            header('location: ../frm/frm_piedra.papel.tijera.php?INFORMACION=PASS0_ERROR&usuario_id='.$_SESSION["usuario_id"],'');

        }
    
    }else{

        echo '<h1 style="color:red">Debe pasar por el formulario primero</h1>';

        echo '<a href="../frm/frm_usuarios.php" class="btn btn-danger">Volver al formulario</a>';

    }//Si nunca me traje las variables $usuario, $pass, $rol_id y $usuario_id, saltará un cartel grande de color rojo que diga "Debe pasar por el formulario primero", junto con un botón rojo que lo lleva a frm_usuarios.php.

?>