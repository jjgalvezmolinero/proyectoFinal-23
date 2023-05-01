<?php
require_once 'DB.php';
require_once 'UserSession.php';
class Finca{
  function __construct() {}

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
    $consulta = 'SELECT id, nombre, municipio, provincia, poligono, parcela, CASE 
      WHEN regadio THEN "Sí" 
      ELSE "No" 
    END regadio FROM finca WHERE user_id='.$id_usuario;
    return $DB->get_sql($consulta);
  }

  function get_fincas_selects() {
    $DB = new DB();
    $consulta = 'SELECT id, nombre FROM finca';
    return $DB->get_sql($consulta);
  }

  function delete_finca($id_finca) {
    $DB = new DB();
    $consulta = 'DELETE FROM finca WHERE id='.$id_finca;
    return $DB->execute($consulta);
  }

  function get_finca($id_finca) {
    $DB = new DB();
    $consulta = 'SELECT nombre, municipio, provincia, poligono, parcela, CASE
      WHEN regadio THEN "Sí"
      ELSE "No" 
    END regadio FROM finca WHERE id='.$id_finca;
    return $DB->get_sql($consulta)[0];
  }

  function edit_finca($id_finca,$nombre,$municipio,$provincia,$poligono,$parcela,$regadio) {
    $DB = new DB();
    if($regadio=='No') {
      $consulta = "UPDATE finca SET nombre='$nombre', municipio='$municipio', provincia='$provincia', poligono='$poligono', parcela='$parcela', regadio=FALSE WHERE id=$id_finca";
    } else if($regadio=='Sí') {
      $consulta = "UPDATE finca SET nombre='$nombre', municipio='$municipio', provincia='$provincia', poligono='$poligono', parcela='$parcela', regadio=TRUE WHERE id=$id_finca";
    }
    return $DB->execute($consulta);
  }
}