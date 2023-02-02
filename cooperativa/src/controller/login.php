<?php
require_once '../../classes/User.php';
require_once '../../classes/UserSession.php';

$user = $_POST['user'];
$pass = $_POST['pass'];

$userCon = new User();
$usuario = $userCon->login($user,$pass);

echo $usuario;