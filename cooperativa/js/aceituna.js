$(document).ready(function () {
  $("#abrirPopup").click(function (e) {
    $("#popupNewAceituna").modal('show');
    $("#submitForm").attr('data-accion', 'crear');
    $("#submitForm").attr('data-finca', 0);
    $("respuesta").html("");
    $("#titulo").html('Creación de una nueva variedad de aceituna');
    $('#form-nueva-aceituna')[0].reset();
  });
  $(".delete").click(function (e) {
    let id = $(this).attr('data-delete');
    if(confirm('¿Está seguro de eliminar la variedad?')) {
      $.ajax({
        type: "POST",
        url: "../src/controller/aceituna.php",
        data: {
          'id': id,
          'accion': 'borrar'
        },
        success: function (response) {
          if(response >= 1) {
            alert('Variedad eliminada correctamente');
            location.reload();
          }
        }
      });
    }
  });
  $(".edit").click(function (e) {
    let id = $(this).attr('data-edit');
    let data = {
      'id': id,
      'accion': 'getAceituna'
    }
    $.ajax({
      type: "POST",
      url: "../src/controller/aceituna.php",
      data: data,
      success: function (response) {
        $("#popupNewAceituna").modal('show');
        let aceituna = JSON.parse(response);
        $("#denominacion").val(aceituna.denominacion);
        $("#submitForm").attr('data-accion', 'editar');
        $("#submitForm").attr('data-aceituna', id);
        $("#titulo").html('Editar variedad');
        $("respuesta").html("");
      }
    });
  });
  $("#submitForm").click(function (e) {
    e.preventDefault();
    let accion = $(this).attr('data-accion');
    if(accion == 'crear') {
      insert_aceituna();
    } else if(accion == 'editar') {
      update_aceituna($(this).attr('data-aceituna'));
    }
  });
});
function insert_aceituna() {
  let denominacion = $("#denominacion").val();
  let data = {
    'denominacion': denominacion,
    'accion': 'insertar'
  }
  $.ajax({
    type: "POST",
    url: "../src/controller/aceituna.php",
    data: data,
    success: function (response) {
      htmlString = '';
        if(response > 0) {
          htmlString = "<div class='alert alert-success alert-dismissible fade show' role='alert'><strong>Variedad guardada correctamente</strong></div>";
        } else {
          htmlString = "<div class='alert alert-danger alert-dismissible fade show' role='alert'><strong>Error al guardar la variedad</strong></div>";
        }
        $("#respuesta").html(htmlString);
        setInterval(()=>{
          if(response > 0) {
            $("#form-nueva-aceituna")[0].reset();
            $("#popupNewAceituna").modal('hide');
            location.reload();
          }
        }, 5000)
    }
  });
}
function update_aceituna(id) {
  let denominacion = $("#denominacion").val();
  let data = {
    'id': id,
    'denominacion': denominacion,
    'accion': 'editar'
  }
  $.ajax({
    type: "POST",
    url: "../src/controller/aceituna.php",
    data: data,
    success: function (response) {
      htmlString = '';
        if(response > 0) {
          htmlString = "<div class='alert alert-success alert-dismissible fade show' role='alert'><strong>Variedad editada correctamente</strong></div>";
        } else {
          htmlString = "<div class='alert alert-danger alert-dismissible fade show' role='alert'><strong>Error al editar la variedad</strong></div>";
        }
        $("#respuesta").html(htmlString);
        setInterval(()=>{
          if(response > 0) {
            $("#form-nueva-aceituna")[0].reset();
            $("#popupNewAceituna").modal('hide');
            location.reload();
          }
        }, 5000)
    }
  });
}