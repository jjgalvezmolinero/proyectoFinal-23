<?php
require_once '../classes/UserSession.php';
require_once '../classes/Menu.php';
require_once '../classes/Header.php';
require_once '../classes/Footer.php';

$UserSession = new UserSession();
$Menu = new Menu();
$Header = new Header();
$Footer = new Footer();
$Header->headerBasico();
$Menu->menuBasico();
?>
<?php

$Footer->footer();