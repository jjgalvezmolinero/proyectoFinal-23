$(document).ready(function () {
  $("#abrirPopup").click(function (e) {
    $("#popupNewFinca").modal('show');
    $("#submitForm").attr('data-accion', 'crear');
    $("#submitForm").attr('data-finca', 0);
    $("respuesta").html("");
    $("#titulo").html('Creación de una nueva finca');
    $('#form-nueva-finca')[0].reset();
  });

  $('.delete').click(function (e) {
    let id = $(this).attr('data-delete');
    if(confirm('¿Está seguro de eliminar la finca?')) {
      tabla(id,'delete');
    }
  });

  $('.edit').click(function (e) {
    let id = $(this).attr('data-edit');
    let data = {
      'id': id,
      'accion': 'getFinca'
    }
    $.ajax({
      type: "POST",
      url: "../src/controller/finca.php",
      data: data,
      success: function (response) {
        $("#popupNewFinca").modal('show');
        $("#submitForm").attr('data-accion', 'editar');
        $("#submitForm").attr('data-finca', id);
        $("respuesta").html("");
        let finca = JSON.parse(response);
        $("#nombreFinca").val(finca.nombre);
        $("#municipioFinca").val(finca.municipio);
        $("#provinciaFinca").val(finca.provincia);
        $("#poligonoFinca").val(finca.poligono);
        $("#parcelaFinca").val(finca.parcela);
        $("input[name=regadioFinca][value=" + finca.regadio + "]").prop('checked', true);
        $("#titulo").html('Editar finca');
      }
    });
  });

  // Guardamos la finca
  $("#submitForm").click(function (e) { 
    
  });
  $('#clearForm').click(function (e) { 
    limpiar_formulario();
  });

  function limpiar_formulario() {
    $('#form-nueva-finca').trigger('reset');
  }
  function tabla(id, accion) {
    let data = {id: id, accion: accion};
    $.ajax({
      type: "POST",
      url: "../src/controller/finca.php",
      data: data,
      success: function (response) {
        if(response = 1) {
          alert('Finca eliminada correctamente');
          location.reload();
        }
      }
    });
  }
});

function update_finca(id) {
  $(document).ready(function () {
    var data = $('#form-nueva-finca').serializeArray();
    data.push({name: 'accion', value: 'insert'});
    data.push({name: 'id', value: id});
    $.ajax({
      type: "POST",
      url: "../src/controller/finca.php",
      data: data,
      success: function (response) {
        htmlString = '';
        if(response > 0) {
          htmlString = "<div class='alert alert-success alert-dismissible fade show' role='alert'><strong>Finca guardada correctamente</strong></div>";
        } else {
          htmlString = "<div class='alert alert-danger alert-dismissible fade show' role='alert'><strong>Error al editar la finca</strong></div>";
        }
        $("#respuesta").html(htmlString);
        setInterval(()=>{
          if(response > 0) {
            $("#formNewRol")[0].reset();
            $("#popupNewRol").modal('hide');
            location.reload();
          }
        }, 5000)
      }
    });
  });
}

function insert_finca() {
  $(document).ready(function () {
    var data = $('#form-nueva-finca').serializeArray();
    data.push({name: 'accion', value: 'insert'});
    $.ajax({
      type: "POST",
      url: "../src/controller/finca.php",
      data: data,
      success: function (response) {
        htmlString = '';
        if(response > 0) {
          htmlString = "<div class='alert alert-success alert-dismissible fade show' role='alert'><strong>Finca guardada correctamente</strong></div>";
        } else {
          htmlString = "<div class='alert alert-danger alert-dismissible fade show' role='alert'><strong>Error al crear la finca</strong></div>";
        }
        $("#respuesta").html(htmlString);
        setInterval(()=>{
          if(response > 0) {
            $("#form-nueva-finca")[0].reset();
            $("#popupNewFinca").modal('hide');
            location.reload();
          }
        }, 5000)
      }
    });
  });
}