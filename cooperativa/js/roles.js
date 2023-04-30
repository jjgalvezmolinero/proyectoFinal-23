$(document).ready(function () {
  $('#marcarTodos').click(function () {
    $('#formNewRol input:checkbox').prop('checked', this.checked);
  });
  $('#clearFormRol').click(function () {
    $('#formNewRol')[0].reset();
  });
  $('#cancelFormRol').click(function (e) {
    $('#formNewRol')[0].reset();
  });
  $('#submitFormRol').click(function (e) { 
    e.preventDefault();
    let accion = $(this).attr('data-accion');
    if(accion == 'crear') {
      insert_rol();
    } else if(accion == 'editar') {
      update_rol($(this).attr('data-rol'));
    }
  });
  $('.edit').click(function (e) {
    $('#formNewRol')[0].reset();
    let id = $(this).attr('data-edit');
    let data = {
      'id': id,
      'accion': 'getRol'
    }
    $("#popupNewRol").modal('show');
    $.ajax({
      type: "POST",
      url: "../src/controller/roles.php",
      data: data,
      success: function (response) {
        let rol = JSON.parse(response);
        $("#nombreRol").val(rol.nombre);
        $("#idnumberRol").val(rol.idnumber);
        $("#titulo").html('Editar rol');
        $("#submitFormRol").attr('data-accion', 'editar');
        $("#submitFormRol").attr('data-rol', id);
        $("respuesta").html("");
        rol.checkbox.forEach(element => {
          $("#formNewRol input:checkbox").each(function () {
            if($(this).val() == element) {
              $(this).prop('checked', true);
            }
          });
        });
      }
    });
  });
  $('.delete').click(function (e) {
    if(confirm('¿Está seguro de eliminar este rol?')) {
      let id = $(this).attr('data-delete');
      let data = {
        'id': id,
        'accion': 'borrar'
      }
      $.ajax({
        type: "POST",
        url: "../src/controller/roles.php",
        data: data,
        success: function (response) {
          if(response == 1) {
            alert('Rol eliminado correctamente');
            location.reload();
          } else {
            alert('Error al eliminar el rol');
          }
        }
      });
    }
  });
  $('#abrirPopup').click(function (e) {
    $("#popupNewRol").modal('show');
    $("#submitFormRol").attr('data-accion', 'crear');
    $("#submitFormRol").attr('data-rol', 0);
    $("respuesta").html("");
    $('#formNewRol')[0].reset();
  });
  $("#popupNewRol").modal('hide');
});

function update_rol(id) {
  $(document).ready(function () {
    let formRoles = $("input:checkbox").serializeArray();
    const nombreRol = $('#nombreRol').val();
    const idnumberRol = $('#idnumberRol').val();
    let correcto = false;
    if(nombreRol != '' && idnumberRol != '') {
      correcto = true;
    } else {
      alert('Debe rellenar nombre y el nombre único del rol');
    }
    if(correcto) {
      $.ajax({
        type: "POST",
        url: "../src/controller/roles.php",
        data: {
          'nombre': nombreRol,
          'idnumber': idnumberRol,
          'accion': 'actualizar',
          'id': id,
          'datos': formRoles
        },
        success: function (response) {
          htmlString = '';
          if(response >= 1) {
            htmlString = "<div class='alert alert-success alert-dismissible fade show' role='alert'><strong>Rol editado correctamente</strong></div>";
          } else {
            htmlString = "<div class='alert alert-danger alert-dismissible fade show' role='alert'><strong>Error al editar el rol</strong></div>";
          }
          $("#respuesta").html(htmlString);
          setInterval(()=>{
            if(response >= 1) {
              $("#formNewRol")[0].reset();
              $("#popupNewRol").modal('hide');
              location.reload();
            }
          }, 5000)
        }
      });
    }
  });
}

function insert_rol() {
  $(document).ready(function () {
    let formRoles = $("input:checkbox").serializeArray();
    const nombreRol = $('#nombreRol').val();
    const idnumberRol = $('#idnumberRol').val();
    let correcto = false;
    if(nombreRol != '' && idnumberRol != '') {
      correcto = true;
    } else {
      alert('Debe rellenar nombre y el nombre único del rol');
    }
    if(correcto) {
      $.ajax({
        type: "POST",
        url: "../src/controller/roles.php",
        data: {
          'nombre': nombreRol,
          'idnumber': idnumberRol,
          'accion': 'insertar',
          'datos': formRoles
        },
        success: function (response) {
          htmlString = '';
          if(response >= 1) {
            htmlString = "<div class='alert alert-success alert-dismissible fade show' role='alert'><strong>Rol creado correctamente</strong></div>";
          } else {
            htmlString = "<div class='alert alert-danger alert-dismissible fade show' role='alert'><strong>Error al crear el rol</strong></div>";
          }
          $("#respuesta").html(htmlString);
          setInterval(()=>{
            if(response >= 1) {
              $("#formNewRol")[0].reset();
              $("#popupNewRol").modal('hide');
              location.reload();
            }
          }, 5000)
        }
      });
    }
  });
}