<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_M extends BC_Model {

	protected $_table_name = 'SysUsers';
	protected $_primary_key = 'idUser';
	protected $_order_by = 'username';
	public $rules = array(
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
			'rules' => 'trim|matches[password_confirm]'
		),
		'PasswordConfirm' => array(
			'field' => 'PasswordConfirm',
			'label' => 'Confirm password',
			'rules' => 'trim|matches[password]'
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
		);
	}

	public function login()
	{
		$user = $this->get_by(array('Email' => $this->input->post('email')), TRUE);
		if (count($user)) {
			//Log in user
			if($this->bcrypt->check_password($this->input->post('password'), $user->getPassword())) {
				$idUser = $user->getPrimaryKey();
				$rol = SysRolesXUserQuery::create()->filterByIdUser($idUser)->findOne();
                $data = array(
					'username' => $user->getUsername(), 
					'email' => $user->getEmail(), 
					'id_user' => $idUser, 
					'loggedin' => TRUE, 
					'id_rol' => $rol->getIdRol()
				);
				$this->session->set_userdata($data);
            }
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

}

/* End of file user_m.php */
/* Location: ./application/models/user_m.php */