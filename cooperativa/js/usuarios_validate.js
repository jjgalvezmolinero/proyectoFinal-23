$(function () {
  $("form[name='nuevoUsuario']").validate({
    rules: {
      firstname: {
        required: true
      },
      lastname: {
        required: true
      },
      nif: {
        required: true
      },
      username: {
        required: true
      },
      email: {
        required: true
      },
      password: {
        required: true
      },
      rol: {
        required: true
      }
    },
    messages: {
      firstname: {
        required: "Tienes que poner el nombre del usuario"
      },
      lastname: {
        required: "Tienes que poner el apellido del usuario"
      },
      nif: {
        required: "Tienes que poner NIF/DNI del usuario"
      },
      username: {
        required: "Tienes que poner el nombre de usuario"
      },
      email: {
        required: "Tienes que poner el email del usuario"
      },
      password: {
        required: "Tienes que poner una contraseña para el usuario"
      },
      rol: {
        required: "Tienes que seleccionar un rol para el usuario"
      }
    }
  });
});