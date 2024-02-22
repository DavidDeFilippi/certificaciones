<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panel_Sede extends CI_Controller {

	private $precio = 0;
    private $orden_compra = 0;

	function __construct() {
		parent::__construct();
		$this->load->library('session'); 
        $this->load->helper('url_helper');
        //  Carga el modelo que utiliza el controlador
        $this->load->model('Examenes_model', 'modelo');
        $this->load->model('Panel_model', 'panel');
    }
	public function index()
	{
		if($this->session->userdata('id_usuario') == '' || $this->session->userdata('id_sede') == ''){
			redirect(base_url());
		}

		$arr_theme_js_files = array(
			array('src' => base_url().'res/js/sweetalert2.min.js'),
			array('src' => base_url().'res/js/jquery.uniform.js'),
			array('src' => base_url().'res/js/select2.min.js'),
			array('src' => base_url().'res/js/datatables.min.js'),
			array('src' => base_url().'res/js/TableToJson.min.js'),
			array('src' => base_url().'res/js/sys/all.js'),
			array('src' => base_url().'res/js/sys/panel_sede.js')
		);

		$arr_theme_css_files = array(
			array('style' => base_url().'res/css/sweetalert2.min.css'),
			array('style' => base_url().'res/css/uniform.css'),
			array('style' => base_url().'res/css/select2.css'),
			array('style' => base_url().'res/css/datatables.min.css')
		);
		
		$modulos = $this->panel->get_modulos($this->session->userdata('id_usuario'));

		$data['modulos'] = $modulos;
		$data ['css_custom'] = $arr_theme_css_files;
		$data ['script_custom'] = $arr_theme_js_files;
		$this->load->view('pub_template/header', $data);
		$this->load->view('pub/panel_sede');
		$this->load->view('pub_template/footer');
		$this->load->view('pub_template/custom_scripts', $data);
		
	}

	

	public function getSede(){
		$respuesta = $this->modelo->getSede($this->session->userdata('id_sede'));
		echo json_encode($respuesta);
	}

	public function getExamenes(){
		$respuesta = $this->modelo->getExamenes($this->session->userdata('id_sede'));
		echo json_encode($respuesta);
	}
	
	public function getSedes(){
		$respuesta = $this->modelo->getSedes($this->session->userdata('id_certificacion'));
		echo json_encode($respuesta);
	}
	
	public function getPostulantes(){
		
		$respuesta = $this->modelo->getPostulantes($this->session->userdata('id_sede'));
		
		echo json_encode($respuesta);
	}
	
	public function getSalas(){
		$respuesta = $this->modelo->getSalas($this->session->userdata('id_sede'));
		echo json_encode($respuesta);
	}

	public function getSalasCuposTotales(){
		$respuesta = $this->modelo->getSalasCuposTotales($this->session->userdata('id_sede'));
		echo json_encode($respuesta);
	}
	
	public function cambiarEstadoExamen(){
		$respuesta = $this->modelo->cambiarEstadoExamen($this->input->post('id_certificacion'));
		echo json_encode($respuesta);
	}

	function setDatosBasicos(){
		$arr_input_data = array(
			'id_certificacion' => $this->session->userdata('id_certificacion'),
			'nombre_certificacion' => $this->input->post('nombre_certificacion'),
			'fecha_inicio' => $this->input->post('fecha_inicio'),
			'fecha_termino' => $this->input->post('fecha_termino'),
			'valor_certificacion' => $this->input->post('valor_certificacion')
		);

		$respuesta = $this->modelo->setDatosBasicos($arr_input_data);

		echo json_encode($respuesta);
	}

	function setPostulante(){
		$arr_input_data = array(
			'id_sede' => $this->session->userdata('id_sede'),
			'rut' => $this->input->post('rut'),
			'dv' => $this->input->post('dv'),
			'nombre' => $this->input->post('nombre'),
			'apellido_paterno' => $this->input->post('apellido_paterno'),
			'apellido_materno' => $this->input->post('apellido_materno'),
			'correo_electronico' => $this->input->post('correo_electronico'),
			'telefono' => $this->input->post('telefono'),
			'examen' => $this->input->post('examen')
		);
		$respuesta = $this->modelo->setPostulante($arr_input_data);
		echo json_encode($respuesta);
	}

	function setSala(){
		$arr_input_data = array(
			'id_sede' => $this->session->userdata('id_sede'),
			'nombre_sala' => $this->input->post('nombre_sala'),
			'capacidad_sala' => $this->input->post('capacidad_sala')
		);
		$respuesta = $this->modelo->setSala($arr_input_data);
		echo json_encode($respuesta);
	}

	function updateSede(){
		$arr_input_data = array(
			'id_sede' => $this->input->post('id_sede'),
			'nombre_sede' => $this->input->post('nombre_sede'),
			'direccion_sede' => $this->input->post('direccion_sede'),
			'fono_sede' => $this->input->post('fono_sede')
		);

		$respuesta = $this->modelo->updateSede($arr_input_data);

		echo json_encode($respuesta);
	}

	function setExamenfromCBX(){
		$arr_input_data = array(
			'id_sede' => $this->session->userdata('id_sede'),
			'id_certificacion' => $this->input->post('examen')
		);

		$respuesta = $this->modelo->setExamenfromCBX($arr_input_data);

		echo json_encode($respuesta);
	}

	function getExamenesCBXALL(){

		$arr_input_data = array(
			'id_sede' => $this->session->userdata('id_sede')
		);
		$respuesta = $this->modelo->getExamenesCBXALL($arr_input_data);

		echo json_encode($respuesta);
	}

	function getFechasSalaCBX(){

		$arr_input_data = array(
			'id_sala' => $this->input->post('id_sala')
		);
		$this->session->set_userdata('id_sala', $this->input->post('id_sala'));
		$respuesta = $this->modelo->getFechasSalaCBX($arr_input_data);

		echo json_encode($respuesta);
	}

	function getBloquesFechaBySala(){

		$arr_input_data = array(
			'id_sala' => $this->session->userdata('id_sala'),
			'fecha' => $this->input->post('fecha')
		);
		$respuesta = $this->modelo->getBloquesFechaBySala($arr_input_data);

		echo json_encode($respuesta);
	}

	function getCuposbyIdBloque(){

		$arr_input_data = array(
			'id_bloque' => $this->input->post('id_bloque')
		);
		$respuesta = $this->modelo->getCuposbyIdBloque($arr_input_data);

		echo json_encode($respuesta);
	}
	
	function setExamen(){
		$arr_input_data = array(
			'id_sede' => $this->session->userdata('id_sede'),
			'nombre_certificacion' => $this->input->post('nombre_certificacion'),
			'fecha_inicio' => $this->input->post('fecha_inicio'),
			'fecha_termino' => $this->input->post('fecha_termino'),
			'valor_certificacion' => $this->input->post('valor_certificacion'),
			'estado' => $this->input->post('estado')
		);

		$respuesta = $this->modelo->setExamen($arr_input_data);

		echo json_encode($respuesta);
	}

	function getExamenesCBXBySede(){

		$arr_input_data = array(
			'id_sede' => $this->session->userdata('id_sede')
		);
		$respuesta = $this->modelo->getExamenesCBXBySede($arr_input_data);

		echo json_encode($respuesta);
	}

	function getSalasCBXBySede(){

		$arr_input_data = array(
			'id_sede' => $this->session->userdata('id_sede')
		);
		$respuesta = $this->modelo->getSalasCBXBySede($arr_input_data);

		echo json_encode($respuesta);
	}

	function getDatosTransferenciaBancaria(){

		$arr_input_data = array(
			'id_postulacion' => $this->input->post('id_postulacion')
		);
		$respuesta = $this->modelo->getDatosTransferenciaBancaria($arr_input_data);

		echo json_encode($respuesta);
	}
	function aprobarRechazarTransferenciaBancaria(){

		$arr_input_data = array(
			'id_postulacion' => $this->input->post('id_postulacion'),
			'resultado_pago' => $this->input->post('resultado_pago')
		);
		$respuesta = $this->modelo->aprobarRechazarTransferenciaBancaria($arr_input_data);


		if($this->input->post('resultado_pago') == 1){
			//Email content
			$this->email->set_mailtype("html");
			$this->email->set_newline("\r\n");
			$this->email->set_crlf("\r\n");
			$htmlContent = '<h1>Estimado(a): '.$respuesta[0]['nombre'].'</h1>';
			$htmlContent .= '<p>Su pago ha sido aprobado y puede realizar la reserva de su exámen.</p>';
			$htmlContent .= '<p>Saludos cordiales,</p>';
			$htmlContent .= '<p>Segacy</p>';
			$htmlContent .= '<i>Este correo es generado de manera automática por el servidor, si desea comunicarse con nosotros, envíenos un correo a contacto@segacy.com</i>';

			$this->email->to($respuesta[0]['correo_electronico']);
			$this->email->from('noresponder@sfiareservasonline.net','Postulaciones SFIA');
			$this->email->subject('Pago Aprobado');
			$this->email->message($htmlContent);

			//Send email
			$this->load->library('encrypt');
			if ( ! $this->email->send())
			{
				echo 'email no enviado';
			}
				
		}else{
			//Email content
			$this->email->set_mailtype("html");
			$this->email->set_newline("\r\n");
			$this->email->set_crlf("\r\n");
			$htmlContent = '<h1>Estimado(a): '.$respuesta[0]['nombre'].'</h1>';
			$htmlContent .= '<p>Su pago ha sido rechazado. Si crees que esto sea un error, comunicate con spavlovic@segacy.com (Sanja Pavlovic) para entregar más antecedentes de tu depósito o transferencia bancaria.</p>';
			$htmlContent .= '<p>Saludos cordiales,</p>';
			$htmlContent .= '<p>Segacy</p>';
			$htmlContent .= '<i>Este correo es generado de manera automática por el servidor, si desea comunicarse con nosotros, envíenos un correo a contacto@segacy.com</i>';

			$this->email->to($respuesta[0]['correo_electronico']);
			$this->email->from('noresponder@sfiareservasonline.net','Postulaciones SFIA');
			$this->email->subject('Pago Rechazado');
			$this->email->message($htmlContent);

			//Send email
			$this->load->library('encrypt');
			if ( ! $this->email->send())
			{
				echo 'email no enviado';
			}
		}
		



		echo json_encode($respuesta);
	}
	function cargaMasiva(){
		$arr_input_data = array(
			'id_sede' => $this->session->userdata('id_sede'),
			'postulante' => $this->input->post()
		);

		$respuesta = $this->modelo->setPostulanteCM($arr_input_data);

		echo json_encode($respuesta);
	}
	
	function simularHorarios(){
		
		$hora_primer_examen = date_create_from_format('Y-m-d H:i',$this->input->post('fecha_inicio').' '.$this->input->post('hora_primer_examen'));
		$hora_limite = date_create_from_format('Y-m-d H:i',$this->input->post('fecha_inicio').' '.$this->input->post('hora_limite'));
		$tiempo_entre_examenes = $this->input->post('tiempo_entre_examenes');
		$respuesta;
		
		
		
		for ($i = 0 ; date_timestamp_get($hora_primer_examen) < date_timestamp_get($hora_limite) ; $i++) {
			$respuesta[$i] = date_format($hora_primer_examen, 'd-m-Y H:i');
			$hora_primer_examen = $hora_primer_examen->add(new DateInterval('PT'.$tiempo_entre_examenes.'M'));
		}
		
		echo json_encode($respuesta);
	}
	
	function setHorariosSala(){

		$id_sala = $this->input->post('id_sala');
		$fecha_inicio = date_create_from_format('d-m-Y H:i', $this->input->post('fecha_inicio'));
		$tiempo_entre_examenes = $this->input->post('tiempo_entre_examenes');
		$fecha_termino = date_create_from_format('d-m-Y H:i', $this->input->post('fecha_inicio'));
		$fecha_termino = $fecha_termino->add(new DateInterval('PT'.($tiempo_entre_examenes - 1).'M'));

		$fecha_inicio = date_format($fecha_inicio, 'Y-m-d H:i');
		$fecha_termino = date_format($fecha_termino, 'Y-m-d H:i');
		
		$arr_input_data = array(
			'id_sala' => $id_sala,
			'fecha_inicio' => $fecha_inicio,
			'fecha_termino' => $fecha_termino
		);

		$respuesta = $this->modelo->setHorariosSala($arr_input_data);

		if($respuesta[0]['respuesta'] == 1){
			if(isset($respuesta[0]['capacidad_sala'])){
				$respuesta[0]['cantidad_cupos'] = 0;
				for ($i=0; $i < $respuesta[0]['capacidad_sala']; $i++) { 
					$respuesta[0]['cantidad_cupos'] += $this->modelo->setCupo($respuesta[0]['id_bloque']);
				}
			}
		}

		echo json_encode($respuesta);
	}

	function editarPostulante() {

		$this->session->set_userdata('id_postulante', $this->input->post('id_postulante'));

		echo 'window.location.href =  "'.base_url().'Postulante";';
	}
}
