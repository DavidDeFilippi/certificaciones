<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Examenes extends CI_Controller {

	private $precio = 0;
    private $orden_compra = 0;

	function __construct() {
		parent::__construct();
		$this->load->library('session'); 
        $this->load->helper('url_helper');
        //  Carga el modelo que utiliza el controlador
        $this->load->model('Examenes_model', 'modelo');
    }
	public function index()
	{
		if($this->session->userdata('id_postulante') == ''){
			redirect(base_url());
		}

		$arr_theme_js_files = array(
			array('src' => base_url().'res/js/sweetalert2.min.js'),
			array('src' => base_url().'res/js/sys/all.js'),
			array('src' => base_url().'res/js/sys/examenes.js')
		);

		$arr_theme_css_files = array(
			array('style' => base_url().'res/css/sweetalert2.min.css')
		);
		$data ['css_custom'] = $arr_theme_css_files;
		$data ['script_custom'] = $arr_theme_js_files;
		$this->load->view('pub_template/header', $data);
		$this->load->view('pub/examenes');
		$this->load->view('pub_template/footer');
		$this->load->view('pub_template/custom_scripts', $data);
		
	}

	public function getExamenes(){
			$arr_input_data = array(
				'id_postulante' => $this->session->userdata('id_postulante')
			);

			$respuesta = $this->modelo->getExamenes($arr_input_data);
			$html = '';
			for ($i=0; $i < count($respuesta); $i++) { 
				// FORMATO LISTA
				$html.= '<ul>';
				$html.= '<h3>';
				$html.= $respuesta[$i]['nombre_certificacion'];
				$html.= '</h3>';
				$html.= '<br>';
				$html.= '<li>';
				$html.= '<b>Sede donde se rendirá el examen: </b>'.$respuesta[$i]['nombre_sede'].'.';
				$html.= '</li>';
				$html.= '<br>';
				$html.= '<li>';
				$html.= '<b>Periodo de exámenes: </b>'.$respuesta[$i]['periodo_examen'].'.';
				$html.= '</li>';
				$html.= '<br>';
				$html.= '<li>';
				$html.= '<b>Valor cofinanciamiento: </b>'.$respuesta[$i]['valor_formateado'].'.';
				$html.= '</li>';
				$html.= '<br>';
				$html.= '<li>';
				$html.= '<b>Estado del pago: </b>'.$respuesta[$i]['estado_pago'].'.';
				$html.= '</li>';
				$html.= '<br>';
				$html.= '<li>';
				$html.= '<b>Fecha agendada: </b>';
				
				if($respuesta[$i]['fecha_examen'] == null || $respuesta[$i]['fecha_examen'] == ''){
					$html.= 'No agendada.';
				}else{
					$html.= $respuesta[$i]['fecha_examen'].'.' ;
					$html.= $respuesta[$i]['plazo_cambio_fecha'];
				} 
				$html.= '</li>';
				$html.= '</ul>';
				$html.= '<br>';



				$html.= '<ul class="lista-examenes">';
				$html.= '<li>';
				if($respuesta[$i]['id_estado_pago'] == 1 || $respuesta[$i]['id_estado_pago'] == 6){
					$html.= ' <button class="btn btn-success " onclick="pagar('.$respuesta[$i]['id_postulacion'].');">Pagar con Webpay</button>';

					$html.= ' <button class="btn btn-success " onclick="DepositoBancario('.$respuesta[$i]['id_postulacion'].');">Realizar Depósito o transferencia bancaria</button>';
				}
				$html.= '</li>';
				$html.= '<li>';
				if($respuesta[$i]['id_estado_pago'] == 5 || $respuesta[$i]['id_estado_pago'] == 10){
					if(is_null($respuesta[$i]['id_reserva'])){
						$html.= '<button class="btn btn-success " onclick="reservar('.$respuesta[$i]['id_postulacion'].');">Reservar Fecha</button>';
					}
				}
				$html.= '</li>';
				$html.= '<li>';
				$html.= $respuesta[$i]['btnCambiarCertificacion'];
				$html.= '</li>';

				$html.= '<br>';
				$html.= '<br>';
				$html.= '</ul>';
				if(($respuesta[$i]['id_estado_pago'] == 5 || $respuesta[$i]['id_estado_pago'] == 10) && ($respuesta[$i]['fecha_examen'] != null || $respuesta[$i]['fecha_examen'] != '')){
				$html.= '<b>*</b><i>Te recordamos que puedes reservar y/o modificar tu reserva hasta el '.$respuesta[$i]['plazo_reserva'].'.</i>';
				}
				$html .= '<div id="content-cambiar-certificacion"></div>';
				$html.= '<br>';
				$html.= '<br>';

				// FORMATO TABLA
				// $html.= '<table class="table table-bordered">';
				// $html.= '<tr>';
				// $html.= '<td class="first-td">';
				// $html.= '<b>Certificación:</b>';
				// $html.= '</td>';
				// $html.= '<td><b>';
				
				// $html.= '</b></td>';
				// $html.= '</tr>';
				// $html.= '<tr>';
				// $html.= '<td class="first-td">';
				// $html.= '<b>Periodo Exámenes:</b>';
				// $html.= '</td>';
				// $html.= '<td>';
				// $html.= $respuesta[$i]['periodo_examen'];
				// $html.= '</td>';
				// $html.= '</tr>';
				// $html.= '<tr>';
				// $html.= '<td class="first-td">';
				// $html.= '<b>Valor:</b>';
				// $html.= '</td>';
				// $html.= '<td>';
				// $html.= $respuesta[$i]['valor_formateado'];
				// $html.= '</td>';
				// $html.= '</tr>';
				// $html.= '<tr>';
				// $html.= '<td>';
				// $html.= '<b class="first-td">Estado Pago:</b>';
				// $html.= '</td>';
				// $html.= '<td>';
				// $html.= $respuesta[$i]['estado_pago'];
				// if($respuesta[$i]['id_estado_pago'] == 1){
				// 	$html.= ' <button class="btn btn-success btm-xs" onclick="pagar('.$respuesta[$i]['id_postulacion'].');">Pagar</button>';
				// }
				// $html.= '</td>';
				// $html.= '</tr>';
				// $html.= '<tr>';
				// $html.= '<td>';
				// $html.= '<b class="first-td">Fecha Examen</b>';
				// $html.= '</td>';
				// $html.= '<td>';
				// $html.= $respuesta[$i]['fecha_examen'];
				// if($respuesta[$i]['id_estado_pago'] == 5 || $respuesta[$i]['id_estado_pago'] == 10){
				// 	if(is_null($respuesta[$i]['id_reserva'])){
				// 		$html.= ' <button class="btn btn-success btm-xs">Reservar Fecha</button>';
				// 	}
				// }
				// $html.= '</td>';
				// $html.= '</tr>';
				// $html.= '</table>';
				if(count($respuesta) > 1){
					$html.= '<hr>';
				}
				
			$this->session->set_userdata('nombre_sede', $respuesta[0]['nombre_sede']);


			}
			echo $html;
		
	}

	function setPago() {

        $arr_input_data = array(
            "id_postulacion" => $this->input->post('id_postulacion')
        );

		$respuesta = $this->modelo->setPago($arr_input_data);


		$this->session->set_userdata('nombre_certificacion', $respuesta[0]['nombre_certificacion']);
		$this->session->set_userdata('monto', $respuesta[0]['valor_certificacion']);
		$this->session->set_userdata('id_postulacion', $respuesta[0]['id_postulacion']);

		echo 'window.location.href =  "'.base_url().'Examenes/Pago";';
	}

	function DepositoBancario() {
		
		$this->session->set_userdata('id_postulacion', $this->input->post('id_postulacion'));

		echo 'window.location.href =  "'.base_url().'Informar_Pago";';
	}

	public function Pago(){
		$monto = intval($this->session->userdata('monto'));
		$id_postulacion = $this->session->userdata('id_postulacion');


		$arr_theme_js_files = array(
			array('src' => base_url().'res/js/sweetalert2.min.js'),
			array('src' => base_url().'res/js/sys/all.js'),
			array('src' => base_url().'res/js/sys/examenes.js')
		);

		$arr_theme_css_files = array(
			array('style' => base_url().'res/css/sweetalert2.min.css')
		);
		$data ['css_custom'] = $arr_theme_css_files;
		$data ['script_custom'] = $arr_theme_js_files;

		$cuentaTransferencias = $this->modelo->getCuentaTransferencias();
		
		$this->load->library('Libwebpay');
		require_once(APPPATH.'libraries/certificates/cert-normal.php' );

		/** Configuracion parametros de la clase Webpay */
		// $sample_baseurl = $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
		$sample_baseurl = base_url().'Examenes/Pago';

		$configuration = new Configuration();
		$configuration->setEnvironment($certificate['environment']);
		$configuration->setCommerceCode($certificate['commerce_code']);
		$configuration->setPrivateKey($certificate['private_key']);
		$configuration->setPublicCert($certificate['public_cert']);
		$configuration->setWebpayCert($certificate['webpay_cert']);


		/** Creacion Objeto Webpay */
		$webpay = new Webpay($configuration);

		$action = isset($_GET["action"]) ? $_GET["action"] : 'init';

		$post_array = false;

		switch ($action) {

			default:

				$tx_step = "Init";

				/** Monto de la transacción */
				$amount = $monto;

				/** Orden de compra de la tienda */
				$buyOrder = $id_postulacion;

				/** Código comercio de la tienda entregado por Transbank */
				$sessionId = uniqid();

				/** URL de retorno */
				$urlReturn = $sample_baseurl."?action=getResult";

				/** URL Final */
			$urlFinal  = $sample_baseurl."?action=end";

				$request = array(
					"amount"    => $amount,
					"buyOrder"  => $buyOrder,
					"sessionId" => $sessionId,
					"urlReturn" => $urlReturn,
					"urlFinal"  => $urlFinal,
				);

				/** Iniciamos Transaccion */
				$result = null;
				try{
					$result = $webpay->getNormalTransaction()->initTransaction($amount, $buyOrder, $sessionId, $urlReturn, $urlFinal);
				}catch(Exception $e){
					if ($e instanceof SoapFault OR $e instanceof Error) {
						echo '<h1>Webpay no disponible</h1>';
						die();
					 }
				}

				/** Verificamos respuesta de inicio en webpay */
				if (!empty($result->token) && isset($result->token)) {
					$message = "Pagar con Webpay";
					$token = $result->token;
					$next_page = $result->url;

					$html= '';
					$html .= '<div class="col-lg-6  item-medio-pago">';
					$html .= '<h3>Depósito bancario</h3>';
					$html .= '<p>Sólo en caso que no pueda pagar a través de Webpay (Debe adjuntar su comprobante de depósito con el n° de referencia al momento de informar el pago).</p>';
					$html .= '<ul class="lista-deposito">';
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
					$html .= '<b>N° de Referencia: </b>' .$id_postulacion;
					$html .= '</li>';
					$html .= '</ul>';

					$html .= '<a href="'.base_url().'informar_pago"><button class="btn btn-success">Informar Pago &raquo;</button></a><br><br>';
					$html .= '</div>';

				} else {
					$message = "Webpay no disponible. Intentalo más tarde.";
					echo json_encode($result);
				}

				$button_name = "Continuar &raquo;";

				break;

			case "getResult":

				$tx_step = "Get Result";

				if (!isset($_POST["token_ws"]))
					break;

				/** Token de la transacción */
				$token = filter_input(INPUT_POST, 'token_ws');
				

				$request = array(
					"token" => filter_input(INPUT_POST, 'token_ws')
				);

				/** Rescatamos resultado y datos de la transaccion */
				$result = $webpay->getNormalTransaction()->getTransactionResult($token);

				/** Verificamos resultado  de transacción */
				$this->session->set_userdata('responseCode', $result->detailOutput->responseCode);
				if ($result->detailOutput->responseCode === 0) {
					$this->modelo->saveWPResult($result);

					/** propiedad de HTML5 (web storage), que permite almacenar datos en nuestro navegador web */
					echo '<script>localStorage.setItem("authorizationCode", '.$result->detailOutput->authorizationCode.')</script>';
					echo '<script>localStorage.setItem("amount", '.$result->detailOutput->amount.')</script>';
					echo '<script>localStorage.setItem("buyOrder", '.$result->buyOrder.')</script>';

					$fecha_de_pago = date_create_from_format('Y-m-d\TH:i:s+',$result->transactionDate);
					$fecha_de_pago = date_format($fecha_de_pago, 'd-m-Y H:i');

					$listvoucher .= '<ul class="list-group">';
					$listvoucher .= '<li class="list-group-item"><b>Codigo de Autorización:</b> '.$result->detailOutput->authorizationCode.'</li>';
					$listvoucher .= '<li class="list-group-item"><b>Monto:</b> $'.$result->detailOutput->amount.' pesos chilenos.</li>';
					$listvoucher .= '<li class="list-group-item"><b>N° de Postulación:</b> '.$result->buyOrder.'</li>';
					$listvoucher .= '<li class="list-group-item"><b>Nombre del comercio:</b> Segacy SpA</li>';
					$listvoucher .= '<li class="list-group-item"><b>Fecha de la transacción:</b> '.$fecha_de_pago.'</li>';
					switch ($result->detailOutput->paymentTypeCode) {
						case 'VD':
					$listvoucher .= '<li class="list-group-item"><b>Tipo de Pago: </b> Venta Débito</li>';
							
							break;
						case 'VN':
					$listvoucher .= '<li class="list-group-item"><b>Tipo de Pago: </b> Venta Normal</li>';
							
							break;
						case 'VC':
					$listvoucher .= '<li class="list-group-item"><b>Tipo de Pago: </b> Venta en cuotas</li>';
							
							break;
						case 'SI':
					$listvoucher .= '<li class="list-group-item"><b>Tipo de Pago: </b> 3 cuotas sin interés</li>';
							
							break;
						case 'S2':
					$listvoucher .= '<li class="list-group-item"><b>Tipo de Pago: </b> 2 cuotas sin interés</li>';
							
							break;
						case 'NC':
					$listvoucher .= '<li class="list-group-item"><b>Tipo de Pago: </b> N Cuotas sin interés</li>';
							
							break;
					}
					$listvoucher .= '<li class="list-group-item"><b>Cantidad de Cuotas:</b> '.$result->detailOutput->sharesNumber .'</li>';
					$listvoucher .= '<li class="list-group-item"><b>N° de tarjeta:</b> ****'.$result->cardDetail->cardNumber .'</li>';
					$listvoucher .= '<li class="list-group-item"><b>Descripción: </b> Copago de examen de certificación SFIA</li>';
					$listvoucher .= '</ul>';
					$this->session->set_userdata('listvoucher', $listvoucher);


					$message = "Pago ACEPTADO por webpay";
					$next_page = $result->urlRedirection;

					// ENVIO DE EMAIL NOTIFICANDO EL PAGO EXITOSO DEL EXAMEN DE CERTIFICACION

					$this->email->set_mailtype("html");
					$this->email->set_newline("\r\n");
					$this->email->set_crlf("\r\n");
					$genero = '';
					if($this->session->userdata('genero') == 'M'){
						$genero = 'o';
					}else{
						$genero = 'a';
					}
					//Email content
					$htmlContent = '<h1>Estimad'.$genero.' '.$this->session->userdata('nombre').'</h1>';
					$htmlContent .= '<p>Ha realizado el siguiente pago en nuestra página de inscripción a exámenes: </p>';
					$htmlContent .= '<ul>';
					$htmlContent .= '<li><b>Nombre Certificación: <b>'.$this->session->userdata('nombre_certificacion').'</li>';
					$htmlContent .= '<li><b>Valor Copago: <b>$'.$result->detailOutput->amount.'</li>';
					$htmlContent .= '<li><b>Fecha de Pago: <b>'.$fecha_de_pago.'</li>';
					$htmlContent .= '<li><b>Código Postulación: '.$this->session->userdata('id_postulacion').'<b></li>';
					$htmlContent .= '<li><b>Código de Autorización Webpay: <b>'.$result->detailOutput->authorizationCode.'</li>';
					$htmlContent .= '</ul>';
					$htmlContent .= '<br>';
					$htmlContent .= '<br>';
					$htmlContent .= '<p>Saludos cordiales,</p>';
					$htmlContent .= '<br>';
					$htmlContent .= '<br>';
					$htmlContent .= '<p>SEGACY</p>';
					$htmlContent .= '<br>';
					$htmlContent .= '<i>Este correo es generado de manera automática por el servidor, si desea comunicarse con nosotros, envíenos un correo a info@segacy.com</i>';



					$this->email->to($this->session->userdata('correo_electronico'));
					$this->email->bcc('info@segacy.com');
					$this->email->from('noresponder@sfiareservasonline.net','Postulaciones SFIA');
					$this->email->subject('Notificacion de pago de exámen');
					$this->email->message($htmlContent);

					//Send email
					$this->load->library('encrypt');
					$this->email->send();

				} else {
					$this->modelo->saveWPResult($result);
					$listvoucher = '';

					$message = "Pago RECHAZADO por webpay"; //. utf8_decode($result->detailOutput->responseDescription);
					$next_page = base_url().'Examenes';
				}

				$button_name = "Continuar &raquo;";

				break;

			case "end":

				$listvoucher = $this->session->userdata('listvoucher');
					

				$post_array = true;

				$tx_step = "End";
				$request = "";
				$result = $_POST;

				$message = "Transacion Finalizada";
				// $next_page = $sample_baseurl."?action=nullify";
				// $button_name = "Anular Transacci&oacute;n &raquo;";

				$next_page = 'Examenes';
				$button_name = "Volver a mis examenes";
				

				break;


			case "nullify":

				$tx_step = "nullify";

				$request = $_POST;

				/** Codigo de Comercio */
				$commercecode = null;

				/** Código de autorización de la transacción que se requiere anular */
				$authorizationCode = filter_input(INPUT_POST, 'authorizationCode');

				/** Monto autorizado de la transacción que se requiere anular */
				$amount =  filter_input(INPUT_POST, 'amount');

				/** Orden de compra de la transacción que se requiere anular */
				$buyOrder =  filter_input(INPUT_POST, 'buyOrder');

				/** Monto que se desea anular de la transacción */
				$nullifyAmount = 200;

				$request = array(
					"authorizationCode" => $authorizationCode, // Código de autorización
					"authorizedAmount" => $amount, // Monto autorizado
					"buyOrder" => $buyOrder, // Orden de compra
					"nullifyAmount" => $nullifyAmount, // idsession local
					"commercecode" => $configuration->getCommerceCode(), // idsession local
				);

				$result = $webpay->getNullifyTransaction()->nullify($authorizationCode, $amount, $buyOrder, $nullifyAmount, $commercecode);
				$listvoucher = '';

				/** Verificamos resultado  de transacción */
				if (!isset($result->authorizationCode)) {
					$message = "webpay no disponible";
				} else {
					$message = "Transaci&oacute;n Finalizada";
				}

				$next_page = '';

				break;
		}

		// echo "<h2>Step: " . $tx_step . "</h2>";

		/* Respuesta de Salida - Vista WEB */

		$data['next_page'] = $next_page;
        $data['post_array'] = $post_array;
        $data['button_name'] = $button_name;
        $data['tx_step'] = $tx_step;
        $data['request'] = $request;
        $data['result'] = $result;
		$data['message'] = $message;
		$data['id_postulacion'] = $id_postulacion;
		if(isset($token)){
			$data['token'] = $token;
		}else{
			$data['token'] = '';
		}
		if(isset($listvoucher)){
			$data['listvoucher'] = $listvoucher;
		}else{
			$data['listvoucher'] = '';
		}
		if(isset($html)){
			$data['html'] = $html;
		}else{
			$data['html'] = '';
		}
		if(isset($cuentaTransferencias)){
			$data['cuentaTransferencias'] = $cuentaTransferencias;
		}else{
			$data['cuentaTransferencias'] = '';
		}

		// AQUI CARGA LA PÁGINA PARA PAGAR
		$arr_theme_js_files = array(
			array('src' => base_url().'res/js/sweetalert2.min.js'),
			array('src' => base_url().'res/js/sys/all.js'),
			array('src' => base_url().'res/js/sys/examenes.js')
		);

		$arr_theme_css_files = array(
			array('style' => base_url().'res/css/sweetalert2.min.css')
		);
		$data ['css_custom'] = $arr_theme_css_files;
		$data ['script_custom'] = $arr_theme_js_files;

		$this->load->view('pub_template/header', $data);
		$this->load->view('pub/pago_v', $data);
		$this->load->view('pub_template/footer');
		$this->load->view('pub_template/custom_scripts', $data);

	}

	function setReserva() {

        $arr_input_data = array(
            "id_postulacion" => $this->input->post('id_postulacion')
        );
		$this->session->set_userdata('id_postulacion', $this->input->post('id_postulacion'));

		echo 'window.location.href =  "'.base_url().'Reserva";';
	}

	function getExamenesCBXBySede(){

		$arr_input_data = array(
			'id_sede' => $this->input->post('id_sede')
		);
		$respuesta = $this->modelo->getExamenesCBXBySede($arr_input_data);

		echo json_encode($respuesta);
	}

	function updateCertificacion(){

		$arr_input_data = array(
			'id_postulacion' => $this->input->post('id_postulacion'),
			'id_certificacion' => $this->input->post('id_certificacion')
		);
		$respuesta = $this->modelo->updateCertificacion($arr_input_data);

		echo json_encode($respuesta);
	}
}
