<?php

    if(isset($_GET["ganador"])){
SESSION_START();
                $ganador=$_GET["ganador"];
                $pc=$_GET["pc"];
                $humano=$_GET["humano"];
                $usuario_id=$_SESSION["usuario_id"];//Me traigo la variable desde el servidor.
                $fecha=date("Y-m-d H:i:s");

                $value=$_GET["Palabras"];
                
                include "../conexion.php";

                $sql = "INSERT INTO ganador(usuario_id,
                                                ganador,
                                                pc,
                                                humano,
                                                fecha)
                            VALUES ('".$usuario_id."',
                                    '".$ganador."',
                                    '".$pc."',
                                    '".$humano."',
                                    '".$fecha."')"; 
//Cada partida guardada tendrá el usuario_id como un campo. Eso me va a permitir que cada usuario vea sus datos, sus partidas. 
            $res=mysqli_query($link, $sql);
              
            if($res){

                header("location: ../frm/frm_piedra.papel.tijera.php?value=".$_GET["value"]."&INFORMACION=GUARDAR_EXITO&usuario_id=".$_SESSION['usuario_id']."&ganador=$ganador&humano=$humano&pc=$pc");//Me vuelvo a llevar las variables vía URL (GET) al archivo piedra.papel.tijera.php para poder mostrar allí qué eligió cada uno y quién es el ganador.

            }

    }


?>