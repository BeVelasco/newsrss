$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
});

$(document).ready(function() {
	showdataPeriodicos();
});

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
                console.log(index);
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

