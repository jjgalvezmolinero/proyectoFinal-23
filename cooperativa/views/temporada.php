<?php
require_once '../classes/Menu.php';
require_once '../classes/Header.php';
require_once '../classes/Footer.php';
require_once '../src/components/tabla.php';
require_once '../src/components/popup_temporada.php';
require_once '../classes/Temporada.php';
require_once '../classes/UserSession.php';
$css = array();
$js = array('../js/temporada.js');
$Menu = new Menu();
$Header = new Header();
$Footer = new Footer($js,$css);
$Header->headerBasico();
$Menu->menuBasico();
$UserSession = new UserSession();
if(!$UserSession->isLogged()){
  header('Location: ../index.php');
}
$Temporada = new Temporada();
$temporadas = $Temporada->get_temporadas();
tabla_generica($temporadas,array('nombre','fecha inicio','fecha fin'));
?>
<div class="btnFlotante">
  <button class="btn-add-popup" id="abrirPopup" data-toggle="modal" data-target="#popupNewTemporada">
    <i class="fa fa-plus" aria-hidden="true"></i>
  </button>
</div>
<?php
popup_temporada();
$Footer->footer();