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
                                <a href="frm_juego_puertas.php?modo=<?php echo $modo ?>&choose=1&usuario_id=<?php echo $mostrar["usuario_id"]?>"><img src="../img_cofre/<?php echo 'ganador_'.$modo ?>" width="100%"></a> &nbsp; &nbsp;
                            </div>

                            <div class="col-4">
                                <a href="frm_juego_puertas.php?modo=<?php echo $modo ?>&choose=2&usuario_id=<?php echo $mostrar["usuario_id"]?>"><img src="../img_cofre/<?php echo $modo ?>" width="100%"></a> &nbsp; &nbsp;
                            </div>

                            <div class="col-4">
                                <a href="frm_juego_puertas.php?modo=<?php echo $modo ?>&choose=3&usuario_id=<?php echo $mostrar["usuario_id"]?>"><img src="../img_cofre/<?php echo $modo ?>" width="100%"></a> &nbsp; &nbsp;
                            </div>

                        </div> <?php //div row ?>

                    <?php

                        }else if($correcto==2){

                    ?>

                            
                        <div class="row">

                            <div class="col-4">
                                <a href="frm_juego_puertas.php?modo=<?php echo $modo ?>&choose=1&usuario_id=<?php echo $mostrar["usuario_id"]?>"><img src="../img_cofre/<?php echo $modo ?>" width="100%"></a> &nbsp; &nbsp;
                            </div>

                            <div class="col-4">
                                <a href="frm_juego_puertas.php?modo=<?php echo $modo ?>&choose=2&usuario_id=<?php echo $mostrar["usuario_id"]?>"><img src="../img_cofre/<?php echo 'ganador_'.$modo ?>" width="100%"></a> &nbsp; &nbsp;
                            </div>

                            <div class="col-4">
                                <a href="frm_juego_puertas.php?modo=<?php echo $modo ?>&choose=3&usuario_id=<?php echo $mostrar["usuario_id"]?>"><img src="../img_cofre/<?php echo $modo ?>" width="100%"></a> &nbsp; &nbsp;
                            </div>

                        </div> <?php //div row ?>


                    <?php

                        }else{

                    ?>

                        <div class="row">

                            <div class="col-4">
                                <a href="frm_juego_puertas.php?modo=<?php echo $modo ?>&choose=1&usuario_id=<?php echo $mostrar["usuario_id"]?>"><img src="../img_cofre/<?php echo $modo ?>" width="100%"></a> &nbsp; &nbsp;
                            </div>

                            <div class="col-4">
                                <a href="frm_juego_puertas.php?modo=<?php echo $modo ?>&choose=2&usuario_id=<?php echo $mostrar["usuario_id"]?>"><img src="../img_cofre/<?php echo $modo ?>" width="100%"></a> &nbsp; &nbsp;
                            </div>

                            <div class="col-4">
                                <a href="frm_juego_puertas.php?modo=<?php echo $modo ?>&choose=3&usuario_id=<?php echo $mostrar["usuario_id"]?>"><img src="../img_cofre/<?php echo 'ganador_'.$modo ?>" width="100%"></a> &nbsp; &nbsp;
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

                $sql_cofres = "SELECT * FROM cofres WHERE usuario_id=".$usuario_id;
                $res_cofres = mysqli_query($link, $sql_cofres);
                $mostrar_cofres = mysqli_fetch_array($res_cofres);

                $cantidad = mysqli_num_rows($res_cofres); //Como la consulta mysqli_num_rows me dice la cantidad de filas devueltas por una consulta de tipo SELECT, me va a tirar la cantidad de filas que tienen el valor del usuario_id conectado en el campo usuario_id. Como todas las partidas van a tener ese mismo usuario_id, esta consulta me arroja el total departidas. Me sirve para colocarlo en la fila de la tabla que dice "Jugada Nº".

            ?>

            <table class="table table-bordered" id="tabla">

                <thead>

                    <tr>

                        <th scope="col">Jugada Nº</th>
                        <th scope="col">Número elegido por <?php echo ucfirst($mostrar["usuario"]) ?></th>
                        <th scope="col">Número elegido por la máquina</th>
                        <th scope="col">Modo de juego</th>
                        <th scope="col">¿Adivinó?</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Borrar</th>

                    </tr>

                </thead>

                <tbody>

                    <td> <?php echo $cantidad?></td>

                </tbody>

            </table>

            <script>

                $(document).ready(function(){//En este documento, cuando esté listo, hacemela siguiente función o actividad:

                    $('.alert button').hide();

                        setInterval(function(){
                            $('.alert').hide("slow");
                        }, 3000);//Le digo que me oculte(hide) el elemento alert button de forma lenta (slow) una vez pasados los 3000 milisegundos. De forma lenta quiere decir que se va moviendo la alerta hasta que desaparece.

                });
            
            </script>

        </div> <?php //div conteiner ?>

    </body>

</html>