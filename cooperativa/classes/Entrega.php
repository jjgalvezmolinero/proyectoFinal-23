<?php
require_once 'DB.php';

class Entrega {
  public function insert_entrega($finca, $aceituna, $temporada, $fecha, $peso) {
    require_once 'UserSession.php';
    $UserSession = new UserSession();
    $id = $UserSession->getCurrentId();
    $DB = new DB();
    $sql = "INSERT INTO entrega (id_finca, user_id, variedad, temporada, fecha, peso) VALUES (
      $finca,
      $id,
      $aceituna,
      $temporada,
      now(),
      $peso
    )";
    return $DB->insert_sql($sql);
  }
  public function get_entregas() {
    $DB = new DB();
    $sql = "SELECT e.id, f.nombre as finca, a.denominacion as aceituna, t.denominacion as temporada, peso
    FROM entrega e 
      INNER JOIN finca f ON f.id = e.id_finca 
      INNER JOIN aceituna a ON a.id = e.variedad 
      INNER JOIN temporada t ON t.id = e.temporada";
    $datos = $DB->get_sql($sql);
    $entregas = [];
    foreach($datos as $dato) {
      $entregas[] = [
        'id' => $dato['id'],
        'finca' => $dato['finca'],
        'aceituna' => $dato['aceituna'],
        'temporada' => $dato['temporada'],
        'peso' => $dato['peso']
      ];
    }
    return $entregas;
  }
  public function get_entrega($id) {
    $DB = new DB();
    $sql = "SELECT id_finca as finca, peso, variedad, temporada FROM entrega e WHERE id = $id";
    return $DB->get_sql($sql);
  }
  public function update_entrega($id, $finca, $aceituna, $temporada, $peso) {
    $DB = new DB();
    $sql = "UPDATE entrega SET 
      id_finca = $finca,
      variedad = $aceituna,
      temporada = $temporada,
      peso = $peso
    WHERE id = $id";
    return $DB->execute($sql);
  }
  public function delete_entrega($id) {
    $DB = new DB();
    $sql = "DELETE FROM entrega WHERE entrega.id = $id";
    return $DB->execute($sql);
  }
  public function get_entregas_temporada($id) {
    $DB = new DB();
    $sql = "SELECT peso, f.nombre, f.municipio FROM entrega e INNER JOIN finca f ON e.id_finca = f.id WHERE temporada = $id";
    return $DB->get_sql($sql);
  }
}