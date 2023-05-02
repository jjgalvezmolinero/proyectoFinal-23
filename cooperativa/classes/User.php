<?php
require_once 'DB.php';
require_once 'UserSession.php';

class User extends DB {
  private $nombre;
  private $username;

  public function user_exits($user, $pass) {
    $pass = md5($pass);
    $sql = "SELECT * FROM user WHERE (username='$user' OR email='$user') AND password = '$pass'";
    return $this->get_sql($sql);
  }

  public function create_user($user, $login=false) {
    $username = $user['username'];
    $nif = empty($user['nif'])?null:$user['nif'];
    $email = $user['email'];
    $password = md5($user['password']);

    if(is_null($nif)) 
      $sql = "INSERT INTO user VALUES (null, '$username', null, '$email', '$password')";
    else
      $sql = "INSERT INTO user VALUES (null, '$username', '$nif', '$email', '$password')";

    try {
      $id_usuario = $this->insert_sql($sql);
      return $id_usuario;
    } catch (Exception $e) {
      return $e->getMessage();
    }
  }

  public function insert_user_meta($userid, $key, $value) {
    // $sql_comprobacion = "SELECT id FROM user_meta WHERE user_id=$userid AND user_key='$key'"; 
    // $existe = $this->record_exists($sql_comprobacion);
    // if(!$existe) 
      $sql = "INSERT INTO user_meta VALUES (null, $userid, '$key', '$value')";
    // else
    //   $sql = "UPDATE user_meta SET (null,$userid,'$key', '$value') WHERE user_id=$userid AND user_key='$key'";
    return $this->insert_sql($sql);
  }
  public function update_user_meta($userid, $key, $value) {
    $sql = "UPDATE user_meta SET user_value='$value' WHERE user_id=$userid AND user_key='$key'";
    return $this->execute($sql);
  }

  public function update_user($user) {
    foreach($user as $clave => $valor) {
      if($clave != 'id' ||  
        ($clave != 'password' && !empty($valor))
      ) {
        if($clave == 'password')
          $valor = md5($valor);
        $sql = "UPDATE user SET $clave='$valor' WHERE id=$user[id]";
        $this->execute($sql);
      }
    }
  }

  public function get_user_meta($userid) {
    $sql = "SELECT user_key, user_value FROM user_meta WHERE user_id=$userid";
    $user_meta = $this->get_sql($sql);
    $meta = [];
    foreach($user_meta as $clave=>$valor) {
      $meta[$valor['user_key']] = $valor['user_value'];
    }
    return $meta;
  }

  public function get_user_rol($userid) {
    $sql = "SELECT role_id FROM role_assignments WHERE user_id=$userid";
    $rol = $this->get_sql($sql);
    return $rol[0]['role_id'];
  }

  public function get_user_rol_idnumber($userid) {
    $sql = "SELECT idnumber FROM role WHERE id = (SELECT role_id FROM role_assignments WHERE user_id = $userid)";
    $rol = $this->get_sql($sql);
    return $rol[0]['idnumber'];
  }

  public function delete_user($id) {
    $sql = "DELETE FROM user WHERE id=$id";
    return $this->execute($sql);
  }

  public function login($user, $pass) {
    require_once 'Roles.php';
    $usuario = $this->user_exits($user,$pass);
    if(!empty($usuario)){
      $session = new UserSession();
      $session->setCurrentUser($user);
      $session->setCurrentId($usuario[0]['id']);
      $session->setCurrentRol($this->get_user_rol_idnumber($usuario[0]['id']));
      return true;
    }
    return false;
  }

  public function get_all_users() {
    $sql = "SELECT u.id, u.username, u.nif, u.email, r.name 
    FROM user u
      INNER JOIN role_assignments ra ON u.id = ra.user_id 
      INNER JOIN role r ON r.id = ra.role_id";
    return $this->get_sql($sql);
  }

  public function get_user($id) {
    $sql = "SELECT * FROM user WHERE id=$id";
    return $this->get_sql($sql);
  }

  public function get_user_popup($id) {
    $sql = "SELECT u.id, u.username, u.nif, u.email, ra.role_id 
    FROM user u
      INNER JOIN role_assignments ra ON u.id = ra.user_id
    WHERE u.id=$id";
    return $this->get_sql($sql);
  }
}