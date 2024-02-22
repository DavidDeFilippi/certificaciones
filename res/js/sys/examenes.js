$(document).ready(function () {
    if(!location.href.includes('Pago')){
        getExamenes();
    }
    if($("#btn_continuar").val() != 'pagar') {
        $('#continue').submit();
    } 
});

function getExamenes() {
    $.ajax({
        async: true,
        cache: false,
        dataType: "html",
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
            $("#tbl_examenes").html(result);
        },
        url: "Examenes/getExamenes"
    });
}

function pagar(id_postulacion){
    $.ajax({
        async: true,
        cache: false,
        dataType: "text",
        type: 'POST',
        data: {id_postulacion: id_postulacion},
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
        url: "Examenes/setPago"
    });
}

function DepositoBancario(id_postulacion){
    $.ajax({
        async: true,
        cache: false,
        dataType: "text",
        type: 'POST',
        data: {id_postulacion: id_postulacion},
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
        url: "Examenes/DepositoBancario"
    });
}

function reservar(id_postulacion){
    $.ajax({
        async: true,
        cache: false,
        dataType: "text",
        type: 'POST',
        data: {id_postulacion: id_postulacion},
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
            $("#alerta").text("Hubo un problema al realizar su pago");
            $("#alerta").css({ 'display': 'block' });
        },
        success: function (result) {
            eval(result);
        },
        url: "Examenes/setReserva"
    });
}

function cambiarCertificacion(id_postulacion, id_sede){
    $("#content-cambiar-certificacion").html('');
    var html = '';
    html += '<h4>Seleccione una certificacion</h4>';
    html += '<select id="select_certificacion">';
    html += '</select><br><br><button id="btnUpdateCertificacion" class="btn btn-warning">Guardar</button>';
    $("#content-cambiar-certificacion").html(html);
    $("#btnUpdateCertificacion").click(function(){
        updateCertificacion(id_postulacion);
    });


    $.ajax({
		async: false,
		cache: false,
		dataType: "json",
        type: 'POST',
        data:{id_sede: id_sede},
		error: function (jqXHR, textStatus, errorThrown) {
			// code en caso de error de la ejecucion del ajax
			console.log(textStatus + errorThrown);
		},
		success: function (result) {
			if (result.length > 0) {
				var html2 = "";
				$.each(result, function (i, item) {
					html2 += '<option value="' + item.id_certificacion + '">' + item.nombre_certificacion + '</option>';
				});
				$("#select_certificacion").html(html2);
			} else {
				$("#select_certificacion").html('<option value="">No hay exámenes</option>');
			}

		},
		url: "Examenes/getExamenesCBXBySede"
    });
    
    function updateCertificacion(id_postulacion){
        var id_certificacion = $('#select_certificacion').val();
        $.ajax({
            async: true,
            cache: false,
            dataType: "json",
            type: 'POST',
            data: {id_postulacion: id_postulacion, id_certificacion: id_certificacion},
            beforeSend: function () {
                $("#loader").css({ 'display': 'block' });
            },
            complete: function () {
                $("#loader").css({ 'display': 'none' });
            },
            error: function (jqXHR, textStatus, errorThrown) {
                // code en caso de error de la ejecucion del ajax
                console.log(textStatus + errorThrown);
                getExamenes();
            },
            success: function (result) {
                getExamenes();
            },
            url: "Examenes/updateCertificacion"
        });


    }


}