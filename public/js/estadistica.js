
$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });

$(document).ready(function () {
  'use strict'

  show();
//   creaGraficoMedios();
  creaGraficoLocales();
  creaGraficoLocalesSemana();
  creaGraficoNacionales();
  creaGraficoNacionalesSemanales();
  creaGraficoFacebook();
  creaGraficoFacebookSemanales();
  creaGraficoTweeter();
  creaGraficoTweeterSemanales();

//   creaGraficoGeneral();
//   creaGraficoFechas();

  // Datepicker
  $('.fc-datepicker').datepicker({
    dateFormat: "dd/mm/yy",
    autoclose: true
  });
});

function creaGraficoMedios(){
    'use strict'
    // var fi = $("#fi").val();
    // var ff = $("#ff").val();

    // var part1 =fi.split('/');
    // var part2 =ff.split('/');

    // var md1 = new Date(part1[2], part1[1] - 1 , part1[0]);
    // var md2 = new Date(part2[2], part2[1] - 1 , part2[0]);

    // if(md1 <= md2){

      $.ajax({
        url: 'indicadoresMedios',
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

            var area1 = new Chartist.Line('#chartAreaMedios', {
                labels: medios,
                series: [ cantidad ]
            }, {
                height: '20vw',
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
    // } else {
    //   swal('error','Error al general el grafico');
    // }
}

function creaGraficoLocales(){
    'use strict'
    // var fi = $("#fi").val();
    // var ff = $("#ff").val();

    // var part1 =fi.split('/');
    // var part2 =ff.split('/');

    // var md1 = new Date(part1[2], part1[1] - 1 , part1[0]);
    // var md2 = new Date(part2[2], part2[1] - 1 , part2[0]);

    // if(md1 <= md2){

      $.ajax({
        url: 'indicadoresLocales',
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

          var area1 = new Chartist.Bar('#chartAreaLocales', {
            labels: medios,
            series: [ cantidad ]
          }, {
            stackBars: true,
            axisY: {
              labelInterpolationFnc: function(value) {
                return (value / 1000) + 'k';
              }
            }
          }).on('draw', function(data) {
            if(data.type === 'bar') {
              data.element.attr({
                style: 'stroke-width: 20px'
              });
            }
          });

        },
        error: function (error) {
          swal('error','Error al general el grafico');
        }
      });
    // } else {
    //   swal('error','Error al general el grafico');
    // }
}

function creaGraficoLocalesSemana(){
    'use strict'
    // var fi = $("#fi").val();
    // var ff = $("#ff").val();

    // var part1 =fi.split('/');
    // var part2 =ff.split('/');

    // var md1 = new Date(part1[2], part1[1] - 1 , part1[0]);
    // var md2 = new Date(part2[2], part2[1] - 1 , part2[0]);

    // if(md1 <= md2){

      $.ajax({
        url: 'indicadoresLocalesSemana',
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

          var area1 = new Chartist.Line('#chartAreaLocalesSemanal', {
            labels: medios,
            series: [ cantidad ]
          }, {
            height: '200px',
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
    // } else {
    //   swal('error','Error al general el grafico');
    // }
}

function creaGraficoNacionales(){
  'use strict'
  var fi = $("#fi").val();
  var ff = $("#ff").val();

//   var part1 =fi.split('/');
//   var part2 =ff.split('/');

//   var md1 = new Date(part1[2], part1[1] - 1 , part1[0]);
//   var md2 = new Date(part2[2], part2[1] - 1 , part2[0]);

//   if(md1 <= md2){

    $.ajax({
      url: 'indicadoresNacionales',
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

        var area1 = new Chartist.Line('#chartAreaNacionales', {
          labels: medios,
          series: [ cantidad ]
        }, {
          height: '200px',
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
//   } else {
//     swal('error','Error al general el grafico');
//   }
}

function creaGraficoNacionalesSemanales(){
    'use strict'
    var fi = $("#fi").val();
    var ff = $("#ff").val();

  //   var part1 =fi.split('/');
  //   var part2 =ff.split('/');

  //   var md1 = new Date(part1[2], part1[1] - 1 , part1[0]);
  //   var md2 = new Date(part2[2], part2[1] - 1 , part2[0]);

  //   if(md1 <= md2){

      $.ajax({
        url: 'indicadoresNacionalesSemanales',
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

          var area1 = new Chartist.Bar('#chartAreaNacionalesSemanal', {
            labels: medios,
            series: [ cantidad ]
          }, {
            stackBars: true,
            axisY: {
              labelInterpolationFnc: function(value) {
                return (value / 1000) + 'k';
              }
            }
          }).on('draw', function(data) {
            if(data.type === 'bar') {
              data.element.attr({
                style: 'stroke-width: 20px'
              });
            }
          });

        },
        error: function (error) {
          swal('error','Error al general el grafico');
        }
      });
  //   } else {
  //     swal('error','Error al general el grafico');
  //   }
  }

  function creaGraficoFacebook(){
    'use strict'
    var fi = $("#fi").val();
    var ff = $("#ff").val();
      $.ajax({
        url: 'indicadoresFacebook',
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

          var area1 = new Chartist.Bar('#chartAreaFacebook', {
            labels: medios,
            series: [ cantidad ]
          }, {
            stackBars: true,
            axisY: {
              labelInterpolationFnc: function(value) {
                return (value / 1000) + 'k';
              }
            }
          }).on('draw', function(data) {
            if(data.type === 'bar') {
              data.element.attr({
                style: 'stroke-width: 20px'
              });
            }
          });

        },
        error: function (error) {
          swal('error','Error al general el grafico');
        }
      });
  }

  function creaGraficoFacebookSemanales(){
    'use strict'
    var fi = $("#fi").val();
    var ff = $("#ff").val();
      $.ajax({
        url: 'indicadoresFacebookSemana',
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

          var area1 = new Chartist.Line('#chartAreaFacebookSemanal', {
            labels: medios,
            series: [ cantidad ]
          }, {
            height: '200px',
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

  function creaGraficoTweeter(){
    'use strict'
    var fi = $("#fi").val();
    var ff = $("#ff").val();
      $.ajax({
        url: 'indicadoresTweeter',
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

          var area1 = new Chartist.Line('#chartAreaTweeter', {
            labels: medios,
            series: [ cantidad ]
          }, {
            height: '200px',
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

  function creaGraficoTweeterSemanales(){
    'use strict'
    var fi = $("#fi").val();
    var ff = $("#ff").val();
      $.ajax({
        url: 'indicadoresTweeterSemanales',
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

          var area1 = new Chartist.Bar('#chartAreaTweeterSemanal', {
            labels: medios,
            series: [ cantidad ]
          }, {
            stackBars: true,
            axisY: {
              labelInterpolationFnc: function(value) {
                return (value / 1000) + 'k';
              }
            }
            }).on('draw', function(data) {
                if(data.type === 'bar') {
                data.element.attr({
                    style: 'stroke-width: 30px'
                });
                }
            });
          hide();
        },
        error: function (error) {
          swal('error','Error al general el grafico');
        }
      });
  }

function creaGraficoFechas(){
  'use strict'
  var fi = $("#fi").val();
  var ff = $("#ff").val();

  var part1 =fi.split('/');
  var part2 =ff.split('/');

  var md1 = new Date(part1[2], part1[1] - 1 , part1[0]);
  var md2 = new Date(part2[2], part2[1] - 1 , part2[0]);

  if(md1 <= md2){
    $.ajax({
      url: 'indicadoresGeneralFechas',
      type: 'POST',
      data: {'fi': moment(md1).format('YYYY-MM-DD'),
             'ff': moment(md2).format('YYYY-MM-DD')
            },
      dataType: 'JSON',
      success: function (data) {
        var medios = [];
        var cantidad = [];


        medios.push(data[0]);
        cantidad.push(data[1]);



        var area2 = new Chartist.Line('#chartArea2', {
          labels: ['Septiembre','Octubre','Novienbre'],
          series: [ [68,1,50],[59,1],[9,1,1] ]
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

  }else{
    alert('La fecha inicial debe ser menor o igual que la final');
  }


}

function Palabra(palabra){
  'use strict'

  var fi = $("#fi").val();
  var ff = $("#ff").val();

  var part1 =fi.split('/');
  var part2 =ff.split('/');

  var md1 = new Date(part1[2], part1[1] - 1 , part1[0]);
  var md2 = new Date(part2[2], part2[1] - 1 , part2[0]);

  if(md1 <= md2){

    $.ajax({
      url: 'indicadoresPorPalabra',
      type: 'POST',
      data: {'palabra': palabra,
              'fi': fi,
              'ff': ff
            },
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
  } else {
    swal({
      title: "Error de fechas",
      text: "La fecha incial debe de ser menor a la fecha final.",
      type: "error"
    });
  }

}

function busca(){
  var palabra = $("#palabra").val();
  Palabra(palabra);
}

function Enter(e){
  if (e.keyCode == 13) {
    var palabra = $("#palabra").val();
    Palabra(palabra);
  }
}

function fechas(){
  alert('Fechas');
}

function show(){
    document.getElementById("spinner-back").classList.add("show");
    document.getElementById("spinner-front").classList.add("show");
}
function hide(){
    document.getElementById("spinner-back").classList.remove("show");
    document.getElementById("spinner-front").classList.remove("show");
}
