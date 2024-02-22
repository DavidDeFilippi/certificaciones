<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reportes extends CI_Controller {

	private $precio = 0;
    private $orden_compra = 0;

	function __construct() {
		parent::__construct();
		$this->load->library('session'); 
        $this->load->helper('url_helper');
        //  Carga el modelo que utiliza el controlador
		$this->load->model('Reportes_model', 'modelo');
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
			array('src' => base_url().'res/js/libexcel/dist/xlsx.full.min.js'),
			array('src' => base_url().'res/js/libexcel/dist/FileSaver.min.js'),
			array('src' => base_url().'res/js/sys/all.js'),
			array('src' => base_url().'res/js/sys/reportes.js')
		);

		$arr_theme_css_files = array(
			array('style' => base_url().'res/css/sweetalert2.min.css')
		);

		$modulos = $this->panel->get_modulos($this->session->userdata('id_usuario'));
		$data['modulos'] = $modulos;
		$data ['css_custom'] = $arr_theme_css_files;
		$data ['script_custom'] = $arr_theme_js_files;
		$this->load->view('pub_template/header', $data);
		$this->load->view('pub/reportes');
		$this->load->view('pub_template/footer');
		$this->load->view('pub_template/custom_scripts', $data);
		
	}

	function getReporte(){

		$arr_input_data = array(
			'id_sede' => $this->input->post('id_sede'),
			'tipo_reporte' => $this->input->post('tipo_reporte')
		);
		$respuesta = $this->modelo->getReporte($arr_input_data);

		echo json_encode($respuesta);
	}
}
