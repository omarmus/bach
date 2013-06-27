<?php 

class Admin_Controller extends BC_Controller
{
 	function __construct()
 	{
 		parent::__construct();
 		$this->data['meta_title'] = 'Bach PHP';

 		//Helpers
 		$this->load->helper('form');

 		//Libraries
 		$this->load->library('session');
 		$this->load->library('form_validation');

 		//Models
 		$this->load->model('user_m', 'user');

 		//Configurations
 		$this->form_validation->set_error_delimiters('<div class="error">','</div>');

 		// Login check
 		$exception_uris = array(
 			'login',
 			'logout'
 		);
 		if (in_array(uri_string(), $exception_uris) == FALSE) {
 			if ($this->user->loggedin() == FALSE) {
	 			redirect('login');
	 		}
 		}
 	}
}

