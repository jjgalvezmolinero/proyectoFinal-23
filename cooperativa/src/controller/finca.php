<?php
require '../../classes/Finca.php';
$nombre = $_POST['nombreFinca'];
$municipio = $_POST['municipioFinca'];
$provincia = $_POST['provinciaFinca'];
$poligono = $_POST['poligonoFinca'];
$parcela = $_POST['parcelaFinca'];
$regadio = $_POST['regadioFinca'];

$Finca = new Finca();
echo $Finca->insert_finca($nombre,$municipio,$provincia,$poligono,$parcela,$regadio);