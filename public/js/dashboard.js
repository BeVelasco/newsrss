
$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });

$(document).ready(function () {
  'use strict'

  creaGrafico();

  $('.select2-show-search').select2({
    minimumResultsForSearch: ''
  });

});

function creaGrafico(){
  'use strict'

  $.ajax({
    url: 'indicadoresGeneral',
    type: 'POST',
    data: {},
    dataType: 'JSON',
    success: function (data) {
      var medios = [];
      var cantidad = [];

      for (var i = 0; i <= data.length - 1; i++) {
        medios.push(data[i].titulo);
        cantidad.push(data[i].noticias);
      }

      var area1 = new Chartist.Line('#chartArea1', {
        labels: medios,
        series: [ cantidad ]
      }, {
        height: '30vw',
        fullWidth: true,
        chartPadding: 30,
        plugins: [
          Chartist.plugins.ctPointLabels({
          textAnchor: 'middle'
          })
        ]
      });

        },
    error: function (error) {
      swal('error','Error al general el grafico');
    }
  });
  
}

function Palabra(palabra){
  'use strict'

  $.ajax({
    url: 'indicadoresPorPalabra',
    type: 'POST',
    data: {'palabra': palabra},
    dataType: 'JSON',
    success: function (data) {
      var medios = [];
      var cantidad = [];

      for (var i = 0; i <= data.length - 1; i++) {
        medios.push(data[i].titulo);
        cantidad.push(data[i].noticias);
      }

      var area1 = new Chartist.Line('#chartArea1', {
        labels: medios,
        series: [ cantidad ]
      }, {
        height: '30vw',
        fullWidth: true,
        chartPadding: 30,
        plugins: [
          Chartist.plugins.ctPointLabels({
          textAnchor: 'middle'
          })
        ]
      });

        },
    error: function (error) {
      /*swal('error','Error al general el grafico');*/
    }
  });
  
}

function busca(){
    var palabra = $("#palabra").val();
    Palabra(palabra);
  }