<?php
function popup_usuarios($idusuario = 0) {
  require_once '../classes/Roles.php';
  require_once '../classes/User.php';
  $Roles = new Roles();
  $datos = [];
  if($idusuario > 0) {
    $User = new User();
    $datos = $User->get_user_popup($idusuario);
    print_r($datos);
  }
  ?>
  <div class="modal fade" id="popupNewUser" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="titulo">Creación de un nuevo usuario</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="form-nuevo-usuario" name="nuevoUsuario" action="#">
          <div class="modal-body">
            <div class="form-group">
              <div class="row mb-3 align-items-center">
                <div class="col">
                  <label for="firstname" class="col-form-label">Nombre:</label>
                  <input type="text" class="form-control" id="firstname" name="firstname" required>
                </div>
                <div class="col">
                  <label for="lastname" class="col-form-label">Apellidos:</label>
                  <input type="text" class="form-control" id="lastname" name="lastname" required>
                </div>
                <div class="col">
                  <label for="nif">NIF/DNI:</label><br>
                  <input type="text" class="form-control" name="nif" id="nif" required>
                </div>
              </div>
            </div>
            <div class="form-group">
            <div class="row mb-2">
                <div class="col">
                  <label for="username">Nombre de usuario:</label>
                  <input type="text" class="form-control" name="username" id="username" required>
                </div>
                <div class="col">
                  <label for="email">Email:</label>
                  <input type="mail" class="form-control" name="email" id="email" required>
                </div>
              </div>
              <div class="row mb-2">
                <div class="col">
                  <label for="password">Contraseña:</label>
                  <input type="password" class="form-control" name="password" id="password" required>
                </div>
                <div class="col">
                  <label for="password-confirm">Confirmar contraseña:</label>
                  <input type="password" class="form-control" name="password-confirm" id="password-confirm" required>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col">
                <label for="rol">Rol:</label>
                <select class="form-control" name="rol" id="rol" required>
                  <?php
                  $roles = $Roles->get_roles();
                  foreach ($roles as $rol) {
                    echo "<option value='" . $rol['id'] . "'>" . $rol['name'] . "</option>";
                  }
                  ?>
                </select>
              </div>
            </div>
          </div>
        
          <div class="modal-footer">
            <button class="text-primary bg-white border-primary rounded p-2" id="clearForm">
              <i class="fa-solid fa-eraser" aria-hidden="true"></i>
            </button>
            <button class="text-danger bg-white border-danger rounded p-2" data-dismiss="modal" id="cancelForm">
              <i class="fa fa-xmark"></i>
            </button>
            <button class="text-success bg-white border-success rounded p-2" id="submitForm" data-accion="insertar" data-usuario="0">
              <i class="fa fa-check" aria-hidden="true"></i>
            </button>
          </div>
          <div id="respuesta"></div>
        </form>
      </div>
    </div>
  </div>
  <?php
}