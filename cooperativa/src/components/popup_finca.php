<?php
function popup_finca() {
  ?>
  <div class="btnFlotante">
    <button class="btn-add-popup" id="btn-add" data-toggle="modal" data-target="#popupNewFinca">
      <i class="fa fa-plus" aria-hidden="true"></i>
    </button>
  </div>

  <div class="modal fade" id="popupNewFinca" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Creación de una nueva finca</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="form-nueva-finca" name="nuevaFinca" action="#">
          <div class="modal-body">
            <div class="form-group">
              <label for="nombreFinca" class="col-form-label">Nombre de la finca:</label>
              <input type="text" class="form-control" id="nombreFinca" name="nombreFinca" required>
            </div>
            <div class="form-group">
              <div class="row mb-2">
                <div class="col">
                  <label for="municipioFinca">Municipio:</label><br>
                  <input type="text" class="form-control" name="municipioFinca" id="municipioFinca" required>
                </div>
                <div class="col">
                  <label for="provinciaFinca">Provincia:</label><br>
                  <input type="text" class="form-control" name="provinciaFinca" id="provinciaFinca" required>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row align-items-center">
                <div class="col">
                  <label for="poligonoFinca">Poligono:</label>
                  <input type="text" class="form-control" name="poligonoFinca" id="poligonoFinca" required>
                </div>
                <div class="col">
                  <label for="parcelaFinca">Parcela:</label>
                  <input type="text" class="form-control" name="parcelaFinca" id="parcelaFinca" required>
                </div>
                <div class="col-sm form-check">
                  <label for="regadioFinca">Regadío</label><br>
                  <input type="radio" class="form-radio-input" name="regadioFinca" id="regadioFincaSi" value="Sí"><label for="regadioFincaSi" class="form-radio-label">Sí</label><br>
                  <input type="radio" class="form-radio-input" name="regadioFinca" id="regadioFincaNo" value="No" checked><label for="regadioFincaNo" class="form-radio-label">No</label><br>
                </div>
              </div>
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