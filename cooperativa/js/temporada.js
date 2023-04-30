$(document).ready(function () {
  $("#submitForm").click(function (e) {
    e.preventDefault();
    let accion = $(this).attr('data-accion');
    if(accion == 'crear') {
      insert_temporada();
    } else if(accion == 'editar') {
      update_temporada($(this).attr('data-temporada'));
    }
  });
  $("#abrirPopup").click(function (e) {
    $("#popupNewTemporada").modal('show');
    $("#form-nueva-temporada")[0].reset();
    $("#titulo").html('Creación de una nueva temporada');
    $("#submitForm").attr('data-accion', 'crear');
    $("#submitForm").removeAttr('data-temporada');
    $("respuesta").html("");
  });
  $('.edit').click(function (e) {
    $('#form-nueva-temporada')[0].reset();
    let id = $(this).attr('data-edit');
    let data = {
      'id': id,
      'accion': 'getTemporada'
    }
    
    $.ajax({
      type: "POST",
      url: "../src/controller/temporada.php",
      data: data,
      success: function (response) {
        $("#popupNewTemporada").modal('show');
        let temporada = JSON.parse(response);
        $("#denominacion").val(temporada.denominacion);
        $("input[name=fecha_inicio][type=date]").val(temporada.fecha_inicio);
        $("input[name=fecha_fin][type=date]").val(temporada.fecha_fin);
        $("#titulo").html('Editar temporada');
        $("#submitForm").attr('data-accion', 'editar');
        $("#submitForm").attr('data-temporada', id);
        $("respuesta").html("");
      }
    });

  });
  $('.delete').click(function (e) {
    if(confirm('¿Está seguro de eliminar esta temporada?')) {
      let id = $(this).attr('data-delete');
      let data = {
        'id': id,
        'accion': 'borrar'
      }
      $.ajax({
        type: "POST",
        url: "../src/controller/temporada.php",
        data: data,
        success: function (response) {
          setInterval(()=>{
            if(response >= 1) {
              location.reload();
            }
          }, 5000)
        }
      });
    }
  });
});

function insert_temporada() {
  $(document).ready(function () {
    var datos = $("#form-nueva-temporada").serializeArray();
    datos.push({name: 'accion', value: 'insertar'});
    $.ajax({
      type: "POST",
      url: "../src/controller/temporada.php",
      data: datos,
      success: function (response) {
        htmlString = '';
          if(response >= 1) {
            htmlString = "<div class='alert alert-success alert-dismissible fade show' role='alert'><strong>Temporada creada correctamente</strong></div>";
          } else {
            htmlString = "<div class='alert alert-danger alert-dismissible fade show' role='alert'><strong>Error al crear la temporada</strong></div>";
          }
          $("#respuesta").html(htmlString);
          setInterval(()=>{
            if(response >= 1) {
              $("#form-nueva-temporada")[0].reset();
              $("#popupNewTemporada").modal('hide');
              location.reload();
            }
          }, 5000)
      }
    });
  });
}
function update_temporada(id) {
  $(document).ready(function () {
    var datos = $("#form-nueva-temporada").serializeArray();
    datos.push({name: 'accion', value: 'editar'});
    datos.push({name: 'id', value: id});
    $.ajax({
      type: "POST",
      url: "../src/controller/temporada.php",
      data: datos,
      success: function (response) {
        htmlString = '';
          if(response >= 1) {
            htmlString = "<div class='alert alert-success alert-dismissible fade show' role='alert'><strong>Temporada editada correctamente</strong></div>";
          } else {
            htmlString = "<div class='alert alert-danger alert-dismissible fade show' role='alert'><strong>Error al editar la temporada</strong></div>";
          }
          $("#respuesta").html(htmlString);
          setInterval(()=>{
            if(response >= 1) {
              $("#form-nueva-temporada")[0].reset();
              $("#popupNewTemporada").modal('hide');
              location.reload();
            }
          }, 5000)
      }
    });
  });
}