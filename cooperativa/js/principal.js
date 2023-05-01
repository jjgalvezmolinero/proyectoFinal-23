$(document).ready(function () {
  $.ajax({
    type: "POST",
    url: "../src/controller/temporada.php",
    data: {
      'accion': 'getTemporadas'
    },
    success: function (response) {
      let temporadas = JSON.parse(response);
      temporadas.forEach(temporada => {
        $("#temporadas").append(
          "<option value='"+temporada.id+"' data-denominacion='"+temporada.denominacion+"'>"+temporada.denominacion+"</option>"
        );
      });
      $.ajax({
        type: "POST",
        url: "../src/controller/entregas.php",
        data: {
          'accion': 'getEntregaTemporada',
          'id_temporada': $("#temporadas").val()
        },
        success: function (response) {
          let datos = JSON.parse(response);
          var labels = [];
          var values = [];
          var data = [];
          datos.forEach(dato => {
            labels.push(dato.nombre+"("+dato.municipio+")");
            values.push(parseInt(dato.peso));
          });
          data.labels = labels;
          data.values = values;
          grafico(labels, data, $("#temporadas option:selected").attr("data-denominacion"))
        }
      });


    }
  });
  $("#temporadas").change(function (e) {
    let id = $(this).val();
    $.ajax({
      type: "POST",
      url: "../src/controller/entregas.php",
      data: {
        'accion': 'getEntregaTemporada',
        'id_temporada': id
      },
      success: function (response) {
        console.log(response);
        var data = [];
        var labels = [];
        var values = [];
        if(response == ''){
          grafico(labels, data, $("#temporadas option:selected").attr("data-denominacion"))
          return;
        }
          
        let datos = JSON.parse(response);
        
        datos.forEach(dato => {
          labels.push(dato.nombre+"("+dato.municipio+")");
          values.push(parseInt(dato.peso));
        });
        data.labels = labels;
        data.values = values;
        grafico(labels, data, $("#temporadas option:selected").attr("data-denominacion"))
      }
    });
  });
});

function grafico (labels, data, titulo=0) {
  $(document).ready(function () {
    drawBarChart(
      $("#graficos"), labels, data,
      {
        id: 2,
        chartTitle: `Temporada <span id='titulo-temporada'>${titulo}</span>`
      }
    );
    
  });
}