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

