<?php
require 'DB.php';
require 'UserSession.php';
class Finca{
  function __construct() {

  }

  function insert_finca($nombre,$municipio,$provincia,$poligono,$parcela,$regadio=FALSE) {
    $DB = new DB();
    $UserSession = new UserSession();
    $user_id=$UserSession->getCurrentId();
    if($regadio=='No') {
      $consulta = "INSERT INTO finca (nombre, municipio, provincia, poligono, parcela, regadio, user_id) 
      VALUES ('$nombre', '$municipio', '$provincia', '$poligono', '$parcela', FALSE, $user_id)";
    } else if($regadio=='Sí') {
      $consulta = "INSERT INTO finca (nombre, municipio, provincia, poligono, parcela, regadio, user_id) 
      VALUES ('$nombre', '$municipio', '$provincia', '$poligono', '$parcela', TRUE, $user_id)";
    }
    
    return $DB->insert_sql($consulta);
  }

  function get_fincas_users($id_usuario) {
    $DB = new DB();
    $consulta = 'SELECT nombre, municipio, provincia, poligono, parcela, CASE 
      WHEN regadio THEN "Sí" 
      ELSE "No" 
    END regadio FROM finca WHERE user_id='.$id_usuario;
    return $DB->get_sql($consulta);
  }
}