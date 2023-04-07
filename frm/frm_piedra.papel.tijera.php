<!DOCTYPE html>
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

    <title>Piedra, Papel o Tijera</title>

    <style>

        h1{
            
            color:purple;

        }    

        body{

            background:#E0FFFF;

        }

    </style>
</head>
<body>
        
        
    <div class="conteiner text-center">

        <?php

            include "../barra.php";  

            @SESSION_START();
            
            include "../conexion.php";

            include "../modal_agregar_img.php";
            
            include "../config.php";

            ////////Hago que sea snecillo traerme los datos del actual usuario_id. Se actualiza más rápido todo poniendo $bien["usuario"] que $_SESSION["usuario"] a la hora de editar el usuario, por ejemplo.//
            
            $sql = "SELECT * FROM usuarios WHERE usuario_id=".$usuario_id;
            $res_usuarios = mysqli_query($link, $sql);
            $bien = mysqli_fetch_array($res_usuarios);
            
            ////////////
       
            
            $usuario_id=$bien["usuario_id"];

            $sql="SELECT * FROM ganador WHERE usuario_id=".$bien["usuario_id"]." ORDER BY fecha DESC LIMIT 60";   
        //Le digo al sistema que me traiga (SELECT) todos (*) los campos de (FROM) la tabla ganador de la base de datos piedr_db (conectada con el include "../conexion.php") en donde (WHERE) usuario_id sea igual a $usuario_id y que me los ordene por fecha de forma descendente hasta llegar a los 60 datos. O sea, no me trae todos los datos de la tabla ganador, sino aquellos correspondientes al usuario_id. De esta manera, cada usuario verá SUS datos, SUS partidas, no la de todos los usuarios. 
            $res_ganador=mysqli_query($link, $sql);

            if(isset($_GET["INFORMACION"])){
                //Tengo que poner que me incluya solo la alerta si le llegó la variable INFORMACION ya que sino me va a tirar cuando abra el juego un UNDEFINED VARIABLE.
                include "../alertas.php";
                
                
            }

        ?>

        <div class="row">

            <div class="col-12"><hr><h1>Juego piedra, papel o tijera</h1><hr></div>

        </div>

        <button onclick="updateTable()">Update Table</button>


        <br>

        <div class="row">

                <div class=col-4>

                    &nbsp;

                </div>

                <div class=col-4>
                    <form method="GET" action="../acc/acc_juego.php">

                  <!-- En este caso, no le voy a enviar, como sí hice con la app de gastos la variable $usuario_id vía url (GET) al archivo acc_juego (y de ahi a acc_guardar) ya que, como uso el método GET para enviar las variables del formulario, no me deja el sistema mandar otra variable por url. En cambio, en el archivo acc_guardar.php directamente me descargo la variable $usuario_id desde el servidor escribiendo $_SESSION. -->

                        <div class="form-gorup">
                            <label for="opcion">Elija piedra, papel o tijera:</label>
                            
                            <br>

                            <?php
                            if(isset($_GET["value"])){
                                $value=$_GET["value"];
                                }
                            
                               if (!isset($_GET["value"])){

                            ?>
                                        <a href="../acc/acc_juego.php?value=Imágenes&usuario_id=<?php echo $usuario_id?>&opcion=Piedra"><img src="../img/piedra.jpg" class="img-thumbnail" alt="Piedra"></a>&nbsp; &nbsp;
                                        <a href="../acc/acc_juego.php?value=Imágenes&usuario_id=<?php echo $usuario_id?>&opcion=Tijera"><img src="../img/tijera.png" class="img-thumbnail" alt="Tijera"></a>&nbsp; &nbsp;
                                        <a href="../acc/acc_juego.php?value=Imágenes&usuario_id=<?php echo $usuario_id?>&opcion=Papel"><img src="../img/papel.jpg" class="img-thumbnail" alt="Papel"></a>&nbsp; &nbsp;

                            <?php

                               }else if($value=="Imágenes"){

                            ?>

                                        <a href="../acc/acc_juego.php?value=Imágenes&usuario_id=<?php echo $usuario_id?>&opcion=Piedra"><img src="../img/piedra.jpg" class="img-thumbnail"></a>&nbsp; &nbsp;
                                        <a href="../acc/acc_juego.php?value=Imágenes&usuario_id=<?php echo $usuario_id?>&opcion=Tijera"><img src="../img/tijera.png" class="img-thumbnail"></a>&nbsp; &nbsp;
                                        <a href="../acc/acc_juego.php?value=Imágenes&usuario_id=<?php echo $usuario_id?>&opcion=Papel"><img src="../img/papel.jpg" class="img-thumbnail"></a>&nbsp; &nbsp;
 
                          <!-- El atributo alt lo que hace es fijar un texto que aparecerá si, por alguna razón, la imagen no puede ser visualizada en la web.  -->

                            <?php

                               }else{

                            ?>
                                    <div class="row">

                                        <div class= "col-4">

                                             <a href="../acc/acc_juego.php?value=Palabras&usuario_id=<?php echo $usuario_id?>&opcion=Piedra" class="btn btn-success">Piedra</a>&nbsp; &nbsp;

                                        </div>

                                        <div class="col-4">

                                            <a href="../acc/acc_juego.php?value=Palabras&usuario_id=<?php echo $usuario_id?>&opcion=Tijera" class="btn btn-danger">Tijera</a>&nbsp; &nbsp;

                                        </div>

                                        <div class="col-4">

                                            <a href="../acc/acc_juego.php?value=Palabras&usuario_id=<?php echo $usuario_id?>&opcion=Papel" class="btn btn-dark">Papel</a>&nbsp; &nbsp;
                                            <!-- Fijate como, gracias a la class btn, logró que el vínculo PAREZCA un botón, pero no lo es. Es un vínuclo. -->

                                        </div>

                                    </div>
             
                                        
                            <?php

                                    }//if $value !="Imágenes";
                               //O sea, si no existe (!isset) la variable $value o $value es igual a Imágenes, el juego me aparecerá con imágenes. Sería el valor predeterminado, ya que cuando inicio sesión, por ejemplo, no va a existir la variable value. Utilizar el !isset es una buena herramienta. Sino lo usara, sí o sí debería enviar en un montón de vínculos, formularios y botones la variable value para que no me salte un UNDEFINID variable.
                               //Si la variable $value no es igual a "Imágenes", me va a aparecer el juego con palabras. No hacía falta aclarar else if ($value="Palabras") ya que es la única opción que queda. Acordate que cuanto menos código escriba, mejor.
                               //Y me llevo la variable value via url a acc_juego y de ahí a acc_guardar. Nunca guardo la variable en la base de datos. Pero, la llevo a todos esos archivos para que siempre cuando juegue me aparezca la variable value y así sigue el formato que elegí. Si juego con palabras, aparecerá en url value=Palabras, lo cual hace que siga ese formato ya que yo puse el if de que si value no es igual a Imágenes me muestre las palabras. Es un círculo.  Es interesante porque no necesité guardar esto en una base de datos para que me siga apareciendo (al menos, claro está, hasta que cierre sesión).
                            ?>

                        </div>


                        
                    </form>

                </div>

                <div class=col-4>

                    &nbsp;
                    
                </div>

        </div>
    
        <?php


            if(isset($_GET["INFORMACION"])){

                $INFORMACION=$_GET["INFORMACION"];

                if($INFORMACION=="GUARDAR_EXITO"){

                    $humano=$_GET["humano"];
                    $pc=$_GET["pc"];
                    $ganador=$_GET["ganador"];
                    //if($INFORMACION=="GUARDAR_EXITO"){ //Este if lo hago para que no me tire un error cuando borro un dato. Pues, al eliminar un dato, no estoy enviando las variables $ganador, $humano ni $pc. Entonces, el sistema no me las reconoce y me tira un UNDEFINID VARIABLE $ganador, $pc y $humano. Por eso, hago que solo aparezcan esas variables cuando INFORMACION es igual a GUARDAR_EXITO que es cuando definitivamente envío esas variables al presente archivo desde acc_guardar.php
                            
                    
                        

                   //Acordate que a todas esas variables me las traigo desde el archivo acc_guardar.php vía URL (GET).

                    echo "<br><h5>Opción de ".$usuario.": ".$humano."</h5><br>";

                    echo "<br><h5>Opción del la máquina: ".$pc."</h5><br>";

                    echo '<h2 style="color: green">El ganador del juego es '.$ganador. '</h2><br>';
 
                }
                
        ?>

                <div class="row">

                    <div class="col-4">

                        &nbsp;

                    </div>

                    <div class="col-4">

                        <form action="../acc/acc_elegir_colores.php?usuario_id=<?php echo $usuario_id ?>" method="POST">
                            
                            <div class="form-group">

                                <label for="color">Elegí el color al que querés que cambie la tabla al hacer click</label>
                                <select class="form-control" name="color">

                                    <option value="table-active">Negro</option>
                                    <option value="table-danger">Rojo</option>
                                    <option value="table-warning">Amarillo</option>
                                    <option value="table-success">verde</option>
                                </select>

                            </div>

                            <button type="submit" class="btn btn-warning" name="boton">Elegir color</button>
                              <br><br>

                        </form>
                    </div>

                    <div class="col-4">

                        &nbsp;

                    </div>

                    <br><br>

                </div>

                    <table class="table table-bordered" id="tabla">
                        <!-- Necesité crearle un atributo id a la tabla para poder hacer modificaciones con  -->
                        <thead>

                            <tr>
                                <th scope="col">Partida Nº</th>
                                <th scope="col">Elección de <?php echo $bien["usuario"] ?></th>
                                <th scope="col">Elección máquina</th>
                                <th scope="col">Ganador</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Borrar</th>
                            </tr>

                        </thead>

        <?php
                                             
            while($fila=mysqli_fetch_array($res_ganador)){

        ?>

                        <tbody>

                            <tr>
                                <th scope="row"> <?php echo $fila["ganador_id"] ?></th>
                                <!-- Poniendo ganador_id me aparece como si fuera el número de partida. Como más arrriba escribí que los datos me los ordene por fecha y en orden descendiente, me aparecerá la última partida arriba del todo y con el número más grande; pues, es el último ganador_id. -->
                                <td><?php  echo $fila["humano"]  ?></td>
                                <td><?php  echo $fila["pc"]  ?></td>
                                <td><?php  echo $fila["ganador"]  ?></td>
                                <td><?php  echo $fila["fecha"]  ?></td>
                                <td>
                                    <!--  --------------MODAL ELIMINAR----------    -->
                                    <div class="modal" tabindex="-1" id="modal_eliminar<?php echo $fila["ganador_id"]; ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header bg-danger">
                                                <h5 class="modal-title ">ATENCIÓN, <?php echo $_SESSION["usuario"] ?>!!</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>¿Está seguro de eliminar el registro de la partida jugada el <?php echo $fila["fecha"] ?>?</p>
                                                <p>Esta accion no se puede revertir.</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                <a href="../acc/acc_borrar_partida.php?usuario_id=<?php echo $bien["usuario_id"] ?>&ganador_id=<?php echo $fila["ganador_id"]; ?>" class="btn btn-danger">Eliminar partida</a>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    
                               
                                     <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal_eliminar<?php echo $fila["ganador_id"]; ?>"><i class="bi bi-x-octagon-fill"></i></button>  
                                     <!-- El modal y el ícono de la cruz lo saco de Boostrap.  
                                            Me llevo la variable $ganador_id a acc_borrar_partida.php vía URL (GET) para que el sistema sepa qué dato borrar.-->

                                </td>

                                <!-- FIN DEL MODAL ELIMINAR -->
                            </tr>
                     
        <?php

            }

        ?>
                  <?php  
                //CONTEMOS LA CANTIDA DE VECES QUE GANÓ LA MÁQUINA, EL USUARIO, EL TOTAL DE PARTIDAS Y DE EMPATES//////////////////////////////////
                        $sql_pc = "SELECT ganador FROM ganador WHERE ganador = 'maquina'"; //Acá le digo al sistema: traeme los datos que tengas del campo ganador (SELECT ganador) de la tabla ganador (FROM ganador) de la base de datos piedra_db (traída con el include "conexion.php") en donde el valor del campo ganador sea igual a maquina.
                        $res_pc = mysqli_query($link, $sql_pc); //Como que codifica todos esos datos en donde ganador es igual a maquina.
                        $ganapc = mysqli_num_rows($res_pc);//La consulta mysqli_num_rows me tira la cantidad de filas en las que se repite la consulta que está entre paréntesis. En este caso, la consulta es el valor de la variable $res_pc. Así, obtengo la cantidad de veces (o la cantidad de filas, como prefiera decirlo) en las que el campo ganador tiene a maquina como valor.
                        
                        
                        $sql_empate = "SELECT ganador FROM ganador WHERE ganador = 'empate'";//Traeme los datos del campo ganador de la tabla ganador de la base de datos piedr_db en donde el valor del campo ganador sea igual a empate.
                        $res_empate = mysqli_query($link, $sql_empate);
                        $empate = mysqli_num_rows($res_empate);


                        $sql_humano = "SELECT ganador FROM ganador WHERE ganador = '".$usuario."' ";
                        $res_humano = mysqli_query($link, $sql_humano);
                        $ganahumano = mysqli_num_rows($res_humano);


                        $total = $empate +  $ganapc + $ganahumano;
                        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

                ?>
                            <tr>

                                <td>
                                    
                                    <b>Cantidad de veces que ganó <?php echo $bien["usuario"]  ?> </b>
                                
                                </td>

                                <td>
                                 
                                    <?php

                                        echo $ganahumano;

                                    ?>
                                    
                                </td>
                               
                            </tr>

                            <tr>

                                <td>
                                    
                                    <b>Cantidad de veces que ganó la máquina </b>
                            
                                </td>
                                    
                    
                                <td>
                                    
                                    <?php 
                                    
                                         echo $ganapc;

                                    ?>

                                </td>
                            <tr>

                                <td>
                                    
                                    <b>Cantidad de veces que hubo empate </b>
                            
                                </td>
                                    
                    
                                <td>
                                    
                                    <?php 
                                    
                                         echo $empate;

                                    ?>

                                </td>
                               
                            </tr>

                            <tr>

                                <td><b>Cantidad de partidas</b></td>

                                
                                <td>
                                    
                                    <?php

                                        echo '<b> ' .$total. '</b> '; //La etiqueta <b></b> es para que se vea el número en negrita.

                                    ?>

                                </td>

                            </tr>

                            <?php
                            
                                    //}

                            ?>
                        </tbody>
                    </table>

      

        <?php
         

                }else{

                    echo 'Debe elegir  piedra, papel o tijera.';
            
                }

        ?>
      </div>  <!-- div de conteiner. -->
    
      <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
        <!-- Decargué la versión minificada de la librería de JS en jQuery CDN. -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
        <!-- Los links de arriba los tengo que copiar para que los modales me funciones!! -->

     
            <?php

                $sql = "SELECT color FROM usuarios WHERE usuario_id = ".$usuario_id."";
                $res = mysqli_query($link, $sql);
                $fila4 = mysqli_fetch_array($res);
                //Me traje el campo color de la tabla usuarios de la base de datos pedira_db.
            ?>

        <script>

                var color = '<?php echo $fila4["color"]; ?>';
                //Estoy pasando una variable en php($color) a JS (color). NO SE PUEDE mezclar PHP y JS tan facilmente como PHP con HTML. Por eso, debo pasar la variable de un lenguaje a otro.

                $(document).ready(function(){

                    var clase_tabla="table-bordered";//Declaro la variable con su valor.

                    //Hagamos un evento para que cuando haga click sobre la tabla cambie de color:
                    $("#tabla").click(function(){//El numeral (#) se escribe porque es un id.

                        if(clase_tabla=="table-bordered"){

                            $(this).addClass(color);
                            $(this).removeClass("table-bordered");
                            clase_tabla=color;//Modifico el valor de la variable.

                        //Lo que le digo al sistema es:
                        //Cuando yo haga click (click) con el mouse sobre esto (this), sobre la tabla (#tabla), hacé la siguiente función o actividad: si la variable clase_tabla tiene como valor "table-bordered" (el cual es el valor por defecto de la tabla dado que yo lo asigné así), agregame el atributo que el usuario haya seleccionado. Yo puse como parámetro una variable para que el usuario elija de qué color quiere la tabla. Y eliminame "table-bordered". También modifico el valor de la variable clase_tabla.
                        }else{

                            $(this).addClass("table-bordered");
                            $(this).removeClass(color);
                            clase_tabla="table-bordered";
                            //Y acá al sistema le digo:
                            // Si la variable clase_tabla NO tiene como valor "table-bordered", agregame el atributo "table-bordered" y eliminame lo que haya elejido el usuario. También modifico el valor de la variable clase_tabla.

                            //Y, de esta manera, se completa el circuito: hago click, la tabla se vuelve del color que haya eleigo el usuario; hago de nuevo click, se vuelve blanca.
                        }

                    })//click tabla.


                    //Hagamos un evento para que al pasar el mouse por la tabla esta cambie al acolor que elija el usuario:
                    $("#tabla tr").mouseover(function(){

                        $(this).addClass(color);
                        //Cuando pase el mouse (mouseover) sobre la fila (tr) de la tabla (#tabla) agregame el atributo (addClass) color, el cual pinta la fila de azul.
                    });

                    $("#tabla tr").mouseout(function(){

                        $(this).removeClass(color);
                        //Cuando saque el mouse (mouseout) de la fila (tr) de la tabla (#tabla) eliminame el atributo "table-primary". Así, la fila vuelve a estar del color original.
                    });


                    //Cambiemos las alertas para que desaparezcan después de unos segundos:
                    $('.alert button').hide();

                        setInterval(function(){
                            $('.alert').hide("slow");
                        }, 3000);
               

                ///////////////////////////////Agregar una imagen de perfil en segundo plano////////////////////////////////////
                $('.boton_agregar_img').click(function(){ //Cuando haga click (click) con el mouse en el elemento cuya clase (.) sea boton_agregar_img, haceme la siguiente función o actividad:

                    var usuario_id = this.id;
                    
                    console.log(usuario_id);

                    //Primero, creo una variable (var) llamada usuario_id. Su valor sera el id (.id) del último elemnto al que hago referencia (this). Por lo tanto, el valor de la variable usuario_id será el id del elemento cuya clase es boton_agregar_img. A ese elemento yo le puse como id el usuario_id. La idea es que al archivo donde se va a atualizar el campo imagen de la tabla usuarios, me lleve el id para que el sistema sepa a qué usuario actualizarle ese dato. 

                    $('#modal_agregar_img').modal("show");

               

                $('#modal_agregar_imagen_guardar').click(function(e){

                    e.preventDefault();

                    var imagen_nueva = $('#agregar_img').val();

                    $.get('../acc/acc_editar_img.php',
                    
                        {usuario_id : usuario_id,
                        
                        imagen_nueva : imagen_nueva},

                        function(data){

                        },
                    
                    "json")

                    $('#modal_agregar_img').modal("hide");

                    })

                })

            });//documento ready.

        </script>
        
       
</body>
</html>