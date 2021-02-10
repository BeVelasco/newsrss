$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
});

$(document).ready(function() {
    llenamedios();
    llenanoticias();
    llenaFT();
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
            data.forEach(element => {
                let desc = "";
                if(element.origen == 'N') desc="Nacional";
                if(element.origen == 'R') desc="Regional";
                if(element.origen == 'L') desc="Local";
                if(element.origen == 'I') desc="Internacional";

                html +=  "<tr><td>"+desc+"</td><td>"+element.num+"</td></tr>";
            });
            $('#tbmedios').append(html);
            hide();
        },
        error: function (error) {
            console.log(error);
          }
        });
}

function llenanoticias(){
    $('#tbresumen').html();
    $.ajax({
        url: 'getNoticiasMes',
        type: 'POST',
        data: {},
        dataType: 'JSON',
        success: function (data) {
            let html = "";
            data.forEach(element => {
                html +=  "<tr><td>"+element.titulo+"</td><td>"+element.created_at+"</td><td><a href='"+element.url+"' target='_blank'>"+element.url+"</a></td></tr>";
            });
            $('#tbresumen').append(html);
            hide();
        },
        error: function (error) {
            console.log(error);
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

                if(element['tipo'] == 0) desc += "HTML";
                if(element['tipo'] == 1) desc += "HTML";
                if(element['tipo'] == 3) desc += "FACEBOOK";
                if(element['tipo'] == 2) desc += "TWEETER";


                html +=  "<tr><td>"+element.idesc+"</td><td>"+desc+"</td></tr>";
            });
            $('#tbft').append(html);
            hide();
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
