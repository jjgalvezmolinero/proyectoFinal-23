<?php
require_once '../classes/Menu.php';
require_once '../classes/Header.php';
require_once '../classes/Footer.php';
require_once '../src/components/tabla.php';
require_once '../src/components/popup_finca.php';
require_once '../classes/Finca.php';
$css = array('../css/finca.css');
$js = array('../js/finca.js','../js/finca_validate.js','https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js');
$UserSession = new UserSession();
if(!$UserSession->isLogged()){
  header('Location: ../index.php');
}
$Menu = new Menu();
$Header = new Header();
$Finca = new Finca();
$Footer = new Footer($js,$css);
$Header->headerBasico();
$Menu->menuBasico();
$fincas = $Finca->get_fincas_users($UserSession->getCurrentId());
?>

<div class="listaFincas">
  <?php
    tabla_generica($fincas,array('nombre','municipio','provincia','poligono','parcela','regadio'));
  ?>
</div>

<div class="btnFlotante">
  <button class="btn-add-popup" id="abrirPopup" data-toggle="modal" data-target="#popupNewFinca">
    <i class="fa fa-plus" aria-hidden="true"></i>
  </button>
</div>
<?php
popup_finca();
$Footer->footer();