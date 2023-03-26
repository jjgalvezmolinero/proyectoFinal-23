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
    console.log(formRoles);
    $.ajax({
      type: "POST",
      url: "../src/controller/roles.php",
      data: {
        'nombre': $('#nombreRol').val(),
        'idnumber': $('#idnumberRol').val(),
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
  });
  $('.edit').click(function (e) {
    let id = $(this).attr('data');
    window.open('../views/edits/rol.php?id='+id,'Editar rol','width=600,height=500');
  });
});