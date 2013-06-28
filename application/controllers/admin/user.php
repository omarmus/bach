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
		$this->data['users'] = $this->user->get();
		$this->data['subview'] = 'admin/user/index';
		$this->load->view('admin/_layout_main', $this->data);
	}

	public function edit($id = NULL)
	{
		$id == NULL || $this->data['user'] = $this->user->get($id)->toArray();
		$this->data['subview'] = 'admin/user/edit';
		$this->load->view('admin/_layout_main', $this->data);
	}

	public function delete($id)
	{
		
	}

	public function login()
	{
		$this->load->library('bcrypt');

		$dashboard = 'admin/dashboard';
		$this->user->loggedin() == FALSE || redirect($dashboard);

		$rules = $this->user->rules;
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
		$this->session->set_flashdata('success', 'Logout exit!');
		$this->user->logout();
		redirect('login');
	}
}

/* End of file user.php */
/* Location: ./application/controllers/admin/user.php */