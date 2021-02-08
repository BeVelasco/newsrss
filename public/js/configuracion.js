$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
});

$(document).ready(function() {

});

function showModalAdd( event ){
    event.preventDefault();

    $('#addFuente').modal('show');

    $('#btnFuenteAdd').click(function(){
        let desc = $('#txDesc').val();
        let url = $('#txUrl').val();
        let tipo = $('#stipo :selected').val();
        let origen = $('#sorigen').val();

        if(!desc){
            Swal.fire({
                type: 'warning',
                title: 'Faltan datos',
                text: 'La descripcion es necesaria para continuar'
            });
            desc.focus();
        }

        if(!url){
            Swal.fire({
                type: 'warning',
                title: 'Faltan datos',
                text: 'La URL es necesaria para continuar'
            });
            url.focus();
        }

        if(tipo == 0){
            Swal.fire({
                type: 'warning',
                title: 'Faltan datos',
                text: 'Un tipo debe ser seleccionado para continuar'
            });
            tipo.focus();
        }
        if(origen == 0){
            Swal.fire({
                type: 'warning',
                title: 'Faltan datos',
                text: 'Un origen debe ser seleccionado para continuar'
            });
            origen.focus();
        }

        //Guardar los datos
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
