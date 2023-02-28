<?php
require_once 'DB.php';
class Permisos {
  function __construct() {}
  public function get_permisos() {
    $DB = new DB();
    $sql = "SELECT * FROM role_capability";
    return $DB->get_sql($sql);
  }
  public function insert_permiso($name, $capability){
    $DB = new DB();
    $sql = "INSERT INTO role_capability (name, capability) VALUES ('$name', '$capability')";
    return $DB->insert_sql($sql);
  }
  
}