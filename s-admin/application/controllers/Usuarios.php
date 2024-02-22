<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	private $precio = 0;
    private $orden_compra = 0;

	function __construct() {
		parent::__construct();
		$this->load->library('session'); 
        $this->load->helper('url_helper');
        //  Carga el modelo que utiliza el controlador
		$this->load->model('Usuarios_model', 'modelo');
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
			array('src' => base_url().'res/js/sys/usuarios.js')
		);

		$arr_theme_css_files = array(
			array('style' => base_url().'res/css/sweetalert2.min.css')
		);

		$modulos = $this->panel->get_modulos($this->session->userdata('id_usuario'));
		$data['modulos'] = $modulos;
		$data ['css_custom'] = $arr_theme_css_files;
		$data ['script_custom'] = $arr_theme_js_files;
		$this->load->view('pub_template/header', $data);
		$this->load->view('pub/usuarios');
		$this->load->view('pub_template/footer');
		$this->load->view('pub_template/custom_scripts', $data);
		
	}

	public function getUsuarios(){
		$respuesta = $this->modelo->getUsuarios();
		echo json_encode($respuesta);
	}

	public function cambiarEstadoUsuario(){
		$respuesta = $this->modelo->cambiarEstadoUsuario($this->input->post('id_usuario'));
		echo json_encode($respuesta);
}

	function setUsuario(){
		$arr_input_data = array(
			'rut' => $this->input->post('rut'),
			'dv' => $this->input->post('dv'),
			'nombre' => $this->input->post('nombre'),
			'apellido' => $this->input->post('apellido'),
			'email' => $this->input->post('email')
			
		);
		$privilegios = $this->input->post('privilegios');

		$respuesta = $this->modelo->setUsuario($arr_input_data);

		if($respuesta[0]['respuesta'] == 1){
			for ($i=0; $i < count($privilegios); $i++) { 

				$arr_input_data2 = array(
					'id_usuario' => $respuesta[0]['id_usuario'],
					'privilegio' => $privilegios[$i]
				);
				$respuesta_p = $this->modelo->setUsuarioPrivilegio($arr_input_data2);
			}
			if($respuesta[0]['respuesta'] == 1){

				$this->email->set_mailtype("html");
				$this->email->set_newline("\r\n");
				$this->email->set_crlf("\r\n");
	
				//Email content
				$htmlContent = '<h1>Estimado(a): '.$this->input->post('nombre').'</h1>';
				$htmlContent .= '<p>Bienvenido a Segacy S-Admin</p>';
				$htmlContent .= '<p>Sus credenciales de acceso son:</p>';
				$htmlContent .= '<ul>';
				$htmlContent .= '<li><b>RUT: <b>'.$this->input->post('rut').'-'.$this->input->post('dv').'</li>';
				$htmlContent .= '<li><b>Password: <b>'.$respuesta[0]['ranpass'].'</li>';
				$htmlContent .= '</ul>';
				$htmlContent .= '<p><a href="https://sfiareservasonline.net/s-admin">Ingresar al sistema</a></p>';
				$htmlContent .= '<p>Saludos cordiales,</p>';
				$htmlContent .= '<p>S-Admin</p>';
				$htmlContent .= '<i>Este correo es generado de manera automática en el servidor.</i>';

				$this->email->to($this->input->post('email'));
				$this->email->from('noresponder@sfiareservasonline.net','Postulaciones SFIA');
				$this->email->subject('Bienvenido a Segacy S-Admin');
				$this->email->message($htmlContent);
	
				//Send email
				$this->load->library('encrypt');
				if ( ! $this->email->send())
				{
					echo 'email no enviado';
				}
			}
		}
		echo json_encode($respuesta);
	}

	function enviarContrasena(){

		$arr_input_data = array(
			'id_usuario' => $this->input->post('id_usuario')
		);

		$respuesta = $this->modelo->enviarContrasena($arr_input_data);

		if($respuesta[0]['respuesta'] == 1){

				$this->email->set_mailtype("html");
				$this->email->set_newline("\r\n");
				$this->email->set_crlf("\r\n");
	
				//Email content
				$htmlContent = '<h1>Estimado(a): '.$respuesta[0]['nombre'].'</h1>';
				$htmlContent .= '<p>Bienvenido a Segacy S-Admin</p>';
				$htmlContent .= '<p>Sus credenciales de acceso son:</p>';
				$htmlContent .= '<ul>';
				$htmlContent .= '<li><b>RUT: <b>'.$respuesta[0]['rut'].'</li>';
				$htmlContent .= '<li><b>Password: <b>'.$respuesta[0]['ranpass'].'</li>';
				$htmlContent .= '</ul>';
				$htmlContent .= '<p><a href="https://sfiareservasonline.net/s-admin">Ingresar al sistema</a></p>';
				$htmlContent .= '<p>Saludos cordiales,</p>';
				$htmlContent .= '<p>S-Admin</p>';
				$htmlContent .= '<i>Este correo es generado de manera automática en el servidor.</i>';

				$this->email->to($respuesta[0]['email']);
				$this->email->from('noresponder@sfiareservasonline.net','Postulaciones SFIA');
				$this->email->subject('Bienvenido a Segacy S-Admin');
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
}
