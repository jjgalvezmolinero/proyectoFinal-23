<?php
require_once '../../classes/Permisos.php';
$Permisos = new Permisos();

$nombre = $_POST['nombre'];
$idnumber = $_POST['idnumber'];
$datos = $_POST['datos'];

echo $Permisos->insert_permiso($nombre, $idnumber, $datos);