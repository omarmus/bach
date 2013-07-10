<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class User extends Admin_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->data['title'] = 'Users';
	}

	public function index()
	{
		$this->data['users'] = $this->user->get();
		$this->data['subview'] = 'admin/user/index';
		$this->load->view('admin/_layout_main', $this->data);
	}

	public function edit($pk = NULL)
	{
		if ($pk) {
			$this->data['user'] = $this->user->get($pk)->toArray();
			$this->data['user']['idRol'] = $this->user->get_rol($pk);
			count($this->data['user']) || $this->data['errors'][] = 'User could no be found';
		} else {
			$this->data['user'] = $this->user->get_new();
		}
		$this->data['roles'] = $this->user->get_roles();
		$rules = $this->user->rules_edit;
		$pk || $rules['Password']['rules'] .= '|required';
		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run() == TRUE) {
			$this->load->library('bcrypt');
			$data = $this->user->array_from_post(array('FirstName', 'LastName', 'Email', 'Password'));
			$data['Password'] = $this->bcrypt->hash_password($data['Password']);
			$data['Username'] = $data['Email'];
			$idUser = $this->user->save($data, $pk);
			if ($pk === NULL) {
				$this->user->save_rol($idUser, $this->input->post('idRol'));
			}
			echo $pk?'UPDATE':'CREATE';
		} else {
			$this->load->view('admin/user/edit', $this->data);
		}	
	}

	public function deleteSelected()
	{
		echo $this->user->deleteItems($this->input->post('pks'))?"OK":"ERROR";
	}

	public function delete($id)
	{
		echo $this->user->delete($id)?"OK":"ERROR";
	}

	public function login()
	{
		$this->load->library('bcrypt');

		$dashboard = 'admin/dashboard';
		$this->user->loggedin() == FALSE || redirect($dashboard);

		$rules = $this->user->rules_login;
		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run() == TRUE) {
			//We can login and redirect
			if ($this->user->login() == TRUE) {
				redirect($dashboard);
			} else {
				$this->session->set_flashdata('error', 'That email/password combination does not exist');
				redirect('login', 'refresh');
			}
		}
		$this->data['subview'] = 'admin/user/login';
		$this->load->view('admin/_layout_modal', $this->data);
	}

	public function logout()
	{
		$this->user->logout();
		$this->session->sess_create();
	 	$this->session->set_flashdata('success', 'Logout success!');
		redirect('login');
	}

	public function _unique_email($str)
	{
		$id = $this->uri->segment(4);
		$user = SysUsersQuery::create()->filterByEmail($this->input->post('Email'))
									   ->filterByIdUser($id, Criteria::NOT_EQUAL)->find();
		if (count($user)) {
			$this->form_validation->set_message('_unique_email', '%s should be unique');
			return FALSE;
		}
		return TRUE;
	}
}

/* End of file user.php */
/* Location: ./application/controllers/admin/user.php */