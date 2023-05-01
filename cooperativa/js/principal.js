$(document).ready(function () {
  $.ajax({
    type: "POST",
    url: "../src/controller/temporada.php",
    data: {
      'accion': 'getTemporadas'
    },
    success: function (response) {
      const values = [0.409, 0.15, 0.857, 0.0583, 0.183];
      const data  = {
        labels: 'Temporada 2019',
        values: values
      }
      
      let temporadas = JSON.parse(response);
      temporadas.forEach(temporada => {
        $("#temporadas").append(
          "<option value='"+temporada.id+"'>"+temporada.denominacion+"</option>"
        );
      });

      grafico(['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo'], data, '2019')

    }
  });
  $("#temporadas").change(function (e) {
    let id = $(this).val();
    $.ajax({
      type: "POST",
      url: "../src/controller/temporada.php",
      data: {
        'accion': 'getTemporada',
        'id': id
      },
      success: function (response) {
        let temporada = JSON.parse(response);
        $("#titulo-temporada").html(temporada.denominacion);
        let data = {
          labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo'],
          values: [0.409, 0.15, 0.857, 0.0583, 0.183]
        }
        grafico(['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo'], data, temporada.denominacion)
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