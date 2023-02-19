$(document).ready(function () {
  $('#submitForm').click(function (e) {
    var data = $('#form-edit-finca').serializeArray();
    data.push({name: 'accion', value: 'edit'});
    $.ajax({
      type: "POST",
      url: "../src/controller/finca.php",
      data: data,
      success: function (response) {
        window.close();
      }
    });
  });
});