<?php
require_once '../../classes/User.php';
$email = $_POST['email'];
$user = $_POST['user'];
$pass = $_POST['pass'];
$dni = $_POST['dni'];
$login = isset($_POST['login'])?true:false;
$datos_usuario = array(
  'nif'=>$dni,
  'email'=>$email,
  'username'=>$user,
  'password'=>$pass
);

$usuario = new User();
$id_usuario = $usuario->create_user($datos_usuario, $login);

if($id_usuario > 0)
  echo 'true';
else
  echo 'false';