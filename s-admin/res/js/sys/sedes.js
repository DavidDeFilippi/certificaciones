$(document).ready(function () {
    if (!location.href.includes('Pago')) {
        getSedes();
        
    }
    $("#form-agregar-sede").submit(function () {
        setSede();
        event.preventDefault();
    });
});

function editarExamen(id_certificacion){
    $.ajax({
        async: true,
        cache: false,
        dataType: "text",
        type: 'POST',
        data: { id_certificacion: id_certificacion },
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
            eval(result);
        },
        url: "Sedes/editarExamen"
    });
}

function panelSede(id_sede){
    $.ajax({
        async: true,
        cache: false,
        dataType: "text",
        type: 'POST',
        data: { id_sede: id_sede },
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
            eval(result);
        },
        url: "Sedes/panelSede"
    });
}

function getSedes() {
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
            $("#tbl_sedes tbody").html(html);
            if (result.length > 0) {
                $.each(result, function (i, item) {
                    html += '<tr>';
                    html += '<td>';
                    html += item.nombre_sede
                    html += '</td>';
                    html += '<td>';
                    html += item.direccion_sede;
                    html += '</td>';
                    html += '<td>';
                    html += item.fono_sede;
                    html += '</td>';

                    var color = item.examenes > 0 ? 'black' : 'black';
                    var etiquetaHTML = item.examenes > 0 ? 'b' : 'p';
                    html += '<td><'+etiquetaHTML+' style="color:'+color+';">';
                    html += item.examenes;
                    html += '</'+etiquetaHTML+'></td>';

                    var color = item.postulaciones > 0 ? 'black' : 'black';
                    var etiquetaHTML = item.postulaciones > 0 ? 'b' : 'p';
                    html += '<td><'+etiquetaHTML+' style="color:'+color+';">';
                    html += item.postulaciones;
                    html += '</'+etiquetaHTML+'></td>';

                    var color = item.esperando_confirmacion_de_pago > 0 ? 'red' : 'black';
                    var etiquetaHTML = item.esperando_confirmacion_de_pago > 0 ? 'b' : 'p';
                    html += '<td><'+etiquetaHTML+' style="color:'+color+';">';
                    html += item.esperando_confirmacion_de_pago;
                    html += '</'+etiquetaHTML+'></td>';

                    var color = item.pagados > 0 ? 'green' : 'black';
                    var etiquetaHTML = item.pagados > 0 ? 'b' : 'p';
                    html += '<td><'+etiquetaHTML+' style="color:'+color+';">';
                    html += item.pagados;
                    html += '</'+etiquetaHTML+'></td>';

                    var color = item.agendados > 0 ? 'green' : 'black';
                    var etiquetaHTML = item.agendados > 0 ? 'b' : 'p';
                    html += '<td><'+etiquetaHTML+' style="color:'+color+';">';
                    html += item.agendados;
                    html += '</'+etiquetaHTML+'></td>';

                    html += '<td>';
                    html += item.fecha_registro;
                    html += '</td>';

                    html += '<td>';
                    html += item.estado_html;
                    html += '</td>';
                    html += '<td>';
                    html += '<div class="btn-group">';
                    html += '<button class="btn btn-info" onclick="panelSede('+item.id_sede+');">Administrar</button>';
                    html += '<button data-toggle="dropdown" class="btn btn-info dropdown-toggle"><span class="caret"></span></button>';
                    html += '<ul class="dropdown-menu">';
                    html += '<li><a href="#" onclick="cambiarEstadoSede('+item.id_sede+');">'+(item.estado == 1 ? 'Desactivar' : 'Activar')+'</a></li>';
                    html += '</ul>';
                    html += '</div>';
                    html += '</td>';
                    html += '</tr>';
                });
            } else {
                html += '<tr><td colspan="6" style="text-align:center;">No existen registros.</td><tr>';
            }
            $("#tbl_sedes tbody").html(html);
        },
        url: "Sedes/getSedes"
    });
}

function cambiarEstadoSede(id_sede){
    $.ajax({
        async: true,
        cache: false,
        dataType: "json",
        type: 'POST',
        data: { id_sede: id_sede },
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
            getSedes();
        },
        url: "Sedes/cambiarEstadoSede"
    });
}

function setSede() {
    $.ajax({
        async: true,
        cache: false,
        dataType: "json",
        type: 'POST',
        data: $("#form-agregar-sede").serialize(),
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
            $("#form-agregar-sede.alerta").text("Hubo un problema al actualizar los datos");
            $("#form-agregar-sede .alerta").css({
                'display': 'block'
            });
        },
        success: function (result) {
            if (result[0].respuesta == 1) {
                $("#form-agregar-sede .alerta").removeClass('alert-danger').addClass('alert-success');
                $("#form-agregar-sede .alerta").text("Datos Guardados");
                $("#form-agregar-sede .alerta").css({
                    'display': 'block'
                });
                $("#form-agregar-sede")[0].reset();
                getSedes();
            } else {
                $("#form-agregar-sede .alerta").text(result[0].mensaje);
                $("#form-agregar-sede .alerta").css({
                    'display': 'block'
                });
            }
        },
        url: "Sedes/setSede"
    });
}