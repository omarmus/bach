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
		$this->form_validation->set_error_delimiters('<div class="input-error">','</div>');
		//$this->output->enable_profiler(TRUE);

 		// Login check
 		$exception_uris = array('login','logout');
 		if (in_array(uri_string(), $exception_uris) == FALSE) {
 			if ($this->user->loggedin() == FALSE) {
				redirect('login');
			}
 		}

 		$this->data['userdata_'] = $this->session->all_userdata();

 		$page = $this->uri->segment(2);
 		$this->data['page_'] = $this->page->get_by(array("Slug" => $page), TRUE);

 		//Verify permission to user for page
 		if (isset($this->data['userdata_']['permissions']) && in_array(uri_string(), $exception_uris) == FALSE) {
 			$this->data['permissions_'] = $this->data['userdata_']['permissions'];
			if ($page != 'dashboard' && ($this->data['permissions_'][$page]['READ'] == 'NO' || $this->data['page_']->getState() == 'INACTIVE')) {
				show_404();
			}
 		}

 		$this->data['title_'] = count($this->data['page_']) ? $this->data['page_']->getTitle() : ucfirst($page);
 		$this->data['meta_title_'] = $this->data['title_'] . ' - ' . $this->data["site_name_"];
 		$this->data['menu_'] = $this->page->get_nested();
 	}
}
