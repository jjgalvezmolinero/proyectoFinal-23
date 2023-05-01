<?php
require_once '../../classes/Aceituna.php';

$Aceituna = new Aceituna();
if($_POST['accion'] == 'insertar') {
  $denominacion = $_POST['denominacion'];
  echo $Aceituna->insert_aceituna($denominacion);
} else if($_POST['accion'] == 'borrar') {
  echo $Aceituna->delete_aceituna($_POST['id']);
} else if($_POST['accion'] == 'editar') {
  $denominacion = $_POST['denominacion'];
  echo $Aceituna->update_aceituna($_POST['id'], $denominacion);
} else if($_POST['accion'] == 'getAceituna') {
  $id = $_POST['id'];
  $datos = $Aceituna->get_aceituna($id)[0];
  $aceituna = [
    'denominacion' => $datos['denominacion']
  ];
  echo json_encode($aceituna, JSON_UNESCAPED_UNICODE);
}