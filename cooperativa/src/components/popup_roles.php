<?php
function popup_roles($lista_permisos, $lista_roles) {
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
        <form id="form-nueva-finca" name="nuevaFinca" action="#">
          <div class="modal-body">
            <div class="form-group">
              <label for="nombreRol" class="col-form-label">Nombre del rol:</label>
              <input type="text" class="form-control" id="nombreRol" name="nombreRol" require_onced>
            </div>
            <div class="form-group">
              <?php
                foreach($lista_permisos as $permiso) {
                  $id = $permiso['id'];
                  $name = $permiso['name'];
                  $capability = $permiso['capability'];
                  ?>
                    <div class="row">
                      <input type="checkbox" class="form-check-input" name="<?php echo $capability; ?>" id="<?php echo $capability; ?>" value="<?php echo $id;?>" require_onced>
                      <label for="<?php echo $capability; ?>"><?php echo $name; ?></label><br>
                    </div>
                  <?php
                }
              ?>
            </div>
          </div>
        
          <div class="modal-footer">
            <button type="button" class="text-primary bg-white border-primary rounded p-2" id="clearForm">
              <i class="fa-solid fa-eraser" aria-hidden="true"></i>
            </button>
            <button type="button" class="text-danger bg-white border-danger rounded p-2" data-dismiss="modal" id="cancelForm">
              <i class="fa fa-xmark"></i>
            </button>
            <button type="submit" class="text-success bg-white border-success rounded p-2" id="submitForm">
              <i class="fa fa-check" aria-hidden="true"></i>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

<?php
}