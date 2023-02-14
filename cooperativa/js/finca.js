$(document).ready(function () {
  $('#btn-add').on('show.bs.modal', function (e) {
    var button = $(e.relatedTarget)
    var recipient = button.data('whatever')
    var modal = $(this)
    modal.find('.modal-title').text('New message to ' + recipient)
    modal.find('.modal-body input').val(recipient)
  })

  // Guardamos la finca
  $("#submit-form").click(function (e) { 
    console.log($('#form-nueva-finca').serialize());
    $.ajax({
      type: "POST",
      url: "../src/controller/finca.php",
      data: $('#form-nueva-finca').serialize(),
      success: function (response) {
        console.log(response);
      }
    });
  });
  $('#clear-form').click(function (e) { 
    limpiar_formulario();
  });

  function limpiar_formulario() {
    $('#form-nueva-finca input[type="text"]').each(function() { this.value = '' });
    $('#form-nueva-finca input[type="checkbox"]').each(function() { this.checked = false });
  }
});