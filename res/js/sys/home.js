$(document).ready(function () {
    $("form button").prop('disabled', true);

    $("input[name='tipo']").click(function () {
        $("form button").prop('disabled', false);
        var html_correo_electronico = ''
            + '<label class="control-label col-sm-4" for="correo">Correo Electrónico:</label>'
            + '<div class="col-sm-8">'
            + '<input type="email" name="correo" id="correo" class="form-control" required>'
            + '</div>'
            ;
        var html_rut = ''
            + '<label class="control-label col-sm-1" for="rut">RUT:</label>'
            + '<div class="col-sm-11">'
            + '<input type="text" name="rut" id="rut" class="form-control" onkeypress="return solonumero(event)" maxlength="8" style="width:88%; margin-right:1%; text-align:right;" required>'
            + '<input type="text" name="dv" id="dv" class="form-control" maxlength="1"  style="width:10%;" required>'
            + '</div>'
            ;

        $('#tipo_seleccionado').html('');
        switch ($("input[name='tipo']:checked").val()) {
            case 'tipo_correo':
                $("input[name='tipo'][value='tipo_correo']").prop("checked", true);
                $("input[name='tipo'][value='tipo_rut']").prop("checked", false);
                $('#tipo_seleccionado').html(html_correo_electronico);
                break;
            case 'tipo_rut':
                $("input[name='tipo'][value='tipo_correo']").prop("checked", false);
                $("input[name='tipo'][value='tipo_rut']").prop("checked", true);
                $('#tipo_seleccionado').html(html_rut);
                break;
        }
    });

    $("#login-form").submit(function(){
            getPostulante();
        event.preventDefault();
    });
});

function getPostulante() {  
    $.ajax({
        async: true,
        cache: false,
        dataType: "json",
        type: 'POST',
        data: $('#login-form').serialize(),
        beforeSend: function () {
            $("#alerta").css({'display': 'none'});
            $("#loader").css({'display': 'block'});
        },
        complete: function () {
            $("#loader").css({'display': 'none'});
        },
        error: function (jqXHR, textStatus, errorThrown) {
            // code en caso de error de la ejecucion del ajax
            console.log(textStatus + errorThrown);
        },
        success: function (result) {
            if(result[0].id_postulante == 0){
                $("#alerta").text("Postulante no encontrado");
                $("#alerta").css({'display': 'block'});
            }else{
                window.location.href = location.href+ 'Postulante' ;
            }
        },
        url: "Home/getPostulante"
    });
}