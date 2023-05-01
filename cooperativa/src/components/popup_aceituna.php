<?php
function popup_aceituna() {
  ?>
  <div class="modal fade" id="popupNewAceituna" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="titulo">Creación de una nueva variedad de aceituna</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="form-nueva-aceituna" name="nuevaVariedad" action="#">
          <div class="modal-body">
            <div class="form-group">
              <div class="row align-items-center">
                <div class="col">
                  <label for="denominacion" class="col-form-label">Denominación:</label>
                  <input type="text" class="form-control" id="denominacion" name="denominacion" required>
                </div>
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