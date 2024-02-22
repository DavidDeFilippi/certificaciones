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
		$this->session->unset_userdata('id_usuario');
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
		// $this->load->view('pub_template/header',$data);
		$this->load->view('home');
		// $this->load->view('pub_template/footer');
		$this->load->view('pub_template/custom_scripts', $data);
		
	}

	public function getUsuario(){

		$arr_input_data = array(
			'rut' => $this->input->post('rut'),
			'dv' => $this->input->post('dv'),
			'contrasena' => $this->input->post('contrasena')
		);
		$respuesta = $this->modelo->getUsuario($arr_input_data);

		if($respuesta[0]['id_usuario'] != 0 && !is_null($respuesta[0]['id_usuario'])){
			$user_array = array(
					'id_usuario' => $respuesta[0]['id_usuario'],
					'rut' => $respuesta[0]['rut'],
					'dv' => $respuesta[0]['dv'],
					'nombre' => $respuesta[0]['nombre'],
					'apellido' => $respuesta[0]['apellido'],
					'dato_especial' => $respuesta[0]['dato_especial']
			);
			$this->session->set_userdata($user_array);
		}

		echo json_encode($respuesta);
		
	}
	public function Cambiar_Password(){
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
		// $this->load->view('pub_template/header',$data);
		$this->load->view('cambiar_password');
		// $this->load->view('pub_template/footer');
		$this->load->view('pub_template/custom_scripts', $data);
	}
	public function updatePass(){

		$arr_input_data = array(
			'id_usuario' => $this->session->userdata('id_usuario'),
			'contrasena_actual' => $this->input->post('contrasena_actual'),
			'contrasena_nueva' => $this->input->post('contrasena_nueva'),
		);
		
		$respuesta = $this->modelo->updatePass($arr_input_data);
		$respuesta['sitebase'] = base_url();

		echo json_encode($respuesta);
		
	}
}
