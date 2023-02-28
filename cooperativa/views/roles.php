<?php
require_once '../classes/Menu.php';
require_once '../classes/Header.php';
require_once '../classes/Footer.php';
require_once '../src/components/popup_roles.php';
require_once '../classes/Permisos.php';
require_once '../classes/Roles.php';

$css = array("../css/roles.css");
$js = array("../js/roles.js");

$Menu = new Menu();
$Header = new Header();
$Footer = new Footer($js, $css);
$Permisos = new Permisos();
$Roles = new Roles();
$lista_permisos = $Permisos->get_permisos();
$lista_roles = $Roles->get_roles();

$Header->headerBasico();
$Menu->menuBasico();
?>
<div class="dropdown btnFlotante">
  <button class="btn btn-primary dropdown-toggle btn-add" type="button" data-toggle="dropdown">
  <i class="fa fa-plus" aria-hidden="true"></i>
  </button>
  <ul class="dropdown-menu posicion">
    <li>
      <button id="btn-add-role" data-toggle="modal" data-target="#popupNewRol">Rol</button>
    </li>
    <li>
      <button>Permisos</button>
    </li>
  </ul>
</div>
<?php
popup_roles($lista_permisos, $lista_roles);
$Footer->footer();