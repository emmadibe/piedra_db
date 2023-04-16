<DOCTYPE html>
<html lang="es">

    <head>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Boostrap, librería de CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <!-- Boostrap, extensión de paletas de colores. Es para tener, entre otros, el color morado -->
        <link rel="stylesheet" href="path/to/bootstrap-extended-colors.css">

        <!-- Boostrap, librería de JS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

        <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
        <!-- Decargué la versión minificada de la librería de JS en jQuery CDN. -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
        <!-- Los links de arriba los tengo que copiar para que los modales y la barra desplegable me funcionen!! -->

        <style>

            body{

                background : yellow;

            }

        </style>

        <title>Adivina el cofre correcto</title>

    </head>

    <body>

        <?php
        
            $usuario_id = $_GET["usuario_id"];
            include "../conexion.php";
            include "../barra_cofre.php";
            include "../alertas.php";
            include "../modal_borrar_cofre.php";
            include "../modal_editar.php";

            $sql = "SELECT * FROM usuarios WHERE usuario_id=".$usuario_id;
            $res = mysqli_query($link, $sql);
            $mostrar = mysqli_fetch_array($res);

        ?>

        <div class="conteiner text-center">

            <div class="row">

                <div class="col-12">
                    <br> <br> <br>
                    <h3 style="color:pink">A jugar, <?php echo ucfirst ($mostrar["usuario"]) ?></h3>
                        <!-- La función ucfirst convierte en mayúscula a la primera letra del string que esté entre paréntesis.  -->
                </div>

            </div> <?php //div row ?>

            <div class="row">

                <div class="col-12">

                    <h4 style="color:pink">Adiviná el cofre que tiene el tesoro escondido</h4>

                </div>

            </div>
    
            <?php

                if(!isset($_GET["choose"])){

                    $modo = $_GET["modo"];

                    //Hago que las sentencias de abajo no se apliquen si existe la variable enviada con el método GET choose para que no vuelvan a aparecer si ya elegí el cofre.
            ?>

            <div class="row">

                <div class="col-4">
                    <a id="juego" href="../acc/acc_guardar_cofres.php?modo=<?php echo $modo ?>&choose=1&usuario_id=<?php echo $mostrar["usuario_id"]?>"><img src="../img_cofre/<?php echo $modo ?>" width="100%"></a> &nbsp; &nbsp;
                </div>

                <div class="col-4">
                    <a id="juego" href="../acc/acc_guardar_cofres.php?modo=<?php echo $modo ?>&choose=2&usuario_id=<?php echo $mostrar["usuario_id"]?>"><img src="../img_cofre/<?php echo $modo ?>" width="100%"></a> &nbsp; &nbsp;
                </div>

                <div class="col-4">
                    <a id="juego" href="../acc/acc_guardar_cofres.php?modo=<?php echo $modo ?>&choose=3&usuario_id=<?php echo $mostrar["usuario_id"]?>"><img src="../img_cofre/<?php echo $modo ?>" width="100%"></a> &nbsp; &nbsp;
                </div>

                <!-- Acordate que &nbsp; es un caracter especial que deja un espacio. Lo agrego para que no queden las tres imágenes (que son, en realidad, vínculos) muy pegadas. -->
                <!-- Tal como me ha sucedido en reiteradas ocasiones, debo enviar la variable usuario_id vía url para que no me salte un cartel con UNDEFINED VARIABLE. -->
                <!-- En la carpeta img_cofre nombro a las imágenes de la forma en que se envían en url. Así, no tengo que hacer tres estructuras condicionales (if) según lo que elija el usuario (puertas, cofres o portales). Es una buena manera esta que apliqué. -->
                <!-- Con width le modifico el tamaño a la imagen. -->
            </div> <?php //div row ?>
    
            <?php

                }

            ?>

            <?php

                if(isset($_GET["choose"])){

                    $choose = $_GET["choose"];
                    $modo = $_GET["modo"]; //Sí, debo descargar de nuevo la variable $modo. Pues, arriba solo existe esta variable si no existe (!isset) la variable $choose.
                    $correcto = $_GET["correcto"];//Esta variable la comboco en el archivo donde guardo los datos en la base de datos para, justamente, guardar cuál fue la puerta correcta. Luego, me la traigó a este archivo vía url (GET).

                    if($correcto==1){

            ?>

                        <div class="row">

                            <div class="col-4">
                                <img src="../img_cofre/<?php echo 'ganador_'.$modo ?>" width="100%"></a> &nbsp; &nbsp;
                            </div>

                            <div class="col-4">
                                <img src="../img_cofre/<?php echo $modo ?>" width="100%"></a> &nbsp; &nbsp;
                            </div>

                            <div class="col-4">
                                <img src="../img_cofre/<?php echo $modo ?>" width="100%"></a> &nbsp; &nbsp;
                            </div>

                        </div> <?php //div row ?>

                    <?php

                        }else if($correcto==2){

                    ?>

                            
                        <div class="row">

                            <div class="col-4">
                                <img src="../img_cofre/<?php echo $modo ?>" width="100%"></a> &nbsp; &nbsp;
                            </div>

                            <div class="col-4">
                                <img src="../img_cofre/<?php echo 'ganador_'.$modo ?>" width="100%"></a> &nbsp; &nbsp;
                            </div>

                            <div class="col-4">
                                <img src="../img_cofre/<?php echo $modo ?>" width="100%"></a> &nbsp; &nbsp;
                            </div>

                        </div> <?php //div row ?>


                    <?php

                        }else{

                    ?>

                        <div class="row">

                            <div class="col-4">
                                <img src="../img_cofre/<?php echo $modo ?>" width="100%"></a> &nbsp; &nbsp;
                            </div>

                            <div class="col-4">
                                <img src="../img_cofre/<?php echo $modo ?>" width="100%"></a> &nbsp; &nbsp;
                            </div>

                            <div class="col-4">
                                <img src="../img_cofre/<?php echo 'ganador_'.$modo ?>" width="100%"></a> &nbsp; &nbsp;
                            </div>

                        </div> <?php //div row ?>

                    <?php

                            }

                    ?>

               <?php

                    if($correcto == $choose){

                ?>

                        <div class="alert alert-success" role="alert">
                            <h4 class="alert-heading">ADIVINASTE!</h4>
                            <p>Bien hecho, <?php echo ucfirst($mostrar["usuario"]) ?>. Has adivinado.</p>
                            <hr>
                        </div>

                <?php

                    }else{

                ?>

                        <div class="alert alert-success" role="alert">
                            <h4 class="alert-heading">PERDISTE!</h4>
                            <p>Perdiste, <?php echo ucfirst($mostrar["usuario"]) ?>. No has adivinado.</p>
                            <hr>
                        </div>

                <?php

                    }

                ?>
            <a href="frm_juego_puertas.php?modo=<?php echo $modo ?>&usuario_id=<?php echo $mostrar["usuario_id"] ?>" class="btn btn-success">Volver a jugar</a>
            <!-- Gracias al atributo class con el valor btn parece un botón, pero es un vínculo. Que parezca un botón queda más atractivo ante el usuario. -->
            <!-- Al no agregarle el atributo choose, vuelven a aparecer los tres cofres originales cerrados.  -->
            <!-- Hago que solo se vea este vínculo si existe la variable choose, la cual es enviada vía url cuando toco el cofre/vínculo, para que no aparezca ni bien inicio sesión. Queda feo que aparezca un botón que diga "volver a jugar" cuando recién el usuario inició sesión y todavía no jugó ni una sola vez.  -->
            <?php

                }

            ?>

            <?php

                $sql_cofres = "SELECT * FROM cofres WHERE usuario_id=".$usuario_id." ORDER BY fecha DESC LIMIT 60";
                $res_cofres = mysqli_query($link, $sql_cofres);

                $cantidad = mysqli_num_rows($res_cofres); //Como la consulta mysqli_num_rows me dice la cantidad de filas devueltas por una consulta de tipo SELECT, me va a tirar la cantidad de filas que tienen el valor del usuario_id conectado en el campo usuario_id. Como todas las partidas van a tener ese mismo usuario_id, esta consulta me arroja el total de partidas. Me sirve para colocarlo en la fila de la tabla que dice "Total de partidas".

            ?>

            <table class="table table-bordered" id="tabla">

                <thead>

                    <tr>

                        <th scope="col">Jugada Nº</th>
                        <th scope="col">Número elegido por <?php echo ucfirst($mostrar["usuario"]) ?></th>
                        <th scope="col">Número elegido por la máquina</th>
                        <th scope="col">Modo de juego</th>
                        <th scope="col">¿Adivinó?</th>
                        <th scope="col">Total de patidas</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Borrar</th>

                    </tr>

                </thead>

                <?php

                    while ($fila=mysqli_fetch_array($res_cofres)){

                ?>

                <tbody>

                            <td> <?php echo $fila["jugada_id"] ?> </td>
                            <!-- Con jugada_id, al ser AUTO INCREMENTAL, me arrojará el número de partida. -->
                            <td> <?php echo $fila["choose"] ?> </td>
                            <td> <?php echo $fila["correcto"]?> </td>
                            <td> <?php echo $fila["modo"] ?></td>
                            <td>

                                <?php

                                    if($fila["choose"] == $fila["correcto"]){

                                        echo 'Sí';

                                    }else{

                                        echo 'No';

                                    }

                                ?>

                            </td>
                            <td> <?php echo $cantidad ?> </td>
                            <td> <?php echo $fila["fecha"] ?> </td>
                            <td>

                                <button type="button" class="btn btn-danger boton_borrar_cofre" id="<?php echo $fila["jugada_id"] ?>" data-toggle="modal" data-tarjet="#modal_borrar_cofre<?php echo $fila["jugada_id"];?>"><i class="bi bi-x-square"></i></button>
                                <!-- El modal y el ícono lo saco de Boostrap. Más abajo, utilizando JS, voy a a hacer la función que cuando haga click en el elemento con la clase "boton_borrar_cofre" me habra el modal "modal_borrar_cofre". La idea será borrar los datos en un segundo plano. -->
                                <!-- Me debo llevar el campo jugada_id para que el sistema sepa que dato borrar. No hay dos jugada_id iguales. -->

                            </td>
                            
                    <?php

                        }

                    ?>
                </tbody>

            </table>

          

            <script>

                $(document).ready(function(){//En este documento, cuando esté listo, hacemela siguiente función o actividad:

////////////////////////////////////////////////////OCULTEMOS LAS ALERTAS DESPUÉS DE UNOS SEGUNDOS////////////////////////////////////////////////////////////////////////////////////////

                    $('.alert button').hide();

                        setInterval(function(){
                            $('.alert').hide("slow");
                        }, 3000);//Le digo que me oculte(hide) el elemento alert button de forma lenta (slow) una vez pasados los 3000 milisegundos. De forma lenta quiere decir que se va moviendo la alerta hasta que desaparece.

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

       //////////////////////////////////////////BORRAR DATOS DE PARTIDAS EN UN SEGUNDO PLANO//////////////////////////////////////////////////////////////////////////////////////////

                    $('.boton_borrar_cofre').click(function(){//Lo que le digo al sistema es: cuando haga click (click) en el elemento cuya clase (.) es boton_borrar_cofre, haceme la siguiente función o actividad:

                        var jugada_id = this.id; //Primero, creame una variable (var) llamada jugada_id. El valor de esa variable será el id (.id) del elemento cuya clase sea boton_borrar_cofre, puesto que es el último elemento seleccionado (this).
                        var entorno = this; //También creo una variable lamada entorno cuyo valor es el id de jugada_id porque fue el último elemento seleccionado (this). Eso servirá en el últmo paso de eliminar una partida.

                        $('#modal_borrar_cofre').modal("show");//Luego de crearme las variables jugada_id y entorno, mostrame (show) el modal (modal) cuyo id (#) sea modal_borrar_cofre

                        $('#modal_boton_borrar').click(function(){ //Cuando haga click (click) en el elemento cuyo id (#) sea modal_boton_borrar, haceme la siguiente función o actividad:

                            $.get('../acc/acc_borrar_cofre.php', {jugada_id : jugada_id}, function(data){ //Enviame a acc_borrar_cofre.php la variable jugada_id con el valor de jugada_id (variable creada arriba). Gracias a esta función de JS, todos los códigos del archivo acc_borrar_cofre.php serán ejecutados en segundo plano; por ende, no abrá recarga de página. Eso agiliza el sistema y hace que Google puntee mejor a tu página.

                            }, 'json')

                            $('#modal_borrar_cofre').modal('hide');//Luego, ocultame (hide) el modal (modal) cuyo id (#) sea modal_borrar_cofre

                            $(entorno).closest('tr').remove();//para finalizar, tomá el valor de jugada_id (por eso cree la variable entorno, para que me quede) y vayas a la fila (tr) más cercana que encuentres (closets) y la elimines (remove).

                        })

                    })

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////////////////////////////////////////////EDITEMOS AL USUARIO EN UN SEGUNDO PLANO//////////////////////////////////////////////////////////////////////////////////////////////////

                    $('.editemos_usuario').click(function(){

                            $('#modal_editar_cofre').modal('show');

                        })

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

                });//document
            
            </script>

           

        </div> <?php //div conteiner ?>

    </body>

</html>