<?php
require_once 'classes/UserSession.php';
$session = new UserSession();
$user = $session->getCurrentUser();
if(empty( $user)) {
  header("location: login.php");
} else {
  header('location: views/principal.php');
}

