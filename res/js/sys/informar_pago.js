$(document).ready(function () {
	$(document).on('change', '.btn-file :file', function () {
		var input = $(this),
			label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
		input.trigger('fileselect', [label]);
	});

	$('.btn-file :file').on('fileselect', function (event, label) {

		var input = $(this).parents('.input-group').find(':text'),
			log = label;

		if (input.length) {
			input.val(log);
		} else {
			if (log) alert(log);
		}

	});

	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();


			console.log(input.files[0]);


			reader.onload = function (e) {
				$('#img-upload').attr('src', e.target.result);
			}

			reader.readAsDataURL(input.files[0]);
		}
	}

	$("#imgInp").change(function (e) {
		// var tipo_archivo = this.files[0].name.split('.');
		// tipo_archivo.reverse();
		// if (tipo_archivo[0].includes("pdf")) {
			readURL(this);

		// } else {
		// 	var file = e.target.files[0];
		// 	canvasResize(file, {
		// 		width: 800,
		// 		height: 0,
		// 		crop: false,
		// 		quality: 50,
		// 		//rotate: 90,
		// 		callback: function (data, width, height) {
		// 			$('#img-upload').attr('src', data);
		// 		}
		// 	});
		// }
	});

	$("#frm-informar-pago").submit(function () {
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
				$("#comprobante").val($('#img-upload').attr('src'));
				informarPago();
			}
		});
		event.preventDefault();
	});
});


function informarPago() {
	$.ajax({
		async: true,
		cache: false,
		dataType: "json",
		type: 'POST',
		data: $("#frm-informar-pago").serialize(),
		beforeSend: function () {
			$("#alerta").css({
				'display': 'none'
			});
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
			$("#alerta").text("Hubo un problema al realizar la acción.");
			$("#alerta").css({
				'display': 'block'
			});
		},
		success: function (result) {
			if (result[0].respuesta == 1) {
				swal({
					title: 'Listo!',
					text: "Tu información de pago ha sido ingresada. Debes esperar el correo de confirmación para poder agendar posteriormente tu fecha de examen.",
					type: 'success',
					showCancelButton: false,
					confirmButtonColor: '#138C45',
					cancelButtonColor: '#EE2039',
					confirmButtonText: 'Aceptar',
					cancelButtonText: 'No'
				}).then((result) => {
					if (result.value) {
						location.href = getSiteURL() + '/Examenes';
					}
				});

			} else {

				swal({
					title: 'Error',
					text: result[0].mensaje,
					type: 'error',
					showCancelButton: true,
					confirmButtonColor: '#138C45',
					cancelButtonColor: '#EE2039',
					confirmButtonText: 'Aceptar',
					cancelButtonText: 'No'
				}).then((result) => {
					if (result.value) {
						location.href = getSiteURL() + '/Examenes';
					}
				});

			}
		},
		url: "Informar_Pago/informarPago"
	});
}
