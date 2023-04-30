<?php
function popup_temporada() {
  ?>
  <div class="modal fade" id="popupNewTemporada" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="titulo">Creación de una nueva temporada</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="form-nueva-temporada" name="nuevaTemporada" action="#">
          <div class="modal-body">
            <div class="form-group">
              <label for="denominacion" class="col-form-label">Nombre de la temporada:</label>
              <input type="text" class="form-control" id="denominacion" name="denominacion" required>
            </div>
            <div class="form-group">
              <div class="row mb-2">
                <div class="col">
                  <label for="fecha_inicio">Fecha de inicio:</label><br>
                  <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio" required>
                </div>
                <div class="col">
                  <label for="fecha_fin">Fecha de fin:</label><br>
                  <input type="date" class="form-control" name="fecha_fin" id="fecha_fin" required>
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