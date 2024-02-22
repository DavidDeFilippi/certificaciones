<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panel extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->library('session'); 
        $this->load->helper('url_helper');
        //  Carga el modelo que utiliza el controlador
        $this->load->model('Panel_model', 'modelo');
    }
	public function index()
	{
		if($this->session->userdata('id_usuario') == ''){
			redirect(base_url());
		}

		$arr_theme_js_files = array(
			array('src' => base_url().'res/js/sweetalert2.min.js'),
			array('src' => base_url().'res/js/sys/all.js'),
			array('src' => base_url().'res/js/sys/panel.js')
		);

		$arr_theme_css_files = array(
			array('style' => base_url().'res/css/sweetalert2.min.css')
		);

		$modulos = $this->modelo->get_modulos($this->session->userdata('id_usuario'));
		$data['modulos'] = $modulos;
		$data ['css_custom'] = $arr_theme_css_files;
		$data ['script_custom'] = $arr_theme_js_files;
		$this->load->view('pub_template/header', $data);
		$this->load->view('pub/panel');
		$this->load->view('pub_template/footer');
		$this->load->view('pub_template/custom_scripts', $data);
		
	}

	public function getUsuario(){
			$arr_input_data = array(
				'id_usuario' => $this->session->userdata('id_usuario')
			);

			$respuesta = $this->modelo->get_datos_postulante($arr_input_data);
			echo json_encode($respuesta);
		
	}

	function upUsuario() {

        $arr_input_data = array(
            "id_usuario" => $this->session->userdata('id_usuario'),
            "nombre" => $this->input->post('nombre'),
            "apellido_paterno" => $this->input->post('apellido1'),
            "apellido_materno" => $this->input->post('apellido2'),
            "sexo" => $this->input->post('genero'),
            "fecha_nacimiento" => $this->input->post('fnac'),
            "nacionalidad" => $this->input->post('nacionalidad'),
            "region" => $this->input->post('region'),
            "comuna" => $this->input->post('comuna'),
            "direccion" => $this->input->post('direccion'),
            "laboral" => $this->input->post('slaboral'),
            "telefono_celular" => $this->input->post('telefono'),
            "correo_electronico" => $this->input->post('correo')
        );

		$respuesta = $this->modelo->upUsuario($arr_input_data);
		echo json_encode($respuesta);
	}
}
