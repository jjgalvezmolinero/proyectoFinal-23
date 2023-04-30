<?php
require_once 'DB.php';

class Roles {
  public function get_roles() {
    $DB = new DB();
    $sql = "SELECT * FROM role";
    return $DB->get_sql($sql);
  }
  public function insert_rol($name, $idnumber){
    $DB = new DB();
    $sql = "INSERT INTO role (name, idnumber) VALUES ('$name', '$idnumber')";
    return $DB->insert_sql($sql);
  }
  public function insert_role_data($role_id, $capability_id){
    $DB = new DB();
    $sql = "INSERT INTO role_data (role_id, capability_id) VALUES ($role_id, $capability_id)";
    return $DB->insert_sql($sql);
  }
  public function get_role_data($role_id){
    $DB = new DB();
    $sql = "SELECT * FROM role_data WHERE role_id = '$role_id'";
    return $DB->get_sql($sql);
  }
  public function delete_role_data($role_id){
    $DB = new DB();
    $sql = "DELETE FROM role_data WHERE role_id = '$role_id'";
    return $DB->execute($sql);
  }
  public function get_role_assignments($user_id){
    $DB = new DB();
    $sql = "SELECT * FROM role_assignments WHERE user_id = '$user_id'";
    return $DB->get_sql($sql);
  }
  public function insert_role_assignments($user_id, $role_id){
    $DB = new DB();
    $sql = "INSERT INTO role_assignments (user_id, role_id) VALUES ('$user_id', '$role_id')";
    return $DB->insert_sql($sql);
  }
  public function delete_role_assignments($user_id, $role_id){
    $DB = new DB();
    $sql = "DELETE FROM role_assignments WHERE user_id = '$user_id' AND role_id = '$role_id'";
    return $DB->execute($sql);
  }
  public function update_role_assignments($user_id, $role_id){
    $DB = new DB();
    $sql = "UPDATE role_assignments SET role_id = '$role_id' WHERE user_id = '$user_id'";
    return $DB->execute($sql);
  }
  public function delete_rol($id) {
    $DB = new DB();
    $sql = "DELETE FROM role WHERE role.id = '$id'";
    return $DB->execute($sql);
  }
  public function get_role_all($id) {
    $DB = new DB();
    $sql = "SELECT r.*, rd.capability_id 
        FROM role r
          INNER JOIN role_data rd ON rd.role_id = r.id
        WHERE r.id=$id";
    $rol = $DB->get_sql($sql);
    return $rol;
  }
  public function update_rol($id, $name, $idnumber, $datos) {
    $DB = new DB();
    $sql = "UPDATE role SET name='$name', idnumber='$idnumber' WHERE id=$id";
    $DB->execute($sql);
    $this->delete_role_data($id);
    foreach($datos as $clave => $valor) {
      $this->insert_role_data($id, $valor['value']);
    }
    return 1;
  }
}