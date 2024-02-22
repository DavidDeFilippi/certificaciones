<div id="content">
	<div class="row content-row">
		<div class="col-lg-2"></div>
		<div class="col-lg-8 content-center">
			<div id="loader">
				<svg class="lds-typing" width="200px" height="200px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
				 viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" style="background: none;">
					<circle cx="12.5" cy="37.7955" r="5" fill="#ee2039">
						<animate attributeName="cy" calcMode="spline" keySplines="0 0.5 0.5 1;0.5 0 1 0.5;0.5 0.5 0.5 0.5" repeatCount="indefinite"
						 values="62.5;37.5;62.5;62.5" keyTimes="0;0.25;0.5;1" dur="1s" begin="-0.5s"></animate>
					</circle>
					<circle cx="27.5" cy="41.0037" r="5" fill="#ce3293">
						<animate attributeName="cy" calcMode="spline" keySplines="0 0.5 0.5 1;0.5 0 1 0.5;0.5 0.5 0.5 0.5" repeatCount="indefinite"
						 values="62.5;37.5;62.5;62.5" keyTimes="0;0.25;0.5;1" dur="1s" begin="-0.4166666666666667s"></animate>
					</circle>
					<circle cx="42.5" cy="48.4858" r="5" fill="#ffcd11">
						<animate attributeName="cy" calcMode="spline" keySplines="0 0.5 0.5 1;0.5 0 1 0.5;0.5 0.5 0.5 0.5" repeatCount="indefinite"
						 values="62.5;37.5;62.5;62.5" keyTimes="0;0.25;0.5;1" dur="1s" begin="-0.3333333333333333s"></animate>
					</circle>
					<circle cx="57.5" cy="62.5" r="5" fill="#cc6728">
						<animate attributeName="cy" calcMode="spline" keySplines="0 0.5 0.5 1;0.5 0 1 0.5;0.5 0.5 0.5 0.5" repeatCount="indefinite"
						 values="62.5;37.5;62.5;62.5" keyTimes="0;0.25;0.5;1" dur="1s" begin="-0.25s"></animate>
					</circle>
					<circle cx="72.5" cy="62.5" r="5" fill="#1899c4">
						<animate attributeName="cy" calcMode="spline" keySplines="0 0.5 0.5 1;0.5 0 1 0.5;0.5 0.5 0.5 0.5" repeatCount="indefinite"
						 values="62.5;37.5;62.5;62.5" keyTimes="0;0.25;0.5;1" dur="1s" begin="-0.16666666666666666s"></animate>
					</circle>
					<circle cx="87.5" cy="62.5" r="5" fill="#138c45">
						<animate attributeName="cy" calcMode="spline" keySplines="0 0.5 0.5 1;0.5 0 1 0.5;0.5 0.5 0.5 0.5" repeatCount="indefinite"
						 values="62.5;37.5;62.5;62.5" keyTimes="0;0.25;0.5;1" dur="1s" begin="-0.08333333333333333s"></animate>
					</circle>
				</svg>
			</div>
			<div class="text-center">
				<h1>Informar Pago</h1>
				<?php  
                    $html= '';
					$html .= '<div>';
					$html .= '<h3>Depósito  o transferencia bancaria</h3>';
					$html .= '<p>Sólo en caso que no pueda pagar a través de Webpay (Debe adjuntar su comprobante de depósito con el n° de referencia al momento de informar el pago).</p>';
					$html .= '<ul class="lista-tef">';
					$html .= '<li>';
					$html .= '<b>Titular: </b>' .$cuentaTransferencias[0]['nombre_titular'];
					$html .= '</li>';
					$html .= '<li>';
					$html .= '<b>Banco: </b>' .$cuentaTransferencias[0]['banco'];
					$html .= '</li>';
					$html .= '<li>';
					$html .= '<b>Tipo de Cuenta: </b>' .$cuentaTransferencias[0]['tipo_cuenta'];
					$html .= '</li>';
					$html .= '<li>';
					$html .= '<b>N° de Cuenta: </b>' .$cuentaTransferencias[0]['numero_cuenta'];
					$html .= '</li>';
					$html .= '<li>';
					$html .= '<b>Rut: </b>' .$cuentaTransferencias[0]['rut'];
					$html .= '</li>';
					$html .= '<li>';
					$html .= '<b>Correo Electrónico: </b>' .$cuentaTransferencias[0]['email'];
					$html .= '</li>';
					$html .= '<li>';
					$html .= '<b>N° de Referencia: </b>' .$this->session->userdata('id_postulacion');
					$html .= '</li>';
					$html .= '</ul>';
					$html .= '</div>';
					echo $html; 
                 ?>
				<p>Una vez que hayas realizado tu depósito, puedes informar el pago de tu examen a través de este formulario.</p>
			</div>


			<form class="form-horizontal" id="frm-informar-pago">

				<div class="form-group">

					<label class="control-label col-sm-2"><b style="color: red;">*</b> Agregar Comprobante</label>

					<div class="input-group col-sm-10">
						<div class="input-group-addon btn-file">Abrir <input type="file" id="imgInp" required></div>
						<input type="text" class="form-control" readonly>
					</div>

				</div>


				<div class="form-group">
					<div class="col-sm-2"></div>
					<div class="col-sm-10 text-center">
						<img id='img-upload' />
						<input type="hidden" name="comprobante" id="comprobante">
					</div>

				</div>

				<div class="form-group">
					<label class="control-label col-sm-2"><b style="color: red;">*</b> Fecha Del Pago :</label>
					<div class="col-sm-5">
						<input type="date" name="fecha_pago" id="fecha_pago" class="form-control" required>
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-sm-2">Hora Aprox. Del Pago :</label>
					<div class="col-sm-5">
						<input type="time" name="hora_pago" id="hora_pago" class="form-control">
					</div>
				</div>

				<div class="form-group">

					<label class="control-label col-sm-2" for="observaciones">Observaciones:</label>
					<div class="col-sm-10">
						<textarea name="observaciones" id="observaciones" class="form-control"></textarea>
					</div>
				</div>
				<div class="text-right">
					<button class="btn btn-success">Enviar</button>
				</div>
				<br>
				<div class="alert alert-danger" role="alert" id="alerta">
				</div>
				<i><b style="color: red;">*</b> Campos obligatorios.</i>
			</form>



		</div>
		<div class="col-lg-2"></div>
	</div>
</div>
