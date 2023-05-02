<?php
require_once '../classes/Menu.php';
require_once '../classes/Header.php';
require_once '../classes/Footer.php';
require_once '../src/components/popup_entregas.php';
require_once '../classes/UserSession.php';
require_once '../classes/Entrega.php';
require_once '../src/components/tabla.php';

$css = array();
$js = array('../js/entregas.js');

$Menu = new Menu();
$Header = new Header();
$Footer = new Footer($js, $css);

$UserSession = new UserSession();
if(!$UserSession->isLogged()){
  header('Location: ../index.php');
}
$Header->headerBasico();
$Menu->menuBasico();
$Entregas = new Entrega();
$entregas = $Entregas->get_entregas();
$UserSession->isAdmin();
$isAdmin = $UserSession->isAdmin();

tabla_generica($entregas, ["finca", "aceituna", "temporada", "peso"], $isAdmin);

if($isAdmin) {
  ?>
  <div class="btnFlotante">
    <button class="btn btn-primary btn-add-popup" type="button" id="abrirPopup" data-toggle="modal" data-target="#popupNewRol">
      <i class="fa fa-plus" aria-hidden="true"></i>
    </button>
  </div>
  <?php
  popup_entregas();
}
$Footer->footer();