<?php
class DB {

  private $host_name = '192.168.1.134';
  private $database = 'cooperativa';
  private $user_name = 'cooperativa';
  private $password = 'Cooperativa_1234';

  private function connection() {
    $link = new mysqli($this->host_name, $this->user_name, $this->password, $this->database);

    if ($link->connect_error) {
      die('<p>Error al conectar con servidor MySQL: '. $link->connect_error .'</p>');
    } else {
      return $link;
    }
  }

  public function get_sql($sql) {
    $con = $this->connection();
    $resultado = $con->query($sql);
    $rows = [];

    while ($row = $resultado->fetch_assoc()){
      $rows[] = $row;
    }

    $con->close();

    return $rows;
  }

  public function insert_sql($sql) {
    $con = $this->connection();
    $con->query($sql);
    $id=0;

    $id = $con->insert_id;

    $con->close();

    return $id;
  }

  public function execute($sql) {
    $con = $this->connection();
    $result = $con->query($sql);
    $con->close();
    if($result->field_count>0)
      return true;
    
    return false;
  }

  public function record_exists($sql) {
    return $this->execute($sql);
  }
} 