<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_M extends BC_Model {

	protected $_table_name = 'SysUsers';
	protected $_primary_key = 'idUser';
	protected $_order_by = 'username';
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
	
	public function __construct() {
		parent::__construct();
	}

	public function get_new()
	{
		return array(
			'FirstName' => '',
			'LastName' => '',
			'Email' => '',
			'idRol' => '2'
		);
	}

	public function delete($pk)
	{
		SysRolesXUserQuery::create()->filterByIdUser($pk)->find()->delete();
		parent::delete($pk);
	}

	public function get_rol($pk)
	{
		return SysRolesXUserQuery::create()->filterByIdUser($pk)->findOne()->getIdRol();
	}

	public function save_rol($idUser, $idRol)
	{
		$obj = new SysRolesXUser();
		$obj->setIdUser($idUser);
		$obj->setIdRol($idRol);
		$obj->save();
	}

	public function get_roles()
	{
		$roles = array();
		$result = SysRolesQuery::create()->find();
		foreach ($result as $item) {
			$roles[$item->getIdRol()] = $item->getName();
		}
		return $roles;
	}

	public function delete_rol($idUser)
	{
		SysRolesXUserQuery::create()->filterByIdUser($idUser)->delete();
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