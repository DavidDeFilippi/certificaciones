$(document).ready(function () {
    getPostulante();
    $("#datos-form").submit(function () {
        swal({
            title: 'Atención',
            text: "¿Confirmas que tus datos están correctos?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#138C45',
            cancelButtonColor: '#EE2039',
            confirmButtonText: 'Si',
            cancelButtonText: 'No'
        }).then((result) => {
            if (result.value) {
                upPostulante();
            }
        });
        event.preventDefault();
    });

});

function getPostulante() {
    $.ajax({
        async: true,
        cache: false,
        dataType: "json",
        type: 'POST',
        beforeSend: function () {
            $("#alerta").css({ 'display': 'none' });
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
            $("#rut").val(result[0].rut);
            $("#dv").val(result[0].dv);
            $("#nombre").val(result[0].nombre);
            $("#apellido1").val(result[0].apellido_paterno);
            $("#apellido2").val(result[0].apellido_materno);
            $("#genero").val(result[0].sexo);
            $("#correo").val(result[0].correo_electronico);
            $("#fnac").val(result[0].fecha_nacimiento);
            $("#nacionalidad").val(result[0].nacionalidad);
            $("#direccion").val(result[0].direccion);
            $("#comuna").val(result[0].comuna);
            $("#telefono").val(result[0].telefono_celular);
            $("#region").val(result[0].region);
            $("#slaboral").val(result[0].laboral);
        },
        url: "Postulante/getPostulante"
    });
}

function upPostulante() {

    $.ajax({
        async: true,
        cache: false,
        dataType: "json",
        type: 'POST',
        data: $('#datos-form').serialize(),
        beforeSend: function () {
            $("#alerta").css({ 'display': 'none' });
            $("#loader").css({ 'display': 'block' });
        },
        complete: function () {
            $("#loader").css({ 'display': 'none' });
        },
        error: function (jqXHR, textStatus, errorThrown) {
            // code en caso de error de la ejecucion del ajax
            console.log(textStatus + errorThrown);
            $("#alerta").text("Hubo un problema al actualizar sus datos");
            $("#alerta").css({ 'display': 'block' });
        },
        success: function (result) {
            if (result[0].resultado == 'ok') {
                window.location.href =  getSiteURL()+ 'Examenes';
            } else {
                $("#alerta").text("Hubo un problema al actualizar sus datos");
                $("#alerta").css({ 'display': 'block' });
            }
        },
        url: "Postulante/upPostulante"
    });

}