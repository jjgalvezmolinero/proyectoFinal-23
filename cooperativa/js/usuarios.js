$(document).ready(function () {
  $("#submitForm").click(function (e) { 
    e.preventDefault();
    var formUsuarios = $("#form-nuevo-usuario").serializeArray();
    formUsuarios.push({name: 'accion', value: 'insertar'});
    if($("#password").val() != $("#password-confirm").val()) {
      alert('Las contraseñas no coinciden');
      return;
    }
    if($("#submitForm").attr('data-accion') == 'editar') {
      update_user();
      return;
    } else if($("#submitForm").attr('data-accion') == 'crear') {
      insert_user();
      return;
    }
  });
  $(".delete").click(function (e) {
    let id = $(this).attr('data-delete');
    let data = {
      'id': id,
      'accion': 'eliminar'
    }
    $.ajax({
      type: "POST",
      url: "../src/controller/usuarios.php",
      data: data,
      success: function (response) {
        if(response == 1) {
          alert('Usuario eliminado correctamente');
          location.reload();
        } else {
          alert('Error al eliminar el usuario');
        }
      }
    });
  });
  $(".edit").click(function (e) {
    let id = $(this).attr('data-edit');

    let data = {
      'id': id,
      'accion': 'getUser'
    }
    $("#popupNewUser").modal('show');
    $.ajax({
      type: "POST",
      url: "../src/controller/usuarios.php",
      data: data,
      success: function (response) {
        let usuario = JSON.parse(response);
        $("#firstname").val(usuario.firstname);
        $("#lastname").val(usuario.lastname);
        $("#nif").val(usuario.nif);
        $("#username").val(usuario.username);
        $("#email").val(usuario.email);
        $("#rol").val(usuario.rol);
        $("#titulo").html('Editar usuario');
        $("#submitForm").attr('data-accion', 'editar');
        $("#submitForm").attr('data-usuario', usuario.id);
        $("respuesta").html("");
      }
    });
  });
  $("#abrirPopup").click(function (e) {
    $("#popupNewUser").modal('show');
    $("#submitForm").attr('data-accion', 'crear');
    $("#submitForm").attr('data-usuario', 0);
    $("respuesta").html("");
  });
});
function update_user() {
  $(document).ready(function () {
    var formUsuarios = $("#form-nuevo-usuario").serializeArray();
    formUsuarios.push({name: 'accion', value: 'editar'});
    formUsuarios.push({name: 'id', value: $("#submitForm").attr('data-usuario')});
    if(
      $("#password").val() != $("#password-confirm").val() &&
      $("#password").val() != "" && $("#password-confirm").val() != ""
    ) {
      alert('Las contraseñas no coinciden');
      return;
    }
    $.ajax({
      type: "POST",
      url: "../src/controller/usuarios.php",
      data: formUsuarios,
      success: function (response) {
        console.log(response);
        htmlString = '';
        if(response >= 1) {
          htmlString = "<div class='alert alert-success alert-dismissible fade show' role='alert'><strong>Usuario editado correctamente</strong></div>";
        } else {
          htmlString = "<div class='alert alert-danger alert-dismissible fade show' role='alert'><strong>Error al editar el usuario</strong></div>";
        }
        $("#respuesta").html(htmlString);
        setInterval(()=>{
          if(response >= 1) {
            $("#form-nuevo-usuario")[0].reset();
            $("#popupNewUser").modal('hide');
            location.reload();
          }
        }, 5000)
      }
    });
  });
}

function insert_user() {
  $(document).ready(function () {
    var formUsuarios = $("#form-nuevo-usuario").serializeArray();
    formUsuarios.push({name: 'accion', value: 'insertar'});
    if(
      $("#password").val() != $("#password-confirm").val() &&
      $("#password").val() != "" && $("#password-confirm").val() != ""
    ) {
      alert('Las contraseñas no coinciden');
      return;
    }
    $.ajax({
      type: "POST",
      url: "../src/controller/usuarios.php",
      data: formUsuarios,
      success: function (response) {
        console.log(response);
        htmlString = '';
        if(response >= 1) {
          htmlString = "<div class='alert alert-success alert-dismissible fade show' role='alert'><strong>Usuario creado correctamente</strong></div>";
        } else {
          htmlString = "<div class='alert alert-danger alert-dismissible fade show' role='alert'><strong>Error al crear el usuario</strong></div>";
        }
        $("#respuesta").html(htmlString);
        setInterval(()=>{
          if(response >= 1) {
            $("#form-nuevo-usuario")[0].reset();
            $("#popupNewUser").modal('hide');
            location.reload();
          }
        }, 5000)
      }
    });
  });
}