<?php
class Menu {
  private array $menuUsuarioNormal = array(
    array(
      'titulo' => 'Inicio',
      'url' => 'principal.php'
    ),
    array(
      'titulo' => 'Temporada',
      'url' => 'temporada.php'
    ),
    array(
      'titulo' => 'Finca',
      'url' => 'finca.php'
    )
  );
  
  private array $menuUsuarioAdmin = array(
    array(
      'titulo' => 'Inicio',
      'url' => 'principal.php'
    ),
    array(
      'titulo' => 'Temporada',
      'url' => 'temporada.php'
    ),
    array(
      'titulo' => 'Finca',
      'url' => 'finca.php'
    ),
    array(
      'titulo' => 'Usuarios',
      'url' => 'usuarios.php'
    ),
    array(
      'titulo' => 'Roles',
      'url' => 'roles.php'
    )
  );

  public function menuBasico() {
    $menuAMostrar = $this->menuUsuarioAdmin;
    ?>
    <nav class="navbar navbar-expand-lg bg-light">
      <a class="navbar-brand" href="#">
        <img src="../img/logo.svg" width="100" height="70" alt="">
      </a>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <?php
            foreach($menuAMostrar as $dato){
              $url = $dato['url'];
              $titulo = $dato['titulo'];
              ?>
              <li class="nav-item"><a class="nav-link" href="<?php echo $url; ?>"><?php echo $titulo; ?></a></li>
              <?php
            }
          ?>
        </ul>
      </div>
      <div class="collapse navbar-collapse justify-content-end">
        <a href="../src/controller/logout.php">Desconectar</a>
      </div>
    </nav>
    <?php
  }
}