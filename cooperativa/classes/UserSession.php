<?php
class UserSession {
  public function __construct() {
    error_reporting(0);
    session_start();
  }

  public function setCurrentRol($rol) {
    $_SESSION['rol']=$rol;
  }

  public function getCurrentRol() {
    return $_SESSION['rol'];
  }

  public function setCurrentUser($user) {
    $_SESSION['user']=$user;
  }

  public function getCurrentUser() {
    return $_SESSION['user'];
  }

  public function setCurrentId($id) {
    $_SESSION['user-id']=$id;
  }

  public function getCurrentId() {
    return $_SESSION['user-id'];
  }

  public function closeSession() {
    session_unset();
    session_destroy();
  }

  public function isLogged() {
    if(isset($_SESSION['user']))
      return true;
    return false;
  }

  public function isAdmin() {
    if($this->getCurrentRol() == 'admin') {
      return true;
    }
    return false;
  }
}