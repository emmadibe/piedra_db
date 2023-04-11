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
        <a class="nav-link" href="#">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contact</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
          Opciones
        </a>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="frm_juego_puertas.php?usuario_id=<?php echo $_SESSION["usuario_id"] ?>&modo=puertas.png">Puertas</a>
            <a class="dropdown-item" href="frm_juego_puertas.php?usuario_id=<?php echo $_SESSION["usuario_id"] ?>&modo=cofres.png">Cofres</a>
            <a class="dropdown-item" href="frm_juego_puertas.php?usuario_id=<?php echo $_SESSION["usuario_id"] ?>&modo=portales.png">Portales</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
