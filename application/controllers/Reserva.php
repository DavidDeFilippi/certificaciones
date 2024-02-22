<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reserva extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->library('session'); 
        $this->load->helper('url_helper');
        //  Carga el modelo que utiliza el controlador
        $this->load->model('Reserva_model', 'modelo');
    }
	public function index()
	{
		if($this->session->userdata('id_postulante') == ''){
			redirect(base_url());
		}
		$arr_theme_js_files = array(
			array('src' => base_url().'res/js/sweetalert2.min.js'),
			array('src' => base_url().'res/js/sys/all.js'),
			array('src' => base_url().'res/js/sys/reserva.js')
		);
		$arr_theme_css_files = array(
			array('style' => base_url().'res/css/sweetalert2.min.css')
		);
		$data ['script_custom'] = $arr_theme_js_files;
		$data ['css_custom'] = $arr_theme_css_files;
		$this->load->view('pub_template/header',$data);
		$this->load->view('pub/reserva');
		$this->load->view('pub_template/footer');
		$this->load->view('pub_template/custom_scripts', $data);
		
	}

	public function getExamen(){
		$arr_input_data = array(
			'id_postulacion' => $this->session->userdata('id_postulacion')
		);

		$respuesta = $this->modelo->getExamen($arr_input_data);
		$this->session->set_userdata('id_certificacion', $respuesta[0]['id_certificacion']);
		$this->session->set_userdata('nombre_sede', $respuesta[0]['nombre_sede']);
		$this->session->set_userdata('nombre_certificacion', $respuesta[0]['nombre_certificacion']);

		echo json_encode($respuesta);
	
	}
	public function getSedes(){
		$arr_input_data = array(
			'id_postulacion' => $this->session->userdata('id_postulacion')
		);

		$respuesta = $this->modelo->getSedes($arr_input_data);

		echo json_encode($respuesta);
	
	}

	public function getFechasCupos(){

			$arr_input_data = array(
				'id_sede' => $this->input->post('id_sede')
			);

			$this->session->set_userdata('id_sede', $this->input->post('id_sede'));

			$respuesta = $this->modelo->getFechasCupos($arr_input_data);

		echo json_encode($respuesta);
		
	}

	public function getCupos(){

			$arr_input_data = array(
				'id_sede' => $this->session->userdata('id_sede'),
				'fecha' =>  $this->input->post('fecha')
			);

			$this->session->set_userdata('fecha', $this->input->post('fecha'));

			$respuesta = $this->modelo->getCupos($arr_input_data);
			$html = '';
			
			$html.= '<table class="table">';
			$html.= '<thead>';
			$html.= '<th>Hora</th>';
			$html.= '<th>Opción</th>';
			$html.= '</thead>';
			$html.= '<tbody>';
			for ($i=0; $i < count($respuesta); $i++) { 

				$html.= '<tr>';
				$html.= '<th>';
				$html.= $respuesta[$i]['hora_inicio'];
				$html.= '</th>';
				$html.= '<td>';
				$html.= '<button class="btn btn-success btn-xs" onclick="setReserva('."'".$respuesta[$i]['hora_inicio']."'".')">Reservar</button>';
				$html.= '</td>';
				$html.= '</tr>';
				

			}
			$html.= '</tbody>';
			$html.= '</table>';
			echo $html;
		
	}

	public function setReserva(){

		$arr_input_data = array(
			'id_postulacion' => $this->session->userdata('id_postulacion'),
			'id_sede' => $this->session->userdata('id_sede'),
			'id_certificacion' => $this->session->userdata('id_certificacion'),
			'fecha' => $this->session->userdata('fecha'),
			'hora' =>  $this->input->post('hora')
		);


		$respuesta = $this->modelo->setReserva($arr_input_data);

		if($respuesta[0]['respuesta'] == 1){
			$sala = $respuesta[0]['sala'];

			// ENVIO DE EMAIL NOTIFICANDO LA RESERVA

			$this->email->set_mailtype("html");
			$this->email->set_newline("\r\n");
			$this->email->set_crlf("\r\n");
			$genero = '';
			if($this->session->userdata('genero') == 'M'){
				$genero = 'o';
			}else{
				$genero = 'a';
			}

			$fechaExamen = date_create_from_format('Y-m-d H:i:s',$this->session->userdata('fecha').' '.$this->input->post('hora'));
			$fechaExamen = date_format($fechaExamen, 'd-m-Y H:i');

			//Email content
			$htmlContent = '<h1>Estimad'.$genero.' '.$this->session->userdata('nombre').'</h1>';
			$htmlContent .= '<p>Se ha realizado la reserva para su exámen de certificación: </p>';
			$htmlContent .= '<ul>';
			$htmlContent .= '<li><b>Nombre Certificación: <b>'.$this->session->userdata('nombre_certificacion').'</li>';
			$htmlContent .= '<li><b>Fecha del Exámen: <b>'.$fechaExamen.'</li>';
			$htmlContent .= '<li><b>Lugar: <b>'.$this->session->userdata('nombre_sede').', Sala: '.$sala.'</li>';
			$htmlContent .= '<li><b>Código Postulación: '.$this->session->userdata('id_postulacion').'<b></li>';
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
			$this->email->from('noresponder@sfiareservasonline.net','Postulaciones SFIA');
			$this->email->subject('Notificacion de reserva de exámen');
			$this->email->message($htmlContent);

			//Send email
			$this->load->library('encrypt');
			$this->email->send();
		}

		echo json_encode($respuesta);
	}
}
