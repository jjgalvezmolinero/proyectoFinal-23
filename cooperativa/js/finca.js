$(document).ready(function () {
  $('#btn-add').on('show.bs.modal', function (e) {
    var button = $(e.relatedTarget)
    var recipient = button.data('whatever')
    var modal = $(this)
    modal.find('.modal-title').text('New message to ' + recipient)
    modal.find('.modal-body input').val(recipient)
  })

  // Guardamos la finca
  $("#submitForm").click(function (e) { 
    $.ajax({
      type: "POST",
      url: "../src/controller/finca.php",
      data: $('#form-nueva-finca').serialize()
    }).fail(function (e) {
      alert('Error');
    }).done(function(e) {
      if(e > 0) {
        alert('Finca guardada correctamente');
        window.location.reload();
      } else {
        alert('Error al guardar la finca');
      }
    });
  });
  $('#clearForm').click(function (e) { 
    limpiar_formulario();
  });

  function limpiar_formulario() {
    $('#form-nueva-finca').trigger('reset');
  }
});