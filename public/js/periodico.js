$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
});

$(document).ready(function() {
	showdataPeriodicos();
    $('#alvuelo').hide();

    $('#btn8am').click(function( event ){
        event.preventDefault();

        $('#reporte').show();
        $('#alvuelo').hide();
        $('#btnpdf').show();
    });

    $('#btnActual').click(function( event ){
        event.preventDefault();

        Swal.fire({
            title: 'Busqueda de Primeras Planas Digitales',
            text: "¡¡Este proceso puede tardar varios minutos!!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, continua'
        }).then((result) => {
            if (result.value) {
                getHtmlNow();
                setTimeout(function() { }, 60000);
                hide();
            }
        })
    });

});

function getHtmlNow(){
    show();
    $('#reporte').hide();
    $('#alvuelo').show();

    $('#alvuelo').html('');
    // const url = 'https://mrbisne.com/portal';
    $.ajax({
        url     : 'getPeriodicos',
        type    : 'POST',
        async   :  true,
        data    : {},
        dataType: 'JSON',
        success : function (data) {
            data.forEach(element => {
                let url = element.url;
                getImgDiario(url);
            });
        },
        error: function (error) {
            console.log(error);
        }
    });

}

function getImgDiario(url){
    // const url = 'https://mrbisne.com/portal';
    const query = "https://www.googleapis.com/pagespeedonline/v5/runPagespeed?url="+url+"&screenshot=true&key=AIzaSyAMnqKBY0YG8FIvTakSa7J43_dyOIsBQTA";
    fetch(query)
    .then(response => response.json())
    .then(json => {
        let data = json.lighthouseResult.audits;
        let fs = data['final-screenshot'];
        let dt = fs['details'];
        let img = dt['data'];
        $('#alvuelo').append('<div class="row"><div class="col-12"><img src="'+img+'"> </div></div>')
    });

    $('#btnpdf').hide();
}

function muestra(id){
	var x = $("#ver"+id).attr("data-html");
	var html = $.parseHTML( atob(x) );

	var win = window.open("", "Title", "toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=780,height=800,top="+(screen.height)+",left="+(screen.width));
	win.document.write(atob(x));

}

function showdataP(id){
    show();
    $.ajax({
        url: 'getContentHtmlP',
        type: 'POST',
        data: {'id': id
              },
        dataType: 'JSON',
        success: function (data) {
            //var win = window.open("", "Title", "toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=780,height=400,top="+(screen.height)+",left="+(screen.width));
            //win.document.body.innerHTML = atob(data['rs'][0]['contenido']);
            return data['rs'][0]['contenido'];
            hide();
        },
        error: function (error) {
            /*swal('error','Error al general el grafico');*/
          }
        });
}

function showdataPeriodicos(){
    show();
    $.ajax({
        url: 'getContentHtmlPeriodicos',
        type: 'POST',
        data: {},
        dataType: 'JSON',
        success: function (data) {
            let html="";
            $('#reporte').html();
            data['rs'].forEach(function(periodico, index) {
                let img = periodico.content;
                if(img){
                    html+="<div><img src='"+img+"' height='400'></div><hr>";
                }
            });
            $('#reporte').append(html);
            hide();
        },
        error: function (error) {
            /*swal('error','Error al general el grafico');*/
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

