$(document).ready(function () {
    $("#loginform").submit(function(){
            getUsuario();
        event.preventDefault();
    });
    $("#passform").submit(function(){
            updatePass();
        event.preventDefault();
    });
});

function getUsuario() {  
    $.ajax({
        async: true,
        cache: false,
        dataType: "json",
        type: 'POST',
        data: $('#loginform').serialize(),
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
            $("#alerta").text("Error al ejecutal la acción. Intente nuevamente. ("+textStatus + " "+errorThrown+").");
                $("#alerta").css({'display': 'block'});
        },
        success: function (result) {
            if(result[0].id_usuario == 0){
                $("#alerta").text(result[0].resultado);
                $("#alerta").css({'display': 'block'});
            }else{
                if(result[0].ranpass == 1){
                    window.location.href = location.href+ 'Home/Cambiar_Password' ;
                }else{
                    window.location.href = location.href+ 'Panel' ;
                }
                
            }
        },
        url: "Home/getUsuario"
    });
}

function updatePass() {  
    if($('#contrasena_nueva').val() == $('#contrasena_nueva2').val()){
        $.ajax({
            async: true,
            cache: false,
            dataType: "json",
            type: 'POST',
            data: $('#passform').serialize(),
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
                $("#alerta").text("Error al ejecutal la acción. Intente nuevamente. ("+textStatus + " "+errorThrown+").");
                    $("#alerta").css({'display': 'block'});
            },
            success: function (result) {
                if(result[0].respuesta == 1){
                    window.location.href =  result.sitebase + 'Panel'; 
                }else{
                    $("#alerta").text(result[0].mensaje);
                    $("#alerta").css({'display': 'block'});          
                }
            },
            url: "updatePass"
        });
    }else{
        $("#alerta").text("Las contraseñas no coinciden");
        $("#alerta").css({'display': 'block'});
    }
    
}