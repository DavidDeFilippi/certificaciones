$(document).ready(function () {
    $("#fecha").prop('disabled',true);

    if (!location.href.includes('Pago')) {
        getExamen();
    }
    $("#fecha").change(function () {
        $("#tbl_cupos").html('');
        getCupos();
        event.preventDefault();
    });
});

function getExamen() {
    $.ajax({
        async: true,
        cache: false,
        dataType: "json",
        type: 'POST',
        beforeSend: function () {
            $("#loader").css({ 'display': 'block' });
        },
        complete: function () {
            $("#loader").css({ 'display': 'none' });
        },
        error: function (jqXHR, textStatus, errorThrown) {
            // code en caso de error de la ejecucion del ajax
            console.log(textStatus + errorThrown);
        },
        success: function (result) {
            console.log(result);
            $("#nombre_certificacion").text(result[0].nombre_certificacion);
            $("#nombre_sede").text(result[0].nombre_sede);
            $("#observacion_certificacion").text('El periodo de examenes para esta certificación está fijada entre el ' + result[0].fecha_inicio + ' y el ' + result[0].fecha_inicio + '. En caso que no puedas realizar el examen dentro de este periodo, debes esperar a un segundo llamado y agendar nuevamente tu fecha.');
            getFechasCupos(result[0].id_sede);
            
        },
        url: "Reserva/getExamen"
    });
}

// function getSedes() {
//     $.ajax({
//         async: true,
//         cache: false,
//         dataType: "json",
//         type: 'POST',
//         beforeSend: function () {
//             $("#loader").css({ 'display': 'block' });
//         },
//         complete: function () {
//             $("#loader").css({ 'display': 'none' });
//         },
//         error: function (jqXHR, textStatus, errorThrown) {
//             // code en caso de error de la ejecucion del ajax
//             console.log(textStatus + errorThrown);
//         },
//         success: function (result) {
//             console.log(result);
//             if(result[0].id_sede != null){
//                 $("#sede").val(result[0].id_sede);
//             }else{
//                 swal({
//                     title: 'Error',
//                     text: "Aún no existen cupos para este examen",
//                     type: 'error',
//                     showCancelButton: false,
//                     confirmButtonColor: '#138C45',
//                     confirmButtonText: 'Aceptar',
//                     allowOutsideClick: false
//                 }).then((result) => {
//                     if (result.value) {
//                         location.href = getSiteURL()+"Examenes";
//                     }
//                 });
//             }
//             getFechasCupos();

//         },
//         url: "Reserva/getSedes"
//     });
// }

function getFechasCupos(id_sede) {
    $.ajax({
        async: true,
        cache: false,
        dataType: "json",
        type: 'POST',
        data: {id_sede: id_sede},
        beforeSend: function () {
            $("#loader").css({ 'display': 'block' });
        },
        complete: function () {
            $("#loader").css({ 'display': 'none' });
        },
        error: function (jqXHR, textStatus, errorThrown) {
            // code en caso de error de la ejecucion del ajax
            console.log(textStatus + errorThrown);
        },
        success: function (result) {
            if(result.length > 0){
                $("#fecha").prop('disabled',false);
                console.log(result);
                var html = "";
                html += '<option value="">Seleccione</option>';
                $.each(result, function (i, item) {
                    html += '<option value="' + item.fecha_inicio + '">' + item.fecha_inicio_formateado + '</option>';
                });
                $("#fecha").html(html);
            }else{
                if($("#sede").val() == ""){
                    $("#fecha").html("<option></option>");
                }else{
                    $("#fecha").html("<option>Sin Cupos</option>");
                }
                $("#fecha").prop('disabled',true);
            }
        },
        url: "Reserva/getFechasCupos"
    });
}

function getCupos() {
    $.ajax({
        async: true,
        cache: false,
        dataType: "html",
        type: 'POST',
        data: $('#form-cupos').serialize(),
        beforeSend: function () {
            $("#loader").css({ 'display': 'block' });
        },
        complete: function () {
            $("#loader").css({ 'display': 'none' });
        },
        error: function (jqXHR, textStatus, errorThrown) {
            // code en caso de error de la ejecucion del ajax
            console.log(textStatus + errorThrown);
        },
        success: function (result) {
            console.log(result);
            if($("#fecha").val() == ""){
                $("#tbl_cupos").html('');
            }else{
                $("#tbl_cupos").html(result);
            }
            
        },
        url: "Reserva/getCupos"
    });
}

function setReserva(hora) {

    swal({
        title: 'Atención',
        text: "¿Realmente deseas reservar esta hora?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#138C45',
        cancelButtonColor: '#EE2039',
        confirmButtonText: 'Si',
        cancelButtonText: 'No'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                async: true,
                cache: false,
                dataType: "json",
                type: 'POST',
                data: {hora: hora},
                beforeSend: function () {
                    $("#loader").css({ 'display': 'block' });
                },
                complete: function () {
                    $("#loader").css({ 'display': 'none' });
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    // code en caso de error de la ejecucion del ajax
                    console.log(textStatus + errorThrown);
                    swal({
                        title: 'Error',
                        text: "No se ha podido reservar la hora",
                        type: 'error',
                        showCancelButton: false,
                        confirmButtonColor: '#138C45',
                        confirmButtonText: 'Aceptar',
                        allowOutsideClick: false
                    });
                },
                success: function (result) {
                    console.log(result);
                    if(result[0].respuesta == 1){
                        swal({
                            title: 'Perfecto',
                            text: "Examen reservado exitosamente",
                            type: 'success',
                            showCancelButton: false,
                            confirmButtonColor: '#138C45',
                            confirmButtonText: 'Aceptar',
                            allowOutsideClick: false
                        }).then((result) => {
                            if (result.value) {
                                location.href = getSiteURL()+"Examenes";
                            }
                        });
                    }else{
                        swal({
                            title: 'Error',
                            text: "No se ha podido reservar la hora",
                            type: 'error',
                            showCancelButton: false,
                            confirmButtonColor: '#138C45',
                            confirmButtonText: 'Aceptar',
                            allowOutsideClick: false
                        });
                    }
        
                },
                url: "Reserva/setReserva"
            });
        }
    });
}