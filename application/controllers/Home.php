<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->library('session'); 
        $this->load->helper('url_helper');
        //  Carga el modelo que utiliza el controlador
        $this->load->model('Home_model', 'modelo');
    }
	public function index()
	{
		$this->session->unset_userdata('id_postulante');
		$arr_theme_js_files = array(
			array('src' => base_url().'res/js/sweetalert2.min.js'),
			array('src' => base_url().'res/js/sys/all.js'),
			array('src' => base_url().'res/js/sys/home.js')
		);
		$arr_theme_css_files = array(
			array('style' => base_url().'res/css/sweetalert2.min.css')
		);
		$data ['script_custom'] = $arr_theme_js_files;
		$data ['css_custom'] = $arr_theme_css_files;
		$this->load->view('pub_template/header',$data);
		$this->load->view('home');
		$this->load->view('pub_template/footer');
		$this->load->view('pub_template/custom_scripts', $data);
		
	}

	public function getPostulante(){

		$respuesta;
		
		if($this->input->post('tipo') == 'tipo_rut'){
			$arr_input_data = array(
				'rut' => $this->input->post('rut'),
				'dv' => $this->input->post('dv')
			);
			$respuesta = $this->modelo->getDataByRUT($arr_input_data);
		}
		if($this->input->post('tipo') == 'tipo_correo'){
			$arr_input_data = array(
				'correo' => $this->input->post('correo')
			);
			$respuesta = $this->modelo->getDataByEmail($arr_input_data);
		}
		if($respuesta[0]['id_postulante'] != 0 && !is_null($respuesta[0]['id_postulante'])){
			$user_array = array(
					'id_postulante' => $respuesta[0]['id_postulante']
			);
			$this->session->set_userdata($user_array);
		}

		echo json_encode($respuesta);
		
	}
}
