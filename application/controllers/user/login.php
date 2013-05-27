<?php 

/**
 * Clase para hacer Login de usuario en el sistema
 */
 class Login extends CI_Controller
 {
 	
 	function __construct()
 	{
		parent::__construct();
		$this->load->model('login_model');
		$this->load->library(array('session','form_validation'));
		$this->load->helper(array('url','form'));
		$this->load->database('default');
	}

	public function index()
	{	
		switch ($this->session->userdata('perfil')) {
			case '':
				$data['token'] = $this->token();
				$data['titulo'] = 'Login con roles de usuario en codeigniter';
				$this->load->view('login_view',$data);
				break;
			case 'administrador':
				redirect(base_url().'admin');
				break;
			case 'editor':
				redirect(base_url().'editor');
				break;
			case 'suscriptor':
				redirect(base_url().'suscriptor');
				break;
			default:
				$data['titulo'] = 'Login con roles de usuario en codeigniter';
				$this->load->view('login_view',$data);
				break;
		}
	}

	public function token()
	{
		$token = md5(uniqid(rand(),true));
		$this->session->set_userdata('token', $token);
		return $token;
	}

	public function logout()
	{
		$this->session->sess_destroy();
		$this->index();
	}
}
