$(function () {
  $("form[name='nuevaFinca']").validate({
    rules: {
      nombreFinca: {
        required: true
      },
      municipioFinca: {
        required: true
      },
      provinciaFinca: {
        required: true
      },
      poligonoFinca: {
        required: true
      },
      parcelaFinca: {
        required: true
      }
    },
    messages: {
      nombreFinca: {
        required: "Tienes que poner el nombre de la finca"
      },
      municipioFinca: {
        required: "Tienes que poner el municipio donde se encuentra la finca"
      },
      provinciaFinca: {
        required: "Tienes que poner la provincia donde se encuentra la finca"
      },
      poligonoFinca: {
        required: "Tienes que poner el polígono donde se encuentra la finca"
      },
      parcelaFinca: {
        required: "Tienes que poner la parcela donde se encuentra la finca"
      },
      parcelaFinca: {
        required: "Tienes que poner la parcela donde se encuentra la finca"
      }
    }
  });
});