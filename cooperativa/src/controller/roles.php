<?php
require_once '../../classes/Permisos.php';
require_once '../../classes/Roles.php';

$Role = new Roles();
if($_POST['accion'] == "insertar"){
  $Permisos = new Permisos();
  $nombre = $_POST['nombre'];
  $idnumber = $_POST['idnumber'];
  $datos = $_POST['datos'];
  echo $Permisos->insert_permiso($nombre, $idnumber, $datos);
} elseif($_POST['accion'] == "borrar"){
  $id = $_POST['id'];
  echo $Role->delete_rol($id);
} else if($_POST['accion'] == 'getRol') {
  $datos = $Role->get_role_all($_POST['id']);
  $rol = [];
  $checkbox = [];
  foreach($datos as $key => $value){
    $rol = [
      'nombre' => $value['name'],
      'idnumber' => $value['idnumber']
    ];
    $checkbox[] = $value['capability_id'];
  }
  $rol['checkbox'] = $checkbox;
  echo json_encode($rol, JSON_UNESCAPED_UNICODE);
} else if($_POST['accion'] == 'actualizar') {
  $id = $_POST['id'];
  $nombre = $_POST['nombre'];
  $idnumber = $_POST['idnumber'];
  $datos = $_POST['datos'];
  echo $Role->update_rol($id, $nombre, $idnumber, $datos);
}