<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class User extends Admin_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function login()
	{
		$this->data['subview'] = 'admin/user/login';
		$this->load->view('admin/_layout_modal', $this->data);
	}
}

/* End of file user.php */
/* Location: ./application/controllers/admin/user.php */