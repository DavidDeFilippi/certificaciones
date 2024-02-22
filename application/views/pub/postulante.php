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
				<h1>Mis Datos</h1>
				<p>Verifiqua que todos tus datos esten correctos antes de continuar.</p>
			</div>


			<form class="form-horizontal" id="datos-form">

				<div class="form-group">

					<label class="control-label col-sm-2" for="rut">RUT:</label>
					<div class="col-sm-4">
						<input type="text" name="rut" id="rut" class="form-control" onkeypress="return solonumero(event)" maxlength="8"
						 style="width:60%; margin-right:1%; text-align:right;" disabled required>
						<input type="text" name="dv" id="dv" class="form-control" maxlength="1" style="width:20%;" disabled required>
					</div>

					<label class="control-label col-sm-2" for="nombre">Nombre (s):</label>
					<div class="col-sm-4">
						<input type="text" name="nombre" id="nombre" class="form-control" maxlength="100" required>
					</div>

				</div>

				<div class="form-group">

					<label class="control-label col-sm-2" for="apellido1">Apellido Paterno:</label>
					<div class="col-sm-4">
						<input type="text" name="apellido1" id="apellido1" class="form-control" maxlength="100" required>
					</div>

					<label class="control-label col-sm-2" for="apellido2">Apellido Materno:</label>
					<div class="col-sm-4">
						<input type="text" name="apellido2" id="apellido2" class="form-control" maxlength="100" required>
					</div>

				</div>



				<div class="form-group">

					<label class="control-label col-sm-2" for="genero">Género:</label>
					<div class="col-sm-4">
						<select name="genero" id="genero" class="form-control" required>
							<option>Seleccione</option>
							<option value="M">Masculino</option>
							<option value="F">Femenino</option>
						</select>
					</div>

					<label class="control-label col-sm-2" for="correo">Correo Electrónico:</label>
					<div class="col-sm-4">
						<input type="text" name="correo" id="correo" class="form-control" maxlength="100" required>
					</div>

				</div>

				<div class="form-group">

					<label class="control-label col-sm-2" for="fnac">F. de Nacimiento:</label>
					<div class="col-sm-4">
						<input type="date" name="fnac" id="fnac" class="form-control" required>
					</div>

					<label class="control-label col-sm-2" for="nacionalidad">Nacionalidad:</label>
					<div class="col-sm-4">
						<input type="text" name="nacionalidad" id="nacionalidad" class="form-control" required>
					</div>

				</div>

				<div class="form-group">
						<label class="control-label col-sm-2" for="direccion">Dirección:</label>
						<div class="col-sm-4">
							<input type="text" name="direccion" id="direccion" class="form-control" required>
						</div>

						<label class="control-label col-sm-2" for="comuna">Comuna:</label>
						<div class="col-sm-4">
							<input type="text" name="comuna" id="comuna" class="form-control" required>
						</div>
				</div>

				<div class="form-group">
						<label class="control-label col-sm-2" for="region">Región:</label>
						<div class="col-sm-4">
							<input type="text" name="region" id="region" class="form-control" required>
						</div>

						<label class="control-label col-sm-2" for="telefono">Teléfono:</label>
						<div class="col-sm-4">
							<input type="text" name="telefono" id="telefono" class="form-control" required>
						</div>
				</div>

				<div class="form-group">
						<label class="control-label col-sm-2" for="slaboral">Situación Laboral:</label>
						<div class="col-sm-4">
						<select name="slaboral" id="slaboral" class="form-control" required>
							<option value="">Seleccione</option>
							<option value="Dependiente">Trabajador Dependiente</option>
							<option value="Independiente">Trabajador Independiente</option>
							<option value="Cesante">Sin Trabajo</option>
						</select>
						</div>
						
				</div>

				<div class="text-right">
					<button class="btn btn-success">Enviar</button>
				</div>
				<br>
				<div class="alert alert-danger" role="alert" id="alerta">
				</div>
			</form>



		</div>
		<div class="col-lg-2"></div>
	</div>
</div>