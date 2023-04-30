<?php
require_once '../../classes/Temporada.php';

$Temporada = new Temporada();
if($_POST['accion'] == 'insertar') {
  $denominacion = $_POST['denominacion'];
  $fecha_inicio = strtotime($_POST['fecha_inicio']);
  $fecha_fin = strtotime($_POST['fecha_fin']);
  echo $Temporada->insert_temporada($denominacion, $fecha_inicio, $fecha_fin);
} else if($_POST['accion'] == 'borrar') {
  echo $Temporada->delete_temporada($_POST['id']);
} else if($_POST['accion'] == 'editar') {
  $denominacion = $_POST['denominacion'];
  $fecha_inicio = $_POST['fecha_inicio'];
  $fecha_fin = $_POST['fecha_fin'];
  echo $Temporada->update_temporada($_POST['id'], $denominacion, $fecha_inicio, $fecha_fin);
} else if($_POST['accion'] == 'getTemporada') {
  $id = $_POST['id'];
  $datos = $Temporada->get_temporada($id)[0];
  $temporada = [
    'denominacion' => $datos['denominacion'],
    'fecha_inicio' => date('Y-m-d',$datos['fecha_inicio']),
    'fecha_fin' => date('Y-m-d',$datos['fecha_fin'])
  ];
  echo json_encode($temporada, JSON_UNESCAPED_UNICODE);
} else if($_POST['accion'] == 'getTemporadas') {
  $temporadas = $Temporada->get_temporadas();
  echo json_encode($temporadas, JSON_UNESCAPED_UNICODE);
}