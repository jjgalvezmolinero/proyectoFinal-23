<?php

function headerhtml() {
  ?>
  <nav class="navbar navbar-expand-lg bg-light">
    <a class="navbar-brand" href="#">
      <img src="../img/logo.svg" width="70" height="70" alt=""> Cooperativa
    </a>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="#">Inicio</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Quienes somos</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Contactanos</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Esto es una prueba</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Hola que tal</a></li>
      </ul>
    </div>
  </nav>
  <?php
}

function headerBasico($links = array()) {
  ?>
  <head>
    <link rel="shortcut icon" href="../img/logo.svg" type="image/x-icon">
    <title>Cooperativa</title>
    <?php
      foreach($links as $link):
        $url = $link['url'];
        $tipo = $link['tipo'];
        switch ($tipo):
          case "css":
            echo "<link rel = 'stylesheet' href = '$url'>";
            break;
          case "js":
            echo "<script href = '$url'></script>";
            break;
        endswitch;
      endforeach;
    ?>
  </head>
  <?php
}