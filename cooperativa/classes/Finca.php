<?php
require 'DB.php';
require 'UserSession.php';
class Finca{
  function __construct() {

  }

  function insert_finca($nombre,$municipio,$provincia,$poligono,$parcela,$regadio) {
    $DB = new DB();
    $UserSession = new UserSession();
    $user_id=$UserSession->getCurrentId();
    $regadio = $regadio=='on'?TRUE:FALSE;
    $consulta = "INSERT INTO finca (nombre, municipio, provincia, poligono, parcela, regadio, user_id) 
    VALUES ('$nombre', '$municipio', '$provincia', '$poligono', '$parcela', $regadio,$user_id)";
    $DB->insert_sql($consulta);
  }

  function get_fincas_users($id_usuario) {
    $DB = new DB();
    $consulta = "SELECT nombre, municipio, provincia, poligono, parcela, regadio FROM finca WHERE user_id=$id_usuario";
    return $DB->get_sql($consulta);
  }
}