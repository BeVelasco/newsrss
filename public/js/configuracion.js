$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
});

$(document).ready(function() {
    llenausuarios();
    llenapalabras();
    llenafuentes();

    $('#btnUserMod').click(function(){
        show();
        let id = $('#idUsrM').val();
        let name = $('#txMunombre').val();
        let email = $('#txMuemail').val();
        let pass = $('#txMupass').val();

        let estatus = 1
        if(id==1){estatus = 1;}
        else {estatus = $('#uMactivo').is(":checked") ? '1' : '0';}

        $.ajax({
            url     : 'updUser',
            type    : 'POST',
            data    : { 'id'        : id,
                        'name'      : name,
                        'email'     : email,
                        'pass'      : pass,
                        'estatus'   : estatus
                     },
            dataType: 'JSON',
            success : function (data) {
                Swal.fire({
                    type: 'success',
                    title: 'Mensaje de sistema',
                    text: 'La información se almaceno correctamente'
                });

                llenausuarios();
                $('#modModUser').modal('hide');
                hide();
            },
            error: function (error) {
                console.log(error);
            }
        });
    });

    $('#btnPalabraMod').click(function(){
        let id      = $('#idPalabra').val();
        let palabra   = $('#mtxPalabra').val();

        if(!palabra){
            Swal.fire({
                type: 'warning',
                title: 'Faltan datos',
                text: 'La(s) Palabra(s) es/son necesaria(s) para continuar'
            });
            idesc.focus();
        }

        $.ajax({
            url     : 'updPalabra',
            type    : 'POST',
            data    : { 'id'        : id,
                        'palabra'   : palabra },
            dataType: 'JSON',
            success : function (data) {
                Swal.fire({
                    type: 'success',
                    title: 'Mensaje de sistema',
                    text: 'La información se almaceno correctamente'
                });

                $('#modPalabra').modal('hide');
                llenapalabras();
                hide();
            },
            error: function (error) {
                console.log(error);
            }
        });
    });

    $('#btnFuenteAdd').click(function(){
        let idesc = $('#txDesc').val();
        let url = $('#txUrl').val();
        let tipo = $('#stipo').val();
        let origen = $('#sorigen').val();
        let estatus = $('#cactivo').is(":checked") ? '1' : '0';

        if(!idesc){
            Swal.fire({
                type: 'warning',
                title: 'Faltan datos',
                text: 'La descripcion es necesaria para continuar'
            });
            idesc.focus();
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

        $.ajax({
            url     : 'setFuente',
            type    : 'POST',
            data    : { 'idesc'     : idesc,
                        'url'       : url,
                        'tipo'      : tipo,
                        'origen'    : origen,
                        'estatus'   : estatus
                     },
            dataType: 'JSON',
            success : function (data) {
                Swal.fire({
                    type: 'success',
                    title: 'Mensaje de sistema',
                    text: 'La información se almaceno correctamente'
                });

                $('#addFuente').modal('hide');
                llenafuentes();
                hide();
            },
            error: function (error) {
                console.log(error);
            }
        });
    });

    $('#btnFuenteMod').click(function(){
        show();
        let id = $('#idFuente').val();
        let idesc = $('#mtxDesc').val();
        let url = $('#mtxUrl').val();
        let tipo = $('#mstipo :selected').val();
        let origen = $('#msorigen :selected').val();
        let estatus = $('#mcactivo').is(":checked") ? '1' : '0';

        if(!idesc){
            Swal.fire({
                type: 'warning',
                title: 'Faltan datos',
                text: 'La descripcion es necesaria para continuar'
            });
            idesc.focus();
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

        $.ajax({
            url     : 'updFuente',
            type    : 'POST',
            data    : { 'id'        : id,
                        'idesc'     : idesc,
                        'url'       : url,
                        'tipo'      : tipo,
                        'origen'    : origen,
                        'estatus'   : estatus
                     },
            dataType: 'JSON',
            success : function (data) {
                Swal.fire({
                    type: 'success',
                    title: 'Mensaje de sistema',
                    text: 'La información se almaceno correctamente'
                });

                $('#modFuente').modal('hide');
                llenafuentes();
                hide();
            },
            error: function (error) {
                console.log(error);
            }
        });
    });

    $('#btnUserAdd').click(function(){
        let nombre      = $('#txunombre').val();
        let username    = $('#txunombre').val();
        let email       = $('#txuemail').val();
        let pass        = $('#txupass').val();
        let estatus     = $('#uactivo').is(":checked") ? '1' : '0';

        if(!nombre){
            Swal.fire({
                type: 'warning',
                title: 'Faltan datos',
                text: 'El nombre es necesario para continuar'
            });
            idesc.focus();
        }

        if(!email){
            Swal.fire({
                type: 'warning',
                title: 'Faltan datos',
                text: 'El Email es necesaria para continuar'
            });
            idesc.focus();
        }

        if(!pass){
            Swal.fire({
                type: 'warning',
                title: 'Faltan datos',
                text: 'La password es necesaria para continuar'
            });
            idesc.focus();
        }

        $.ajax({
            url     : 'setUser',
            type    : 'POST',
            data    : { 'name'      : nombre,
                        'username'  : username,
                        'email'     : email,
                        'pass'      : pass,
                        'estatus'   : estatus
                     },
            dataType: 'JSON',
            success : function (data) {
                Swal.fire({
                    type: 'success',
                    title: 'Mensaje de sistema',
                    text: 'Usuario creado correctamente'
                });

                $('#modAddUser').modal('hide');
                llenausuarios();
                hide();
            },
            error: function (error) {
                console.log(error);
            }
        });
    });
});

function editF(id){
    $.ajax({
        url     : 'getFuentesId',
        type    : 'POST',
        async   :  true,
        data    : { 'id' : id },
        dataType: 'JSON',
        success : function (data) {
            $('#idFuente').val(id);
            $('#mtxDesc').val(data['idesc']);
            $('#mtxUrl').val(data['url']);

            $("#mstipo").val(data['tipo']);
            $("#msorigen").val(data['origen']);

            if(data['estatus'] == 1) {$('#mcactivo').prop('checked', true);}
            else {$('#mcactivo').prop('checked', false);}
        },
        error: function (error) {
            console.log(error);
        }
    });

    $('#modFuente').modal('show');
}

function editP(id){
    $.ajax({
        url     : 'getPalabraId',
        type    : 'POST',
        async   :  true,
        data    : { 'id' : id },
        dataType: 'JSON',
        success : function (data) {
            $('#idPalabra').val(id);
            $('#mtxPalabra').val(data['palabra']);
        },
        error: function (error) {
            console.log(error);
        }
    });

    $('#modPalabra').modal('show');
}

function editU(id){
    $.ajax({
        url     : 'getUserId',
        type    : 'POST',
        async   :  true,
        data    : { 'id' : id },
        dataType: 'JSON',
        success : function (data) {
            $('#idUsrM').val(id);
            $('#txMunombre').val(data['name']);
            $('#txMuemail').val(data['email']);
            $('#txMupass').val("");

            if(data['estatus'] == 1) {$('#uMactivo').prop('checked', true);}
            else {$('#uMactivo').prop('checked', false);};
        },
        error: function (error) {
            console.log(error);
        }
    });

    $('#modModUser').modal('show');
}

function showModalAdd( event ){
    event.preventDefault();
    $('#addFuente').modal('show');
}

function showModalAddU( event){
    event.preventDefault();
    $('#modAddUser').modal('show');
}

function llenafuentes(){
    show();
    $.ajax({
        url     : 'getFuentes',
        type    : 'POST',
        async   :  true,
        data    : {},
        dataType: 'JSON',
        success : function (data) {
            let html = "";
            data.forEach(element => {
                let ttipo = "RSS";
                if(element['tipo'] == 1){
                    ttipo = "HTML";
                }else if(element['tipo'] == 3){
                    ttipo = "FACEBOOK";
                }else if(element['tipo'] == 2){
                    ttipo = "TWEETER";
                }

                let origen = "Local";
                if(element['origen'] == 'E'){
                    origen = "Estatal";
                }else if(element['origen'] == 'R'){
                    origen = "Regional";
                }else if(element['origen'] == 'N'){
                    origen = "Nacional";
                }else if(element['origen'] == 'I'){
                    origen = "Internacional";
                }

                let estatus = "Activo"
                if(element['estatus'] == 0){
                    estatus = "Inactivo";
                }

                html += "<tr><td>"+element['idesc']+"</td><td>"+element['url']+"</td><td>"+ttipo+"</td><td>"+origen+"</td><td>"+estatus+"</td><td align='center'><a href='#'><i class = 'icon ion-android-create mg-l-10' onclick='editF("+element['id']+")'></i></a></td></tr>";

                $('#tbfuentes').html("");
                $('#tbfuentes').append(html);
                hide();
            });
        },
        error: function (error) {
            console.log(error);
        }
    });
}

function  llenapalabras(){
    $.ajax({
        url     : 'getPalabras',
        type    : 'POST',
        async   :  true,
        data    : {},
        dataType: 'JSON',
        success : function (data) {
            let html = "";
            data.forEach(element => {

                html +=  "<tr><td>"+element['palabra']+"</td><td align='center'><a href='#'><i class = 'icon ion-android-create mg-l-10' onclick='editP("+element['id']+")'></i></a> </td></tr>";
                $('#tbpalabra').html("");
                $('#tbpalabra').append(html);
            });
        },
        error: function (error) {
            console.log(error);
        }
    });
}

function  llenausuarios(){
    $('#tbuser').html("");
    $.ajax({
        url     : 'getUsuarios',
        type    : 'POST',
        async   :  true,
        data    : {},
        dataType: 'JSON',
        success : function (data) {
            let html = "";
            data.forEach(element => {
                let estat = 'Activo';
                if(!element.estatus) estat = 'Inactivo';

                html +=  "<tr><td>"+element.name+"</td><td align='center'>"+estat+"</td><td align='center'><a href='#'><i class = 'icon ion-android-create mg-l-10' onclick='editU("+element.id+")'></i></a> </td></tr>";
            });
            $('#tbuser').append(html);
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
