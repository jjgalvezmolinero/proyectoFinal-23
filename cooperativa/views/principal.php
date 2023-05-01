<?php
require_once '../classes/UserSession.php';
require_once '../classes/Menu.php';
require_once '../classes/Header.php';
require_once '../classes/Footer.php';
require_once '../src/components/tabla.php';
require_once '../classes/Entrega.php';
require_once '../classes/User.php';

$js = array(
  '../js/principal.js',
  '../library/graph/draw-bar-chart.js'
);

$css = array(
  '../library/graph/draw-bar-chart.css',
  '../css/principal.css'
);

$UserSession = new UserSession();
$Menu = new Menu();
$Header = new Header();
$Footer = new Footer($js,$css);
$Header->headerBasico();
$Menu->menuBasico();
$Entregas = new Entrega();
$entregas = $Entregas->get_entregas();
$User = new User();
$lista_usuarios = $User->get_all_users();
?>
<div class="container">
  <div class="form-group">
    <div class="row mb-2">
      <div class="col">
        <h3>Entregas</h3>
        <?php
        tabla_generica($entregas, ["finca", "aceituna", "temporada", "peso"], false)
        ?>
      </div>
      <div class="col">
        <select class="form-control" id="temporadas">
        </select>
        <div id="graficos"></div>
      </div>
    </div>
    <div class="row">
      <div class="col usuarios">
        <h3>Usuarios</h3>
        <?php
        tabla_generica($lista_usuarios, ["Nombre de usuario", 
          "NIF",
          "Correo electrónico",
          "Rol"
        ], false);
        ?>
      </div>
    </div>
  </div>
</div>
<?php
$Footer->footer();
?>