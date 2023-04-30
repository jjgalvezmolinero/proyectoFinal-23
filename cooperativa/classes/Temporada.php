<?php
require_once 'DB.php';

class Temporada {
  public function get_temporadas() {
    $DB = new DB();
    $sql = "SELECT * FROM temporada";
    $datos = $DB->get_sql($sql);
    $temporadas = [];
    foreach($datos as $dato) {
      $temporadas[] = [
        'id' => $dato['id'],
        'denominacion' => $dato['denominacion'],
        'fecha_inicio' => date('d/m/Y', $dato['fecha_inicio']),
        'fecha_fin' => date('d/m/Y', $dato['fecha_fin'])
      ];
    }
    return $temporadas;
  }
  public function insert_temporada($denominacion, $fecha_inicio, $fecha_fin){
    $DB = new DB();
    $sql = "INSERT INTO temporada (denominacion, fecha_inicio, fecha_fin) VALUES (
      '$denominacion',
      $fecha_inicio,
      $fecha_fin
    )";
    return $DB->insert_sql($sql);
  }
  public function get_temporada($id){
    $DB = new DB();
    $sql = "SELECT * FROM temporada WHERE id = '$id'";
    return $DB->get_sql($sql);
  }
  public function update_temporada($id, $denominacion, $fecha_inicio, $fecha_fin){
    $DB = new DB();
    $sql = "UPDATE temporada SET 
      denominacion = '$denominacion',
      fecha_inicio = $fecha_inicio,
      fecha_fin = $fecha_fin
    WHERE id = '$id'";
    return $DB->execute($sql);
  }
  public function delete_temporada($id) {
    $DB = new DB();
    $sql = "DELETE FROM temporada WHERE temporada.id = '$id'";
    return $DB->execute($sql);
  }
}