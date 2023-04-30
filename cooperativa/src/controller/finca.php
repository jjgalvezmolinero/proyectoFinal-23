<?php
require_once '../../classes/Finca.php';

$accion = $_POST['accion'];

$Finca = new Finca();
if($accion == 'insert') {
  $nombre = $_POST['nombreFinca'];
  $municipio = $_POST['municipioFinca'];
  $provincia = $_POST['provinciaFinca'];
  $poligono = $_POST['poligonoFinca'];
  $parcela = $_POST['parcelaFinca'];
  $regadio = $_POST['regadioFinca'];
  echo $Finca->insert_finca($nombre,$municipio,$provincia,$poligono,$parcela,$regadio);
} else if($accion == 'delete') {
  $id = $_POST['id'];
  echo $Finca->delete_finca($id);
} else if($accion == 'editar') {
  $nombre = $_POST['nombreFinca'];
  $municipio = $_POST['municipioFinca'];
  $provincia = $_POST['provinciaFinca'];
  $poligono = $_POST['poligonoFinca'];
  $parcela = $_POST['parcelaFinca'];
  $regadio = $_POST['regadioFinca'];
  $id = $_POST['id'];
  echo $Finca->edit_finca($id, $nombre,$municipio,$provincia,$poligono,$parcela,$regadio);
} else if($accion == 'getFinca') {
  $id = $_POST['id'];
  $datos = $Finca->get_finca($id);
  $finca = [
    'nombre' => $datos['nombre'],
    'municipio' => $datos['municipio'],
    'provincia' => $datos['provincia'],
    'poligono' => $datos['poligono'],
    'parcela' => $datos['parcela'],
    'regadio' => ($datos['regadio']=='Sí')?'regadioFincaSi':'regadioFincaNo'
  ];
  echo json_encode($finca, JSON_UNESCAPED_UNICODE);
}