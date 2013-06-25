<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_m extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function getUsers()
	{
		$users = array();
		$result = SysUsersQuery::create()->find();
		var_dump(count($result));
		die("");
		foreach ($result as $item) {
			$users[]  = array(
				'username' => $item->getIdUser(), 
				'email' => $item->getEmail(), 
				'first_name' => $item->getFirstName(), 
				'last_name' => $item->getLastName(), 
			);
		}
		return $users;
	}

}

/* End of file User.php */
/* Location: ./application/models/User.php */