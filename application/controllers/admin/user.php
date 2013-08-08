<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class User extends Admin_Controller
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		// Fetch all users
		$this->data['users'] = $this->user->get();

		// Load view
		$this->data['subview'] = 'admin/user/index';
		$this->load->view('admin/_layout_main', $this->data);
	}

	public function edit($pk = NULL)
	{
		is_ajax();

		// Fetch a user or set a new one
		if ($pk) {
			$this->data['user'] = $this->user->get($pk)->toArray();
			count($this->data['user']) || $this->data['errors'][] = 'User could no be found';
		} else {
			$this->data['user'] = $this->user->get_new();
		}

		// Roles for dropdown
		$this->data['roles'] = $this->user->get_roles_array();

		// Set up the form
		$rules = $this->user->rules_edit;
		$pk || $rules['Password']['rules'] .= '|required';
		$this->form_validation->set_rules($rules);

		// Process the form
		if ($this->form_validation->run() == TRUE) {
			$this->load->library('bcrypt');
			$data = $this->user->array_request($_POST);
			$pk || $data['Password'] = $this->bcrypt->hash_password($data['Password']);
			$data['Username'] = $data['Email'];
			$this->user->save($data, $pk);
			echo $pk?'UPDATE':'CREATE';
		} else {
			// Load the view
			$this->load->view('admin/user/edit', $this->data);
		}	
	}

	public function deleteSelected()
	{
		is_ajax();

		echo $this->user->deleteItems($this->input->post('pks'))?"OK":"ERROR";
	}

	public function delete($id)
	{
		echo $this->user->delete($id)?"OK":"ERROR";
	}

	public function login()
	{
		$this->load->library('bcrypt');

		// Redirect a user if he's already logged in
		$dashboard = 'admin/dashboard';
		$this->user->loggedin() == FALSE || redirect($dashboard);

		// Set form
		$rules = $this->user->rules_login;
		$this->form_validation->set_rules($rules);

		// Process form
		if ($this->form_validation->run() == TRUE) {
			//We can login and redirect
			if ($this->user->login() == TRUE) {
				redirect($dashboard);
			} else {
				$this->session->set_flashdata('error', 'That <strong>email/password</strong> combination does not exist');
				redirect('login', 'refresh');
			}
		}

		// Load view
		$this->data['subview'] = 'admin/user/login';
		$this->load->view('admin/_layout_login', $this->data);
	}

	public function logout()
	{
		$this->user->logout();
		$this->session->sess_create();
	 	$this->session->set_flashdata('success', 'Logout success!');
		redirect('login');
	}

	public function _unique_email()
	{
		// Do NOT valide if emai already exists
		//UNLESS it's the email for the current user
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