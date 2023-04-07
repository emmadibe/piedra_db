<!-- La idea de este archivo, al que el usuario ADMINISTRADOR (rol_id=1) accede haciendo click en "Usuarios" desde la barra, es crear un formulario desde donde los administradores pueden agregar un Usuario($usuario) con una contraseña ($pass) y un rol ($rol_id). Una vez esos formularios sean completadas, se envían las variables al archivo acc_nuevo_usuario. Desde allí, los valores de las variables serán guardados en la base de datos piedra_db en la tabla usuarios. -->

<?php

    include "../proteccion.php";//siempre debe estar la protección para imperdir que se meta alguien sin loguearse.
    include "../conexion.php";

    $usuario_id=$_SESSION["usuario_id"];//Me traigo la variable que está en el servidor.
    include "../barra.php";

    $sql_usuarios="SELECT * FROM usuarios ORDER By fecha DESC";//Le digo al sistema: traeme todos los datos que tengas (todos los campos con sus valores) de la tabla usuarios de la base de datos piedra_db (base de datos ya convocada en el include"../conexion.php";). En este caso no hace falta ningún WHERE porque quiero, justamente, TODOS los datos de la tabla usuarios.
    $res_usuarios=mysqli_query($link, $sql_usuarios);//Acordate que la variable $link me la traigo del include"../conexion.php";

    $sql_roles="SELECT * FROM roles";//Traeme TODOS los campos con sus datos de la tabla roles. 
    $res_roles=mysqli_query($link, $sql_roles);

    $fila=mysqli_fetch_array($res_usuarios);


    if($_SESSION["rol_id"]==1){//La idea es que solo los Administradores puedan entrar acá, no los Usuarios ni los Invitados.
        

?>

<!doctype html>
<html lang="es">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Con la etiqueta meta de arriba el tamaño se ajusta a la pantalla del dispositivo que use el usuario al emplear Boostrap. -->

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <!-- Boostrap-JS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
        <title>Ingresar usuario para jugar</title>

        <style>

            body{

                background:pink;

            }
        
        </style>

    </head>

    <body>

        <div class="container text-center">

            <?php

                    include "../modal_eliminar.php";
                
                    include "../modal_editar.php";

            ?>
            
            <?php
            if(isset($_GET["INFORMACION"])){       
                    include ("../alertas.php");
            }//if isset

            if(isset($_GET["usuario"])){//Me traigo la variable $usuario y su valor desde el archivo acc_editar_usuario.php. Obviamente, debo asegurarme de que exista (que me la tariga) esa variable antes de convocarla para que no me tire ni bien abro la página un "UNDEFINIDED VARIABLE usuario".
                $usuario=$_GET["usuario"];

                echo '<div class="alert alert-success" role="alert">
                <h4 class="alert-heading">EXCELENTE, ' .$_SESSION["usuario"]. '!</h4>
                <p>' .$usuario. ' editado con éxito.</p>
                </div>';

            }//Escribí el cartel acá y no en el archivo alertas.php para poder mostrar el nombre del usuario que edité.
            ?>

    <!-- En este formulario creo usuarios nuevos. La idea es que cada usuario tenga distintos roles: usuario, invitado y administrador, por ejemplo. Según el rol, los distintos tipos de usuario tendrán distintas acciones permitidas y accesos. -->
            <div class="row">

                <div class="col-12">

                    <h1 style="color:purple">Usuarios</h1>

                </div>

            </div> <?php //div que me cierra la primera fila. ?>

            <br>


            <div class="row">
                
                <div class="col-4">

                    &nbsp;

                </div>

                <div class="col-4">

                    <form action="../acc/acc_nuevo_usuario.php" method="POST">
                    <!-- Obviamente, el método para enviar las variables debe ser POST para que no se vea la contraseña en el url. -->
                        <div class="form-group">

                            <label for="usuario">Usuario</label>    
                            <input type="text" class="form-control" name="usuario" placeholder="Ej: xardas" required>

                        </div>

                        <div class="form-group">

                            <label for="pass">Contraseña</label>
                            <input type="password" class="form-control" name="pass" placeholder="4838" required>

                        </div>

                        <div class="form-group">

                            <label for="rol_id">Rol</label>
                            <select class="form-control" name="rol_id">
                                <?php while($opcion=mysqli_fetch_array($res_roles)){
                                //Mientras que tengas un rol (un campo nuevo de la tabla roles), agregamelos como una opción. Después, con el if, me va a mostrar usuario como opción por defecto o no.

                                if($opcion["rol"]=="Usuario"){?>
                                        
                                    <option value=<?php echo $opcion["rol_id"] ?> selected> <?php echo $opcion["rol"] ?> </option>
                                <!-- Dije: si el campor rol de la tabla roles es igual a Usuario poneme por defecto (selected) el valor usuario -->
                                <?php }else{ ?>
                                    
                                    <option value=<?php echo $opcion["rol_id"] ?>> <?php echo $opcion["rol"] ?> </option>
                                    
                                <!-- Si el campo rol de la tabla roles no es igual a Usuario, hacé lo mismo pero no me muestres por defecto a usuario. -->
                                <!-- Hice el if para que aparezca por defecto la opción del que corresponde (usuario o administrador) -->

                            <!-- Lo que ve el usuario es el nombre del rol (administrador o usuario) -->

                                <?php } //if
                            }/*while*/ ?>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary" name="boton">Guardar usuario</button>

                    </form>

                </div>

           

                <div class="col-4">

                    &nbsp;

                </div>

            </div> <?php //ese div me cierra la segunda fila ?>
            
                            
            
            <table class="table table-bordered" id="tabla">
                        <!-- Necesité crearle un atributo id a la tabla para poder hacer modificaciones con  -->
                        <thead>

                            <tr>
                                <th scope="col">Usuario ID</th>
                                <th scope="col">Usuario</th>
                                <th scope="col">Contraseña</th>
                                <th scope="col">Rol</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Fecha de la última conexión</th>
                                <th scope="col">Cantidad de partidas ganadas</th>
                                <th scope="col">Acción</th>
                            </tr>

                        </thead>

                       
                        <?php
                             while($fila=mysqli_fetch_array($res_usuarios)){
                        ?>    
                               
                        <tbody>
                                 
                            <tr>
                                <th scope="row"> <?php echo $fila["usuario_id"] ?></th>
                                <th scope="row"> <?php echo $fila["usuario"] ?></th>
                                <!-- Poniendo usuario me aparece como si fuera el número de partida. Como más arrriba escribí que los datos me los ordene por fecha y en orden descendiente, me aparecerá la última partida arriba del todo y con el número más grande; pues, es el último usuario. -->
                                <td><?php  echo $fila["pass"]  ?></td>

                                <td>

                                    <?php  
                                        //Debo primero estableer qué va a significar cada número del campo rol_id
                                        $rol="sss";
                                        if($fila["rol_id"]==1){
                                            $rol="Administrador";
                                        }else if ($fila["rol_id"]==2){
                                            $rol="Usuario";
                                        }else{
                                            $rol="Invitado";
                                        }

                                        echo $rol 
                                    
                                    ?>

                                </td>

                                <td><?php  echo $fila["fecha"]  ?></td>
                                <td><?php  echo $fila["fecha"]  ?></td>
                                
                                <td> 

                                        &nbsp;

                                </td>

                                <td>
                                       
                                         <!-- ////////////////botón que abrirá el Modal de eliminar, el cual fue convocado con un include.///////////////// -->
                                                <button type="button" class="btn btn-danger boton_borrar_usuario"  id="<?php echo $fila["usuario_id"] ?>" data-toggle="modal" data-target="#modal_eliminar_usuario<?php echo $fila["usuario_id"]; ?>"><i class="bi bi-person-x-fill"></i></button>  
                                                <!-- El modal y el ícono de la cruz lo saco de Boostrap.  
                                                        Me llevo la variable $ganador_id a acc_borrar_partida.php vía URL (GET) para que el sistema sepa qué dato borrar.-->                                            
                                        
                                                <!-- /////////////////Vínculo que me lleva a editar los datos del usuario//////////////////////////////////////// -->
                                                <br> &nbsp; &nbsp; &nbsp;

                                                <button type="button" class="btn btn-warning boton_editar_usuario"  id="<?php echo $fila["usuario_id"] ?>"data-toggle="modal" data-target="#modal_editar_usuario<?php echo $fila["usuario_id"] ?>"><i class="bi bi-pen"></i></button>  
                                            <!-- Me llevo el usuario id para seleccionar en el archivo frm_editar_usuario los datos del usuario_id que quiero editar. El usuario_id es único. -->
                                            <!-- /////////////////////////////////////////////////////////////////// -->
                                </td>

                            </tr>
                            
                            <?php
                    
                                }
                    
                            ?>

                            <button onclick="updateTable()">Update Table</button>


                        </tbody>

            </table>


       </div>
        
       <?php

            }

        
       ?>

        <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
        <!-- Decargué la versión minificada de la librería de JS en jQuery CDN. -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
        <!-- Los links de arriba los tengo que copiar para que los modales me funciones!! -->

        <script>

          

            $(document).ready(function(){

                //Cambiemos las alertas para que desaparezcan después de unos segundos:
                $('.alert button').hide();

                setInterval(function(){
                    $('.alert').hide("slow");
                }, 2000);


                //Eliminemos al usuario en un segundo plano, sin reedireccionamiento ni reacarga de página.
                $('.boton_borrar_usuario').click(function(){//Cuando hagas click en el elemento cuya clase (.) es boton_borrar_usuario, hacé la siguiente función o actividad:
                   
                        var usuario_id=this.id; //Primero, creama una variable (var) llamada usuario_id cuyo valor sea el id (.id) del último elemento seleccionado (this). En mi caso, el último elemento seleccionado es aquel cuya clase es boton_borrar_usuario.
                        var entorno=this; //También creame una variable (var) llamada entorno cuyo valor sea el id de usuario_id porque fue el último elemento seleccionado (this). Eso servirá en el último paso de eliminar un usuario. 

                        $.get("../modal_eliminar.php?HICE=YES", {usuario_id : usuario_id}, function (data){
                            }, "json")//Prueba

                        $('#modal_eliminar_usuario').modal("show"); // Luego de crearme las variables usuario_id y entorno con sus respectivos valores, quiero que me muestres (show) el modal (modal) cuyo id (#) sea modal_eliminar_usuario.

                        $("#modal_eliminar_usuario_usuario").click(function(){

                            $.get("../acc/acc_borrar_usuario.php", {usuario_id : usuario_id}, function (data){
                            }, "json")
                            $('#modal_eliminar_usuario').modal("hide");
                            $(entorno).closest("tr").remove();
                        
                        })

                    })

                //////////////Editemos al usuario en un segundo plano/////////////////////////////
                $('.boton_editar_usuario').click(function(){

                    var usuario_id = this.id;

                    $.get("../acc/acc_datos_usuario.php", {usuario_id : usuario_id}, function(data){

                        $("#modal_editar_usuario_usuario").val(data.usuario);
                        $("#modal_editar_usuario_pass").val(data.pass);
                        $("#modal_editar_usuario_rol option [value = '"+data.rol_id+"']").prop("selected", "true");//Acordate que en JS se concatena con el signo más (+), no con un punto (.) como en php.
                        //En estte bloque de código (conjunto de sentencias), lo que hago es agregarle al elemento que posee el id (#) modal_editar_usuario_usuario, el valor de la variable usuario que me traigo de acc_datos_usuario.php. Y lo mismo con pass y rol. Es, simplemente, para que el usuairo vea cuáles eran los valores anteriores de los elementos antes de ponerse a editarlos.  

                    }, "json")
                    
                    $('#modal_editar_usuario').modal('show');
                    $('#modal_editar_usuario_guardar').click (function(e){

                       e.preventDefault();

                       var usuario = $('#modal_editar_usuario_usuario').val();
                       var pass = $('#modal_editar_usuario_pass').val();
                       var rol_id = $('#modal_editar_usuario_rol').val();

                       $.get('../acc/acc_editar_usuario_2do_plano.php',
                            {usuario_id : usuario_id,
                                pass : pass,
                                usuario : usuario,
                                rol_id : rol_id}, 
                                
                                function(data){

                                console.log(usuario_id);

                                },

                        "json")//get

                    $('#modal_editar_usuario').modal("hide");
                       
                    })
                 
                })//click boton_editar_usuario

            })
                
        </script>
    </body>
</html>