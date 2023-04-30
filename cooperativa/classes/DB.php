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
    try {
      if($con->query($sql) === TRUE) {
        $id = 0;
        $id = $con->insert_id;
        return $id;
      }
    } catch (Exception $e) {
      return $e->getMessage();
    }
  }

  public function execute($sql) {
    $con = $this->connection();
    try {
      $result = $con->query($sql);
      if($result || (!empty($result->num_rows) && $result->num_rows > 0)) {
        $con->close();
        return 1;
      } else {
        $con->close();
        return 0;
      }
    } catch (Exception $e) {
      $con->close();
      return $e->getMessage();
    }
  }

  public function record_exists($sql) {
    return $this->execute($sql)==1?true:false;
  }
} 