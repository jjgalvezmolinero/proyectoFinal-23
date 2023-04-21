<?php
require_once '../../classes/Permisos.php';
require_once '../../classes/Roles.php';


if($_POST['accion'] == "insertar"){
  $Permisos = new Permisos();
  $nombre = $_POST['nombre'];
  $idnumber = $_POST['idnumber'];
  $datos = $_POST['datos'];
  echo $Permisos->insert_permiso($nombre, $idnumber, $datos);
} elseif($_POST['accion'] == "borrar"){
  $Role = new Roles();
  $id = $_POST['id'];
  echo $Role->delete_rol($id);
}