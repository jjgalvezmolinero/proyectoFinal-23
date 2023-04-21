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
          if(response == 1) {
            alert('Rol creado correctamente');
            location.reload();
          } else {
            alert('Error al crear el rol');
          }
        }
      });
    }
  });
  $('.edit').click(function (e) {
    let id = $(this).attr('data');
    window.open('../views/edits/rol.php?id='+id,'Editar rol','width=600,height=500');
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
          console.log(response);
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
});