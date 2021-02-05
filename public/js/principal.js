
$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });

$(document).ready(function () {
  'use strict'

   creaGraficoGeneral();
//   creaGraficoFechas();

  // Datepicker
  $('.fc-datepicker').datepicker({
    dateFormat: "dd/mm/yy",
    autoclose: true
  });
});

function creaGraficoGeneral(){
    'use strict'
    // var fi = $("#fi").val();
    // var ff = $("#ff").val();

    // var part1 =fi.split('/');
    // var part2 =ff.split('/');

    // var md1 = new Date(part1[2], part1[1] - 1 , part1[0]);
    // var md2 = new Date(part2[2], part2[1] - 1 , part2[0]);

    // if(md1 <= md2){

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
    show();
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

        var mediosTitulo = [];
        var fechx = [];
        var turl = [];
        var pre = [];
        var idt = [];
        let contenido = "";

        for (var i = 0; i <= data['rs'].length - 1; i++) {
            medios.push(data['rs'][i].titulo);
            cantidad.push(data['rs'][i].noticias);
        }

        for(var h = 0;h<data['rs1'].length; h++){
            contenido = atob(data['rs1'][h].contenido);
            let contmin = contenido;
            contenido = contenido.toUpperCase();
            palabra = palabra.toUpperCase();
            let ind = contenido.indexOf(palabra);
            let show = contmin.substring(ind, ind+200);
            pre.push(show);
            idt.push(data['rs1'][h].id);
            mediosTitulo.push(data['rs1'][h].titulo);
            fechx.push(data['rs1'][h].f);
            turl.push(data['rs1'][h].url);
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

        $('#show').html("");
        if(pre.length > 0){
            $('#show').append('<thead><tr><th width="10%">Medio</th><th width="10%">Fecha</th><th width="40%">Url</th><th width="40%">Contenido</th></tr></thead>');
            for(var z=0; z<pre.length; z++){
                $('#show').append('<tr><td>'+mediosTitulo[z]+'</td><td>'+fechx[z]+'</td><td><a href="'+turl[z]+'" target="_blank">'+turl[z].substring(0,40)+'</a></td><td>'+pre[z].substring(0,20)+'... <a href="#" onclick="showdata('+idt[z]+');">Preview</a></td></tr>');
            }
            $('#show').append('</tbody>');
        }
        hide();
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

function atou(str) {
    return decodeURIComponent(escape(window.atob(str)));
}

function showdata(id){
    show();
    $.ajax({
        url: 'getContentHtml',
        type: 'POST',
        data: {'id': id
              },
        dataType: 'JSON',
        success: function (data) {
            var win = window.open("", "Title", "toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=780,height=400,top="+(screen.height)+",left="+(screen.width));
            win.document.body.innerHTML = atob(data['rs'][0]['contenido']);
            hide();
        },
        error: function (error) {
            /*swal('error','Error al general el grafico');*/
          }
        });
}

