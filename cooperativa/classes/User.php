<?php
require 'DB.php';
require 'UserSession.php';
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

    $id_usuario = $this->insert_sql($sql);

    if($login)
      $this->login($username, $password);

    return $id_usuario;
  }

  public function insert_user_meta($userid, $key, $value) {
    $sql_comprobacion = "SELECT id FROM user_meta WHERE userid=$userid AND user_key='$key' AND user_value='$value'";
    if(!$this->record_exists($sql_comprobacion))
      $sql = "INSERT INTO user_meta VALUES user_key='$key', user_value='$value' WHERE userid=$userid";
    else
      $sql = "UPDATE user_meta SET (null,$userid,'$key', $value)";
    $this->insert_sql($sql);
  }

  public function login($user, $pass) {
    $usuario = $this->user_exits($user,$pass);
    if(!empty($usuario)){
      $session = new UserSession();
      $session->setCurrentUser($user);
      return true;
    }
    return false;
  }
}