<?php 

class Admin_Controller extends BC_Controller
{
 	function __construct()
 	{
 		parent::__construct();

 		//Helpers
 		$this->load->helper('form');

 		//Libraries
 		$this->load->library('session');
 		$this->load->library('form_validation');

 		//Models
 		$this->load->model('user_m', 'user');
 		$this->load->model('page_m', 'page');

 		//Configurations
		$this->form_validation->set_error_delimiters('<div class="error">','</div>');
		//$this->output->enable_profiler(TRUE);

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

 		$this->data['userdata'] = $this->session->all_userdata();
 		$this->data['page'] = $this->page->get_by(array("Slug" => $this->uri->segment(2)), TRUE);
 		$this->data['title'] = count($this->data['page']) ? $this->data['page']->getTitle() : 'Dashboard';
 		$this->data['meta_title'] = $this->data['title'] . ' - ' . $this->data["site_name"];
 		$this->data['menu'] = $this->page->get_nested();
 	}
}

