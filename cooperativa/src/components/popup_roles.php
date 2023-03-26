<?php
function popup_roles($lista_permisos) {
?>
  <div class="modal fade" id="popupNewRol" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Creación de un nuevo rol</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="formNewRol" name="formNewRol" action="#">
          <input type="hidden" name="accion" value="insercion_rol">
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
        
          <div class="modal-footer">
            <button type="button" class="text-primary bg-white border-primary rounded p-2" id="clearFormRol">
              <i class="fa-solid fa-eraser" aria-hidden="true"></i>
            </button>
            <button type="button" class="text-danger bg-white border-danger rounded p-2" data-dismiss="modal" id="cancelFormRol">
              <i class="fa fa-xmark"></i>
            </button>
            <button type="button" class="text-success bg-white border-success rounded p-2" id="submitFormRol">
              <i class="fa fa-check" aria-hidden="true"></i>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

<?php
}

function popup_permisos($lista_permisos) {
  ?>
    <div class="modal fade" id="popupNewRol" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Creación de un nuevo rol</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form id="formNewRol" name="formNewRol" action="#">
            <div class="modal-body">

            </div>
            <div class="modal-footer">

            </div>
          </form>
        </div>
      </div>
    </div>

  <?php
}