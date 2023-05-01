$(document).ready(function () {
  get_selects();
  $("#abrirPopup").click(function (e) {
    $("#popupNewEntrega").modal('show');
    $("#submitForm").attr('data-accion', 'crear');
    $("#submitForm").attr('data-entrega', 0);
    $("respuesta").html("");
    $("#titulo").html('Creación de una nueva entrega');
    $('#form-nueva-entrega')[0].reset();
  });
  $("#submitForm").click(function (e) {
    e.preventDefault();
    let accion = $(this).attr('data-accion');
    if (accion == 'crear') {
      insert_entrega();
    } else if (accion == 'editar') {
      update_entrega($(this).attr('data-entrega'));
    }
  });
  $(".delete").click(function (e) {
    let id = $(this).attr('data-delete');
    if (confirm('¿Está seguro de eliminar la entrega?')) {
      $.ajax({
        type: "POST",
        url: "../src/controller/entregas.php",
        data: {
          'id': id,
          'accion': 'borrar'
        },
        success: function (response) {
          if (response >= 1) {
            alert('Entrega eliminada correctamente');
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
      'accion': 'getEntrega'
    }
    $.ajax({
      type: "POST",
      url: "../src/controller/entregas.php",
      data: data,
      success: function (response) {
        $("#popupNewEntrega").modal('show');
        let entrega = JSON.parse(response);
        $("#finca").val(entrega.finca);
        $("#temporada").val(entrega.temporada);
        $("#variedad").val(entrega.variedad);
        $("#peso").val(entrega.peso);
        $("#submitForm").attr('data-accion', 'editar');
        $("#submitForm").attr('data-entrega', id);
        $("#titulo").html('Editar entrega');
        $("respuesta").html("");
        
      }
    });
  });
});
function get_selects() {
  $(document).ready(function () {
    if($("#variedad").children().length > 1) return;
    if($("#temporada").children().length > 1) return;
    if($("#finca").children().length > 1) return;
    $.ajax({
      type: "POST",
      url: "../src/controller/entregas.php",
      data: {
        'accion': 'get_selects'
      },
      success: function (response) {
        let selects = JSON.parse(response);
        let aceitunas = selects.aceitunas;
        let temporadas = selects.temporadas;
        let fincas = selects.fincas;

        aceitunas.forEach(aceituna => {
          $("#variedad").append(`<option value="${aceituna.id}">${aceituna.denominacion}</option>`);
        });
        temporadas.forEach(temporada => {
          $("#temporada").append(`<option value="${temporada.id}">${temporada.denominacion}</option>`);
        });
        fincas.forEach(finca => {
          $("#finca").append(`<option value="${finca.id}">${finca.nombre}</option>`);
        });
      }
    });
  });
}
function insert_entrega() {
  $(document).ready(function () {
    let data = {
      'accion': 'insertar',
      'finca': $("#finca").val(),
      'temporada': $("#temporada").val(),
      'variedad': $("#variedad").val(),
      'peso': $("#peso").val(),
    }
    $.ajax({
      type: "POST",
      url: "../src/controller/entregas.php",
      data: data,
      success: function (response) {
        console.log(response);
        htmlString = '';
        if(response > 0) {
          htmlString = "<div class='alert alert-success alert-dismissible fade show' role='alert'><strong>Entrega guardada correctamente</strong></div>";
        } else {
          htmlString = "<div class='alert alert-danger alert-dismissible fade show' role='alert'><strong>Error al guardar la entrega</strong></div>";
        }
        $("#respuesta").html(htmlString);
        setInterval(()=>{
          if(response > 0) {
            $("#form-nueva-entrega")[0].reset();
            $("#popupNewEntrega").modal('hide');
            location.reload();
          }
        }, 5000)
      }
    });
    
  });
}
function update_entrega(id) {
  $(document).ready(function () {
    let data = {
      'accion': 'update',
      'id': id,
      'finca': $("#finca").val(),
      'temporada': $("#temporada").val(),
      'variedad': $("#variedad").val(),
      'peso': $("#peso").val(),
    }
    $.ajax({
      type: "POST",
      url: "../src/controller/entregas.php",
      data: data,
      success: function (response) {
        htmlString = '';
        if(response > 0) {
          htmlString = "<div class='alert alert-success alert-dismissible fade show' role='alert'><strong>Entrega editada correctamente</strong></div>";
        } else {
          htmlString = "<div class='alert alert-danger alert-dismissible fade show' role='alert'><strong>Error al editar la entrega</strong></div>";
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
  });
}