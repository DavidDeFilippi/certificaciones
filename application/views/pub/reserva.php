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
				<h1>Mi Reserva</h1>
				<p>Aca podrás agendar la fecha y hora de tu examen.</p>
				<h3 id="nombre_certificacion"></h3>
				<p id="observacion_certificacion"></p>
				<div class="row">
					<div class="col-lg-6">
						<form class="form-horizontal" id="input-sede">
							<div class="form-group">
								<input type="hidden" name="id_certificacion" id="id_certificacion">
								<input type="hidden" name="sede" id="sede">
								<label class="control-label col-sm-1" for="sede">Sede:</label>
								<div class="col-sm-11">
									<h4 id="nombre_sede"></h4>
								</div>
							</div>
						</form>
					</div>
					<div class="col-lg-6">
						<form class="form-horizontal" id="form-cupos">

							<div class="form-group">

								<label class="control-label col-sm-1" for="fecha">Fecha:</label>
								<div class="col-sm-11">
									<select name="fecha" id="fecha" class="form-control" required>
									</select>
								</div>

							</div>
						</form>
					</div>

				</div>

				<div class="row">
					<div class="col-lg-3"></div>
					<div class="col-lg-6" id="tbl_cupos"></div>
					<div class="col-lg-3"></div>
				</div>

			</div>
		</div>
		<div class="col-lg-2"></div>
	</div>
</div>