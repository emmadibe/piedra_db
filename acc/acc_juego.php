<?php
        if (isset($_GET["opcion"])) {


                $opcion=$_GET["opcion"];
                $humano=$_GET["opcion"];
                $usuario_id=$_GET["usuario_id"];
                $value=$_GET["value"];

                include "../conexion.php";
                $sql = "SELECT * FROM usuarios WHERE usuario_id=".$usuario_id;
                $res = mysqli_query($link, $sql);
                $fila = mysqli_fetch_array($res);

            //Obviamente, a las variables las descargo vía GET porque las traje vía URL; o sea, GET.
                include "../config.php";
                
                //compruebo que haya puesto una opción correcta
                if($humano=="Piedra" OR $humano=="Papel" OR $humano=="Tijera"){
                    
                    //elección de la máquina
                    //1. Piedra
                    //2. Papel
                    //3. Tijera
                    $maquina=rand(1,3);
                    
                    //convierto la opción de la máquina en letras para una mejor lectura
                    if($maquina==1){
                        $pc="Piedra";
                    }//if
                    else{
                        if($maquina==2){
                            $pc="Papel";
                        }//IF
                        else{
                            $pc="Tijera";
                        }//ELSE MAQUINA==2
                    }//ELSE MAQUINA==1
;

                    //Primero determino las opciones en que gana la máquina
                    if($humano=="Piedra" AND $pc=="Papel"){
        
                        $ganador="maquina";
                        
                    }
                    else{
                        if($humano=="Papel" AND $pc=="Tijera"){
                           
                            $ganador="maquina";
                            
                        }
                        else{
                            if($humano=="Tijera" AND $pc=="Piedra"){
                                
                                $ganador="maquina";
                                

                            }
                            else{
                                //determino cuando habrá empate
                                if($humano==$pc){
                                    
                                    $ganador="empate";
                                    
                                }
                                //solo queda la opción que haya ganado el usuario.
                                else{
                                     
                                    $ganador = $fila["usuario"];    //Así, aparecerá el nombre del usuario.   
                                                                                     
                                }//else empate
                            }//else tijera vs piedra
                        }//else papel vs tijera
                    }//else piedra vs papel
                    header("location: acc_guardar.php?value=".$_GET["value"]."&usuario_id=$usuario_id&ganador=$ganador&humano=$humano&pc=$pc");
                }//if opcion correcta

           
        }//if isset opcion
    ?>