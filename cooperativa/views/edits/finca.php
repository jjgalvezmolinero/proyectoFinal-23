<?php
require_once '../classes/Header.php';
require_once '../classes/Footer.php';
require_once '../classes/Finca.php';
require_once '../classes/UserSession.php';

$css = array('../css/edit_finca.css');
$js = array('../js/edit_finca.js');

$Header = new Header();
$Footer = new Footer($js,$css);
$Header->headerBasico();
$Finca = new Finca();
$id = $_GET['id'];
$finca = $Finca->get_finca($id);
$UserSession = new UserSession();
if(!$UserSession->isLogged()){
  header('Location: ../index.php');
}
?>
<div class="logo">
  <img src="../img/logo.svg" class='logo_edit'>
</div>
<form id="form-edit-finca" name="editFinca" action="#">
  <input type="hidden" name="id" value="<?php echo $id; ?>">
  <div class="modal-body">
    <div class="form-group">
      <label for="nombreFinca" class="col-form-label">Nombre de la finca:</label>
      <input type="text" class="form-control" id="nombreFinca" name="nombreFinca" value="<?php echo $finca['nombre'] ?>" required>
    </div>
    <div class="form-group">
      <div class="row mb-2">
        <div class="col">
          <label for="municipioFinca">Municipio:</label><br>
          <input type="text" class="form-control" name="municipioFinca" id="municipioFinca" value="<?php echo $finca['municipio'] ?>" required>
        </div>
        <div class="col">
          <label for="provinciaFinca">Provincia:</label><br>
          <input type="text" class="form-control" name="provinciaFinca" id="provinciaFinca" value="<?php echo $finca['provincia'] ?>" required>
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="row align-items-center">
        <div class="col">
          <label for="poligonoFinca">Poligono:</label>
          <input type="text" class="form-control" name="poligonoFinca" id="poligonoFinca" value="<?php echo $finca['poligono'] ?>" required>
        </div>
        <div class="col">
          <label for="parcelaFinca">Parcela:</label>
          <input type="text" class="form-control" name="parcelaFinca" id="parcelaFinca" value="<?php echo $finca['parcela'] ?>" required>
        </div>
        <div class="col-sm form-check">
          <label for="regadioFinca">Regadío</label><br>
          <?php
          if($finca['regadio'] == 'Sí') {
            ?>
            <input type="radio" class="form-radio-input" name="regadioFinca" id="regadioFincaSi" value="Sí" checked><label for="regadioFincaSi" class="form-radio-label">Sí</label><br>
            <input type="radio" class="form-radio-input" name="regadioFinca" id="regadioFincaNo" value="No"><label for="regadioFincaNo" class="form-radio-label">No</label><br>
            <?php
          } else {
            ?>
            <input type="radio" class="form-radio-input" name="regadioFinca" id="regadioFincaSi" value="Sí"><label for="regadioFincaSi" class="form-radio-label">Sí</label><br>
            <input type="radio" class="form-radio-input" name="regadioFinca" id="regadioFincaNo" value="No" checked><label for="regadioFincaNo" class="form-radio-label">No</label><br>
            <?php
          }
          ?>
          
        </div>
      </div>
    </div>
  </div>

  <div class="modal-footer">
    <button type="submit" class="text-success bg-white border-success rounded p-2" id="submitForm">
      <i class="fa fa-check" aria-hidden="true"></i>
    </button>
  </div>
</form>
<?php
$Footer->footer();