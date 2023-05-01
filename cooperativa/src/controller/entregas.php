<?php
require_once '../../classes/Entrega.php';
require_once '../../classes/Finca.php';
require_once '../../classes/Aceituna.php';
require_once '../../classes/Temporada.php';

$Entrega = new Entrega();
$Finca = new Finca();
$Aceituna = new Aceituna();
$Temporada = new Temporada();

if($_POST['accion'] == 'get_selects') {
  $fincas = $Finca->get_fincas_selects();
  $aceitunas = $Aceituna->get_aceitunas();
  $temporadas = $Temporada->get_temporadas_selects();
  
  $selects = [
    'fincas' => $fincas,
    'aceitunas' => $aceitunas,
    'temporadas' => $temporadas
  ];
  echo json_encode($selects, JSON_UNESCAPED_UNICODE);
} else if($_POST['accion'] == 'insertar') {
  $finca = $_POST['finca'];
  $aceituna = $_POST['variedad'];
  $temporada = $_POST['temporada'];
  $fecha = time();
  $peso = $_POST['peso'];

  echo $Entrega->insert_entrega($finca, $aceituna, $temporada, $fecha, $peso);
} else if($_POST['accion'] == 'getEntrega') {
  $id = $_POST['id'];
  $datos = $Entrega->get_entrega($id)[0];
  $entrega = [
    'finca' => $datos['finca'],
    'variedad' => $datos['variedad'],
    'temporada' => $datos['temporada'],
    'peso' => $datos['peso']
  ];
  echo json_encode($entrega, JSON_UNESCAPED_UNICODE);
} else if($_POST['accion'] == 'update') {
  $id = $_POST['id'];
  $finca = $_POST['finca'];
  $aceituna = $_POST['variedad'];
  $temporada = $_POST['temporada'];
  $peso = $_POST['peso'];
  echo $Entrega->update_entrega($id, $finca, $aceituna, $temporada, $peso);
} else if($_POST['accion'] == 'borrar') {
  $id = $_POST['id'];
  echo $Entrega->delete_entrega($id);
} else if($_POST['accion'] == 'getEntregaTemporada') {
  $id_temporada = $_POST['id_temporada'];
  $entregas = $Entrega->get_entregas_temporada($id_temporada);
  echo json_encode($entregas, JSON_UNESCAPED_UNICODE);
}