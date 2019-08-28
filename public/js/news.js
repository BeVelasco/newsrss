 $.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
});

$(document).ready(function() {
	$("#buscar").click(function(){
		var cad = $("#txt").val().replace(' ','|');
		$("#cad").val(cad);	
	});

	setInterval(function() {
		window.location.reload();
	}, 300000);
});

function muestra(id){
	var x = $("#ver"+id).attr("data-html");
	var html = $.parseHTML( atob(x) );

	var win = window.open("", "Title", "toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=780,height=800,top="+(screen.height)+",left="+(screen.width));
	win.document.write(atob(x));

}
