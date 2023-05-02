<?php
require_once '../../classes/User.php';
require_once '../../classes/Roles.php';

$User = new User();

if($_POST['accion'] == 'insertar') {
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $username = $_POST['username'];
  $nif = $_POST['nif'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $rol = $_POST['rol'];
  $nif = empty($nif)?null:$nif;
  $user = [
    'username' => $username,
    'nif' => $nif,
    'email' => $email,
    'password' => $password
  ];
  $id_usuario = $User->create_user($user);
  if($id_usuario > 0) {
    $User->insert_user_meta($id_usuario, 'firstname', $firstname);
    $User->insert_user_meta($id_usuario, 'lastname', $lastname);
    $Role = new Roles();
    $Role->insert_role_assignments($id_usuario, $rol);
    echo $id_usuario;
  }
} else if($_POST['accion'] == 'eliminar') {
  echo $User->delete_user($_POST['id']);
} else if($_POST['accion'] == 'getUser') {
  $id = $_POST['id'];
  $user = $User->get_user($id)[0];
  $user_meta = $User->get_user_meta($id);
  $user['firstname'] = $user_meta['firstname'];
  $user['lastname'] = $user_meta['lastname'];
  $user['rol'] = $User->get_user_rol($id);
  echo json_encode($user, JSON_UNESCAPED_UNICODE);
} else if($_POST['accion'] == 'editar') {
  $id = $_POST['id'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $username = $_POST['username'];
  $nif = $_POST['nif'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $rol = $_POST['rol'];
  $nif = empty($nif)?null:$nif;
  $user = [
    'id' => $id,
    'username' => $username,
    'nif' => $nif,
    'email' => $email,
    'password' => $password
  ];
  $User->update_user($user);
  $User->update_user_meta($id, 'firstname', $firstname);
  $User->update_user_meta($id, 'lastname', $lastname);
  $Role = new Roles();
  $Role->update_role_assignments($id, $rol);
  echo $id;
} else if($_POST['accion'] == 'getRol') {
  $Role = new Roles();
  $roles = $Role->get_roles();
  echo json_encode($roles, JSON_UNESCAPED_UNICODE);
}