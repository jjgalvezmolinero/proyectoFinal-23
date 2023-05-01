<?php
function popup_entregas () {
  ?>
  <div class="modal fade" id="popupNewEntrega" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="titulo">Creación de una nueva entrega</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="form-nueva-entrega" name="nuevaEntrega" action="#">
          <div class="modal-body">
            <div class="form-group">
              <div class="row mb-2">
                <div class="col">
                  <label for="finca" class="col-form-label">Finca:</label>
                  <select class="form-control" name="finca" id="finca" required>
                    <option value="" selected disabled>Seleccione una finca</option>
                  </select>
                </div>
                <div class="col">
                  <label for="peso" class="col-form-label">Peso:</label>
                  <input type="text" class="form-control" id="peso" name="peso" required>
                </div>
              </div>
            </div>
            <div class="form-group">
            <div class="row mb-2">
                <div class="col">
                  <label for="variedad">Variedad:</label>
                  <select class="form-control" name="variedad" id="variedad">
                    <option value="" selected>Seleccione una variedad</option>
                  </select>
                </div>
                <div class="col">
                  <label for="temporada">Temporada:</label>
                  <select class="form-control" name="temporada" id="temporada">
                    <option value="" selected>Seleccione una temporada</option>
                  </select>
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
            <button class="text-success bg-white border-success rounded p-2" id="submitForm">
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