<?php 
/**
* 
*/
class BC_Controller extends CI_Controller
{
	public $data = array();

	public function __construct()
	{
		parent::__construct();
		$this->data["errors"] = array();
		$this->data["site_name_"] = config_item("site_name");
	}

	public function _required_dropdown($value)
	{
		if ($value == 0 || $value == '-' || $value == '*') {
			$this->form_validation->set_message('_required_dropdown', 'The %s field is required.');
			return FALSE;
		}
		return TRUE;
	}

	public function set_permissions_session()
	{
		$this->session->set_userdata('permissions', get_permissions($this->session->userdata('id_user')));
	}
}
