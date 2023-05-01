<?php
require_once 'DB.php';

class Aceituna {
  public function get_aceitunas() {
    $DB = new DB();
    $sql = "SELECT * FROM aceituna";
    $datos = $DB->get_sql($sql);
    $aceitunas = [];
    foreach($datos as $dato) {
      $aceitunas[] = [
        'id' => $dato['id'],
        'denominacion' => $dato['denominacion']
      ];
    }
    return $aceitunas;
  }
  public function insert_aceituna($denominacion){
    $DB = new DB();
    $sql = "INSERT INTO aceituna (denominacion) VALUES (
      '$denominacion'
    )";
    return $DB->insert_sql($sql);
  }
  public function get_aceituna($id){
    $DB = new DB();
    $sql = "SELECT * FROM aceituna WHERE id = '$id'";
    return $DB->get_sql($sql);
  }
  public function update_aceituna($id, $denominacion){
    $DB = new DB();
    $sql = "UPDATE aceituna SET 
      denominacion = '$denominacion'
    WHERE id = '$id'";
    return $DB->execute($sql);
  }
  public function delete_aceituna($id) {
    $DB = new DB();
    $sql = "DELETE FROM aceituna WHERE aceituna.id = '$id'";
    return $DB->execute($sql);
  }
}