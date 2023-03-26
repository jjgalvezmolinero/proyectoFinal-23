$(function () {
  $("form[name='nuevaFinca']").validate({
    rules: {
      nombreRol: {
        required: true
      }
    },
    messages: {
      nombreRol: {
        required: "El rol debe de tener un nombre"
      }
    }
  });
});