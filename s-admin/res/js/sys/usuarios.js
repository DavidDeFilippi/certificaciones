$(document).ready(function () {
    if (!location.href.includes('Pago')) {
        getUsuarios();
        
    }
    $("#form-agregar-usuario").submit(function () {
        setUsuario();
        event.preventDefault();
    });
});

function getUsuarios() {
    $.ajax({
        async: true,
        cache: false,
        dataType: "json",
        type: 'POST',
        beforeSend: function () {
            $("#loader").css({
                'display': 'block'
            });
        },
        complete: function () {
            $("#loader").css({
                'display': 'none'
            });
        },
        error: function (jqXHR, textStatus, errorThrown) {
            // code en caso de error de la ejecucion del ajax
            console.log(textStatus + errorThrown);
        },
        success: function (result) {
            var html = '';
            $("#tbl_usuarios tbody").html(html);
            if (result.length > 0) {
                $.each(result, function (i, item) {
                    html += '<tr>';
                    html += '<td>';
                    html += item.id_usuario
                    html += '</td>';
                    html += '<td>';
                    html += item.rut;
                    html += '</td>';
                    html += '<td>';
                    html += item.nombre;
                    html += '</td>';
                    html += '<td>';
                    html += item.email;
                    html += '</td>';
                    html += '<td>';
                    html += item.privilegios;
                    html += '</td>';
                    html += '<td>';
                    html += item.fecha_registro;
                    html += '</td>';
                    html += '<td>';
                    html += item.estado_html;
                    html += '</td>';
                    html += '<td>';
                    html += '<div class="btn-group">';
                    html += '<button data-toggle="dropdown" class="btn btn-info dropdown-toggle"><span class="caret"></span></button>';
                    html += '<ul class="dropdown-menu pull-right">';
                    html += '<li><a href="#" onclick="cambiarEstadoUsuario('+item.id_usuario+');">'+(item.estado == 1 ? 'Desactivar' : 'Activar')+'</a></li>';
                    if(item.estado == 1){
                        html += '<li><a href="#" onclick="enviarContrasena('+item.id_usuario+');">Enviar nueva contraseña</a></li>';
                    }
                    html += '</ul>';
                    html += '</div>';
                    html += '</td>';
                    html += '</tr>';
                });
            } else {
                html += '<tr><td colspan="6" style="text-align:center;">No existen registros.</td><tr>';
            }
            $("#tbl_usuarios tbody").html(html);
        },
        url: "Usuarios/getUsuarios"
    });
}

function cambiarEstadoUsuario(id_usuario){
    $.ajax({
        async: true,
        cache: false,
        dataType: "json",
        type: 'POST',
        data: { id_usuario: id_usuario },
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
            getUsuarios();
        },
        url: "Usuarios/cambiarEstadoUsuario"
    });
}

function setUsuario() {
    $.ajax({
        async: true,
        cache: false,
        dataType: "json",
        type: 'POST',
        data: $("#form-agregar-usuario").serialize(),
        beforeSend: function () {
            $("#loader").css({
                'display': 'block'
            });
            $("#form-agregar-sede .alerta").css({
                'display': 'none'
            });
        },
        complete: function () {
            $("#loader").css({
                'display': 'none'
            });
        },
        error: function (jqXHR, textStatus, errorThrown) {
            // code en caso de error de la ejecucion del ajax
            console.log(textStatus + errorThrown);
            $("#form-agregar-usuario .alerta").text("Hubo un problema al actualizar los datos");
            $("#form-agregar-usuario .alerta").css({
                'display': 'block'
            });
        },
        success: function (result) {
            if (result[0].respuesta == 1) {
                $("#form-agregar-usuario .alerta").removeClass('alert-danger').addClass('alert-success');
                $("#form-agregar-usuario .alerta").text(result[0].mensaje);
                $("#form-agregar-usuario .alerta").css({
                    'display': 'block'
                });
                $("#form-agregar-usuario")[0].reset();
                // getSedes();
            } else {
                $("#form-agregar-usuario .alerta").text(result[0].mensaje);
                $("#form-agregar-usuario .alerta").css({
                    'display': 'block'
                });
            }
        },
        url: "Usuarios/setUsuario"
    });
}

function enviarContrasena(id_usuario) {
    $.ajax({
        async: true,
        cache: false,
        dataType: "json",
        type: 'POST',
        data: {id_usuario: id_usuario},
        beforeSend: function () {
            $("#loader").css({
                'display': 'block'
            });
            $("#form-agregar-sede .alerta").css({
                'display': 'none'
            });
        },
        complete: function () {
            $("#loader").css({
                'display': 'none'
            });
        },
        error: function (jqXHR, textStatus, errorThrown) {
            // code en caso de error de la ejecucion del ajax
            console.log(textStatus + errorThrown);
            swal({
                title: 'Error',
                text: errorThrown,
                type: 'error',
                showCancelButton: false,
                confirmButtonColor: '#138C45',
                confirmButtonText: 'Aceptar',
                allowOutsideClick: false
            });
        },
        success: function (result) {
            if (result[0].respuesta == 1) {
                swal({
                    title: 'Listo',
                    text: result[0].mensaje,
                    type: 'success',
                    showCancelButton: false,
                    confirmButtonColor: '#138C45',
                    confirmButtonText: 'Aceptar',
                    allowOutsideClick: false
                });
            } else {
                swal({
                    title: 'Error',
                    text: result[0].mensaje,
                    type: 'error',
                    showCancelButton: false,
                    confirmButtonColor: '#138C45',
                    confirmButtonText: 'Aceptar',
                    allowOutsideClick: false
                });
            }
        },
        url: "Usuarios/enviarContrasena"
    });
}