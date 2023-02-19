<?php
require_once '../classes/Menu.php';
require_once '../classes/Header.php';
require_once '../classes/Footer.php';

$Menu = new Menu();
$Header = new Header();
$Footer = new Footer();

$Header->headerBasico();
$Menu->menuBasico();
?>

<?php
$Footer->footer();