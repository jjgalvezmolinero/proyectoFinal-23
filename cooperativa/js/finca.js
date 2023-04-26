$(document).ready(function () {
  $('#btn-add').on('show.bs.modal', function (e) {
    var button = $(e.relatedTarget)
    var recipient = button.data('whatever')
    var modal = $(this)
    modal.find('.modal-title').text('New message to ' + recipient)
    modal.find('.modal-body input').val(recipient)
  })

  $('.delete').click(function (e) {
    let id = $(this).attr('data-delete');
    if(confirm('¿Está seguro de eliminar la finca?')) {
      tabla(id,'delete');
    }
  });

  $('.edit').click(function (e) {
    let id = $(this).attr('data-edit');
    window.open('../views/edits/finca.php?id='+id,'Editar finca','width=600,height=500');
  });

  // Guardamos la finca
  $("#submitForm").click(function (e) { 
    var data = $('#form-nueva-finca').serializeArray();
    data.push({name: 'accion', value: 'insert'});
    $.ajax({
      type: "POST",
      url: "../src/controller/finca.php",
      data: $.param(data)
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

  function eliminar(id) {
    console.log(id);
  }

  function editar(id) {
    console.log(id);
  }
  function tabla(id, accion) {
    let data = {id: id, accion: accion};
    console.log(data);
    $.ajax({
      type: "POST",
      url: "../src/controller/finca.php",
      data: data,
      success: function (response) {
        if(response = 1) {
          alert('Finca eliminada correctamente');
          window.location.reload();
        }
      }
    });
  }
});