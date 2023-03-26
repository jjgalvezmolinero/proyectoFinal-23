<?php
require_once '../../classes/Header.php';
require_once '../../classes/Footer.php';
require_once '../../classes/Permisos.php';
require_once '../../classes/UserSession.php';

$css = array('../../css/edit_rol.css');
$js = array('../../js/edit_rol.js');
$Header = new Header();
$Footer = new Footer($js,$css);
$Header->headerBasico();
$Permisos = new Permisos();
$UserSession = new UserSession();
if(!$UserSession->isLogged()){
  header('Location: ../index.php');
}
$id = $_GET['id'];
$lista_permisos = $Permisos->get_permisos($id);

?>
<div class="logo">
  <img src="../../img/logo.svg" class='logo_edit'>
</div>
<form id="form-edit-rol" name="editRol" action="#">
  <input type="hidden" name="id" value="<?php echo $id; ?>">
  <div class="modal-body">
    <div class="form-group">
      <div class="row mb-2">
        <div class="col">
          <label for="nombreRol" class="col-form-label">Nombre del rol:</label>
          <input type="text" class="form-control" id="nombreRol" name="nombreRol" required>
        </div>
        <div class="col">
          <label for="idnumberRol" class="col-form-label">Nombre único del rol:</label>
          <input type="text" class="form-control" id="idnumberRol" name="idnumberRol" required>
        </div>
      </div>
    </div>
    <div class="form-group permisos">
      <input type="checkbox" class="form-check-input" name="marcarTodos" id="marcarTodos">
      <label for="marcarTodos">Todos los roles</label><br>
    </div>
    <div class="form-group">
      <hr>
    </div>
    <form action="#" id="permisosPopup" name="permisosPopup">
      <div class="form-group" >
        <?php
          $pasada = 0;
          foreach($lista_permisos as $permiso) {
            if($pasada == 0) {
              echo '<div class="row mb-2 permisos">';
            } else if( 3== $pasada-1 ) {
              $pasada = 0;
              echo '</div><div class="row mb-2 permisos">';
            }
            $pasada++;
            $id = $permiso['id'];
            $name = $permiso['name'];
            $capability = $permiso['capability'];
            ?>
              <div class="col">
                <input type="checkbox" class="form-check-input" name="<?php echo $capability; ?>" id="<?php echo $capability; ?>" value="<?php echo $id;?>">
                <label for="<?php echo $capability; ?>"><?php echo $name; ?></label><br>
              </div>
            <?php
            if($pasada == count($lista_permisos)-1) {
              echo '</div>';
            }
          }
        ?>
      </div>
    </form>
  </div>
</form>