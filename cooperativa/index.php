<?php
require_once 'classes/UserSession.php';
$session = new UserSesion();
$user = $session->getCurrentUser();
echo $user;
// if(empty( $user))
//   header("location: login.php");

