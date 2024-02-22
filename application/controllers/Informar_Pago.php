<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Informar_Pago extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->library('session'); 
        $this->load->helper('url_helper');
        //  Carga el modelo que utiliza el controlador
        $this->load->model('Informar_Pago_model', 'modelo');
    }
	public function index()
	{
		if($this->session->userdata('id_postulante') == ''){
			redirect(base_url());
		}

		$arr_theme_js_files = array(
			array('src' => base_url().'res/js/sweetalert2.min.js'),
			array('src' => base_url().'res/js/jquery.exif.js'),
			array('src' => base_url().'res/js/jquery.canvasResize.js'),
			array('src' => base_url().'res/js/canvasResize.js'),
			array('src' => base_url().'res/js/sys/all.js'),
			array('src' => base_url().'res/js/sys/informar_pago.js')
		);

		$arr_theme_css_files = array(
			array('style' => base_url().'res/css/sweetalert2.min.css')
		);

		$cuentaTransferencias = $this->modelo->getCuentaTransferencias();
		$data['cuentaTransferencias'] = $cuentaTransferencias;
		$data['css_custom'] = $arr_theme_css_files;
		$data['script_custom'] = $arr_theme_js_files;
		$this->load->view('pub_template/header', $data);
		$this->load->view('pub/informar_pago');
		$this->load->view('pub_template/footer');
		$this->load->view('pub_template/custom_scripts', $data);
		
	}

	public function getPostulante(){
			$arr_input_data = array(
				'id_postulante' => $this->session->userdata('id_postulante')
			);

			$respuesta = $this->modelo->get_datos_postulante($arr_input_data);
			echo json_encode($respuesta);
		
	}

	function informarPago() {

        $arr_input_data = array(
            "id_postulacion" => $this->session->userdata('id_postulacion'),
            "fecha_pago" => $this->input->post('fecha_pago'),
            "hora_pago" => $this->input->post('hora_pago'),
            "comprobante" => $this->input->post('comprobante'),
            "observaciones" => $this->input->post('observaciones')
        );

		$respuesta = $this->modelo->setTransferenciaBancaria($arr_input_data);

		if($respuesta[0]['respuesta'] == 1){
			// ENVIO DE EMAIL NOTIFICANDO LA RESERVA

			$this->email->set_mailtype("html");
			$this->email->set_newline("\r\n");
			$this->email->set_crlf("\r\n");

			//Email content
			$htmlContent = '<h1>Estimados: </h1>';
			$htmlContent .= '<p>Un postulante a exámen de certificación ha informado un pago por transferencia o depósito bancario: </p>';
			$htmlContent .= '<ul>';
			$htmlContent .= '<li><b>Nombre: <b>'.$this->session->userdata('nombre').'</li>';
			$htmlContent .= '<li><b>RUT: <b>'.$this->session->userdata('rut').'</li>';
			$htmlContent .= '<li><b>Nombre Certificación: <b>'.$this->session->userdata('nombre_certificacion').'</li>';
			$htmlContent .= '<li><b>Sede: <b>'.$this->session->userdata('nombre_sede').'</li>';
			$htmlContent .= '<li><b>Código Postulación: '.$this->session->userdata('id_postulacion').'<b></li>';
			$htmlContent .= '</ul>';
			$htmlContent .= '<br>';
			$htmlContent .= '<br>';
			$htmlContent .= '<p>Saludos cordiales,</p>';
			$htmlContent .= '<br>';
			$htmlContent .= '<br>';
			$htmlContent .= '<p>S-Admin</p>';
			$htmlContent .= '<br>';
			$htmlContent .= '<i>Este correo es generado de manera automática por el servidor.</i>';

			$this->email->to('spavlovic@segacy.com');
			$this->email->from('noresponder@sfiareservasonline.net','Postulaciones SFIA');
			$this->email->subject('Notificacion de transferencia Bancaria');
			$this->email->message($htmlContent);

			//Send email
			$this->load->library('encrypt');
			$this->email->send();
		}

		echo json_encode($respuesta);
	}
}
