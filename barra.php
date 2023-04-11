<?php

include "config.php";

if(isset($_GET["usuario_id"])){

  $usuario_id = $_GET["usuario_id"];

  include "conexion.php";
  $sql = "SELECT * FROM usuarios WHERE usuario_id = ".$usuario_id;
  $res = mysqli_query($link, $sql);
  $quesevea = mysqli_fetch_array($res);

  $imagen_url = $quesevea["imagen"];

}

  

@SESSION_START();
$usuario=$_SESSION["usuario"];//Me traigo la variable $usuario desde el servidor.
$usuario_id=$_SESSION["usuario_id"];

?>

<nav class="navbar navbar-expand-lg navbar-light bg-danger">
  <!-- Con danger hice que la barra sea de color rojo. -->

  <a class="navbar-brand" href="#"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarScroll">

    <ul class="navbar-nav mr-auto my-2 my-lg-0 navbar-nav-scroll" style="max-height: 100px;">

      <li class="nav-item active">
        <a class="nav-link" href="../acc/acc_salir.php"><i class="bi bi-shield-fill-x">Cerrar sesión</i> <span class="sr-only">(current)</span></a>
      </li>

      <?php 

        if($_SESSION["rol_id"]==1){//O sea, si el rol_id es igual a 1(administrador) mostrame lo siguiente:

      ?>
      <li class="nav-item">
        <a class="nav-link" href="frm_usuarios.php?usuario_id=<?php echo $_SESSION["usuario_id"] ?>">Usuarios</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="frm_piedra.papel.tijera.php?usuario_id=<?php echo $_SESSION["usuario_id"] ?>"><i class="bi bi-android">Juego</i></a>
        <!-- Le metí el ícono del androide sacado de Boostrap (al igual que el modelo de toda la barra). -->
      </li>

      <?php

          }

      ?>
      

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
         
        
        
                <div class="card">
                      <img src= <?php echo $imagen_url ?> class="img-fluid" alt="Your Image">
                <div class="card-body">
                      <h6 class="card-title">  <?php echo $quesevea["usuario"] ?>
          <!-- Así, aparecerá el valor del campo $usuario (traído desde el servidor escribiendo $_SESSION) de la tabla usuarios de la base de datos piedra_db. -->  </h6>
                      <p class="card-text">Clickear para ver opciones.</p>
                    </div>
                </div>
      <!-- Hice que se vea una foto de perfil y el nombre del usuario. -->
        </a>

        

        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="frm_editar_usuario.php?pass=<?php echo $quesevea["pass"]?>&usuario_id=<?php echo $_SESSION["usuario_id"] ?>"><h5 style="color:purple">Editar usuario</h5></a></li>
          <li> 

            <br>

        

              <div class="form-group">

                    <label for="color"><h5 style="color:purple">Elegí imágenes o palabras</h5></label>
                                 <a class="dropdown-item" href="frm_piedra.papel.tijera.php?INFORMACION=OKEY&value=Imágenes&usuario_id=<?php echo $_GET["usuario_id"] ?>">Imágenes</a>
                                 <a class="dropdown-item" href="frm_piedra.papel.tijera.php?INFORMACION=OKEY&value=Palabras&usuario_id=<?php echo $_GET["usuario_id"] ?>">Palabras</a>
                              <!-- No da que en la barra haya un botón. Así que hago que las palabras Imágenes y Palabras sean, en realidad, un vínculo que se lleva como variable, vía url, value con su valor correspondiente dependiendo de la elección del usuario. -->
                              <!-- Debo enviar el usuario_id vía url para que no salten un montón de errores de variable undefinida. Pues, varias sentencias que escribí dependel de la existencia (isset) de la variable usuario_id. -->
                              <!-- Más que por la alerta, debo enviar la variable INFORMACION porque en frm_piedra.papel.tijera.php puse una estructura condicional (if) para que solo se muestre la tabla donde aparecen las partidas guardadas si es que existe (isset)la variable INFORMACION. -->
              </div>

          <li><hr class="dropdown-divider"></li>
          <li><button type="button" class="btn btn-warning boton_agregar_img" id="<?php echo $_SESSION["usuario_id"] ?>">Agregar una imagen de perfil<i class="bi bi-person-fill-add"></i></button></li>
        </ul>
      </li>
      
    </ul>

  </div>
<?php

          echo $imagen_url;

?>
</nav>

<!-- Acordate que, en el lenguaje HTML, la etiqueta <u></u> marca una lista y <li></li> los elementos de dicha lista. Lo trabajamos en la segunda clase. -->