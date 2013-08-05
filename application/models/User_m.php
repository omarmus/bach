<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_M extends BC_Model {

	protected $_table_name = 'SysUsers';
	protected $_primary_key = 'IdUser';
	protected $_order_by = 'Username';
	protected $_timestamps = TRUE;

	public $rules_login = array(
		'email' => array(
			'field' => 'email',
			'label' => 'Email',
			'rules' => 'trim|required|valid_email|xss_clean'
		),
		'password' => array(
			'field' => 'password',
			'label' => 'Password',
			'rules' => 'trim|required'
		)
	);

	public $rules_edit = array(
		'FirstName' => array(
			'field' => 'FirstName',
			'label' => 'First name',
			'rules' => 'trim|required|xss_clean'
		),
		'LastName' => array(
			'field' => 'LastName',
			'label' => 'Last name',
			'rules' => 'trim|required|xss_clean'
		),
		'Email' => array(
			'field' => 'Email',
			'label' => 'Email',
			'rules' => 'trim|required|valid_email|callback__unique_email|xss_clean'
		),
		'Password' => array(
			'field' => 'Password',
			'label' => 'Password',
			'rules' => 'trim|matches[PasswordConfirm]'
		),
		'PasswordConfirm' => array(
			'field' => 'PasswordConfirm',
			'label' => 'Confirm password',
			'rules' => 'trim|matches[Password]'
		)
	);

	public $rules_password = array(
		'OldPassword' => array(
			'field' => 'OldPassword',
			'label' => 'Contraseña anterior',
			'rules' => 'trim|required|callback__verify_old_password'
		),
		'Password' => array(
			'field' => 'Password',
			'label' => 'Nueva contraseña',
			'rules' => 'trim|required|matches[PasswordConfirm]'
		),
		'PasswordConfirm' => array(
			'field' => 'PasswordConfirm',
			'label' => 'Confirmar password',
			'rules' => 'trim|matches[Password]'
		)
	);
	
	public function __construct() {
		parent::__construct();
	}

	public function get_new()
	{
		return array(
			'FirstName' => '',
			'LastName' => '',
			'Email' => '',
			'IdRol' => '2'
		);
	}

	public function get_roles_array()
	{
		return parent::get_array('SysRoles', 'Name');
	}

	public function login()
	{
		$user = $this->get_by(array('Email' => $this->input->post('email')), TRUE);
		if (count($user)) {
			//Log in user
			if($this->bcrypt->check_password($this->input->post('password'), $user->getPassword())) {
                $this->set_userdata($user);
            }
		}
	}

	public function set_userdata($user)
	{
		$data = array(
			'username' => $user->getUsername(),
			'email' => $user->getEmail(), 
			'id_user' => $user->getIdUser(),
			'id_rol' => $user->getIdRol(),
			'loggedin' => TRUE, 
			'id_photo' => $user->getIdPhoto(),
			'photo' => $user->getIdPhoto() ? $user->getSysFiles()->getFilename() : ''
		);
		$this->session->set_userdata($data);
	}

	public function logout()
	{
		$this->session->sess_destroy();
	}

	public function loggedin()
	{
		return (bool) $this->session->userdata('loggedin');
	}

}

/* End of file user_m.php */
/* Location: ./application/models/user_m.php */