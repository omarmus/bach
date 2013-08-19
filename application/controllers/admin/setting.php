<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setting extends Admin_Controller {

	public function index()
	{
		// Load view
		$this->data['subview'] = 'admin/setting/index';
		$this->load->view('admin/_layout_main', $this->data);
	}

}

/* End of file setting.php */
/* Location: ./application/controllers/admin/setting.php */
