<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sedes extends CI_Controller {

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
		if($this->session->userdata('id_usuario') == ''){
			redirect(base_url());
		}

		$arr_theme_js_files = array(
			array('src' => base_url().'res/js/sweetalert2.min.js'),
			array('src' => base_url().'res/js/sys/all.js'),
			array('src' => base_url().'res/js/sys/sedes.js')
		);

		$arr_theme_css_files = array(
			array('style' => base_url().'res/css/sweetalert2.min.css')
		);

		$modulos = $this->panel->get_modulos($this->session->userdata('id_usuario'));
		$data['modulos'] = $modulos;
		$data ['css_custom'] = $arr_theme_css_files;
		$data ['script_custom'] = $arr_theme_js_files;
		$this->load->view('pub_template/header', $data);
		$this->load->view('pub/sedes');
		$this->load->view('pub_template/footer');
		$this->load->view('pub_template/custom_scripts', $data);
		
	}

	public function getExamenes(){
			$respuesta = $this->modelo->getExamenes();
			echo json_encode($respuesta);
	}

	public function cambiarEstadoSede(){
			$respuesta = $this->modelo->cambiarEstadoSede($this->input->post('id_sede'));
			echo json_encode($respuesta);
	}
	
	function panelSede() {

		$this->session->set_userdata('id_sede', $this->input->post('id_sede'));

		echo 'window.location.href =  "'.base_url().'Panel_Sede";';
	}
	public function getSedes(){
		$respuesta = $this->modelo->getSedesTodas();
		echo json_encode($respuesta);
	}
	function setSede(){
		$arr_input_data = array(
			'nombre_sede' => $this->input->post('nombre_sede'),
			'direccion_sede' => $this->input->post('direccion_sede'),
			'fono_sede' => $this->input->post('fono_sede')
		);

		$respuesta = $this->modelo->setSedeSinExamen($arr_input_data);

		echo json_encode($respuesta);
	}
}
