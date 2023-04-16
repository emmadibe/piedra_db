<?php

  SESSION_START();//Necesito más abajo llevarme la variable usuario_id para que no me salte un cartel de error UNDEFINIDED VARIABLE.

?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Logo</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../frm/frm_elegir_juego.php?usuario_id=<?php echo $_SESSION["usuario_id"] ?>"><i class="bi bi-android2 bg-success"></i>Elegir otro juego</a>
        <!-- Lo pinté al ícono de color verde con el valor del atributo class bg-success -->
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../acc/acc_salir.php"><i class="bi bi-person-fill-x bg-danger">Cerrar Sesión</i></a>
        <!-- Pinté al ícono y al texto de él (ya que cerré la etiquta <i></i> envolviendo al texto "Cerrar sesión")  de color rojo con el valor bg-danger del atributo class. -->
      </li>


      <ul class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
          Opciones
        </a>
        <div class="dropdown-menu">
          <!-- Como es el índice mayor (<ul></ul>) debo utilizar la class dropdwon-menu -->
            <li class="navbar-nav">
              <a class="nav-link dropdown-toggle bg-success" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                Modo
              </a>  
              <div class="dropdown">
                <!-- Como es un subíndice (<li></li>) debo utilizar la class dropdown -->
                  <a class="dropdown-item bg-success" href="frm_juego_puertas.php?usuario_id=<?php echo $_SESSION["usuario_id"] ?>&modo=puertas.png">Puertas</a>
                  <a class="dropdown-item bg-success" href="frm_juego_puertas.php?usuario_id=<?php echo $_SESSION["usuario_id"] ?>&modo=cofres.png">Cofres</a>
                  <a class="dropdown-item bg-success" href="frm_juego_puertas.php?usuario_id=<?php echo $_SESSION["usuario_id"] ?>&modo=portales.png">Portales</a>
              </div>
            </li>

            <li class="navbar-nav">
              <a class="nav-link dropdown-toggle bg-warning editemos_usuario" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                Editar usuario
              </a>  
            </li>

        </div>
      </ul>



    </ul>
  </div>
</nav>
<!-- La etiqueta <ul> </ul> marca el inicio de un índice; <li> </li>, de un subíndice. Lo vi en la clase dos del curso de PHP del Hilet.  -->