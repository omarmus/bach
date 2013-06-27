<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_M extends BC_Model {

	protected $_table_name = 'SysUsers';
	protected $_primary_key = 'idUser';
	protected $_order_by = 'username';
	public $rules = array(
		array(
			'field' => 'email',
			'label' => 'Email',
			'rules' => 'trim|required|valid_email|xss_clean'
		),
		array(
			'field' => 'password',
			'label' => 'Password',
			'rules' => 'trim|required'
		)
	);
	
	public function __construct() {
		parent::__construct();
	}

	public function login()
	{
		$user = $this->get_by(array(
			'Email' => $this->input->post('email'),
			'Password' => $this->hash($this->input->post('password'))
		), TRUE);
		if (count($user)) {
			//Log in user
			$data = array(
				'username' => $user->getUsername(), 
				'email' => $user->getEmail(), 
				'id_user' => $user->getPrimaryKey(), 
				'loggedin' => TRUE, 
			);
			$this->session->set_userdata($data);
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
	}

	public function loggedin()
	{
		return (bool) $this->session->userdata('loggedin');
	}

	public function hash($string)
	{
		return hash('sha512', $string . config_item('encryption_key'));
	}
}

/* End of file user_m.php */
/* Location: ./application/models/user_m.php */