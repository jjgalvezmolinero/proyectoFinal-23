<?php
class UserSession {
  public function __construct() {
    session_start();
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
}