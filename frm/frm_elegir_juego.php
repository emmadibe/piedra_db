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

        <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
        <!-- Decargué la versión minificada de la librería de JS en jQuery CDN. -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
        <!-- Los links de arriba los tengo que copiar para que los modales y la barra desplegable me funcionen!! -->

        <title>Elegir el juego</title>

    </head>

    <body>

        <div class="conteiner text-center">

            <?php

                include "../conexion.php";
                include "../barra.php";

                @SESSION_START();

                $sql = "SELECT * FROM usuarios WHERE usuario_id=".$usuario_id;//Traeme (SELECT) todos los campos que tengas (*) de (FROM) la tabla usuarios donde (WHERE) el campo usuario_id sea igual al valor de la variable $usuario_id.
                $res = mysqli_query($link, $sql);//Me temrina de traer los datos.
                $mostrar = mysqli_fetch_array($res);//Hace que los datos sean visibles. Como que los decodifica. Para poder mostrar algo de la base de datos (por ejemplo, $mostrar["usuario"]) debo hacer este último paso. 

                $sql2 = "SELECT ganador FROM ganador WHERE usuario_id =".$usuario_id;
                $res2 = mysqli_query($link, $sql2);
                $mostrar2 = mysqli_fetch_array($res2);
                $total = mysqli_num_rows($res2);//Esta consulta me da un número con la cantidad de filas en las que se repite la consulta entre paréntesis. Por lo tanto, me va a arrojar la cantidad de partidas porque es la cantidad de filas en las que está el campo ganador, sin importar si su valor es empate, maquina o usuario. 

            ?>  

            <div class="row">

                <div class="col-12">

                    <h1 style="color:purple">¡¡¡¡Bienvenido, <?php echo ucfirst ($mostrar["usuario"]) ?>!!!</h1>
                    <!-- ucfirst() es una función de php que pone en mayúscula a la primera letra del string que esté entre paréntesis. -->

                </div>

            </div>
            <br> <br>

            <table class="table table-bordered table-dark">

                <thead>

                    <tr>
                    <th scope="col" style="color:black" class="bg-warning">Juego</th>
                    <th scope="col"> <a href="frm_piedra.papel.tijera.php?usuario_id=<?php echo $_SESSION["usuario_id"] ?>" class="btn btn-success"> Piedra, papel o tijera <i class="bi bi-arrow-90deg-left"></i></a> </th>
                    <th scope="col"> <a href="frm_juego_puertas.php?modo=cofres.png&usuario_id=<?php echo $_SESSION["usuario_id"] ?>" class="btn btn-warning"> Dónde está el tesoro <i class="bi bi-house-fill"></i></a></th>
                    <th scope="col">Escoba de 15</th>
                    <!-- Fijate que, gracias a la class btn btn-button, los elementos parecen un botón. Sin embargo, son vínculos.  -->
                    </tr>

                </thead>

                <tbody>

                    <tr>
                    <th scope="row" style="color:black" class="bg-warning">Cantidad de partidas jugadas</th>
                    <td><?php echo $total ?></td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    </tr>

                </tbody>

            </table>

        </div><?php //Conteiner?>

    </body>

</html>