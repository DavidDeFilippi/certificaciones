<div id="content">
	<div class="row content-row">
		<div class="col-lg-4"></div>
		<div class="col-lg-4 content-center">
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
				<h4>BIENVENIDO A LA PLATAFORMA DE INSCRIPCIÓN Y RESERVA PARA EL PROCESO DE EVALUACIÓN Y CERTIFICACIÓN SFIA</h4>
				<p style="color:#1899C4;">BECAS DE CERTIFICACIÓN CORFO</p>
				<p>Para ingresar digita a continuación tu RUT o correo electrónico</p>
			</div>
			<form class="form-horizontal" id="login-form">
				<div class="inputGroup">
					<input type="radio" name="tipo" value="tipo_correo" id="tipo_correo" />
					<label for="tipo_correo">Ingresar con Correo Electrónico</label>
				</div>
				<div class="inputGroup">
					<input type="radio" name="tipo" value="tipo_rut" id="tipo_rut" />
					<label for="tipo_rut">Ingresar con RUT</label>
				</div>
				<div class="form-group" id="tipo_seleccionado">
				</div>
				<div class="text-right">
					<button class="btn btn-success">Ingresar</button>
				</div>
				<br>
				<div class="alert alert-danger" role="alert" id="alerta">
					
				</div>
			</form>
		</div>
		<div class="col-lg-4"></div>
	</div>
</div>