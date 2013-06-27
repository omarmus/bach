<?php 

class Admin_Controller extends BC_Controller
{
 	function __construct()
 	{
 		parent::__construct();
 		$this->data['meta_title'] = 'Bach PHP';
 		$this->load->helper('form');
 		$this->load->library('session');
 		$this->load->library('form_validation');
 		$this->form_validation->set_error_delimiters('<div class="error">','</div>');
 		$this->load->model('user_m', 'user');

 		// Login check
 		$exception_uris = array(
 			'admin/user/login',
 			'admin/user/logout'
 		);
 		if (in_array(uri_string(), $exception_uris) == FALSE) {
 			if ($this->user->loggedin() == FALSE) {
	 			redirect('admin/user/login');
	 		}
 		}
 	}
}

