<?php
require_once '../classes/UserSession.php';
require_once '../classes/Menu.php';
require_once '../classes/Header.php';
require_once '../classes/Footer.php';

$js = array(
  '../js/principal.js',
  '../library/graph/draw-bar-chart.js'
);

$css = array(
  '../library/graph/draw-bar-chart.css'
);

$UserSession = new UserSession();
$Menu = new Menu();
$Header = new Header();
$Footer = new Footer($js,$css);
$Header->headerBasico();
$Menu->menuBasico();
?>
<div class="container">
  <div class="row mb-3">
    <div class="col">.col</div>
    <div class="col">.col</div>
  </div>
</div>
<?php
$Footer->footer();
?>