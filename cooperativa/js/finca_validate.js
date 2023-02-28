$(function () {
  $("form[name='nuevaFinca']").validate({
    rules: {
      nombreFinca: {
        require_onced: true
      },
      municipioFinca: {
        require_onced: true
      },
      provinciaFinca: {
        require_onced: true
      },
      poligonoFinca: {
        require_onced: true
      },
      parcelaFinca: {
        require_onced: true
      }
    },
    messages: {
      nombreFinca: {
        require_onced: "Tienes que poner el nombre de la finca"
      },
      municipioFinca: {
        require_onced: "Tienes que poner el municipio donde se encuentra la finca"
      },
      provinciaFinca: {
        require_onced: "Tienes que poner la provincia donde se encuentra la finca"
      },
      poligonoFinca: {
        require_onced: "Tienes que poner el polígono donde se encuentra la finca"
      },
      parcelaFinca: {
        require_onced: "Tienes que poner la parcela donde se encuentra la finca"
      },
      parcelaFinca: {
        require_onced: "Tienes que poner la parcela donde se encuentra la finca"
      }
    }
  });
});