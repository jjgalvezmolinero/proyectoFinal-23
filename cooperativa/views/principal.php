<?php
require_once '../classes/UserSession.php';
require_once '../classes/Menu.php';
require_once '../classes/Header.php';
require_once '../classes/Footer.php';

$js = array(
  '../js/principal.js'
);

$UserSession = new UserSession();
$Menu = new Menu();
$Header = new Header();
$Footer = new Footer($js);
$Header->headerBasico();
$Menu->menuBasico();
?>

<?php
$Footer->footer();
?>