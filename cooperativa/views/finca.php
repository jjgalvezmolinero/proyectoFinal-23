<?php
require_once '../classes/Menu.php';
require_once '../classes/Header.php';
require_once '../classes/Footer.php';
require_once '../src/components/tabla.php';
require_once '../classes/Finca.php';
$css = array('../css/finca.css');
$js = array('../js/finca.js');
$UserSession = new UserSession();
$Menu = new Menu();
$Header = new Header();
$Finca = new Finca();
$Footer = new Footer($js,$css);
$Header->headerBasico();
$Menu->menuBasico();
$fincas = $Finca->get_fincas_users(1);
tabla_generica($fincas,array('nombre','municipio','provincia','poligono','parcela','regadio'));
?>

<div class="btn-flotante">
  <button class="btn-add" id="btn-add" data-toggle="modal" data-target="#popup-new-finca">
    <i class="fa fa-plus" aria-hidden="true"></i>
  </button>
</div>

<!-- POPUP -->
<div class="modal fade" id="popup-new-finca" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Creación de una nueva finca</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form-nueva-finca">
          <div class="form-group">
            <label for="nombre-finca" class="col-form-label">Nombre de la finca:</label>
            <input type="text" class="form-control" id="nombre-finca" name="nombre-finca">
          </div>
          <div class="form-group">
            <div class="row mb-2">
              <div class="col">
                <label for="municipio-finca">Municipio:</label><br>
                <input type="text" class="form-control" name="municipio-finca" id="municipio-finca">
              </div>
              <div class="col">
                <label for="provincia-finca">Provincia:</label><br>
                <input type="text" class="form-control" name="provincia-finca" id="provincia-finca">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row align-items-center">
              <div class="col">
                <label for="poligono-finca">Poligono:</label>
                <input type="text" class="form-control" name="poligono-finca" id="poligono-finca">
              </div>
              <div class="col">
                <label for="parcela-finca">Parcela:</label>
                <input type="text" class="form-control" name="parcela-finca" id="parcela-finca">
              </div>
              <div class="col-sm form-check">
                <input type="checkbox" class="form-check-input" name="regadio-finca" id="regadio-finca">
                <label for="regadio-finca" class="form-check-label" >Regadío</label>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="text-primary bg-white border-primary rounded p-2" id="clear-form">
          <i class="fa-solid fa-eraser" aria-hidden="true"></i>
        </button>
        <button type="button" class="text-danger bg-white border-danger rounded p-2" data-dismiss="modal" id="cancel-form">
          <i class="fa fa-xmark"></i>
        </button>
        <button type="button" class="text-success bg-white border-success rounded p-2" data-dismiss="modal" id="submit-form">
          <i class="fa fa-check" aria-hidden="true"></i>
        </button>
      </div>
    </div>
  </div>
</div>
<?php
$Footer->footer();