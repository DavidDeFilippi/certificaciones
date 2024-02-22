<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asistencia extends CI_Controller {

	private $precio = 0;
    private $orden_compra = 0;

	function __construct() {
		parent::__construct();
		$this->load->library('session'); 
        $this->load->helper('url_helper');
        //  Carga el modelo que utiliza el controlador
		$this->load->model('Asistencia_model', 'modelo');
		$this->load->model('Panel_model', 'panel');
    }
	public function index()
	{
		if($this->session->userdata('id_usuario') == ''){
			redirect(base_url());
		}

		$arr_theme_js_files = array(
			array('src' => base_url().'res/js/sweetalert2.min.js'),
			array('src' => base_url().'res/js/jspdf.min.js'),
			array('src' => base_url().'res/js/jspdf.plugin.autotable.min.js'),
			array('src' => base_url().'res/js/sys/all.js'),
			array('src' => base_url().'res/js/sys/asistencia.js')
		);

		$arr_theme_css_files = array(
			array('style' => base_url().'res/css/sweetalert2.min.css')
		);

		$modulos = $this->panel->get_modulos($this->session->userdata('id_usuario'));
		$data['modulos'] = $modulos;
		$data ['css_custom'] = $arr_theme_css_files;
		$data ['script_custom'] = $arr_theme_js_files;
		$this->load->view('pub_template/header', $data);
		$this->load->view('pub/asistencia');
		$this->load->view('pub_template/footer');
		$this->load->view('pub_template/custom_scripts', $data);
		
	}

	function getSalasCBXBySede(){

		$arr_input_data = array(
			'id_sede' => $this->input->post('id_sede')
		);
		$respuesta = $this->modelo->getSalasCBXBySede($arr_input_data);

		echo json_encode($respuesta);
	}

	public function getSedesCBX(){
		$respuesta = $this->modelo->getSedesCBX();
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

	function insertAsistenciaPostulante(){

		$arr_input_data = array(
			'id_bloque' => $this->input->post('id_bloque'),
			'id_cupo' => $this->input->post('id_cupo'),
			'asiste' => $this->input->post('asiste')
		);
		$respuesta = $this->modelo->insertAsistenciaPostulante($arr_input_data);

		echo json_encode($respuesta);
	}
}
