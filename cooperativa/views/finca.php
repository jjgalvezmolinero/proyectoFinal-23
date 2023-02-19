<?php
require_once '../classes/Menu.php';
require_once '../classes/Header.php';
require_once '../classes/Footer.php';
require_once '../src/components/tabla.php';
require_once '../src/components/popup_finca.php';
require_once '../classes/Finca.php';
$css = array('../css/finca.css');
$js = array('../js/finca.js','../js/finca_validate.js');
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

<?php
popup_finca();
$Footer->footer();