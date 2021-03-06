$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
});

$(document).ready(function() {
    llenamedios();
    llenaFT();
    llenanoticias();
    llenaRedes();
});

function llenamedios(){
    $('#tbmedios').html();
    $.ajax({
        url: 'getMedios',
        type: 'POST',
        data: {},
        dataType: 'JSON',
        success: function (data) {
            let html = "";
            let p1,p2,p3,p4;
            data.forEach(element => {
                let desc = "";
                if(element.origen == 'N') {
                    desc="Nacional";
                    p3 = "<tr><td>"+desc+"</td><td>"+element.num+"</td></tr>";
                }
                else if(element.origen == 'R'){
                    desc="Estatal";
                    p2 = "<tr><td>"+desc+"</td><td>"+element.num+"</td></tr>";
                }
                else if(element.origen == 'L'){
                    desc="Local";
                    p1 = "<tr><td>"+desc+"</td><td>"+element.num+"</td></tr>";
                }
                else if(element.origen == 'I') {
                    desc="Internacional";
                    p4 = "<tr><td>"+desc+"</td><td>"+element.num+"</td></tr>";
                }
            });
                html +=  p1;
                html +=  p2;
                html +=  p3;
                html +=  p4;

            $('#tbmedios').append(html);
        },
        error: function (error) {
            console.log(error);
          }
        });
}

function llenanoticias(){
    show();
    $('#tbresumen').html();
    $.ajax({
        url: 'getNoticiasMes',
        type: 'POST',
        data: {},
        dataType: 'JSON',
        success: function (data) {
            let html = "";
            data.forEach(element => {
                let contenido  =  atob(element.content);
                let pad = "window.open('"+element.url+"','Preview','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=350,height=250')";
                html +=  '<tr><td>'+element.titulo+'</td><td>'+element.created_at+'</td><td><a href="#" target="_blank">'+element.url+'</a></td><td><button onclick="'+pad+'";>Preview</button></td></tr>';
            });
            $('#tbresumen').append(html);
            hide();
        },
        error: function (error) {
            console.log(error);
          }
        });
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

function llenaFT(){
    $('#tbft').html();
    $.ajax({
        url: 'getFuentes',
        type: 'POST',
        data: {},
        dataType: 'JSON',
        success: function (data) {
            let html = "";
            data.forEach(element => {
                let desc = "";
                if(element.origen == 'N') desc += "Nacional/";
                if(element.origen == 'R') desc += "Regional/";
                if(element.origen == 'L') desc += "Local/";
                if(element.origen == 'I') desc += "Internacional/";

                if(element['tipo'] == 0) desc += "RSS";
                if(element['tipo'] == 1) desc += "HTML";
                if(element['tipo'] == 3) desc += "FACEBOOK";
                if(element['tipo'] == 2) desc += "TWEETER";


                html +=  "<tr><td>"+element.idesc+"</td><td>"+desc+"</td></tr>";
            });
            $('#tbft').append(html);
        },
        error: function (error) {
            console.log(error);
          }
        });
}

function llenaRedes(){
    $('#tbft').html();
    $.ajax({
        url: 'getFuentes',
        type: 'POST',
        data: {},
        dataType: 'JSON',
        success: function (data) {
            let html = "";
            data.forEach(element => {
                let desc = "";
                if(element.origen == 'F') desc += "Facebook";
                if(element.origen == 'T') desc += "Tweeter";

                if(desc){
                    html +=  "<tr><td>"+element.idesc+"</td><td>"+desc+"</td></tr>";
                }
            });
            $('#tbredes').append(html);
        },
        error: function (error) {
            console.log(error);
          }
        });
}
function show(){
    document.getElementById("spinner-back").classList.add("show");
    document.getElementById("spinner-front").classList.add("show");
}
function hide(){
    document.getElementById("spinner-back").classList.remove("show");
    document.getElementById("spinner-front").classList.remove("show");
}
