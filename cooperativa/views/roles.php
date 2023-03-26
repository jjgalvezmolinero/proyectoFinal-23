<?php
require_once '../classes/Menu.php';
require_once '../classes/Header.php';
require_once '../classes/Footer.php';
require_once '../src/components/popup_roles.php';
require_once '../classes/UserSession.php';
require_once '../classes/Permisos.php';
require_once '../classes/Roles.php';
require_once '../src/components/tabla.php';

$css = array("../css/roles.css");
$js = array("../js/roles.js");

$Menu = new Menu();
$Header = new Header();
$Footer = new Footer($js, $css);
$Permisos = new Permisos();
$Roles = new Roles();
$lista_permisos = $Permisos->get_permisos();
$lista_roles = $Roles->get_roles();
$UserSession = new UserSession();
if(!$UserSession->isLogged()){
  header('Location: ../index.php');
}
$Header->headerBasico();
$Menu->menuBasico();
echo "<div class='listaRoles'>";
  tabla_generica($lista_roles, array("Nombre", "Nombre único"));
echo "</div>";
?>
<div class="btnFlotante">
  <button class="btn btn-primary btn-add" type="button" data-toggle="modal" data-target="#popupNewRol">
    <i class="fa fa-plus" aria-hidden="true"></i>
  </button>
</div>
<?php
popup_roles($lista_permisos, $lista_roles, "permiso");
$Footer->footer();
