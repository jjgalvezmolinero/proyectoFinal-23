<?php
require_once '../classes/Menu.php';
require_once '../classes/Header.php';
require_once '../classes/Footer.php';
require_once '../classes/User.php';
require_once '../classes/UserSession.php';
require_once '../src/components/tabla.php';
require_once '../src/components/popup_usuarios.php';

$Menu = new Menu();
$Header = new Header();
$js = array(
  "../js/usuarios.js",
  "../js/usuarios_validate.js",
  "https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"
);
$css = array();
$Footer = new Footer($js, $css);
$Header->headerBasico();
$Menu->menuBasico();
$Footer->footer();
$UserSession = new UserSession();

if(!$UserSession->isLogged()){
  header('Location: ../index.php');
}
$User = new User();
$lista_usuarios = $User->get_all_users();
echo "<div class='listaUsuarios'>";
  tabla_generica($lista_usuarios, ["Nombre de usuario", 
    "NIF",
    "Correo electrónico",
    "Rol"
  ]);
echo "</div>";
?>
<div class="btnFlotante">
  <button class="btn-add-popup btn btn-primary " id="abrirPopup" type="button" data-toggle="modal" data-target="#popupNewUser">
    <i class="fa fa-plus" aria-hidden="true"></i>
  </button>
</div>
<?php
popup_usuarios();