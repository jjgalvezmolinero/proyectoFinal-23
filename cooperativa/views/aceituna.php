<?php
require_once '../classes/Menu.php';
require_once '../classes/Header.php';
require_once '../classes/Footer.php';
require_once '../src/components/popup_aceituna.php';
require_once '../classes/UserSession.php';
require_once '../classes/Aceituna.php';
require_once '../src/components/tabla.php';

$css = array();
$js = array('../js/aceituna.js');

$Menu = new Menu();
$Header = new Header();
$Footer = new Footer($js, $css);

$UserSession = new UserSession();
if(!$UserSession->isLogged()){
  header('Location: ../index.php');
}
$isAdmin = $UserSession->isAdmin();
$Header->headerBasico();
$Menu->menuBasico();
$Aceituna = new Aceituna();
$aceitunas = $Aceituna->get_aceitunas();
tabla_generica($aceitunas,array('denominacion'), $isAdmin);
if($isAdmin){
  ?>
  <div class="btnFlotante">
    <button class="btn btn-primary btn-add-popup" type="button" id="abrirPopup" data-toggle="modal" data-target="#popupNewAceituna">
      <i class="fa fa-plus" aria-hidden="true"></i>
    </button>
  </div>
  <?php
  popup_aceituna();
}
$Footer->footer();