<?php
require_once 'DB.php';
class Permisos {
  function __construct() {}
  public function get_permisos() {
    $DB = new DB();
    $sql = "SELECT * FROM role_capability";
    return $DB->get_sql($sql);
  }
  public function insert_permiso($nombre, $idnumber, $datos){
    if($this->comprobar_idnumber_repetido($idnumber)) {
      return "El idnumber ya existe";
    } else {
      $id_rol = $this->insert_rol($nombre, $idnumber);
      foreach ($datos as $value) {
        if($value['value'] == "on") continue;
        $id_permiso = $value['value'];
        $this->insert_role_data($id_rol, $id_permiso);
      }
      return true;
    }
  }

  private function insert_rol($name, $idnumber) {
    $DB = new DB();
    $sql = "INSERT INTO role (name, idnumber) VALUES ('$name', '$idnumber')";
    return $DB->insert_sql($sql);
  }

  private function insert_role_data($id_rol, $id_capability) {
    $DB = new DB();
    $sql = "INSERT INTO role_data (role_id, capability_id) VALUES ('$id_rol', '$id_capability')";
    return $DB->insert_sql($sql);
  }

  private function comprobar_idnumber_repetido($idnumber) {
    $DB = new DB();
    $sql = "SELECT * FROM role WHERE idnumber = '$idnumber'";
    $result = $DB->get_sql($sql);
    if(count($result) > 0) {
      return true;
    } else {
      return false;
    }
  }
  
}