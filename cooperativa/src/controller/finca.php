<?php
require '../../classes/Finca.php';
$nombre = $_POST['nombre-finca'];
$municipio = $_POST['municipio-finca'];
$provincia = $_POST['provincia-finca'];
$poligono = $_POST['poligono-finca'];
$parcela = $_POST['parcela-finca'];
$regadio = $_POST['regadio-finca'];

$Finca = new Finca();
$Finca->insert_finca($nombre,$municipio,$provincia,$poligono,$parcela,$regadio);